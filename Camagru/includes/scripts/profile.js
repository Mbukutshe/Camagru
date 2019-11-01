function ft_createIconDiv(div)
{
    div.style.width = '30%';
    div.style.height = '30%';
    div.style.display = 'inline-block';
    div.style.border = '1px solid #f5f7f6';
    div.style.background = '#fbfcf0';
    div.style.marginTop = '1%';
    div.style.marginBottom = '2%';
    div.style.padding = '16%';
    div.style.borderRadius = '10px';
    div.style.boxShadow = '0px 5px 4px 0px darkgrey';
    return div;
}
function ft_styleDashIcon(img)
{
  img.width = 100;
  img.style.height = '100px';
  img.style.boxShadow = 'none';
  img.style.border = 'none';
  img.style.padding = 'none';
  img.style.margin = '0 auto';
  img.src = "";
  return img;
}

function ft_edit(div)
{
    div.style.width = '11%';
    div.style.height = '24.5%';
    div.style.background = '#000';
    div.style.borderRadius = '10px';
    div.style.display = 'none';
    div.style.position = 'absolute';
    div.style.textAlign = 'center';
    div.style.alignItems = 'center';
    div.style.opacity = '50%';
    div.zIndex = '10';
    return (div);
}

function ft_createDash(img, div, btn, ediDiv, opt)
{
    var dash = document.querySelector(div);
    var iconDiv = document.createElement('div');
    var editDiv = document.createElement('div');
    var iconImg = document.createElement('img');
    var change = document.createElement('button');
    iconDiv = ft_createIconDiv(iconDiv);
    editDiv = ft_edit(editDiv);
    iconImg = ft_styleDashIcon(iconImg);
    iconImg.setAttribute('id', img);
    iconDiv.appendChild(iconImg);
    editDiv.setAttribute('id', ediDiv);
    change.setAttribute('id', btn);
    change.setAttribute('class', 'btn-success');
    change.style.opacity = '100%';
    change.innerHTML = "Want to change "+opt+"? Click.";
    change.setAttribute('type', 'button');
    editDiv.appendChild(change);
    dash.appendChild(editDiv);
    dash.appendChild(iconDiv);
}
window.addEventListener('load', (event)=>{
    i = 0;
    while (++i <= 4)
    {
        if (i == 1)
        {
            ft_createDash('img1', '#div1', 'btn1', 'edi1', 'Username');
            var img = document.getElementById('img1');
            img.setAttribute('src', '../includes/img/user.png');
            img.addEventListener('mouseover', (event)=>{
                var change = document.getElementById('edi1');
                change.style.display = 'inline-block';
               document.body.style.cursor = 'pointer';
            });
            img.addEventListener('mouseout', (event)=>{
                var change = document.getElementById('edi1');
                change.style.display = 'none';
                document.body.style.cursor = 'default';
            });
        }
        else if (i == 2)
        {
            ft_createDash('img2', '#div2', 'btn2', 'edi2', 'E-mail Address');
            var img = document.getElementById('img2');
            img.src = '../includes/img/email.png';
            img.addEventListener('mouseover', (event)=>{
                var change = document.getElementById('edi2');
                change.style.display = 'inline-block';
                document.body.style.cursor = 'pointer';
            });
            img.addEventListener('mouseout', (event)=>{
                var change = document.getElementById('edi2');
                change.style.display = 'none';
                document.body.style.cursor = 'default';
            });
        }
        else if (i == 3)
        {
            ft_createDash('img3', '#div3', 'btn3', 'edi3', 'Password');
            var img = document.getElementById('img3');
            img.src = '../includes/img/key.png';
            img.addEventListener('mouseover', (event)=>{
                var change = document.getElementById('edi3');
                change.style.display = 'inline-block';
                document.body.style.cursor = 'pointer';
            });
            img.addEventListener('mouseout', (event)=>{
                var change = document.getElementById('edi3');
                change.style.display = 'none';
                document.body.style.cursor = 'default';
            });
        }
        else if (i == 4)
        {
            ft_createDash('img4', '#div4', 'btn4', 'edi4', 'Notification Settings');
            var img = document.getElementById('img4');
            img.src = '../includes/img/notify.png';
            img.addEventListener('mouseover', (event)=>{
                var change = document.getElementById('edi4');
                change.style.display = 'inline-block';
                document.body.style.cursor = 'pointer';
            });
            img.addEventListener('mouseout', (event)=>{
                var change = document.getElementById('edi4');
                change.style.display = 'none';
                document.body.style.cursor = 'default';
            });
        }
    }
});