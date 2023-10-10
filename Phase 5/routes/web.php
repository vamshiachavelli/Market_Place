<?php

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\Student\StdDashboardComponent;
use App\Http\Livewire\Student\Adverts;
use App\Http\Livewire\Businessowner\ReturnOrder;
use App\Http\Livewire\Schooladmin\SadmDashboardComponent;
use App\Http\Livewire\Superadmin\SaDashboardComponent;
use App\Http\Livewire\Businessowner\BowDashboardComponent;
use App\Http\Livewire\Businessowner\Students;
use App\Http\Livewire\Student\ChatComponent;
use App\Http\Livewire\Student\Clubs;
use App\Http\Livewire\Student\Products;
use App\Http\Livewire\Superadmin\BusinessownersComponent;
use App\Http\Livewire\Superadmin\SchooladminsComponent;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',HomeComponent::class);

Route::get('/shop',ShopComponent::class);

Route::get('/cart',CartComponent::class);

Route::get('/checkout',CheckoutComponent::class);


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

//creating routes for students
Route::middleware(['auth:sanctum','verified','authstudent'])->group(function(){
    Route::get('/student/dashboard', StdDashboardComponent::class)->name('student.dashboard');
    Route::get('/student/adverts', Adverts::class)->name('student.adverts');
    Route::get('/student/products', Products::class)->name('student.products');
    Route::get('/student/clubs', Clubs::class)->name('student.clubs');
    Route::get('/student/chat', ChatComponent::class)->name('student.chat');

});
//creating route for business owners
Route::middleware(['auth:sanctum','verified','authbusinessowner'])->group(function(){
    Route::get('/businessowner/dashboard', BowDashboardComponent::class)->name('businessowner.dashboard');
    Route::get('/businessowner/students', Students::class)->name('businessowner.students');
    Route::get('/businessowner/returnorder', ReturnOrder::class)->name('businessowner.returnorder');
    Route::get('/businessowner/products', Products::class)->name('businessowner.products');
    Route::get('/businessowner/clubs', Clubs::class)->name('businessowner.clubs');
    Route::get('/businessowner/chat', ChatComponent::class)->name('businessowner.chat');
});

//creating route for school administrators
Route::middleware(['auth:sanctum','verified','authschooladmin'])->group(function(){
    Route::get('/schooladmin/dashboard', SadmDashboardComponent::class)->name('schooladmin.dashboard');
    Route::get('/schooladmin/students', Students::class)->name('schooladmin.students');
    Route::get('/schooladmin/chat', ChatComponent::class)->name('schooladmin.chat');
    Route::get('/schooladmin/businessowners', BusinessownersComponent::class)->name('schooladmin.businessowners');
});

//creating route for super administrator
Route::middleware(['auth:sanctum','verified','authsuperadmin'])->group(function(){
    Route::get('/superadmin/dashboard', SaDashboardComponent::class)->name('superadmin.dashboard');
    Route::get('/superadmin/students', Students::class)->name('superadmin.students');
    Route::get('/superadmin/chat', ChatComponent::class)->name('superadmin.chat');
    Route::get('/superadmin/businessowners', BusinessownersComponent::class)->name('superadmin.businessowners');
    Route::get('/superadmin/schooladmins', SchooladminsComponent::class)->name('superadmin.schooladmins');
});