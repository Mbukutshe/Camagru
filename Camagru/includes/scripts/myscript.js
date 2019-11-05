
const login = document.querySelector('#getin');
const logIn = document.querySelector('#in');
var getOut = document.querySelector('#out');
const home = document.querySelector('#home');
const logo = document.querySelector('#logo-icon');
const settings = document.querySelector('#settings');

if (getOut.style.display == 'none' && userName)
{
    getOut.style.display = 'inline-block';
    logIn.style.display = 'none';
}
else
{
  getOut.style.display = 'none';
  logIn.style.display = 'inline-block';
}
login.addEventListener('click', (event)=>
{
  if (getOut.style.display == 'none')
  {
    window.open('/camagru/views/login.php', '_top');
  }
  else
  {
    window.open('/camagru/server/sign_out.php', '_top');
  }
});
home.addEventListener('click', (event)=>
{
  window.open('/camagru/views/home.php', '_top');
});
logo.addEventListener('click', (event)=>
{
  window.open('/camagru/views/home.php', '_top');
});
settings.addEventListener('click', (event)=>
{
  window.open('/camagru/views/dashboard.php', '_top');
});
window.addEventListener('load', (event) =>
{
  getOut.style.display = 'none';
});