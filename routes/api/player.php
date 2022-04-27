<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlayerController;

Route::resource('player', PlayerController::class);
