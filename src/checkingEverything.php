<?php

declare (strict_types = 1);

class CheckPlayer extends playerCreation
{
    protected function checkNumber()
    {
        $allPlayer = new playerCreation;
        $content = $allPlayer->createNumberPlayer();
        if (count($content) % 2 == "1") {
            $remove = array_pop($content);
            unset($remove);
        }
        return ($content);
    }

    private function frequency($tab, $number, $x)
    {
        $count = 0;
        $flag = " ";
        for ($i = 0; $i < $number; $i++) {
            if ($count == 4) {
                break;
            }
            if ($tab[$i] === $x && $flag === $x) {

                $count++;
            } elseif ($tab[$i] === $x) {
                $count = 1;
            } else {
                $count = 0;
            }
            $flag = $tab[$i];
        }

        return $count;
    }

    private function checkLine($grid)
    {
        foreach ($grid as $value) {
            $x = 'yellow';
            $number = sizeof($value);
            $check = frequency($tab, $number, $x);
            if ($check == 4) {
                $score[0] = $x;
                $score[1] = 1;
            }

            $x = 'red';
            $number = sizeof($value);
            $check = frequency($tab, $number, $x);
            if ($check == 4) {
                $score["winner"] = $x;
                $score["flag"] = 1;
            }
            return($score);
        }
    }

    private function checkColumn($grid)
    {
        foreach ($grid as $value) {

            $yellow = array();
            for ($col = 0; $col <= 7; $col++) {
                for ($line = 0; $line <= 6; $line++) {
                    $yellow[$line] = $grid[$line][$col];
                }
                $y = 'yellow';
                $n = sizeof($yellow);
                print_r($yellow);
                $reponse = frequency($yellow, $n, $y);
                echo $reponse;
                if ($reponse == 4) {
                    $score["winner"] = $y;
                    $score["flag"] = 1;
                    return($score);
                }
            }

            $red = array();
            for ($col = 0; $col <= 7; $col++) {
                for ($line = 0; $line <= 6; $line++) {
                    $red[$line] = $grid[$line][$col];
                }
                $r = 'red';
                $n = sizeof($red);
                $reponse = frequency($red, $n, $r);
                echo $reponse;
                if ($reponse == 4) {
                    $score["winner"] = $r;
                    $score["flag"] = 1;
                    return($score);
                }
            }
        }
    }

    private function checkDiagonal($grid)
    {

    }
}
