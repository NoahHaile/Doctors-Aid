let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.navbar');
let next = document.querySelector('.next');
menu.onclick = () =>{
    menu.classList.toggle('fa-times');// to change the icon
    navbar.classList.toggle('active');
}
window.onscroll = () =>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');// calls acive from css
     
}
function next(){
document.querySelector('.next').style.color ='black';
} 