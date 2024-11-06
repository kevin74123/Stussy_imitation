<?php
$id=$_POST["id"];
$pw=$_POST["pw"];
$pwc=$_POST["pwc"];
$named=$_POST["named"];
$email=$_POST["email"];

if($pw!=$pwc)
{
    echo "비밀번호와 비밀번호 확인이 서로 다릅니다";
    echo "<a href=signup.html>backpage</a>";
    exit();
}

if($id==NULL || $pw==NULL || $named==NULL || $email==NULL)
{
    echo "빈칸을 모두 채워주세요";
    echo "<a href=signup.html>backpage</a>";
    exit();
}

$mysqli=mysqli_connect("localhost","onlyicanhaveu","swpcb94610!","onlyicanhaveu");

$check="SELECT *from userinfo where userid='$id'";
$result=$mysqli->query($check);
if($result->num_rows==1)
{
    echo "중복된 id입니다.";
    echo "<a href=signup.html>backpage</a>";
    exit();
}

$signup=mysqli_query($mysqli,"INSERT into userinfo (userid,userpw,named,email) VALUES ('$id','$pw','$named','$email')");
if($signup){
    echo "sign up success";
    echo "<br><a href=login.html>do login</a>";
}

?>