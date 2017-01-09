
<html>
<head>
  <title>Warrior Project</title>
  <!-- Fonts -->
  <link href="simple.css" rel="stylesheet" type="text/css">
  <script language="JavaScript" type="text/javascript" src="jquery.min.js"></script>
  <script>
    $( document ).ready(function() {

      var power = 50;
      var fullpower = 100;
      var addpower = {{ $battleField->myPowerRatio() }}*50;
      var takepower = (1-{{ $battleField->myDefenceRatio() }})*5;

      var powerb = document.getElementById("powerbar");
      var btn = document.getElementById("power-btn");

      btn.onclick=function(){
        if (power < fullpower){

          console.log(power);
          power += addpower;
          powerb.style.width = power + '%';


        }

        if (power >= fullpower) {
          document.location.href={{BattleField::getHostJs()}}+'?do=iwin&p1={{$battleField->getMyWarrior()->id}}&p2={{$battleField->getOtherWarrior()->id}}';
        }
      }


      var refreshIntervalId=setInterval(function(){powerdown();},50);



      function powerdown() {

        if (power > 0 && power < fullpower) {

        power -= takepower;

        console.log("losing power...");
        console.log(power);
        powerb.style.width = power + '%';

        }
        if (power <=0) {

            clearInterval(refreshIntervalId);
            document.location.href={{BattleField::getHostJs()}}+'?do=ilost&p1={{$battleField->getMyWarrior()->id}}&p2={{$battleField->getOtherWarrior()->id}}';
        }

      }


  });
  </script>

</head>
<body>
  <h1>Warrior Project</h1>

  <table>
    <tr>
      <td>
        <img src="{{ $battleField->getMyWarrior()->imageUrl }}" alt="{{ get_class ($battleField->getMyWarrior()) }}" style="width:300px;">
        <img src="{{ $battleField->getMyWarrior()->weapon->imageUrl }}" alt="Pan !" style="width:100px;">
      </td>

      <td width=100%>
        <div id="cont">
          <div id="powerbar"></div>
        </div>
      </td>

      <td>
        <img src="{{ $battleField->getOtherWarrior()->imageUrl }}" alt="{{ get_class ($battleField->getOtherWarrior()) }}" style="width:300px">
        <img src="{{ $battleField->getOtherWarrior()->weapon->imageUrl }}" alt="Pan !" style="width:100px;">

      </td>
    </tr>
  </table>
  <div id="power-btn">Raaahhhhh !</div>

</body>
</html>
