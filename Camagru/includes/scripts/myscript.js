
const home = document.querySelector('#home');
const logo = document.querySelector('#logo-icon');

function signout()
{
  window.open('/camagru/includes/server/sign_out.php', '_top');
}
function signin()
{
    window.open('/camagru/views/login.php', '_top');
}
home.addEventListener('click', (event)=>
{
  window.open('/camagru/views/home.php', '_top');
});
logo.addEventListener('click', (event)=>
{
  window.open('/camagru/views/home.php', '_top');
});
window.addEventListener('load', (event) =>
{

});