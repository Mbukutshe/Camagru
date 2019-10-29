const width = 240;
const height = 340;
let   zIndex = 1;
try
{
icon1.addEventListener('click', (event)=>{ft_display('../img/tree.png');});
icon2.addEventListener('click', (event)=>{ft_display('../img/grass.png');});
icon3.addEventListener('click', (event)=>{ft_display('../img/feather.jpeg');});
icon4.addEventListener('click', (event)=>{ft_display('../img/bird.jpg');});
icon5.addEventListener('click', (event)=>{ft_display('../img/tree.png');});
icon6.addEventListener('click', (event)=>{ft_display('../img/grass.png');});
icon7.addEventListener('click', (event)=>{ft_display('../img/border.jpg');});
icon8.addEventListener('click', (event)=>{ft_display('../img/bird.jpg');});
icon9.addEventListener('click', (event)=>{ft_display('../img/feather.jpeg');});
}
catch(Exception)
{
  console.log(Exception);
}

imagePicker.addEventListener('change', (event)=>{
   var reader = new FileReader;
   reader.addEventListener('load', (event)=>{
      previewImage.src = reader.result; 
   });
   reader.readAsDataURL(imagePicker.files[0]);
});

function ft_display(pic)
{
  superposable.src = pic;
  superposable.style.display = 'inline';
}
const startMedia = () => {
    if (!('mediaDevices' in navigator)) {
      navigator.mediaDevices = {};
    }
  
    if (!('getUserMedia' in navigator.mediaDevices)) {
      navigator.mediaDevices.getUserMedia = (constraints) => {
        const getUserMedia = navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
         if (!getUserMedia) {
            return Promise.reject(new Error('getUserMedia is not supported'));
          } else {
            return new Promise((resolve, reject) => getUserMedia.call(navigator, constraints, resolve, reject));
          }
      };
    }
    navigator.mediaDevices.getUserMedia({video: true})
      .then((stream) => {
        videoPlayer.srcObject = stream;
        videoPlayer.style.display = 'inline-block';
      })
    .catch((err) => {
      imagePickerArea.style.display = 'inline-block';
    });
  };
var count = 'canv1';
//style for canvas-> an element where the image will be drawn on
function styleCanvas(canvasElement)
{
  canvasElement.id = 'canv1';
  canvasElement.width = 120;
  canvasElement.height = 120;
  canvasElement.style.zIndex = 10;
  canvasElement.style.display = 'inline-block';
  canvasElement.style.float = 'left';
  canvasElement.style.borderRight = '1px solid #f5f7f6';
  return canvasElement;
}
//creating style for div containing a canvas
function styleCanvasDiv(div)
{
  div.style.width = '100%';
  div.height = 120;
  div.style.display = 'inline-block';
  div.style.zIndex = 10;
  div.style.paddingRight = '2%';
  div.style.border = '1px solid #f5f7f6';
  div.style.borderRadius = '5px';
  div.style.marginTop = '1%';
  div.style.marginBottom = '2%';
  div.style.boxShadow = '0px 9px 8px 0px darkgrey';
  return div;
}
//style for deletion
function styleCanvasRemove(img)
{
  img.width = 15;
  img.height = 15;
  img.style.float = 'right';
  img.style.top = '0';
  img.style.right = '5%';
  img.style.marginTop = '1%';
  img.style.display = 'inline-block';
  img.style.boxShadow = 'none';
  img.src = "../img/delete.png";
  return img;
}

captureButton.addEventListener('click', (event) => {
    var ul = document.getElementById('taken-pics');
    var li = document.createElement('li');
    var div = document.createElement('div');
    var img = document.createElement('img');
    var canvasElement = document.createElement('canvas');
    div = styleCanvasDiv(div);
    img = styleCanvasRemove(img);
    canvasElement = styleCanvas(canvasElement);
    div.appendChild(canvasElement);
    div.appendChild(img);
    li.appendChild(div);
    ul.appendChild(li);
    const context = canvasElement.getContext('2d');
    context.drawImage(previewImage, 0, 0, 120, 120);
    context.drawImage(videoPlayer, 0, 0, 120, 120);
    context.drawImage(superposable, 0, 0, 120, 120);  
    videoPlayer.srcObject.getVideoTracks().forEach((track) => {
      // track.stop(); 
    });
    let picture = canvasElement.toDataURL();
    fetch('/api/save_image.php', {
      method : 'post',
      body   : JSON.stringify({data: picture })
    })
    .then((res) => res.json())
    .then((data) => {
      if(data.success){
        let newImage = createImage(data.path, "new image", "new image", width, height, "masked");
        let tilt = -(20 + 60 * Math.random());
        newImage.style.transform = "rotate("+tilt+"deg)";
        zIndex++;
        newImage.style.zIndex    = zIndex;
        newImages.appendChild(newImage);
        canvasElement.classList.add('masked');
      }
    })
    .catch((error) => console.log(error))
  });
  const createImage = (src, alt, title, width, height, className) => {
    let newImg = document.createElement("img");

    if(src !== null)       newImg.setAttribute("src", src);
    if(alt !== null)       newImg.setAttribute("alt", alt);
    if(title !== null)     newImg.setAttribute("title", title);
    if(width !== null)     newImg.setAttribute("width", width);
    if(height !== null)    newImg.setAttribute("height", height);
    if(className !== null) newImg.setAttribute("class", className);

    return newImg;
}
window.addEventListener("load", (event) => {
  startMedia();
});
