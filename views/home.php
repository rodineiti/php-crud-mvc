<?php $v->layout("_layout"); ?>

<div class="container">
    <?php $v->insert("jumbo", ["title" => null]); ?>

    <a href="<?=$router->route('users.create')?>"
     class="btn btn-primary mb-2">Adicionar novo</a>
    <?php if (!$users): ?>
        <div class="alert alert-info">Nenhum registro encontrado</div>
    <?php else: ?>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Editar</th>
                <th scope="col">Deletar</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <th scope="row"><?=$user->id?></th>
                    <td><?=$user->name?></td>
                    <td><?=$user->email?></td>
                    <td>
                        <a href="<?=$router->route('users.edit', ['id' => $user->id])?>" class="btn btn-info">Editar</a>
                    </td>
                    <td>
                        <?php if ($userIdLogged !== $user->id): ?>
                        <a
                            onclick="return confirm('Tem certeza que deseja excluir?');"
                            href="<?=$router->route('users.destroy', ['id' => $user->id])?>"
                            class="btn btn-danger">Deletar</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>