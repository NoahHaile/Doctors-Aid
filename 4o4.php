<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <title>404</title>
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/404.css" />
    <link rel="stylesheet" href="css/footer.css">
  </head>
  <body>
    <header class="header">
      <a href="#" class="logo">
        <i class="fas fa-heartbeat"></i> Doctor's Aid
      </a>
    </header>
  <body>
    <section class="home hol" id="home">
      <img class="img" src="images/404.svg" alt="" />
    </section>
    <section class="footer">
      <div class="credit"> &#169 copyright reserved 2022</div>
  </section>
  <div class="foot">
    <button class="dark" ><img src="images/moon.png" alt="" id="moon"></button>
  </div>

    <script src="js/dark_mode.js"></script> 
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
  </body>
</html>
