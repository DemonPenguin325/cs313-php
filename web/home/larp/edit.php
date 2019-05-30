<?php
    session_start();
    /*if ($_SESSION['is_admin'] != true){
        header('Location: login.php');
    }*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <?php
      include '../lib.php';
    ?>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <?php
            include 'nav.php';
            include 'init_database.php';
        ?>
    </header>

    <ul class="nav nav-pills nav-justified">
        <li class="active"><a data-toggle="pill" href="#edit">Edit</a></li>
        <li><a data-toggle="pill" href="#add">Add</a></li>
        <li><a data-toggle="pill" href="#delete">Delete</a></li>
    </ul>

    <div class="tab-content">
        <div id="edit" class="tab-pane fade in active">
            <h3 class="form-text">Edit</h3>
            <p class="form-text">Some content.</p>
            <form action="edit.php" method="post" class="box">
                <div class="box-content">
                    <label>Item to edit: </label>
                    <select name="item-to-edit">
                        <optgroup label="Races">
                            <?php
                                $stmt = $db->prepare("SELECT race_name FROM public.race");
                                $stmt->execute();
                                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($rows as $key => $value){
                                    $name = $rows['race_name'];
                                    echo '<option label="'.$name.'">'.ucfirst($name).'</option>';
                                }
                            ?>
                        </optgroup>
                        <optgroup label="Classes">
                        <?php
                            $stmt = $db->prepare("SELECT class_name FROM public.class");
                            $stmt->execute();
                            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($rows as $key => $value){
                                $name = $rows['class_name'];
                                echo '<option label="'.$name.'">'.ucfirst($name).'</option>';
                            }
                            ?>
                        </optgroup>
                        <optgroup label="Rules">
                        
                        </optgroup>
                    </select>
                    <input type="submit" value="Submit" class="btn-success">
                </div>
            </form>
        </div>
        <div id="add" class="tab-pane fade">
            <h3 class="form-text">Add</h3>
            <p class="form-text">Some content in menu 1.</p>
        </div>
        <div id="delete" class="tab-pane fade">
            <h3 class="form-text">Delete</h3>
            <p class="form-text">Some content in menu 2.</p>
        </div>
    </div>
</body>
</html>