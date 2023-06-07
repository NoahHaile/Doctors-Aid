let menuu = document.querySelector('#menu-btn');
let navbarr = document.querySelector('.navbar');

menuu.onclick = () =>{
    menuu.classList.toggle('fa-times');
    navbarr.classList.toggle('active');
}

window.onscroll = () =>{
    menuu.classList.remove('fa-times');
    navbarr.classList.remove('active');
}