<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\BookingController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FilierController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SubjetController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ApiController;

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

@include_once('admin_web.php');

Route::get('/dashboard', function () {
    return redirect()->route('index');
})->name('/');




Route::prefix('/')->group(function() {
    Route::get('/', [FrontendController::class, 'index'])->name('home');
    Route::get('details/{product}', [FrontendController::class, 'details'])->name('details');
});


Route::prefix('api/v2')->group(function() { 
    Route::get('/', [ApiController::class, 'token'])->name('api.token.view');
    Route::post('/', [ApiController::class, 'generate'])->name('api.token');
    // list of apis using token 
      // fillier
        Route::prefix('filiers')->group(function() { 
            Route::get('/', [ApiController::class, 'filiers'])->name('filiers.list');
        });
        //categories
        Route::prefix('categories')->group(function() { 
            Route::get('/{filier}', [ApiController::class, 'categories'])->name('categories.list');
        });
        //modules
        Route::prefix('modules')->group(function() { 
            Route::get('/{filier}/{categories}', [ApiController::class, 'modules'])->name('modules.list');
        });
        //type
        Route::prefix('type')->group(function() { 
            Route::get('/{module}', [ApiController::class, 'type'])->name('type.list');
        });
        //Subject
        Route::prefix('subject')->group(function() { 
            Route::get('/{module}/{type}', [ApiController::class, 'subject'])->name('subject.list');
        });
   
});


Route::prefix('admin')->middleware('auth')->group(function () {
    

  
    // fillier
    Route::prefix('filiers')->group(function() { 
        Route::get('/filiers', [FilierController::class, 'filiers'])->name('filiers.list');
        Route::post('/filiers-store', [FilierController::class, 'filiersStore'])->name('filiers.store');
        Route::post('/filiers-delete', [FilierController::class, 'filiersDelete'])->name('filiers.delete');
        Route::post('/filiers-update', [FilierController::class, 'filiersUpdate'])->name('filiers.update');
    });

  // categories 
  Route::get('/', [CategoryController::class, 'categories'])->name('home');

  Route::prefix('categories')->group(function() { 
      Route::get('/', [CategoryController::class, 'categories'])->name('categories.list');
      Route::post('/categories-store', [CategoryController::class, 'categoriesStore'])->name('categories.store');
      Route::post('/categories-delete', [CategoryController::class, 'categoriesDelete'])->name('categories.delete');
      Route::post('/categories-update', [CategoryController::class, 'categoriesUpdate'])->name('categories.update');
  });



    Route::prefix('types')->group(function() { 
        Route::get('/', [TypeController::class, 'types'])->name('types.list');
        Route::post('/types-store', [TypeController::class, 'typesStore'])->name('types.store');
        Route::post('/types-delete', [TypeController::class, 'typesDelete'])->name('types.delete');
        Route::post('/types-update', [TypeController::class, 'typesUpdate'])->name('types.update');
    });

    Route::prefix('modules')->group(function() { 
        Route::get('/', [ModuleController::class, 'modules'])->name('modules.list');
        Route::post('/modules-store', [ModuleController::class, 'modulesStore'])->name('modules.store');
        Route::post('/modules-delete', [ModuleController::class, 'modulesDelete'])->name('modules.delete');
        Route::post('/modules-update', [ModuleController::class, 'modulesUpdate'])->name('modules.update');
    });


    
    Route::prefix('subjects')->group(function() { 
        Route::get('/', [SubjetController::class, 'subjects'])->name('subjects.list');
        Route::post('/subjects-store', [SubjetController::class, 'subjectsStore'])->name('subjects.store');
        Route::post('/subjects-delete', [SubjetController::class, 'subjectsDelete'])->name('subjects.delete');
        Route::post('/subjects-update', [SubjetController::class, 'subjectsUpdate'])->name('subjects.update');
    });


   

    // Route::get('/', [PropertyController::class, 'index'])->name('rentals');
    // Route::post('loginTEst', [UploadController::class, 'loginTEst'])->name('loginTEst');


    Route::post('upload', [UploadController::class, 'upload'])->name('upload');

    Route::prefix('booking')->group(function () {

        Route::get('/list', [BookingController::class, 'list'])->name('booking.list');
       

    });


    Route::prefix('settings')->group(function () {

        Route::get('hero', [SettingController::class, 'hero'])->name('settings.hero');
        Route::post('hero', [SettingController::class, 'heroStore'])->name('settings.heroStore');
       

    });


    Route::prefix('users')->group(function () {

        Route::get('/', [UserController::class, 'list'])->name('users.list');
        Route::post('store', [UserController::class, 'store'])->name('users.store');
        Route::post('update', [UserController::class, 'update'])->name('users.update');
        Route::post('delete', [UserController::class, 'delete'])->name('users.delete');
       

    });
    

});

    Route::prefix('starter-kit')->group(function () {
    Route::view('index', 'admin.color-version.index')->name('index');
});

require __DIR__.'/auth.php';
