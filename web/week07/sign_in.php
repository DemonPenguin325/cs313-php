<?php
    session_start();
    if (isset($_POST['username'])){
        // attempt to log in
        include '../home/larp/init_database.php';
        $stmt = $db->prepare('SELECT * FROM t7user WHERE username = :user AND pwHash = :pass');
        $stmt->bindValue(':user', htmlspecialchars($_POST['username']), PDO::PARAM_STR);
        $stmt->bindValue(':pass', password_hash($_POST['password']), PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (sizeof($rows) == 1){
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $rows[0]['username'];
            header('Location: welcome.php');
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
    <title>Sign In</title>
</head>
<body>
    <form action="sign_in.php" method="post">
    <label for="">Username: </label>
        <input type="text" name="username" id=""><br>
        <label for="">Password: </label>
        <input type="password" name="password" id=""><br>
        <input type="submit" value="Submit"><br>
        <a href="sign_up.php">Are you new? Sign Up here!</a>
    </form>
</body>
</html>