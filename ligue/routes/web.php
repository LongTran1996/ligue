<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');


// ************************************ Routes des matchs ***************************************

// Présentation d'un match
Route::get('/matchs/{match}', 'MatchController@show');

// Présentation de tous les matchs
Route::get('/matchs', 'MatchController@index');

// Présentation de tous les matchs d'une équipe
Route::get('/matchs/team/{team}', 'MatchController@teamShow');

// Page de création d'un match
// Restreint aux rôles : admin
Route::get('/matchs/create', 'MatchController@create')->middleware('admin');

// Sauvegarde d'un match lors de la création
// Restreint aux rôles : admin
Route::post('/matchs', 'MatchController@store')->middleware('admin');

// Page de gestion des matchs pour les administrateurs
// Restreint aux rôles : admin 
Route::get('/matchs/edit', 'MatchController@allEdit')->middleware('admin');

// Page de gestion des matchs pour les administrateurs pour une équipe
// Restreint aux rôles : admin 
Route::get('/matchs/team/edit/{team}', 'MatchController@teamEdit')->middleware('admin');

// Modifier un match
// Restreint aux rôles : admin
Route::get('/matchs/edit/{match}', 'MatchController@edit')->middleware('admin');

// Sauvegarde des modifications d'un match
// Restreint aux rôles : admin
Route::post('/matchs/edit', 'MatchController@update')->middleware('admin');

// Efface un match
// Restreint aux rôles : admin 
Route::get('/matchs/delete/{match}', 'MatchController@delete')->middleware('admin');


// ************************************ Routes des leagues **************************************

// Présentation d'une league
Route::get('/leagues/{league}', 'LeagueController@show');

// Présentation de toutes les leagues
Route::get('/leagues', 'LeagueController@index');

// Page de création d'une league
// Restreint aux rôles : admin
Route::get('/leagues/create', 'LeagueController@create')->middleware('admin');

// Sauvegarde d'une league
// Restreint aux rôles : admin
Route::post('/leagues', 'LeagueController@store')->middleware('admin');

// Modifier toutes les leagues
// Restreint aux rôles : admin
Route::get('/leagues/edit', 'LeagueController@allEdit')->middleware('admin');

// Modifier une league
// Restreint aux rôles : admin
Route::get('/leagues/edit/{league}', 'LeagueController@edit')->middleware('admin');

// Sauvegarder des modifications d'une league
// Restreint aux rôles : admin
Route::post('/leagues/edit', 'LeagueController@update')->middleware('admin');

// Efface une league
// Restreint aux rôles : admin
Route::get('/leagues/delete/{league}', 'LeagueController@delete')->middleware('admin');


// ************************************ Routes des saisons **************************************

// Présentation d'une saison
Route::get('/seasons/{season}', 'SeasonController@show');

// Présentation de toutes les saisons
Route::get('/seasons', 'SeasonController@index');

// Page de création d'une saison
// Restreint aux rôles : admin
Route::get('/seasons/create', 'SeasonController@create')->middleware('admin');

// Sauvegarde d'une saison
// Restreint aux rôles : admin
Route::post('/seasons', 'SeasonController@store')->middleware('admin');

// Modifier toutes les saisons
// Restreint aux rôles : admin
Route::get('/seasons/edit', 'SeasonController@allEdit')->middleware('admin');

// Modifier une saison
// Restreint aux rôles : admin
Route::get('/seasons/edit/{season}', 'SeasonController@edit')->middleware('admin');

// Sauvegarder des modifications d'une saison
// Restreint aux rôles : admin
Route::post('/seasons/edit', 'SeasonController@update')->middleware('admin');

// Efface une saison
// Restreint aux rôles : admin
Route::get('/seasons/delete/{season}', 'SeasonController@delete')->middleware('admin');


// ************************************ Routes des équipes **************************************

// Présentation d'une équipe
Route::get('/teams/{team}', 'TeamController@show');

// Présentation de toutes les équipes
Route::get('/teams', 'TeamController@index');

// Page de création d'une équipe
// Restreint aux rôles : admin
Route::get('/teams/create', 'TeamController@create')->middleware('admin');

// Sauvegarde d'une équipe
// Restreint aux rôles : admin
Route::post('/teams', 'TeamController@store')->middleware('admin');

// Modifier toutes les équipes
// Restreint aux rôles : admin
Route::get('/teams/edit', 'TeamController@allEdit')->middleware('admin');

// Modifier une équipe
// Restreint aux rôles : admin
Route::get('/teams/edit/{team}', 'TeamController@edit')->middleware('teamAdmin');

// Sauvegarder des modifications d'une équipe
// Restreint aux rôles : admin
Route::post('/teams/edit', 'TeamController@update')->middleware('teamAdmin');

// Efface une équipe
// Restreint aux rôles : admin
Route::get('/teams/delete/{team}', 'TeamController@delete')->middleware('admin');

// ************************************ Routes des players **************************************

// Présentation d'un player
Route::get('/players/{player}', 'PlayerController@show');

// Présentation de tous les players
Route::get('/players', 'PlayerController@index');

// Page de création d'un player
// Restreint aux rôles : admin
Route::get('/players/create', 'PlayerController@create')->middleware('admin');

// Sauvegarde d'un player
// Restreint aux rôles : admin
Route::post('/players', 'PlayerController@store')->middleware('admin');

// Modifier tous les players
// Restreint aux rôles : admin
Route::get('/players/edit', 'PlayerController@allEdit')->middleware('admin');

// Modifier un player
// Restreint aux rôles : admin
Route::get('/players/edit/{player}', 'PlayerController@edit')->middleware('admin');

// Sauvegarder des modifications d'un player
// Restreint aux rôles : admin
Route::post('/players/edit', 'PlayerController@update')->middleware('admin');

// Efface un player
// Restreint aux rôles : admin
Route::get('/players/delete/{player}', 'PlayerController@delete')->middleware('admin');