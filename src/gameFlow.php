<?php

declare (strict_types = 1);

final class gameFlow
{

    public function firstPlayer($Player)
    {
        echo"Choix du 1er participant"."<br>";
        $tabOrder = array();
        $first = rand(0, 3);
        $tabOrder["player1"] = $Player["player" . $first];
        unset($Player["player" . $first]);

        $i = 1;
        $x = 2;
        while (count($Player) != 0) {
            foreach ($Player as $value => &$players) {
                if ($players['team'] != $tabOrder["player" . $i]["team"]) {
                    $tabOrder["player" . $x] = $players;
                    unset($Player[$value]);
                    break;
                }
            }
            $i++;
            $x++;
        }
        return ($tabOrder);
    }

    public function tokenPlacing($grid, $firstPlay)
    {
        $i = 1;
        while (1) {
            echo "<br>";
            echo "tour" . $i;
            foreach ($firstPlay as $value => &$players) {
                $x = 6;
                $ramdomInt = rand(1, 7);
                while (1) {
                    if ($grid[$x][$ramdomInt] === 0) {
                        if ($x == 1) {
                            $grid[$x][$ramdomInt] = $players['team'];
                            echo "<br>";
                            echo $value . " joue en : " . $x . "," . $ramdomInt . "  ";
                            echo "<br>";
                            break;
                        }
                        $x--;
                    } else {
                        $x++;
                        if ($x == 7) {
                            $ramdomInt = rand(1, 7);
                            $x = 6;
                        } else {
                            $grid[$x][$ramdomInt] = $players['team'];
                            echo "<br>";
                            echo $value . " joue en : " . $x . "," . $ramdomInt . "  ";
                            echo "<br>";
                            break;
                        }
                    }
                }
                $this->displayGrid($grid);

                $verif = new CheckPlayer;
                $debug = $verif->checkFull($grid);
                $score = $verif->checkGrid($grid);
                if ($score["flag"] == 1) {
                    break;
                }
                if ($debug == 6) {
                    break;
                }
            }
            if ($score["flag"] == 1) {
                echo '<br>' . "Les grands gagnants sont l'equipe " . $score["winner"];
                break;
            }
            if ($debug == 6) {
                echo '<br>' . "C'est une égalité";
                break;
            }
            echo "<br>";
            $i++;
        }
    }

    public function displayGrid($grid)
    {
        foreach ($grid as $value) {
            echo "<br>";
            print_r($value);
        }
    }
}
