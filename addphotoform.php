<?php
include("check.php");
include("addphoto.php");
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add Photo</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
<h4>Welcome <?php echo $login_user;?> <a href="photos.php" style="font-size:18px">Photos</a>||<a href="searchphotos.php" style="font-size:18px">Search</a>||<a href="logout.php" style="font-size:18px">Logout</a></h4>

<div class="main">

<div class="formbox">
    <form method="post" action="" enctype="multipart/form-data">
        <label>Title</label><br>
        <input type="text" name="title" placeholder="title" /><br><br>
        <label>Description:</label><br>
        <textarea name="desc" cols="40" rows="5"  ></textarea><br><br>
        <label>Image File:</label><br>
        <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
        <input type="submit" name="submit" value="Submit Photo" />
    </form>
    <div class="msg"><?php echo $msg;?></div>
</div>
    </div>
</body>
</html>