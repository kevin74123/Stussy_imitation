<!--<input id="m1" class="size" type="radio" name="size">
<label for="m1">M</label>
<input id="l1" class="size" type="radio" name="size">
<label for="l1">L</label>-->
<?php
    session_start();
    $mysqli=mysqli_connect("localhost","onlyicanhaveu","swpcb94610!","onlyicanhaveu");
    $id = isset($_SESSION['userid']) ? $_SESSION['userid'] : null;
    $displayins = 'none';
    if (isset($_SESSION['userid'])) {
        $userId = $_SESSION['userid'];
        if ($userId === 'kevin') {
            $displayins = 'block';
        }else{
            $displayins = 'none';
        }
    }

    $ids=$_SESSION['userid'];
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
            <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Stüssy webshop</title>

            <style>
                 @font-face {
                    font-family: "stussy";
                    src:url(./StussyScript-Regular.ttf)
                }

                @keyframes blink {
                    50% { opacity: 0; }
                }

                .logo{
                    width: 100px;
                }

                body{
                    opacity: 0;
                    transition: opacity 1s ease-in-out;
                    background-color: white;

                }

                body.loaded {
                    opacity: 1;
                }

                .blink {
                    animation: blink 1s infinite;
                }

                .username{
                    font-family: 'Courier New', Courier, monospace;
                    width: max-content;
                    position: fixed;
                    text-align: center;
                    font-family: 'Courier New', Courier, monospace;
                    background: floralwhite;
                    top: 100px;
                    right: -500px; /* 메뉴가 화면 밖에 위치 */
                    z-index: 2000;
                    background-color: white;
                    transition: right 1s ease; /* 부드러운 슬라이드 효과 */
                }

                .username.active {
                    right: 0px; /* 메뉴가 화면에 보이도록 */
                    
                }

                .stussylogo {
                    width: 100px;
                    height: auto;
                    cursor: pointer;
                    margin: 0 auto;
                    
                }

                .stussylogo img {
                    max-width: 100%; /* 이미지가 div를 넘지 않도록 설정 */
                    height: auto; /* 비율 유지 */
                }
                .catalog{
                    display: flex;
                }

                .productform{
                    padding-bottom: 10px;
                    font-family: 'Courier New', Courier, monospace;
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
                    display: <?php echo $displayins; ?>;
                }

                .additem{
                    cursor: pointer;
                }

                .container{
                    font-family: 'Courier New', Courier, monospace;
                }
                #navtext{
                    font-family: 'Courier New', Courier, monospace;
                }
                .menu span{
                    cursor: pointer;
                }

                .li{
                    display: <?php echo $displayin; ?>;
                }

                .lo{
                    display: <?php echo $displayout; ?>;
                }
                .slide-menu2 {
                    display: none;
                    font-family: 'Courier New', Courier, monospace;
                    position: fixed;
                    top: -300%;
                    width: 100%;
                    height: 100%;
                    z-index: 1000;
                    background-color: white;
                    transition: top 0.5s ease; /* 부드러운 슬라이드 효과 */
                }

                .slide-menu2.active {
                    top: 0; /* 메뉴가 화면에 보이도록 */
                }
                
                #toggle-menu2 {
                    display: none; /* 기본적으로 숨김 */
                    width: 50px;
                }
                .other {
                    display: flex; /* 기본적으로 보임 */
                }
                @media only screen and (max-device-width: 480px) {
                    #toggle-menu2 {
                        display: inline-flex; /* 화면이 1000px 이하일 때 보이도록 */
                    }
                    .other {
                        display: none; /* 화면이 1000px 초과일 때 숨김 */
                    }
                    .logo{
                    }
                    .slide-menu2{
                        display: flex; /* 화면이 1000px 이하일 때 보이도록 */
                    }
                }
            </style>

            <script>
                window.addEventListener('load', function() {
                    document.body.classList.add('loaded');
                });
                function locatecoloring(){
                    location.href="./logout.php";
                }
                function locateindex(){
                    location.href="./index.php";
                }
                function additempage(){
                    location.href="./manageitem.php";
                }
                function catalogego(){
                    location.href="./catalog.php";
                }
                function locatehoodie(){
                    location.href="./hoodie.php";
                }
            </script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        </head>

        <body onload="disableRightClick(),disableImageDrag()">

            <div class="web">

                <div class="p-5 text-black w-full flex items-center justify-between">
                    <div class="flex-1 text-center"> <!-- 1/3 영역 -->
                        <img class="logo" src="./images/Stussy-Logo-1.png">
                    </div>

                    <div class="menu flex-2 text-center" id="navtext"> <!-- 1/3 영역 -->
                        <div class="other">

                            <span  onclick="locateindex();" class="mx-2">home</span>
                            <span class="mx-2" style="text-decoration: underline;" onclick="locatetshirt();">T-shirt</span>
                            <span class="mx-2" onclick="locatehoodie();">hoodie</span>
                            <span class="mx-2">pants</span>
                            <span id="shoppingbag" class="mx-2" >receipt</span>
                            <span class="li" onclick="locatecoloring();">login<span class="blink">!</span></span>
                            <span class="lo" onclick="locatecoloring();">logout</span>
                            
                        </div>
                        <div id="toggle-menu2">
                            <img src="./images/men.png">
                        </div>

                    </div>
                </div>

                <div class="slide-menu2" id="slide-menu3">
                    
                    <div class="p-10">
                        <button class=" text-black" id="close-menu3">X</button>
                        <div class="pt-10"  onclick="locateindex();" >home</div>
                        <br>
                        <div class="pt-10"style="text-decoration: underline;" onclick="locatetshirt();">T-shirt</div>
                        <br>
                        <div class="pt-10" onclick="locatehoodie();">hoodie</div>
                        <br>
                        <div class="pt-10">pants</div>
                        <br>
                        <div class="li pt-10" onclick="locatecoloring();">login<span class="blink">!</span></div>
                        <br>
                        <div class="lo pt-10" onclick="locatecoloring();">logout</div>
                        
                    </div>
                </div>
                <script>
                    const shopping = document.getElementById('toggle-menu2');
                    const slideMenu2 = document.getElementById('slide-menu3');
                    const closeMenu2 = document.getElementById('close-menu3');

                    shopping.addEventListener('click', () => {
                        if (slideMenu2.classList.contains('active')) {
                            closeMenuFunction2();
                        } else {
                            openMenu2();
                        }
                    });

                    function openMenu2() {
                        slideMenu2.classList.add('active'); // 슬라이드 메뉴 열기
                    }

                    function closeMenuFunction2() {

                        // 점점 밝아지며 닫기
                        setTimeout(() => {
                            slideMenu2.classList.remove('active'); // 슬라이드 메뉴 닫기
                        }, 300); // 슬라이드 메뉴가 닫히는 시간과 동일하게 설정
                    }

                    closeMenu2.addEventListener('click', closeMenuFunction2);

                </script>


                <div class="username" id="slide-menu2">
                    <hr style="border : 0px; border-top: 1px dashed;">
                        <div class="stussylogo">
                            <img onclick="locateindex();" src="./images/Stussy-Logo-1.png">
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
                    
                    <button class="float-right text-black m-10 -5 text-lg" id="close-menu2">close receipt</button>
                </div>
                    
                
                <script>
                    const shopping1 = document.getElementById('shoppingbag');
                    const slideMenu3 = document.getElementById('slide-menu2');
                    const closeMenu3 = document.getElementById('close-menu2');

                    shopping1.addEventListener('click', () => {
                        if (slideMenu3.classList.contains('active')) {
                            closeMenuFunction3();
                        } else {
                            openMenu3();
                        }
                    });

                    function openMenu3() {
                        slideMenu3.classList.add('active'); // 슬라이드 메뉴 열기
                    }

                    function closeMenuFunction3() {

                        // 점점 밝아지며 닫기
                        setTimeout(() => {
                            slideMenu3.classList.remove('active'); // 슬라이드 메뉴 닫기
                        }, 300); // 슬라이드 메뉴가 닫히는 시간과 동일하게 설정
                    }

                    closeMenu3.addEventListener('click', closeMenuFunction3);
                </script>

                <div class="flex justify-center p-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <?php

                        $sql = "SELECT * from a where clthtype='tshirt';";
                        $ret = mysqli_query($mysqli, $sql);

                        while($r1 = mysqli_fetch_array($ret)){
                            $file_hash = $r1['hashd'];
                            $file_path = "./files/" . $file_hash; // 파일 경로

                        ?>
                        <style>
                            .productform {
                                width: 90%; /* 원하는 너비로 조정 */
                                max-width: 300px; /* 최대 너비 설정 */
                                margin: 0 auto; /* 중앙 정렬 */
                                box-sizing: border-box; /* 패딩을 포함한 크기 계산 */
                            }
                            .productform img {
                                width: 100%; /* 부모 요소의 너비에 맞춤 */
                                height: auto; /* 비율 유지 */
                            }

                        </style>
                            <form class="productform" action="./webshop.php" method="post">

                                <img src="<?=$file_path?>">
                                <input type="hidden" name="item" value='<?=$r1[3];?>'>
                                <input type="hidden" name="price" value='<?=$r1[5];?>'>
                                <br>
                                <span style="font-weight: 600;"><?=$r1[3];?></span>
                                <br>
                                <span style=""><?=$r1[5];?>₩</span>
                                <br>

                                <div>
                                    <hr style="border : 0px; border-top: 1px dashed;">
                                    <span>count:</span> <input type="number" name="num" value="0" min="1" max="5" step="1">
                                    <button class="btn" type="submit">add</button>
                                </div>

                            </form>
                        <?}?>
                    </div>
                </div>

            </div>

        </body>
    </html>