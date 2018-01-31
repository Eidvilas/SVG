<?php



interface WeaponInterface {
    public function getMaxDamage();
    public function getMinDamage();
    public function getName();

}


abstract class StaticValuesWeapon implements WeaponInterface {
    public $MaxDamage;
    public $MinDamage;
    public $Name;

    public function getMaxDamage() {
        return $this->MaxDamage;
    }

    public function getMinDamage() {
        return $this->MinDamage;
    }

    public function getName() {
        return $this->Name;
    }




}

class Excalibur extends StaticValuesWeapon {
    public function getMaxDamage() {
        return 150;
    }

    public function getMinDamage() {
        return 100;
    }

    public function getName() {
        return  "Excalibur";
    }

}

class Pickaxe extends StaticValuesWeapon {
    public function getMaxDamage() {
        return 100;
    }

    public function getMinDamage() {
        return 150;
    }

    public function getName() {
        return  "Pickaxe";
    }
}

class MagicScepter extends StaticValuesWeapon {
    public function getMaxDamage() {
        return 10;
    }

    public function getMinDamage() {
        return 500;
    }

    public function getName() {
        return  "MagicScepter";
    }
}

interface ArmorInterface {
    public function getName();
    public function getAmount();
}


class ClothArmor implements ArmorInterface {
    public function getName(){
        return "Cloth Armor";
    };

    public function getAmount(){
        return 10;
    };


}

class CgainVest implements ArmorInterface {
    public function getName(){
        return "Chain Vest";
    };
    public function getAmount(){
        return 50;
    };
}

class NanoSuit implements ArmorInterface {
    public function getName(){
        return "Nano Suit";
    };
    public function getAmount(){
        return 150;
    };
}

interface PlayerInterface {
    public function getWeapon();
    public function getArmor();
    public function getName();
    public function reduceHealth($param);
    public function getHealth();
}

class Player {
    public $name;
    public $health;
    public $weapon;
    public $armor;

    public function __construct($name, $health, $weapon, $armor)
    {
        $this->name=$name;
        $this->health=$health;
        $this->weapon=$weapon;
        $this->armor=$armor;
    }

    public function getWeapon(){

    };

    public function getArmor(){

    };

    public function getName(){

    };

    public function reduceHealth(){

    };

    public function getHealth(){

    };



}

$excalibur = new Excalibur();
$clothArmor = new ClothArmor();
$player1 = new Player ('Jonas', 2000, $excalibur, $clothArmor);

$magicScepter = new MagicScepter;
$nanoSuit = new NanoSuit();
$player2 = new Player ('Petras', 1500, $magicScepter, $nanoSuit);

$game = new Game($player1, $player2);

$game->start();



















