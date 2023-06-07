<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cross Reference test</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link rel="stylesheet" href="css/searchPatient.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/notifcation.css" />
    <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/delete.css" /> 
   <link rel="stylesheet" href="css/ceossHeader.css" />  
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

    <section class="feedback" id="feedback"> 
      <h2>search type</h2>
       <div class="in"></label><input type="radio" id="inc" value="Inclusive" checked name="search-type">Inclusive
        <input  class="ex" type="radio" id="exc" value="Exclusive" name="search-type">Exclusive</div>
      <!-- <input class="search" type="text" placeholder="" name="search" id="select"/>      
          <input type="submit" id="del"  class="del" value="Delete" class="btn" /> -->
          <section class="other-section" >
          <select  name="" id="select" class="search" name="search" style="height: 6%;">
          </select>
          <button id="del" class="del" class="btn">Delete</button>
      </section>
          <div class="row">
         <form  class="fone" action="">
             <div class="lbl"><label class="lbl" for="bd">Test</label></div>
            <input type="text" id="disease" class="box">
            <input type="button" id="add" value="Add" class="btn" />
            <input type="button" id="finish" value="Finish" class="btn" />
          </form> 

       <form class="mess"action="">
            <h3 class="opt"> Required test</h3>
            <textarea name="" id="result" cols="30" rows="10"></textarea>
         </div>

      <section class="footer">
        <div class="credit"> &#169 copyright reserved 2022</div>
    </section>
    </section>
    
    <div class="foot">
      <button class="dark" ><img src="images/moon.png" alt="" id="moon"></button>
    </div>
<script src="js/script.js"></script>
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
    
    <script>


var add= document.getElementById('add');
var finish= document.getElementById('finish');
var disease= document.getElementById('disease');
var result= document.getElementById('result');
var del = document.getElementById('del');
const select = document.querySelector('#select'); 
var txt='';
function adder(){
  if(disease.value!=""){
  let newOption = new Option(disease.value,disease.value);
  select.add(newOption,undefined);
  disease.value="";
    }
    
}

add.addEventListener('click', ()=>{
adder();
});

del.addEventListener('click', ()=>{
  select.remove(select.selectedIndex); 
});

finish.addEventListener('click', ()=>{
  adder();
if(document.getElementById('inc').checked)
var checked=1;
else
var checked=2;
for(var i=0; i<select.options.length; i++){
  txt += select.options[i].value + ",";
}

fetch('http://localhost/Doctor Aidv11/core/crt.php', {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        body: `type=${checked}&word=${txt}`,
      })
      .then((response) => response.text())
      .then((res) => {
        console.log(res);
        if(res==''){
result.value='no Required Test found in the Database';
        } else{
result.value='';
const myArray = res.split("<br>");
for(var i = 0; i<myArray.length; i++)
result.value+=myArray[i]+'\r\n';
        }
while(select.options.length>0)
select.remove(0); 
txt="";
      });

});

</script>

  </body>
</html>
