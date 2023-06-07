<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>   
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
         <link rel="stylesheet" href="css/notifcation.css" />
        <link rel="stylesheet" href="css/swiper-bundle.min.css">  
    <link rel="stylesheet" href="css/ChangeSymptomSetting.css">
    <link rel="stylesheet" href="css/ChangedieseaseSetting.css">
         <link rel="stylesheet" href="css/notifcation.css" />
        <link rel="stylesheet" href="css/diagnosis.css">             
    <link rel="stylesheet" href="css/footer.css" /> 
</head>
<body> 
    <header class="header">
    <a href="Doctor.php" class="logo">
        <i class="fas fa-heartbeat"></i> Doctor's Aid
      </a>
      <nav class="navbar">
        <a href="Doctor.php"><i class="fa fa-home"></i> Home</a>        
        <a href="About-us.php"><i class="fa fa-info-circle"></i> About</a>
        <a href="profile.php"><i class="fa fa-user"></i> Profile</a>

         <div class="icon" onclick="toggleNotifi()">
          <a><i class="fas fa-bell"></i></a>
        </div>
        <div class="notifi-box" id="box">
          <h2>Notifications <span>5</span> <span class="X">X</span> </h2>
          <div class="notifi-item">
            <img src="images/avatar1.png" alt="img" />
            <div class="text">
              <h4>Elias Abdurrahman</h4>
              <p>@lorem ipsum dolor sit amet</p>
            </div>
          </div>

          <div class="notifi-item">
            <img src="images/avatar2.png" alt="img" />
            <div class="text">
              <h4>John Doe</h4>
              <p>@lorem ipsum dolor sit amet</p>
            </div>
          </div>

          <div class="notifi-item">
            <img src="images/avatar3.png" alt="img" />
            <div class="text">
              <h4>Emad Ali</h4>
              <p>@lorem ipsum dolor sit amet</p>
            </div>
          </div>

          <div class="notifi-item">
            <img src="images/avatar4.png" alt="img" />
            <div class="text">
              <h4>Ekram Abu</h4>
              <p>@lorem ipsum dolor sit amet</p>
            </div>
          </div>

          <div class="notifi-item">
            <img src="images/avatar5.png" alt="img" />
            <div class="text">
              <h4>Jane Doe</h4>
              <p>@lorem ipsum dolor sit amet</p>
            </div>
          </div>
        </div>

        <a href="Faq.php"><i class="fa fa-question-circle"></i> Faq</a>
        <a href="sign-in.php" id="button-51"
          ><i class="fa fa-sign-out"></i>Logout</a
        >
      </nav>
      <div id="menu-btn" class="fas fa-bars"></div>
    </header>

       <section class="feedback" id="feedback">
        <div class="row">
           <div class="slide-content">
                <div class="card-wrapper swiper-wrapper">
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>

                            <div class="card-image">
                                <img src="images/profile1.png" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">Accept Patient</h2>
                            <p class="description">
                            Accepting and refusing new patients is part of managing a primary care practice, 
                            and physicians should be aware of this policies on this matter</p>

                            <a href="Accept.php"><button class="button">Accept Patient</button></a>
                        </div>
                    </div>
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>

                            <div class="card-image">
                                <img src="images/profile2.png" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">Diagnosis Patient</h2>
                            <p class="description">in order to become a recognised patient, 
                                the professional must accept and admit him or her as one.</p>
                                 <br><br>
                            <a href="diagnosis.php"><button class="button">Diagnosis Patient</button></a>
                           
                        </div>
                    </div>
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>

                            <div class="card-image">
                                <img src="images/profile3.png" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">Cross Reference medical test</h2>
                            <p class="description">The range helps show what a typical normal result looks like.
                           <a href="CrosRefernceTest.php"> <button class="button">Cross Reference medical test</button></a>
                            
                        </div>
                    </div>
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>

                            <div class="card-image">
                                <img src="images/profile4.png" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">Cross Reference Symptoms</h2>
                            <p class="description">view common causes, a possible diagnosis, treatments and more trusted medical information.</p>
                            
                            <a href="CrosRefernceSymptom.php"><button class="button">Cross Reference Symptoms</button></a>
                        </div>
                    </div>
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>

                            <div class="card-image">
                                <img src="images/profile5.png" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">Cross Reference Symptoms Medication</h2>
                            <p class="description">view medication for a possible disease</p>                    
                            <a href="CrosRefernceMedication.php"><button class="button">Cross Reference Symptoms Medication</button></a>
                        </div>
                    </div>
                   
                    </div>
            </div>

            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
        </div>     
         
<section class="footer">
    <div class="credit"> &#169 copyright reserved 2022</div>
</section>
<div class="foot">
  <button class="dark" ><img src="images/moon.png" alt="" id="moon"></button>
</div>
    <sctipt src="js/main.js"></script>
    <script src="js/notifcation.js"></script>    
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/dark_mode.js"></script>
    <script src="js/scriptt.js"></script>
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