const modal = document.querySelector("#popUp");
const modalImg = document.querySelector("#img01");
const span = document.getElementsByClassName("close")[0];
const displayMessage = document.getElementById('sticker-selection');
const width = 240;
const height = 340;
let   zIndex = 1;

try
{
  icon1.addEventListener('click', (event)=>{ft_display('null');});
  icon2.addEventListener('click', (event)=>{ft_display('../includes/img/grass.png');});
  icon4.addEventListener('click', (event)=>{ft_display('../includes/img/sticker3.png');});
  icon5.addEventListener('click', (event)=>{ft_display('../includes/img/tree.png');});
  icon8.addEventListener('click', (event)=>{ft_display('../includes/img/sticker6.png');});
}
catch(Exception)
{
  console.log(Exception);
}

span.onclick = function()
{ 
  modal.style.display = "none";
}

imagePicker.addEventListener('change', (event)=>{
   var reader = new FileReader;
   reader.addEventListener('load', (event)=>{
      previewImage.src = reader.result;
      videoPlayer.pause();
      videoPlayer.src = null;
      videoPlayer.srcObject.stop();
   });
   reader.readAsDataURL(imagePicker.files[0]);
});

function ft_display(pic)
{
  superposable.src = pic;
  superposable.style.display = 'inline-block';
  previewImage.style.src = null;
}

const startMedia = () => 
{
    if (!('mediaDevices' in navigator)) 
    {
      navigator.mediaDevices = {};
    }
  
    if (!('getUserMedia' in navigator.mediaDevices)) 
    {
      navigator.mediaDevices.getUserMedia = (constraints) => 
      {
        const getUserMedia = navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
        if (!getUserMedia) 
        {
          return Promise.reject(new Error('getUserMedia is not supported'));
        } 
        else 
        {
          return new Promise((resolve, reject) => getUserMedia.call(navigator, constraints, resolve, reject));
        }
      };
    }
    navigator.mediaDevices.getUserMedia({video: true}).then((stream) => 
    {
      videoPlayer.srcObject = stream;
      videoPlayer.style.display = 'inline-block';
    }).catch((err) => 
    {
      imagePickerArea.style.display = 'inline-block';
    });
};

var count = 'canv1';
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
  cElement.style.width = '100%';
  cElement.height = 220;
  cElement.style.zIndex = 10;
  cElement.style.display = 'inline-block';
  cElement.style.float = 'left';
  cElement.style.borderRight = '1px solid #f5f7f6';
  cElement.src = src;
  return cElement;
}

function styleCanvasDiv(div)
{
  div.style.width = '100%';
  div.height = 120;
  div.style.display = 'inline-block';
  div.style.zIndex = 10;
  div.style.paddingRight = '2%';
  div.style.padding = '5px';
  div.style.border = '1px solid #f5f7f6';
  div.style.borderRadius = '5px';
  div.style.marginTop = '1%';
  div.style.marginBottom = '2%';
  div.style.boxShadow = '0px 9px 8px 0px darkgrey';
  return div;
}

function styleCanvasRemove(img)
{
  img.width = 15;
  img.height = 15;
  img.style.top = '0';
  img.style.right = '5%';
  img.style.marginTop = '1%';
  img.style.display = 'inline-block';
  img.style.boxShadow = 'none';
  img.style.borderRadius = '6px';
  img.src = "../includes/img/delete.png";
  return img;
}

function removeItems()
{
  var ul = document.getElementById('taken-pics');
  while(ul.firstChild)
  {
    ul.removeChild(ul.firstChild);
  }
}

function loadImages(data)
{
  removeItems();
  if (data)
  {
    var idRemove = 0;
    var ul = document.querySelector('#taken-pics');
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

      img.addEventListener('mouseover', (event)=>
      {
        document.body.style.cursor = 'pointer';
        img.style.boxShadow = '1px 1px 6px 6px darkgrey';
        img.width = 16;
        img.height = 16;
      });

      img.addEventListener('mouseout', (event)=>
      {
        document.body.style.cursor = 'default';
        img.style.boxShadow = 'none';
        img.width = 15;
        img.height = 15;
      });

      img.addEventListener('click', (event)=>
      {
        var fpath = cElement.src;
        var fname = fpath.replace(/^.*[\\\/]/, '');
        successPhp("../includes/server/remove_img.php", "remove=true&image="+fname);
      });

      cElement  = styleImg(cElement , "../includes/uploads/"+images);
      cElement.onclick = function()
      {
        modal.style.display = "block";
        modalImg.src = this.src;
      }

      cElement.addEventListener('mouseover', (event)=>
      {
        document.body.style.cursor = 'pointer';
      });

      cElement.addEventListener('mouseout', (event)=>
      {
        document.body.style.cursor = 'default';
      });

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

captureButton.addEventListener('click', (event) => 
{
  const canvasElement = document.querySelector('#canvas');
  const context = canvasElement.getContext('2d');
  context.drawImage(videoPlayer, 0, 0, 340, 240);
  context.drawImage(previewImage, 0, 0, 340, 240);
  var name = superposable.src;
  var superpose = name.replace(/^.*[\\\/]/, '');
  if (!isCanvasBlank(canvasElement))
  {
    runPhp("../includes/server/over_lay.php", "name-img="+canvasElement.toDataURL('image/png')+"&image="+superpose);
  }
  else
  {
    if(isCanvasBlank(canvasElement))
    {
      displayMessage.innerHTML = "Please choose the image from your PC or <br/> Don't you want to use the PC camera? You should smile then.";
      displayMessage.style.color = 'red';
    }
  }  
});

function isCanvasBlank(canvas) 
{
  const blank = document.createElement('canvas');

  blank.width = canvas.width;
  blank.height = canvas.height;

  return canvas.toDataURL() === blank.toDataURL();
}

function successPhp(script, param)
{
  var http = new XMLHttpRequest();
  http.onreadystatechange = function()
  {
    if (http.readyState === 4) 
    { 
        if (http.status === 200) 
        {
          alert(http.responseText);
          readPhp();
        }
    }
  };
  http.open('POST', script, true);
  http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  http.send(param);
}

function runPhp(script, param)
{
  var http = new XMLHttpRequest();
  http.onreadystatechange = function()
  {
     if (http.readyState === 4) 
     { 
         if (http.status === 200) 
         { 
          loadImages(http.responseText);
         }
     }
  };
  http.open('POST', script, true);
  http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  http.send(param);
}

function readPhp()
{
  var http = new XMLHttpRequest();
  var param = "read=yes";
  http.onreadystatechange = function()
  {
     if (http.readyState === 4) { 
         if (http.status === 200) { 
           loadImages(http.responseText);
         }
     }
  };
  http.open('POST', "../includes/server/read_user_img.php", true);
  http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  http.send(param);
}

window.addEventListener("load", (event) =>
{
  startMedia();
  readPhp();
});
