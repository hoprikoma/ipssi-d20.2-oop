<?php
// use Support\Application;

// if (!is_file(__DIR__.'/vendor/autoload.php')) {
//     throw new LogicException('The autoload file does not exist, please use composer install');
// }
// require __DIR__.'/vendor/autoload.php';

// echo (new Application($argv, require __DIR__.'/config/di.global.php'))->run();
require("src/autoloader.php");
autoloader::register();

$grid = new Grid;
$grid = $grid -> createGrid();
$game = new playerCreation;
$game = $game -> createTeam();
$flow = new gameFlow;
$firstPlay = $flow -> firstPlayer($game);
$placement = $flow -> tokenPlacing($grid, $firstPlay);