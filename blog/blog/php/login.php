<?php
session_start();
require_once('database.php');
$db = db_connect();

if (isset($_POST['email']) && isset($_POST['passl'])) {

    $sql = "SELECT * FROM blog_user WHERE email ='{$_POST['email']}' AND password = '{$_POST['passl']}'";
    $result_set = mysqli_query($db, $sql);
    $result = mysqli_fetch_assoc($result_set);
    if ($result) {
        header("Location: ./myblog.php");
    } else {

    }

}
?>


    var_dump($result);die;
if (isset($_POST['authorname']) && isset($_POST['password'])) {
    // If the user has just tried to log in
    $authorname = $_POST['authorname'];
    $password = $_POST['password'];

    // Validate the existence of the user and password in the associative array
    if (isset($user[$authorname]) && $user[$authorname] === $password) {
        header("Location: index.html");
        // Ensure that no further code is executed after the header redirect
        exit();
    }
}