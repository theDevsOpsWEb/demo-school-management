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


Route::group(['middleware' => ['check-if-logged']], function(){

    // Users
    Route::get('/users/create', 'UsersController@create')->name('create-user');
    Route::get('/add-users', 'UsersController@create')->name('create-user');
    Route::post('/add-user', 'UsersController@store');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/logout', 'UsersController@logout')->name('logout');
    Route::get('/users', 'UsersController@index')->name('list-user');
    Route::get('/verify-account/{id}', 'UsersController@verifyAccount')->name('verify-user');

    // Access and Permissions
    Route::get('/roles', 'RolesController@index')->name('list-role');
    Route::get('/roles/create', 'RolesController@create')->name('create-role');
    Route::post('/add-role', 'RolesController@store')->name('add-role');
    Route::get('/roles/{id}/edit', 'RolesController@edit')->name('edit-role');
    Route::post('/roles/{id}/edit', 'RolesController@update')->name('edit-role');

    // Modules
    Route::get('/modules/create', 'ModulesController@create')->name('create-module');
    Route::get('/modules', 'ModulesController@index')->name('create-module');
    Route::post('/add-modules', 'ModulesController@store')->name('create-module');
    Route::get('/modules/{id}/edit', 'ModulesController@edit')->name('edit-module');
    Route::post('/modules/{id}/edit', 'ModulesController@update')->name('edit-module');

    /// Grades
    Route::get('/grades', 'GradesController@index')->name('list-grade');
    Route::get('/grades/create', 'GradesController@create')->name('create-grade');
    Route::post('/grades', 'GradesController@store')->name('create-grade');
    Route::get('/grades/{id}/edit', 'GradesController@edit')->name('edit-grade');
    Route::post('/grades/{id}/edit', 'GradesController@update')->name('edit-grade');
    Route::get('/grades/get-class/{id}', 'GradesController@getGradeClass');

    // Subjects
    Route::get('/subjects', 'SubjectsController@index')->name('list-subject');
    Route::get('/subjects/{id}/show', 'SubjectsController@show');
    Route::post('/add-subjects', 'SubjectsController@store');
    Route::get('/subjects/{id}/edit', 'SubjectsController@edit')->name('edit-subject');
    Route::get('subjects/create', 'SubjectsController@create')->name('create-subject');
    Route::get('/subjectsTotal', 'SubjectsController@subjectsTotal');
    Route::post('/edit-subjects/{id}', 'SubjectsController@update');
    Route::post('/saveStudentMarks/{id}', 'SubjectsController@saveStudentMarks');


    // EBooks
    Route::get('/ebooks', 'EbooksController@index')->name('list-ebook');
    Route::post('/add-ebooks', 'EbooksController@store');
    Route::get('/ebooks/{id}/edit', 'EbooksController@edit')->name('edit-ebook');
    Route::get('/ebooks/create', 'EbooksController@create')->name('create-ebook');

    // students
    Route::get('/students', 'StudentsController@index')->name('list-student');
    Route::get('/students/create', 'StudentsController@create')->name('create-student');

    Route::post('/savePersonalInfo', 'StudentsController@savePersonalInfo');
    Route::post('/saveNextOfKeen', 'StudentsController@saveNextOfKeen');
    Route::post('/savePayments', 'StudentsController@savePayments');
    Route::post('/saveSubjects', 'StudentsController@saveSubjects');
    Route::get('/saveStudent', 'StudentsController@saveStudent');
    Route::get('/students/{id}', 'StudentsController@show');
    Route::get('/students/{id}/edit', 'StudentsController@edit');
    Route::get('/studentProfile/{id}', 'StudentsController@studentProfile');
    Route::get('/studentReport/{id}', 'StudentsController@academicReport');

    Route::post('/updatePersonalInfo/{id}', 'StudentsController@updatePersonalInfo');
    Route::post('/updateGurdain/{id}', 'StudentsController@updateNextOfKeen');
    Route::post('/updateFees/{id}', 'StudentsController@updatePayments');
    Route::post('/updateSubject/{id}', 'StudentsController@updateSubjects');




Route::get('/calender', 'CalenderController@index')->name('calender');
});

Route::get('/login', 'UsersController@login')->name('login');
Route::post('/do-login', 'UsersController@doLogin')->name('do-login');
Route::get('/verify-account/{id}', 'UsersController@verifyAccount');
Route::post('/verify-account/{id}', 'UsersController@updateAccount');

Route::get('/Portal', 'PortalController@index')->name('portal');
