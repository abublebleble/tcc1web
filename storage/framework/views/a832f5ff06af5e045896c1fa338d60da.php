<!-- resources/views/treinos/edit.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Treino</title>
</head>
<body>
    <h1>Editar Treino</h1>

    <form action="<?php echo e(route('treinos.update', $treino->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        
        <label for="nome_treino">Nome do Treino:</label>
        <input type="text" name="nome_treino" value="<?php echo e($treino->nome_treino); ?>" required>

        <button type="submit">Atualizar Treino</button>
    </form>
    <a href="<?php echo e(route('treinos.index')); ?>">Voltar</a>
</body>
</html>
<?php /**PATH D:\César\Desktop\tcc1-main\resources\views/treinos/edit.blade.php ENDPATH**/ ?>