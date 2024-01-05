<!--Student: JIAXIN YAN, MENG LI, ALLAN TORRES -->
<!-- Date Modified: Dec 02, 2023 -->
<!-- Description: CST8285 ASSIGNMENT2 FILE  --> 

<?php
session_start();
require_once('./php/database.php');
$db = db_connect();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $data = [];
    if (!empty($title)) {
        $sql = "SELECT * FROM blog_article WHERE title like '%{$title}%' or username like '%{$title}%'";
        $result_set = mysqli_query($db, $sql);

        while($results = mysqli_fetch_assoc($result_set)) {
            $data[] = $results;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./search.css">
    <title>Search</title>
</head>
<body>
    <div class="topnav">
        <a href="./index.html">Home</a>
        <a href="./login.php">Login/Sign-in</a>
        <a href="./myblog.php">My Blog</a>
        <a class="active" href="search.php">Search a blog</a>
    </div>
    <div class="container">
        <div class="search-container">
            <form action="" method="post" onsubmit="return checkForm()">
                <input type="text" name="title" class="search-input" placeholder="Enter your search...">
                <button class="search-button" type="submit">Search</button>
            </form>
        </div>

        <ul class="search-results" id="searchResults">
            <?php if(empty($data)) { ?>
            <?php } else { ?>
                <?php foreach($data as $key => $value){ ?>
                    <p><span style="font-size:20px;"><?php echo $value['username'];?></span>  <span><?php echo $value['createtime'];?></span></p>
                    <h2><a href="blogcontent.php?aid=<?php echo $value['id'];?>"><?php echo $value['title'];?></a></h2>
                <?php } ?>
            <?php } ?>
        </ul>
    </div>
    
</body>
</html>
<script>
    function checkForm()
    {
        // Get form elements
        // let emaill = document.getElementById('emaill').value;
        // let pass = document.getElementById('passl').value;
        //
        // // Validation checks
        // let valid = true;
        //
        // // Check login length
        // if (emaill.trim() === '') {
        //     document.getElementById('error1').style.display="";
        //     valid = false;
        // }
        //
        //
        // // Check password length
        // if (pass.trim() === '') {
        //     document.getElementById('error2').style.display="";
        //     valid = false;
        // }

        // Submit the form if all validations pass
        return true;
    }
</script>