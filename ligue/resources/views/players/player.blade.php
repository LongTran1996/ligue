@extends ('layouts.master')

@section('content')
        <div class="col-sm-12 blog-main">
  <table>
        <th>Name</th>
          <th>Goals</th>
          <th>Assists</th>   
        <tr>
        <td>{{ $player->name}}</td>
        <td>{{ $player->goals }}</td>
        <td>{{ $player->assists }}</td>
        </tr>
        </table>
         </div>
@endsection


