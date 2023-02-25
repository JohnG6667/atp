<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\FactController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PicturesWorkController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\WorkController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('services', ServiceController::class)->names('admin.services');

Route::resource('facts', FactController::class)->names('admin.facts');

Route::resource('abouts', AboutController::class)->names('admin.abouts');

Route::resource('work', WorkController::class)->names('admin.works');

Route::resource('picture', PicturesWorkController::class)->names('admin.pictures');

Route::resource('teams', TeamController::class)->names('admin.teams');

Route::resource('skills', SkillController::class)->names('admin.skills');

Route::resource('testimonials', TestimonialController::class)->names('admin.testimonials');

Route::resource('posts', PostController::class)->names('admin.posts');
