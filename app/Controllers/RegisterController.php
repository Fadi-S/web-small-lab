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
        if(! isset($_POST["email"]) || ! isset($_POST["password"]) || ! isset($_POST["name"])) {
            return redirect("/register", 401)->setResponse([
                "error" => "All fields required",
            ]);
        }

        $name = $_POST["name"];
        $password = $_POST["password"];
        $email = $_POST["email"];

        if($name === "" || $password === "" || $email === "") {
            return redirect("/register", 401)->setResponse([
                "error" => "All fields required",
            ]);
        }

        $password = password_hash($password, PASSWORD_BCRYPT);

        $model = new Model();
        $student = $model->execute("Select email from student where email=?", [$email])->fetch_column();
        if($student) {
            return redirect("/register", 401)->setResponse([
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