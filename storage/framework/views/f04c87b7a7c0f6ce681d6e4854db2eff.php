<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Treinos e Exercícios</title>
</head>
<body>
    <h1>Lista de Treinos e Exercícios</h1>

    <?php if(session('success')): ?>
        <div>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <a href="<?php echo e(route('treino_exercicio.create')); ?>">Criar Novo Treino e Exercício</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Treino</th>
                <th>Exercício</th>
                <th>Ordem</th>
                <th>Séries</th>
                <th>Repetições</th>
                <th>Carga</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $treinoExercicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $treinoExercicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($treinoExercicio->id); ?></td>
                    <td><?php echo e($treinoExercicio->treino->nome_treino); ?></td>
                    <td><?php echo e($treinoExercicio->exercicio->nome_exercicio); ?></td>
                    <td><?php echo e($treinoExercicio->ordem); ?></td>
                    <td><?php echo e($treinoExercicio->series); ?></td>
                    <td><?php echo e($treinoExercicio->repeticoes); ?></td>
                    <td><?php echo e($treinoExercicio->carga); ?></td>
                    <td>
                        <a href="<?php echo e(route('treino_exercicio.edit', $treinoExercicio->id)); ?>">Editar</a>
                        <form action="<?php echo e(route('treino_exercicio.destroy', $treinoExercicio->id)); ?>" method="POST" style="display:inline;">
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
</html>
<?php /**PATH D:\César\Desktop\tcc1-main\resources\views/treino_exercicio/index.blade.php ENDPATH**/ ?>