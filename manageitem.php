<html>
<head>
    <meta charset="utf-8"/>
    <title>File list</title>
    <script>
        function locateindex(){
            location.href="./products.php";
        }
    </script>
    <style>
        .stussylogo{
            width: 100px;
            height: auto;
            cursor: pointer;
        }
        .stussylogo:hover{
            width: 120px;
        }
    </style>
</head>
<body>
<?php

$mysqli=mysqli_connect("localhost","onlyicanhaveu","swpcb94610!","onlyicanhaveu");

 if(mysqli_connect_errno())
        {
            echo "DB connect error";
        }
		
		$sql = "SELECT * from a";
		$res = $mysqli->query($sql);
		$num_result = $res->num_rows;
    ?>
	
	
	
	<table>
        <thead>
            <tr>
                <th width="50">NUM</th>
                <th width="250">FILE</th>
                <th width="200">TIME</th>
				<th width="50">id</th>
				<th width="70">subject</th>
				<th width="250">price</th>
				<th width="70">DOWN</th>
				<th width="50">DEL</th>
				

            </tr>
        </thead>
        <tbody>
            <?php
                for($i=0; $i<$num_result; $i++)
                {
                    $row = $res->fetch_assoc();
                    echo "<tr>";
                    echo "<td align='center'>".$row['num']."</td>";
                    echo "<td align='left'>
                <a href='./download.php?num=".$row['num']."'>".$row['named']."</a></td>";
                    echo "<td align='center'>".$row['timed']."</td>";
                    echo "<td align='center'>".$row['id']."</td>";
                    echo "<td align='center'>
				<a href='./display.php?num=".$row['num']."'>".$row['subjectd']."</a></td>";	
                    echo "<td align='center'>".$row['price']."</td>";
					echo "<td align='center'>".$row['down']."</td>";	
					echo "<td align='center'>
				<a href='./delete.php?num=".$row['num']."'>DEL</a></td>";					
                    echo "</tr>";
                }
              mysqli_close($mysqli);

			  
            ?>
            <img class="stussylogo" onclick="locateindex();" src="./images/Stussy-Logo-1.png">
            <br>
			<input type = "button" name = "table" value ="글쓰기" onclick = "location.href='table.php'";>
		</tbody>
    </table>

</body>
</html>