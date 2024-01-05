/*
Student: JIAXIN YAN, MENG LI, ALLAN TORRES
Date modified: Dec 02, 2023
Description: CST8285 ASSIGNMENT2 FILE
*/

let titleInput=document.querySelector("#title");
let contentInput=document.querySelector("#content");

let titleError = document.createElement('p');
titleError.setAttribute("class", "warning");
document.querySelectorAll(".textfield")[0].append(titleError);

let contentError = document.createElement('p');
contentError.setAttribute("class", "warning");
document.querySelectorAll(".textfield")[1].append(contentError);

let defaultMsg="";
let titleErrorMsg="X title cannot be empty";
let contentErrorMsg="X content cannot be empty";


function containsUppercaseAndLowercase(value) {
    return /[a-z]/.test(value) && /[A-Z]/.test(value);
}

function validateTitle(){
    let error;
    let title = titleInput.value; // access the value of the email
    console.log(title);

    if(title === ""){ //test is predefiend method to check if the entered email matches the regexp
        error = titleErrorMsg;
    } else {
        error = defaultMsg;
    }
    return error;
}


function validateContent() {
    let error;
    let content = contentInput.value;
    console.log(content);
    if (content.length == "") {
        error = contentErrorMsg;
    } else {
        error = defaultMsg;
    }
    return error;
}

function validate(){
    let valid = true;//global validation
    let titleValidation=validateTitle();
    if(titleValidation !==defaultMsg){
        titleError.textContent = titleValidation;
        valid = false;
    }


    let contentValidation=validateContent();
    if(contentValidation !==defaultMsg){
        contentError.textContent = contentValidation;
        valid = false;
    }

    return valid;
};

function resetLoginFormError()
{
    titleError.textContent=defaultMsg;
    contentError.textContent=defaultMsg;
}


titleInput.addEventListener("blur",()=>{ // arrow function
    let x=validateTitle();
    console.log(x);
    if(x == defaultMsg){
        titleError.textContent = defaultMsg;
    }else{
        titleError.textContent = x;
    }
});

contentInput.addEventListener("blur",()=>{ // arrow function
    let x=validateContent();
    console.log(x);
    if(x == defaultMsg){
        contentError.textContent = defaultMsg;
    }else{

        contentError.textContent = x;
    }
});


function hidePopup(){
    window.location.href = "login.php";
}
