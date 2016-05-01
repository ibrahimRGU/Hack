<?php
	include("check.php");
	include("search.php");
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

<div class="main">
<div class="formbox">
	<form method="post" action="">
		<label>Photos by Username:</label><br>
		<input type="text" name="username" placeholder="username" /><br><br>
		<input type="submit" name="submit" value="search" />
	</form>
	<div class="error"><?php echo $error;?></div>
</div>

<div id="photolist">
	<?php echo $resultText;?>
</div>

	</div>
</body>
</html>