<?php
    session_start();
    if (isset($_POST['username'])){
        $errorFlag = false;
        $valid = true;
        $errorMessage = "";
        if ($_POST['password'] != $_POST['password2']){
            $valid = false;
            $errorMessage = "Your passwords don't match";
            $errorFlag = true;
        }
        if (1 !== preg_match('~[0-9]~', $_POST['password'])){
            $valid = false;
            $errorMessage = "Your password needs to have at least 1 number!";
            $errorFlag = true;
        }
        if (strlen($_POST['password']) <= 7){
            $valid = false;
            $errorMessage = "Your password needs to be at least 7 characters long!";
            $errorFlag = true;
        }
        if ($valid){
            // We are creating new user
            include '../home/larp/init_database.php';
            $stmt = $db->prepare('INSERT INTO t7user (username, pwHash) VALUES (:user, :pass)');
            $stmt->bindValue(':user', htmlspecialchars($_POST['username']), PDO::PARAM_STR);
            $stmt->bindValue(':pass', password_hash($_POST['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);
            $stmt->execute();
            header('Location: sign_in.php');
            die();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
</head>
<body>
    <?php
        if (!$valid){echo '<p style="color: red;">'.$errorMessage.'</p>';}
    ?>
    <form action="sign_up.php" method="post">
<label for="">Username: </label>
        <input type="text" name="username" id=""><br>
        <label for="">Password: </label>
        <input type="password" name="password" id=""><div style="color: red;"><?php if ($errorFlag) { ?> * <?php } ?> </div><br>
        <label for="">Enter Password Again: </label>
        <input type="password" name="password2" id=""><div style="color: red;"><?php if ($errorFlag) { ?> * <?php } ?> </div><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>