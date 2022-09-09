<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AbogadoTicketController;
use App\Http\Controllers\Api\ArrendadorTicketController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => ["auth:sanctum"]], function(){
    Route::get('profile', [AuthController::class, 'profile']);
    Route::get('logout', [AuthController::class, 'logout']);

    // Arrendador --> tickets
    Route::get('contracts/{contract}/tickets', [ArrendadorTicketController::class, 'index']);
    Route::post('contracts/{contract}/tickets', [ArrendadorTicketController::class, 'store']);
    Route::get('contracts/{contract}/tickets/{ticket}', [ArrendadorTicketController::class, 'show']);
    Route::put('contracts/{contract}/tickets/{ticket}', [ArrendadorTicketController::class, 'update']);
    Route::get('contracts/{contract}/tickets/{ticket}/close', [ArrendadorTicketController::class, 'close']);

    // Abogado --> tickets
    Route::get('abogado-tickets', [AbogadoTicketController::class, 'index']);
    Route::post('abogado-tickets', [AbogadoTicketController::class, 'store']);
    Route::get('abogado-tickets/{ticket}', [AbogadoTicketController::class, 'show']);
    Route::put('abogado-tickets/{ticket}', [AbogadoTicketController::class, 'update']);
    Route::get('abogado-tickets/{ticket}/close', [AbogadoTicketController::class, 'close']);
    Route::delete('abogado-tickets/{ticket}', [AbogadoTicketController::class, 'destroy']);
});