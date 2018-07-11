
function valpas(){
    var pass = document.getElementById('pass').value;
    var cpass = document.getElementById('cpass').value;
    
    if(pass !== cpass){
        document.getElementById('cpassText').innerHTML = '<span style="color:#f00;" >can you please enter the same password</span>';
        document.getElementById('cpass').value = "";
        document.getElementById('btn').focous();
    }
    
    if(pass === cpass){
        document.getElementById('cpassText').innerHTML = '<span style="color:#090;" >Confrim Password</span>';
    }
}

function checkPassword()
{
    var pass = document.getElementById('pass').value;
    
}


function valemailformat(){
    
    var email = document.getElementById('email').value;
    document.getElementById('emailMessage').innerHTML = '<span>Email</span>';
    
    if(isNaN(parseFloat(email.substring(0,1)))==false){
       document.getElementById('emailMessage').innerHTML = '<span style="color:#f00;" >An email can\'t start with a number </span>';
       document.getElementById('email').value = "";
    }
    
    var re = /\S+@\S+\.\S+/;
    if(re.test(email) === false){
        document.getElementById('emailMessage').innerHTML = '<span style="color:#f00;" >Your email is not in the correct format</span>';
    };

    var re = /\S+@@\S+\.\S+/;
    if(re.test(email) === true){
        document.getElementById('emailMessage').innerHTML = '<span style="color:#f00;" >Your email is not in the correct format</span>';
    };
    
    var num = email.indexOf("@");
    if(num <3 ){
        document.getElementById('emailMessage').innerHTML = '<span style="color:#f00;" >Your email is not in the correct format it should have more than 2 charectors before the @ sing eg example@website.com</span>';
    };
}

function valConEmail(){
    var email = document.getElementById('email').value;
    var cemail = document.getElementById('cemail').value;
    
    document.getElementById('emailConMessage').innerHTML = '<span>Confrim email</span>';
    
    if(email !== cemail){
        document.getElementById('emailConMessage').innerHTML = '<span style="color:#f00;" >Please enter the same email</span>';
        document.getElementById('cemail').value = "";
    }
}

function valphone(){
    var phone = document.getElementById('phone').value;
    
    if(phone.length > 10 ){
        document.getElementById('phoneText').innerHTML = '<span style="color:#f00;" >Can you please enter 10 digits e.g 0761234567</span>';
        document.getElementById('phone').value = "";
    }
    
    if(phone.length < 10 ){
        document.getElementById('phoneText').innerHTML = '<span style="color:#f00;" >Can you please enter 10 digits e.g 0761234567</span>';
        document.getElementById('phone').value = "";
    }
    
    
    
    if(phone.length === 10 ){
        document.getElementById('phoneText').innerHTML = '<span>South African (+27) contact number</span>';
    }
}

function valPassword(){
    var password = document.getElementById('password').value;
    document.getElementById('passwordMessage').innerHTML = '<span>Password</span>';   
    var check = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
    if(check.test(password) === false){
        document.getElementById('passwordMessage').innerHTML = '<span style="color:#f00;" >Password must be more than 8 charectors and it must contain Upser case, lower case and a number</span>';
        document.getElementById('pass').value = "";
    }
}

function valConPassword(){
    var password = document.getElementById('password').value;
    var conPassword = document.getElementById('confrimPassword').value;
    
    document.getElementById('passwordConfrimMessage').innerHTML = '<span>Confrim Password</span>';   
    if( password !== conPassword){
        document.getElementById('passwordConfrimMessage').innerHTML = '<span style="color:#f00;" >Password doesn\'t match </span>';
        document.getElementById('pass').value = "";
    }
}


function valPhoneNumber(){
    var phone = document.getElementById('phone').value;
    
    if(phone.substring(0,1)!="0"){
        document.getElementById('phoneText').innerHTML = '<span style="color:#5f9ea0;" >A valid conctact number strats with a zero 0 </span>';
        document.getElementById('phone').value = "";
    }
    
    if(phone.length > 10){
        document.getElementById('phone').value = phone.substring(0,10);
    }
    
    if(phone.length == 10){
        document.getElementById('phoneText').innerHTML = '<span style="color:#FFF;" >Phone number</span>';
    }
    
    if(isNaN(phone)){
        document.getElementById('phoneText').innerHTML = '<span style="color:#5f9ea0;">A phone number is a numeric value</span>';
        document.getElementById('phone').value = "";
    }
    
}

function valcardID(){
    var ID = document.getElementById('IDn').value;
    if(ID.length > 13){
        document.getElementById('IDText').innerHTML = '<span style="color:#5f9ea0;" >Please enter the correct ID number</span>';
        document.getElementById('IDn').value = ID.substring(0,13);
    }
}

function valcardID2(){
    var ID = document.getElementById('IDn').value;
    
    if(ID.length == 13){
        document.getElementById('IDText').innerHTML = '<span style="color:#fff;" >ID number</span>';
    }
    
    if(ID.length < 13){
        document.getElementById('IDText').innerHTML = '<span style="color:#5f9ea0;" >Please enter the correct ID number</span>';
    }
    
    if(isNaN(ID)){
        document.getElementById('IDText').innerHTML = '<span style="color:#5f9ea0;">ID number is numeric</span>';
        document.getElementById('IDn').value = "";
    }
    
}

