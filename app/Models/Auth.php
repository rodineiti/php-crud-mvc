<?php

namespace App\Models;

use App\Support\Session;
use CoffeeCode\DataLayer\DataLayer;

class Auth extends DataLayer
{
    public function __construct()
    {
        parent::__construct("userstest", ["name", "email", "password"]);
    }

    public static function user(): ?User
    {
        if (!Session::has("user")) {
            return null;
        }

        return (new User())->findById(Session::get("user"));
    }
}
