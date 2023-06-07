<?php
session_start();
include("core/database.php");

function validate($data){
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$check = 0;
$user = array();
if(isset($_POST['search'])){
  if($_SESSION['User_Type']=='Admin')
  $sql = "EXEC [dbo].[searchForUsers] @words =?";
  else
  $sql = "EXEC [dbo].[SearchForDoctor] @words =?";

  $check = 1;

  $word = validate($_POST['search']);

  $stmt = sqlsrv_prepare($conn, $sql, array(&$word));
  if(!sqlsrv_execute($stmt))
  header("Location: search.php?error=".sqlsrv_errors()[0]['message']);

  $num=0;

  while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
    if($row['photo']!=null){
      $mime = "image/jpeg";
      $b64Src = "data:".$mime.";base64," . base64_encode($row['photo']);       
      }else
      $b64Src = null;   

$user[] = array($b64Src, $row['Fname']." ".$row['Lname'], $row['User_Type'], $row['Address'], $row['Sex'], $row['Username']);
  }
  
}else if($_SESSION['User_Type']=='Patient'){
  
}

?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Search</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link rel="stylesheet" href="css/searchPatient.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/notifcation.css" />
    <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/delete.css" /> 
   <link rel="stylesheet" href="css/doctor2.css" />  
  </head>
  <body>
    <header class="header">
      <a href="Patient.html" class="logo">
        <i class="fas fa-heartbeat"></i> Doctor's Aid
      </a>
      <nav class="navbar">
        <a href="Patient.html"><i class="fa fa-home"></i> Home</a>        
        <a href="about-us.html"><i class="fa fa-info-circle"></i> About</a>
        <a href="profile.html"><i class="fa fa-user"></i> Profile</a>

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
    <h3>Search for <?php if(isset($_POST['search']))echo $_POST['search']; else echo "Users";?></h3>
      <form method="post" action="" style="background-color: inherit;">
      <input type="text" placeholder="Search for Users" name="search" required/>
      </form>
      <div class="row">
        <img class="arrow" id="arrowLeft" src="images/arrow-left.png" alt="" />
        <form name="user1" action="">
          
          <img class="img" src="images/doc-1.jpg" style="width:150px; height: 150px;" name="img" alt="" />
          
          <input type="text" placeholder="Name" class="box" name="name" disabled/>
          <input type="text" placeholder="user type" name="utype" class="box" disabled/>
          <input type="text" placeholder="address" name="address" class="box" disabled/>
          <?php
          if($_SESSION['User_Type']=="Admin")
          echo  '<input type="submit" value="Delete User" class="btn" name="delete"/>';
          else
          {
          echo  '<input type="submit" value="" class="btn" name="add"/>';
          }
          ?>
        </form>

        <form name="user2" action="">
         
          <img class="img" src="images/doc-1.jpg" style="width:150px; height: 150px;"  name="img" alt="" />
          
          <input type="text" placeholder="Name" class="box" name="name" disabled/>
          <input type="email" placeholder="your email" class="box"  name="utype" disabled/>
          <input type="email" placeholder="your email" class="box" name="address" disabled/>
          <?php
          if($_SESSION['User_Type']=="Admin")
          echo  '<input type="submit" value="Delete User" class="btn" name="delete"/>';
          else
          {
          echo  '<input type="submit" value="" class="btn" name="add"/>';
          }
          ?>        </form>
        <img class="arrow"  id="arrowRight" src="images/arrow-right.png" alt="" />
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
      
          if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }


    var users = JSON.parse('<?php echo JSON_encode($user); ?>');

   

    var prev = document.getElementById('arrowLeft');
    var next = document.getElementById('arrowRight');
    var user1 = document.forms['user1'];
    var user2 = document.forms['user2'];
    var i=0;

 setValues();
    function setValues(){
      if(users.length==0){
user1.style.display= "none";
user2.style.display= "none";
prev.style.display= "none";
next.style.display= "none";
      } else if(i + 1 >= users.length){
        user1.style.display= "block";
        user2.style.visibility= "hidden";
        if(user1['add']){
lookupRequest(users[i][5], 1);
        }
        user1['name'].value = users[i][1];
        user1['utype'].value = users[i][2];
        user1['address'].value = users[i][3];
     

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
        if(user1['add']){
lookupRequest(users[i][5], 1);
        }
        if(users[i][0]==null){

          if(users[i][4]=="Male")
        user1['img'].src = "images/doc-2.jpg";
        else
        user1['img'].src = "images/doc-1.jpg";
          }else
          user1['img'].src = users[i][0];

          if(user2['add']){
lookupRequest(users[i+1][5], 2);
        }
          user2['name'].value = users[i+1][1];
        user2['utype'].value = users[i+1][2];
        user2['address'].value = users[i+1][3];

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

    function deleteUser(i){
      fetch('http://localhost/Doctor%20aid/core/deleteUser.php', {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        body: `username=${users[i][5]}`,
      })
      .then((response) => response.text())
      .then((res) => {
        if(res==1){
console.log(res);
        } else{
console.log(res);
        }
      });
}

function lookupRequest(uname, n){
  fetch('http://localhost/Doctor%20aid/core/lookupRequest.php', {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        body: `username=${uname}`,
      })
      .then((response) => response.text())
      .then((res) => {
        if(n==1){
        if(res=='0'){
user1['add'].value='Add Doctor';
        } else if(res=='1'){
user1['add'].value='Already your Doctor';
        }else if(res=='2'){
user1['add'].value='Cancel your request';
        }else{
          alert(res);
        }
      } else if(n==2){
        if(res=='0'){
user2['add'].value='Add Doctor';
        } else if(res=='1'){
user2['add'].value='Already your Doctor';
        }else if(res=='2'){
user2['add'].value='Cancel your request';
        }else{
          alert(res);
        }
      }  
});
}
if(user1['delete']){
    user1['delete'].addEventListener('click',(e)=>{
      e.preventDefault();
      deleteUser(i);
    });
  }
  if(user2['delete']){
    user2['delete'].addEventListener('click',(e)=>{
      e.preventDefault();
      deleteUser(i+1);
    });
  }

  if(user2['add']){
    user2['add'].addEventListener('click',(e)=>{
      e.preventDefault();
      if(user2['add'].value=='Add Doctor'){
        window.location.replace("Selection.php?username="+users[i+1][5]);
      }else if(user2['add'].value=='Cancel your request'){
        window.location.replace("Selection.php?username="+users[i+1][5]);
      }
    });
  }
  if(user1['add']){
    user1['add'].addEventListener('click',(e)=>{
      e.preventDefault();
      if(user1['add'].value=='Add Doctor'){
        window.location.replace("Selection.php?username="+users[i][5]);
      }else if(user1['add'].value=='Cancel your request'){
        window.location.replace("Selection.php?username="+users[i][5]);

      }
    });
  }
    </script>
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
