const errorBox = document.querySelector('.error');
setTimeout(() => {
    errorBox.classList.add('close');
    console.log("hello")
}, 2000);


const plus = document.getElementById('plusIcon')

const btnSchedule = document.getElementById("addBox");

btnSchedule.addEventListener('click',()=>{
    plus.classList.toggle('active');
})

const home = document.getElementById('home');
const about = document.getElementById('about');
const myprofile = document.getElementById('myprofile');

const homepage = document.querySelector('.mainContent');

const aboutpage = document.querySelector('.about');

const profilePage = document.querySelector('.profilePage');


home.addEventListener('click',()=>{
    homepage.classList.add('active');
    aboutpage.classList.remove('active')
    profilePage.classList.remove('active')
})

about.addEventListener('click',()=>{
    homepage.classList.remove('active');
    aboutpage.classList.add('active')
    profilePage.classList.remove('active')
})


myprofile.addEventListener('click',()=>{
    homepage.classList.remove('active');
    aboutpage.classList.remove('active')
    profilePage.classList.add('active')
})




