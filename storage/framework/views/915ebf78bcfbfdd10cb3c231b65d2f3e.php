<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
    <h1>Bem Vindo!</h1>
    <a href="<?php echo e(route('workouts.create')); ?>">Criar treino</a>
    <h2>Treinos</h2>
    <ul>
        <?php $__currentLoopData = $workouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $workout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <?php echo e($workout['name']); ?>

            <a href="<?php echo e(route('exercises.create', $index)); ?>">Adicionar Exercicio</a>
            <a href="<?php echo e(route('workouts.edit', $index)); ?>">Editar Treino</a>
            <form action="<?php echo e(route('workouts.destroy', $index)); ?>" method="POST" style="display:inline;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit">Deletar Treino</button>
            </form>
            <ul>
                <?php $__currentLoopData = $workout['exercises']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exerciseIndex => $exercise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                <?php echo e($exercise['name']); ?>: <?php echo e($exercise['sets']); ?> sets de <?php echo e($exercise['reps']); ?> reps com <?php echo e($exercise['carga']); ?> kg
                    <a href="<?php echo e(route('exercises.edit', ['workoutId' => $index, 'exerciseId' => $exerciseIndex])); ?>">Editar Exercicio</a>
                    <form action="<?php echo e(route('exercises.destroy', ['workoutId' => $index, 'exerciseId' => $exerciseIndex])); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit">Deletar Exercicio</button>
                    </form>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</body>
</html>
<?php /**PATH D:\César\Desktop\tcc1-main\resources\views/home.blade.php ENDPATH**/ ?>