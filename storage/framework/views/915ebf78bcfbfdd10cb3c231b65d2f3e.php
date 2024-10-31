<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>
<body>
    <div class="container">
        <h1>Bem-vindo à Home</h1>

        <div>
            <h2>Meus Treinos</h2>
            <a href="<?php echo e(route('treinos.create')); ?>" class="btn btn-primary">Criar Novo Treino</a>
            <a href="<?php echo e(route('treinos_exercicio.index')); ?>" class="btn btn-primary">Ver Meus Treinos</a>
            <!-- Novo botão adicionado para ver progresso -->
            <a href="<?php echo e(route('progresso.index')); ?>" class="btn btn-primary">Ver Progresso</a>
        </div>

     
    </div>
</body>
</html>
<?php /**PATH D:\César\Desktop\tcc1-main\resources\views/home.blade.php ENDPATH**/ ?>