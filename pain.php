<?php
session_start();

if($_SESSION["User_Type"]!="Patient")
header("Location: index.php");

include 'core/database.php';
$sql = "EXEC [dbo].[getPatientDoctors] @username =?";
$stmt = sqlsrv_prepare($conn, $sql, array(&$_SESSION['Username']));
if(!sqlsrv_execute($stmt))
echo sqlsrv_errors()[0]['message'];

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/ChangedieseaseSetting.css">
    <link rel="stylesheet" href="css/main.css">
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
        <a href="#" class="logo"> <i class="fas fa-heartbeat"></i> Doctor's Aid </a>
       </header>
       <section class="feedback " id="feedback">
        <div class="row"> 
           
        <form action="">
                <h3>you</h3>
                <?php
              if($_SESSION['photo']!=null){
              $mime = "image/jpeg";
              $b64Src = "data:".$mime.";base64," . base64_encode($_SESSION["photo"]);         
              echo '<img src="'.$b64Src.'" alt="" style="max-width: 150px; max-height: 150px;"/>';             
             }else{
              if($_SESSION['Sex']=='Male')
              echo '<img class="img"src="images/doc-1.jpg" alt="">';
              else
              echo '<img class="img"src="images/doc-2.jpg" alt="">';
             }
              ?>                <div class="lbl"><label class="lbl" for="name">Name</label></div>
                <input type="text" id="name" class="box" value="<?php echo $_SESSION['Fname']." ".$_SESSION['Lname']; ?>" disabled>
                <div class="lbl"><label class="lbl" for="location">location</label></div>
                <input type="text"  id="location" class="box" value="<?php echo $_SESSION['Address']; ?>" disabled>
                <div class="lbl"><label class="lbl" for="bd">Birthdate</label></div>
                <input type="text" id="bd" class="box" value="<?php echo date_format($_SESSION['Bdate'],"M d, Y"); ?>" disabled>
            </form>
           
            <form name="form2" action="" >
                <div class="lbl"><label class="lbl lblselect" for="country">Select Doctor</label> 
                <select id="country" name="select">
                <option selected disabled hidden>select doctor</option>
                <?php
                $docs = array();
                while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
                  echo "<option value=".$row['Username'].">".$row['Fname']." ".$row['Lname']."</option>";

                  if($row['photo']!=null){
                    $mime = "image/jpeg";
                    $b64Src = "data:".$mime.";base64," . base64_encode($row['photo']);       
                    }else
                    $b64Src = null;   
                $docs[] = array($b64Src, $row['Fname']." ".$row['Lname'], $row['Address'],  date_format($_SESSION['Bdate'],"M d, Y"),$row['Sex'], $row['Username']);
                  }
                ?>

                  </select></div>
               
                 
                <img class="img" name="img" src="images/doc-1.jpg" alt="">
                <div class="lbl"><label class="lbl" for="name">Name</label></div>
                <input type="text" name="name" id="name" class="box" disabled>
                <div class="lbl"><label class="lbl" for="location">location</label></div>
                <input type="email" name="location" id="location" class="box" disabled>
                <div class="lbl"><label class="lbl" for="bd">Birthdate</label></div>
                <input type="text" name="birthdate" id="bd" class="box" disabled>
            </form>
              
        </div>

    
    </section>
    </section>
     <section class="services" id="services"> 
    <section class="feedback" id="feedback">    

    <div class="row"> 
          <form name="form3" method="post" action="core/submitPain.php" class="fo"  enctype="multipart/form-data">    
          <div class="lbl"><label class="lbl la" for="name">Symptoms</label></div>
                <textarea  id="txt" rows="3" class="box" name="symptom" required></textarea>     
                <div class="lbl"><label class="lbl la" for="name">Days of Begning</label></div>
                <input type="number" id="name" class="box" name="days" required>     
                <input type="text" id="name" class="box" name="duname"  hidden>              
                <input type="text" id="name" class="box" name="puname" value="<?php echo $_SESSION['Username']; ?>" hidden>              
         
        <div class="lbl"><label class="lbl " for="nPass"> Upload Photo</label></div>
        <input type="file" id="medical" name="img" class="box" accept="image/*">
      
                <div class="lbl"><label class="lbl lu" for="country">pain Level</label></div>
                <select id="country" name="level">
                    <option value="1">1 - Painless</option>
                    <option value="2">2 - Low</option>
                    <option value="3">3 - Midium low</option>
                    <option value="4">4 - Midium</option>
                    <option value="5">5 - Midium High</option>
                    <option value="6">6 - High</option>
                    <option value="7">7 - Agonizing</option>

                  </select>
        <input type="submit" value="Submit" name="sub" class="btn btnmsg1">
                  </form>      
    
         <div class="ima imk">
            <img src="images/messageTwo.svg" alt="">
        </div>
        
    </div>
    </section>
    
   
</section>
      <section class="footer">
    <div class="credit"> &#169 copyright reserved 2022</div>
</section>
<div class="foot">
  <button class="dark" ><img src="images/moon.png" alt="" id="moon"></button>
</div>
<script src="js/dark_mode.js"></script>
    <script src="js/notifcation.js"></script>  
   <script src="js/delete.js"></script> 
    <script src="js/scriptt.js"></script>
    <script>

var doc = JSON.parse('<?php echo JSON_encode($docs); ?>');

var form2select = document.forms["form2"]['select'];
var form2name = document.forms["form2"]['name'];
var form2location = document.forms["form2"]['location'];
var form2birthday = document.forms["form2"]['birthdate'];
var form2img = document.forms["form2"]['img'];

form2select.addEventListener('change', (e) => {
form2name.value = doc[e.target.selectedIndex-1][1];
form2location.value = doc[e.target.selectedIndex-1][2];
form2birthday.value = doc[e.target.selectedIndex-1][3];
if(doc[e.target.selectedIndex-1][0]!=null)
form2img.src = doc[e.target.selectedIndex-1][0];
else if(doc[e.target.selectedIndex-1][4]=="Male")
form2img.src = "images/doc-1.jpg";
else
form2img.src = "images/doc-2.jpg";

document.forms["form3"]['duname'].value = doc[e.target.selectedIndex-1][5];
});



    </script>

<?php 
sqlsrv_close($conn);  
?>
</body>
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
</html>