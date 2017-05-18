@extends ('layouts.master')

@section('content')

    <div class="blog-header">
      <div class="container">
        <h1 class="blog-title">NHL Players</h1>
        <p class="lead blog-description">NHL Players & Stats</p>
      </div>
    </div>

 <!--   <div class="container"> -->

  <!--      <div class="row"> -->

        <div class="col-sm-5 blog-main">
        <table border="1">
          <th>Name</th>
          <th>Goals</th>
          <th style="padding-left:50px;">Assists</th>
    @foreach ($players as $player)
            
    
        <tr>
        <td><a href="/players/{{$player->id}}">{{$player->name}}</a></td>
        <td>{{ $player->goals }}</td>
        <td style="padding-left:50px;">{{ $player->assists }}</td>
        </tr>
        @endforeach
        </table>
      

        </div><!-- /.blog-main --> 
        <div class="col-sm-7 blog-main">
        @foreach($leagues as $league) 
        <ul><a href="/leagues/players/{{$league->id}}" style="color:black;">League {{$league->name}}</a>
        @foreach($league->seasons as $season)
        <li><a href="/leagues/players/{{$league->id}}/{{$season->id}}">Season {{$season->name}}
        </li> 
        @endforeach
    
        </ul>
        
        @endforeach
        </div>


@endsection