<?php
  use \tomkyle\Cookies\Cookie;
  use \tomkyle\Cookies\RequestCookie;
  use \tomkyle\Cookies\SendCookie;
  use \tomkyle\Cookies\UnsetCookie;
  require_once 'baseWarrior.php';


  class LocalWarrior extends BaseWarrior
  {
      static function getWarrior($id)
      {
        $cookie = new RequestCookie("Warriors");
        $w = $cookie->getValue();

        return BaseWarrior::getWarriorBase($w,$id);
      }

      static function getWarriors()
      {
        $cookie = new RequestCookie("Warriors");
        $w = $cookie->getValue();

        return BaseWarrior::getWarriorsBase($w);
      }

      static function getWarriorsExceptOne($id)
      {
        $w = LocalWarrior::getWarriors();

        if (isset($w[$id]))
          unset($w[$id]);

        return $w;
      }

      public function saveNew()
      {
        // Get the actual cookie
        $cookie = new RequestCookie("Warriors");
        $w = $cookie->getValue();

        $w = BaseWarrior::saveNewBase($w);

        // Save cookie
        new SendCookie( new Cookie( "Warriors", htmlentities(serialize($w)), new \DateTime( "14day" ) ) );
      }

      static function deleteAll()
      {
        $cookie = new RequestCookie("Warriors");
        new UnsetCookie( $cookie );
      }

      function save()
      {
        // Get the actual cookie
        $cookie = new RequestCookie("Warriors");
        $w = $cookie->getValue();

        $w = BaseWarrior::saveBase($w);

        // Save cookie
        new SendCookie( new Cookie( "Warriors", htmlentities(serialize($w)), new \DateTime( "14day" ) ) );
      }
  };




?>
