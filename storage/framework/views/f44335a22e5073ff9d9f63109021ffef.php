<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Criar Treino</title>
</head>
<body>
    <h1>Criar Treino</h1>
    <form action="<?php echo e(route('workouts.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <label for="name">Nome do Treino:</label>
        <input type="text" id="name" name="name" required><br>
        <button type="submit">Criar Treino</button>
    </form>
</body>
</html>
<?php /**PATH D:\César\Desktop\tcc1-main\resources\views/workouts/create.blade.php ENDPATH**/ ?>