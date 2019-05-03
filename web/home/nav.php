<?php
    $file = $_SERVER['PHP_SELF'];
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Tristan Fullmer</a>
    </div>
    <ul class="nav navbar-nav">
      <li <?php if ($file == "home/index.php"){echo 'class="active"';} ?>><a href="./index.php">Home</a></li>
      <li <?php if ($file == "home/assignments.php"){echo 'class="active"';} ?>><a href="./assignments.php">Assignments</a></li>
      <li <?php if ($file == "home/other.php"){echo 'class="active"';} ?>><a href="#">Other</a></li>
    </ul>
  </div>
</nav>