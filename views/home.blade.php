
<html>
<head>
  <title>Warrior Project</title>
  <!-- Fonts -->
  <link href="simple.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
  <link href="https://unpkg.com/nes.css/css/nes.css" rel="stylesheet" />

  <style>
    html, body, pre, code, kbd, samp {
      font-family: "Press Start 2P";
    }
  </style>
</head>
<body>

  <div class="container">

    @foreach ($errors as $e)
      @include('error', ['txt' => $e])
    @endforeach


    <h1>Warrior Project</h1>

    <p class="nes-balloon from-left nes-pointer">
      Si les étapes sont validées, une étoile <i class="nes-icon is-small star"></i> apparait au rechargement de la page
    </p>

    @foreach ($results as $result)
        <div class="nes-container is-rounded is-dark mb-3">
          <div class="flex items-center">
            @if ($result->valid_ok)
              <i class="nes-icon is-large star"></i>
            @else
              <i class="nes-icon is-large star is-empty"></i>
            @endif
            <p class="ml-3">{!! $result->title !!}</p>
          </div>
        </div>
    @endforeach


    @if (checkNbBadAnswers($results) < 4)
      <h1 class="mt-3">Ready to fight ? </h1>
      <div class="flex mb-3">
        <a href="{{BattleField::getHost()}}?do=createMy&me={{$me}}" class="nes-btn is-primary mr-3">Create My Warrior</a>
        <a href="{{BattleField::getHost()}}?do=createOther&me={{$me}}" class="nes-btn is-primary  mr-3">Create Another</a>
        <a href="{{BattleField::getHost()}}?do=deleteAll&me={{$me}}" class="nes-btn is-error">Delete All</a>

      </div>

      @include('battlefield')

    @endif

    @if (checkNbBadAnswers($results) == 0)
      <h1  class="mt-3">Pour aller plus loin ... </h1>
      <ul class="nes-list is-disc">
        <li>Créez plus de  guerriers</li>
        <li>Affichez les caractéristiques de vos guerriers (Je vous conseille de le faire dans battlefield.blade.php)</li>
        <li>Pour avoir un vrai champ de bataille, faites hériter warrior de DistantWarrior</li>
        <li>Créez le guerrier le plus fort de l'arène</li>
        <li>Battez tous les autres guerriers</li>
        <li>Devenez immortels</li>
        <li>Implémentez un "vrai" serveur de jeux, à partir de <a href="https://github.com/le-campus-numerique/PHP_POO_Serve">POO Serve</a></li>
      </ul>

    @endif

  </div>

</body>
</html>
