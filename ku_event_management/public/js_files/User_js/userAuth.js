const gotToLoginPageBtn  = document.getElementById('gotToLoginPageBtn');
const gotToRegisterPageBtn = document.getElementById('gotToRegisterPageBtn');
gotToLoginPageBtn.addEventListener('click',()=>{
    window.location.href = "/login"
})
gotToRegisterPageBtn.addEventListener('click',()=>{
    window.location.href = "/register"
})