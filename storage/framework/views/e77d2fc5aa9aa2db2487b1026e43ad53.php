<?php $__env->startSection('content'); ?>
    <?php if(Auth::check()): ?>
        <h2>Bem-vindo, <?php echo e(Auth::user()->nome); ?></h2>
        <form action="<?php echo e(route('logout')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button type="submit">Logout</button>
        </form>
        <a href="<?php echo e(route('packages.create')); ?>">Criar Pacote de Turismo</a>
        <a href="<?php echo e(route('packages.index')); ?>">Ver Pacotes de Turismo</a>
        <a href="<?php echo e(route('clients.create')); ?>">Cadastrar Novo Cliente</a>

        <h2>Pacotes Disponíveis</h2>
        <?php if($packages->isNotEmpty()): ?>
            <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($package->situacao): ?>
                    <div>
                        <h3><?php echo e($package->titulo); ?></h3>
                        <p><?php echo e($package->descricao); ?></p>
                        <p>Valor: <?php echo e($package->valor); ?></p>
                        <p>Vagas: <?php echo e($package->vagas); ?></p>
                        <?php if($package->imagem): ?>
                            <img src="<?php echo e(asset('storage/' . $package->imagem)); ?>" alt="<?php echo e($package->titulo); ?>" width="200">
                        <?php endif; ?>
                        <a href="<?php echo e($package->link); ?>">Link: Fale conosco </a>
                        <br>
                        <a href="<?php echo e(route('packages.show', ['package' => $package->id])); ?>">Detalhes</a>
                        <a href="<?php echo e(route('packages.edit', ['package' => $package->id])); ?>">Editar</a>
                        <form action="<?php echo e(route('packages.destroy', ['package' => $package->id])); ?>" method="POST" style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este pacote?')">Excluir</button>
                        </form>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p>Nenhum pacote disponível.</p>
        <?php endif; ?>

    <?php else: ?>
        <h2>Bem-vindo, visitante</h2>
        <a href="<?php echo e(route('login.form')); ?>">Login</a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\2024.2sem\tcc\tur\resources\views/home.blade.php ENDPATH**/ ?>