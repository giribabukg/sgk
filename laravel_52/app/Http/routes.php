<?php

use App\Task;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Application Routes
|------------------------------	--------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|

*/



// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('dashboard', [
//     	'tasks' => Task::orderBy('created_at', 'asc')->get()
//     ]);
// });

// Route::post('/task',function (Request $request){
// 	$validator = Validator::make($request->all(), [
// 		'name' => 'required|max:255'
// 	]);

// 	if($validator->fails()) {
// 		return redirect('/')->withInput()->withErrors($validator);
// 	}

// 	$task = new Task;
// 	$task->name = $request->name;
// 	$task->save();

// 	return redirect('/');
// });

// Route::delete('/task/{id}', function ($id){
// 	Task::findOrFail($id)->delete();
// 	return redirect('/');
// });

Route::get('/','HomeController@index');

Route::get('/home','HomeController@index');

Route::auth();
