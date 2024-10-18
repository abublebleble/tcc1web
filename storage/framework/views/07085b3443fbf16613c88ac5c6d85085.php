<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Treino</title>
</head>
<body>
    <h1>Editar Treino</h1>
    <form action="<?php echo e(route('workouts.update', $id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <label for="name">Nome Treino:</label>
        <input type="text" id="name" name="name" value="<?php echo e($workout['name']); ?>" required><br>
        <button type="submit">Atualizar Treino</button>
    </form>
</body>
</html>
<?php /**PATH D:\César\Desktop\tcc1-main\resources\views/workouts/edit.blade.php ENDPATH**/ ?>