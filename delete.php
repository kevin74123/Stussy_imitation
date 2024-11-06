<?php    
 
    if(!$_GET['num'])
    {
        echo "<script>alert('이상하게 접근하셨습니다;;');";
        echo "history.back();</script>";
    }
    
    $mysqli=mysqli_connect("localhost","onlyicanhaveu","swpcb94610!","onlyicanhaveu");
	
	
   if(mysqli_connect_errno())
        {
            echo "DB connect error";
        
            exit;
		}
    
    $sql = "SELECT hashd from a where num=".$_GET['num'];
    $res = $mysqli->query($sql);
    if(!$res)
    {
        echo "select query error";
        exit;
    }
    $res = $res->fetch_assoc();
    
    $dir = "./files/";
    $filehash = $res['hashd'];
    
    if(!unlink($dir.$filehash))
    {
            echo "file delete error";
            exit;
    }
    
    $sql = "DELETE from a where num=".$_GET['num'];
    $res = $mysqli->query($sql);
    if(!$res)
    {
        echo "delete query error";
        exit;
    }
    
    echo "<script>alert('파일이 삭제되었습니다.');";
    echo "history.back();</script>";
 
 mysqli_close($mysqli);
    
?>