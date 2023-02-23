
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        
        
       
            <input type="text" name="cd" placeholder="cd">
            <input type="submit" name="ok" id="save" value="ok">
        

        <input type="text" name="ab" placeholder="ab">
        <input type="submit" name="save" id="save" value="save">
    </form>

    <?php
    if(isset($_POST["save"])) {
        if(isset($_POST["ab"])) {
            $ab = $_POST["ab"];
            echo $ab;
        }
    }
    if(isset($_POST["ok"])) {
        if(isset($_POST["cd"])) {
            $cd = $_POST["cd"];
            echo $cd;
        }
    }
       

    ?>
</body>
</html>