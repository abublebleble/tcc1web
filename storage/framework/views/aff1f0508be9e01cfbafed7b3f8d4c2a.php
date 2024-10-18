<!-- resources/views/treinos/index.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Treinos</title>
</head>
<body>
    <h1>Lista de Treinos</h1>

    <a href="<?php echo e(route('treinos.create')); ?>">Criar Novo Treino</a>

    <?php if(session('success')): ?>
        <p><?php echo e(session('success')); ?></p>
    <?php endif; ?>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome do Treino</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $treinos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $treino): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($treino->id); ?></td>
                    <td><?php echo e($treino->nome_treino); ?></td>
                    <td>
                        <a href="<?php echo e(route('treinos.edit', $treino->id)); ?>">Editar</a>
                        <form action="<?php echo e(route('treinos.destroy', $treino->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH D:\César\Desktop\tcc1-main\resources\views/treinos/index.blade.php ENDPATH**/ ?>