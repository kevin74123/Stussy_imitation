<?php
    session_start();
    $mysqli=mysqli_connect("localhost","onlyicanhaveu","swpcb94610!","onlyicanhaveu");
    $id=$_SESSION['userid'];
    if(isset($_SESSION['userid'])){
        $displayout='flex';
        $displayin='none';
    }
    else{
        $displayout='none';
        $displayin='flex';
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
            <link rel="shortcut icon" href="./images/sim.png" type="image/png">
            <link rel="icon" href="./images/sim.png" type="image/png">
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
                .container{
                    display: block;
                    left: 50%; top: 50%;
                    position: absolute;
                    transform: translate(-50%, -50%);
                    width: max-content;
                    background-color: white;
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
                function locateshop(){
                    location.href="./products.php";
                }
                var windowHeight = window.innerHeight;
            
            </script>

        </head>

        <body onload="disableRightClick(),disableImageDrag()">

            <div class="container">
                <script>
                   

                    function setWindowHeight() {
                        let windowHeight = window.innerHeight;
                        document.documentElement.style.setProperty('--window-height', `${windowHeight}px`);
                    }
                    setWindowHeight();
                
                        // 윈도우 리사이즈 시 업데이트
                        window.addEventListener('resize', setWindowHeight);
                </script>
                <div class="logo">
                    <img class="stussylogo" src="./images/Stussy-Logo-1.png">
                    <p>stüssy</p>
                    <div class="button">
                        <div><span onclick="locateshop();">webshop !</span></div>
                    </div>
                    <br>
                    <div class="main">
                        <div class="log">
                            <div class="li" onclick="locatecoloring();">login<span class="blink">!</span></div>
                            <div class="lo" onclick="locatecoloring();">logout</div>
                        </div>
                        <div class="username">
                            user : <?php echo "$id";?>
                        </div>
                    </div>

                </div>
                
            </div>
            

            
            
            
        </body>
    </html>