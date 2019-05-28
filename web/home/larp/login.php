<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
    <?php
      include '../lib.php';
    ?>
    <script src="update.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <?php
            include 'nav.php'
        ?>
    </header>
    <form action="login.php" method="post" class="box">
        <div class="box-content">
            <h2>Login</h2>
            <label>Username: </label>
            <input type="text" name="username" id="username" class="form-field"><br>
            <label>Password: </label>
            <input type="password" name="password" id="password" class="form-field"><br>
            <input type="submit" value="Log In" class="btn-success">
        </div>
    </form>
    <?php
    if (isset($_POST['username']) && isset($_POST['password'])){
        echo '<p>Got the post request!</p>';
        include 'init_database.php';
        echo '<p>Loaded database</p>';
        $stmt = $db->prepare("SELECT * FROM public.user WHERE user_name = :name AND user_password = crypt(:pass, user_password);");
        $stmt->bindValue(':name', htmlspecialchars($_POST['username']), PDO::PARAM_STR);
        $stmt->bindValue(':pass', htmlspecialchars($_POST['password']), PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (sizeof(rows) < 1){
            // invalid credentials
            echo '<p>invalid credentials</p>';
        }
        else{
            echo '<p>Valid credentials</p>';
            //session_start();
            foreach ($rows as $key => $value){
                if ($value['is_admin']){
                    $_SESSION['is_admin'] = true;
                }
                $_SESSION['username'] = $value['user_name'];
            }
            header('Location: index.php');
        }
    }
    else{
        echo '<p>didnt load with variables</p>';
    }
?>
</body>
</html>