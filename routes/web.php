<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('candidates', [CandidateController::class, 'index']);
Route::post('candidates/store', [CandidateController::class, 'store']);
Route::get('candidates/edit/{id}', [CandidateController::class, 'edit']);
Route::post('candidates/update/{id}', [CandidateController::class, 'update']);
Route::get('candidates/delete/{id}', [CandidateController::class, 'destroy']);
