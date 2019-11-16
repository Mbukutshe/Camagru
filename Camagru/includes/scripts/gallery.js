var btn_next = document.getElementById("btn_next");
var btn_prev = document.getElementById("btn_prev");
var first_page = document.getElementById("first_page");
var last_page = document.getElementById("last_page");
var modal = document.querySelector("#popUp");
var commentBox = document.querySelector("#popUpcomment");
var modalImg = document.querySelector("#img01");
var commentImg = document.querySelector("#img02");
var sendComment = document.querySelector('#send-comment');
var commentText = document.querySelector('#insert-comment');
var commentList = document.querySelector('.comments');
var warning = document.querySelector('#warning');
var userId = document.querySelector('#user_id');
const span = document.getElementsByClassName("close")[0];
const close = document.getElementById("close");
var hiddenValue;

span.onclick = function() 
{ 
  modal.style.display = "none";
  commentBox.style.display = "none";
  removeComments();
}

close.addEventListener('click', (event)=>
{
    modal.style.display = "none";
    commentBox.style.display = "none";
    warning.style.display = "none";
    removeComments();
});

sendComment.addEventListener('click', (event)=>
{
    var imageId = hiddenValue;
    comment = commentText.value;
    if (userId.value && commentText.value)
    {
        var param = "insert_comments=yes&img_id="+imageId+"&user_id="+userId.value+"&comment="+comment;
        readComments(param);
    }
    else
    {
        if (!userId.value)
        {
            warning.innerHTML = "sign in first before commenting to this image.";
        }
        else if (!commentText.value)
        {
            warning.innerHTML = "come on! put some text in the \'say something...\' area.";
        }
        warning.style.display = "block";
        warning.style.color = "red";
    }
    commentText.value = "";
});

function ft_styleGalleryDiv(div)
{
  div.width = 400;
  div.style.height = '260px';
  div.style.display = 'block';
  div.style.border = '1px solid #f5f7f6';
  div.style.marginTop = '1%';
  div.style.marginBottom = '2%';
  div.style.padding = '10px';
  div.style.borderTopLeftRadius = '20px';
  div.style.borderBottomRightRadius = '20px';
  div.style.boxShadow = '0px 8px 5px 0px darkgrey';
  return div;
}

function ft_styleGalleryImg(img, image)
{
  img.width = 300;
  img.height = 200;
  img.style.display = 'block';
  img.style.boxShadow = 'none';
  img.style.border = 'none';
  img.style.padding = 'none';
  img.style.margin = 'none';
  img.src = image;
  return img;
}

function ft_styleBelowDiv(div)
{
  div.style.width = 400;
  div.style.height = '50px';
  div.style.display = 'block';
  div.style.bottom = '0';
  div.style.left = '0';
  return div;
}

function ft_styleLikeDiv(div)
{
    div.style.width = '140px';
    div.style.height = '20px';
    div.style.display = 'block';
    div.style.border = '1px solid #f5f7f6';
    div.style.bottom = '0px';
    div.style.marginTop = '20px';
    div.style.float = 'left';
    return div;
}

function ft_styleComDiv(div)
{
    div.style.width = '140px';
    div.style.height = '20px';
    div.style.display = 'block';
    div.style.border = '1px solid #f5f7f6';
    div.style.bottom = '0px';
    div.style.marginTop = '20px';
    div.style.float = 'right';
    div.style.textAlign = 'center';
    return div;
}

function ft_styleImgLike(img)
{
    img.width = 20;
    img.height = 20;
    img.style.display = 'inline-block';
    img.style.margin = '0 auto';
    img.style.bottom = '0';
    return img;
}
function ft_styleImgCom(img)
{
    img.width = 20;
    img.height = 20;
    img.style.display = 'block';
    img.style.margin = '0 auto';
    img.style.bottom = '0';
    return img;
}
function loadComments(data)
{
    var hiddenId;
    if (!document.getElementById('image_id'))
    {
        hiddenId = document.createElement('input');
        hiddenId.setAttribute('type', 'hidden');
        hiddenId.setAttribute('id', 'image_id');
    }
    else
    {
        hiddenId = document.querySelector('#image_id');
    }
    if (data)
    {
        removeComments();
        var hiddenId;
        if (!document.getElementById('image_id'))
        {
            hiddenId = document.createElement('input');
            hiddenId.setAttribute('type', 'hidden');
            hiddenId.setAttribute('id', 'image_id');
        }
        else
        {
            hiddenId = document.querySelector('#image_id');
        }
        commentList.appendChild(hiddenId);
        var json = JSON.parse(data);
        json.forEach(comment =>{
            var li = document.createElement('li');
            var p = document.createElement('p');
            hiddenId.value = comment['image_id'];
            li.setAttribute('class', 'listcomment');
            p.innerHTML = comment['comment'];
            li.appendChild(p);
            commentList.appendChild(li);
        });
    }
    else
    {
        commentList.appendChild(hiddenId);
    }

}
function removeComments()
{
    warning.style.display = "none";
    while(commentList.firstChild)
    {
        commentList.removeChild(commentList.firstChild);
    }

}
function ft_createGalleryList(image, id, likeValue)
{
  var galleryList = document.getElementById('gallery-list');
  var hiddenId = document.createElement('input');
  hiddenId.setAttribute('type', 'hidden');
  hiddenId.setAttribute('name', 'img_id');
  hiddenId.value = id;
  var parentDiv = document.createElement('div');
  var belowDiv = document.createElement('div');
  var galleryImg = document.createElement('img');
  var likeDiv = document.createElement('div');
  var comDiv = document.createElement('div');
  var likes = document.createElement('label');
  if (parseInt(likeValue) > 0)
  {
    likes.innerHTML = likeValue;
  }
  likes.style.fontSize = '12px';
  likes.style.width = '20px';
  likes.style.height = '20px';
  likes.style.color = 'black';
  likes.style.float = 'left';
  likes.style.padding = "5px";
  likes.style.display = 'inline-block';
  likes.style.margin = '0 auto';

  var likeImg = document.createElement('img');
  var commImg = document.createElement('img');
  var li = document.createElement('li');
  likeDiv = ft_styleLikeDiv(likeDiv);
  comDiv = ft_styleComDiv(comDiv);
  likeImg.addEventListener('click', (event)=>
  {
    likeImg.style.width = '10px';
    likeImg.style.height = '10px';
    var imageId = hiddenId.value;
    if (userId.value)
    {
        var param = "like=yes&img_id="+imageId+"&user_id="+userId.value;
        likeImage(param, likes);
    }
    else
    {
        alert("Sign In");
    }
  });
  likeImg.addEventListener('mouseout', (event)=>
  {
    likeImg.style.width = '20px';
    likeImg.style.height = '20px';
  });
  commImg.addEventListener('click', (event)=>{
    commentBox.style.display = "block";
    commentImg.src = galleryImg.src;
    var imageId = hiddenId.value;
    var param = "read_comments=yes&img_id="+imageId;
    readComments(param);
    hiddenValue = imageId;
  });
  parentDiv.addEventListener('mouseover', (event)=>
  {
    parentDiv.style.boxShadow = '1px 1px 10px 10px darkgrey';
  });
  parentDiv.addEventListener('mouseout', (event)=>
  {
    parentDiv.style.boxShadow = '1px 8px 5px 1px darkgrey';
  });
  belowDiv = ft_styleBelowDiv(belowDiv);
  parentDiv = ft_styleGalleryDiv(parentDiv);
  galleryImg = ft_styleGalleryImg(galleryImg, '../includes/uploads/'+image);
  galleryImg.onclick = function()
  {
    modal.style.display = "block";
    modalImg.src = this.src;
  }
  likeImg = ft_styleImgLike(likeImg);
  li.setAttribute('class', 'nav-item');
  likeImg.setAttribute('src', '../includes/img/like.png');
  likeImg.setAttribute('class', 'button');
  likeDiv.appendChild(likes);
  likeDiv.appendChild(likeImg);
  commImg = ft_styleImgCom(commImg);
  commImg.setAttribute('src', '../includes/img/comment.png');
  comDiv.appendChild(commImg);
  belowDiv.appendChild(likeDiv);
  belowDiv.appendChild(comDiv);
  parentDiv.appendChild(galleryImg);
  parentDiv.appendChild(belowDiv);
  parentDiv.appendChild(hiddenId);
  li.appendChild(parentDiv);
  if(galleryList.firstChild)
  {
    galleryList.insertBefore(li, galleryList.firstChild);
  }
  else
  {
    galleryList.appendChild(li);
  }
}
var current_page = 1;
var records_per_page = 8;

function prevPage()
{
    if (current_page > 1) 
    {
        current_page--;
        changePage(current_page);
    }
}

function nextPage()
{
    if (current_page < numPages()) 
    {
        current_page++;
        changePage(current_page);
    }
}
btn_next.addEventListener('click', (event)=> 
{
    nextPage();
});
btn_prev.addEventListener('click', (event)=>
{
    prevPage();
});
first_page.addEventListener('click', (event)=> 
{
    last_page.style.backgroundColor= '#fbfcf0';
    last_page.style.color= '#000';
    first_page.style.backgroundColor= '#4CAF50';
    first_page.style.color= '#fff';
    changePage(1);
});
last_page.addEventListener('click', (event)=>
{
    first_page.style.backgroundColor= '#fbfcf0';
    first_page.style.color= '#000';
    last_page.style.borderRadius= '5px';
    last_page.style.backgroundColor= '#4CAF50';
    last_page.style.color= '#fff';
    current_page = Math.ceil(count/records_per_page);
    changePage(current_page);
});
function changePage(page)
{
    var galleryList = document.querySelector('#gallery-list');
    if (page < 1)
    {  
         page = 1;
    }
    var numPage = numPages();
    if (page > numPage)
    {
        page = numPage;
    }
    while(galleryList.firstChild)
        galleryList.removeChild(galleryList.firstChild);
    var allImages = new Array();
    var idImages = new Array();
    var imageLikes = new Array();
    var http = new XMLHttpRequest();
    var param = "gallery=yes";
    http.onreadystatechange = function()
    {
        if (http.readyState === 4) { 
            if (http.status === 200) { 
                data = http.responseText;
                var j = 0;
                if (data)
                {
                    var json = JSON.parse(data);
                    json.forEach(element => 
                    {
                        allImages[j] = element['image_name'];
                        idImages[j] = element['image_id'];
                        imageLikes[j] = element['like_no'];
                        j++;
                    });
                    for (var i = (page-1) * records_per_page; i < (page * records_per_page) && i < allImages.length; i++) 
                    {
                        ft_createGalleryList(allImages[i], idImages[i], imageLikes[i]);
                    }
                }
            }
        }
    };
    http.open('POST', "../includes/server/gallery_images.php", true);
    http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    http.send(param);

    if (page == 1) 
    {
        btn_prev.style.visibility = "hidden";
    } 
    else 
    {
        btn_prev.style.visibility = "visible";
    }
    if (page == numPages()) 
    {
        btn_next.style.visibility = "hidden";
    } 
    else 
    {
        btn_next.style.visibility = "visible";
    }
}
function numPages()
{
    return Math.ceil(count/records_per_page);
}
function loadData(data)
{
    var i = 0;
    if (data)
    {
        var json = JSON.parse(data);
        json.forEach(element => 
        {
            allImages[i++] = element;
        });
    }
}
function likeImage(param, likes)
{
    warning.style.display = "none";
    var http = new XMLHttpRequest();
    http.onreadystatechange = function()
    {
        if (http.readyState === 4) { 
            if (http.status === 200) 
            {
                if (http.responseText == "success")
                {
                    if (!(likes.innerText))
                    {
                        likes.innerHTML = 1;
                    }
                    else
                    {
                        var like = 1 + parseInt(likes.innerText);
                        likes.innerHTML = like;
                    }
                }
                else if (http.responseText == "liked")
                {
                    alert("Already liked this image.");
                }
            }
        }
    };
    http.open('POST', "../includes/server/comment_and_like.php", true);
    http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    http.send(param);
}
function readComments(param)
{
    warning.style.display = "none";
    var http = new XMLHttpRequest();
    http.onreadystatechange = function()
    {
        if (http.readyState === 4) { 
            if (http.status === 200) 
            {
                loadComments(http.responseText);
            }
        }
    };
    http.open('POST', "../includes/server/comment_and_like.php", true);
    http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    http.send(param);
}
window.addEventListener("load", (event) => 
{
    changePage(1);
    warning.style.display = "none";
});