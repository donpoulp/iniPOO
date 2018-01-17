<?php

  require_once '../students/warrior.php';

  class TestWarrior extends Warrior
  {
  }

  class ResultElement
  {
    public $title = "";
    public $valid_ok=false;
    public $customFns;

    function __construct($t,$f)
    {
        $this->title = $t;
        $this->customFns['user_method'] = $f;
    }

    public function __call($name,$args){
      $args['caller']=$this;
      return call_user_func_array($this->customFns[$name],$args);
    }

    public function call_test()
    {
      if ($this->user_method())
      {
        $this->valid_ok = true;
      }

      return $this->valid_ok;
    }
  }

  function CheckAnswer()
  {
    // Create the tests


    // Check 1
    $change_id = new ResultElement("1/ Modifiez la variable globale warriorID dans le fichier <u>students/warrior.php</u>",function(){
      return $GLOBALS['warriorID'] != 'azertyuiop' ;
    });

    // Check 2
    $class_exits = new ResultElement("2/ Les <u>classes</u> StartrekWarrior, MarvelWarrior et PokemonWarrior doivent être crées dans le ficher <u>students/warrior.php</u> ",function(){
      return (class_exists('StartrekWarrior')
      && class_exists('MarvelWarrior')
      && class_exists('PokemonWarrior'));
    });

    // Check 3
    $is_subclass = new ResultElement("3/ Les <u>classes</u> StartrekWarrior, MarvelWarrior et PokemonWarrior doivent <u>hériter</u> de Warrior ",function(){

      $sWarrior = new StartrekWarrior(1);
      $mWarrior = new MarvelWarrior(2);
      $pWarrior = new PokemonWarrior(3);

      return (is_subclass_of($sWarrior,'Warrior')
      && is_subclass_of($mWarrior,'Warrior')
      && is_subclass_of($pWarrior,'Warrior'));
    });

    // Check 4
    $has_properties1 = new ResultElement("4/ La <u>classe</u> Warrior doit avoir les <u>attributs (publics)</u> \$id, \$name, \$speed, \$life et \$shield, \$imageUrl et \$weapon",function(){

      $warrior = new TestWarrior(4);

      return (property_exists($warrior,'id')
      && property_exists($warrior,'name')
      && property_exists($warrior,'speed')
      && property_exists($warrior,'life')
      && property_exists($warrior,'shield')
      && property_exists($warrior,'imageUrl')
      && (property_exists($warrior,'weapon')));
    });

    // Check 5
    $has_properties2 = new ResultElement("5/ Les <u>classe</u> StartrekWarrior, MarvelWarrior et PokemonWarrior doivent avoir respectivement les <u>attributs</u>  \$mentalPower, \$superPower et \$level",function(){

      $sWarrior = new StartrekWarrior(5);
      $mWarrior = new MarvelWarrior(6);
      $pWarrior = new PokemonWarrior(7);

      return (property_exists($sWarrior,'mentalPower')
      && property_exists($mWarrior,'superPower')
      && property_exists($pWarrior,'level'));
    });

    // Check 6
    $power_method = new ResultElement("6/ Les <u>classes</u> StartrekWarrior, MarvelWarrior et PokemonWarrior doivent avoir un méthode power qui retournent respectivement \$mentalPower, \$superPower et \$level",function(){

      $sWarrior = new StartrekWarrior(9);
      $sWarrior->mentalPower = 12;
      $mWarrior = new MarvelWarrior(10);
      $mWarrior->superPower = 12;
      $pWarrior = new PokemonWarrior(11);
      $pWarrior->level = 12;

      return (
        method_exists($sWarrior,'power') && $sWarrior->power() == $sWarrior->mentalPower
        && method_exists($mWarrior,'power') && $mWarrior->power() == $mWarrior->superPower
        && method_exists($pWarrior,'power') && $pWarrior->power() == $pWarrior->level
      );

    });

    // Check 7
    $has_constructors = new ResultElement("7/ Les <u>classes</u> Warrior, StartrekWarrior, MarvelWarrior et PokemonWarrior doivent avoir des <u>constructeurs</u> ",function(){

      $warrior = new TestWarrior(8);
      $sWarrior = new StartrekWarrior(9);
      $mWarrior = new MarvelWarrior(10);
      $pWarrior = new PokemonWarrior(11);

      return (method_exists($warrior,'__construct')
      && method_exists($sWarrior,'__construct')
      && method_exists($mWarrior,'__construct')
      && method_exists($pWarrior,'__construct'));
    });

    // Check 8
    $warrior_constructor_value = new ResultElement("8/ Le <u>constructeur</u> de Warrior doit prendre en paramètre un \$id et initialiser l'id, speed=30, life=100, shield=20",function(){

      $warrior = new TestWarrior(12);

      return ($warrior->id == 12 && $warrior->speed==30 && $warrior->shield == 20 && $warrior->life ==100);
    });

    // Check 9
    $other_constructor_values = new ResultElement("9/ Les <u>constructeurs</u> des sous classes de warrior doivent appeler le <u>constructeur</u> de Warrior et affecter \$mentalPower = 8, \$superPower = 100, \$level = 1",function(){

      $sWarrior = new StartrekWarrior(10);
      $mWarrior = new MarvelWarrior(11);
      $pWarrior = new PokemonWarrior(12);

      return ($sWarrior->id == 10 && $sWarrior->mentalPower == 8 &&
      $mWarrior->id == 11 && $mWarrior->superPower == 100 &&
      $pWarrior->id == 12 && $pWarrior->level == 1 && $pWarrior->speed==30 && $pWarrior->shield == 20 && $pWarrior->life ==100);

    });


    // Check 10
    $has_weapon = new ResultElement("10/ Une <u>classe</u> Weapon doit être créée",function(){


        return (class_exists('Weapon'));
    });

    // Check 11
    $has_set_weapon = new ResultElement("11/ La <u>classe</u> Warrior doit avoir une <u>méthode</u> SetWeapon() qui prend comme <u>argument</u> un Weapon. ATTENTION, c'est un <u>setter</u>",function(){

      $warrior = new TestWarrior(10);
      $sWarrior = new StartrekWarrior(11);
      $mWarrior = new MarvelWarrior(12);
      $pWarrior = new PokemonWarrior(13);

      if (!method_exists($warrior,'SetWeapon')) return false;

      $we = new Weapon(5,100);
      $warrior->SetWeapon($we);

      return ($warrior->weapon == $we);
    });

    // Check 12
    $weapon_has_attirbutes = new ResultElement("12/ Weapon doivent avoir les <u>attributs (publics)</u> \$id, \$strength et \$imageUrl ",function(){

      $weapon = new Weapon(22,100);

      return (property_exists($weapon,'id')
      && property_exists($weapon,'strength')
      && property_exists($weapon,'imageUrl'));
    });

    // Check 13
    $has_constructors2 = new ResultElement("13/ Weapon doit avoir un <u>constructeur</u> à 2 arguments qui initialise \$id et \$strength",function(){

      $weapon = new Weapon(22,100);

      return (method_exists($weapon,'__construct') && $weapon->id == 22 && $weapon->strength == 100);
    });

    // Check 14
    $has_set_url = new ResultElement("14/ Warrior et Weapon doivent avoir une <u>méthode</u> SetImageUrl(\$url) ",function(){

      $warrior = new TestWarrior(23);
      $weapon = new Weapon(24,100);

      if (method_exists($warrior,'SetImageUrl') && method_exists($weapon,'SetImageUrl')) {
        $warrior->SetImageUrl('test');
        $weapon->SetImageUrl('test');

        return $warrior->imageUrl == 'test' && $weapon->imageUrl == 'test';
      } else {
         return false;
      }
    });

    // Check 15
    $has_create_my = new ResultElement("15/ La classe BattleField du fichier students/battleField.php doit avoir une <u>méthode statique</u> createMyWarrior",function(){
        try{
            $MethodChecker = new ReflectionMethod('BattleField','createMyWarrior');
            return ($MethodChecker->isStatic() );
        }  catch (Exception $e) {

        }

    });

    // Check 16
    $has_my_warrior = new ResultElement("16/ La méthode createMyWarrior doit <u>instancier</u> un guerrier, lui affecter une arme, une image et le sauvegarder (ie la classe localWarrior contient une <u>méthode</u> saveNew), ATTENTION, l'id du guerrier doit être la <u>variable globale</u> warriorID, créez votre guerrier grace au lien ci-dessous",function(){

      $myWarrior = NULL;
      try {
        $myWarrior = Warrior::getWarrior($GLOBALS['warriorID']);
      } catch (Exception $e) {
      }

      return ($myWarrior != NULL  && $myWarrior->weapon!=NULL && $myWarrior->imageUrl!='');
    });

    // Check 17
    $has_create_others = new ResultElement("17/ La <u>classe</u> BattleField doit avoir une <u>méthode statique</u> createOtherWarrior",function(){
        try{
            $MethodChecker = new ReflectionMethod('BattleField','createOtherWarrior');
            return ($MethodChecker->isStatic() );
        } catch (Exception $e) {
        }

    });

    // Check 18
    $has_other_warriors = new ResultElement("18/ La <u>méthode statique</u> createOtherWarrior doit <u>instancier</u> un guerrier, lui affecter une arme, une image et le sauvegarder (ie la <u>classe</u> localWarrior contient une <u>méthode</u> saveNew), créez les autres guerriers grace au lien ci-dessous",function(){

      $otherWarriors = NULL;

      try {
        $otherWarriors = Warrior::getWarriorsExceptOne($GLOBALS['warriorID']);
      } catch (Exception $e) {
      }

      return ($otherWarriors != NULL && sizeof($otherWarriors)!=0);
    });

    // record the tests
    $results = array($change_id, $class_exits, $is_subclass,
    $has_properties1,$has_properties2, $power_method, $has_constructors, $warrior_constructor_value, $other_constructor_values,
    $has_weapon,
    $has_set_weapon, $weapon_has_attirbutes, $has_constructors2, $has_set_url, $has_create_my,
    $has_my_warrior, $has_create_others, $has_other_warriors);


    // Execute the tests
    foreach ($results as $result) {
      if (!$result->call_test()) {
        return $results;
      }
    }


    // All tests passed
    return $results;
  }

  function checkNbBadAnswers($results)
  {
    $nb =  0;
    foreach ($results as $result) {
      if (!$result->valid_ok) {
        $nb++;
      }
    }
    return $nb;
  }

?>
