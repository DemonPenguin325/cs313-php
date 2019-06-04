<?php
    session_start();
    if (isset($_POST['username'])){
        // We are creating new user
        include '../home/larp/init_database.php';
        $stmt = $db->prepare('INSERT INTO t7user (username, pwHash) VALUES (:user, :pass)');
        $stmt->bindValue(':user', htmlspecialchars($_POST['username']), PDO::PARAM_STR);
        $stmt->bindValue(':pass', password_hash($_POST['password']), PDO::PARAM_STR);
        $stmt->execute();
        header('Location: sign_in.php');
        die();
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
    <form action="sign_up.php" method="post">
        <label for="">Username: </label>
        <input type="text" name="username" id=""><br>
        <label for="">Password: </label>
        <input type="password" name="password" id=""><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>