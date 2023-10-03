let userBox = document.querySelector('.header .header-2 .user-box');
let navbar = document.querySelector('.header .header-2 .navbar');

document.querySelector('#user-btn').onclick = () =>{
   userBox.classList.toggle('active');
   navbar.classList.remove('active');
}


document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   userBox.classList.remove('active');
}

window.onscroll = () =>{
    userBox.classList.remove('active');
    navbar.classList.remove('active');
 
    if(window.scrollY > 60){
       document.querySelector('.header .header-2').classList.add('active');
    }else{
       document.querySelector('.header .header-2').classList.remove('active');
    }
 }

 var swiper = new Swiper(".reviews-slider",{
   loop:true,
   spaceBetween: 20,
   autoHeight: true,
   grabCursor: true,
   breakpoints: {
   640: {
       slidesPerView: 1,
     },
     768: {
       slidesPerView: 2,
     },
     1024: {
       slidesPerView: 3,
     },
   },
});