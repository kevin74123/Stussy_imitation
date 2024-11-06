<?php
session_start();
$id=$_POST['id'];
$pw=$_POST['pw'];
$mysqli=mysqli_connect("localhost","onlyicanhaveu","swpcb94610!","onlyicanhaveu");

$check="SELECT * FROM userinfo WHERE userid='$id'";
$result=$mysqli->query($check);
if($result->num_rows==1)
{
    $row=$result->fetch_array(MYSQLI_ASSOC);
    if($row['userpw']==$pw)
    {
        $_SESSION['userid']=$id;
        if(isset($_SESSION['userid']))
        {
            header('location: ./index.php');
        }
        else{
            echo "세선 저장 실패";
        }
    }
    else{
        echo "wrong id or pw";
    }
}
else{
    echo "wrong id or pw";
}

?>