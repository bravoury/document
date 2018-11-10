<?php

// Resource routes  for document
Route::group(['prefix' => set_route_guard('web').'/document'], function () {
    Route::resource('document', 'DocumentResourceController');
});

// Public  routes for document
Route::get('document/popular/{period?}', 'DocumentPublicController@popular');
Route::get('documents/', 'DocumentPublicController@index');
Route::get('documents/{slug?}', 'DocumentPublicController@show');

