<?php
    $file = $_SERVER['PHP_SELF'];
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">The Shopping Site</a>
    </div>
    <ul class="nav navbar-nav">
      <li <?php if ($file == "/ponder03/browse.php"){echo 'class="active"';} ?>><a href="./browse.php">Browse</a></li>
      <li <?php if ($file == "/ponder03/cart.php"){echo 'class="active"';} ?>><a href="./cart.php">Cart</a></li>
      <li <?php if ($file == "/ponder03/checkout.php"){echo 'class="active"';} ?>><a href="./checkout.php">Checkout</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="./checkout.php"><span class="glyphicon glyphicon-shopping-cart"></span> Checkout <span class="badge" id="cartAmount">
      <?php if (isset($_SESSION['total'])){echo $_SESSION['total'];} else{echo "0";}?></span></a></li>
    </ul>
  </div>
</nav>