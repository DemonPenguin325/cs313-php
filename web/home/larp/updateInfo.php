<?php
    
    // ----------------------------------------------------------------------------------------------------
// - Display Errors
// ----------------------------------------------------------------------------------------------------
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

// ----------------------------------------------------------------------------------------------------
// - Error Reporting
// ----------------------------------------------------------------------------------------------------
error_reporting(-1);

// ----------------------------------------------------------------------------------------------------
// - Shutdown Handler
// ----------------------------------------------------------------------------------------------------
function ShutdownHandler()
{
    if(@is_array($error = @error_get_last()))
    {
        return(@call_user_func_array('ErrorHandler', $error));
    };

    return(TRUE);
};

register_shutdown_function('ShutdownHandler');

// ----------------------------------------------------------------------------------------------------
// - Error Handler
// ----------------------------------------------------------------------------------------------------
function ErrorHandler($type, $message, $file, $line)
{
    $_ERRORS = Array(
        0x0001 => 'E_ERROR',
        0x0002 => 'E_WARNING',
        0x0004 => 'E_PARSE',
        0x0008 => 'E_NOTICE',
        0x0010 => 'E_CORE_ERROR',
        0x0020 => 'E_CORE_WARNING',
        0x0040 => 'E_COMPILE_ERROR',
        0x0080 => 'E_COMPILE_WARNING',
        0x0100 => 'E_USER_ERROR',
        0x0200 => 'E_USER_WARNING',
        0x0400 => 'E_USER_NOTICE',
        0x0800 => 'E_STRICT',
        0x1000 => 'E_RECOVERABLE_ERROR',
        0x2000 => 'E_DEPRECATED',
        0x4000 => 'E_USER_DEPRECATED'
    );

    if(!@is_string($name = @array_search($type, @array_flip($_ERRORS))))
    {
        $name = 'E_UNKNOWN';
    };

    return(print(@sprintf("%s Error in file \xBB%s\xAB at line %d: %s\n", $name, @basename($file), $line, $message)));
};

$old_error_handler = set_error_handler("ErrorHandler");
    
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
        $type = $data[0];
        $name = $data[1];

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

        $stmt = $db->prepare('UPDATE public.'.$type.' SET '.$type.'_name = :name, '.$type.'_hp = :hp, '.$specialName.' = :special, '.$type.'_rules = :rules, '.$type.'_description = :desc WHERE '.$type.'_name = :name');
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