<?php

namespace App\Controllers;

use App\View;

class HomeController
{
    public function index() {
        if(! isLoggedIn()) {
            return response("/login");
        }

        return View::make("home", [
            "user" => getUser(),
            "title" => "Home",
        ]);
    }
}