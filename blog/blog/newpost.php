<!--Student: JIAXIN YAN, MENG LI, ALLAN TORRES -->
<!-- Date Modified: Dec 02, 2023 -->
<!-- Description: CST8285 ASSIGNMENT2 FILE  --> 

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./newpost.css">
    <title>New Post</title>
</head>
<body>
    <div class="body">
    <div class="content">
        <h1>Create A Blog</h1>
        <form method="post" onsubmit="return validate()">
            <div class="textfield">
                <input type="text" name="title" id="title" placeholder="Title">
            </div>
            <br>
            <div class="textfield">
                <textarea name="content" id="content" placeholder="Please start your blog here"  rows="500" cols="300"></textarea>
            </div>
            <br>
            <button type="submit">Submit</button>
            <button type="reset" onclick="resetLoginFormError()">Reset</button>
        </form>
        <a href="./myblog.php"><button>Go Back To My Blog</button></a>
    </div>
    </div>


    <div id="popup" class="popup" style="display: none;">
        <h2>Prompt information</h2>
        <p>Please log in before proceeding。</p>
        <button onclick="hidePopup()">Go log in</button>
    </div>
</body>
</html>
<script src="./js/newpost.js"></script>
<?php
require_once('./php/database.php');
$db = db_connect();

//Users can only write new post after log in
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!isset($_SESSION['uid']) || empty($_SESSION['uid'])) {
        echo '<script>document.getElementById("popup").style.display="";</script>';die;
    }
    if (isset($_POST['title']) && isset($_POST['content'])) {
        $time = date('Y-m-d H:i:s',time());
        $sql = "INSERT INTO blog_article SET uid='{$_SESSION['uid']}',username='{$_SESSION['username']}',uname = '{$_SESSION['email']}',title='{$_POST['title']}',content='{$_POST['content']}',createtime='{$time}'";
        $result = mysqli_query($db, $sql);
        echo "<script>alert('Added successfully')</script>";
    }
}
?>
