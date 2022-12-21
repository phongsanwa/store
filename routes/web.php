<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomAuthController;
//Backend Controller
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\IndexController;
use App\Http\Controllers\Backend\PermissionsController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\backend\AttributesController;
use App\Http\Controllers\backend\ProductAttributesController;

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
// ROUTE FRONT-END
    Route::get('/',[HomeController::class, 'index'])->name('homepage');
    Route::group(['middleware' => ['guest']], function() {
        Route::get('login', [CustomAuthController::class, 'index'])->name('login.show');
        Route::post('login', [CustomAuthController::class, 'signin'])->name('login.signin');

        Route::get('registration/dang-ky', [CustomAuthController::class, 'registration'])->name('register-user');
        Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
    });
    //ROUTE BACKEND
    Route::group(['middleware' => ['auth']], function() {
        Route::get('/logout', [CustomAuthController::class,'perform'])->name('logout.perform');
        Route::resource('roles',RolesController::class);
        Route::resource('users', UserController::class);
        Route::resource('attributes', AttributesController::class);
        Route::get('home/dashboard', [IndexController::class, 'home']);
        Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
        Route::resource('products', ProductController::class);
        Route::post('upload_image', [ProductController::class, 'uploadImage'])->name('upload');
        Route::resource('categories', CategoryController::class);
        Route::resource('permissions', PermissionsController::class);
        Route::resource('product_attributes', ProductAttributesController::class);
    });
    Route::group(['middleware' => ['auth', 'permission']], function() {




    });
    //Route::get('product', [ProductController::class, 'index'])->name('product.index');
    //Route::get('test',function (){
    //    return App\Models\Category::with('subCategory')->where('parent_id',1)->get();
    //});








