<?php
session_start();
header("Access-Control-Allow-Origin: *");
require_once('./php/database.php');
$db = db_connect();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : 0;
    if (isset($_POST['type']) && $_POST['type'] == 'addcomment') {
        $time = date('Y-m-d H:i:s',time());
        $sql = "INSERT INTO blog_comment SET uid='{$uid}',content = '{$_POST['commentInput']}',name='{$_POST['commentName']}',email='{$_POST['commentEmail']}',createtime='{$time}',article_id='{$_POST['article_id']}'";
        $result = mysqli_query($db, $sql);
        echo json_encode(['code'=>200]);die;
    }
}
?>