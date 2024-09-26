<?php
use App\Http\Controllers\AdminLogin;
use App\Http\Controllers\ExamQuestionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\Userregister;
use Illuminate\Auth\Events\Login;
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
// Route::get('/',[Userregister::class,'landingpage'])->name('landingpage');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('landing');
});


Route::get('/adminlogin',[AdminLogin::class,'login'])->name('adminlogin');
Route::post('/setlogin',[AdminLogin::class,'setlogin'])->name('setlogin');
Route::get('/dashboard',[AdminLogin::class,'dashboard'])->name('dashboard')->middleware('isLoggedin');
Route::get('/examinfo/{id}',[AdminLogin::class,'examinfo'])->name('examinfo');
Route::get('/logout',[AdminLogin::class,'logout'])->name('logout');
Route::get('/addexam',[AdminLogin::class,'addexam'])->name('addexam');
Route::post('/addexam',[AdminLogin::class,'examregister'])->name('examregister');
Route::get('/editexam/{id}',[AdminLogin::class,'editexam'])->name('editexam');
Route::get('/showexam',[ExamQuestionController::class,'showexam'])->name('showexam');
Route::get('/tableview',[ExamQuestionController::class,'tableview'])->name('showexam_table_view');
Route::get('/trashexam',[ExamQuestionController::class,'trash'])->name('trashexam');
Route::get('/delete_exam/{id}',[ExamQuestionController::class,'deleteexam'])->name('deleteexam');
Route::get('/addquestion/{id}',[ExamQuestionController::class,'addquestion'])->name('addquestion');
Route::post('/addquestion',[QuestionController::class,'addquestiontodb'])->name('addquestiontodb');
Route::get('/editquestion/{eid}/{id}',[QuestionController::class,'editquestiontodb'])->name('editquestiontodb');
Route::get('/deletequestion/{id}',[ExamQuestionController::class,'deletequestion'])->name('deletequestion');

Route::get('/userregisterpage',[Userregister::class,'index'])->name('userregisterpage');
Route::post('/userregister',[Userregister::class,'register'])->name('userregister');
Route::post('/userlogin',[Userregister::class,'userlogin'])->name('userlogin');

Route::get('/home/{id}',[Userregister::class,'home'])->name('home');
Route::get('/start-info/{id}',[Userregister::class,'startinfo'])->name('startinfo');
Route::get('/start-exam/{id}',[Userregister::class,'startexam'])->name('startexam');

Route::get('/endexam/{id?}',[Userregister::class,'endexam'])->name('endexam');
Route::post('/update-ques',[Userregister::class,'update_ques'])->name('update_ques');
Route::get('/logoutuser',[Userregister::class,'logoutuser'])->name('logoutuser');









