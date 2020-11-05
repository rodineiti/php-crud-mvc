<?php $v->layout("_layout"); ?>

<div class="container">
    <?php $v->insert("jumbo", ["title" => "Editar Usuário"]); ?>
    <a href="<?=$router->route('home.index')?>"
       class="btn btn-info mb-2">Voltar</a>
    <form action="<?=$router->route('users.update', ['id' => $user->id])?>" method="post">
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="<?=$user->name?>" />
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="<?=$user->email?>" />
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" id="password" name="password" />
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>