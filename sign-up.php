<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="css/signup.css">    
    <link rel="stylesheet" href="css/ChangeSymptomSetting.css">
    <title>Sign Up</title>
</head>
<body>
    <section class="main">


        <form action="core/register.php" method="post">
            <div class="login-container">
                <p class="title">Signup</p>
            </div>
            
            <div class="step">                
                    <div class="step-col col1">Step 1 </div>
                    <div class="step-col col2"><P>Step 2 </P></div>
                    <div class="step-col col3"><P>Step 3 </P></div>                   
            </div>

    <?php
        echo' <div id="msg" ';
        if(!isset($_GET['error']))
            echo'class="hide">';
        else
            echo '> '.$_GET['error'];
        echo '</div>';
    ?>

            <div  class="login-form show">

                <div class="form-control">
                    <select id="utype" name="utype">
                    <option value="" disabled selected hidden>Select User Type</option>
                        <option value="Doctor">Doctor</option>
                        <option value="Patient">Patient</option>
                      </select>
                    <div class="lbl"><label class="lbl" for="addName"></label>
                    </div>
                    
                    <i class="fas fa-user"></i>
                </div>
                <div class="form-control">
                    <input type="text" id="fname" name="fname" placeholder="First Name">
                    <i class="fas fa-user"></i>
                </div>
                <div class="form-control">
                    <input type="text" id="lname" name="lname" placeholder="Last Name">
                    <i class="fas fa-user"></i>
                </div>
                

                <button type="button" id="next1" class="next">Next</button>
                <p class="end">Already have an account? <a href="sign-in.php">sign in</a> here</p>



            </div>

            <div class="login-form">
               
                <div class="form-control">
                    <input type="password" name="pass" id="pass" placeholder="Password">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="form-control">
                    <input type="password" name="cpass" id="cpass" placeholder="Confirm Password">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="form-control">
                <select id="sex" name="sex">
                    <option value="" disabled selected hidden>Sex</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                      <i class="fas fa-user"></i>
                </div>

                <button type="button" class="back">Back</a></button>
                <button type="button" id="next2" class="next">Next</a></button>
            </div>

            <div class="login-form">
             
               
                <div class="form-control">
                    <input id="date" name="bdate" type="date" placeholder="Birthday">
                    <i class="fas fa-birthday-cake"></i>
                </div>
                <div class="form-control">
                    <input id="email" name="email" type="text" placeholder="username">
                    <i class="fas fa-email"></i>
                </div>
                <div class="form-control">
                    <input id="address" name="address" type="text" placeholder="Address">
                    <i class="fas fa-address"></i>
                </div>
                <button type="button" class="back">Back</a></button>
                <input type="submit" name="submit" class="submit"></input>
            </div>
        </form>
        
    </section>
    
    <section class="side">
        <img class="img" src="images/signup.svg" alt="">
    </section>  
    <div class="foot">
        <button class="dark" ><img src="images/moon.png" alt="" id="moon"></button>
      </div>
      <script src="js/dark_mode.js"></script> 
    <script src="js/forms.js"></script>
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