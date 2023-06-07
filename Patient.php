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
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/notifcation.css" />
    <link rel="stylesheet" href="css/footer.css" />
<link rel="stylesheet" href="css/delete.css" /> 
   <link rel="stylesheet" href="css/doctor2.css" />  
  </head>
  <body>
    <header class="header">
    <a href="Patient.php" class="logo">
        <i class="fas fa-heartbeat"></i> Doctor's Aid
      </a>
      <nav class="navbar">
        <a href="Patient.php"><i class="fa fa-home"></i> Home</a>        
        <a href="About-us.php"><i class="fa fa-info-circle"></i> About</a>
        <a href="profile.php"><i class="fa fa-user"></i> Profile</a>
        <div class="icon" onclick="toggleNotifi()">
          <a><i class="fas fa-bell"></i></a>
        </div>
        <div class="notifi-box" id="box">
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

        <a href="Faq.php"><i class="fa fa-question-circle"></i> Faq</a>
        <a href="sign-in.php" id="button-51"
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
    <section class="home" id="home">
      <div class="image">
        <img src="images/homee.svg" alt="" />
      </div>
      <div class="content">
        <h2><span>Stay</span> healthy and updated</h2>
        <p>
          find available doctor, you can then send friend requst and start Lorem
          ipsum dolor sit amet consectetur adipisicing elit. Ex vel a nulla
          beatae eligendi, optio, natus qui dolorum magnam tempora quam deserunt
          assumenda et?...
        </p>
        <a href="available-doc.html" class="btn btn-doc"> look for a doctor</a>
      </div>
    </section>

    <section class="services" id="services">
      <h1 class="heading">The <span>services</span> we provide</h1>
      
      <div class="box-container">
        <div class="box">
          <i class="fas fa-notes-medical"></i>
          <h3>FIll in sick form</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.
          </p>
          <a href="#" class="btn"> Fill in sick form </a>
        </div>

        <div class="box">
          <i class="fas fa-user-md"></i>
          <h3>Chat with doctors</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.
          </p>
          <a href="#" class="btn"> Chat with doc</a>
        </div>

        <div class="box">
          <i class="fas fa-ambulance"></i>
          <h3>Emergency Contacts</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.
          </p>
          <a href="#" class="btn"> Contact adress</a>
        </div>
      </div>
    </section>
    
<section class="footer">
    <div class="credit"> &#169 copyright reserved 2022</div>
</section>
<div class="foot">
  <button class="dark" ><img src="images/moon.png" alt="" id="moon"></button>
</div>
<script src="js/script.js"></script>
    <script src="js/main.js"></script>
    <script src="js/notifcation.js"></script>
    <script src="js/dark_mode.js"></script>  
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
