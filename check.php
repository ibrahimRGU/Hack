/*<?php
include('connection.php');
session_start();
$user_check=$_SESSION['username'];

$ses_sql = mysqli_query($db,"SELECT username, admin FROM users WHERE username='$user_check' ");

$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_user=$row['username'];
if($row['admin']==1){
    $adminuser = true;
}

if(!isset($user_check))
{
header("Location: index.php");
}
?>*/


<?php 
	include('connection.php');
	if (isset($_SESSION['timeout']))
		{$timein =$_SESSION['timeout'];
	
			$time_diff = time() - $timein;
			if (time_diff >= 15)
				{
					//session expire
					session_unset();
					session_destroy();
					header("location: index.php");
				}
					else {$_SESSION['timeout'] = time();
			}

		}

?>
