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

Route::get('/matchs/create', 'MatchController@create')->middleware('admin');;

// Présentation d'un match
Route::get('/matchs/{match}', 'MatchController@show');

// Sauvegarde d'un match lors de la création
// Restreint aux rôles : admin
Route::post('/matchs', 'MatchController@store');

// Page de gestion des matchs pour les administrateurs
// Restreint aux rôles : admin 
Route::get('/matchs/edit', 'MatchController@Edit')->middleware('admin');

// Page de gestion des matchs pour les administrateurs pour une équipe
// Restreint aux rôles : admin 
Route::get('/matchs/edit/{team}', 'MatchController@teamEdit')->middleware('admin');

// Modifier un match
// Restreint aux rôles : admin
Route::get('/matchs/edit/{match}', 'MatchController@update')->middleware('admin');

// Sauvegarde des modifications d'un match
// Restreint aux rôles : admin
Route::post('/matchs/edit/{match}', 'MatchController@store')->middleware('admin');

// Efface un match
// Restreint aux rôles : admin 
Route::get('/matchs/delete/{match}', 'MatchController@delete')->middleware('admin');