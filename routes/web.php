<?php

use App\Http\Controllers\Dashboard\AboutController;
use App\Http\Controllers\Dashboard\AdmissionController;
use App\Http\Controllers\Dashboard\CurriculumController;
use App\Http\Controllers\Dashboard\EmploymentController;
use App\Http\Controllers\Dashboard\FacilitiesController;
use App\Http\Controllers\Dashboard\LearningController;
use App\Http\Controllers\dashboard\NewsController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\StudentLifeController;
use App\Http\Controllers\Dashboard\TeamController;
use App\Http\Controllers\Dashboard\ValueController;
use App\Http\Controllers\Dashboard\WordController;
use App\Models\News;
use Illuminate\Support\Facades\Route;

//Localization
// Route::get('/ru', function () {
//     session()->put('locale', 'ru');
//     return redirect()->back();
// })->name('languages');
// Route::get('/uz', function () {
//         session()->put('locale', 'uz');
//         return redirect()->back();
// })->name('languages');
Route::get('/languages/{loc}', function ($loc) {
    if (in_array($loc, ['en', 'ru', 'uz'])) {
        session()->put('locale', $loc);
    }
    return redirect()->back();
});

//Front
Route::get('/', [\App\Http\Controllers\Front\FrontController::class, 'index'])->name('main');

//Dashboard
Route::group(['prefix' => 'dashboard'], function (){
    Route::name('dashboard.')->group(function (){

        Route::get('/', [\App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('index');
        Route::get('/words', [WordController::class, 'index'])->name('words.index');
        Route::resource('/slider', SliderController::class);
        Route::resource('/value', ValueController::class);
        Route::resource('/curriculum', CurriculumController::class);
        Route::resource('/facilities', FacilitiesController::class);
        Route::resource('/teams', TeamController::class);
        Route::resource('/learning', LearningController::class);
        Route::resource('/admission', AdmissionController::class);
        Route::resource('/employment', EmploymentController::class);
        Route::resource('/studentlife', StudentLifeController::class);
        Route::resource('/news', NewsController::class);
        Route::resource('/about', AboutController::class);


        Route::get('/clear', function (){
            \Illuminate\Support\Facades\Artisan::call('route:clear');
            \Illuminate\Support\Facades\Artisan::call('cache:clear');
            \Illuminate\Support\Facades\Artisan::call('config:clear');
            \Illuminate\Support\Facades\Artisan::call('config:cache');
            \Illuminate\Support\Facades\Artisan::call('route:cache');
            \Illuminate\Support\Facades\Artisan::call('optimize:clear');
            return 'success';
        });
    });
});
require __DIR__.'/auth.php';