<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\projectcontroller;

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
Route::get('login', [AuthController::class, 'index'])->name('login');

Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');
Route::post('createproject', [AuthController::class, 'createproject'])->name('createprojectt');
Route::post('createvents', [AuthController::class, 'createvents'])->name('createvents');
// Route::get('dashbord', [AuthController::class, 'dashbord'])->name('dashbordd');
Route::post('project', [AuthController::class, 'project'])->name('project');
Route::post('events', [AuthController::class, 'events'])->name('events');
Route::post('landingpage', [AuthController::class, 'landingpage'])->name('landingpage');
Route::get('resetemail', [AuthController::class, 'resetemail'])->name('resetemail');
Route::get('resetpassword', [AuthController::class, 'resetpassword'])->name('resetpass');
Route::post('stor', [projectcontroller::class, 'store'])->name('stor');
Route::post('submiemailtForm', [AuthController::class, 'submiemailtForm'])->name('submiemailtForm');
// Route::get('resetpassword/{E-mail}', function ($email) {
//     return view('resetpassword', ['email' => $email]);
// })->name('resetpassword');

Route::get('/', function () {
    return view('welcome');
});


// Route::get('google-autocomplete', [AuthController::class, 'indexx']);
Auth::routes();

