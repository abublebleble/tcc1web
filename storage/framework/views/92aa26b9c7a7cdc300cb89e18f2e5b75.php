<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Lista de Progressos')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <!-- Incluindo o arquivo cards.css -->
    <link rel="stylesheet" href="<?php echo e(asset('css/cards.css')); ?>">
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>

    <!-- Botões principais -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-between">
            <a href="<?php echo e(route('progresso.create')); ?>" class="px-6 py-3 rounded-md text-white font-semibold bg-indigo-600 hover:bg-indigo-800 transition duration-300 ml-auto">
                Adicionar Progresso
            </a>
        </div>
    </div>

    <!-- Filtro de Progressos -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <form action="<?php echo e(route('progresso.index')); ?>" method="GET" class="flex gap-4 items-center justify-center max-w-3xl mx-auto">
            <div class="flex flex-col w-1/3">
                <label for="exercicio" class="text-sm font-semibold text-gray-700">Escolher Exercício</label>
                <select name="exercicio" id="exercicio" class="px-4 py-2 border rounded-md mt-1">
                    <option value="">Selecione um exercício</option>
                    <?php $__currentLoopData = $exercicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exercicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($exercicio->id); ?>" <?php echo e(request('exercicio') == $exercicio->id ? 'selected' : ''); ?>>
                            <?php echo e($exercicio->nome_exercicio); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="flex flex-col w-1/3">
                <label for="data" class="text-sm font-semibold text-gray-700">Data</label>
                <select name="data" id="data" class="px-4 py-2 border rounded-md mt-1">
                    <option value="">Selecione uma data</option>
                    <?php $__currentLoopData = $datasComProgressos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($data->data); ?>" <?php echo e(request('data') == $data->data ? 'selected' : ''); ?>>
                            <?php echo e(\Carbon\Carbon::parse($data->data)->format('d/m/Y')); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <button type="submit" class="px-6 py-3 rounded-md text-white font-semibold bg-indigo-600 hover:bg-indigo-800 transition duration-300 w-1/3">
                Filtrar
            </button>
        </form>
    </div>

    <!-- Lista de progressos -->
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <?php if(session('success')): ?>
                    <div class="alert alert-success mb-4 p-4 bg-green-100 text-green-800 rounded-md"><?php echo e(session('success')); ?></div>
                <?php endif; ?>

                <table class="table-auto w-full text-left border-collapse mb-6">
                    <thead>
                        <tr>
                            <th class="py-3 px-4 text-sm font-semibold text-gray-700 border-b">Exercício</th>
                            <th class="py-3 px-4 text-sm font-semibold text-gray-700 border-b">Data</th>
                            <th class="py-3 px-4 text-sm font-semibold text-gray-700 border-b">Carga</th>
                            <th class="py-3 px-4 text-sm font-semibold text-gray-700 border-b">Repetições Realizadas</th>
                            <th class="py-3 px-4 text-sm font-semibold text-gray-700 border-b">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $progressos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $progresso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="py-3 px-4 border-b"><?php echo e($progresso->treinoExercicio->exercicio->nome_exercicio ?? 'Exercício não encontrado'); ?></td>
                                <td class="py-3 px-4 border-b"><?php echo e($progresso->data); ?></td>
                                <td class="py-3 px-4 border-b"><?php echo e($progresso->carga); ?></td>
                                <td class="py-3 px-4 border-b"><?php echo e($progresso->repeticoes_realizadas); ?></td>
                                <td class="py-3 px-4 border-b">
                                    <!-- Botão Editar -->
                                    <a href="<?php echo e(route('progresso.edit', $progresso->id)); ?>" class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-3 py-2 me-2 mb-2">
                                        Editar
                                    </a>
                                    <!-- Botão Excluir -->
                                    <form action="<?php echo e(route('progresso.destroy', $progresso->id)); ?>" method="POST" style="display:inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 me-2 mb-2">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

                <a href="<?php echo e(route('home')); ?>" class="px-6 py-3 rounded-md text-white font-semibold bg-gray-600 hover:bg-gray-700 transition duration-300 mt-3 inline-block">
                    Voltar para Home
                </a>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH D:\Users\cesar\Downloads\tcc\tcc1web\resources\views/progresso/index.blade.php ENDPATH**/ ?>