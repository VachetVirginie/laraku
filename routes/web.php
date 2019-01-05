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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome')->with('links', App\Link::all());
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('/links/create', function(Request $request){
    $link = new App\Link;

    $link->name = $request->name;
    $link->url = $request->url;

    $link->save();

    return redirect('/home');
});

Route::get('/links/remove/{id}', function($id){
    $link = App\Link::findOrFail($id);
    $link->delete();

    return back();
});