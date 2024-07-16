<?php

use App\Livewire\CourseManagement;
use Illuminate\Support\Facades\Route;
use App\Livewire\Register;
use App\Livewire\Login;
use App\Livewire\Dashboard;
use App\Livewire\Logout;
use App\Livewire\Profile;
use App\Models\Course;
use App\Models\Institute;

Route::post('/create', [App\Http\Controllers\PdfController::class, 'createPdf']);
Route::get('/generatePDF', [App\Http\Controllers\PdfController::class, 'generatePDF']); 
Route::get('/generateLeave/{id}', [App\Http\Controllers\PdfController::class, 'generateLeave']); 

// Route::get('/courses', function(){
    
    
//     echo "inserted";
// });
Route::get('/', function () {
    return redirect()->to('/login');
});

Route::group(['middleware'=>'guest'], function(){
    Route::get('/register', Register::class)->name('register');
    Route::get('/login', Login::class)->name('login');
});

Route::group(['middleware'=>'auth'], function(){
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/logout', Logout::class)->name('logout');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/courseManagement', CourseManagement::class)->name('courseManagement');
});