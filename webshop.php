<?php
session_start();
$id=$_SESSION['userid'];
$item=$_POST["item"];
$num=$_POST['num'];
$currentDate = date('Y-m-d');
$price = $_POST["price"];
$price2 = $price * $num;
$mysqli=mysqli_connect("localhost","onlyicanhaveu","swpcb94610!","onlyicanhaveu");

$signup=mysqli_query($mysqli,"INSERT into bucket (ymd,id,item,num,price) VALUES ('$currentDate','$id','$item','$num','$price2')");
if($signup){
    header('Location: ./products.php');
}
?>
