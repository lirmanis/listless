<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Main/style.css">
    <?php include 'Main/level.php'
 ?>

</head>
<body>

    <div class="container">
       <div class="UpperTab">
        <div class="cont1">
            <img class="pageIcon" src="https://cdn-icons-png.flaticon.com/256/8194/8194907.png">
            <p class="Title">Listless</p>
        </div>
        <div class="cont2">

            <div class="lvl">
                <p class="levelDisplay" id="lv">Lv.</p>
                <p class="levelDisplay"> 1</p>
            </div>

            <div class="Qoutof">
                <p class="done">  

                <?php 
                    echo $Completed;
                ?>
                    
               </p>


                <p class="out" id="of"> / 10</p>
            </div>

                <!-- PROGRESS BAR-->

            <div class="qcomp">
                <div class="bar">
                    <div class="bars"></div>
                    <div class="bars"></div>
                    <div class="bars"></div>
                    <div class="bars"></div>
                    <div class="bars"></div>
                    <div class="bars"></div>
                    <div class="bars"></div>
                    <div class="bars"></div>
                    <div class="bars"></div>
                    <div class="bars"></div>
                </div>
            </div>
        </div>
            
       </div>
    </div>

</body>
</html>