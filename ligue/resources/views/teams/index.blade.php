@extends ('layouts.master')

@section('content')

   <div class="col-sm-5 blog-main">
        <table border="1">
          <th>Team name</th>
          <th>Goals</th>
          <th>Wins</th>
          <th >Losses
          </th>
        @foreach ($teams as $team)
        <tr>
        <td><a href="/teams/{{$team->id}}">{{$team->name}}</a></td>
        <td >{{ $team->goals }}</td>
        <td >{{ $team->wins }}</td>
        <td>{{ $team->losses }}</td>
        </tr>
          @endforeach
 
        </table>
      

        </div><!-- /.blog-main --> 
    <div class="col-sm-7 blog-main">
        @foreach($leagues as $league) 
        <ul><a href="/leagues/teams/{{$league->id}}" style="color:black;">League {{$league->name}}</a>
        @foreach($league->seasons as $season)
        <li><a href="/leagues/teams/{{$league->id}}/{{$season->id}}">Season {{$season->name}}
        </li> 
        @endforeach
    
        </ul>
        
        @endforeach
        </div>
        
@endsection


