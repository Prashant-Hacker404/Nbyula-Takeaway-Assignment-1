const errorBox = document.querySelector('.error');
setTimeout(() => {
    errorBox.classList.add('close');
    console.log("hello")
}, 2000);


const navbar = document.querySelector('.navbar');

const mainNavbar = document.querySelector('.mainNavbar');

navbar.addEventListener("click",()=>{
    mainNavbar.classList.toggle('active');
})



