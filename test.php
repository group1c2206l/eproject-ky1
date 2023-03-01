
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <input type="text" name="ab" placeholder="ab">
        <input type="submit" name="save" id="save" value="save">
    </form>
    <form action="" method="post">
        <input type="text" name="cd" placeholder="cd">
        <input type="submit" name="ok" id="save" value="ok">
    </form>
    <img src="./assets/image/slide/home-1.jpeg" alt="">

    <?php
        $ab = $cd = "";
        // if(isset($_GET["save"])) {
            
        // }
        if(isset($_POST["ok"])) {
            if(isset($_GET["ab"])) {
                $ab = $_GET["ab"];
                // echo $ab;
            }
            if(isset($_POST["cd"])) {
                $cd = $_POST["cd"];
                echo $cd.$ab;
                exec('start ping google.com.vn -t');
            }
        }
       

    ?>
</body>
</html>