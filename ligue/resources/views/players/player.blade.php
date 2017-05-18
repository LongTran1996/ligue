@extends ('layouts.master')

@section('content')
   <div class="col-sm-5 blog-main">
     <table border="1">
          <th>Name</th>
          <th>Goals</th>
          <th >Assists</th>
        <tr>
        <td><a href="/players/{{$player->id}}">{{$player->name}}</a></td>
        <td>{{ $player->goals }}</td>
        <td >{{ $player->assists }}</td>
        </tr>
 
        </table>
      

        </div><!-- /.blog-main --> 

@endsection


