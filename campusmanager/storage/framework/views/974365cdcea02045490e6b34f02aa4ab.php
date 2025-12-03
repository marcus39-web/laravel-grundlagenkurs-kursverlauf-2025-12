<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title', 'Campusmanager'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <div class="page">
        <header class="page-header">
            <h1 class="page-title">Campusmanager</h1>
            <p class="page-subtitle">Laravel-Grundlagenkurs</p>
            <nav class="page-nav">
                <a href="<?php echo e(route('home')); ?>">Start</a>
                <a href="<?php echo e(route('students.index')); ?>">Studenten</a>
                <a href="<?php echo e(route('about')); ?>">Über uns</a>
            </nav>
            <hr>
        </header>

        <main>
            <div class="card"><?php echo $__env->yieldContent('content'); ?></div>
        </main>

        <footer class="page-footer">
            <hr>
            <small>@ <?php echo e(date('Y')); ?> Campusmanager</small>
        </footer>
    </div>
</body>
</html><?php /**PATH /home/marcus/laravel/laravel-grundlagenkurs-kursverlauf-2025-12/campusmanager/resources/views/layouts/app.blade.php ENDPATH**/ ?>