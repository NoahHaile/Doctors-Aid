<?php
session_start();
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <title>profile</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/v4-shims.css">
    <link href="css/mesageBox.css" rel="stylesheet">
    <link href="css/profile.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
   <link rel="stylesheet" href="css/notifcation.css" /> 
     <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/footer.css" />
      <link rel="stylesheet" href="css/update.css">
      <link rel="stylesheet" href="css/profile.css">
<link rel="stylesheet" href="css/delete.css" /> 
   <link rel="stylesheet" href="css/doctor2.css" />
   <link rel="stylesheet" href="css/alertBox.css" />  
  </head>
  <body>
    <!-- containes all the header elements-->
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
        <div class="notifi-box" id="box" style="display: none;">
          <?php
          require("core/database.php");
          $sql = "select * from [dbo].[getMessages](?)";
          $stmt = sqlsrv_prepare($conn, $sql, array(&$_SESSION['Username']), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
if(sqlsrv_execute($stmt))
         
          $row_count = sqlsrv_num_rows( $stmt );  

         echo "<h2>Notifications <span>$row_count</span></h2>";

          while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
            echo '<div class="notifi-item">';
if($row['message_photo']!=null){
  $mime = "image/jpeg";
        $b64Src = "data:".$mime.";base64," . base64_encode($row["message_photo"]);         
        echo '<img src="'.$b64Src.'" alt="img" />';
}else 
echo "<img src='images/avatar1.png' alt='img' />";

echo "<div class='text'>";
          
echo "<h4>".$row['Sender_UName']."</h4>";
echo "<p>".$row['Message']."</p>";
echo "</div> </div>";
          }
          sqlsrv_close($conn);  

 ?>
         

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


    <section id="top-area">
      <div class="profile-info">
        <div class="pro-pic">
          <?php
          if($_SESSION["photo"]!=null){
            $mime = "image/jpeg";
            $b64Src = "data:".$mime.";base64," . base64_encode($_SESSION["photo"]);         
            echo '<img src="'.$b64Src.'" alt="" />';
          }else{
            echo '<img src="images/doc-1.jpg" />';
          }
          ?>
        </div>
        <div class="user-desc">
          <h3>
            <?php
            echo $_SESSION["Fname"].' '.$_SESSION["Lname"];
            ?></h3>
         <!--  <button>
            <i class="fas fa-notes-medical" id="iconS"></i>
            <a href="#">friend</a>

          </button>

          <button>
            <i class="fas fa fa-trash"></i>
            <a href="#">unfollow</a>
          </button> -->
        </div>
      </div>
      
    </section>
              <!-- <div class="success-msg">
           <i class="fa fa-check"></i>
                 It is success!
             </div>
           <div class="error-msg">
         <i class="fa fa-times-circle"></i>
         It is not successful!
                  </div> -->

    <section id="content-area">
      <div class="side-feed">
        <div class="widget-box bio">
          <div class="head">
            <div class="widget-icon-container">
              <div class="widget-icon">
                <i class="fa fa-globe" aria-hidden="true"></i>
              </div>
            </div>
            <div class="widget-title"><h3>Bio</h3></div>
          </div>
          <div class="body bio-body">
            
            
            <h2><i class="fas fa-map-marker-alt"></i> <?php echo $_SESSION["Address"];?></h2>
            <h2><i class="fas fa-edit"></i> Edit Profile</h2>
          </div>
        </div>

        <?php if($_SESSION["User_Type"]=="Doctor"){?>
        <div class="widget-box teams">
          <div class="head">
            <div class="widget-icon-container">
              <div class="widget-icon">
                <i class="fa fa-users" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <div class="widget-title"><h3>Friend Requst</h3></div>
          <?php 
          require 'core/database.php';
          $sql = "EXEC [dbo].[fetchRequests] @docUserName =?";
          
          $stmt = sqlsrv_prepare($conn, $sql, array(&$_SESSION["Username"]));
          if(!sqlsrv_execute($stmt))
          print_r(sqlsrv_errors());
          while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
                   echo "
                      <div class='body'>
                    <div class='event-friend'>                    
                                  <div class='friend'>
                                      <ul>
                                        ";
          
                                        $mime = "image/jpeg";
                                        $b64Src = "data:".$mime.";base64," . base64_encode($row['photo']);                                      
                                        echo "  <li><img src='$b64Src' alt='user'></li>";
                                        
                                        echo "<li>
                                              <h2>".$row['Fname']." ".$row['Lname']."</h2>
                                              <p>".$row['Address']."</p>";
          
                                         echo "   <button>confirm</button><button class='friend-remove'>remove</button>
                                          </li>
                                      </ul>
                                  </div>
                    </div>
                              </div>
                          ";
          }
          sqlsrv_close($conn);  
          
                              ?>
                              </div>
                  <?php }?>
          
        <div class="widget-box photos">
          <div class="head">
            <div class="widget-icon-container">
              <div class="widget-icon">
                <i class="fa fa-star" aria-hidden="true"></i>
              </div>
            </div>
            <div class="widget-title"><h3>History</h3></div>
          </div>
         <div class="body bio-body">
            <h2><i class="fas fa-map-marker-alt"></i>  <?php echo $_SESSION["Address"];?></h2>
            <h2><i class="fas fa-edit"></i> Edit Profile</h2>
          </div>
          </div>
      </div>


      <div class="main-feed"> 
        <div class="widget-box post postt"> 
          <div class="body post-body ">
     <section class="feedback" id="feedback">

        <div class="row">
           <div class="widget-title"><h3>Edit Profile</h3></div>
            <form name="form1"  method="post" action="core/updateProfile.php">
        <div class="lbl"><label class="lbl" for="Fname">First Name</label></div>
        <input type="text" id="Fname" name="fname" placeholder="" class="box" required>

        <div class="lbl"><label class="lbl" for="lName">Last Name</label></div>
        <input type="text" id="lName" name="lname" placeholder="" class="box" required>
        <div class="lbl"><label class="lbl" for="Address">Address</label></div>
        <input type="text" id="Address" name="address" placeholder="" class="box" required>
        <input type="submit" value="update" class="btn btnmsg1" name="sub1">
            </form>

            <div class="widget-title"><h3>Update photo</h3></div>  
            <form action="core/updateProfile.php" method="post" enctype="multipart/form-data"> 
        <div class="lbl"><label class="lbl " for="nPass">Photo</label></div>
        <input type="file" accept="image/*" id="medical" name="img" class="box" required>
        <input type="submit" value="update" class="btn btnmsg1" name="sub2">
            </form>

            <div class="widget-title"><h3>Update Password</h3></div> 
            <form name="form3" action="core/updateProfile.php" method="post"> 
        <div class="lbl"><label class="lbl " for="cPass">old password</label></div>
        <input type="text" id="pass" placeholder="" name="pass" class="box" required>
        <div class="lbl"><label class="lbl" for="Photo">New password</label></div>
        <input type="text" id="npass" placeholder="" name="npass" class="box" required>
        <input type="submit" value="update" class="btn btnmsg1" name="sub3">
    </form>
            
          </div>
          </section>
        </div>
       
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
    <script>
        var form1 = document.forms['form1'];
        var fname = '<?php echo $_SESSION['Fname'];?>';
        var lname = '<?php echo $_SESSION['Lname'];?>';
        var address = '<?php echo $_SESSION['Address'];?>';

        form1.querySelector("#Fname").value = fname;
        form1.querySelector("#lName").value = lname;
        form1.querySelector("#Address").value = address;


        var form3sub = document.forms['form3']['sub'];
        var pass = document.forms['form3'].querySelector("#pass");
        var npass = document.forms['form3'].querySelector("#npass");

        form3sub.addEventListener('click' ,(e)=>{
            if(npass.value.length<8){
            alert("Password can't be less than 8 char");
            e.preventDefault();
            }
          });
      

      </script>
  </body>
</html>
