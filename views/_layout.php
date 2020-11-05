<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Crud MVC</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?=$router->route('home.index')?>">CRUD MVC</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?=$router->route('home.index')?>">Home <span class="sr-only">(current)</span></a>
            </li>

            <?php if (check()): ?>
            <li class="nav-item">
                <a class="nav-link" href="javascript:;"><?=auth()->name?></a>
            </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=$router->route('login.logout')?>">Sair</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<?php if ($flash = getFlash("flash")): ?>
    <div class="alert alert-<?=$flash["status"]?>">
        <?php if (is_array($flash["messages"])): ?>
            <ul>
            <?php foreach ($flash["messages"] as $message): ?>
                <li><?=$message?></li>
            <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <?php if (is_string($flash["messages"])): ?>
            <?=$flash["messages"]?>
        <?php endif; ?>
    </div>
<?php endif; ?>

<div class="container-fluid">
    <?= $v->section("content"); ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<?= $v->section("scripts"); ?>

</body>
</html>
