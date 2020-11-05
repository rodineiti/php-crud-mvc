<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">PHP - <?=$title ?? 'CRUD MVC';?></h1>
        <?php if (!$title): ?>
            <p class="lead">Um simples crud com MVC usando composer.</p>
        <?php endif; ?>
    </div>
</div>
