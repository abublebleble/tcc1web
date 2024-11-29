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
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between items-center">
            <?php echo e(__('Treinos Criados')); ?>

            <!-- Botão Criar Treino (alinhado à direita) -->
            <a href="<?php echo e(route('treinos.create')); ?>" class="px-6 py-3 rounded-md text-white font-semibold bg-indigo-600 hover:bg-indigo-800 transition duration-300">
                Criar Treino
            </a>
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <!-- Exibição de mensagem de sucesso -->
                <?php if(session('success')): ?>
                    <div class="alert alert-success mb-4"><?php echo e(session('success')); ?></div>
                <?php endif; ?>

                <!-- Tabela de Treinos -->
                <div class="overflow-x-auto">
                    <table class="table table-striped w-full border-separate border-spacing-2">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left font-semibold text-gray-700">Nome do Treino</th>
                                <th class="px-4 py-2 text-left font-semibold text-gray-700">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $treinos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $treino): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="bg-gray-50 hover:bg-gray-100 transition duration-300">
                                    <td class="px-4 py-2 font-medium text-lg text-gray-800">
                                        <span class="bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full">
                                            <?php echo e($treino->nome_treino); ?>

                                        </span>
                                    </td>
                                    <td class="px-4 py-2 flex space-x-2">
                                        <!-- Botão Editar -->
                                        <a href="<?php echo e(route('treinos.edit', $treino->id)); ?>" class="btn btn-warning px-4 py-2 rounded-md text-white font-semibold bg-yellow-500 hover:bg-yellow-600 transition duration-300">Editar</a>

                                        <!-- Formulário de Exclusão -->
                                        <form action="<?php echo e(route('treinos.destroy', $treino->id)); ?>" method="POST" style="display: inline-block;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger px-4 py-2 rounded-md text-white font-semibold bg-red-600 hover:bg-red-700 transition duration-300">Excluir</button>
                                        </form>

                                        <!-- Botão Adicionar Exercício -->
                                        <a href="<?php echo e(route('treinos_exercicio.create', ['treino_id' => $treino->id])); ?>" class="px-4 py-2 rounded-md text-black font-semibold bg-teal-600 hover:bg-teal-700 transition duration-100">
                                            Adicionar Exercício
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <!-- Botão Voltar para Home com padding superior -->
                <a href="<?php echo e(route('home')); ?>" class="btn btn-secondary px-6 py-3 rounded-md text-white font-semibold bg-gray-800 hover:bg-gray-700 transition duration-300 mt-6">
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
<?php /**PATH /home/alunos/Downloads/tcc1web/resources/views/treinos/index.blade.php ENDPATH**/ ?>