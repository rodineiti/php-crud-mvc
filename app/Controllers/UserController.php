<?php

namespace App\Controllers;

use App\Models\User;
use App\Support\Session;

class UserController extends Controller
{
    public function __construct($router)
    {
        parent::__construct($router);

        if (!check()) {
            $this->router->redirect("login.form");
        }
    }

    public function create()
    {
        // renderizar html
        echo $this->view->render("create");
    }

    public function store(array $data)
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if (!empty($data['name']) && !empty($data['email']) && !empty($data['password'])) {
            // salvar no banco de dados
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = $data['password'];

            if (!$user->save()) {
                setFlash("danger", $user->fail()->getMessage());
                $this->router->redirect("users.create");
            }

            setFlash("success", "Usuário criado com sucesso");
            $this->router->redirect("home.index");
        } else {
            setFlash("danger", "Preencha todos os campos");
            $this->router->redirect("users.create");
        }
    }

    public function edit($data)
    {
        $id = filter_var($data['id'], FILTER_VALIDATE_INT);

        if (!$id) {
            setFlash("danger", "Informe o ID");
            $this->router->redirect("home.index");
        }

        $user = (new User())->findById($id);

        if (!$user) {
            setFlash("danger", "Usuário não encontrado");
            $this->router->redirect("home.index");
        }

        // renderizar html
        echo $this->view->render("edit", [
            "user" => $user
        ]);
    }

    public function update(array $data)
    {
        // atualizar no banco de dados
        $id = filter_var($data['id'], FILTER_VALIDATE_INT);
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if (!$id) {
            setFlash("danger", "Informe o ID");
            $this->router->redirect("home.index");
        }

        $user = (new User())->findById($id);

        if (!$user) {
            setFlash("danger", "Usuário não encontrado");
            $this->router->redirect("home.index");
        }

        if (!empty($data['name']) && !empty($data['email'])) {
            $user->name = $data['name'];
            $user->email = $data['email'];

            if (!$user->save()) {
                setFlash("danger", $user->fail()->getMessage());
                $this->router->redirect("users.edit", ["id" => $user->id]);
            }

            setFlash("success", "Usuário atualizado com sucesso");
            $this->router->redirect("home.index");
        } else {
            setFlash("danger", "Preencha todos os campos");
            $this->router->redirect("users.edit", ["id" => $user->id]);
        }
    }

    public function destroy($data)
    {
        // deletar no banco de dados
        $id = filter_var($data['id'], FILTER_VALIDATE_INT);

        if (!$id) {
            setFlash("danger", "Informe o ID");
            $this->router->redirect("home.index");
        }

        $user = (new User())->findById($id);

        if (!$user) {
            setFlash("danger", "Usuário não encontrado");
            $this->router->redirect("home.index");
        }

        if ($user->id === Session::get("user")) {
            setFlash("danger", "Você não pode se excluir.");
            $this->router->redirect("home.index");
        }

        $user->destroy();

        setFlash("success", "Usuário deletado com sucesso");
        $this->router->redirect("home.index");
    }
}