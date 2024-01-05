<?php
session_start();
require_once('./php/database.php');
$db = db_connect();
$id = $_GET['aid'];
$sql = "SELECT * FROM blog_article WHERE id = '{$id}'";
$result_set = mysqli_query($db, $sql);
$result = mysqli_fetch_assoc($result_set);

$sql1 = "SELECT * FROM blog_comment where article_id = '{$id}'";
$result_set1 = mysqli_query($db, $sql1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./blogcontent.css">
    <title>Document</title>
</head>
<script src="./js/jquery.min.js"></script>
<body>
    
    <div class="container">
        <div class="title" id="title">
            <?php echo $result['title'];?>
        </div>

        <div class="content" id="content">
            <?php echo $result['content'];?>
        </div>

        <form form action=""  method="post">
            <?php if (isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {?>
                <button class="delete" type="submit">Delete</button>
            <?php }?>
            <input type="hidden" name="aid" value="<?php echo $result['id'];?>">
        </form>
        <a href="./myblog.php"><button class="goback">Go Back To My Blog</button></a>

        <div class="comment">
            <div class="textfield">
                <input type="text" class="commentName" placeholder="Your Name">
            </div>

            <div class="textfield">
                <input type="text" class="commentEmail" placeholder="Your Email">
            </div>

            <div class="textfield">
                <textarea name="commentInput" id="commentInput" cols="80" rows="5" placeholder="Please leave your comment here"></textarea>
            </div>


            <button class="commentButton" onclick="sub()">Send</button>

            <div class="commentContent">
                <?php while($resultss = mysqli_fetch_assoc($result_set1)) { ?>
                    <?php echo $resultss['content']."<br>"; ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <div id="popup" class="popup" style="display: none;">
        <h2>Prompt information</h2>
        <p>Please log in before proceeding。</p>
        <button class="bton" onclick="hidePopup()">Go log in</button>
    </div>
</body>
</html>
<script>
    let article_id = <?php echo $id;?>;
</script>
<script src="./js/blogcontent.js"></script>
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['uid']) || empty($_SESSION['uid'])) {
        echo '<script>document.getElementById("popup").style.display="";</script>';die;
    }
    $id = $_POST['aid'];
    $sql = "DELETE FROM blog_article WHERE id ='$id'";
    $result = mysqli_query($db, $sql);
    header("Location: myblog.php");
}
?>
