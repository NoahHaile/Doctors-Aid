<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>doc Aid</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link rel="stylesheet" href="css/common.css" />    
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/main.css" />
  </head>
  <body>
    <header class="header">
      <a href="#" class="logo">
        <i class="fas fa-heartbeat"></i> Doctor's Aid
      </a>
       <nav class="navbar">
 <a href="sign-up.html" id="button-51"><i class="fa fa-sign-out"></i>Logout</a>
       </nav>
    </header>
    <section class="home hol" id="home">
      <div class="image">
        <img src="images/waiting.svg" alt="" />
      </div>
      <div class="content">
        <h2>WAITING <span>Room</span></h2>
        <p>
          You will be directed to another page once your account has been
          verified.
        </p>
        <a href="sign-in.html" class="btn btn-doc"> Logout</a>
      </div>
    </section>
    <section class="footer">
    <div class="credit"> &#169 copyright reserved 2022</div>
</section>
<div class="foot">
  <button class="dark" ><img src="images/moon.png" alt="" id="moon"></button>
</div>
<script>
  window.addEventListener("load", ()=>{
  var dmode = window.localStorage.getItem('dmode');
var icon = document.getElementById("moon");

if(dmode==null){
window.localStorage.setItem('dmode','light');
}

if(dmode=='dark'){
  document.body.classList.add("dark-mode");
  icon.src="sun.png";
}

});
</script>
<script src="js/dark_mode.js"></script>
  </body>
</html>
