const login = document.querySelector('#getin');
const logIn = document.querySelector('#in');
var getOut = document.querySelector('#out');
const home = document.querySelector('#home');
const logo = document.querySelector('#logo-icon');

login.addEventListener('click', (event)=>{
  if (getOut.style.display == 'none')
  {
      window.open('/camagru/views/login.php', '_top');
      getOut.style.display = 'inline-block';
      logIn.style.display = 'none';
  }
  else
  {
    window.open('/camagru', '_top');
    getOut.style.display = 'none';
    logIn.style.display = 'inline-block';
  }
});
home.addEventListener('click', (event)=>{
  window.open('/camagru/views/home.php', '_top');
});
logo.addEventListener('click', (event)=>{
  window.open('/camagru/views/home.php', '_top');
});
window.addEventListener('load', (event) =>{
  getOut.style.display = 'none';
});