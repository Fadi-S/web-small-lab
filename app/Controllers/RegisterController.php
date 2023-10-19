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
            return response("/register", 401)->setResponse([
                "error" => "All fields required",
            ]);
        }

        $name = $_POST["name"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirm_password"] ?? "";
        $email = $_POST["email"];

        if($name === "" || $password === "" || $email === "") {
            return response("/register", 401)->setResponse([
                "error" => "All fields required",
            ]);
        }

        if($password !== $confirmPassword) {
            return response("/register", 401)->setResponse([
                "error" => "Passwords do not match",
            ]);
        }

        if(preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email) !== 1) {
            return response("/register", 401)->setResponse([
                "error" => "Invalid email",
            ]);
        }


        $password = password_hash($password, PASSWORD_BCRYPT);

        $model = new Model();
        $user = $model->execute("Select email from user where email=?", [$email])->fetch_column();
        if($user) {
            return response("/register", 401)->setResponse([
                "error" => "Email already exists",
            ]);
        }

        $model->execute("INSERT INTO user (name, email, password) VALUES (?,?,?)", [
            $name, $email, $password,
        ]);

        $_SESSION["id"] = $model->execute("Select user_id from user where email=?", [$email])->fetch_column();

        return response("/");
    }
}