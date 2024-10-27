<?php $__env->startSection('content'); ?>

<a href="<?php echo e(route('users.create')); ?>">Criar Novo</a>

<hr>

<h2>Users</h2>

<ul>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($user->nome); ?> | <a href="<?php echo e(route('users.edit',['user'=>$user->id])); ?>">Editar</a> </li> |
    <a href="<?php echo e(route('users.show', ['user'=> $user->id])); ?>">Visualizar</a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\2024.2sem\tcc\tur\resources\views/users.blade.php ENDPATH**/ ?>