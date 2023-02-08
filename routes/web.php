<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\projectcontroller;
use App\Http\Controllers\locationcontroller;
use App\Http\Controllers\eventcontroller;

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
Route::post('login', [AuthController::class, 'index'])->name('login');

Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');
Route::post('createproject', [AuthController::class, 'createproject'])->name('createprojectt');
Route::get('createproject', [AuthController::class, 'createproject'])->name('createprojectt');
Route::post('createvents', [AuthController::class, 'createvents'])->name('createvents');
Route::get('createvents', [AuthController::class, 'createvents'])->name('createvents');
// Route::get('dashbord', [AuthController::class, 'dashbord'])->name('dashbordd');
Route::get('project', [projectcontroller::class, 'project'])->name('project');
Route::post('project', [projectcontroller::class, 'project'])->name('project');
Route::post('events', [AuthController::class, 'events'])->name('events');
Route::get('events', [AuthController::class, 'events'])->name('events');
Route::post('homeall', [AuthController::class, 'homeall'])->name('homeall');
Route::post('delete', [projectcontroller::class, 'delete'])->name('delete');
Route::post('delete', [locationcontroller::class, 'delete'])->name('delete');
Route::post('deletevent', [eventcontroller::class, 'deletevent'])->name('deletevent');
Route::post('download', [eventcontroller::class, 'download'])->name('download');
Route::get('download/{filename}', [EventController::class, 'download']);

// Route::get('landingpage', [AuthController::class, 'landingpage'])->name('landingpage');
Route::get('resetemail', [AuthController::class, 'resetemail'])->name('resetemail');
Route::get('resetpassword', [AuthController::class, 'resetpassword'])->name('resetpass');
Route::post('stor', [projectcontroller::class, 'store'])->name('stor');
Route::post('submiemailtForm', [AuthController::class, 'submiemailtForm'])->name('submiemailtForm');
Route::post('projectinsert', [projectcontroller::class, 'projectinsert'])->name('projectinsertt');
Route::post('locationinsert', [locationcontroller::class, 'locationinsert'])->name('locationinsertt');
Route::post('eventinsert', [eventcontroller::class, 'eventinsert'])->name('eventinsertt');
// Route::get('resetpassword/{E-mail}', function ($email) {
//     return view('resetpassword', ['email' => $email]);
// })->name('resetpassword');

Route::get('/', function () {
    return view('landingpage');
});


Auth::routes();

