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

        <div class="col-sm-8 blog-main">
        <table>
        <th>Name</th>
          <th>Goals</th>
          <th>Assists</th>
    @foreach ($players as $player)
            
   
        <tr>
        <td><a href="/players/{{$player->id}}">{{ $player->Name}}</a></td>
        <td>{{ $player->Goals }}</td>
        <td>{{ $player->Losses }}</td>
        </tr>
        @endforeach
        </table>
      
          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
          </nav>

        </div><!-- /.blog-main --> 
        <div class="col-sm-4 blog-main">
        @foreach($leagues as $league) {
        <ul><a href="/players/{{$league->id}}">League {{$league->name}}</a>
        @foreach($leagues->seasons as $season){
        <li><a href="/players/{{$league->id}}/{{$season->id}}">Season {{$season->name}}
        </li>
        }
        </ul>
        }
        @endforeach
        </div>


@endsection