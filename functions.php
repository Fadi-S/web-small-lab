<?php

use App\Model;
use App\Redirect;

function isLoggedIn() : bool {
    return isset($_SESSION["id"]);
}


function getStudent()
{
    if(isset($_SESSION["student"]) && $_SESSION["student"]) {
        return $_SESSION["student"];
    }

    $model = new Model();

    return $_SESSION["student"] = $model->execute("Select * from student where id=?", [$_SESSION["id"]])->fetch_array(MYSQLI_ASSOC);
}

function redirect($url) : Redirect
{
    return Redirect::make($url);
}

function logout($url=null) {
    unset($_SESSION["id"]);

    unset($_SESSION["student"]);

    $url ??= "/login";

    return redirect($url);
}

function getResponse()
{
    return $_SESSION["response"] ?? null;
}

function getErrors()
{
    $response = getResponse();
    if(! $response) return null;

    return $response["error"];
}

function hasError()
{
    return (bool) getErrors();
}