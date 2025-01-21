<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Exercício</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h1 class="text-2xl font-semibold text-gray-800 mb-6">Editar Exercício</h1>

                <?php if($errors->any()): ?>
                    <div class="mb-4 px-4 py-3 bg-red-100 text-red-800 rounded-md">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('exercicios.update', $exercicio->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="mb-6">
                        <label for="nome_exercicio" class="block text-sm font-medium text-gray-700 mb-2">Nome do Exercício:</label>
                        <input type="text" id="nome_exercicio" name="nome_exercicio" 
                               value="<?php echo e($exercicio->nome_exercicio); ?>" 
                               class="w-full border border-gray-300 rounded-lg p-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" 
                               required>
                    </div>

                    <div class="mb-6">
                        <label for="descricao" class="block text-sm font-medium text-gray-700 mb-2">Descrição:</label>
                        <textarea id="descricao" name="descricao" rows="4" 
                                  class="w-full border border-gray-300 rounded-lg p-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"><?php echo e($exercicio->descricao); ?></textarea>
                    </div>

                    <div class="mb-6">
                        <label for="id_grupo_muscular" class="block text-sm font-medium text-gray-700 mb-2">Grupo Muscular:</label>
                        <select id="id_grupo_muscular" name="id_grupo_muscular" 
                                class="w-full border border-gray-300 rounded-lg p-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" 
                                required>
                            <option value="">Selecione um grupo muscular</option>
                            <?php $__currentLoopData = $gruposMusculares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupoMuscular): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($grupoMuscular->id); ?>" <?php echo e($grupoMuscular->id == $exercicio->id_grupo_muscular ? 'selected' : ''); ?>>
                                    <?php echo e($grupoMuscular->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-800 transition duration-300">
                            Atualizar Exercício
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH D:\Users\cesar\Downloads\tcc\tcc1web\resources\views/exercicios/edit.blade.php ENDPATH**/ ?>