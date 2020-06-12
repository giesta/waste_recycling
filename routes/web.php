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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/recyclable', function () {
    return view('recycle/recyclable');
});
Route::get('/', 'HomeController@index');

Route::get('/contact', 'ContactController@index');
Route::post('/contact/send', 'ContactController@send')->name('contact.send');
Route::get('/user/addNew', 'ContactController@create')->name('addUser');
Route::post('/user/insert', 'ContactController@insertUser')->name('insertUser');
Route::get('/user/delete/{id}', 'ContactController@deleteUser')->name('deleteUser');
Route::get('/user/edit/{id}', 'ContactController@editUser')->name('editUser');
Route::post('/user/confirmEdit/{id}', 'ContactController@confirmEditUser')->name('confirmEditUser');

Route::get('/invoices', 'InvoicesController@index');
Route::get('/invoice/addNewInvoice', 'InvoicesController@createInvoice')->name('addInvoice');
Route::post('/invoice/insert', 'InvoicesController@insertInvoice')->name('insertInvoice');
Route::get('/invoice/delete/{id}', 'InvoicesController@deleteInvoice')->name('deleteInvoice');
Route::get('/invoice/edit/{id}', 'InvoicesController@editInvoice')->name('editInvoice');
Route::post('/invoice/confirmEdit/{id}', 'InvoicesController@confirmEditInvoice')->name('confirmEditInvoice');

Route::get('/invoice/{id}', 'InvoicesController@show')->name('invoices.show');

Route::get('/plastic', 'PlasticController@index');
Route::get('/plastic/addNew', 'PlasticController@create')->name('addPlastic');
Route::post('/plastic/insert', 'PlasticController@insertPlastic')->name('insertPlastic');
Route::get('/plastic/delete/{id}', 'PlasticController@deletePlastic')->name('deletePlastic');
Route::get('/plastic/edit/{id}', 'PlasticController@editPlastic')->name('editPlastic');
Route::post('/plastic/confirmEdit/{id}', 'PlasticController@confirmEditPlastic')->name('confirmEditPlastic');

Route::get('/paper', 'PaperController@index');
Route::get('/paper/addNew', 'PaperController@create')->name('addPaper');
Route::post('/paper/insert', 'PaperController@insertPaper')->name('insertPaper');
Route::get('/paper/delete/{id}', 'PaperController@deletePaper')->name('deletePaper');
Route::get('/paper/edit/{id}', 'PaperController@editPaper')->name('editPaper');
Route::post('/paper/confirmEdit/{id}', 'PaperController@confirmEditPaper')->name('confirmEditPaper');

Route::get('/metal', 'MetalController@index');
Route::get('/metal/addNew', 'MetalController@create')->name('addMetal');
Route::post('/metal/insert', 'MetalController@insertMetal')->name('insertMetal');
Route::get('/metal/delete/{id}', 'MetalController@deleteMetal')->name('deleteMetal');
Route::get('/metal/edit/{id}', 'MetalController@editMetal')->name('editMetal');
Route::post('/metal/confirmEdit/{id}', 'MetalController@confirmEditMetal')->name('confirmEditMetal');

Route::get('/glass', 'GlassController@index');
Route::get('/glass/addNew', 'GlassController@create')->name('addGlass');
Route::post('/glass/insert', 'GlassController@insertGlass')->name('insertGlass');
Route::get('/glass/delete/{id}', 'GlassController@deleteGlass')->name('deleteGlass');
Route::get('/glass/edit/{id}', 'GlassController@editGlass')->name('editGlass');
Route::post('/glass/confirmEdit/{id}', 'GlassController@confirmEditGlass')->name('confirmEditGlass');