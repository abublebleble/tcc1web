<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Progressos</title>
</head>
<body>
    <h1>Lista de Progressos</h1>
    
    <a href="<?php echo e(route('progresso.create')); ?>">Adicionar Progresso</a>

    <?php if(session('success')): ?>
        <div><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table border="1">
        <thead>
            <tr>
                <th>Exercício</th>
                <th>Data</th>
                <th>Carga</th>
                <th>Repetições Realizadas</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $progressos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $progresso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($progresso->treinoExercicio->exercicio->nome_exercicio ?? 'Exercício não encontrado'); ?></td>
                    <td><?php echo e($progresso->data); ?></td>
                    <td><?php echo e($progresso->carga); ?></td>
                    <td><?php echo e($progresso->repeticoes_realizadas); ?></td>
                    <td>
                        <a href="<?php echo e(route('progresso.edit', $progresso->id)); ?>">Editar</a>
                        <form action="<?php echo e(route('progresso.destroy', $progresso->id)); ?>" method="POST" style="display:inline;">
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
<?php /**PATH D:\César\Desktop\tcc1-main\resources\views/progresso/index.blade.php ENDPATH**/ ?>