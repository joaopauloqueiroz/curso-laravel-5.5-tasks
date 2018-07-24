<?php

Route::middleware(['alerttasks','auth'])->group(function (){

    Route::view('/','welcome');

    Route::get('clients/pdf', 'ExtraActions\ClientPdf')->name('clients.pdf');
    
    //nosso resource esta o usando o model bind
    Route::get('clients/photo/{client}', 'ExtraActions\ClientPhotoDownload')->name('clients.download');

    Route::resource('clients', 'ClienteController');
    Route::resource('projects','Project\ProjectController');
    Route::resource('tasks', 'TaskController');

    Route::post('tasks/search/', 'ExtraActions\TaskSearch');

    Route::get('tasks/todo/made/{id}', 'ToDoController@made')->name('tasks.todo_made');
    Route::get('tasks/todo/list', 'ToDoController@index')->name('tasks.todo_index');
    Route::get('tasks/add/{id}', 'ToDoController@store')->name('tasks.add');
    Route::get('tasks/delete/{id}', 'ToDoController@destroy')->middleware('checktasks')->name('tasks.todo_destroy');

    Route::post('tasks/projects/attach/{task}','TaskProjectController@attach')->name('tasks.project_attach');
    Route::get('tasks/projects/detach/{task}/{project_id}','TaskProjectController@detach')->name('tasks.project_detach');
    
});



Auth::routes();
