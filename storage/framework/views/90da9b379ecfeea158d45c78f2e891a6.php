<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Treino Exercício</title>
</head>
<body>
    <h1>Editar Treino Exercício</h1>

    <form action="<?php echo e(route('treinos_exercicio.update', ['treinos_exercicio' => $treinos_exercicio->id])); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <label for="id_treino">Treino:</label>
        <select name="id_treino" required>
            <?php $__currentLoopData = $treinos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $treino): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($treino->id); ?>" <?php echo e($treinos_exercicio->id_treino == $treino->id ? 'selected' : ''); ?>>
                    <?php echo e($treino->nome_treino); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <label for="id_exercicio">Exercício:</label>
        <select name="id_exercicio" required>
            <?php $__currentLoopData = $exercicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exercicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($exercicio->id); ?>" <?php echo e($treinos_exercicio->id_exercicio == $exercicio->id ? 'selected' : ''); ?>>
                    <?php echo e($exercicio->nome_exercicio); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <label for="ordem">Ordem:</label>
        <input type="number" name="ordem" value="<?php echo e($treinos_exercicio->ordem); ?>" required>

        <label for="series">Séries:</label>
        <input type="number" name="series" value="<?php echo e($treinos_exercicio->series); ?>" required>

        <label for="repeticoes">Repetições:</label>
        <input type="number" name="repeticoes" value="<?php echo e($treinos_exercicio->repeticoes); ?>" required>

        <label for="carga">Carga:</label>
        <input type="number" step="0.01" name="carga" value="<?php echo e($treinos_exercicio->carga); ?>" required>

        <button type="submit">Atualizar Exercício</button>
    </form>

    <a href="<?php echo e(route('treinos_exercicio.index')); ?>">Voltar</a>
</body>
</html>
<?php /**PATH D:\César\Desktop\tcc1-main\resources\views/treinos_exercicio/edit.blade.php ENDPATH**/ ?>