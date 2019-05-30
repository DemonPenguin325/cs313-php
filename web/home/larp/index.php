<?php
    //include 'init_database.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LARP Character Creator</title>
    <?php
      include '../lib.php';
    ?>
    <script src="update.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <?php
            include 'nav.php';
        ?>
    </header>
    <!-- Side navigation -->
    <div class="sidenav">
        <h2 class="side-title"> Options</h2>
        <div class="dropdown">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Race <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" onclick="addRace('human')">Human</a></li>
                <li><a class="dropdown-item" href="#" onclick="addRace('elf')">Elf</a></li>
                <li><a class="dropdown-item" href="#" onclick="addRace('skeleton/ghost')">Undead</a></li>
            </ul>
        </div>
        <div class="dropdown">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Class <span class="caret"></span></button>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#" onclick="setClass('knight')">Knight</a></li>
            <li><a class="dropdown-item" href="#" onclick="setClass('paladin')">Paladin</a></li>
            <li><a class="dropdown-item" href="#" onclick="setClass('bard')">Bard</a></li>
            </ul>
        </div>
        <div class="dropdown">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Additional Rules <span class="caret"></span></button>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#" onclick="addRule('Rule 1')">Rule 1</a></li>
            <li><a class="dropdown-item" href="#" onclick="addRule('Rule 2')">Rule 2</a></li>
            <li><a class="dropdown-item" href="#" onclick="addRule('Rule 3')">Rule 3</a></li>
            </ul>
        </div>
    </div>

    <!-- Page content -->
    <div class="main">
        <div class="row">
            <div class="col-sm-3 box">
                <h2 class="box-title">Race</h2>
                <div id="race-info">
                    <p class="box-subtitle">Human: </p>
                </div>
            </div>
            <div class="col-sm-1"></div> <!-- Buffer -->
            <div class="col-sm-3 box">
                <h2 class="box-title">Class</h2>
                <div id="class-info">
                    <p class="box-subtitle">Knight: </p>
                </div>
            </div>
            <div class="col-sm-1"></div> <!-- Buffer -->
            <div class="col-sm-3 box">
                <h2 class="box-title">Stats</h2>
                <div id="stats-info">
                    <p class="box-subtitle">Info: </p>
                </div>
            </div>
            <!-- Covers the space for the side bar. Leave empty -->
            <div class="col-sm-1"></div>
        </div>
    </div>
</body>
</html>