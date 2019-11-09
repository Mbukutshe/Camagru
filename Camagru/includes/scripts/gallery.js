
//style for gallery div item
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
//style for gallery image
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
//style for the div below an img
function ft_styleBelowDiv(div)
{
  div.style.width = 400;
  div.style.height = '50px';
  div.style.display = 'block';
  div.style.bottom = '0';
  div.style.left = '0';
  return div;
}
//style for 'likes' div
function ft_styleLikeDiv(div)
{
    div.style.width = '140px';
    div.style.height = '20px';
    div.style.display = 'block';
    div.style.border = '1px solid #f5f7f6';
    div.style.bottom = '0px';
    div.style.marginTop = '20px';
    div.style.textAlign = 'center';
    div.style.float = 'left';
    return div;
}
//style for 'comments' div
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
//style for img like and comments
function ft_styleImgLike(img)
{
    img.width = 20;
    img.height = 20;
    img.style.display = 'block';
    img.style.margin = '0 auto';
    img.style.bottom = '0';
    return img;
}
function ft_createGalleryList(image)
{
  var galleryList = document.getElementById('gallery-list');
  var parentDiv = document.createElement('div');
  var belowDiv = document.createElement('div');
  var galleryImg = document.createElement('img');
  var likeDiv = document.createElement('div');
  var comDiv = document.createElement('div');
  var likes = document.createElement('p');
  likes.value = "12";
  likes.style.fontSize = '12px';
  likes.width = 20;
  likes.height = 20;
  likes.style.color = 'black';
  var likeImg = document.createElement('img');
  var li = document.createElement('li');
  likeDiv = ft_styleLikeDiv(likeDiv);
  comDiv = ft_styleComDiv(comDiv);
  likeImg = ft_styleImgLike(likeImg);

  likeImg.addEventListener('click', (event)=>
  {
    var fpath = galleryImg.src;
    var fname = fpath.replace(/^.*[\\\/]/, '');
    alert(fname);
  });
  parentDiv.addEventListener('mouseover', (event)=>
  {
  //  document.body.style.cursor = 'pointer';
    parentDiv.style.boxShadow = '1px 1px 10px 10px darkgrey';
  });
  parentDiv.addEventListener('mouseout', (event)=>
  {
    parentDiv.style.boxShadow = '1px 8px 5px 1px darkgrey';
  });
  belowDiv = ft_styleBelowDiv(belowDiv);
  parentDiv = ft_styleGalleryDiv(parentDiv);
  galleryImg = ft_styleGalleryImg(galleryImg, '../includes/uploads/'+image);
  li.setAttribute('class', 'nav-item');
  likeImg.setAttribute('src', '../includes/img/like.png');
  likeImg.setAttribute('class', 'button');
  likeDiv.appendChild(likeImg);
  likeDiv.appendChild(likes);
  var likeImg = document.createElement('img');
  likeImg = ft_styleImgLike(likeImg);
  likeImg.setAttribute('src', '../includes/img/comment.png');
  comDiv.appendChild(likeImg);
  belowDiv.appendChild(likeDiv);
  belowDiv.appendChild(comDiv);
  parentDiv.appendChild(galleryImg);
  parentDiv.appendChild(belowDiv);
  li.appendChild(parentDiv);
  galleryList.appendChild(li);
}
var current_page = 1;
var records_per_page = 12;

function prevPage()
{
    if (current_page > 1) {
        current_page--;
        changePage(current_page);
    }
}

function nextPage()
{
    if (current_page < numPages()) {
        current_page++;
        changePage(current_page);
    }
}
var btn_next = document.getElementById("btn_next");
var btn_prev = document.getElementById("btn_prev");
btn_next.addEventListener('click', (event)=> {
    nextPage();
});
btn_prev.addEventListener('click', (event)=>{
    prevPage();
});
function changePage(page)
{
   // var page_span = document.getElementById("page");
    var galleryList = document.querySelector('#gallery-list');
    // Validate page
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
                        allImages[j] = element;
                        j++;
                    });
                    for (var i = (page-1) * records_per_page; i < (page * records_per_page) && i < allImages.length; i++) 
                    {
                        ft_createGalleryList(allImages[i]);
                    }
                }
            }
        }
    };
    http.open('POST', "../includes/server/gallery_images.php", true);
    http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    http.send(param);
  //  page_span.innerHTML = page;

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
    return Math.ceil(10);
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
window.addEventListener("load", (event) => 
{
    changePage(1);
});