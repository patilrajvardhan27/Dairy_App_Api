<?php
namespace App\Http\Controllers\AddMilkController;

use App\Http\Controllers\AuthController; // Use the correct namespace
use App\Http\Controllers\AddCustomerController;
use App\Http\Controllers\AddUserRoleController; 
use App\Http\Controllers\AddMilkController; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group assigned to the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/InsertAddCustomer', 'App\Http\Controllers\AddCustomerController@insertcustomer');
Route::post('/InsertAddMilk', 'App\Http\Controllers\AddMilkController@insertaddmilk');
Route::post('/InsertUserRole', 'App\Http\Controllers\AddUserRoleController@insertuserrole');



Route::get('/getCustomers', [AddCustomerController::class, 'getCustomers']);
Route::get('/getUserrole', [AddUserRoleController::class, 'getUserrole']);
Route::get('/getMilkData', [AddMilkController::class, 'getMilkData']);

Route::delete('/delete', [AddCustomerController::class, 'deleteCustomer']);
Route::delete('/deleteuser', [AddUserRoleController::class, 'deleteUserrole']);
Route::delete('/deleteMilk', [AddMilkController::class, 'deleteMilkdata']);


Route::post('/edit', [AddCustomerController::class, 'editCustomer']);
Route::post('/edituser', [AddUserRoleController::class, 'editUser']);

Route::get('/search', [AddCustomerController::class, 'searchCustomers']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




