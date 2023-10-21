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

    public function show($id) {
        if(! isLoggedIn()) {
            return response("/login");
        }

        $user = getUserById($id);
        if(! $user) {
            return response("/404", 404);
        }

        return View::make("user", [
            "user" => $user,
            "title" => "User " . $user["name"],
        ]);
    }
}