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
Route::resource('projects.scoping_process', 'ScopingProcessController');  

Route::resource('projects.assemble_process.activities', 'ActivityController'); 
Route::resource('projects.scoping_process.activities', 'ScopingActController'); 


Route::resource('projects.execute_f_process', 'ExecuteFeatureProcessController'); 
Route::resource('projects.execute_f_process.activities', 'ExecuteActivityFProcessController'); 
Route::resource('projects.execute_f_process.activities.artifact', 'ExecuteArtifactController'); 

Route::resource('projects.execute_s_process', 'ExecuteScopingProcessController'); 
Route::resource('projects.execute_s_process.activities', 'ExecuteActivitySProcessController'); 
Route::resource('projects.execute_s_process.activities.artifact', 'ExecuteArtifactSProcessController'); 
Route::resource('projects.check_f_process', 'CheckArtifactsController'); 
Route::resource('projects.check_s_process', 'CheckSArtifactsController'); 
Route::resource('projects.check_f_process.artifact', 'CheckAArtifactController'); 
Route::resource('projects.check_s_process.artifact', 'CheckASArtifactController'); 
Route::resource('projects.feature_model', 'FeatureModelController'); 
Route::resource('projects.feature_model.features', 'FeatureController'); 

Route::get('projects/{project}/teams_generate/', 'TeamController@generateDocx');
Route::get('projects/{project}/artifact_generate/', 'ArtifactController@generateDocx');
Route::get('projects/{project}/technique_generate/', 'TechniqueProjectController@generateDocx');
Route::get('projects/{project}/assemble_process/{assemble_process}/activities_generate', 'ActivityController@generateDocx');
Route::get('projects/{project}/execute_f_process/{execute_f_process}/process_generate', 'ExecuteActivityFProcessController@generateDocx');
Route::get('projects/{project}/execute_s_process/{execute_s_process}/process_generate', 'ExecuteActivitySProcessController@generateDocx');
Route::get('projects/{project}/scoping_process/{scoping_process}/activities_generate', 'ScopingActController@generateDocx');

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
