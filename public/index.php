<?php

  require_once '../vendor/autoload.php';
  require_once '../base/checkAnswer.php';
  require_once '../students/warrior.php';
  require_once '../students/battleField.php';

  use Philo\Blade\Blade;

  $views = __DIR__ . '/../views';
  $cache = __DIR__ . '/../cache';

  set_error_handler('handle_notices', E_NOTICE);
  function handle_notices($severity, $message, $filename, $lineno) {
      throw new NoticeException($message, 0, $severity, $filename, $lineno);
  }


  $blade = new Blade($views, $cache);

  $results = CheckAnswer();

  $errors = array();
  $me = $GLOBALS['warriorID'];
  $battleField = NULL;
  $myWarrior = NULL;
  $otherWarriors = NULL;


  try {
    $myWarrior = Warrior::getWarrior($GLOBALS['warriorID']);
  } catch (Exception $e) {
  }

  try {
    $otherWarriors = Warrior::getWarriorsExceptOne($GLOBALS['warriorID']);
  } catch (Exception $e) {
  }

  $battleField = new BattleField($myWarrior, $otherWarriors);

  $url = parse_url($_SERVER['REQUEST_URI']);

  if (!isset($url['query']))
  {
      echo $blade->view()->make('home')->with('results',$results)->with('me',$me)->with('errors', $errors)->with('battleField', $battleField)->render();
      return;
  }



  parse_str($url['query'], $params);

  if (!isset($params['do']))
  {
      echo $blade->view()->make('home')->with('results',$results)->with('me',$me)->with('errors', $errors)->with('battleField', $battleField)->render();
      return;
  }


  if ( $params['do']=='fight')
  {
      $battleField->setVsId($params['p2']);
      echo $blade->view()->make('fight')->with('battleField', $battleField)->render();
      return;
  }

  if ( $params['do']=='iwin')
  {
      try {

        $battleField->setVsId($params['p2']);
        $battleField->iWin();
      } catch (Exception $e) {
          array_push($errors, $e->getMessage());
      }

      // recreate the battle field

        try {
          $myWarrior = warrior::getWarrior($GLOBALS['warriorID']);
        } catch (Exception $e) {
            array_push($errors, $e->getMessage());
        }

        try {
          $otherWarriors = warrior::getWarriorsExceptOne($GLOBALS['warriorID']);
        } catch (Exception $e) {
            array_push($errors, $e->getMessage());
        }

        $battleField = new BattleField($myWarrior, $otherWarriors);

      echo $blade->view()->make('home')->with('results',$results)->with('me',$me)->with('errors', $errors)->with('battleField', $battleField)->render();
      return;
  }

  if ( $params['do']=='ilost')
  {
      try{
          $battleField->setVsId($params['p2']);
          $battleField->iLost();
      } catch (Exception $e) {
          array_push($errors, $e->getMessage());
      }

      // try recreate the battle field

      try {
        $myWarrior = NULL;
        $myWarrior = warrior::getWarrior($GLOBALS['warriorID']);
      } catch (Exception $e) {
          array_push($errors, $e->getMessage());
      }

      try {
        $otherWarriors = warrior::getWarriorsExceptOne($GLOBALS['warriorID']);
      } catch (Exception $e) {
          array_push($errors, $e->getMessage());
      }

      $battleField = new BattleField($myWarrior, $otherWarriors);

      echo $blade->view()->make('home')->with('results',$results)->with('me',$me)->with('errors', $errors)->with('battleField', $battleField)->render();
      return;
  }

  if ( $params['do']=='createMy')
  {

      try {
          battleField::createMyWarrior();

      } catch (Exception $e) {
          array_push($errors, $e->getMessage());
      }
      // try recreate the battle field

      try {
        $myWarrior = warrior::getWarrior($GLOBALS['warriorID']);
      } catch (Exception $e) {
          array_push($errors, $e->getMessage());
      }

      try {
        $otherWarriors = warrior::getWarriorsExceptOne($GLOBALS['warriorID']);
      } catch (Exception $e) {
          array_push($errors, $e->getMessage());
      }

      $battleField = new BattleField($myWarrior, $otherWarriors);

      // recheck results
      $results = checkAnswer();

      echo $blade->view()->make('home')->with('results',$results)->with('me',$me)->with('errors', $errors)->with('battleField', $battleField)->render();
      return;
  }

  if ( $params['do']=='createOther')
  {
      try {
          battleField::createOtherWarrior();

      } catch (Exception $e) {
          array_push($errors, $e->getMessage());
      }

      // try recreate the battle field

        try {
          $myWarrior = warrior::getWarrior($GLOBALS['warriorID']);
        } catch (Exception $e) {
            array_push($errors, $e->getMessage());
        }

        try {
          $otherWarriors = warrior::getWarriorsExceptOne($GLOBALS['warriorID']);
        } catch (Exception $e) {
            array_push($errors, $e->getMessage());
        }

        $battleField = new BattleField($myWarrior, $otherWarriors);

        // recheck results
        $results = checkAnswer();

      echo $blade->view()->make('home')->with('results',$results)->with('me',$me)->with('errors', $errors)->with('battleField', $battleField)->render();
      return;
  }
  if ( $params['do']=='deleteAll')
  {
      try {
          warrior::deleteAll();
      } catch (Exception $e) {
          array_push($errors, $e->getMessage());
      }

      // try recreate the battle field
      $myWarrior = NULL;
      $otherWarriors = NULL;
      $battleField = new BattleField($myWarrior, $otherWarriors);

      // recheck results
      $results = checkAnswer();

      echo $blade->view()->make('home')->with('results',$results)->with('me',$me)->with('errors', $errors)->with('battleField', $battleField)->render();
      return;
  }


  // else
  echo $blade->view()->make('home')->with('results',$results)->with('me',$me)->with('errors', $errors)->with('battleField', $battleField)->render();
  echo $do;





?>
