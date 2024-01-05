<!--Student: JIAXIN YAN, MENG LI, ALLAN TORRES -->
<!-- Date Modified: Dec 02, 2023 -->
<!-- Description: CST8285 ASSIGNMENT2 FILE  --> 

<?php
session_start();
require_once('./php/database.php');
$db = db_connect();
//register
if (isset($_POST['pass2']) && !empty($_POST['pass2'])) {
    $time = date('Y-m-d H:i:s',time());
    $sql = "INSERT INTO blog_user SET username='{$_POST['username']}',email='{$_POST['emails']}',password='{$_POST['pass']}',createtime='{$time}'";
    $result = mysqli_query($db, $sql);
    echo "<script>alert('Account registration successful')</script>";
}


//login
if (isset($_POST['email']) && isset($_POST['passl'])) {
    $sql = "SELECT * FROM blog_user WHERE email ='{$_POST['email']}' AND password = '{$_POST['passl']}'";
    $result_set = mysqli_query($db, $sql);
    $result = mysqli_fetch_assoc($result_set);
    if ($result) {
        $_SESSION['uid'] = $result['id'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['username'] = $result['username'];
        header("Location: ./myblog.php");
        exit();
    } else {
        echo "<script>alert('Account or password error')</script>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./login.css ">
    <title>Login/Sign-in</title>
</head>
<body>
    
    <div class="topnav">
        <a href="./index.html">Home</a>
        <a class="active" href="./login.php">Login/Sign-in</a>
        <a href="./myblog.php">My Blog</a>
        <a href="./search.php">Search a blog</a>
    </div>
    <div class="body">
        <div class="Sign-in">
            <h1>Sign-in</h1>
            <form action="" method="post" onsubmit="return validate()">
                <div class="textfield" >
                    <label for="emails">Email</label><br>
                    <input type="emails" name="emails" id="emails" placeholder="Email"><br>
                </div>
                <div class="textfield" >
                    <label for="firstname">UserName</label><br>
                    <input type="text" name="username" id ="firstname" placeholder="UserName"><br>
                </div>
                <div class="textfield" >
                    <label for="pass">Password</label><br>
                    <input type="password" name="pass" id="pass"><br>
                </div>
                <div class="textfield" >
                    <label for="pass2">Re-type Password</label><br>
                    <input type="password" name="pass2" id="pass2"><br>
                </div>
                <br>
                <button type="submit">Submit</button>
                <button type="reset" onclick="resetFormError()">Reset</button>
            </form>
        </div>
            <div class="login">
            <h1>Login</h1>
            <form action="./login.php" method="post" onsubmit="return validateUserLogin()">
                <div class="textfieldLogin" >
                    <label for="email">Email</label><br>
                    <input type="emaill" name="email" id="emaill" placeholder="Email"><br>
                </div>
                <div class="textfieldLogin" >
                    <label for="passl">Password</label><br>
                    <input type="password" name="passl" id="passl"><br>
                </div>
                <br>
                <button type="submit">Submit</button>
                <button type="reset" onclick="resetLoginFormError()">Reset</button>
            </form>
            </div>
        
    </div>
</body>
</html>
<script src="./js/script.js"></script>