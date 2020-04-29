<?php

use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\CostisationController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\PlancomptableController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VersementController;
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

Route::get('/', [AcceuilController::class, 'index'])->name('acceuil');

/**
 * Route des membres
 */
Route::get('/membres', [MembreController::class, 'index'])->name('membres');
Route::get('membre/new', [MembreController::class, 'create'])->name('membre.create');
Route::get('membre/{id}', 'MembreController@edit')->name('membre.edit');
Route::post('/membre', 'MembreController@store')->name('membre.store');
Route::put('membre/{id}', 'MembreController@update')->name('membre.update');
Route::delete('membre/{id}', 'MembreController@supp')->name('membre.supp');

/**
 * Gestion pour les plans comptables
 */
Route::get('plans', [PlancomptableController::class, 'index'])->name('plans');
Route::get('plan/import', [PlancomptableController::class, 'import'])->name('plan.import');
Route::get('plan/new', [PlancomptableController::class, 'create'])->name('plan.create');
Route::get('plan/{id}', [PlancomptableController::class, 'edit'])->name('plan.edit');
Route::put('plan/{id}', [PlancomptableController::class, 'update'])->name('plan.update');
Route::delete('plan/{id}', [PlancomptableController::class, 'supp'])->name('plan.supp');
Route::post('plan', [PlancomptableController::class, 'store'])->name('plan.store');

/**
 * Gestion pour les utilisateurs
 */
Route::get('users', [UserController::class, 'index'])->name('users');
Route::get('user/new', [UserController::class, 'create'])->name('user.create');
Route::get('user/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::put('user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.supp');
Route::post('user', [UserController::class, 'store'])->name('user.store');

/**
 * Gestion des versements
 */
Route::get('versements', [VersementController::class, 'index'])->name('versements');
Route::get('versement/new', [VersementController::class, 'create'])->name('versement.create');
Route::post('versement', [VersementController::class, 'store'])->name('versement.store');

/**
 * Gestion des cotisations
 */
Route::get('cotisations', [CostisationController::class, 'index'])->name('cotisations');
Route::get('cotisation/new', [CostisationController::class, 'create'])->name('cotisation.create');
Route::get('cotisation/{id}', [CostisationController::class, 'edit'])->name('cotisation.edit');
Route::put('cotisation/{id}', [CostisationController::class, 'update'])->name('cotisation.update');
Route::delete('cotisation/{id}', [CostisationController::class, 'destroy'])->name('cotisation.supp');
Route::post('cotisation', [CostisationController::class, 'store'])->name('cotisation.store');
