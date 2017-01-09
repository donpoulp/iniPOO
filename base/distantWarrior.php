<?php
  require_once 'baseWarrior.php';
  use GuzzleHttp\Client;


  class DistantWarrior extends BaseWarrior
  {

      static function get()
      {
        $client = new GuzzleHttp\Client();
        $resp = $client->request('GET', 'http://localhost:8181/');

        return $resp->getBody();
      }

      static function post($w)
      {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:8181/',
            // You can set any number of default request options.
            'timeout'  => 5.0,
        ]);
        $response = $client->request('POST', $w);

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
        // Get the actual cookie
        $w = DistantWarrior::get();

        $w = BaseWarrior::saveNewBase($w);

        // Save cookie
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

        // Save cookie
        DistantWarrior::post(htmlentities(serialize($w)));
      }
  };




?>
