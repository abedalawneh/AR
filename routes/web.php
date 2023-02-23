<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPassController;
use App\Http\Controllers\projectcontroller;
use App\Http\Controllers\locationcontroller;
use App\Http\Controllers\eventcontroller;
use App\Http\Controllers\Auth\ForgotPasswordController;

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
Route::post('createvents', [AuthController::class, 'createvents'])->name('createvents');
Route::post('project', [projectcontroller::class, 'project'])->name('project');
Route::get('project', [projectcontroller::class, 'project'])->name('project');
Route::post('events', [AuthController::class, 'events'])->name('events');
Route::get('events', [AuthController::class, 'events'])->name('events');
Route::post('homeall', [AuthController::class, 'homeall'])->name('homeall');
Route::get('homeall', [AuthController::class, 'homeall'])->name('homeall');
Route::post('arlocation', [projectcontroller::class, 'arlocation'])->name('arlocation');
Route::get('arlocation', [projectcontroller::class, 'arlocation'])->name('arlocation');
Route::post('delete1', [projectcontroller::class, 'delete1'])->name('delete1');
Route::post('delete2', [locationcontroller::class, 'delete2'])->name('delete2');
Route::post('deletevent', [eventcontroller::class, 'deletevent'])->name('deletevent');


Route::post('editproject', [projectcontroller::class, 'editproject'])->name('editproject');
Route::post('editevents', [eventcontroller::class, 'editevents'])->name('editevents');

Route::post('projectinsert', [projectcontroller::class, 'projectinsert'])->name('projectinsertt');
Route::post('editmarkerproject', [projectcontroller::class, 'editmarkerproject'])->name('editmarkerproject');
Route::post('locationinsert', [locationcontroller::class, 'locationinsert'])->name('locationinsertt');
Route::post('locationedit', [locationcontroller::class, 'locationedit'])->name('locationedit');
Route::post('eventinsert', [eventcontroller::class, 'eventinsert'])->name('eventinsertt');
Route::post('eventedit', [eventcontroller::class, 'eventedit'])->name('eventedit');

Route::get('/', function () {
    return view('landingpage');
});
Route::get('/qrlocation', [projectcontroller::class, 'generateQRCode'])->name('qrlocation');
Route::post('/qrlocation', [projectcontroller::class, 'generateQRCode'])->name('qrlocation');


Auth::routes();



Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');