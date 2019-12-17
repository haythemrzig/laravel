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

Route::resource('/', 'MatchController');

Route::resource('admin', 'adminController');
Route::resource('actualite', 'actualiteController');
Route::resource('Contacts', 'ContactsController');




Route::resource('Ligues', 'LeagueController');
Route::resource('Chaine', 'ChaineController');

Route::resource('Equipes','EquipeController');

Route::get('/Equipe/showequipe/{id}','EquipeController@showequipe' );
Route::get('all','EquipeController@all' );

Route::resource('Joueur', 'JoueurController');
Route::resource('match', 'MatchController');

Route::resource('resultat', 'ResultatController');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
