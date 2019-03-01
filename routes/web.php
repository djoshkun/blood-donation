<?php

Route::view('/index', 'pages/index')->name('index');
Route::post('/register', 'AuthController@register')->name('register');
Route::post('/login', 'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::prefix('admin')->group(function () {
    Route::group(['middleware' => 'guest:ROLE_ADMIN'], function() {
        Route::get('/need-blood/{user}/edit', 'PatientController@edit')->name('patients.edit');
        Route::patch('/need-blood/{user}/edit', 'PatientController@update')->name('patients.update');
        Route::get('/users', 'UserController@index')->name('users.index');
        Route::get('/users/create', 'UserController@create')->name('users.create');
        Route::post('/users', 'UserController@store')->name('users.store');
        Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
        Route::patch('/users/{user}', 'UserController@update')->name('users.update');
        Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');
        Route::get('/hospitals', 'HospitalController@index')->name('hospitals.index');
        Route::get('/hospitals/create', 'HospitalController@create')->name('hospitals.create');
        Route::get('/hospitals/{hospital}', 'HospitalController@show')->name('hospitals.show');
        Route::post('/hospitals', 'HospitalController@store')->name('hospitals.store');
        Route::get('/hospitals/{hospital}/edit', 'HospitalController@edit')->name('hospitals.edit');
        Route::patch('/hospitals/{hospital}', 'HospitalController@update')->name('hospitals.update');
        Route::delete('/hospitals/{hospital}', 'HospitalController@destroy')->name('hospitals.destroy');
        Route::get('/cities', 'CityController@index')->name('cities.index');
        Route::get('/cities/create', 'CityController@create')->name('cities.create');
        Route::post('/cities', 'CityController@store')->name('cities.store');
        Route::get('/cities/{city}/edit', 'CityController@edit')->name('cities.edit');
        Route::patch('/cities/{city}', 'CityController@update')->name('cities.update');
        Route::delete('/cities/{city}', 'CityController@destroy')->name('cities.destroy');
        Route::post('/{declaration}/questions', 'QuestionController@store')->name('questions.store');
        Route::get('/questions/{question}/edit', 'QuestionController@edit')->name('questions.edit');
        Route::patch('/questions/{question}', 'QuestionController@update')->name('questions.update');
        Route::delete('/questions/{question}', 'QuestionController@destroy')->name('questions.destroy');
        Route::get('/declarations', 'DeclarationController@index')->name('declarations.index');
        Route::get('/declarations/create', 'DeclarationController@create')->name('declarations.create');
        Route::post('/declarations', 'DeclarationController@store')->name('declarations.store');
        Route::get('/declarations/{declaration}', 'DeclarationController@show')->name('declarations.show');
        Route::get('/declarations/{declaration}/edit', 'DeclarationController@edit')->name('declarations.edit');
        Route::patch('/declarations/{declaration}', 'DeclarationController@update')->name('declarations.update');
        Route::delete('/declarations/{declaration}', 'DeclarationController@destroy')->name('declarations.destroy');
    });
});
Route::prefix('doctor')->group(function () {
    Route::group(['middleware' => 'guest:ROLE_DOCTOR'], function() {
        Route::get('/need-blood/create', 'PatientController@create')->name('patients.create');
        Route::post('/need-blood', 'PatientController@store')->name('patients.store');
        Route::get('/donations/declarations', 'DonationController@indexDoctor')->name('donations.index.doctor');
        Route::get('/donations/declarations/{donation}', 'DonationController@showDoctor')->name('donations.show.doctor');
        Route::patch('/donations/declarations/{donation}', 'DonationController@storeDoctor')->name('donations.store.doctor');
        Route::delete('/donations/declarations/{donation}', 'DonationController@destroy')->name('donations.destroy.doctor');
    });
});
Route::prefix('laborant')->group(function () {
    Route::group(['middleware' => 'guest:ROLE_LABORANT'], function() {
        Route::get('laboratory/results', 'DonationController@indexLaborant')->name('donations.index.laborant');
        Route::patch('laboratory/{donation}', 'DonationController@updateLaborant')->name('donations.update.laborant');
    });
});
Route::group(['middleware' => 'guest:'], function() {
    Route::get('donor/questions-1', 'AnswerController@indexOne')->name('answers.index.one');
    Route::post('donor/questions-1', 'AnswerController@storeOne')->name('answers.store.one');
    Route::get('donor/questions-2', 'AnswerController@indexTwo')->name('answers.index.two');
    Route::post('donor/questions-2', 'AnswerController@storeTwo')->name('answers.store.two');
    Route::get('donor/questions-2/autoload', 'AnswerController@autoload')->name('answers.autoload');
    Route::get('user/profile', 'UserController@profile')->name('profile');
    Route::patch('user/profile/{user}', 'UserController@updateProfile')->name('users.update.profile');
    Route::get('/need-blood/list', 'PatientController@index')->name('patients.index');
    Route::get('user/results', 'DonationController@results')->name('results');
});
