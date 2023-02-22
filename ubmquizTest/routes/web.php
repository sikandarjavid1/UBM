<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\QuestionCategoryController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\QuizController;
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

//Quiz Routes Frontend
    Route::get('/', [QuizController::class, 'index']);
    Route::get('fetch_quiz', [QuizController::class, 'fetchquestions']);
    Route::post('result', [QuizController::class, 'store']);
    Route::get('pdfresult', [QuizController::class, 'pdfresult']);
    Route::get('mails', [QuizController::class, 'sendmail']);


//Login Routes

//Routes Related to Admin
//Protected Routes
//Route::middleware(['auth'])->group(function (){


Route::get('/admin', function () {
    return view('dashboard/admin/index');
});
    Route::get('/login', function () {
        return view('dashboard/admin/login');

    });
    Route::post('login',[LoginController::class,'login']);
    Route::get('logout',[LoginController::class,'logout']);
//Routes for Question Category
Route::get('question_category', [QuestionCategoryController::class, 'index']);
Route::post('question_category', [QuestionCategoryController::class, 'store']);
Route::get('fetch_category', [QuestionCategoryController::class, 'fetchqcategory']);
Route::get('edit-category/{id}', [QuestionCategoryController::class, 'edit']);
Route::put('update-category/{id}', [QuestionCategoryController::class, 'update']);
Route::delete('delete-category/{id}', [QuestionCategoryController::class, 'destroy']);

//Routes for Questions
//Route::get('questions',[QuestionsController::class,'index']);
Route::get('/questions', function () {
    $category = App\Models\question_category::all();
    return view('dashboard/admin/questions/index', ['question_category' => $category]);
});
Route::post('questions', [QuestionsController::class, 'store']);
Route::get('fetch_questions', [QuestionsController::class, 'fetchquestions']);
Route::get('edit-questions/{id}', [QuestionsController::class, 'edit']);
Route::get('category-dropdown', [QuestionsController::class, 'question_category_dropdown']);
Route::put('update-question/{id}', [QuestionsController::class, 'update']);
Route::delete('delete-question/{id}', [QuestionsController::class, 'destroy']);

//Routes for Question Options
Route::get('/question_options', function () {
    $category = App\Models\question_category::all();
    $questions = App\Models\questions::all();
    return view('dashboard/admin/question_options/index', ['question_category' => $category, 'questions' => $questions]);
});
Route::post('options', [OptionsController::class, 'store']);
Route::get('fetch_options', [OptionsController::class, 'fetchoptions']);
Route::get('edit-options/{id}', [OptionsController::class, 'edit']);
Route::put('update-options/{id}', [OptionsController::class, 'update']);
Route::delete('delete-options/{id}', [OptionsController::class, 'destroy']);
//});







