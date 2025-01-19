<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Grupo Muscular</title>
</head>
<body>
    <h1>Editar Grupo Muscular</h1>
    
    <form action="<?php echo e(route('grupos_musculares.update', ['id' => $grupoMuscular->id])); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <label for="name">Nome do Grupo Muscular:</label>
        <input type="text" id="name" name="name" value="<?php echo e($grupoMuscular->name); ?>" required>
        
        <button type="submit">Atualizar Grupo Muscular</button>
    </form>
    
    <!-- Exibição de erros de validação -->
    <?php if($errors->any()): ?>
        <div>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Mensagem de sucesso -->
    <?php if(session('success')): ?>
        <div>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
</body>
</html>
<?php /**PATH D:\Users\cesar\Downloads\tcc\tcc1web\resources\views/grupos_musculares/edit.blade.php ENDPATH**/ ?>