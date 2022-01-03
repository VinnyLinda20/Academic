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


use App\Course;
Route::get('/course', function () {
    $courses = Course::all();

    foreach($courses as $course) {
        echo $course->course_name . "<br/>";
    }

});

use App\Student;
Route::get('/student', function () {
    $students = Student::all();

    foreach($students as $student) {
        echo $student->name . "<br/>";
    }

});

Route::get('/student', 'StudentController@index');
Route::get('/student/create', 'StudentController@create');
Route::post('/student/store', 'StudentController@store');
Route::delete('/student/{id}/delete', 'StudentController@destroy');
Route::post('/student/{id}/edit', 'StudentController@update');
Route::get('/student/edit/{id}', 'StudentController@edit');

Route::resource('/faculty', 'FacultyController');

