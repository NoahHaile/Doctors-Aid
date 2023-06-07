<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Faq</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
    />
    <link rel="stylesheet" href="css/faq.css" />

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
    <div class="container">
      <h1 class="title">Frequenty <span>Asked</span> Questions</h1>

      <input type="text" placeholder="Search For patient" name="search" />
      <main class="accordion">
        <div class="faq-img">
          <img src="images/faq.svg" alt="" class="accordion-img" />
        </div>
        <div class="content-accordion">
          <div class="question-answer">
            <div class="question">
              <h3 class="title-question">Do you do a Front-end developer?</h3>
              <button class="question-btn">
                <span class="up-icon">
                  <i class="fas fa-chevron-up"></i>
                </span>
                <span class="down-icon">
                  <i class="fas fa-chevron-down"></i>
                </span>
              </button>
            </div>
            <div class="answer">
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Quisquam assumenda sapiente mollitia excepturi quos id magnam
                obcaecati non est? Maiores?
              </p>
            </div>
          </div>
          <div class="question-answer">
            <div class="question">
              <h3 class="title-question">
                What is the differrence between Front-end and Back-end?
              </h3>
              <button class="question-btn">
                <span class="up-icon">
                  <i class="fas fa-chevron-up"></i>
                </span>
                <span class="down-icon">
                  <i class="fas fa-chevron-down"></i>
                </span>
              </button>
            </div>
            <div class="answer">
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Quisquam assumenda sapiente mollitia excepturi quos id magnam
                obcaecati non est? Maiores?
              </p>
            </div>
          </div>
          <div class="question-answer">
            <div class="question">
              <h3 class="title-question">
                Which is better Front-end or Back-end?
              </h3>
              <button class="question-btn">
                <span class="up-icon">
                  <i class="fas fa-chevron-up"></i>
                </span>
                <span class="down-icon">
                  <i class="fas fa-chevron-down"></i>
                </span>
              </button>
            </div>
            <div class="answer">
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Quisquam assumenda sapiente mollitia excepturi quos id magnam
                obcaecati non est? Maiores?
              </p>
            </div>
          </div>
          <div class="question-answer">
            <div class="question">
              <h3 class="title-question">What is Front-end?</h3>
              <button class="question-btn">
                <span class="up-icon">
                  <i class="fas fa-chevron-up"></i>
                </span>
                <span class="down-icon">
                  <i class="fas fa-chevron-down"></i>
                </span>
              </button>
            </div>
            <div class="answer">
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Quisquam assumenda sapiente mollitia excepturi quos id magnam
                obcaecati non est? Maiores?
              </p>
            </div>
          </div>
          <div class="question-answer">
            <div class="question">
              <h3 class="title-question">What is Back-end?</h3>
              <button class="question-btn">
                <span class="up-icon">
                  <i class="fas fa-chevron-up"></i>
                </span>
                <span class="down-icon">
                  <i class="fas fa-chevron-down"></i>
                </span>
              </button>
            </div>
            <div class="answer">
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Quisquam assumenda sapiente mollitia excepturi quos id magnam
                obcaecati non est? Maiores?
              </p>
            </div>
          </div>
        </div>
      </main>
    </div>

    <div class="foot">
      <button class="dark" ><img src="images/moon.png" alt="" id="moon"></button>
    </div>
<script src="js/script.js"></script>
    <script src="js/dark_mode.js"></script>
    <script src="js/faq.js"></script>
    <script src="js/notifcation.js"></script>  
    <script src="js/faq.js"></script>  
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
