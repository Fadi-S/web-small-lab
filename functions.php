<?php

use App\Model;
use App\Redirect;

function isLoggedIn() : bool {
    return isset($_SESSION["id"]);
}


function getUser()
{
    if(isset($_SESSION["user"]) && $_SESSION["user"] && $_SESSION["id"] == $_SESSION["user"]["id"]) {
        return $_SESSION["user"];
    }

    $model = new Model();

    return $_SESSION["user"] = $model->execute("Select * from user where id=?", [$_SESSION["id"]])->fetch_array(MYSQLI_ASSOC);
}

function redirect($url, $status=200) : Redirect
{
    return Redirect::make($url, $status);
}

function logout($url=null) {
    unset($_SESSION["id"]);

    unset($_SESSION["user"]);

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

function clearResponse()
{
    unset($_SESSION["response"]);
}