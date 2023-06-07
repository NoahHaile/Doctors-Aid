<?php
session_start();

if(isset($_GET['pid'])){
$pid = validate($_GET['pid']);
if($pid=="" || !is_numeric($pid))
header("Location: diagnosischoice.php");

include('core/database.php');
$sql = "EXEC [dbo].[getPainById] @id=?, @dusername=?";
$stmt = sqlsrv_prepare($conn, $sql, array(&$pid, &$_SESSION['Username']),array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));

if(!sqlsrv_execute($stmt))
header("Location: diagnosischoice.php");

$row_count = sqlsrv_num_rows( $stmt );  

if($row_count<0)
header("Location: diagnosischoice.php");

$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

} else{
  header("Location: diagnosischoice.php");
}

function validate($data){
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosis</title>   
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
                            <h2 class="name">Cross Reference Symptom</h2>
                            <a href="CrosRefernceMedication.php" target="_blank" class="button">Cross Reference Symptom</a>
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
                            <h2 class="name">Cross Reference test</h2>
                            <a href="CrosRefernceTest.php" target="_blank" class="button">Cross Reference test</a>
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
                            <h2 class="name">Cross Reference medication</h2>
                            
                            <a href="CrosRefernceMedication.php" target="_blank" class="button">Cross Reference medication</a>
                            
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
                            <h2 class="name">Send Diagnosis</h2>                            
                            <a href="<?php echo "DiagnosisPage.php?pid=".$row['id']."&uname=".$row['Username']; ?>" class="button">Send Diagnosis</a>
                        </div>
                    </div>
                   
                   
                    </div>
            </div>

            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
        </div> 
    
        </div>
    
    </section>
    <section class="home" id="home">
 
      <div class="image">
        <img src="images/profile.svg" alt="" />
      </div>
        <div class="row">
        <form action="">
              <?php
              if($row['s_photo']!=null){
              $mime = "image/jpeg";
              $b64Src = "data:".$mime.";base64," . base64_encode($row["s_photo"]);         
              echo '<img src="'.$b64Src.'" alt="" width="300px"/>';             
             }else{
              echo '<img class="img"src="images/doc-1.jpg" alt="">';
             }
              ?>

                <div class="lbl"><label class="lbl" for="addName">Name</label></div>
                <input type="text" id="addName" placeholder="" class="box" disabled value="<?php echo $row['Fname']." ".$row['Lname']; ?>">                
                <div class="lbl"><label class="lbl" for="addName">location</label></div>
                <input type="text" id="addName" placeholder="" class="box" disabled value="<?php echo $row['Address']; ?>">
                <div class="lbl"><label class="lbl" for="addName">Birthdate</label></div>
                <input type="text" id="addName" placeholder="" class="box" disabled value="<?php echo date_format($row['Bdate'],"M d, Y"); ?>"><br>                
                <div class="lbl"><label class="lbl" for="addName">Days since beginning</label></div>
                <input type="text" id="addName" placeholder="" class="box" disabled value="<?php echo $row['Days']; ?>">                
                <div class="lbl"><label class="lbl" for="addName">pain level</label></div>
                <input type="text" id="addName" placeholder="" class="box" disabled value="<?php echo $row['pain_level']; ?>">
                <div class="lbl"><label class="lbl" for="addDesc">Symptoms</label></div>
                <textarea id="addDesc" class="txtbox" disabled><?php echo $row['symptoms']; ?></textarea>
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
    <script src="js/main.js"></script>
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