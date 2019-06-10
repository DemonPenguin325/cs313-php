<?php
    session_start();
    // Code here to return the contents of race, class, and stats info
    include 'init_database.php';

    $race_data = "DEFAULT";
    $class_data = "DEFAULT";
    $stat_data = "DEFAULT";

    if (isset($_GET['race'])){
        $stmt = $db->prepare('SELECT * FROM public.race WHERE race_name = :name');
        $stmt->bindValue(':name', htmlspecialchars($_GET['race']), PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $key => $value){
            $name = $value['race_name'];
            $desc = $value['race_description'];
            $hp = (isset($value['race_hp']) ? $value['race_hp'] : 5);

            $race_data = "<p class='box-subtitle'>".ucfirst($name).": </p>";
            $race_data .= "<p class='box-text'>Description: ".$desc."</p>";
            $race_data .= "<p class='box-text'>Base HP: ".$hp."</p>";
            $race_data .= "<p class='box-text'>Abilities: ".(isset($value['race_rules']) ? $value['race_rules'] : "None")."</p>";

            $_SESSION['raceHP'] = $hp;
            $_SESSION['magic_rule'] = $values['race_magic_rule'];
        }
    }
    if (isset($_GET['class'])){
        $stmt = $db->prepare('SELECT * FROM public.class WHERE class_name = :name');
        $stmt->bindValue(':name', htmlspecialchars($_GET['class']), PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $key => $value){
            $name = $value['class_name'];
            $desc = $value['class_description'];
            $hp = (isset($value['class_hp']) ? $value['class_hp'] : 0);

            $class_data = "<p class='box-subtitle'>".ucfirst($name).": </p>";
            $class_data .= "<p class='box-text'>Description: ".$desc."</p>";
            $class_data .= "<p class='box-text'>Bonus HP: ".$hp."</p>";
            $class_data .= "<p class='box-text'>Abilities: ".(isset($value['class_rules']) ? $value['class_rules'] : "None")."</p>";

            $_SESSION['classHP'] = $hp;
            if (strtolower($value['class_type']) == "magic"){
                $_SESSION['isMagical'] = true;
            }
        }
    }

    $stat_data = "<p class='box-text'>Total HP: ".($_SESSION['raceHP'] + $_SESSION['classHP'])."</p>";
    if ($_SESSION['isMagical']){
        $stat_data .= "<p class='box-text'>Bonus Rules: ".$_SESSION['magic_rule']."</p>";
    }

    // json return
    echo '{"race":"'.$race_data.'","class":"'.$class_data.'","stats":"'.$stat_data.'"}';
?>