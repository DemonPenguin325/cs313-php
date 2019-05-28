<?php
    $file = $_SERVER['PHP_SELF'];
    session_start();
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Legends of Gerrar</a>
    </div>
    <ul class="nav navbar-nav">
      <li <?php if ($file == "/ponder03/index.php"){echo 'class="active"';} ?>><a href="./index.php">Home</a></li>
      <li <?php if ($file == "/ponder03/cart.php"){echo 'class="active"';} ?>><a href="./cart.php">Cart</a></li>
      <li <?php if ($file == "/ponder03/checkout.php"){echo 'class="active"';} ?>><a href="./checkout.php">Checkout</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li>
        <?php
          if (!isset($_SESSION['authenticated'])){
            echo '<a href="./login.php"> Log in </a>';
          }
          else{
            echo '<span>Welcome '.$_SESSION['username'].'!</span>';
          }

        ?>
      </li>
    </ul>
  </div>
</nav>