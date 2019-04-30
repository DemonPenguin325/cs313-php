<header>
    <nav>
        <h3>AlphaCo.</h3>
        <ul>
            <?php
                $file = __FILE__;
                $home = "";
                $login = "";
                $about = "";
                if (__FILE__ == "home.php"){
                    $home = "highlight";
                }
                else if (__FILE__ == "about-us.php"){
                    $about = "highlight";
                }
                else if (__FILE__ == "login.php"){
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