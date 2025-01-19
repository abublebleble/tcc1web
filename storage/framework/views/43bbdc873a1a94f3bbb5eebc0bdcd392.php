<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupos Musculares</title>
</head>
<body>
    <h1>Grupos Musculares</h1>
    <a href="<?php echo e(route('grupos_musculares.create')); ?>">Adicionar Grupo Muscular</a>

    <?php if($message = Session::get('success')): ?>
        <p><?php echo e($message); ?></p>
    <?php endif; ?>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $gruposMusculares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($grupo->id); ?></td>
                    <td><?php echo e($grupo->name); ?></td>
                    <td>
                        <a href="<?php echo e(route('grupos_musculares.edit', $grupo->id)); ?>">Editar</a>
                        <form action="<?php echo e(route('grupos_musculares.destroy', $grupo->id)); ?>" method="POST" style="display:inline;">
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
<?php /**PATH D:\Users\cesar\Downloads\tcc\tcc1web\resources\views/grupos_musculares/index.blade.php ENDPATH**/ ?>