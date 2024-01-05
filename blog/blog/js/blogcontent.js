/*
Student: JIAXIN YAN, MENG LI, ALLAN TORRES
Date modified: Dec 02, 2023
Description: CST8285 ASSIGNMENT2 FILE
*/

function sub(){

    let commentNameValidation=validateCommentName();
    if(commentNameValidation !== defaultMsg){
        commentNameError.textContent = commentNameValidation;
        return false;
    }


    let commentEmailValidation=validateCommentEmail();
    if(commentEmailValidation !==defaultMsg){
        commentEmailError.textContent = commentEmailValidation;
        return false;
    }

    let commentValidation=validateComment();
    if(commentValidation !==defaultMsg){
        commentError.textContent = commentValidation;
        return false;
    }

    var commentName = document.querySelector(".commentName").value;
    var commentEmail = document.querySelector(".commentEmail").value;
    var commentInput = document.querySelector("#commentInput").value;


    $.ajax({
        dataType: 'json',
        type: 'POST',
        url: 'http://localhost:8081/assignment2/ajax.php',
        data: {commentName: commentName,commentEmail:commentEmail,commentInput:commentInput,type:'addcomment',article_id:article_id},
    success: function (data) {
        // if (data.code == 0) {
        //     document.getElementById("popup").style.display="";
        //     return false;
        // }
        var ys = $(".commentContent").html();
        $(".commentContent").html(ys+commentInput+"<br>");
        },
        error: function (jqXHR, textStatus, errorThrown) {

        }
    });
}
function hidePopup(){
    window.location.href = "login.php";
}

let defaultMsg="";
let commentNameErrorMsg="X commentName cannot be empty";
let commentEmailErrorMsg="X commentEmail cannot be empty";
let commentErrorMsg="X comment cannot be empty";

let commentNameInput=document.querySelector(".commentName");
let commentEmailInput=document.querySelector(".commentEmail");
let commentInput=document.querySelector("#commentInput");

let commentNameError = document.createElement('p');
commentNameError.setAttribute("class", "warning");
document.querySelectorAll(".textfield")[0].append(commentNameError);

let commentEmailError = document.createElement('p');
commentEmailError.setAttribute("class", "warning");
document.querySelectorAll(".textfield")[1].append(commentEmailError);

let commentError = document.createElement('p');
commentError.setAttribute("class", "warning");
document.querySelectorAll(".textfield")[2].append(commentError);



function validateCommentName(){
    let error;
    let commentName = commentNameInput.value; // access the value of the email
    console.log(commentName);

    if(commentName === ""){ //test is predefiend method to check if the entered email matches the regexp
        error = commentNameErrorMsg;
    } else {
        error = defaultMsg;
    }
    return error;
}


function validateCommentEmail() {
    let error;
    let commentEmail = commentEmailInput.value;
    console.log(commentEmail);
    if (commentEmail.length == "") {
        error = commentEmailErrorMsg;
    } else {
        error = defaultMsg;
    }
    return error;
}

function validateComment() {
    let error;
    let comment = commentInput.value;
    console.log(comment);
    if (comment.length == "") {
        error = commentErrorMsg;
    } else {
        error = defaultMsg;
    }
    return error;
}


function resetLoginFormError()
{
    commentNameError.textContent=defaultMsg;
    commentEmailError.textContent=defaultMsg;
    commentError.textContent=defaultMsg;
}


commentNameInput.addEventListener("blur",()=>{ // arrow function
    let x=validateCommentName();
    console.log(x);
    if(x == defaultMsg){
        commentNameError.textContent = defaultMsg;
    }else{
        commentNameError.textContent = x;
    }
});

commentEmailInput.addEventListener("blur",()=>{ // arrow function
    let x=validateCommentEmail();
    console.log(x);
    if(x == defaultMsg){
        commentEmailError.textContent = defaultMsg;
    }else{

        commentEmailError.textContent = x;
    }
});

commentInput.addEventListener("blur",()=>{ // arrow function
    let x=validateComment();
    console.log(x);
    if(x == defaultMsg){
        commentError.textContent = defaultMsg;
    }else{

        commentError.textContent = x;
    }
});

function hidePopup(){
    window.location.href = "./login.php";
}
