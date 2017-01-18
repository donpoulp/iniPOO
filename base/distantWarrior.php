<?php
  require_once 'baseWarrior.php';
  use GuzzleHttp\Client;


  class DistantWarrior extends BaseWarrior
  {

      static function get()
      {
        $client = new GuzzleHttp\Client();
        $resp = $client->request('GET', 'http://campus-numerique-in-the-alps.com/php-warrior/');

        return (string)$resp->getBody();
      }

      static function post($w)
      {
        $client = new GuzzleHttp\Client();
        $response = $client->request('POST', 'http://campus-numerique-in-the-alps.com/php-warrior/', [
          'form_params' => ['val'=>$w, 'who'=>$GLOBALS['warriorID']],
          'headers' => [
            'content-type'     => 'application/x-www-form-urlencoded'
          ]]);
      }

      static function getWarrior($id)
      {
        $w = DistantWarrior::get();
        return BaseWarrior::getWarriorBase($w,$id);
      }

      static function getWarriors()
      {
        $w = DistantWarrior::get();
        return BaseWarrior::getWarriorsBase($w);
      }

      static function getWarriorsExceptOne($id)
      {
        $w = DistantWarrior::getWarriors();

        if (isset($w[$id]))
          unset($w[$id]);

        return $w;
      }

      public function saveNew()
      {
        if (property_exists($this,'id') && $this->id!=$GLOBALS['warriorID'])
          throw new Exception('Seul les autres étudiants peuvent créer des combatants !!!');

        // Get the actual cookie
        $w = DistantWarrior::get();
        $w = BaseWarrior::saveNewBase($w);
        // Save
        DistantWarrior::post(htmlentities(serialize($w)));
      }

      static function deleteAll()
      {
        throw new Exception('Ce serait beaucoup trop simple de gagner comme ça !!!');
      }

      function save()
      {
        // Get the actual cookie
        $w = DistantWarrior::get();
        $w = BaseWarrior::saveBase($w);
        // Save
        DistantWarrior::post(htmlentities(serialize($w)));
      }
  };




?>
