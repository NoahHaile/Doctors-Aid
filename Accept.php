<?php
session_start();

if(isset($_GET['uname'])){
$pid = validate($_GET['uname']);


include('core/database.php');
$sql = "EXEC [dbo].[lookUpRequest] @docUserName =?,@patientUserName=?";
$stmt = sqlsrv_prepare($conn, $sql, array(&$_SESSION['Username'], &$pid),array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));

if(!sqlsrv_execute($stmt))
header("Location: AcceptChoice.php");

$row_count = sqlsrv_num_rows( $stmt );  

if($row_count<0)
header("Location: AcceptChoice.php");

$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

} else{
  header("Location: AcceptChoice.php");
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
    <title>Accept</title>   
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
         <link rel="stylesheet" href="css/notifcation.css" />
         <link rel="stylesheet" href="css/footer.css" />         
    <link rel="stylesheet" href="css/ChangeSymptomSetting.css">
    <link rel="stylesheet" href="css/ChangedieseaseSetting.css">           
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

       <section class="feedback" id="feedback"> 
        <div class="row">
           <div class="ima imo">
            <img src="images/profileProf.svg" alt="">
        </div>
        <form action="">
              <?php
              $sql = "EXEC [dbo].[findUser] @Username =?";
              $stmt = sqlsrv_prepare($conn, $sql, array(&$pid));
              if(!sqlsrv_execute($stmt))
                echo "error";
              $row2 = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
              $mime = "image/jpeg";
              $b64Src = "data:".$mime.";base64," . base64_encode($row2['photo']);  
              if($row2['photo']!=null)
              echo '<img class="img" src="'.$b64Src.'" alt="">';  
              else
              echo '<img class="img" src="images/avatar1.png" alt="">';                                    
              ?>
                <div class="lbl"><label class="lbl" for="name">Name</label></div>
                <input type="text" id="name" class="box" value='<?php echo $row2['Fname']." ".$row2['Lname']; ?>'>
                <div class="lbl"><label class="lbl" for="location">location</label></div>
                <input type="email"  id="location" class="box" value='<?php echo $row2['Address']; ?>'>
                <div class="lbl"><label class="lbl" for="bd">Birthdate</label></div>
                <input type="text" id="bd" class="box" value='<?php echo date_format($row2['Bdate'],"M d, Y"); ?>'>
            </form>     
        </div>
    
    </section>
    </section>
    <section class="services" id="services">
    <section class="feedback" id="feedback">    
    <div class="row"> 
        
    <form class="mess" name="form1" action="">
            <h3 class="opt">Message from patient</h3>
            <textarea class=" txtbox" value="<?php echo $row['message']; ?>"></textarea>
            <input type="text" name="uname" hidden disabled value="<?php echo $row2['Username']; ?>"/>

            <input type="submit" value="Add Patient" name="sub" class="btn btnmsg1">
        </form>
        <div class="ima imt">
            <img src="images/messageMes.svg" alt="">
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

<script>
var form = document.forms['form1'];
form['sub'].addEventListener('click',(e)=>{
e.preventDefault();
  fetch('http://localhost/Doctor%20aid/core/request.php', {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
    body: `accept=${form['uname'].value}`,
  })
  .then((response) => response.text())
  .then((res) => {
    if(res==1){
alert('Request Accepted successfully');
    } else{
alert('there was an error on the system'+ res);
    }
  });
  });
    </script>

    <script src="js/notifcation.js"></script>
    <script src="js/dark_mode.js"></script>
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