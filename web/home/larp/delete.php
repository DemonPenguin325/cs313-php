<?php
    include 'init_database.php';
    $data = explode(";", $_POST['item-to-delete']);
    $name = $data[0];
    $value = $data[1];

    // This won't catch all things because it doesn't take into account depenencies.
    $stmt = $db->prepare('DELETE FROM public.'.$name.' WHERE '.$name.'_name = :value');
    $stmt->bindValue(':value', $value, PDO::PARAM_STR);
    $stmt->execute();

    // Redirect back to edit page
    header('Location: edit.php?update=true;');
?>