<?php $__env->startSection('content'); ?>

<h2>Criar Novo</h2>

<?php if(session()->has('message')): ?>
<?php echo e(session()->get('message')); ?>

<?php endif; ?>

<form action="<?php echo e(route('users.store')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <input type="text" name="nome" placeholder="Nome">
    <input type="text" name="sobrenome" placeholder="Sobrenome">
    <input type="text" name="email" placeholder="e-mail">
    <input type="text" name="senha" placeholder="Senha">
    <button type="submit">Criar Novo</button>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\2024.2sem\tcc\tur\resources\views/user_create.blade.php ENDPATH**/ ?>