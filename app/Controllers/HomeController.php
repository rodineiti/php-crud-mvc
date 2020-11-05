<?php

namespace App\Controllers;

use App\Models\User;
use App\Support\Session;

class HomeController extends Controller
{
    public function __construct($router)
    {
        parent::__construct($router);

        if (!check()) {
            $this->router->redirect("login.form");
        }
    }

    public function index()
    {
        // pegar todos os usuários do banco de dados
        $users = (new User())->find()->fetch(true);

        // renderizar o html HOME passando a variável $users para o template
        echo $this->view->render("home", [
            "users" => $users,
            "userIdLogged" => Session::get("user")
        ]);
    }
}