<?php $__env->startSection('title', 'Startseite'); ?>

<?php $__env->startSection('content'); ?>
    <h2>Infos über <?php echo e($student->firstname); ?> <?php echo e($student->lastname); ?></h2>
    
    
      <p>
        Matrikelnummer: <strong><?php echo e($student->matriculation_number); ?></strong><br>
        E-Mail-Adresse: <strong><?php echo e($student->email); ?></strong><br>
        Alter: <strong><?php echo e($student->age); ?></strong><br>
        angelegt am: <strong><?php echo e($student->created_at); ?></strong><br>
        geändert am: <strong><?php echo e($student->updated_at); ?></strong><br>
      </p>
      <p>
        <?php echo e($student->firstname); ?> <?php echo e($student->lastname); ?>:<br>
        <a class="btn btn-primary" href="/students/<?php echo e($student->id); ?>/edit">ändern</a>
        <form action="/students/<?php echo e($student->id); ?>" method="post">
          <?php echo csrf_field(); ?>
          <?php echo method_field('DELETE'); ?>
          <button type="submit" class="btn btn-danger">Löschen</button>
        </form>
      </p>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/marcus/laravel/laravel-grundlagenkurs-kursverlauf-2025-12/campusmanager/resources/views/students/show.blade.php ENDPATH**/ ?>