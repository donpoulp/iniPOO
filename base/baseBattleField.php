<?php


  class BaseBattleField
  {
      protected $myWarrior;
      protected $otherWarriors;
      protected $otherWarrior;
      protected $vsId;

      public function setVsId($v)
      {
        $this->vsId = $v;
        $this->otherWarrior = $this->otherWarriors[$v];
      }

      public function getMyWarrior()
      {
        return $this->myWarrior;
      }

      public function getOtherWarrior()
      {
        return $this->otherWarrior;
      }

      public function getOtherWarriors()
      {
        return $this->otherWarriors;
      }

      public function __construct($first, $second)
      {
        $this->myWarrior = $first;
        $this->otherWarriors = $second;
      }

      function warriorPower($w)
      {
        return ($w->speed + $w->weapon->strength) * $w->power();
      }

      function myPowerRatio()
      {
        return $this->warriorPower($this->myWarrior) / ($this->warriorPower($this->myWarrior) + $this->warriorPower($this->otherWarrior));
      }

      function myDefenceRatio()
      {
        return $this->myWarrior->shield / ($this->myWarrior->shield + $this->otherWarrior->shield);
      }

      function permutWeapon()
      {
        $we = $this->myWarrior->weapon;
        $this->myWarrior->weapon = $this->otherWarrior->weapon;
        $this->otherWarrior->weapon = $we;
      }

      function save()
      {
        $this->myWarrior->save();
        $this->otherWarrior->save();
      }

      function iWin()
      {
        if ( $this->myWarrior->weapon->strength < $this->otherWarrior->weapon->strength)
        {
          $this->permutWeapon();
        }

        $this->otherWarrior->life -= floor(rand()/getrandmax()*50);

        // and save
        $this->save();
      }

      function iLost()
      {
        if ( $this->myWarrior->weapon->strength > $this->otherWarrior->weapon->strength)
        {
          $this->permutWeapon();
        }

        $this->myWarrior->life -= floor(rand()/getrandmax()*50);

        // and save
        $this->save();
      }

      static function getHost()
      {
        return '';
      }
      static function getHostJs()
      {
        return 'document.location.origin + document.location.pathname';
      }

  };

?>
