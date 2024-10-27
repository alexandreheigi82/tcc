<?php $__env->startSection('content'); ?>

<h2>Edit</h2>

<?php if(session()->has('message')): ?>
<?php echo e(session()->get('message')); ?>

<?php endif; ?>

<form action="<?php echo e(route('users.update',['user'=>$user->id])); ?>" method="post">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="nome" value="<?php echo e($user->nome); ?>">
    <input type="text" name="sobrenome" value="<?php echo e($user->sobrenome); ?>">
    <input type="text" name="email" value="<?php echo e($user->email); ?>">
    <input type="text" name="senha" value="<?php echo e($user->senha); ?>">
    <button type="submit">Update</button>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\2024.2sem\tcc\tur\resources\views/user_edit.blade.php ENDPATH**/ ?>