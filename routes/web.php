<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Admin\MainController@index')->name('system.admin');
    Route::get('/logs', 'Admin\LogController@logs')->name('system.admin.logs');

    Route::get('/incidents', 'Admin\IncidentsController@index')->name('system.admin.incidents');
    Route::get('/incidents/edit/{id}', 'Admin\IncidentsController@edit')->name('system.admin.incidents.edit');
    Route::post('/incidents/store', 'Admin\IncidentsController@store')->name('system.admin.incidents.store');
    Route::get('/incidents/chart', 'Admin\IncidentsController@chart')->name('system.admin.incidents.chart');
    Route::get('/incidents/confirm/{id}', 'Admin\IncidentsController@confirm')->name('system.admin.incidents.confirm');
    Route::get('/incidents/revision/{id}', 'Admin\IncidentsController@revision')->name('system.admin.incidents.revision');

    Route::get('/permissions', 'Admin\PermissionController@index')->name('system.admin.permissions');
    Route::get('/permissions/edit/{id}', 'Admin\PermissionController@edit')->name('system.admin.permissions.edit');
    Route::get('/permissions/create', 'Admin\PermissionController@create')->name('system.admin.permissions.create');
    Route::get('/permissions/delete/{id}', 'Admin\PermissionController@delete')->name('system.admin.permissions.delete');
    Route::post('/permissions/update/{id}', 'Admin\PermissionController@update')->name('system.admin.permissions.update');
    Route::post('/permissions/create', 'Admin\PermissionController@store')->name('system.admin.permissions.store');
    Route::post('/permissions/search', 'Admin\PermissionController@search')->name('system.admin.permissions.search');

    Route::get('/roles', 'Admin\RoleController@index')->name('system.admin.roles');
    Route::get('/roles/edit/{id}', 'Admin\RoleController@edit')->name('system.admin.roles.edit');
    Route::get('/roles/create', 'Admin\RoleController@create')->name('system.admin.roles.create');
    Route::get('/roles/delete/{id}', 'Admin\RoleController@delete')->name('system.admin.roles.delete');
    Route::post('/roles/update/{id}', 'Admin\RoleController@update')->name('system.admin.roles.update');
    Route::post('/roles/create', 'Admin\RoleController@store')->name('system.admin.roles.store');
    Route::post('/roles/search', 'Admin\RoleController@search')->name('system.admin.roles.search');


    Route::get('/users', 'Admin\UserController@index')->name('system.admin.users');
    Route::get('/users/edit/{id}', 'Admin\UserController@edit')->name('system.admin.users.edit');
    Route::put('/users/update/{id}', 'Admin\UserController@update')->name('system.admin.users.update');
    Route::get('/users/create', 'Admin\UserController@create')->name('system.admin.users.create');
    Route::post('/users/create', 'Admin\UserController@store')->name('system.admin.users.store');
    Route::delete('/users/delete/{id}', 'Admin\UserController@destroy')->name('system.admin.users.delete');


    Route::get('/specialists', 'Admin\SpecialistController@specialists')->name('system.admin.specialists');
    Route::get('/specialists/edit/{id}', 'Admin\SpecialistController@editSpecialists')->name('system.admin.specialists.edit');
    Route::put('/specialists/update/{id}', 'Admin\SpecialistController@updateSpecialists')->name('system.admin.specialists.update');
    Route::get('/specialists/create', 'Admin\SpecialistController@createSpecialists')->name('system.admin.specialists.create');
    Route::post('/specialists/create', 'Admin\SpecialistController@storeSpecialists')->name('system.admin.specialists.store');
    Route::delete('/specialists/delete/{id}', 'Admin\SpecialistController@deleteSpecialists')->name('system.admin.specialists.delete');
});

Route::post('ckeditor/image_upload', 'Admin\CKEditorController@upload')->name('upload');

Route::group(['prefix' => 'specialist'], function () {
    Route::get('/incidents/in-work', 'SpecialistController@inWorkIncidents')->name('system.specialist.incidents.inWork');
    Route::get('/incidents/done', 'SpecialistController@doneIncidents')->name('system.specialist.incidents.done');
    Route::get('/incidents/edit/{id}', 'SpecialistController@editIncidents')->name('system.specialist.incidents.edit');
    Route::get('/incidents/view/{id}', 'SpecialistController@indexIncidents')->name('system.specialist.incidents.view');
    Route::post('/incidents/store', 'SpecialistController@storeIncidents')->name('system.specialist.incidents.specStore');
});

Route::group(['prefix' => 'user'], function () {

    Route::get('/incidents/create', 'UserController@create')->name('system.user.incidents.create');
    Route::post('/incidents/store/{user_id}', 'UserController@store')->name('system.user.incidents.store');

    Route::get('/incidents/by-u', 'UserController@byUserIndex')->name('system.user.incidents.index');
    Route::get('/incidents/by-u/{id}', 'UserController@byUserView')->name('system.user.incidents.view');
});