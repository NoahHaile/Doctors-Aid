<?php
session_start();
if(!isset($_SESSION['Username']))
  header("Location: index.php");

if($_SESSION['User_Type']!="Admin")
header("Location: index.php");

include('core/database.php');
$sql = "EXEC [dbo].[getAllVerRequest]";

$stmt = sqlsrv_prepare($conn, $sql, array());
if(!sqlsrv_execute($stmt))
echo sqlsrv_errors()[0]['message'];

$user= array();
while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
  if($row['photo']!=null){
    $mime = "image/jpeg";
    $b64Src = "data:".$mime.";base64," . base64_encode($row['message_photo']);       
    }else
    $b64Src = null;   

$user[] = array($b64Src, $row['Fname']." ".$row['Lname'], $row['Message'], $row['Address'], $row['Sender_UName']);
}

?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>doc Aid</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link rel="stylesheet" href="css/doctorVerif.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/notifcation.css" />    
    <link rel="stylesheet" href="css/footer.css" />
    <style>
        .modal {
  display: none; 
  position: fixed; 
  z-index: 1;
  padding-top: 100px; 
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto; 
  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0,0.9);
}

.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

    </style>
  </head>
  <body>
  <div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
</div>

    <header class="header">
    <a href="Patient.php" class="logo">
        <i class="fas fa-heartbeat"></i> Doctor's Aid
      </a>
      <nav class="navbar">
        <a href="Patient.php"><i class="fa fa-home"></i> Home</a>        
        <a href="About-us.php"><i class="fa fa-info-circle"></i> About</a>
        <a href="profile.php"><i class="fa fa-user"></i> Profile</a>
        <div class="icon" onclick="toggleNotifi()">
          <a><i class="fas fa-user-md"></i></a>
        </div>
        <div class="notifi-box" id="box">
          <<h2>Notifications <span>5</span> <span class="X">X</span> </h2>
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
      <h3>Verify Doctors</h3>
      <div  class="row">
        <img class="arrow" id="arrowLeft" src="images/arrow-left.png" alt="" />
        <form name="form1" action="">
        <img class="img" src="images/doc-1.jpg" style="width:150px; height: 150px;" name="img" alt="" />
          <input type="text" placeholder="Name" name="name" class="box" />
          <textarea placeholder="Justification" name="utype" rows="3" class="box"></textarea>
          <input type="text" placeholder="Address" name="address" class="box" />
          <input type="submit" value="Accept" name="accept" class="btn" />
          <input type="submit" value="Deny" name="delete" class="btn" />
        </form>

        <form name="form2" action="">
        <img class="img" src="images/doc-1.jpg" style="width:150px; height: 150px;" name="img" alt="" />
          <input type="text" placeholder="Name" name="name" class="box" />
          <textarea placeholder="Justification" name="utype" rows="3" class="box"></textarea>
          <input type="text" placeholder="Address" name="address" class="box" />
          <input type="submit" value="Accept" name="accept" class="btn" />
          <input type="submit" value="Deny" name="delete" class="btn" />
        </form>
        <img class="arrow" id="arrowRight" src="images/arrow-right.png" alt="" />
      </div>
    </section>
  <section class="footer">
    <div class="credit"> &#169 copyright reserved 2022</div>
</section>
<?php sqlsrv_close($conn); ?>
    <script src="js/main.js"></script>
    <script>
      
      if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}


var users = JSON.parse('<?php echo JSON_encode($user); ?>');



var prev = document.getElementById('arrowLeft');
var next = document.getElementById('arrowRight');
var user1 = document.forms['form1'];
var user2 = document.forms['form2'];
var i=0;

setValues();
function setValues(){
  if(users.length==0){
user1.style.display= "none";
user2.style.opacity = 0;
    user2.style.visibility= "hidden";
prev.style.display= "none";
next.style.display= "none";
  } else if(i + 1 >= users.length){
    user1.style.display= "block";
    user2.style.opacity = 0;
    user2.style.visibility= "hidden";

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
    user2.style.opacity = 1;
    user2.style.visibility= "visible";
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

function acceptUser(i){
  fetch('http://localhost/Doctor%20aid/core/DocVer.php', {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
    body: `accept=${users[i][4]}`,
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

function deleteUser(i){
  fetch('http://localhost/Doctor%20aid/core/DocVer.php', {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
    body: `delete=${users[i][4]}`,
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


user1['delete'].addEventListener('click',(e)=>{
  e.preventDefault();
  deleteUser(i);
});

user2['delete'].addEventListener('click',(e)=>{
  e.preventDefault();
  deleteUser(i+1);
});

user1['accept'].addEventListener('click',(e)=>{
  e.preventDefault();
  acceptUser(i);
});

user2['accept'].addEventListener('click',(e)=>{
  e.preventDefault();
  acceptUser(i+1);
});

var modal = document.getElementById("myModal");
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var header =  document.getElementsByClassName("header")[0];
user1['img'].onclick = function(){
  header.style.visibility = "hidden";
  header.style.opacity = 0;
  modal.style.display = "block";
  modalImg.src = this.src;
}
user2['img'].onclick = function(){
  header.style.visibility = "hidden";
  header.style.opacity = 0;

  modal.style.display = "block";
  modalImg.src = this.src;
}
var span = document.getElementsByClassName("close")[0];
span.onclick = function() { 
  header.style.visibility = "visible";
  header.style.opacity = 1;
  modal.style.display = "none";
}

</script>
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
  </body>
</html>
