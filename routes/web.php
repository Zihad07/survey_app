<?php

use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\SurveyController;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/questionnaires/create', [QuestionnaireController::class, 'create'])->name('questionnaires.create');
Route::post('/questionnaires', [QuestionnaireController::class, 'store'])->name('questionnaires.store');
Route::get('/questionnaires/{questionnaire}', [QuestionnaireController::class, 'show'])->name('questionnaires.show');
Route::get('/questionnaires/{questionnaire}/questions/create', [QuestionController::class, 'create'])->name('questionnaires.question.create');
Route::post('/questionnaires/{questionnaire}/questions', [QuestionController::class, 'store'])->name('questionnaires.question.store');
Route::delete('/questionnaires/{questionnaire}/questions/{question}', [QuestionController::class, 'destroy'])->name('questionnaires.question.delete');

Route::get('/surveys/{questionnaire}-{slug}', [SurveyController::class , 'show'])->name('survey.show');
Route::post('/surveys/{questionnaire}-{slug}', [SurveyController::class , 'store'])->name('survey.store');
