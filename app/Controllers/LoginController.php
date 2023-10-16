<?php

namespace App\Controllers;

use App\Model;
use App\View;

class LoginController
{
    public function show() {
        return View::make("login");
    }

    public function logout() {
        return logout();
    }

    public function store() {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $model = new Model;
        $result = $model->execute("SELECT * from student where email=?", [$email])->fetch_array();

        if(!$result || ! isset($result[0])) {
            return redirect("/login")->setResponse([
                "error" => "Wrong Email or Password",
            ]);
        }
        $user = $result;

        if(! password_verify($password, $user["password"])) {
            return redirect("/login")->setResponse([
                "error" => "Wrong Email or Password",
            ]);
        }

        $_SESSION["id"] = $user["id"];

        return redirect("/");
    }
}