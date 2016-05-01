<?php
	
	ini_set('session.cookie_httponly',true);
	session_start();
	include("connection.php"); //Establishing connection with our database
	if (isset($_SESSION['last_ip']) === false)
		{$_SESSION [last_ip] = $_SERVER ['REMOTE_ADDR'];
		 }
	if ($_SESSION['last_ip'] != $_SERVER ['REMOTE_ADDR'])
	{
		session_unset();
		session_destroy();
		header(index.php);
	}
	
	include("connection.php"); //Establishing connection with our database
	
	//include('Check.php');

	$error = ""; //Variable for storing our errors.
	if(isset($_POST["submit"]))
	{
		if(empty($_POST["username"]) || empty($_POST["password"]))
		{
			$error = "Both fields are required.";
		}else
		{
			// Define $username and $password
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			// To protect from MySQL injection
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = htmlentities($username);
			$password = htmlentities($password);
			$username = mysqli_real_escape_string($db, $username);
			$password = mysqli_real_escape_string($db, $password);
			$password = md5($password);
			
			//Check username and password from database
			$sql="SELECT userID FROM users WHERE username='$username' and password='$password'";
			$result=mysqli_query($db,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC) ;
			
			//If username and password exist in our database then create a session.
			//Otherwise echo error.
			
			if(mysqli_num_rows($result) == 1)
			{
				$_SESSION['username'] = $username; // Initializing Session
				header("location: photos.php"); // Redirecting To Other Page
			}else
			{
				$error = "Incorrect username or password.";
			}
		}
	}
?>
