<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Exercício ao Treino</title>
</head>
<body>
    <h1>Adicionar Exercício ao Treino</h1>

    <form action="<?php echo e(route('treinos_exercicio.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        
        <label for="id_treino">Treino:</label>
        <select id="id_treino" name="id_treino" required>
            <?php $__currentLoopData = $treinos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $treino): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($treino->id); ?>"><?php echo e($treino->nome_treino); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <label for="id_exercicio">Exercício:</label>
        <select id="id_exercicio" name="id_exercicio" required>
            <?php $__currentLoopData = $exercicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exercicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($exercicio->id); ?>"><?php echo e($exercicio->nome_exercicio); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <label for="ordem">Ordem:</label>
        <input type="number" id="ordem" name="ordem" required>

        <label for="series">Séries:</label>
        <input type="number" id="series" name="series" required>

        <label for="repeticoes">Repetições:</label>
        <input type="number" id="repeticoes" name="repeticoes" required>

        <label for="carga">Carga:</label>
        <input type="number" step="0.01" id="carga" name="carga" required>

        <button type="submit">Adicionar Exercício</button>
    </form>

    <a href="<?php echo e(route('treinos_exercicio.index')); ?>">Voltar</a>
</body>
</html>
<?php /**PATH /home/alunos/Downloads/tcc1web/resources/views/treinos_exercicio/create.blade.php ENDPATH**/ ?>