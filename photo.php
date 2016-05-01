<?php
	include("check.php");
    include("connection.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
<h4>Welcome <?php echo $login_user;?> <a href="photos.php" style="font-size:18px">Photos</a>||<a href="searchphotos.php" style="font-size:18px">Search</a>||<a href="logout.php" style="font-size:18px">Logout</a></h4>
<div id="photo">
    <?php
        if(isset($_GET['id'])){
            $photoID = $_GET['id'];
            $photoSql="SELECT * FROM photos WHERE photoID='$photoID'";
            $photoresult=mysqli_query($db,$photoSql) or die(mysqli_error($db));
            if(mysqli_num_rows($photoresult)==1){
                $photoRow = mysqli_fetch_assoc($photoresult);
                echo "<h1>".$photoRow['title']."</h1>";
                echo "<h3>".$photoRow['postDate']."</h3>";
                echo "<img src='".$photoRow['url']."'/>";
                echo " <p>".$photoRow['description']."</p>";


                $commentSql="SELECT * FROM comments WHERE photoID='$photoID'";
                $commentresult=mysqli_query($db,$commentSql) or die(mysqli_error($db));
                if(mysqli_num_rows($commentresult)>1) {

                    echo "<h2> Comments </h2>";
                    while($commentRow = mysqli_fetch_assoc($commentresult)){
                        echo "<div class = 'comments'>";
                        echo "<h3>".$commentRow['postDate']."</h3>";
                        echo "<p>".$commentRow['description']."</p>";
                        echo "</div>";
                    }

                }
                echo "<a href='addcommentform.php?id=".$photoID."'> Add Comment</a><br>";

                if($adminuser){
                    echo "<div class='error'><a href='removephoto.php?id=".$photoID."'> Delete Photo</a></div>";
                }

            }
            else{
                echo "<h1>No Photos Found</h1>";
            }

        }
    else{

        echo "<h1>No User Selected</h1>";
    }

    ?>
</div>

</body>
</html>
