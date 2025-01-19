<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Exercício</title>
</head>
<body>
    <h1>Editar Exercício</h1>

    <form action="<?php echo e(route('exercicios.update', $exercicio->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <label for="nome_exercicio">Nome do Exercício:</label>
        <input type="text" id="nome_exercicio" name="nome_exercicio" value="<?php echo e($exercicio->nome_exercicio); ?>" required>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao"><?php echo e($exercicio->descricao); ?></textarea>

        <label for="id_grupo_muscular">Grupo Muscular:</label>
        <select id="id_grupo_muscular" name="id_grupo_muscular" required>
            <option value="">Selecione um grupo muscular</option>
            <?php $__currentLoopData = $gruposMusculares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupoMuscular): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($grupoMuscular->id); ?>" <?php echo e($grupoMuscular->id == $exercicio->id_grupo_muscular ? 'selected' : ''); ?>>
                    <?php echo e($grupoMuscular->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <button type="submit">Atualizar Exercício</button>
    </form>

    <?php if($errors->any()): ?>
        <div>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
</body>
</html>
<?php /**PATH D:\Users\cesar\Downloads\tcc\tcc1web\resources\views/exercicios/edit.blade.php ENDPATH**/ ?>