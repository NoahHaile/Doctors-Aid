<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="css/signin.css">
    <link rel="stylesheet" href="css/signDark.css">
    
    
    <title>Sign In</title>
</head>
<body>
    <section class="side">
        <img  class="img" src="images/two.svg" alt="">
    </section>
    
    <section class="main">
        <div class="login-container">
            <p class="title">Sigin in</p>
            <div class="separator"></div>
            <p class="welcome-message">fill in your credential to access to all our services</p>

            <form class="login-form">
                <div class="form-control">
                    <input type="text" placeholder="Username">
                    <i class="fas fa-user"></i>
                </div>
                <div class="form-control">
                    <input type="password" placeholder="Password">
                    <i class="fas fa-lock"></i>
                </div>

                <button class="submit">Login</button>
                <p class="end">If you are new <a href="sign-up.html" >sign up</a> here</p>

            </form>
        </div>
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