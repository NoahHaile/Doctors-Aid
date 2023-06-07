<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link rel="stylesheet" href="css/aboutUs.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/notifcation.css" />
    <link rel="stylesheet" href="css/footer.css" />
  <link rel="stylesheet" href="css/delete.css" /> 
   <link rel="stylesheet" href="css/doctor2.css" />  
  </head>
  <body>
    <header class="header">
      <a href="Patient.html" class="logo">
        <i class="fas fa-heartbeat"></i> Doctor's Aid
      </a>
      <nav class="navbar">
        <a href="Patient.php"><i class="fa fa-home"></i> Home</a>        
        <a href="About-us.php"><i class="fa fa-info-circle"></i> About</a>
        <a href="profile.php"><i class="fa fa-user"></i> Profile</a>

        <div class="icon" onclick="toggleNotifi()">
          <a><i class="fas fa-bell"></i></a>
        </div>
        <div class="notifi-box"  id="box">
        <h2>Notifications <span>5</span> <span class="X">X</span> </h2>
          
          <div class="notifi-item openModal">
            <img src="images/avatar1.png" alt="img" />
            <div class="text">
              <h4>Elias Abdurrahman</h4>
              <p>@lorem ipsum dolor sit amet</p>
            </div>
          </div>

          <div class="notifi-item openModal">
            <img src="images/avatar2.png" alt="img" />
            <div class="text">
              <h4>John Doe</h4>
              <p>@lorem ipsum dolor sit amet</p>
            </div>
          </div>

          <div class="notifi-item openModal">
            <img src="images/avatar3.png" alt="img" />
            <div class="text">
              <h4>Emad Ali</h4>
              <p>@lorem ipsum dolor sit amet</p>
            </div>
          </div>

          <div class="notifi-item openModal">
            <img src="images/avatar4.png" alt="img" />
            <div class="text">
              <h4>Ekram Abu</h4>
              <p>@lorem ipsum dolor sit amet</p>
            </div>
          </div>

          <div class="notifi-item openModal">
            <img src="images/avatar5.png" alt="img" />
            <div class="text">
              <h4>Jane Doe</h4>
              <p>@lorem ipsum dolor sit amet</p>
            </div>
          </div>
        </div>

        <a href="Faq.html"><i class="fa fa-question-circle"></i> Faq</a>
        <a href="sign-up.html" id="button-51"
          ><i class="fa fa-sign-out"></i>Logout</a
        >
      </nav>
      <div class="modal">   
<div class="modalContent">
<span class="close">×</span>
<section class="right-container">
                              <span>Reply to Notifcation</span>
                                <textarea name="" id="" cols="30" rows="10"></textarea>
                                              </section>
                                                  </section>
                                                       </section>
<button class="del" onclick="hideModal()">reply</button>
</div>
</div>
      <div id="menu-btn" class="fas fa-bars"></div>
    </header>
    <section class="about" id="about">
      <div class="row">
        <div class="image">
          <img src="images/about.png" alt="" />
        </div>

        <div class="content">
          <h3>who<span> we are</span></h3>
          <p>
            Doctors Aid Medical aid scheme is founded and run by collabrating
            with doctors to provide affordable quality health care for all as
            part of the doctors health system. the comprehensive healthcare
            system for all things health by doctors
          </p>
          <p>
            you get to have acsses to out Medical Doctors specialist in a
            varaity of fields and well equiped, prepared to come to your rescue
            at anytime.
          </p>
        </div>
      </div>
    </section>

    <section class="feedback" id="feedback">
      <h1 class="heading">Send <span>Feedback</span></h1>
      <div class="row">
        <div class="image">
          <img src="images/feedback.jpg" alt="" />
        </div>
        <form action="">
          <h3>share your comment</h3>
          <input type="email" placeholder="your email" class="box" />
          <textarea class="box">
 Your Comment
             </textarea
          >

          <input type="submit" value="Send" class="btn" />
        </form>
      </div>
    </section>
    <section class="footer">
    <div class="credit"> &#169 copyright reserved 2022</div>
</section>
<div class="foot">
  <button class="dark" ><img src="images/moon.png" alt="" id="moon"></button>
</div>
<script src="js/script.js"></script>
<script src="js/dark_mode.js"></script>
    <script src="js/main.js"></script>    
    <script src="js/notifcation.js"></script>    
   <script src="js/delete.js"></script>  
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
