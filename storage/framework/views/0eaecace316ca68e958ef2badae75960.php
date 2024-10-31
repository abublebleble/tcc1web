<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Progresso</title>
</head>
<body>
    <h1>Editar Progresso</h1>

    <form action="<?php echo e(route('progresso.update', $progresso->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <label for="id_treino_exercicio">Exercício:</label>
        <select name="id_treino_exercicio" id="id_treino_exercicio">
            <?php $__currentLoopData = $treinoExercicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $te): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($te->id); ?>" <?php echo e($progresso->id_treino_exercicio == $te->id ? 'selected' : ''); ?>>
                    <?php echo e($te->exercicio->nome_exercicio); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        
        <label for="data">Data:</label>
        <input type="date" name="data" id="data" value="<?php echo e($progresso->data); ?>" required>

        <label for="carga">Carga:</label>
        <input type="number" step="0.01" name="carga" id="carga" value="<?php echo e($progresso->carga); ?>" required>

        <label for="repeticoes_realizadas">Repetições Realizadas:</label>
        <input type="number" name="repeticoes_realizadas" id="repeticoes_realizadas" value="<?php echo e($progresso->repeticoes_realizadas); ?>" required>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
<?php /**PATH D:\César\Desktop\tcc1-main\resources\views/progresso/edit.blade.php ENDPATH**/ ?>