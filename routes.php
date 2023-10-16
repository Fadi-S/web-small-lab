<?php

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Route;

Route::get("/", [HomeController::class, "index"]);

Route::get("/login", [LoginController::class, "show"]);
Route::post("/login", [LoginController::class, "store"]);

Route::get("/register", [RegisterController::class, "show"]);
Route::post("/register", [RegisterController::class, "store"]);

Route::post("/logout", [LoginController::class, "logout"]);
