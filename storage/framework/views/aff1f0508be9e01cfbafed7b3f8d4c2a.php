<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Treinos</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>
<body>
    <div class="container">
        <h1>Meus Treinos</h1>
        
        <!-- Botão para criar novo treino -->
        <a href="<?php echo e(route('treinos.create')); ?>" class="btn btn-primary mb-3">Criar Treino</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Nome do Treino</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $treinos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $treino): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($treino->nome_treino); ?></td>
                        <td>
                            <a href="<?php echo e(route('treinos.edit', $treino->id)); ?>" class="btn btn-warning">Editar</a>
                            <form action="<?php echo e(route('treinos.destroy', $treino->id)); ?>" method="POST" style="display: inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                            <a href="<?php echo e(route('treinos_exercicio.create', ['treino_id' => $treino->id])); ?>" class="btn btn-success">Adicionar Exercício</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <a href="<?php echo e(route('home')); ?>" class="btn btn-secondary">Voltar para Home</a>
    </div>
</body>
</html>
<?php /**PATH D:\César\Desktop\tcc1-main\resources\views/treinos/index.blade.php ENDPATH**/ ?>