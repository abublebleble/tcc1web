<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Exercícios por Treino</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>
<body>
    <div class="container">
        <h1>Lista de Exercícios por Treino</h1>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <a href="<?php echo e(route('treinos_exercicio.create')); ?>" class="button">Adicionar Exercício a um Treino</a>

        <table>
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
                <?php $__currentLoopData = $treinosExercicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $treinoExercicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($treinoExercicio->id); ?></td>
                        <td><?php echo e($treinoExercicio->treino->nome_treino); ?></td>
                        <td><?php echo e($treinoExercicio->exercicio->nome_exercicio); ?></td>
                        <td><?php echo e($treinoExercicio->ordem); ?></td>
                        <td><?php echo e($treinoExercicio->series); ?></td>
                        <td><?php echo e($treinoExercicio->repeticoes); ?></td>
                        <td><?php echo e($treinoExercicio->carga); ?></td>
                        <td>
                            <a href="<?php echo e(route('treinos_exercicio.edit', $treinoExercicio->id)); ?>">Editar</a>
                            <form action="<?php echo e(route('treinos_exercicio.destroy', $treinoExercicio->id)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php /**PATH D:\César\Desktop\tcc1-main\resources\views/treinos_exercicio/index.blade.php ENDPATH**/ ?>