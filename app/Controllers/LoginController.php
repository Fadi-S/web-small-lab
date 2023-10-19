<?php

namespace App\Controllers;

use App\Model;
use App\View;

class LoginController
{
    public function show() {
        return View::make("login", [
            "title" => "Login",
        ]);
    }

    public function logout() {
        return logout();
    }

    public function store() {
        if(! isset($_POST["email"]) || ! isset($_POST["password"])) {
            return redirect("/login", 401)->setResponse([
                "error" => "Email and Password are required",
            ]);
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        $model = new Model;
        $user = $model->execute("SELECT * from user where email=?", [$email])->fetch_array();

        if(!$user || ! isset($user[0])) {
            return redirect("/login", 401)->setResponse([
                "error" => "Wrong Email or Password",
            ]);
        }

        if(! password_verify($password, $user["password"])) {
            return redirect("/login", 401)->setResponse([
                "error" => "Wrong Email or Password",
            ]);
        }

        $_SESSION["id"] = $user["id"];

        return redirect("/");
    }
}