<?php
    $file = $_SERVER['PHP_SELF'];
    //session_start();
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Legends of Gerrar</a>
    </div>
    <ul class="nav navbar-nav">
      <li <?php if ($file == "/larp/index.php"){echo 'class="active"';} ?>><a href="./index.php">Home</a></li>
      <li <?php if ($file == "/larp/characters.php"){echo 'class="active"';} ?>><a href="./characters.php">Characters</a></li>
      <?php
        if ($_SESSION['is_admin'] == true){
          echo '<li ';
          if ($file == "/ponder03/edit.php"){
            echo 'class="active"';
          }
          echo '><a href="./edit.php">Edit</a></li>';
        }
      //<li <?php if ($file == "/ponder03/edit.php"){echo 'class="active"';} ><a href="./edit.php">Edit</a></li>
      ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li>
        <?php
          if (!isset($_SESSION['authenticated'])){
            echo '<a href="./login.php"> Log in </a>';
          }
          else{
            echo '<span style="color: white;">Welcome '.$_SESSION['username'].'!</span>';
          }

        ?>
      </li>
    </ul>
  </div>
</nav>