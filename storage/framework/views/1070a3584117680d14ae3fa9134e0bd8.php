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
                <?php echo e(__('Editar Treino')); ?>

                <!-- Botão Criar Treino (alinhado à direita) -->
                
            </h2>
         <?php $__env->endSlot(); ?>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">

                    <!-- Exibição de mensagem de sucesso -->
                    <?php if(session('success')): ?>
                        <div class="alert alert-success mb-4"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>

                    <!-- Formulário para Editar Treino -->
                    <form action="<?php echo e(route('treinos.update', $treino->id)); ?>" method="POST" class="space-y-4">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div>
                            <label for="nome_treino" class="block text-lg font-semibold text-gray-700">Nome do Treino:</label>
                            <input type="text" name="nome_treino" value="<?php echo e($treino->nome_treino); ?>" required
                                class="w-full px-4 py-2 border rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        </div>

                        <div class="flex justify-end space-x-4">
                            <button type="submit" class="px-6 py-3 rounded-md text-white font-semibold bg-indigo-600 hover:bg-indigo-800 transition duration-300">
                                Atualizar Treino
                            </button>
                            <a href="<?php echo e(route('treinos.index')); ?>" class="px-6 py-3 rounded-md text-gray-800 font-semibold bg-gray-200 hover:bg-gray-300 transition duration-300">
                                Cancelar
                            </a>
                        </div>
                    </form>

                    <!-- Botão Voltar para Home -->
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
<?php /**PATH D:\Users\cesar\Downloads\tcc\tcc1web\resources\views/treinos/edit.blade.php ENDPATH**/ ?>