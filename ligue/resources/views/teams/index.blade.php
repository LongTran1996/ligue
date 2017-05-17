@extends ('layouts.master')

@section('content')
   <table>
           	<tr>
           	<th>Team name</th>
           	<th>Goals</th>
           	<th>Wins</th> 
           	<th>Losses</th>
           	 </tr>	

          @foreach ($teams as $team)
            <td>{{ $team->name }}</td>
            <td>{{ $team->goals }}</td>
            <td>{{ $team->wins }}</td>
            <td>{{ $team->losses }}</td>

           </table>
          @endforeach
@endsection


