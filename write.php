<html>
   <meta charset="utf-8">
<?php

$mysqli=mysqli_connect("localhost","onlyicanhaveu","swpcb94610!","onlyicanhaveu");

	
$id = $_POST['id'];
$subject = $_POST['subject'];
$price = $_POST['price'];
$file = $_FILES['file']['name'];

 $date = date("YmdHis", time());
 $dir = "./files/";
 $file_hash = $date.$_FILES['file']['name'];
 $file_hash = md5($file_hash);
 $upfile = $dir.$file_hash;



if(is_uploaded_file($_FILES['file']['tmp_name']))
{
    if(!move_uploaded_file($_FILES['file']['tmp_name'], $upfile))
    {
        echo "upload error";
        exit;
    }
}


 
	
$sql = "INSERT into a (named, id, subjectd, price, hashd, timed) VALUES ('$file','$id','$subject','$price','$file_hash','$date')"; 

$result = $mysqli->query($sql);

if(!$result)
{
    echo "DB upload error";
    exit;
}

mysqli_close($mysqli);
	echo("<script>location.href='manageitem.php';</script>");
    echo "<script>alert('업로드 성공');";

?>
</html>