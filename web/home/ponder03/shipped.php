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
    <title>Confirmation</title>
    <script src="./browse.js"></script>
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
    <h1 class="centered">Your order will be shipped to</h1>
    <p class="centered">
        <?php
            // Sanatizing the data
            $street = filter_var($_POST['streetAddress'], FILTER_SANITIZE_STRING);
            $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
            $state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
            $zip = filter_var($_POST['zip'], FILTER_SANITIZE_STRING);

            echo $street."<br>".$city.", ".$state." ".$zip;
        ?>
    </p>
    <div class="container">
        <h1 class="centered">Your Order</h1>
    <?php
        $items = array("arrow","fire_arrow","ice_arrow","shock_arrow","bomb_arrow");
        for ($i=0; $i<count($items); $i++){
            $item = $items[$i];
            if ($i % 3 == 0){
                echo "<div class='row'><div class='col-sm-1'></div>";
            }
            // Column div
            echo "<div class='col-sm-3 item'>\n";
            // Content
            if (isset($_SESSION[$item]) && $_SESSION[$item] > 0){
                echo "<p id='$i'>Amount: ".$_SESSION[$item]."</p>";
                echo "<img class='item-element' src='Resources/$item.png' alt='$item'><br>\n";
            }
            // End column div
            echo "</div>\n";
            if ($i % 3 == 2){
                echo "</div>";
            }
        }
    ?>
    </div>
    <?php
        session_unset();
        session_destroy();
    ?>
    <script>document.getElementById("cartAmount").innerHTML = "0";</script>
</body>
</html>