@extends ('layouts.master')

@section('content')
   <div class="col-sm-5 blog-main">
        <table border="1">
          <th>Team name</th>
          <th>Goals</th>
          <th>Wins</th>
          <th >Losses
          </th>
        <tr>
        <td><a href="/teams/{{$team->id}}">{{$team->name}}</a></td>
        <td >{{ $team->goals }}</td>
        <td >{{ $team->wins }}</td>
        <td>{{ $team->losses }}</td>
        </tr>
      

   
        </table>

            <table border="1">

          <tr><th>Players</th></tr>
          @foreach ($team->players as $player)
        <tr>
        <td><a href="/players/{{$player->id}}">{{$player->name}}</a></td>
        </tr>
        @endforeach

   
        </table>
        </div>
              <div class="col-sm-7 blog-main">
        <ul><span style="color:black;">League {{$league->name}}</span>
        @foreach($league->seasons as $season)
        <li><a href="/teams/{{$team->id}}/{{$season->id}}">Season {{$season->name}}
        </li> 
        @endforeach
    
        </ul>
        </div>
        @endsection