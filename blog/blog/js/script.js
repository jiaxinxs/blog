/*
Student: JIAXIN YAN, MENG LI, ALLAN TORRES
Date modified: Dec 02, 2023
Description: CST8285 ASSIGNMENT2 FILE
*/

/*login*/
let emailInput=document.querySelector("#emails");
let loginInput=document.querySelector("#firstname");
let passInput=document.querySelector("#pass");
let pass2Input=document.querySelector("#pass2");
let termInput=document.querySelector("#terms");

let emailError = document.createElement('p');
emailError.setAttribute("class", "warning");
// append the created element to the parent of email div
document.querySelectorAll(".textfield")[0].append(emailError);

let loginError = document.createElement('p');
loginError.setAttribute("class", "warning");
// append the created element to the parent of login div
document.querySelectorAll(".textfield")[1].append(loginError);

let passError = document.createElement('p');
passError.setAttribute("class", "warning");
// append the created element to the parent of pass div
document.querySelectorAll(".textfield")[2].append(passError);

let pass2Error = document.createElement('p');
pass2Error.setAttribute("class", "warning");
// append the created element to the parent of pass2 div
document.querySelectorAll(".textfield")[3].append(pass2Error);



let defaultMsg="";
let emailErrorMsg="X Email address should be non-empty with the format xyz@xyz.xyz";
let loginErrorMsg="X User name should be non-empty, and within 30 characters long.";
let passErrorMsg="X Password should be at least 8 characters. 1 uppercase, 1 lowercase.";
let pass2ErrorMsg="X Please retype password."
let termErrorMsg="X Please accept the terms and conditions."


function containsUppercaseAndLowercase(value) {
    return /[a-z]/.test(value) && /[A-Z]/.test(value);
}

function validateEmail(){
    let error;
    let email = emailInput.value; // access the value of the email
    console.log(email);
    let regexp=/\S+@\S+\.\S+/; //reg. expression 
    if(regexp.test(email)){ //test is predefiend method to check if the entered email matches the regexp
        error = defaultMsg;
        emailInput.classList.remove("errorbox");
    } else {
        error = emailErrorMsg;
        emailInput.classList.add("errorbox");
    }
    return error;
}

function validateLogin() {
    let error;
    let login = loginInput.value;

    if (login.length <= 30 && login.length > 0) {
        error = defaultMsg;
        loginInput.classList.remove("errorbox");
        loginInput.vale = login.toLowerCase();
    } else {
        error = loginErrorMsg;
        loginInput.classList.add("errorbox");
    }
    return error;
}
// Validate the password field
function validatePass() {
    let error;
    let pass = passInput.value;
    if (pass.length < 8 || !containsUppercaseAndLowercase(pass)) {
        error = passErrorMsg;
        passInput.classList.add("errorbox");
    } else {
        error = defaultMsg;
        passInput.classList.remove("errorbox");
    }
    return error;
}
// Validate the confirmation password field
function validatePass2() {
    let error;
    let pass2 = pass2Input.value;
    if (pass2 === passInput.value && !pass2 == "") {
        error = defaultMsg;
        pass2Input.classList.remove("errorbox");
    } else {
        error = pass2ErrorMsg;
        pass2Input.classList.add("errorbox");
    }
    return error;
}


function validate(){
    let valid = true;//global validation 
    let emailValidation=validateEmail();
    if(emailValidation !==defaultMsg){
        emailError.textContent = emailValidation;
        valid = false;
    }

    let loginValidation=validateLogin();
    if(loginValidation !==defaultMsg){
        loginError.textContent = loginValidation;
        valid = false;
    }
    
    let passValidation=validatePass();
    if(passValidation !==defaultMsg){
        passError.textContent = passValidation;
        valid = false;
    }

    let pass2Validation=validatePass2();
    if(pass2Validation !==defaultMsg){
        pass2Error.textContent = pass2Validation;
        valid = false;
    }


    return valid;
};

function resetFormError() {
    emailError.textContent=defaultMsg;
    loginError.textContent=defaultMsg;
    passError.textContent=defaultMsg;
    pass2Error.textContent=defaultMsg;

    emailInput.classList.remove("errorbox")
    loginInput.classList.remove("errorbox")
    passInput.classList.remove("errorbox")
    pass2Input.classList.remove("errorbox")
}


emailInput.addEventListener("blur",()=>{ // arrow function
    let x=validateEmail();
    if(x == defaultMsg){
        emailError.textContent = defaultMsg;
        emailInput.classList.remove("errorbox");
    }else{
        emailError.textContent = x;
    }
    });

loginInput.addEventListener("blur",()=>{ // arrow function
    let x=validateLogin();
        if(x == defaultMsg){
            loginError.textContent = defaultMsg;
            loginInput.classList.remove("errorbox");
        }else{
            console.log(345555);
            loginError.textContent = x;
        }
    });

passInput.addEventListener("blur",()=>{ // arrow function
    let x=validatePass();
    if(x == defaultMsg){
        passError.textContent = defaultMsg;
        passInput.classList.remove("errorbox");
    }else{
        passError.textContent = x;
    }
    });

pass2Input.addEventListener("blur",()=>{ // arrow function
    let x=validatePass2();
    if(x == defaultMsg){
        pass2Error.textContent = defaultMsg;
        pass2Input.classList.remove("errorbox")
    }else{
        pass2Error.textContent = x;
    }
    });



/*register*/


let emaillInput=document.querySelector("#emaill");
let passlInput=document.querySelector("#passl");


let emailError1 = document.createElement('p');
emailError1.setAttribute("class", "warning");
document.querySelectorAll(".textfieldLogin")[0].append(emailError1);

let passError1 = document.createElement('p');
passError1.setAttribute("class", "warning");
document.querySelectorAll(".textfieldLogin")[1].append(passError1);


function validateEmail1(){
    let error;
    let email = emaillInput.value; // access the value of the email
    console.log(email);
    let regexp=/\S+@\S+\.\S+/; //reg. expression
    if(regexp.test(email)){ //test is predefiend method to check if the entered email matches the regexp
        error = defaultMsg;
        emaillInput.classList.remove("errorbox");
    } else {
        error = emailErrorMsg;
        emaillInput.classList.add("errorbox");
    }
    return error;
}


function validatePass1() {
    let error;
    let pass = passlInput.value;
    if (pass.length < 8 || !containsUppercaseAndLowercase(pass)) {
        error = passErrorMsg;
        passlInput.classList.add("errorbox");
    } else {
        error = defaultMsg;
        passlInput.classList.remove("errorbox");
    }
    return error;
}

function validateUserLogin(){
    let valid = true;//global validation
    let emailValidation=validateEmail1();
    if(emailValidation !==defaultMsg){
        emailError1.textContent = emailValidation;
        valid = false;
    }


    let passValidation=validatePass1();
    if(passValidation !==defaultMsg){
        passError1.textContent = passValidation;
        valid = false;
    }

    return valid;
};

function resetLoginFormError()
{
    emailError1.textContent=defaultMsg;
    passError1.textContent=defaultMsg;
    emaillInput.classList.remove("errorbox")
    passlInput.classList.remove("errorbox")
}


emaillInput.addEventListener("blur",()=>{ // arrow function
    let x=validateEmail1();
    console.log(x);
    if(x == defaultMsg){
        emailError1.textContent = defaultMsg;
        emaillInput.classList.remove("errorbox");
    }else{
        emailError1.textContent = x;
    }
});

passlInput.addEventListener("blur",()=>{ // arrow function
    let x=validatePass1();
    if(x == defaultMsg){
        passError1.textContent = defaultMsg;
        passlInput.classList.remove("errorbox");
    }else{
        passError1.textContent = x;
    }
});




