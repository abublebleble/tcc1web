<!-- resources/views/treinos/create.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Criar Treino</title>
</head>
<body>
    <h1>Criar Novo Treino</h1>

    <form action="<?php echo e(route('treinos.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <label for="nome_treino">Nome do Treino:</label>
        <input type="text" name="nome_treino" required>

        <button type="submit">Criar Treino</button>
    </form>
    <a href="<?php echo e(route('treinos.index')); ?>">Voltar</a>
</body>
</html>
<?php /**PATH D:\César\Desktop\tcc1-main\resources\views/treinos/create.blade.php ENDPATH**/ ?>