<?php

Route::middleware(['alerttasks','auth'])->group(function (){

    Route::get('/', function () {
        return view('helpers');
    });
    Route::get('clients/pdf', 'ExtraActions\ClientPdf')->name('clients.pdf');
    
    //nosso resource esta o usando o model bind
    Route::resource('clients', 'ClienteController');
    Route::resource('projects','Project\ProjectController');
    Route::resource('tasks', 'TaskController');

    Route::get('tasks/search/{subject}', 'ExtraActions\ClientSearch');

    Route::get('tasks/add/{id}', 'ToDoController@store');
    Route::get('tasks/delete/{id}', 'ToDoController@destroy')->middleware('checktasks');
    
});



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');