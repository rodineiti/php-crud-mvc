<?php $v->layout("_layout"); ?>

<div class="container">
    <?php $v->insert("jumbo", ["title" => "LOGIN"]); ?>
    <div class="row">
        <div class="col">
            <form method="post" action="<?=$router->route("login.post");?>">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" />
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" />
                </div>
                <button type="submit" class="btn btn-primary">Logar</button>
            </form>
        </div>
    </div>
</div>
