@extends ('layouts.master')

@section('content')

<style>
	.pad-left { padding-left:10px; }
	.pad-bottom { padding-bottom:5px; }
	.srow { border-bottom: solid 1px #bbbbbb; }
	.top-row { border: solid 1px #888888; }
</style>

<div class="container">
	@forelse ($leagues as $league) 

	<div class="col-md-12">
		<div class="pad-left">
			<a href="/matchs/league/{{ $league->id }}"><h4>{{$league->name . " (" . $league->category . ")"}}</h4></a>
		</div>
		<div class="pad-left">
			<div class="pad-left row top-row">
				<div class="col-md-4"><strong>Season</strong></div>
				<div class="col-md-3"><strong>Start date</strong></div>
				<div class="col-md-3"><strong>End date</strong></div>
			</div>

			@forelse ($league->seasons->sortByDesc('start_date') as $i => $season) 
				<div class="pad-left pad-bottom row" data-toggle="collapse" data-target="#{{ $season->id }}" style="background-color:{{ ( $i % 2 == 0 ) ? '#ffffff' : '#dddddd'}};">
					<div class="col-md-4">{{ $season->name }}</div>
					<div class="col-md-3">{{ Carbon\Carbon::parse($season->start_date)->format('Y-m-d') }}</div>
					<div class="col-md-3">{{ Carbon\Carbon::parse($season->end_date)->format('Y-m-d') }}</div>
					<div class="col-md-2"><a href="/matchs/season/{{ $season->id }}">See more</a></div>
				</div>
				<div class="container pad-left collapse" id="{{ $season->id }}">
					<div class="pad-left row top-row">
						<div class="col-md-4"><strong>Date</strong></div>
						<div class="col-md-3"><strong>Local team</strong></div>
						<div class="col-md-3"><strong>Visitor team</strong></div>
					</div>
					@forelse($season->matchs->sortByDesc('date') as $match)
						<div class="pad-left srow row">
							<div class="col-md-4">{{ $match->date }}</div>
							<div class="col-md-3" style="font-weight:{{ ( $match->local_team == $match->winning_team ) ? 'bold' : ''}};">{{ $match->local->name . " (" . $match->final_score_local . ")" }}</div>
							<div class="col-md-3" style="font-weight:{{ ( $match->visitor_team == $match->winning_team) ? 'bold' : ''}};">{{ $match->visitor->name . " (" . $match->final_score_visitor . ")" }}</div>
							<div class="col-md-2"><a href="/matchs/{{ $match->id }}">See more</a></div>
						</div>
					@empty
						<h3>No match yet in this season</h3>
					@endforelse
				</div>
			@empty

				<div class="container pad-left">
					<h2>No seasons in this league</h2>
				</div>

			@endforelse
		</div>
	</div>

	@empty

	<div class="container pad-left">
		<h2>No leagues</h2>
	</div>

	@endforelse
</div>

@endsection