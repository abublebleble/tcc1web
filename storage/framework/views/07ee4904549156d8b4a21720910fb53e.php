<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Grupo Muscular</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Editar Grupo Muscular</h1>
                
                <!-- Exibição de mensagens de sucesso -->
                <?php if(session('success')): ?>
                    <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-md">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <!-- Exibição de erros de validação -->
                <?php if($errors->any()): ?>
                    <div class="mb-4 px-4 py-3 bg-red-100 text-red-800 rounded-md">
                        <ul class="list-disc pl-5">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('grupos_musculares.update', ['id' => $grupoMuscular->id])); ?>" method="POST" class="space-y-6">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nome do Grupo Muscular:</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="<?php echo e($grupoMuscular->name); ?>" 
                            required 
                            class="w-full border border-gray-300 rounded-lg p-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                        >
                    </div>

                    <div class="flex justify-end">
                        <button 
                            type="submit" 
                            class="px-6 py-3 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-800 transition"
                        >
                            Atualizar Grupo Muscular
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH D:\Users\cesar\Downloads\tcc\tcc1web\resources\views/grupos_musculares/edit.blade.php ENDPATH**/ ?>