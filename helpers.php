<?php

function setFlash($status = "info", $messages = null) {
    \App\Support\Session::set("flash", [
        "status" => $status,
        "messages" => $messages
    ]);
    return true;
}

function getFlash($key = "flash") {
    if (\App\Support\Session::has($key)) {
        $flash = \App\Support\Session::get($key);
        \App\Support\Session::destroy($key);
        return $flash;
    }
    return null;
}

function check() {
    if (\App\Support\Session::has("user")) {
        return true;
    }
    return false;
}

function auth() {
    return \App\Models\Auth::user();
}