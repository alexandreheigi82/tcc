<?php $__env->startSection('content'); ?>
use Illuminate\Support\Facades\Auth;

    <?php if(Auth::check()): ?>
        <h2>Bem-vindo, <?php echo e(Auth::user()->nome); ?></h2>
        <form action="<?php echo e(route('logout')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button type="submit">Logout</button>
        </form>
    <?php else: ?>
        <h2>Bem-vindo, visitante</h2>
        <a href="<?php echo e(route('login.form')); ?>">Login</a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\2024.2sem\tcc\tur\resources\views/home.blade.php ENDPATH**/ ?>