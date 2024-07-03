<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\VoteController;

Route::get('/', [CandidateController::class, 'index'])->name('candidates.index');
Route::get('/candidates/create', [CandidateController::class, 'create'])->name('candidates.create');
Route::post('/candidates', [CandidateController::class, 'store'])->name('candidates.store');

Route::post('/votes', [VoteController::class, 'store'])->name('votes.store');
Route::get('/results', [VoteController::class, 'results'])->name('votes.results');

Route::get('/', [VoteController::class, 'index']);
Route::post('/vote', [VoteController::class, 'vote']);