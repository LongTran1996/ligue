<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Team extends Model
{

    public function players()
    {
    	  return $this->belongsToMany(Player::class, 'Player_Team');
    }
    public function league()
    {
    	  return $this->belongsTo(League::class);
    }

    public function matchs() {
    	$matchs = Match::where('visitor_team', '=', $this->id)->orWhere('local_team', '=', $this->id);
    	return $matchs;
    }

    public function seasonMatchs($id) {
    	$seasonMatchs = new Collection();

    	if($this->verifySeason($id)) {
	    	foreach($this->matchs()->get() as $match) {
	    		if($match->season_id == $id) {
	    			$seasonMatchs->add($match);
	    		}
	    	}
		}
    	return $seasonMatchs;
    }

    public function seasonStats($id) {
    	if($this->verifySeason($id)) {
    		$seasonStats = (object) [
    			'wins' => $this->seasonWins($id),
    			'defeats' => $this->seasonDefeats($id),
    			'goals' => $this->seasonGoals($id),
    			'assists' => $this->seasonAssists($id)
    		];
    		return $seasonStats;
    	}
    	return null;
    }

    public function allStats() {
    	$allStats = (object) [
    		'wins' => $this->allWins(),
    		'defeats' => $this->allDefeats(),
    		'goals' => $this->allGoals(),
    		'assists' => $this->allAssists()
    	];
    	return $allStats;
    }

    public function verifySeason($id) {
    	if($this->league->seasons->pluck('id')->contains($id)) {
    		return true;
    	}
    	return false;
    }

    public function seasonWins($id) {
    	$seasonWins = new Collection();

    	if($this->verifySeason($id)) {
    		foreach($this->allWins() as $win) {
    			if($win->season_id == $id) {
    				$seasonWins->add($win);
    			}
    		}
    	}
    	return $seasonWins;
    }

    public function seasonDefeats($id) {
		$seasonDefeats = new Collection();

    	if($this->verifySeason($id)) {
    		foreach($this->allDefeats() as $defeat) {
    			if($defeat->season_id == $id) {
    				$seasonDefeats->add($defeat);
    			}
    		}
    	}
    	return $seasonDefeats;
    }

    public function seasonGoals($id) {
    	$seasonGoals = new Collection();

    	if($this->verifySeason($id)) {
    		foreach($this->allGoals() as $goal) {
    			if($goal->match->season_id == $id) {
    				$seasonGoals->add($goal);
    			}
    		}
    	}
    	return $seasonGoals;
    }

    public function seasonAssists($id) {
    	$seasonAssists = new Collection();

    	if($this->verifySeason($id)) {
    		foreach($this->allAssists() as $assist) {
    			if($assist->match->season_id == $id) {
    				$seasonAssists->add($assist);
    			}
    		}
    	}
    	return $seasonAssists;
    }

    public function allWins() {
    	$wins = new Collection();

    	foreach($this->matchs()->get() as $match) {
    		if($match->winning_team == $this->id) {
    			$wins->add($match);
    		}
    	}
    	return $wins;
    }

    public function allDefeats() {
    	$defeats = new Collection();

    	foreach($this->matchs()->get() as $match) {
    		if($match->winning_team != $this->id) {
    			$defeats->add($match);
    		}
    	}
    	return $defeats;
    }

    public function allGoals() {
    	$goals = new Collection();

    	foreach($this->matchs()->get() as $match) {
    		foreach($match->stats as $stat) {
    			if($this->players->contains($stat->player_id)) {
    				if($stat->type->id == 1) {
						$goals->add($stat);
    				}
    			}
    		}
    	}
    	return $goals;
    }

    public function allAssists() {
    	$assists = new Collection();

    	foreach($this->matchs()->get() as $match) {
    		foreach($match->stats as $stat) {
    			if($this->players->contains($stat->player_id)) {
    				if($stat->type->id == 2) {
						$assists->add($stat);
    				}
    			}
    		}
    	}
    	return $assists;
    }
}