const login = document.querySelector('#getin');
const home = document.querySelector('#home');
const logo = document.querySelector('#logo-icon');

login.addEventListener('click', (event)=>{
  window.open('/camagru/views/login.php', '_top');
});
home.addEventListener('click', (event)=>{
  window.open('/camagru/views/home.php', '_top');
});
logo.addEventListener('click', (event)=>{
  window.open('/camagru/views/home.php', '_top');
});