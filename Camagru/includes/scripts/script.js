const width = 240;
const height = 340;
let   zIndex = 1;
try
{
icon1.addEventListener('click', (event)=>{ft_display('../includes/img/sticker1.png');});
icon2.addEventListener('click', (event)=>{ft_display('../includes/img/grass.png');});
icon3.addEventListener('click', (event)=>{ft_display('../includes/img/sticker2.png');});
icon4.addEventListener('click', (event)=>{ft_display('../includes/img/sticker3.png');});
icon5.addEventListener('click', (event)=>{ft_display('../includes/img/tree.png');});
icon6.addEventListener('click', (event)=>{ft_display('../includes/img/sticker4.png');});
icon7.addEventListener('click', (event)=>{ft_display('../includes/img/sticker5.png');});
icon8.addEventListener('click', (event)=>{ft_display('../includes/img/sticker6.png');});
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
  superposable.style.display = 'inline-block';
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
function styleCanvas(cElement)
{
  cElement.id = 'canv1';
  cElement.width = 200;
  cElement.height = 120;
  cElement.style.zIndex = 10;
  cElement.style.display = 'inline-block';
  cElement.style.float = 'left';
  cElement.style.borderRight = '1px solid #f5f7f6';
  return cElement;
}
function styleImg(cElement, src)
{
  cElement.width = 200;
  cElement.height = 120;
  cElement.style.zIndex = 10;
  cElement.style.display = 'inline-block';
  cElement.style.float = 'left';
  cElement.style.borderRight = '1px solid #f5f7f6';
  cElement.src = src;
  return cElement;
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
  img.style.border = '1px solid red';
  img.src = "../includes/img/delete.png";
  return img;
}
function removeItems()
{
  var ul = document.querySelector('#taken-pics');
  while(ul.firstChild)
  {
    ul.removeChild(ul.firstChild);
  }
}
function loadImages(data)
{
  if (data)
  {
    var idRemove = 0;
    var ul = document.getElementById('taken-pics');
    var json = JSON.parse(data);
    json.forEach(images => 
    {
      var li = document.createElement('li');
      li.setAttribute('id', images);
      var div = document.createElement('div');
      var img = document.createElement('img');
      var cElement = document.createElement('img');
      div = styleCanvasDiv(div);
      img = styleCanvasRemove(img);
      img.setAttribute("id", "remove"+idRemove);
      img.addEventListener('click', (event)=>{
        alert(img.id);
      });
      cElement  = styleImg(cElement , "../includes/uploads/"+images);
      div.appendChild(cElement);
      div.appendChild(img);
      li.appendChild(div);
      if(ul.firstChild)
      {
        ul.insertBefore(li, ul.firstChild);
      }
      else
      {
        ul.appendChild(li);
      }
      idRemove++;
    });
  }
}
captureButton.addEventListener('click', (event) => {
  /* var ul = document.getElementById('taken-pics');
   var li = document.createElement('li');
    var div = document.createElement('div');
   var img = document.createElement('img');
    var imgYes = document.createElement('img');
    var canvasElement = document.createElement('canvas');
    div = styleCanvasDiv(div);
    img = styleCanvasRemove(img);
    imgYes = styleCanvasYes(imgYes);
    canvasElement = styleCanvas(canvasElement);
    div.appendChild(canvasElement);
    div.appendChild(img);
    div.appendChild(imgYes);
    li.appendChild(div);
    if (ul.firstChild)
    {
      ul.insertBefore(li, ul.firstChild);
    }
    else
    {
      ul.appendChild(div);
    }*/
    const canvasElement = document.querySelector('#canvas');
    const context = canvasElement.getContext('2d');
    context.drawImage(previewImage, 0, 0, 120, 120);
    context.drawImage(videoPlayer, 0, 0, 120, 120);
  //  context.drawImage(superposable, 0, 0, 120, 120);
    var name = superposable.src;
    var superpose = name.replace(/^.*[\\\/]/, '');
  /*  var form = document.createElement('form');
    var input = document.createElement('input');
    var filename = document.createElement('input');
   /* form.action = "../includes/server/over_lay.php";
    form.method = "post";
    input.type = 'hidden';
    input.name = 'name-img';
    filename.type = 'hidden';
    filename.name = 'image';
    filename.value = superpose;
    input.value = canvasElement.toDataURL('image/png');
    form.appendChild(filename);
    form.appendChild(input);
    document.body.appendChild(form);
    form.submit();*/
   var http = new XMLHttpRequest();
   var param = "name-img="+canvasElement.toDataURL('image/png')+"&image="+superpose;
   http.onreadystatechange = function()
    {
      if (http.readyState === 4) { 
          if (http.status === 200) { 
            removeItems();
            loadImages(http.responseText);
          }
      }
  };
  http.open('POST', "../includes/server/over_lay.php", true);
  http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  http.send(param);
  /*videoPlayer.srcObject.getVideoTracks().forEach((track) => {
      // track.stop(); 
    });
    let picture = canvasElement.toDataURL('image/png');
    fetch('/api/save_image.php', {
      method : 'post',
      body   : JSON.stringify({data: picture})
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
    .catch((error) => console.log(error))*/
  });
/*  const createImage = (src, alt, title, width, height, className) => {
    let newImg = document.createElement("img");

    if(src !== null)       newImg.setAttribute("src", src);
    if(alt !== null)       newImg.setAttribute("alt", alt);
    if(title !== null)     newImg.setAttribute("title", title);
    if(width !== null)     newImg.setAttribute("width", width);
    if(height !== null)    newImg.setAttribute("height", height);
    if(className !== null) newImg.setAttribute("class", className);

    return newImg;
}*/
window.addEventListener("load", (event) => {
  startMedia();
  var http = new XMLHttpRequest();
  http.onreadystatechange = function()
   {
     if (http.readyState === 4) { 
         if (http.status === 200) { 
            removeItems();
           loadImages(http.responseText);
         }
     }
 };
 http.open('POST', "../includes/server/read_user_img.php", true);
 http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 http.send();
});
