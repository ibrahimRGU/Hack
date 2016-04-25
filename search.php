<?php
$resultText = "";
if(isset($_POST["submit"]))
{
    $name = $_POST["username"];

    $sql="SELECT userID FROM users WHERE username='$name'";
    $result=mysqli_query($db,$sql);
    $row=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) == 1)
    {
        $searchID = $row['userID'];
        $searchSql="SELECT title, photoID FROM photos WHERE userID='$searchID'";
        $searchresult=mysqli_query($db,$searchSql);

        if(mysqli_num_rows($searchresult)>0){
            while($searchRow = mysqli_fetch_assoc($searchresult)){
                $line = "<p><a href='photo.php?id=".$searchRow['photoID']."'>".$searchRow['title']."</a></p>";
                $resultText = $resultText.$line;
            }
        }
        else{
            $resultText = "no photos by user";
        }
    }
    else
    {
        $resultText = "no user with that username";

    }
}
?>