<?php
session_start();
require("core/database.php");

$sql = "EXEC [dbo].[getSickForm] @docUserName =?";

  $stmt = sqlsrv_prepare($conn, $sql, array(&$_SESSION['Username']));
  if(!sqlsrv_execute($stmt))
  header("Location: diagnosisChoice.php?error=".sqlsrv_errors()[0]['message']);

  $num=0;
  $diagnosis = array();
   while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
    if($row['photo']!=null){
      $mime = "image/jpeg";
      $b64Src = "data:".$mime.";base64," . base64_encode($row['photo']);       
      }else
      $b64Src = null;   

$diagnosis[] = array($b64Src, $row['Fname']." ".$row['Lname'], $row['Days'], $row['symptoms'],$row['Sex'], $row['id']);
    }
?>
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
    <link rel="stylesheet" href="css/seeUsers.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/notifcation.css" />
    <link rel="stylesheet" href="css/footer.css">
 <link rel="stylesheet" href="css/delete.css" /> 
   <link rel="stylesheet" href="css/doctor2.css" />  
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

    <section class="feedback fs" id="feedback">
      <h3>Diagnosis List</h3>

      <div class="row">
        <img class="arrow" id ="arrowLeft" src="images/arrow-left.png" alt="" />
        <form name="user1" action="diagnosis.php" method="get">
          <img name="img" class="img" src="images/doc-1.jpg" alt="" />
          <input type="text" placeholder="Name" name="name" class="box" disabled/>
          <input type="text" name="uname" disabled hidden/>
          <textarea name="address" id="" class="box"  rows="3" disabled></textarea>
         <input type="text" name="utype" placeholder="days" class="box" disabled />
         <a type="submit" id="sub1" class="btn">Diagnose Patient</a>
        </form>

        <form name="user2" action="diagnosis.php" method="get">
          <img name="img" class="img" src="images/doc-1.jpg" alt="" />
          <input type="text" placeholder="Name"  name="name" class="box" disabled/>
          <input type="text" name="uname" disabled hidden/>
          <textarea name="address"  rows="3" class="box"  disabled></textarea>
          <input type="text" name="utype" placeholder="days" class="box" disabled/>
          <a type="submit" id="sub2" class="btn">Diagnose Patient</a>
        </form>
        <img class="arrow" id="arrowRight" src="images/arrow-right.png" alt="" />
      </div>

      <section class="footer">
        <div class="credit"> &#169 copyright reserved 2022</div>
    </section>
    </section>
    
    <div class="foot">
      <button class="dark" ><img src="images/moon.png" alt="" id="moon"></button>
    </div>
    <?php
sqlsrv_close($conn);
?>
<script>   

var users = JSON.parse('<?php echo JSON_encode($diagnosis); ?>');
var prev = document.getElementById('arrowLeft');
    var next = document.getElementById('arrowRight');
    var user1 = document.forms['user1'];
    var user2 = document.forms['user2'];
    var i=0;

    setValues();
    
function setValues(){
      if(users.length==0){
user1.style.display= "none";
user2.style.visibility= "hidden";
prev.style.display= "none";
next.style.display= "none";
      } else if(i + 1 >= users.length){
        user1.style.display= "block";
        user2.style.visibility= "hidden";

        user1['name'].value = users[i][1];
        user1['utype'].value = users[i][2];
        user1['address'].value = users[i][3];
        user1['uname'].value = users[i][5];
        document.getElementById('sub1').href = 'diagnosis.php?pid='+users[i][5];

        if(users[i][0]==null){
          if(users[i][4]=="Male")
        user1['img'].src = "images/doc-2.jpg";
        else
        user1['img'].src = "images/doc-1.jpg";
          }else
          user1['img'].src = users[i][0];

          if (i == 0)
                    prev.style.display = "none";
                else
                    prev.style.display = "block";
                    next.style.display = "none";

      } else{
        user1.style.display= "block";
        user2.style.visibility= "visible";
        
        user1['name'].value = users[i][1];
        user1['utype'].value = users[i][2];
        user1['address'].value = users[i][3];
        user1['uname'].value = users[i][5];
        document.getElementById('sub1').href = 'diagnosis.php?pid='+users[i][5];

        if(users[i][0]==null){

          if(users[i][4]=="Male")
        user1['img'].src = "images/doc-2.jpg";
        else
        user1['img'].src = "images/doc-1.jpg";
          }else
          user1['img'].src = users[i][0];

          user2['name'].value = users[i+1][1];
        user2['utype'].value = users[i+1][2];
        user2['address'].value = users[i+1][3];
        user2['uname'].value = users[i+1][5];
        document.getElementById('sub2').href = 'diagnosis.php?pid='+users[i+1][5];

          if(users[i+1][0]==null){
          if(users[i+1][4]=="Male")
        user2['img'].src = "images/doc-2.jpg";
        else
        user2['img'].src = "images/doc-1.jpg";
          }else
          user2['img'].src = users[i+1][0];

          if (i + 2 == users.length)
              next.style.display= "none";
          else
              next.style.display= "block";
         
          if (!(i < 2))
              prev.style.display= "block";
          else
              prev.style.display= "none";

      }
    }
    prev.addEventListener('click',(e)=>{
      if (i - 2 >= 0)
            {
                i -= 2;
                setValues();
                if (i < 2)
                prev.style.display= "none";

            }
            else
            {
              prev.style.display= "none";
              alert("Already at First Result");
            }
    });

    next.addEventListener('click',(e)=>{
      if (i + 2 < users.length)
            {
                i += 2;
                setValues();
            }
            else
            {
              next.style.display= "none";
              alert("Already at Last Result");
            }
    });
</script>
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
