


@if($battleField!=NULL && $battleField->getMyWarrior()!=NULL)

  <table width=100%>

      <tr>
      <td width=33%>
        <img src="{{ $battleField->getMyWarrior()->imageUrl }}" alt="{{ get_class ($battleField->getMyWarrior()) }}" style="width:300px;">
        <img src="{{ $battleField->getMyWarrior()->weapon->imageUrl }}" alt="Pan !" style="width:100px;">
        <div class="meter">
          <span style="width:{{ $battleField->getMyWarrior()->life }}%"></span>
        </div>
      </td>

      @if($battleField->getOtherWarriors()!=NULL)
          <td width=33% align=center><img src="vs.png" alt="VS" style="width:100px;"></td>
          <td width=33%>
            <table>
            @foreach ($battleField->getOtherWarriors() as $warrior)
              <tr>
                <td>
                  <a href="{{BattleField::getHost()}}?do=fight&p1={{$battleField->getMyWarrior()->id}}&p2={{$warrior->id}}">
                    <img src="{{ $warrior->imageUrl }}" alt="{{ get_class ($warrior) }}" style="width:100px">
                  </a>
                  <img src="{{ $warrior->weapon->imageUrl }}" alt="Pan !" style="width:30px;">
                  <div class="meter">
                    <span style="width:{{ $warrior->life }}%"></span>
                  </div>
                </td>
              </tr>
            @endforeach
            </table>
          </td>
      @endif
    </tr>
  </table>


@endif
