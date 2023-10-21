<?php

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Route;

// Each line here gets added to the routes array in Route class.
// To differentiate between GET and POST requests, we use the `get` and `post` methods.
// I learned this from Laravel's routing system.
// The first argument is the path, and the second is the controller and method to call.
// The controller is the class name, and the method is the method name.

// I wrote this code from scratch, no framework used. :)

Route::get("/", [HomeController::class, "index"]);

Route::get("/login", [LoginController::class, "show"]);
Route::post("/login", [LoginController::class, "store"]);

Route::get("/register", [RegisterController::class, "show"]);
Route::post("/register", [RegisterController::class, "store"]);

Route::post("/logout", [LoginController::class, "logout"]);

// Bonus dynamic route XD - Fadi Sarwat - 7432
Route::get("/users/(\\d+)", [HomeController::class, "show"]);