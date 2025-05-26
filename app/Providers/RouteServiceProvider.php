<?php
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;

Route::middlewareGroup('role:admin', [RoleMiddleware::class . ':admin']);
Route::middlewareGroup('role:admin,petugas', [RoleMiddleware::class . ':admin,petugas']);
Route::middlewareGroup('role:tamu', [RoleMiddleware::class . ':tamu']);