 <!-- Certifique-se de que a estrutura base está sendo seguida -->

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h3>Comparação de Progresso para o exercício: <?php echo e($exercicio->nome_exercicio); ?></h3>
        
        <!-- Exibe mensagem de erro se não houver progressos -->
        <?php if(session('errors')): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Formulário para escolher o exercício e as datas -->
        <form action="<?php echo e(route('progresso.compare')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="exercicio">Escolha o Exercício</label>
                <select name="exercicio" id="exercicio" class="form-control" required>
                    <option value="<?php echo e($exercicio->id); ?>" selected><?php echo e($exercicio->nome_exercicio); ?></option>
                </select>
            </div>

            <div class="form-group">
                <label for="data1">Data 1</label>
                <input type="date" name="data1" id="data1" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="data2">Data 2</label>
                <input type="date" name="data2" id="data2" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Comparar</button>
        </form>

        <!-- Exibe os resultados da comparação, se disponíveis -->
        <?php if(isset($progressoData1)): ?> 
            <div class="mt-4">
                <h4>Resultados da Comparação:</h4>
                <p><strong>Data 1:</strong> <?php echo e($progressoData1->data); ?></p>
                <p><strong>Carga Data 1:</strong> <?php echo e($progressoData1->carga); ?> kg</p>
                <p><strong>Repetições Data 1:</strong> <?php echo e($progressoData1->repeticoes_realizadas); ?></p>
                
                <p><strong>Data 2:</strong> <?php echo e($progressoData2->data); ?></p>
                <p><strong>Carga Data 2:</strong> <?php echo e($progressoData2->carga); ?> kg</p>
                <p><strong>Repetições Data 2:</strong> <?php echo e($progressoData2->repeticoes_realizadas); ?></p>

                <h5>Diferenças:</h5>
                <p><strong>Diferença de Carga:</strong> <?php echo e($diferencaCarga); ?> kg</p>
                <p><strong>Diferença de Repetições:</strong> <?php echo e($diferencaRepeticoes); ?> repetições</p>
            </div>
        <?php endif; ?>

        <!-- Exibe as datas com progressos para o exercício -->
        <?php if(isset($datasComProgressos) && $datasComProgressos->count() > 0): ?>
            <div class="mt-4">
                <h5>Datas com progressos para este exercício:</h5>
                <ul>
                    <?php $__currentLoopData = $datasComProgressos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($data->data); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php else: ?>
            <p><strong>Não há progressos registrados para este exercício.</strong></p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\cesar\Downloads\tcc\tcc1web\resources\views/progresso/comparar.blade.php ENDPATH**/ ?>