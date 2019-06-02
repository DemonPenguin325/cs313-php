<?php
    include 'init_database.php';
    $type = $_POST['item-to-add'];
    $name = htmlspecialchars($_POST['name']);
    $hp = htmlspecialchars($_POST['hp']);
    $rules = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $special = "";
    if ($type == "race"){
        $special = htmlspecialchars($_POST['magic_rule']);
    }
    else if ($type == "class"){
        $special = htmlspecialchars($_POST['type']);
    }

    $arg_string = "";
    if ($type == "race"){
        $arg_string = "(race_name, race_hp, race_rules, race_magic_rule, race_description)";
    }
    else if ($type == "class"){
        $arg_string = "(class_name, class_hp, class_rules, class_type, class_description)";
    }

    $stmt = $db->prepare('INSERT INTO public.'.$type.' '.$arg_string.' VALUES (:name, :hp, :rule, :special, :desc)');
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':hp', $hp, PDO::PARAM_STR);
    $stmt->bindValue(':rule', $rules, PDO::PARAM_STR);
    $stmt->bindValue(':special', $special, PDO::PARAM_STR);
    $stmt->bindValue(':desc', $description, PDO::PARAM_STR);
    $stmt->execute();

    // Redirect back to edit page
    header('Location: edit.php?update=true;');
?>