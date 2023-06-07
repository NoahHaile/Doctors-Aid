<?php
session_start();

include("core/database.php");

function validate($data){
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if(isset( $_GET['username'])){
$username = validate($_GET['username']);
$sql = "EXEC  [dbo].[findUser] @Username =?";

$stmt = sqlsrv_prepare($conn, $sql, array(&$username), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
if(!sqlsrv_execute($stmt))
    echo sqlsrv_errors()[0]['message'];

$row_count = sqlsrv_num_rows( $stmt );
if($row_count==0){
header('location: 404.php');
} else{
$row  = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
}
}else
header('location: search.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>   
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
         <link rel="stylesheet" href="css/notifcation.css" />
         <link rel="stylesheet" href="css/footer.css" />         
    <link rel="stylesheet" href="css/selection.css">
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

       <section class="feedback " id="feedback">
       <div class="row">
            <form action="">
                <img class="img"src="images/doc-1.jpg" alt="">
                <h3>You</h3>
                <input type="text" placeholder="Name" class="box" value='<?php echo $_SESSION['Fname']." ".$_SESSION['Lname']; ?>' disabled>
                <input type="text" placeholder="your email" class="box" value='<?php echo $_SESSION['Address']; ?>' disabled>
                <input type="text" placeholder="your email" class="box" value='<?php echo date_format($_SESSION['Bdate'],"M d, Y"); ?>' disabled>
            </form>

            <form action="">
                <img class="img"src="images/doc-1.jpg" alt="">
                <h3>Doctor</h3>
                <input type="text" placeholder="Name" class="box" value='<?php echo $row['Fname']." ".$row['Lname']; ?>' disabled>
                <input type="text" placeholder="your email" class="box" value='<?php echo $row['Address']; ?>' disabled>
                <input type="text" placeholder="your email" class="box" value='<?php echo date_format($row['Bdate'],"M d, Y"); ?>' disabled>
            </form>
          
    
        </div>
    
    </section>
    </section>
    <section class="services" id="services">
    <section class="feedback" id="feedback">    
    <div class="row"> 
       
    <form name="msgform" class="mess" name action="">
            <h3 class="opt">optional Message to doctor</h3>
            <input type="txt" name="sendto" value="<?php echo $row['Username']; ?>" hidden disabled>
            <?php 
            $sql = "EXEC  [dbo].[lookUpRequest] @docUserName =?,@patientUserName=?";

            $stmt = sqlsrv_prepare($conn, $sql, array(&$username, &$_SESSION['Username']), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
            if(!sqlsrv_execute($stmt))
                echo sqlsrv_errors()[0]['message'];
            
            $row_count = sqlsrv_num_rows( $stmt );
            if($row_count==0){
              echo '<textarea name="txtmsg" class="txtbox" required></textarea>';
              echo '<input type="submit" id="send" name="send" value="Send request" class="btn btnmsg1">';
            } else{
              $row2 = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
              if($row2['accept']==1){
              echo '<textarea name="txtmsg" class="txtbox">'.$row2['message'].'</textarea>';
              echo '<input type="submit" name="already" value="Already Friends" class="btn btnmsg1">';
              }else{
                echo '<textarea name="txtmsg" class="txtbox">'.$row2['message'].'</textarea>';
                echo '<input type="submit" name="cancel" value="Cancel request" class="btn btnmsg1">';
              }
            }
            ?>

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
</section>

<div class="foot">
<button class="dark" ><img src="images/moon.png" alt="" id="moon"></button>
</div>
<script src="js/script.js"></script>
    <script src="js/notifcation.js"></script>
    <script src="js/dark_mode.js"></script>
    <script src="js/notifcation.js"></script>  
   <script src="js/delete.js"></script> 
    <script src="js/scriptt.js"></script>
       <script>
var form = document.forms['msgform'];

if(form['send']){
  form['send'].addEventListener('click',(e)=>{
e.preventDefault();
if(form['txtmsg'].value!=''){
  fetch('http://localhost/Doctor%20aid/core/request.php', {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
    body: `sendto=${form['sendto'].value}&msg=${form['txtmsg'].value}`,
  })
  .then((response) => response.text())
  .then((res) => {
    if(res==1){
alert('Request successfully sent');
    } else{
alert('there was an error on the system'+res);
    }
  });
}
  });
}

if(form['cancel']){
  form['cancel'].addEventListener('click',(e)=>{
e.preventDefault();
  fetch('http://localhost/Doctor%20aid/core/request.php', {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
    body: `cancel=${form['sendto'].value}`,
  })
  .then((response) => response.text())
  .then((res) => {
    if(res==1){
alert('Request removed successfully');
    } else{
alert('there was an error on the system'+ res);
    }
  });
  });
}

if(form['already']){
  form['already'].addEventListener('click',(e)=>{
e.preventDefault();
  });
}
    </script>
</body>
</html>