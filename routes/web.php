<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('user.login');
});

Route::get('/login', function () {
    return view('user.login');
})->name('login'); 

Route::get('/register', function () {
    return view('user.register');
});



Route::controller(UserController::class)->group(function () {

     Route::post('/user-register', 'userRegister')->name('user.register'); 
     Route::post('/user-login', 'userLogin')->name('user.login');

});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [UserController::class, 'userDashboard'])->name('user.dashboard');
    Route::get('/logout', [UserController::class, 'userLogout'])->name('user.logout');

    // Accounts
    Route::get('/accounts/list', [AccountController::class, 'listAccount'])->name('list.account');
    Route::get('/accounts/add', [AccountController::class, 'addAccount'])->name('add.account');
    Route::post('/accounts/store', [AccountController::class, 'storeAccount'])->name('store.account');
    Route::get('/accounts/delete/{id}', [AccountController::class, 'deleteAccount'])->name('delete.account');

    Route::get('/balance/sheet', [AccountController::class, 'balanceSheet'])->name('balance.sheet');

    // Transactions
    Route::get('/transactions/list', [TransactionController::class, 'listTransactions'])->name('list.transactions');
    Route::get('/transactions/add', [TransactionController::class, 'addTransactions'])->name('add.transactions');
    Route::post('/transactions/store', [TransactionController::class, 'storeTransactions'])->name('store.transactions');
    Route::get('/transactions/delete/{id}', [TransactionController::class, 'deleteTransactions'])->name('delete.transactions');

    Route::get('/transactions/income', [TransactionController::class, 'incomeTransactions'])->name('income.transactions');
    Route::get('/transactions/expense', [TransactionController::class, 'expenseTransactions'])->name('expense.transactions');

  
    Route::post('/transactions/filter', [TransactionController::class, 'filterTransactions'])->name('transactions.filter');

 

    Route::get('/account/statement', function () {
        return view('accounts.account-statement');
    })->name('account.statement');

   

    

   

});