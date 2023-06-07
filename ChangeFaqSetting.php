
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
    <link rel="stylesheet" href="css/ChangeSymptomSetting.css">
      <link rel="stylesheet" href="css/notifcation.css" />      
  <link rel="stylesheet" href="css/delete.css" /> 
   <link rel="stylesheet" href="css/doctor2.css" />  
    <link rel="stylesheet" href="css/alertBox.css" />
    <link rel="stylesheet" href="css/ceossHeader.css">
    <link rel="stylesheet" href="css/footer.css">
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

       <section class="feedback fe" id="feedback">
<div class="success-msg msg">
  <i class="fa fa-check"></i>
 It is success!
</div>


<div class="error-msg msg">
  <i class="fa fa-times-circle"></i>
 It is not successful!
</div>
        <div class="row">
        <form name="addMed" method="post" action="core/cfs.php">
                <h3>Add <span>FAQ</span></h3>
                <div class="lbl"><label class="lbl" for="addName">Name</label></div>
                <input type="text" id="addName" placeholder="Name" class="box" name="title">
                <div class="lbl"><label class="lbl" for="addDesc">Description</label></div>
                <textarea id="addDesc" class=" txtbox" name="info">
                </textarea>
                <input type="submit" name="sub1" value="Add FAQ" class="btn btnmsg1">
            </form>

            <form action="core/cfs.php" method="post" class="form2" name="form2">
                <h3>Edit<span> FAQ</span></h3>
                <select id="form2select" name="form2select">
                <option value="" disabled selected hidden>Select Faq</option>
                 <?php
                $sql = "EXEC [dbo].[getAllFaq]";
                $stmt = sqlsrv_prepare($conn, $sql, array());
                if(!sqlsrv_execute($stmt))
                    die( print_r( sqlsrv_errors(), true));
                    $num=0;
                    $faq = array();
                    while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){

                    echo  "<option value='".$row['fid']."'>".$row['title']."</option>";
                  $faq[$num++] = $row['title'];
                  $faq[$num++] = $row['info'];
                  }
                ?> 
                  </select>
                <div class="lbl"><label class="lbl" for="addName">Name</label></div>
                <input type="text" id="addName" placeholder="Name" class="box" name="name" required>
                <div class="lbl"><label class="lbl" for="addDesc">Description</label></div>
                <textarea id="addDesc" class="txtbox" name="txtbox"></textarea required>
                <input type="submit" name="sub2" value="Update FAQ" class="btn btnmsg1">
            </form>


            <form  action="core/cfs.php" method="post" class="form3">
                <h3>Delete<span> FAQ</span></h3>
                <select id="form3select" name="form3select">
                <option value="" disabled selected hidden>Select faq</option>
                  <?php
                $sql = "EXEC [dbo].[getAllFaq]";
                $stmt = sqlsrv_prepare($conn, $sql, array());
                if(!sqlsrv_execute($stmt))
                    die( print_r( sqlsrv_errors(), true));
                    while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
                    echo  "<option value='".$row['fid']."'>".$row['title']."</option>";
                      }
                ?>
                </select>
                <input type="submit" name="sub3" value="Delete" class="btn btnmsg1">
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
    var js_arr = '<?php echo JSON_encode($faq);?>';
    var faq = JSON.parse(js_arr);

var form2select = document.forms["form2"]['form2select'];
var form2name = document.forms["form2"]['name'];
var form2txtbox = document.forms["form2"]['txtbox'];


form2select.addEventListener('change', (e) => {
form2name.value = faq[((e.target.selectedIndex-1)*2)];
form2txtbox.innerHTML = faq[((e.target.selectedIndex-1)*2)+1];
});

  
  </script>
</body>
</html>