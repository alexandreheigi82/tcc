<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lunas Tour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
</head>
<body>

<nav>
    <ul>
        <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
        <li><a href="<?php echo e(route('dashboard')); ?>">Painel de Controle</a></li>
        <?php if(Auth::check()): ?>
            <li>
                <form action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit">Logout</button>
                </form>
            </li>
        <?php else: ?>
            <li><a href="<?php echo e(route('login.form')); ?>">Login</a></li>
        <?php endif; ?>
    </ul>
</nav>

<div class="container">
    <?php echo $__env->yieldContent('content'); ?>

</div>



</body>
</html>
<?php /**PATH D:\2024.2sem\tcc\tur\resources\views/master.blade.php ENDPATH**/ ?>