<?php
session_start();
if(!isset($_SESSION['Username']))
  header("Location: index.php");

if($_SESSION['User_Type']!="Doctor")
header("Location: index.php");

if($_SESSION['Verified']=="2")
header("Location: Deny.php");

if($_SESSION['Verified']=="1")
header("Location: Doctor.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Justifcation Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/addVerf.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/footer.css" />
 <link rel="stylesheet" href="css/main.css" />
  </head>
  <body>
    <header class="header">
      <a href="#" class="logo">
        <i class="fas fa-heartbeat"></i> Doctor's Aid
      </a>
       <nav class="navbar">
 <a href="sign-in.php" id="button-51"><i class="fa fa-sign-out"></i>Logout</a>
       </nav>
    </header>

        <div class="row">
            <form action="core/submitDoc.php" method="post" enctype="multipart/form-data">>
                <h3>Justifcation<span> Dashboard</span> </h3>
                <label for="medical">Upload medical document</label>
                <input type="file" id="medical" class="box" accept="image/*" name="medical" required><br>
                <label for="justfcation">input Additional Justifcation</label>
                <textarea id="justfcation" class="box" required name="just"></textarea><br>
                 <a href="core/signout.php" class="btn btn-doc"> Logout</a>
                <button name="btn" class="btn btn-doc"> Submit</button>
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