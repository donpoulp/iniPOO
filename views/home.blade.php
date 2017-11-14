
<html>
<head>
  <title>Warrior Project</title>
  <!-- Fonts -->
  <link href="simple.css" rel="stylesheet" type="text/css">

</head>
<body>

  @foreach ($errors as $e)
    @include('error', ['txt' => $e])
  @endforeach


  <h1>Warrior Project</h1>

  <table>
  @foreach ($results as $result)
    <tr>
    <td>
      @if ($result->valid_ok)
        <div class="led-green"></div>
      @else
        <div class="led-red"></div>
      @endif
    </td>
      <td>{!! $result->title !!}</td>
    </tr>
  @endforeach
  </table>


  @if (checkNbBadAnswers($results) < 4)
    <h1>Ready to fight ? </h1>
    <a href="{{BattleField::getHost()}}?do=createMy&me={{$me}}">Create My</a> <br>
    <a href="{{BattleField::getHost()}}?do=createOther&me={{$me}}">Create Other</a> <br>
    <a href="{{BattleField::getHost()}}?do=deleteAll&me={{$me}}">Delete All</a> <br>

    @include('battlefield')

  @endif

  @if (checkNbBadAnswers($results) == 0)
    <h1>Pour aller plus loin ... </h1>
    <ul>
      <li>Créez plus de  guerriers</li>
      <li>Affichez les caractéristiques de vos guerriers (Je vous conseille de le faire dans battlefield.blade.php)</li>
      <li>Pour avoir un vrai champ de bataille, faites hériter warrior de DistantWarrior</li>
      <li>Créez le guerrier le plus fort de l'arène</li>
      <li>Battez tous les autres guerriers</li>
      <li>Devenez immortels</li>
      <li>Passez, si ce n'est déjà fait, tous les membres de Warrior en private</li>
      <li>Implémentez un "vrai" serveur de jeux, à partir de <a href="https://github.com/campus-digital-grenoble/POO_serv">POO Serv</a></li>
    </ul>

  @endif



</body>
</html>
