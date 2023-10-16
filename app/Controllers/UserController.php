<?php

namespace App\Controllers;

use App\View;

class UserController
{
    public function index($user) {
        return View::make("user", compact("user"));
    }
}