<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;
use Exception;

class User extends DataLayer
{
    public function __construct()
    {
        parent::__construct("userstest", ["name", "email", "password"]);
    }

    public function save(): bool
    {
        if (!$this->checkEmail() || !$this->passwordHash()) {
            return false;
        }

        return parent::save();
    }

    protected function checkEmail(): bool
    {
        $check = null;

        if ($this->id) {
            $check = $this->find(
                "email = :email AND id <> :id",
                "email={$this->email}&id={$this->id}"
            )->count();
        } else {
            $check = $this->find(
                "email = :email",
                "email={$this->email}"
            )->count();
        }

        if ($check) {
            $this->fail = new Exception("Este e-mail {$this->email} já está em uso.");
            return false;
        }

        return true;
    }

    protected function passwordHash(): bool
    {
        if (empty($this->password) || strlen($this->password) < 6) {
            $this->fail = new Exception("Sua senha precisa ter pelo menos 6 dígitos.");
            return false;
        }

        if (password_get_info($this->password)["algo"]) {
            return true;
        }

        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return true;
    }
}
