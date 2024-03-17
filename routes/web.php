<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SubLocationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SubDepartmentController;
use App\Http\Controllers\JobPositionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveSettingController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\EmployeeLeaveController;
use App\Http\Controllers\EmployeeLeaveBalanceController;

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

Route::get('/', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => 'guest'], function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/forgot_password', [AuthController::class, 'forgot_password'])->name('forgot_password');

});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/locations', [LocationController::class, 'index']);
    Route::get('/locations/detail/{id}', [LocationController::class, 'detail']);
    Route::get('/locations/create', [LocationController::class, 'create']);
    Route::post('/locations/createPost', [LocationController::class, 'createPost']);
    Route::get('/locations/edit/{id}', [LocationController::class, 'edit']);
    Route::post('/locations/editPost', [LocationController::class, 'editPost']);
    Route::get('/locations/delete/{id}', [LocationController::class, 'delete']);
    Route::post('/locations/deletePost', [LocationController::class, 'deletePost']);

    Route::get('/sub_locations/index/{id}', [SubLocationController::class, 'index']);
    Route::get('/sub_locations/detail/{id}', [SubLocationController::class, 'detail']);
    Route::get('/sub_locations/create/{id}', [SubLocationController::class, 'create']);
    Route::post('/sub_locations/createPost', [SubLocationController::class, 'createPost']);
    Route::get('/sub_locations/edit/{id}', [SubLocationController::class, 'edit']);
    Route::post('/sub_locations/editPost', [SubLocationController::class, 'editPost']);
    Route::get('/sub_locations/delete/{id}', [SubLocationController::class, 'delete']);
    Route::post('/sub_locations/deletePost', [SubLocationController::class, 'deletePost']);
    
    Route::get('/departments/index/{id}', [DepartmentController::class, 'index']);
    Route::get('/departments/detail/{id}', [DepartmentController::class, 'detail']);
    Route::get('/departments/create/{id}', [DepartmentController::class, 'create']);
    Route::post('/departments/createPost', [DepartmentController::class, 'createPost']);
    Route::get('/departments/edit/{id}', [DepartmentController::class, 'edit']);
    Route::post('/departments/editPost', [DepartmentController::class, 'editPost']);
    Route::get('/departments/delete/{id}', [DepartmentController::class, 'delete']);
    Route::post('/departments/deletePost', [DepartmentController::class, 'deletePost']);

    Route::get('/sub_departments/index/{id}', [SubDepartmentController::class, 'index']);
    Route::get('/sub_departments/detail/{id}', [SubDepartmentController::class, 'detail']);
    Route::get('/sub_departments/create/{id}', [SubDepartmentController::class, 'create']);
    Route::post('/sub_departments/createPost', [SubDepartmentController::class, 'createPost']);
    Route::get('/sub_departments/edit/{id}', [SubDepartmentController::class, 'edit']);
    Route::post('/sub_departments/editPost', [SubDepartmentController::class, 'editPost']);
    Route::get('/sub_departments/delete/{id}', [SubDepartmentController::class, 'delete']);
    Route::post('/sub_departments/deletePost', [SubDepartmentController::class, 'deletePost']);

    Route::get('/job_positions/index/{id}', [JobPositionController::class, 'index']);
    Route::get('/job_positions/detail/{id}', [JobPositionController::class, 'detail']);
    Route::get('/job_positions/create/{id}', [JobPositionController::class, 'create']);
    Route::post('/job_positions/createPost', [JobPositionController::class, 'createPost']);
    Route::get('/job_positions/edit/{id}', [JobPositionController::class, 'edit']);
    Route::post('/job_positions/editPost', [JobPositionController::class, 'editPost']);
    Route::get('/job_positions/delete/{id}', [JobPositionController::class, 'delete']);
    Route::post('/job_positions/deletePost', [JobPositionController::class, 'deletePost']);

    Route::get('/employees', [EmployeeController::class, 'index']);
    Route::get('/employees/detail/{id}', [EmployeeController::class, 'detail']);
    Route::get('/employees/create', [EmployeeController::class, 'create']);
    Route::post('/employees/createPost', [EmployeeController::class, 'createPost']);
    Route::get('/employees/edit/{id}', [EmployeeController::class, 'edit']);
    Route::post('/employees/editPost', [EmployeeController::class, 'editPost']);
    Route::get('/employees/delete/{id}', [EmployeeController::class, 'delete']);
    Route::post('/employees/deletePost', [EmployeeController::class, 'deletePost']);
    
    Route::get('/employees/fetchSubLocations/{id}', [EmployeeController::class, 'fetchSubLocations']);
    Route::get('/employees/fetchDepartments/{id}', [EmployeeController::class, 'fetchDepartments']);
    Route::get('/employees/fetchSubDepartments/{id}', [EmployeeController::class, 'fetchSubDepartments']);
    Route::get('/employees/fetchJobPositions/{id}', [EmployeeController::class, 'fetchJobPositions']);

    Route::get('/leave_settings', [LeaveSettingController::class, 'index']);
    Route::get('/leave_settings/detail/{id}', [LeaveSettingController::class, 'detail']);
    Route::get('/leave_settings/create', [LeaveSettingController::class, 'create']);
    Route::post('/leave_settings/createPost', [LeaveSettingController::class, 'createPost']);
    Route::get('/leave_settings/edit/{id}', [LeaveSettingController::class, 'edit']);
    Route::post('/leave_settings/editPost', [LeaveSettingController::class, 'editPost']);
    Route::get('/leave_settings/delete/{id}', [LeaveSettingController::class, 'delete']);
    Route::post('/leave_settings/deletePost', [LeaveSettingController::class, 'deletePost']);

    Route::get('/leave_types', [LeaveTypeController::class, 'index']);
    Route::get('/leave_types/detail/{id}', [LeaveTypeController::class, 'detail']);
    Route::get('/leave_types/create', [LeaveTypeController::class, 'create']);
    Route::post('/leave_types/createPost', [LeaveTypeController::class, 'createPost']);
    Route::get('/leave_types/edit/{id}', [LeaveTypeController::class, 'edit']);
    Route::post('/leave_types/editPost', [LeaveTypeController::class, 'editPost']);
    Route::get('/leave_types/delete/{id}', [LeaveTypeController::class, 'delete']);
    Route::post('/leave_types/deletePost', [LeaveTypeController::class, 'deletePost']);

    Route::get('/employee_leaves/index/{id}', [EmployeeLeaveController::class, 'index']);
    Route::get('/employee_leaves/detail/{id}', [EmployeeLeaveController::class, 'detail']);
    Route::get('/employee_leaves/create/{id}', [EmployeeLeaveController::class, 'create']);
    Route::post('/employee_leaves/createPost', [EmployeeLeaveController::class, 'createPost']);
    Route::get('/employee_leaves/edit/{id}', [EmployeeLeaveController::class, 'edit']);
    Route::post('/employee_leaves/editPost', [EmployeeLeaveController::class, 'editPost']);
    Route::get('/employee_leaves/delete/{id}', [EmployeeLeaveController::class, 'delete']);
    Route::post('/employee_leaves/deletePost', [EmployeeLeaveController::class, 'deletePost']);

    Route::get('/employee_leave_balances/index/{id}', [EmployeeLeaveBalanceController::class, 'index']);
    Route::get('/employee_leave_balances/detail/{id}', [EmployeeLeaveBalanceController::class, 'detail']);
    Route::get('/employee_leave_balances/create/{id}', [EmployeeLeaveBalanceController::class, 'create']);
    Route::post('/employee_leave_balances/createPost', [EmployeeLeaveBalanceController::class, 'createPost']);
    Route::get('/employee_leave_balances/edit/{id}', [EmployeeLeaveBalanceController::class, 'edit']);
    Route::post('/employee_leave_balances/editPost', [EmployeeLeaveBalanceController::class, 'editPost']);
    Route::get('/employee_leave_balances/delete/{id}', [EmployeeLeaveBalanceController::class, 'delete']);
    Route::post('/employee_leave_balances/deletePost', [EmployeeLeaveBalanceController::class, 'deletePost']);
});