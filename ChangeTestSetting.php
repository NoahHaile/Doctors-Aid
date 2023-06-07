<?php
 require('core/index.php');


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>   
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/ChangedieseaseSetting.css">
         <link rel="stylesheet" href="css/notifcation.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/alertBox.css" />
    <link rel="stylesheet" href="css/ceossHeader.css">
    
</head>
<body> 
     <header class="header">
     <a href="AdminHome.php" class="logo">
        <i class="fas fa-heartbeat"></i> Doctor's Aid
      </a>
      <nav class="navbar">
        <a href="AdminHome.php"><i class="fa fa-home"></i> Home</a>        
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
<div class="success-msg msg">
  <i class="fa fa-check"></i>
 It is success!
</div>


<div class="error-msg msg">
  <i class="fa fa-times-circle"></i>
 It is not successful!
</div>
        <div class="row">
        <form name="addMed" method="post" action="core/cts.php">
                <h3>Add<span>Test</span></h3>
                <div class="lbl"><label class="lbl" for="addName">Name</label></div>
                <input type="text" id="addName" name="name" placeholder="Name" class="box" required>
                <div class="lbl"><label class="lbl" for="addDesc">Description</label></div>
                <textarea name="dec" id="addDesc" class=" txtbox" required></textarea>
                <input type="submit" name="sub1" value="Add Test" class="btn btnmsg1">
            </form>

            <form action="core/cts.php" method="post" class="form2" name="form2">
                <h3>Edit <span>Test</span></h3>
                <select id="form2select" name="form2select">
                <option value="" disabled selected hidden>Select Test Type</option>
                <?php
                $sql = "EXEC [dbo].[getAllTest]";
                $stmt = sqlsrv_prepare($conn, $sql, array());
                if(!sqlsrv_execute($stmt))
                    die( print_r( sqlsrv_errors(), true));
                    $num=0;
                    $test = array();
                    while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
                    echo  "<option value='".$row['TID']."'>".$row['Tname']."</option>";
                  $test[$num++] = $row['Tname'];
                  $test[$num++] = $row['Tdescription'];
                  }
                ?>
                  </select>
                <div class="lbl"><label class="lbl" for="addName">Name</label></div>
                <input type="text" id="addName" placeholder="Name" class="box" name="name" required>
                <div class="lbl"><label class="lbl" for="addDesc">Description</label></div>
                <textarea id="addDesc" class="txtbox" name="txtbox"></textarea required>
                <input type="submit" value="Update Test" class="btn btnmsg1 " name="sub2">
            </form>


            <form  action="core/cts.php" method="post">
                <h3>Delete<span>Disease</span></h3>
                <select id="form3select" name="form3select">
                <option value="" disabled selected hidden>Select Disease</option>
                <?php
                $sql = "EXEC [dbo].[getAllTest]";
                $stmt = sqlsrv_prepare($conn, $sql, array());
                if(!sqlsrv_execute($stmt))
                    die( print_r( sqlsrv_errors(), true));
                    while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
                    echo  "<option value='".$row['TID']."'>".$row['Tname']."</option>";
                      }
                ?>
                </select>
                <input type="submit" name="sub3" value="Delete" class="btn btnmsg1">
            </form>

            <form  action="core/cts.php" method="POST">
                <h3>delete<span> Cross Referance</span></h3>
                <select id="country" name="form4select">
                <option value="" disabled selected hidden>Select Cross Referance</option>
                 <?php
                $sql = "EXEC [dbo].[getAllCrossTest]";
                $stmt = sqlsrv_prepare($conn, $sql, array());
                if(!sqlsrv_execute($stmt))
                    die( print_r( sqlsrv_errors(), true));
                    $did = array();
                    while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
                      echo  "<option value='".$row['TID']." ".$row['Did']."'>".$row['Tname']." Checks ".$row['Dname']."</option>";
                    
                      }
                ?>
                </select>
                <input type="submit"  value="Delete" class="btn btnmsg1" name="sub4">
            </form>

            <form action="core/cts.php" method="POST" class="more">
                <h3>Add <span> Cross Referance</span></h3>
                <div class="lbl"><label class="lbl" for="crossDis">Disease</label>
                </div>
                <select name="form5select1" name="form5select1">
                <option value="" disabled selected hidden>Select Test</option>
                  <?php
                $sql = "EXEC [dbo].[getAllTest]";
                $stmt = sqlsrv_prepare($conn, $sql, array());
                if(!sqlsrv_execute($stmt))
                    die( print_r( sqlsrv_errors(), true));
                    while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
                    echo  "<option value='".$row['TID']."'>".$row['Tname']."</option>";
                      }
                ?>
                </select>
                <div class="lbl"><label class="lbl" for="crossSym">Symptom</label>
                </div>
                <select name="form5select2" name="form5select2">
                <option value="" disabled selected hidden>Select Disease</option>
                  <?php
                $sql = "EXEC [dbo].[getAllDisease]";
                $stmt = sqlsrv_prepare($conn, $sql, array());
                if(!sqlsrv_execute($stmt))
                    die( print_r( sqlsrv_errors(), true));
                    while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
                    echo  "<option value='".$row['Did']."'>".$row['Dname']."</option>";
                      }
                ?>
                </select>
                <input type="submit"  value="Add cross Referance" class="btn btnmsg1" name="sub5">
            </form>

          
    
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
<script src="js/script.js"></script>
        <script src="js/notifcation.js"></script>
        <script src="js/dark_mode.js"></script>  
   <script src="js/delete.js"></script> 
    <script src="js/scriptt.js"></script>

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

    <script>
    var js_arr = '<?php echo JSON_encode($test);?>';
    var desease = JSON.parse(js_arr);

var form2select = document.forms["form2"]['form2select'];
var form2name = document.forms["form2"]['name'];
var form2txtbox = document.forms["form2"]['txtbox'];


form2select.addEventListener('change', (e) => {
form2name.value = desease[((e.target.selectedIndex-1)*2)];
form2txtbox.innerHTML = desease[((e.target.selectedIndex-1)*2)+1];
});
</script>
</html>