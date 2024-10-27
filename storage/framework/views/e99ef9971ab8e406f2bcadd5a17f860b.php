<?php $__env->startSection('content'); ?>

<h2>Usuário - <?php echo e($user->nome); ?></h2>

<form action="<?php echo e(route('users.destroy', ['user' => $user->id])); ?>" method="post">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Delete</button>

</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\2024.2sem\tcc\tur\resources\views/user_show.blade.php ENDPATH**/ ?>