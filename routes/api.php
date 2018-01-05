<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
 

});
Route::group(['middleware'=>['auth:api']],function(){
    Route::post('/layers','LayerController@store');
    Route::post('/maps','MapController@store');
    Route::post('/maps/{id}/affect','MapController@affect');
    Route::post('devices','DeviceController@store');
    Route::post('/upfiles','UpfileController@store');

});
    /*
    |--------------------------------------------------------------------------
    | realtime Routes
    |--------------------------------------------------------------------------
    |
    | ici les routes qui concerne un realtime
    |
    */
    Route::get('realtime-categories','RealtimeCategoryController@index');
    Route::get('devices','DeviceController@index');
    Route::get('quests','QuestController@index');
    Route::get('quests/{id}','QuestController@find');
    Route::post('quests','QuestController@store');
    Route::put('quests/{id}','QuestController@update');
    Route::delete('quests/{id}','QuestController@destroy');
        /*
    |--------------------------------------------------------------------------
    | realtime Upfiles
    |--------------------------------------------------------------------------
    |
    | ici les routes qui concerne un Upfiles
    |
    */
    Route::get('/upfiles','UpfileController@index');
    Route::get('/upfiles/approve/{id}','UpfileController@approve');
    Route::get('/upfiles/share/{id}','UpfileController@share');

	// ici on dit a tout ce groupe de routes
	// onn applique le middlewarre auth:api

    /*
	|--------------------------------------------------------------------------
	| User Routes
	|--------------------------------------------------------------------------
	|
	| ici les routes qui concerne un utilisateur
	|
	*/
	Route::post('/users','UserController@store');
	Route::get('/users','UserController@index');
	Route::get('/users/{id}','UserController@find');
    /*
|--------------------------------------------------------------------------
| Layer Routes
|--------------------------------------------------------------------------
|
| c'est pour couches
|
|
|
*/
// ici le client va envoyer une request http get vers /layers
//donc : GET http://localhost/...../public/layers
// le programme va interpreter et exectuer la fonction index du controller LayerController
    Route::get('/layers','LayerController@index');
    Route::get('/layers/{id}','LayerController@find');
    Route::get('/layers/pagination/{limit}','LayerController@paginate');
    Route::delete('/layers/{id}','LayerController@destroy');
    Route::get('/layers/approve/{id}','LayerController@approve');
    Route::get('/layers/share/{id}','LayerController@share');

    /*
    |--------------------------------------------------------------------------
    | Layer Routes
    |--------------------------------------------------------------------------
    |
    | c'est pour couches
    |
    |
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Map routes
    |--------------------------------------------------------------------------
    |
    | Routes pour les cartes
    |
    |
    |
    */
    Route::get('/maps','MapController@index');
    Route::get('/maps/{id}','MapController@find');
    Route::get('/maps/pagination/{limit}','MapController@paginate');
    Route::get('/maps/{id}/layers','MapController@getLayers');
    Route::delete('/maps/{id}','MapController@destroy');
    Route::get('/maps/approve/{id}','MapController@approve');
    Route::get('/maps/share/{id}','MapController@share');


    /*
    |--------------------------------------------------------------------------
    | Category routes
    |--------------------------------------------------------------------------
    |
    | Routes pour les category
    |
    |
    |
    */
    Route::get('/categories','CategoryController@index');
    /*
    |--------------------------------------------------------------------------
    | Theme routes
    |--------------------------------------------------------------------------
    |
    | Routes pour les category
    |
    |
    |
    */
    Route::get('/themes','ThemeController@index');


