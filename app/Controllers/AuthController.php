<?php

namespace App\Controllers;

use App\Models\User;
use App\Support\Session;

class AuthController extends Controller
{
    public function loginForm()
    {
        if (check()) {
            $this->router->redirect("home.index");
        }

        echo $this->view->render("login");
    }

    public function login(array $data)
    {
        $email = filter_var($data["email"], FILTER_VALIDATE_EMAIL);
        $password = filter_var($data["password"], FILTER_DEFAULT);

        if ($email && $password) {

            $user = (new User())->find("email = :email", "email={$email}")->fetch();

            if (!$user) {
                setFlash("danger", "Dados inváldos, tente novamente.");
                $this->router->redirect("login.form");
            }

            if (!password_verify($password, $user->password)) {
                setFlash("danger", "Dados inváldos, tente novamente.");
                $this->router->redirect("login.form");
            }

            Session::set("user", $user->id);

            $this->router->redirect("home.index");
        } else {
            setFlash("danger", "Favor informar seu e-mail e senha");
            $this->router->redirect("login.form");
        }
    }

    public function logout()
    {
        Session::destroy("user");
        setFlash("success", "Você deslogou com sucesso, volte sempre.");
        $this->router->redirect("login.form");
    }
}