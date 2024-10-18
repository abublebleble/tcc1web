<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Grupo Muscular</title>
</head>
<body>
    <h1>Criar Grupo Muscular</h1>
    <form action="<?php echo e(route('grupos_musculares.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <label for="name">Nome do Grupo Muscular:</label>
        <input type="text" name="name" required>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
<?php /**PATH D:\César\Desktop\tcc1-main\resources\views/grupos_musculares/create.blade.php ENDPATH**/ ?>