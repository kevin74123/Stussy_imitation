<?php
    session_start();
    $mysqli=mysqli_connect("localhost","onlyicanhaveu","swpcb94610!","onlyicanhaveu");
    $id=$_SESSION['userid'];

    
    $qq1="DELETE FROM bucket where id='$id';";
    $qq2=mysqli_query($mysqli,$qq1);
    if($qq2){
        echo"<script>
        location.href = \"./products.php\";
        </script>";
    }
?>