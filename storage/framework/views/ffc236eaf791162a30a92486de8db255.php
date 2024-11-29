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
            <?php echo e(__('Lista de Exercícios por Treino')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <?php if(session('success')): ?>
                    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                <?php endif; ?>

                <a href="<?php echo e(route('treinos.create')); ?>" class="btn btn-primary mb-3">Criar Treino</a>
                <a href="<?php echo e(route('treinos_exercicio.create')); ?>" class="btn btn-info mb-3">Adicionar Exercício</a>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Treino</th>
                            <th>Exercício</th>
                            <th>Ordem</th>
                            <th>Séries</th>
                            <th>Repetições</th>
                            <th>Carga</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $treinosExercicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $treinos_exercicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($treinos_exercicio->id); ?></td>
                                <td><?php echo e($treinos_exercicio->treino->nome_treino); ?></td>
                                <td><?php echo e($treinos_exercicio->exercicio->nome_exercicio); ?></td>
                                <td><?php echo e($treinos_exercicio->ordem); ?></td>
                                <td><?php echo e($treinos_exercicio->series); ?></td>
                                <td><?php echo e($treinos_exercicio->repeticoes); ?></td>
                                <td><?php echo e($treinos_exercicio->carga); ?></td>
                                <td>
                                    <a href="<?php echo e(route('treinos_exercicio.edit', ['treinos_exercicio' => $treinos_exercicio->id])); ?>" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="<?php echo e(route('treinos_exercicio.destroy', ['treinos_exercicio' => $treinos_exercicio->id])); ?>" method="POST" style="display:inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

                <a href="<?php echo e(route('home')); ?>" class="btn btn-secondary mt-3">Voltar para Home</a>
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
<?php /**PATH /home/alunos/Downloads/tcc1web/resources/views/treinos_exercicio/index.blade.php ENDPATH**/ ?>