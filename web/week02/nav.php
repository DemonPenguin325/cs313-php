<header>
    <nav>
        <h3>AlphaCo.</h3>
        <ul>
            <?php
                $file = $_SERVER['PHP_SELF'];//basename(__FILE__, ".php");
                $home = "";
                $login = "";
                $about = "";
                if ($file == "home.php"){
                    $home = "highlight";
                }
                else if ($file == "about-us.php"){
                    $about = "highlight";
                }
                else if ($file == "login.php"){
                    $login = "highlight";
                }
                echo "<li class='$home'><a href='./home.php'>Home</a></li>";
                echo "<li class='$login'><a href='./login.php'>Login</a></li>";
                echo "<li class='$about'><a href='./about-us.php'>About</a></li>";

                echo "<h1>$file</h1>";
            ?>
        </ul>
    </nav>
</header>