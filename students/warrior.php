<?php

require_once __DIR__ . "/../base/distantWarrior.php";
//require __DIR__ . "/../base/ConnectedWarrior.php";

$GLOBALS['warriorID'] = 'Raf';


// Définissez vos class de combattants

class Warrior extends DistantWarrior {
  public $name = "aa";
  public $speed = 0;
  public $life = 0;
  public $shield = 0;
  public $imageUrl = "";

  public function __construct($id)
  {
    $this->id = $id;
    $this->speed = 30;
    $this->life = 100;
    $this->shield = 20;
  }

  public function SetWeapon($w)
  {
    $this->weapon = $w;
  }

  public function SetUrl($u)
  {
    $this->imageUrl = $u;
  }
};


class StartrekWarrior extends Warrior {
  public $mentalPower = 8;

  function power()
  {
    return $this->mentalPower;
  }
};

class MarvelWarrior extends Warrior {
  public $superPower = 100;

  function power()
  {
    return $this->superPower;
  }
};
class PokemonWarrior extends Warrior {
  public $level = 1;

  function power()
  {
    return $this->level;
  }
};


class Weapon
{
  public $id;
  public $strength  = 30;
  public $imageUrl = "";

  public function __construct($id, $strength)
  {
    $this->id = $id;
    $this->strength = $strength;
  }

  public function SetUrl($u)
  {
    $this->imageUrl = $u;
  }
}


?>
