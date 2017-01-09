<?php

  require_once __DIR__ . "/../base/distantBattleField.php";
  require_once "warrior.php";


  class BattleField extends localBattleField
  {
    static function createMyWarrior()
    {
      $me = new PokemonWarrior($GLOBALS['warriorID']);
      $me->weapon = new Weapon(1,20);
      $me->imageUrl = 'http://assets.pokemon.com/assets/cms2/img/pokedex/full//025.png';
      $me->weapon->imageUrl = 'http://vignette1.wikia.nocookie.net/warframe/images/0/03/LatoPrimePistolHI.png/revision/latest?cb=20130406033121';
      $me->saveNew();
    }

    static function createOtherWarrior()
    {
      $him = new PokemonWarrior(2);
      $him->weapon = new Weapon(2,10);
      $him->imageUrl = 'http://www.pokemon20.com/assets/img/mythical/victini/poke_victini.png';
      $him->weapon->imageUrl = 'http://vignette1.wikia.nocookie.net/elderscrolls/images/9/95/BM_Nord_Battleaxe_weapon.png/revision/latest?cb=20130825003605';
      $him->saveNew();

      $him2 = new MarvelWarrior('superman');
      $him2->weapon = new Weapon(3,50);
      $him2->imageUrl = 'http://www.pngall.com/wp-content/uploads/2016/03/Superman-Anime-PNG.png';
      $him2->weapon->imageUrl = 'http://vignette4.wikia.nocookie.net/deadislandpedia/images/7/7e/Dead_island_weapon.png/revision/latest?cb=20130101031228&path-prefix=de';
      $him2->saveNew();
    }
  }



?>
