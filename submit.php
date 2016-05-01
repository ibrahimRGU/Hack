<?php
$msg = "";
if(isset($_POST["submit"]))

{    //added htmlentities tostrip characters  and protect from xss,iframe
    $name = htmlentities($_POST["username"]);
    $email = htmlentities($_POST["email"]);
    $password = htmlentities($_POST["password"]);
    //password encrypttion
   
   //To protect from MySQL injection
			$username = stripslashes($username);
			   $email = stripslashes($email);
			$password = stripslashes($password);
			
			$username = mysqli_real_escape_string($db, $username);
			   $email = mysqli_real_escape_string($db, $email);
			$password = mysqli_real_escape_string($db, $password);
			$password = md5($password);

    $sql="SELECT email FROM users WHERE email='$email'";
    $result=mysqli_query($db,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(mysqli_num_rows($result) == 1)
    {
        $msg = "Sorry...This email already exists...";
    }
    else
    {
        //echo $name." ".$email." ".$password;
        $query = mysqli_query($db, "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$password')")or die(mysqli_error($db));
        if($query)
        {
            $msg = "Thank You! you are now registered. click <a href='index.php'>here</a> to login";
        }

    }
}
?>
