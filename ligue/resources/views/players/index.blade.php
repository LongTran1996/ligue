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
        <td>$player->Name</td>
         @foreach($players->stats() as $stats)
         @if($stats->type) 
         
         @endif

        <td></td>
        @endforeach
        </tr>

        </table>
      
          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
          </nav>

        </div><!-- /.blog-main -->


@endsection