<!--<input id="m1" class="size" type="radio" name="size">
<label for="m1">M</label>
<input id="l1" class="size" type="radio" name="size">
<label for="l1">L</label>-->
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
            <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

                .username2{
                    font-family: "stussy";
                    display: none;
                    position: fixed;
                    font-size: 3vh;
                    cursor: pointer;
                }

                @media (max-width: 1600px) {
                    .username{
                        all:unset;
                        display: none;
                    }

                    .username2{
                        display: block;
                    }
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
                    font-size: 2vh;
                }
                .stussylogo{
                    width: 20vh;
                    height: auto;
                    cursor: pointer;
                }
                .basket{
                    font-size: 2vh;
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

                .row{
                    flex-direction: row-reverse;
                }

                .container{
                    float: right;
                    font-family: 'Courier New', Courier, monospace;
                }
                audio, canvas, embed, iframe, img, object, svg, video {
                    display: unset;
                    vertical-align: middle;
                }
            </style>

            <script>
                window.addEventListener('load', function() {
                    document.body.classList.add('loaded');
                });

                function locateindex(){
                    location.href="./index.php";
                }
                function additempage(){
                    location.href="./manageitem.php";
                }
                function catalogego(){
                    location.href="./catalog.php";
                }

            </script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

                         Stussy Korea

                    <div style=" font-size: 2vh;">
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

                <div class="username2">
                    <div onclick="catalogego();">
                        <span> basket </span>
                        <br>
                        <span> catalog!  &gt; </span>
                    </div>
                    <br>
                    <div onclick="locateindex();">
                        back
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <?php

                        $sql = "SELECT * from a";
                        $ret = mysqli_query($mysqli, $sql);

                        while($r1 = mysqli_fetch_array($ret)){
                            $file_hash = $r1['hashd'];
                            $file_path = "./files/" . $file_hash; // 파일 경로

                        ?>
                        <div style="margin: 10px;">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            

                            
                                <form class="productform" action="./webshop.php" method="post">
                                    <img class="image" src="<?=$file_path?>">
                                    <input type="hidden" name="item" value='<?=$r1[3];?>'>
                                    <input type="hidden" name="price" value='<?=$r1[4];?>'>
                                    <br>
                                    <span style="font-weight: 600; font-family:'stussy'; "><?=$r1[3];?></span>
                                    <br>
                                    <span style=""><?=$r1[4];?>₩</span>
                                    <br>

                                    <div>
                                        <hr style="border : 0px; border-top: 1px dashed;">
                                        <span>count:</span> <input type="number" name="num" value="0" min="1" max="5" step="1">
                                        <button class="btn" type="submit">add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?}?>

                    </div>
                
                </div>
                

                
            </div>

        </body>

    </html>