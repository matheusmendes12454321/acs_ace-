<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\EndemicsController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\MicroareaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    // Families
    Route::apiResource('families', FamilyController::class);
    Route::post('/families/{family}/members', [FamilyController::class, 'addMember']);
    
    // Visits
    Route::apiResource('visits', VisitController::class);
    Route::get('/visits/stats', [VisitController::class, 'stats']);
    
    // Endemics
    Route::apiResource('endemics', EndemicsController::class);
    
    // Alerts
    Route::apiResource('alerts', AlertController::class);
    Route::put('/alerts/{alert}/resolve', [AlertController::class, 'resolve']);
    Route::get('/alerts/pending', [AlertController::class, 'pending']);
    
    // Reports
    Route::get('/reports', [ReportController::class, 'generate']);
    
    // Microareas
    Route::apiResource('microareas', MicroareaController::class);
    
    // Users
    Route::apiResource('users', UserController::class);
    
    // Offline sync
    Route::post('/offline/sync/{table}', [OfflineController::class, 'sync']);
});