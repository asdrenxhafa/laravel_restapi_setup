<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = \App\User::where('email', $request->email)->first();

    if (! $user || ! \Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
        throw \Illuminate\Validation\ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return  $request->user();

});


Route::middleware(['ipCheck','auth:sanctum'])->group(function () {

    Route::get('companies','CompaniesController@index')->name('companies.index');
    Route::get('companies/{id}','CompaniesController@show')->name('companies.show');
    Route::post('companies','CompaniesController@store')->name('companies.store');
    Route::put('companies/{id}','CompaniesController@update')->name('companies.update');
    Route::delete('companies/{id}','CompaniesController@destroy')->name('companies.delete');
    Route::get('companies/{id}/employees','CompaniesController@employee');

    Route::get('employees','EmployeesController@index')->name('employees.index');
    Route::get('employees/{id}','EmployeesController@show')->name('employees.show');
    Route::post('employees','EmployeesController@store')->name('employees.store');
    Route::put('employees/{id}','EmployeesController@update')->name('employees.update');
    Route::delete('employees/{id}','EmployeesController@destroy')->name('employees.delete');

});


