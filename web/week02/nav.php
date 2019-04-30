<header>
    <nav>
        <h3>AlphaCo.</h3>
        <ul>
            <?php
                $home = "";
                $login = "";
                $about = "";
                if (__FILE__ == "home"){
                    $home = "highlight";
                }
                else if (__FILE__ == "about-us"){
                    $about = "highlight";
                }
                else if (__FILE__ == "login"){
                    $login = "highlight";
                }
                echo "<li class='$home'><a href='./home.php'>Home</a></li>";
                echo "<li class='$login'><a href='./login.php'>Login</a></li>";
                echo "<li class='$about'><a href='./about-us.php'>About</a></li>";
            ?>
        </ul>
    </nav>
</header>