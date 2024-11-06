<?php
    session_start();
    $mysqli=mysqli_connect("localhost","onlyicanhaveu","swpcb94610!","onlyicanhaveu");
    $id = isset($_SESSION['userid']) ? $_SESSION['userid'] : null;
    $displayin = 'none';
    if (isset($_SESSION['userid'])) {
        $userId = $_SESSION['userid'];
        if ($userId === 'kevin') {
            $displayin = 'block';
        }else{
            $displayin = 'none';
        }
    }
?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Stüssy webshop</title>
            <link rel="shortcut icon" href="./images/sim.png" type="image/png">
            <link rel="icon" href="./images/sim.png" type="image/png">
            <style>
                @font-face {
                    font-family: "stussy";
                    src:url(./StussyScript-Regular.ttf)
                }

                body{
                    opacity: 0;
                    transition: opacity 1s ease-in-out;
                    -ms-overflow-style: none;
                    background-color: white;
                }

                body.loaded {
                    opacity: 1;
                }

                @keyframes blink {
                    50% { opacity: 0; }
                    }

                    .blink {
                    animation: blink 1s infinite;
                    }
                .image{
                    width: 200px;
                }

                .username{
                    font-family: 'Courier New', Courier, monospace;
                    justify-self: left;
                    width: max-content;
                    position: fixed;
                    text-align: center;
                    left: 50%;
                    position: absolute;
                    transform: translate(-50%);
                    font-family: 'Courier New', Courier, monospace;
                }
                .stussylogo{
                    width: 100px;
                    height: auto;
                    cursor: pointer;
                }
                .stussylogo:hover{
                    width: 120px;
                }

                .basket{
                    font-size: 13px;
                }

                .catalog{
                    display: flex;

                }
                .productform{
                    padding-bottom: 10px;
                }
                .clearcatalog{
                    cursor: pointer;
                }
                .clearcatalog:hover{
                    color: lightgray;
                }
                button{
                    all: unset;
                }
                .btn{
                    border-bottom: 1px solid black;
                    padding: 2px;
                    float: right;
                }
                .btn:hover{
                    padding: 1px;
                    border-bottom: 2px solid black;
                }
                input[type="number"]{
                    all:unset;
                }
                .manage{
                    display: <?php echo $displayin; ?>;
                }
                .additem{
                    cursor: pointer;
                }

            </style>

            <script>
                window.addEventListener('load', function() {
                    document.body.classList.add('loaded');
                });

                function locateindex(){
                    location.href="./products.php";
                }
                function product(){
                    location.href="./products.php";
                }
                function additempage(){
                    location.href="./manageitem.php";
                }
            </script>
        </head>



        <body onload="disableRightClick(),disableImageDrag()">

            <script>
                window.addEventListener('resize', setWindowHeight);
            </script>

            <div class="web">

                <div class="username">

                    <hr style="border : 0px; border-top: 1px dashed;">

                    <div>
                        <img class="stussylogo" onclick="locateindex();" src="./images/Stussy-Logo-1.png">
                    </div>

                    <span>Stüssy Korea</span>

                    <div style="font-size: 10px;">
                        user : <?php echo "$id";?>
                    </div>

                    <hr style="border : 0px; border-top: 1px dashed;">
                    <hr style="border : 0px; border-top: 1px dashed;">

                    <div class="basket">


                        <div>CATALOG</div>
                        <div class="catalog">
                            <span>&nbsp</span>
                            <div style=" text-align: center; ">
                                <span style="text-align: left; ">item</span>
                                <?php

                                    $sql = "SELECT * from bucket where id='$id';";
                                    $ret = mysqli_query($mysqli, $sql);

                                    while($row = mysqli_fetch_array($ret))
                                    {

                                ?>
                                    <div>
                                        <span><?=$row[2];?></span>
                                        x
                                        <span><?=$row[3];?></span>
                                    </div>
                                <?}?>
                            </div>

                            <span>&nbsp</span>
                            <div style="text-align: center;">
                                <span style="text-align: left; ">ymd</span>
                                <?php

                                    $sql = "SELECT * from bucket where id='$id';";
                                    $ret = mysqli_query($mysqli, $sql);

                                    while($row = mysqli_fetch_array($ret))
                                    {

                                ?>
                                    <div>
                                        <span><?=$row[0];?></span>
                                    </div>
                                <?}?>
                            </div>

                            <span>&nbsp</span>
                            <div style="text-align: center;">
                                <span style="text-align: left;">price</span>
                                <?php

                                    $sql = "SELECT * from bucket where id='$id';";
                                    $ret = mysqli_query($mysqli, $sql);

                                    while($row = mysqli_fetch_array($ret))
                                    {

                                ?>
                                    <div>
                                        <span><?=$row[4];?>₩</span>
                                    </div>
                                <?}?>
                            </div>
                            
                            
                        </div>

                        <form id="myForm" action="catalogdelete.php" method="post">
                            <div>
                                <input type="hidden" name="price" value="68000">
                                
                                <span class="clearcatalog" id="submitDiv">&lt;Clear all&gt;</span>
                            </div>
                        </form>
                        <script>
                            document.getElementById('submitDiv').addEventListener('click', function() {
                                document.getElementById('myForm').submit();
                            });
                        </script>
                        

                        <hr style="border : 0px; border-top: 1px dashed;">
                        <hr style="border : 0px; border-top: 1px dashed;">


                        <div style="float:right;">
                            <?php
                                $rr = "SELECT sum(price) as total_price from bucket where id='$id';";
                                $rr2 = mysqli_query($mysqli, $rr);
                                if ($rr2) {
                                    $rr3 = mysqli_fetch_assoc($rr2);
                                    echo "total:" . $rr3['total_price'] . "₩";
                                }
                            ?>
                        </div>
                        <br>

                        <div style="float:right;"> 
                            <span class="clearcatalog">
                                &lt;BUY&gt;
                            </span >
                        </div>
                        <br>
                        <hr style="border : 0px; border-top: 1px dashed;">

                        <div>THANK YOU</div>

                        <hr style="border : 0px; border-top: 1px dashed;">
                    </div>
                    <div class="manage">
                        <span> manager menu </span>
                        <div class="additem" onclick="additempage();">- add item -</div>
                    </div>
                </div>