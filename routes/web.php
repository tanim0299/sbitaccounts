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

//tanim

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// main menu
Route::get('/addMainMenu', [App\Http\Controllers\mainMenuController::class, 'index']);
Route::post('/mainMenuStore', [App\Http\Controllers\mainMenuController::class, 'store']);
Route::get('/viewMainMenu', [App\Http\Controllers\mainMenuController::class, 'view']);
Route::get('/editMainMenu/{id}', [App\Http\Controllers\mainMenuController::class, 'edit']);
Route::post('/mainMenuUpdate/{id}', [App\Http\Controllers\mainMenuController::class, 'update']);
Route::get('/deleteMainMenu/{id}', [App\Http\Controllers\mainMenuController::class, 'delete']);

// sub_menu
Route::get('/addSubMenu', [App\Http\Controllers\subMenuController::class, 'index']);
Route::post('/subMenuStore', [App\Http\Controllers\subMenuController::class, 'store']);
Route::get('/viewSubMenu', [App\Http\Controllers\subMenuController::class, 'view']);
Route::get('/editSubMenu/{id}', [App\Http\Controllers\subMenuController::class, 'edit']);
Route::post('/subMenuUpdate/{id}', [App\Http\Controllers\subMenuController::class, 'update']);
Route::get('/deleteSubMenu/{id}', [App\Http\Controllers\subMenuController::class, 'delete']);

// admin info
Route::get('/createAdmin',[App\Http\Controllers\adminController::class, 'index']);
Route::post('/registerAdmin',[App\Http\Controllers\adminController::class, 'store']);
Route::get('/viewAdmin',[App\Http\Controllers\adminController::class, 'view']);
Route::get('/editAdmin/{id}',[App\Http\Controllers\adminController::class, 'edit']);
Route::post('/updateAdmin/{id}',[App\Http\Controllers\adminController::class, 'update']);
Route::get('/deleteAdmin/{id}',[App\Http\Controllers\adminController::class, 'delete']);


//course information
Route::get('/addCourse',[App\Http\Controllers\courseController::class, 'index']);
Route::post('/courseStore',[App\Http\Controllers\courseController::class, 'store']);
Route::get('/viewCourse',[App\Http\Controllers\courseController::class, 'view']);
Route::get('/editCourse/{id}',[App\Http\Controllers\courseController::class, 'edit']);
Route::post('/courseUpdate/{id}',[App\Http\Controllers\courseController::class, 'update']);
Route::get('/courseDelete/{id}',[App\Http\Controllers\courseController::class, 'delete']);


// stuent route
Route::get('/addStudent',[App\Http\Controllers\studentController::class, 'index']);
Route::post('/getCourseFee',[App\Http\Controllers\studentController::class, 'getCourseFee']);
Route::post('/subCourseFee',[App\Http\Controllers\studentController::class, 'subCourseFee']);
Route::post('/studentStore',[App\Http\Controllers\studentController::class, 'store']);
Route::get('/viewStudent',[App\Http\Controllers\studentController::class, 'view']);
Route::get('/showForm/{id}',[App\Http\Controllers\studentController::class, 'showForm']);
Route::get('/editStudent/{id}',[App\Http\Controllers\studentController::class, 'edit']);
Route::post('/studentUpdate/{id}',[App\Http\Controllers\studentController::class, 'update']);
Route::get('/deleteStudent/{id}',[App\Http\Controllers\studentController::class, 'delete']);
Route::get('/searchTrainer',[App\Http\Controllers\studentController::class, 'trainerSearch']);
Route::post('/getTrainer',[App\Http\Controllers\studentController::class, 'getTrainer']);
Route::post('/trainerAppoint',[App\Http\Controllers\studentController::class, 'trainerAppoint']);
Route::get('/viewStdTrainer',[App\Http\Controllers\studentController::class, 'viewStdTrainer']);
Route::post('/getstdTrainer',[App\Http\Controllers\studentController::class, 'getstdTrainer']);
Route::get('/deleteAppTrainer/{id}',[App\Http\Controllers\studentController::class, 'deleteAppTrainer']);
Route::get('/id_card/',[App\Http\Controllers\studentController::class, 'idCard']);
Route::get('/details/{id}',[App\Http\Controllers\studentController::class, 'details']);
Route::get('/complete_course/{id}/{course_id}',[App\Http\Controllers\studentController::class, 'completeCourse']);
Route::get('/id_card/{id}',[App\Http\Controllers\studentController::class, 'id_card']);


Route::get('/downloadForm/{id}',[App\Http\Controllers\studentController::class, 'downloadForm']);
Route::get('/download_id/{id}',[App\Http\Controllers\studentController::class, 'download_id']);

Route::get('/getCertificate/{student_id}/{course_id}',[App\Http\Controllers\studentController::class, 'getCertificate']);
Route::get('/downloadCertificate/{id}/{course_id}',[App\Http\Controllers\studentController::class, 'downloadCertificate']);


// student collection
Route::get('/addCollection',[App\Http\Controllers\studentCollectionController::class, 'index']);
Route::post('/getStudentFee',[App\Http\Controllers\studentCollectionController::class, 'getStudentFee']);
Route::post('/collectionStore',[App\Http\Controllers\studentCollectionController::class, 'store']);
Route::get('/viewStdcollection',[App\Http\Controllers\studentCollectionController::class, 'view']);
Route::get('/deleteCollection/{id}/{student_id}',[App\Http\Controllers\studentCollectionController::class, 'delete']);
Route::get('/voucher/{collection_id}/{student_id}',[App\Http\Controllers\studentCollectionController::class, 'voucher']);




// trainer information
Route::get('/addTrainer',[App\Http\Controllers\trainerController::class, 'index']);
Route::post('/trainerStore',[App\Http\Controllers\trainerController::class, 'store']);
Route::get('/viewTrainer',[App\Http\Controllers\trainerController::class, 'view']);
Route::get('/editTrainer/{id}',[App\Http\Controllers\trainerController::class, 'edit']);
Route::post('/trainerUpdate/{id}',[App\Http\Controllers\trainerController::class, 'update']);
Route::get('/deleteTrainer/{id}',[App\Http\Controllers\trainerController::class, 'delete']);

//income info
Route::get('/addIncome_title',[App\Http\Controllers\incomeController::class, 'index']);
Route::post('/incomeTitleStore',[App\Http\Controllers\incomeController::class, 'store']);
Route::get('/editIncomeTitle/{id}',[App\Http\Controllers\incomeController::class, 'edit']);
Route::post('/incomeTitleUpdate/{id}',[App\Http\Controllers\incomeController::class, 'update']);
Route::get('/deleteIncomeTitle/{id}',[App\Http\Controllers\incomeController::class, 'delete']);
Route::get('/addIncome',[App\Http\Controllers\incomeController::class, 'addIncome']);
Route::post('/incomeStore',[App\Http\Controllers\incomeController::class, 'incomeStore']);
Route::get('/income_voucher/{id}',[App\Http\Controllers\incomeController::class, 'voucher']);
Route::get('/view_income',[App\Http\Controllers\incomeController::class, 'viewIncome']);
Route::get('/edit_income/{id}',[App\Http\Controllers\incomeController::class, 'editIncome']);
Route::post('/incomeUpdate/{id}',[App\Http\Controllers\incomeController::class, 'incomeUpdate']);
Route::get('/delete_income/{id}',[App\Http\Controllers\incomeController::class, 'delete_income']);
Route::get('/income_report',[App\Http\Controllers\incomeController::class, 'incomeReport']);


Route::post('/showReport',[App\Http\Controllers\incomeController::class, 'showReport']);


//expense info
Route::get('/addExpenseTitle',[App\Http\Controllers\expenseController::class, 'addExpenseTitle']);
Route::post('/expenseTitleStore',[App\Http\Controllers\expenseController::class, 'expenseTitleStore']);
Route::get('/editExpenseTitle/{id}',[App\Http\Controllers\expenseController::class, 'editExpenseTitle']);
Route::post('/expenseTitleUpdate/{id}',[App\Http\Controllers\expenseController::class, 'expenseTitleUpdate']);
Route::get('/deleteExpenseTitle/{id}',[App\Http\Controllers\expenseController::class, 'deleteExpenseTitle']);
Route::get('/add_expense',[App\Http\Controllers\expenseController::class, 'add_expense']);
Route::post('/expenseStore',[App\Http\Controllers\expenseController::class, 'expenseStore']);
Route::get('/view_expense',[App\Http\Controllers\expenseController::class, 'view_expense']);
Route::get('/edit_expense/{id}',[App\Http\Controllers\expenseController::class, 'edit_expense']);
Route::post('/expenseUpdate/{id}',[App\Http\Controllers\expenseController::class, 'expenseUpdate']);
Route::get('/expense_report',[App\Http\Controllers\expenseController::class, 'expense_report']);
Route::post('/showExpenseReport',[App\Http\Controllers\expenseController::class, 'showExpenseReport']);


//statement
Route::get('/statement',[App\Http\Controllers\statementController::class, 'index']);
Route::post('/showStatement',[App\Http\Controllers\statementController::class, 'showStatement']);

