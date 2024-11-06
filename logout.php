<?php
session_start();
$res=session_destroy();
if($res){
    header('location: ./main.php');
}
?>