<?php
    session_start();
    $_SESSION['items'] = array("arrow","fire_arrow","ice_arrow","shock_arrow","bomb_arrow");
    if (!isset($_SESSION['total'])){
        $_SESSION['total'] = 0;
    }
    else{
        $_SESSION['total'] = 0;
        foreach ($_SESSION['items'] as $key => $value){
            $_SESSION['total'] += $_SESSION[$value];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <?php
        include '../lib.php';
        ?>
</head>
<body>
    <header>
        <?php
            include 'nav.php';
        ?>
    </header>
    <form action="shipped.php" method="post">
        <label>Street Address</label><br>
        <input type="text" name="streetAddress" required><br>
        <label>City</label><br>
        <input type="text" name="city" required><br>
        <label>State</label><br>
        <input type="text" name="state" size="3" maxLength="2" required><br>
        <label>ZIP Code</label><br>
        <input type="text" name="zip" size="6" maxLength="5" required><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>