@extends ('layouts.master')

@section('content')

<style>
	.center { text-align: center; }
	.right { text-align: right; }
	.border { border: solid 1px #444444; }
	.border-right { border-right: solid 1px #444444; }
	.border-bottom { border-bottom: solid 1px #444444; }
	.winning { background-color: #88ff88; }
	.losing { background-color: #ff8888; }
</style>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<span>Date : {{ Carbon\Carbon::parse($match->date)->format('Y-m-d') }}</span>
			</div>
			<div class="row">
				<span>Site : {{ $match->local->localisation }}</span>
			</div>
		</div>
	</div>
	<div class="row border">
		<div class="col-md-6 {{ ($match->winning_team == $match->local->id) ? 'winning' : 'losing' }}">
			<div class="row border">
				<div class="col-md-12 center">
					<h1>Local</h1>
				</div>
				<div class="col-md-8">
					<h3><a href="/teams/{{ $match->local->id }}">{{ $match->local->name  . " (" . $match->local->seasonWins($match->season_id)->count() . " - " . $match->local->seasonDefeats($match->season_id)->count() . ")" }}</a></h3>
				</div>
				<div class="col-md-4 right">
					<h2>{{ $match->final_score_local }}</h2>
				</div>
			</div>
		</div>
		<div class="col-md-6 {{ ($match->winning_team == $match->visitor->id) ? 'winning' : 'losing' }}">
			<div class="row border">
				<div class="col-md-12 center">
					<h1>Visitor</h1>
				</div>
				<div class="col-md-4">
					<h2>{{ $match->final_score_visitor }}</h2>
				</div>
				<div class="col-md-8 right">
					<h3><a href="/teams/{{ $match->visitor->id }}">{{ $match->visitor->name  . " (" . $match->visitor->seasonWins($match->season_id)->count() . " - " . $match->visitor->seasonDefeats($match->season_id)->count() . ")" }}</a></h3>
				</div>
			</div>
		</div>
	</div>
	</br>
	<div class="row border">
		<div class="col-md-6">
			<div class="row border-bottom">
				<div class="col-md-6">Player name</div>
				<div class="col-md-2">Type</div>
				<div class="col-md-2">Time</div>
				<div class="col-md-2">Period</div>
			</div>
			@forelse ( $match->localStats() as $stat)
				<div class="row">
					<div class="col-md-6">{{ $stat->player->name }}</div>
					<div class="col-md-2">{{ $stat->type->name }}</div>
					<div class="col-md-2">{{ $stat->time }}</div>
					<div class="col-md-2">{{ $stat->period }}</div>
				</div>
			@empty
				<div class="row center">
					<h3>No stats for this team</h3>
				</div>
			@endforelse
		</div>
		<div class="col-md-6">
			<div class="row border-bottom">
				<div class="col-md-6">Player name</div>
				<div class="col-md-2">Type</div>
				<div class="col-md-2">Time</div>
				<div class="col-md-2">Period</div>
			</div>
			@forelse ( $match->visitorStats() as $stat)
				<div class="row">
					<div class="col-md-6"><a href="/players/{{ $stat->player_id }}">{{ $stat->player->name }}</a></div>
					<div class="col-md-2">{{ $stat->type->name }}</div>
					<div class="col-md-2">{{ $stat->time }}</div>
					<div class="col-md-2">{{ $stat->period }}</div>
				</div>
			@empty
				<div class="row center">
					<h3>No stats for this team</h3>
				</div>
			@endforelse
		</div>
	</div>
	</br>
</div>

@endsection