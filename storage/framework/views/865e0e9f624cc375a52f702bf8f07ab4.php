<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Treino Exercício</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden p-6">
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight mb-6">
                    Editar Treino Exercício
                </h2>

                <form action="<?php echo e(route('treinos_exercicio.update', ['treinos_exercicio' => $treinos_exercicio->id])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="mb-6">
                        <label for="id_treino" class="block text-sm font-medium text-gray-700 mb-2">
                            Treino:
                        </label>
                        <select name="id_treino" required 
                                class="w-full border border-gray-300 rounded-lg p-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                            <?php $__currentLoopData = $treinos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $treino): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($treino->id); ?>" <?php echo e($treinos_exercicio->id_treino == $treino->id ? 'selected' : ''); ?>>
                                    <?php echo e($treino->nome_treino); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="id_exercicio" class="block text-sm font-medium text-gray-700 mb-2">
                            Exercício:
                        </label>
                        <select name="id_exercicio" required 
                                class="w-full border border-gray-300 rounded-lg p-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                            <?php $__currentLoopData = $exercicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exercicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($exercicio->id); ?>" <?php echo e($treinos_exercicio->id_exercicio == $exercicio->id ? 'selected' : ''); ?>>
                                    <?php echo e($exercicio->nome_exercicio); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="ordem" class="block text-sm font-medium text-gray-700 mb-2">
                            Ordem:
                        </label>
                        <input type="number" name="ordem" value="<?php echo e($treinos_exercicio->ordem); ?>" required
                               class="w-full border border-gray-300 rounded-lg p-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    </div>

                    <div class="mb-6">
                        <label for="series" class="block text-sm font-medium text-gray-700 mb-2">
                            Séries:
                        </label>
                        <input type="number" name="series" value="<?php echo e($treinos_exercicio->series); ?>" required
                               class="w-full border border-gray-300 rounded-lg p-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    </div>

                    <div class="mb-6">
                        <label for="repeticoes" class="block text-sm font-medium text-gray-700 mb-2">
                            Repetições:
                        </label>
                        <input type="number" name="repeticoes" value="<?php echo e($treinos_exercicio->repeticoes); ?>" required
                               class="w-full border border-gray-300 rounded-lg p-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    </div>

                    <div class="mb-6">
                        <label for="carga" class="block text-sm font-medium text-gray-700 mb-2">
                            Carga:
                        </label>
                        <input type="number" step="0.01" name="carga" value="<?php echo e($treinos_exercicio->carga); ?>" required
                               class="w-full border border-gray-300 rounded-lg p-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    </div>

                    <div class="flex items-center justify-between mt-8">
                        <button type="submit" class="px-6 py-3 rounded-md text-white font-semibold bg-indigo-600 hover:bg-indigo-800 transition duration-300">
                            Atualizar Exercício
                        </button>
                        <a href="<?php echo e(route('treinos_exercicio.index')); ?>" 
                           class="px-6 py-3 rounded-md text-white font-semibold bg-gray-800 hover:bg-gray-700 transition duration-300">
                            Voltar para a Lista de Exercícios
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
<?php /**PATH D:\Users\cesar\Downloads\tcc\tcc1web\resources\views/treinos_exercicio/edit.blade.php ENDPATH**/ ?>