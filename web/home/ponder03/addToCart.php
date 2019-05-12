<?php
    session_start();
    $mode = $_GET['mode'];
    $item = $_GET['item'];
    if ($mode == 'add'){
        if (isset($_SESSION[$item])){
            $_SESSION[$item] += 1;
        }
        else{
            $_SESSION[$item] = 1;
        }
        $_SESSION['total'] += 1;
    }
    else if ($mode == 'remove'){
        if (isset($_SESSION[$item]) && $_SESSION[$item] > 0){
            $_SESSION[$item] -= 1;
            $_SESSION['total'] -= 1;
        }
    }
    echo '{"total":"'.$_SESSION['total'].'","items": [';
    foreach ($_SESSION['items'] as $key => $value){
        echo '"'.$_SESSION[$value].'",';
    }
    echo '"0"]}'; // The 0 is just as a last default value since we have an extra floating comma.
?>