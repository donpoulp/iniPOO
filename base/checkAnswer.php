<?php

  class resultElement
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

  function checkAnswer()
  {
    // Create the tests
    // Check 1
    $change_id = new resultElement("Le wariorID doit être votre reflet",function(){
      return $GLOBALS['warriorID'] != 'azertyuiop' ;
    });

    // Check 2
    $class_exits = new resultElement("Les <u>classes</u> StartrekWarrior, MarvelWarrior et PokemonWarrior doivent être crées ",function(){
      return (class_exists('StartrekWarrior')
      && class_exists('MarvelWarrior')
      && class_exists('PokemonWarrior'));
    });

    // Check 3
    $is_subclass = new resultElement("Les <u>classes</u> StartrekWarrior, MarvelWarrior et PokemonWarrior doivent <u>hériter</u> de Warrior ",function(){

      $sWarrior = new StartrekWarrior(1);
      $mWarrior = new MarvelWarrior(2);
      $pWarrior = new PokemonWarrior(3);

      return (is_subclass_of($sWarrior,'Warrior')
      && is_subclass_of($mWarrior,'Warrior')
      && is_subclass_of($pWarrior,'Warrior'));
    });

    // Check 4
    $has_properties1 = new resultElement("La <u>classe</u> Warrior doit avoir les <u>membres</u> \$name, \$speed, \$life et \$shield, \$imageUrl",function(){

      $warrior = new Warrior(4);

      return (property_exists($warrior,'name')
      && property_exists($warrior,'speed')
      && property_exists($warrior,'life')
      && property_exists($warrior,'shield')
      && property_exists($warrior,'imageUrl'));
    });

    // Check 5
    $has_properties2 = new resultElement("Les <u>classe</u> StartrekWarrior, MarvelWarrior et PokemonWarrior doivent avoir respectivement les <u>membres</u>  \$mentalPower, \$superPower et \$level",function(){

      $sWarrior = new StartrekWarrior(5);
      $mWarrior = new MarvelWarrior(6);
      $pWarrior = new PokemonWarrior(7);

      return (property_exists($sWarrior,'mentalPower')
      && property_exists($mWarrior,'superPower')
      && property_exists($pWarrior,'level'));
    });

    // Check 6
    $has_constructors = new resultElement("Les <u>classes</u> Warrior, StartrekWarrior, MarvelWarrior et PokemonWarrior doivent avoir des <u>constructeurs</u> ",function(){

      $warrior = new Warrior(8);
      $sWarrior = new StartrekWarrior(9);
      $mWarrior = new MarvelWarrior(10);
      $pWarrior = new PokemonWarrior(11);

      return (method_exists($warrior,'__construct')
      && method_exists($sWarrior,'__construct')
      && method_exists($mWarrior,'__construct')
      && method_exists($pWarrior,'__construct'));
    });

    // Check 7
    $warrior_constructor_value = new resultElement("Le <u>constructeur</u> de Warrior doit prendre en paramètre un \$id et initialiser speed=30, life=100, shield=20",function(){

      $warrior = new Warrior(12);

      return ($warrior->id == 12 && $warrior->speed==30 && $warrior->shield == 20 && $warrior->life ==100);
    });

    // Check 8
    $other_constructor_values = new resultElement("Les <u>constructeurs</u> des sous classes de warrior doivent appeler le <u>constructeur</u> de Warrior et affecter \$mentalPower = 8, \$superPower = 100, \$level = 1, Warrior doit prendre en paramètre un \$id et initialiser speed=30, life=100, shield=20",function(){

      $sWarrior = new StartrekWarrior(10);
      $mWarrior = new MarvelWarrior(11);
      $pWarrior = new PokemonWarrior(12);

      return ($sWarrior->id == 10 && $sWarrior->metalPower == 8 &&
      $mWarrior->id == 11 && $mWarrior->superPower == 100 &&
      $pWarrior->id == 12 && $pWarrior->level == 1 && $pWarrior->speed==30 && $pWarrior->shield == 20 && $pWarrior->life ==100);

    });

    $has_weapon = new resultElement("une <u>classe</u> Weapon doit être créée",function(){
    // Check 9

        return (class_exists('Weapon'));
    });

    // Check 10
    $has_set_weapon = new resultElement("La <u>classe</u> Warrior doit avoir une <u>méthode</u> SetWeapon() qui prend comme <u>argument</u> un Weapon",function(){

      $warrior = new Warrior(10);
      $sWarrior = new StartrekWarrior(11);
      $mWarrior = new MarvelWarrior(12);
      $pWarrior = new PokemonWarrior(13);

      if (!method_exists($warrior,'SetWeapon')) return false;

      $we = new Weapon(5,100);
      $warrior->SetWeapon($we);

      return ($warrior->weapon == $we);
    });

    // Check 11
    $has_constructors2 = new resultElement("Weapon doit avoir un <u>constructeur</u> qui initialise \$id ",function(){

      $weapon = new Weapon(22,100);

      return (method_exists($weapon,'__construct') && $weapon->id == 22);
    });

    // Check 12
    $weapon_has_attirbutes = new resultElement("Weapon doivent avoir les <u>attributs</u> \$id, \$strength et \$imageUrl ",function(){

      $weapon = new Weapon(22,100);

      return (property_exists($weapon,'id')
      && property_exists($weapon,'strength')
      && property_exists($weapon,'imageUrl'));
    });

    // Check 13
    $has_set_url = new resultElement("Warrior et Weapon doivent avoir une <u>méthode</u> SetUrl(\$url) ",function(){

      $warrior = new Warrior(23);
      $weapon = new Weapon(24,100);

      return (method_exists($warrior,'SetUrl') && method_exists($weapon,'SetUrl') );
    });

    // Check 14
    $has_create_my = new resultElement("La classe BattleField doit avoir une <u>méthode statique</u> createMyWarrior",function(){
      $MethodChecker = new ReflectionMethod('BattleField','createMyWarrior');
      return ($MethodChecker->isStatic() );
    });

    // Check 15
    $has_my_warrior = new resultElement("La createMyWarrior doit <u>instancier</u> un guerrier, lui affecter une arme, une image et le sauvegarder (ie la classe localWarrior contient une <u>méthode</u> save)",function(){

      $myWarrior = NULL;

      try {
        $myWarrior = warrior::getWarrior($GLOBALS['warriorID']);
      } catch (Exception $e) {
      }

      return ($myWarrior != NULL  && $myWarrior->weapon!=NULL && $myWarrior->imageUrl!='');
    });

    // Check 16
    $has_create_others = new resultElement("La <u>classe</u> BattleField doit avoir une <u>méthode statique</u> createOtherWarrior",function(){
      $MethodChecker = new ReflectionMethod('BattleField','createOtherWarrior');
      return ($MethodChecker->isStatic() );
    });

    // Check 17
    $has_other_warriors = new resultElement("La createMyWarrior doit <u>instancier</u> un guerrier, lui affecter une arme, une image et le sauvegarder (\ie la <u>classe</u> localWarrior contient une <u>méthode</u> save)",function(){

      $otherWarriors = NULL;

      try {
        $otherWarriors = warrior::getWarriorsExceptOne($GLOBALS['warriorID']);
      } catch (Exception $e) {
      }

      return ($otherWarriors != NULL && sizeof($otherWarriors)!=0);
    });

    // record the tests
    $results = array($change_id, $class_exits, $is_subclass,
    $has_properties1,$has_properties2, $has_constructors, $warrior_constructor_value, $has_weapon,
    $has_set_weapon,$has_constructors2,$weapon_has_attirbutes, $has_set_url, $has_create_my,
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
