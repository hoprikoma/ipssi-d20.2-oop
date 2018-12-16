<?php

declare(strict_types=1);

class playerCreation
{
    private $tabPlayer;
    public $players;

    protected function createNumberPlayer()
    {
        for ($i=0; $i < 4 ; $i++) { 
            $tabPlayer["player".$i]["id"] = $i;
            echo "Creation du joueur :".($i+1)."<br>";
        }
        return($tabPlayer);
    }

    public function createTeam()
    {
        $players = new CheckPlayer;
        $players = $players -> checkNumber();
        $tabShuffle = array("red","red","yellow","yellow");
        shuffle($tabShuffle);
        echo "Choix aleatoire des equipes (rouge/jaune)"."<br>";
        for ($i=0; $i < 4 ; $i++) { 
            $players["player".$i]["team"] = $tabShuffle[$i];
        }
        return($players);
    }
}