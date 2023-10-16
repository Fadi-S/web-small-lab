<?php

namespace App\Controllers;

use App\Model;
use App\View;

class RegisterController
{
    public function show() {
        return View::make("register", [
            "title" => "Register"
        ]);
    }

    public function store() {
        $name = $_POST["name"];
        $password = $_POST["password"];
        $email = $_POST["email"];

        if($name === null || $name === "") {

        }

        $password = password_hash($password, PASSWORD_BCRYPT);

        $model = new Model();
        $student = $model->execute("Select email from student where email=?", [$email])->fetch_column();
        if($student) {
            return redirect("/register")->setResponse([
                "error" => "Email already exists",
            ]);
        }

        $model->execute("INSERT INTO student (name, email, password) VALUES (?,?,?)", [
            $name, $email, $password,
        ]);

        $_SESSION["id"] = $model->execute("Select id from student where email=?", [$email])->fetch_column();

        return redirect("/");
    }
}