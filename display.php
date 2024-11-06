<html>
   <meta charset="utf-8">
   <title>업로드된 이미지 보기</title>
</head>
<body>
    <h1>업로드된 이미지</h1>

    <?php
    $mysqli = mysqli_connect("localhost", "onlyicanhaveu", "swpcb94610!", "onlyicanhaveu");

    if ($mysqli->connect_error) {
        die("연결 실패: " . $mysqli->connect_error);
    }

    // 데이터베이스에서 이미지 가져오기
    $sql = "SELECT named, hashd FROM a"; // 필요한 필드 선택
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $file_hash = $row['hashd'];
            $file_path = "./files/" . $file_hash; // 파일 경로

            // 이미지 표시
            echo "<div>";
            echo "<h3>" . htmlspecialchars($row['named']) . "</h3>"; // 파일명 표시
            echo "<img src='$file_path' style='max-width:300px; max-height:300px;' alt='이미지'/><br>";
            echo "</div>";
        }
    } else {
        echo "업로드된 이미지가 없습니다.";
    }

    $mysqli->close();
    ?>
</body>
</html>
