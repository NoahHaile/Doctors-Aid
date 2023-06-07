const form1=Array.from(document.querySelectorAll('form .login-form'));
const next=document.querySelectorAll('.main .next');
const back=document.querySelectorAll('.main .back');
const progress=document.getElementsByClassName(".main");
const col=document.querySelectorAll(".step .step-col");
const form=document.querySelector('form .login-form');
var userType = form.querySelector("#utype");
var fname = form.querySelector("#fname");
var lname = form.querySelector("#lname");
var submit = document.querySelector(".submit");
var pass = document.querySelector("#pass");
var cpass = document.querySelector("#cpass");
var sex = document.querySelector("#sex");
var birthdate = document.querySelector("#date");
var address = document.querySelector("#address");
var email = document.querySelector("#email");
var msg = document.getElementById("msg");
const formz=document.querySelector('form');

console.log(formz);

next.forEach(button=>{
    button.addEventListener('click' ,()=>{
        var go = true;
        if(button.id=="next1"){
            msg.classList.add("hide");
            msg.innerHTML = "";
            userType.style.border = "";
            fname.style.border = "";
            lname.style.border = "";
            if(userType.selectedIndex<1){
                userType.style.border = "2px solid #ff4242";
            msg.innerHTML += "please select usertype<br>";
            msg.classList.remove("hide");
            go = false;
            }
            if(fname.value==""){
                fname.style.border = "2px solid #ff4242";
                msg.innerHTML += "please insert first name<br>";
                msg.classList.remove("hide");
                go = false;
            }
             if(lname.value==""){
                lname.style.border = "2px solid #ff4242";
                msg.innerHTML += "please insert last name<br>";
                msg.classList.remove("hide");
                go = false;
            } 
            if(go){
            msg.classList.add("hide");
            changeStep('next');
            }
        } else if(button.id=="next2"){
            msg.classList.add("hide");
            msg.innerHTML = "";
            pass.style.border = "";
            cpass.style.border = "";
            sex.style.border = "";

            if(pass.value==""){
                pass.style.border = "2px solid #ff4242";
            msg.innerHTML += "Password can not be empty<br>";
            msg.classList.remove("hide");
            go=false;
            }
             if(pass.value.length<8){
                pass.style.border = "2px solid #ff4242";
            msg.innerHTML += "Password has to be more than 8 characters<br>";
            msg.classList.remove("hide");
            go=false;
            }
             if(cpass.value==""){
                cpass.style.border = "2px solid #ff4242";
                msg.innerHTML += "please enter confirm password<br>";
                msg.classList.remove("hide");
                go=false;
            } else{
                if(pass.value!=cpass.value){
                    pass.style.border = "2px solid #ff4242";
                    cpass.style.border = "2px solid #ff4242";
                    msg.innerHTML += "Passwords don't match<br>";
                    msg.classList.remove("hide");
                    go=false;
                }
            }
             if(sex.selectedIndex<1){
                sex.style.border = "2px solid #ff4242";
                msg.innerHTML += "Please select sex<br>";
                msg.classList.remove("hide");
                go=false;
            } 
            if(go){
            msg.classList.add("hide");
            changeStep('next');
            }
        }
    })
})

submit.addEventListener('click',(e)=>{
if(!validate())
e.preventDefault();
})

function validate(){
    var dateOfBirth = Date.parse(birthdate.value);
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var isgoodtogo = false;
    var go = true;
    msg.classList.add("hide");
    msg.innerHTML = "";
    birthdate.style.border = "";
    email.style.border = "";
    address.style.border = "";
    if(birthdate.value==""){
        birthdate.style.border = "2px solid #ff4242";
        msg.innerHTML += "Birthdate can not be empty<br>";
        msg.classList.remove("hide");
        go=false;
    } else{
        if(userType.selectedIndex==1){
            const minimumDateOfBirth = new Date();
            minimumDateOfBirth.setFullYear(minimumDateOfBirth.getFullYear()-21, minimumDateOfBirth.getMonth());
            console.log(minimumDateOfBirth);
        isWrongAge = (dateOfBirth> minimumDateOfBirth); 
        if(isWrongAge){
            birthdate.style.border = "2px solid #ff4242";
            msg.innerHTML += "Doctor must be atleast 21 years old<br>";
            msg.classList.remove("hide");
            go =false;
            }    
        } else if(userType.selectedIndex==2){
            const minimumDateOfBirth = new Date();
            minimumDateOfBirth.setFullYear(minimumDateOfBirth.getFullYear()-12, minimumDateOfBirth.getMonth());
            console.log(minimumDateOfBirth);
            isWrongAge = (dateOfBirth> minimumDateOfBirth); 
            if(isWrongAge){
                birthdate.style.border = "2px solid #ff4242";
                msg.innerHTML += "Patient must be atleast 12 years old<br>";
                msg.classList.remove("hide");
                go=false;
                }   
        }
    }
     if(email.value==""){
        email.style.border = "2px solid #ff4242";
        msg.innerHTML += "Email can not be empty<br>";
        msg.classList.remove("hide");
        go=false;
    }
     if(address.value==""){
        address.style.border = "2px solid #ff4242";
        msg.innerHTML += "Address can not be empty<br>";
        msg.classList.remove("hide");
        go=false;
    } 
    if(go){
        msg.classList.add("hide");
        isgoodtogo = true;
    }
    return isgoodtogo;
}

back.forEach(button=>{
    button.addEventListener('click',()=>{
        changeStep('back');
    })
})
initialize();
function changeStep(btn)
{
    let index=0;
    const active=document.querySelector('form .login-form.show');
    index=form1.indexOf(active);
    form1[index].classList.remove('show');
    form1[index].setAttribute("style","transition:0.7s;");
    if(btn === 'next')
    {
        index ++;
        
        if (index==1)
        {
            col[index-1].setAttribute("style","background-color: none; ");
         
        col[index].setAttribute("style","background-color: #e02020; width: 190px; padding: 5%; height: 96%; border-bottom-right-radius: 30px; border-bottom-right-radius: 30px;font-size: 20PX;transition:0.7s;border-top-left-radius: 30px;border-bottom-left-radius: 30px;");

        }
        if(index==2)
        {
            col[index-1].setAttribute("style","background-color: none; ");
            col[index-2].setAttribute("style","background-color: none; ");
            col[index].setAttribute("style","background-color: #e02020; width: 190px; padding: 5%; height: 96%; border-bottom-right-radius: 30px; border-bottom-right-radius: 30px;font-size: 20PX;transition:0.7s;border-top-left-radius: 30px;border-bottom-left-radius: 30px;");
        }
        
    }
    else if( btn === 'back'){
        index --;
        if (index==1)
        {
            col[index-1].setAttribute("style","background-color: none; ");
         col[index].setAttribute("style","background-color: #e02020; width: 190px; padding: 5%; height: 96%; border-bottom-right-radius: 30px; border-bottom-right-radius: 30px;font-size: 20PX;transition:0.7s;border-top-left-radius: 30px;border-bottom-left-radius: 30px;");
        col[index+1].setAttribute("style","background-color: none; ");
        }
        if (index==0)
        {
            col[index].setAttribute("style","background-color: #e02020; width: 190px; padding: 5%; height: 96%; border-bottom-right-radius: 30px; border-bottom-right-radius: 30px;font-size: 20PX;transition:0.7s;border-top-left-radius: 30px;border-bottom-left-radius: 30px;");
            col[index+1].setAttribute("style","background-color: none;transition:0.7s; ");
        }
        
    }
   
         
    
    form1[index].classList.add('show');

    
}
function initialize()
{
    col[0].setAttribute("style","width:190px;padding: 5%;height: 96%;background-color: #e02020; border-top-left-radius: 30px;border-bottom-left-radius: 30px;border-bottom-right-radius: 30px;border-bottom-right-radius: 30px;font-size: 20PX;")

}

