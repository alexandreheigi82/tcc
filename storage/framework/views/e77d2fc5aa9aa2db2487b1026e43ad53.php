<?php $__env->startSection('content'); ?>
    <h1>Pacotes de Turismo</h1>

    <?php if(session('message')): ?>
        <div class="alert alert-success">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?>

    <ul>
        <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <h3><?php echo e($package->titulo); ?></h3>
                <p><?php echo e($package->descricao); ?></p>
                <p>Valor: <?php echo e($package->valor); ?></p>
                <p>Vagas: <?php echo e($package->vagas); ?></p>
                <?php if($package->imagem): ?>
                    <img src="<?php echo e(asset('storage/' . $package->imagem)); ?>" alt="<?php echo e($package->titulo); ?>" width="200">
                <?php endif; ?>
                <br>
                <a href="<?php echo e(route('packages.show', ['package' => $package->id])); ?>">Ver Detalhes</a>
                <br>
                <a href="<?php echo e($package->link); ?>" target="_blank">Fale conosco</a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\2024.2sem\tcc\tur\resources\views/home.blade.php ENDPATH**/ ?>