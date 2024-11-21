<?php
    session_start();
    $mysqli=mysqli_connect("localhost","onlyicanhaveu","swpcb94610!","onlyicanhaveu");
    $id=$_SESSION['userid'];
    if(isset($_SESSION['userid'])){
        $displayout='inline-flex';
        $displayin='none';
    }
    else{
        $displayout='none';
        $displayin='inline-flex';
    }
?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Stüssy imitation</title>
            <meta name="keywords" content="onlyicanhave, stussy, 노건우, 스투시, 중학생">
            <meta name="description" content="middle school student made Stussy imitation">
            <meta name="robots" content="index, follow">

            <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
            <style>
                body{
                    opacity: 0;
                    transition: opacity 1s ease-in-out;
                    -ms-overflow-style: none;
                    background-color: white;
                }

                body.loaded {
                    opacity: 1;
                }

                ::-webkit-scrollbar {
                    display: none;
                }

                .stussylogo{
                    width: 100px;
                    height: auto;
                    display: block;
                }

                .main{
                    font-family: 'Courier New', Courier, monospace;
                }

                .logo{
                    font-family: 'Courier New', Courier, monospace;
                    font-weight: bold;
                    font-size: 15px;
                    margin: 30px;
                    height: auto;
                }
                .log{
                    cursor: pointer;
                }

                .li{
                    display: <?php echo $displayin; ?>;
                }

                .lo{
                    display: <?php echo $displayout; ?>;
                }

                .username{
                    display: <?php echo $displayout; ?>;
                }

                .button{
                    cursor: pointer;
                }

                @keyframes blink {
                    50% { opacity: 0; }
                    }

                    .blink {
                    animation: blink 0.5s infinite;
                }

                @media (max-width: 1000px) {
                    body {
                        font-size: 14px; /* 모바일에서 글꼴 크기 줄이기 */
                    }

                    .stussylogo {
                        width: 200px;
                    }
                    .logo{
                        font-size: 30px;
                    }
                }
            </style>

            <script>
                function locatecoloring(){
                    location.href="./logout.php";
                }

                window.addEventListener('load', function() {
                    document.body.classList.add('loaded');
                });

                function locatetshirt(){
                    location.href="./products.php";
                }
                var windowHeight = window.innerHeight;
            
            </script>

        </head>

        <body onload="disableRightClick(),disableImageDrag()">
            <style>
                .logo{
                    width: 100px;
                }
                #navtext{
                    font-family: 'Courier New', Courier, monospace;
                    padding-right: 30px;
                }
                .menu span{
                    cursor: pointer;
                }
                .image-container {
                    max-width: 100%; /* 부모 요소의 최대 너비를 100%로 설정 */
                    overflow: hidden; /* 넘치는 부분은 숨김 */
                    margin: 0 auto;                
                }
                .responsive-image {
                    height: 100vh; /* 화면 높이에 맞게 설정 */
                    width: auto; /* 너비는 자동으로 조정 */
                    object-fit: cover; /* 비율을 유지하면서 잘라내기 */
                    margin: 0 auto;
                }
            </style>
            <div class="fixed text-black w-full flex items-center justify-between">
                <div class="flex-1 text-center"> <!-- 1/3 영역 -->
                    <img class="logo" src="./images/Stussy-Logo-1.png">
                </div>

                <div class="menu flex-2 text-center text-xs" id="navtext"> <!-- 1/3 영역 -->
                    <div class="other">

                        <span style="text-decoration: underline;" onclick="locateindex();" class="mx-2">home</span>
                        <span class="mx-2" onclick="locatetshirt();">T-shirt</span>
                        <span class="mx-2">hoodie</span>
                        <span class="mx-2">pants</span>
                        <span class="li" onclick="locatecoloring();">login<span class="blink">!</span></span>
                        <span class="lo" onclick="locatecoloring();">logout</span>
                        
                    </div>
                    <style>
                        #toggle-menu {
                            display: none; /* 기본적으로 숨김 */
                            font-size: 50px;
                        }
                        .other {
                            display: flex; /* 기본적으로 보임 */
                        }

                    </style>

                </div>
            </div>

            <div class="image-container">
                <img src="./images/Homepage_4.webp" class="responsive-image">
            </div>

            <hr>

            <div>
                STUSSY IMITATION 
            </div>

        </body>
    </html>