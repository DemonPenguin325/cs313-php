<?php
    if (isset($_GET['kind'])){
        include 'init_database.php';

        $kind = htmlspecialchars($_GET['kind']);
        $stmt = $db->prepare('SELECT * FROM public.'.$kind.' WHERE '.$kind.'_name = :name');
        $stmt->bindValue(':name', htmlspecialchars($_GET['name']), PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($rows[0]);
    }
    if (isset($_POST['item-to-edit'])){
        include 'init_database.php';
        $data = explode(";", $_POST['item-to-edit']);
        $name = $data[0];
        $type = $data[1];

        $name = htmlspecialchars($_POST['name']);
        $hp = htmlspecialchars($_POST['hp']);
        $rules = htmlspecialchars($_POST['rules']);
        $description = htmlspecialchars($_POST['description']);
        $special = "";
        $specialName = "";
        if ($type == "race"){
            $special = htmlspecialchars($_POST['magic_rule']);
            $specialName = "race_magic_rule";
        }
        else if ($type == "class"){
            $special = htmlspecialchars($_POST['type']);
            $specialName = "class_type";
        }

        $stmt = $db->prepare('UPDATE public.'.$type.' SET '.$type.'_name = :name, '.$type.'_hp = :hp, '.$specialName.' = :special, '.$type.'_rules = :rules, '.$type.'_description = :desc WHERE '.$name.'_name = :name');
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':hp', $hp, PDO::PARAM_STR);
        $stmt->bindValue(':special', $special, PDO::PARAM_STR);
        $stmt->bindValue(':rules', $rules, PDO::PARAM_STR);
        $stmt->bindValue(':desc', $description, PDO::PARAM_STR);
        $stmt->execute();

        // Redirect back to edit page
        header('Location: edit.php?update=true;');
    }
?>