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



Auth::routes();
Route::resource('projects', 'ProjectController');
Route::resource('projects.teams', 'TeamController');
Route::resource('projects.artifact', 'ArtifactController'); 
Route::resource('projects.technique_projects', 'TechniqueProjectController'); 
Route::resource('projects.technique', 'TechniqueProjectController'); 
Route::resource('projects.assemble_process', 'AssembleProcessController');  

Route::resource('projects.assemble_process.activities', 'ActivityController'); 


Route::get('projects/{project}/teams_generate/', 'TeamController@generateDocx');


Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
