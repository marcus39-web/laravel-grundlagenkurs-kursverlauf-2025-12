<?php $__env->startSection('title', 'Startseite'); ?>

<?php $__env->startSection('content'); ?>
    <h2><?php echo e($headline); ?></h2>
    <p>Heutiges Datum: <?php echo e($heute); ?></p>
    <p>Dies ist die erste Seite deines Laravel-Projektes.</p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/marcus/laravel/laravel-grundlagenkurs-kursverlauf-2025-12/campusmanager/resources/views/home.blade.php ENDPATH**/ ?>