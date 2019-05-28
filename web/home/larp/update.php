<?php
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
            $race_data = "<p class='box-subtitle'>".$name.": ".$desc."</p>";
        }
    }
    if (isset($_GET['class'])){
        $stmt = $db->prepare('SELECT * FROM public.class WHERE class_name = :name');
        $stmt->bindValue(':name', htmlspecialchars($_GET['race']), PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $key => $value){
            $name = $value['class_name'];
            $desc = $value['class_description'];
            $class_data = "<p class='box-subtitle'>".$name.": ".$desc."</p>";
        }
    }
    if (isset($_GET['stat'])){

        // UNDER CONSTRUCTION. THIS ISN'T IN THE DATABASE YET

        /*$stmt = $db->prepare('SELECT race_name, race_description FROM public.race WHERE race_name = :name');
        $stmt->bindValue(':name', htmlspecialchars($_GET['race']), PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $name = $row['race_name'];
        $desc = $row['race_description'];
        $stat_data = "<p class='box-subtitle'>".$name.": ".$desc."</p>";*/
    }

    echo '{"race":"'.$race_data.'","class":"'.$class_data.'","stats":"'.$stat_data.'"}';
?>