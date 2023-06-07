<?php
 require('core/database.php');
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>   
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/ChangeMedSet.css">
         <link rel="stylesheet" href="css/notifcation.css" />
         <link rel="stylesheet" href="css/footer.css">
         <link rel="stylesheet" href="css/delete.css" /> 
    <link rel="stylesheet" href="css/ChangedieseaseSetting.css">
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
          <h2>Notifications <span>5</span></h2>
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
            <form name="addMed" method="post" action="core/cms.php">
                <h3>Add  <span>Medication</span></h3>
                <div class="lbl"><label class="lbl" for="addName">Name</label></div>
                <input type="text" id="addName" placeholder="Name" class="box" name="name" required>
                <div class="lbl"><label class="lbl" for="addDesc">Description</label></div>
                <textarea id="addDesc" class="txtbox"  name="dec" required></textarea>
                <input type="submit" value="Add Medication" class="btn btnmsg1" name="sub1">
            </form>

            <form  name="form2" method="post" action="core/cms.php">
                <h3>Edit <span>Medication</span></h3>
                <select id="form2select" name="form2select">
                <option value="" disabled selected hidden>Select Medication Type</option>
                <?php
                $sql = "EXEC [dbo].[getAllMedication]";
                $stmt = sqlsrv_prepare($conn, $sql, array());
                if(!sqlsrv_execute($stmt))
                    die( print_r( sqlsrv_errors(), true));
                    $num=0;
                    $medication = array();
                    while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
                    echo  "<option value='".$row['Mid']."'>".$row['Mname']."</option>";
                  $medication[$num++] = $row['Mname'];
                  $medication[$num++] = $row['Mdescription'];
                  }
                ?>
                  </select>
                <div class="lbl"><label class="lbl" for="addName">Name</label></div>
                <input type="text" id="addName" placeholder="Name" class="box" name="name" required>
                <div class="lbl"><label class="lbl" for="addDesc">Description</label></div>
                <textarea id="addDesc" class="txtbox" name="txtbox"></textarea required>
                <input type="submit" value="Update Medication" class="btn btnmsg1" name="sub2">
            </form>


            <form  method="post" action="core/cms.php">
                <h3>Delete <span>Disease</span></h3>
                <select id="form3select" name="form3select">
                <option value="" disabled selected hidden>Select Disease</option>
                <?php
                $sql = "EXEC [dbo].[getAllMedication]";
                $stmt = sqlsrv_prepare($conn, $sql, array());
                if(!sqlsrv_execute($stmt))
                    die( print_r( sqlsrv_errors(), true));
                    while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
                    echo  "<option value='".$row['Mid']."'>".$row['Mname']."</option>";
                      }
                ?>
                </select>
                <input type="submit" name="sub3" value="Delete" class="btn btnmsg1">
            </form>

            <form action="core/cms.php" method="post">
                <h3>delete <span>Cross Referance</span></h3>
                <select id="country" name="form4select">
                 <option value="" disabled selected hidden>Select Cross Referance</option>
                 <?php
                $sql = "EXEC [dbo].[getAllCrossMedication]";
                $stmt = sqlsrv_prepare($conn, $sql, array());
                if(!sqlsrv_execute($stmt))
                    die( print_r( sqlsrv_errors(), true));
                    $did = array();
                    while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
                    echo  "<option value='".$row['Did']." ".$row['Mid']."'>".$row['Mname']." Cures ".$row['Dname']."</option>";
                    
                      }
                ?>
                </select>
                <input type="submit" value="Delete" class="btn btnmsg1" name="sub4">
            </form>

            <form  action="core/cms.php" method="post">
                <h3>Add <span>Cross Referance</span></h3>
                <div class="lbl"><label class="lbl" for="crossDis">Medication</label>
                </div>
                <select id="crossDis" name="form5select1">
                  <option value="" disabled selected hidden>Select Disease</option>
                <?php
                $sql = "EXEC [dbo].[getAllMedication]";
                $stmt = sqlsrv_prepare($conn, $sql, array());
                if(!sqlsrv_execute($stmt))
                    die( print_r( sqlsrv_errors(), true));
                    while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
                    echo  "<option value='".$row['Mid']."'>".$row['Mname']."</option>";
                      }
                ?>
                </select>
                <div class="lbl"><label class="lbl" for="crossSym">Disease</label>
                </div>
                <select id="crossSym" name="form5select2">
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
                <input type="submit" value="Add cross Referance" class="btn btnmsg1" name="sub5">
            </form>

          
    
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

<?php
sqlsrv_close($conn);  
?>
        <script src="js/dark_mode.js"></script>
        <script src="js/notifcation.js"></script>


        <script>
    var js_arr = '<?php echo JSON_encode($medication);?>';
    var desease = JSON.parse(js_arr);

var form2select = document.forms["form2"]['form2select'];
var form2name = document.forms["form2"]['name'];
var form2txtbox = document.forms["form2"]['txtbox'];

form2select.addEventListener('change', (e) => {
form2name.value = desease[((e.target.selectedIndex-1)*2)];
form2txtbox.innerHTML = desease[((e.target.selectedIndex-1)*2)+1];
});
        </script>
</body>
</html>