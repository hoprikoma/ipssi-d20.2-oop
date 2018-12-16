<?php

declare(strict_types=1);

class Grid
{

    public $grille;

    public function createGrid()
    {
        echo"<br>";
        for ($row = 6; $row > 0; $row--) {
            
            for ($col = 1; $col < 8; $col++) {
            $grille[$row][$col] = 0;
                echo $row.",".$col." ";
            }
            echo"<br>";
          }
        return ($grille);
    }
}