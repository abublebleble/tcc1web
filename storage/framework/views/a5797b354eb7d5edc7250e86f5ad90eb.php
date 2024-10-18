<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Exercícios</title>
</head>
<body>
    <h1>Lista de Exercícios</h1>
    
    <?php if(session('success')): ?>
        <div>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <a href="<?php echo e(route('exercicios.create')); ?>">Criar Novo Exercício</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome do Exercício</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $exercicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exercicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($exercicio->id); ?></td>
                    <td><?php echo e($exercicio->nome_exercicio); ?></td>
                    <td><?php echo e($exercicio->descricao); ?></td>
                    <td>
                        <a href="<?php echo e(route('exercicios.edit', $exercicio->id)); ?>">Editar</a>
                        <form action="<?php echo e(route('exercicios.destroy', $exercicio->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html><?php /**PATH D:\César\Desktop\tcc1-main\resources\views/exercicios/index.blade.php ENDPATH**/ ?>