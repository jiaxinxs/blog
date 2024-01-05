<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./myblog.css ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
</head>
<script>
    function hidePopup(){
        window.location.href = "login.php";
    }
</script>
<body>
    <div id="popup" class="popup" style="display: none;">
        <h2>Prompt information</h2>
        <p>Please log in before proceeding。</p>
        <button onclick="hidePopup()">Go log in</button>
    </div>
    <?php
    if (!isset($_SESSION['uid']) || empty($_SESSION['uid'])) {
        echo '<script>document.getElementById("popup").style.display="";</script>';die;
    }
    require_once('./php/database.php');
    $db = db_connect();
    $uid = $_SESSION['uid'];
    $sql = "SELECT * FROM blog_article WHERE uid = '$uid'";
    $result_set = mysqli_query($db, $sql);

    ?>
    <div class="topnav">
        <a href="./index.html">Home</a>
        <a href="./login.php">Login/Sign-in</a>
        <a class="active" href="./myblog.php">My Blog</a>
        <a href="./search.php">Search a blog</a>
    </div>

    <div class="body">
        <div class="container">
            <div class="display">
            <a href="newpost.php"><button>New Post</button></a>
            <div class="contenttitle">
                <?php while($results = mysqli_fetch_assoc($result_set)) { ?>

                    <h3>
                        <a style="font-size:24px;" href="blogcontent.php?aid=<?php echo $results['id']; ?>"><?php echo $results['title']; ?></a>
                        <?php echo $results['username']; ?>     <span><?php echo $results['createtime']; ?></span>
                    </h3>

                <?php } ?>
            </div>
            </div>

        </div>
    </div>



</body>
</html>
