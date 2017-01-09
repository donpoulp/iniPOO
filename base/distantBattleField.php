<?php

  require_once 'localBattleField.php';

  class distantBattleField extends localBattleField
  {
    static function getHost()
    {
      return 'http://localhost::8181/';
    }

    static function getHostJs()
    {
      return 'http://localhost::8181/';
    }
  }


 ?>
