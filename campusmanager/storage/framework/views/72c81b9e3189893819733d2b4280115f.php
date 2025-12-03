<?php $__env->startSection('title', 'Studentenliste'); ?>

<?php $__env->startSection('content'); ?>

    <h2>Studentenliste</h2>

    <?php if(session('success')): ?>
        <p class="callout success"><?php echo e(session('success')); ?></p>
    <?php endif; ?>

    <p><a href="<?php echo e(route('students.create')); ?>">Neuen Studenten anlegen</a></p>

    <?php if($students->isEmpty()): ?>
        <p>Es sind noch keine Studenten vorhanden.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>Email</th>
                    <th>Aktion</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($s->id); ?></td>
                        <td><?php echo e($s->firstname); ?></td>
                        <td><?php echo e($s->lastname); ?></td>
                        <td><?php echo e($s->email); ?></td>
                        <td>
                            <p>
                                <a class="btn btn-primary" href="/students/<?php echo e($s->id); ?>">Anzeigen</a>
                                <a class="btn btn-primary" href="/students/<?php echo e($s->id); ?>/edit">Bearbeiten</a>
                            </p>
                            <form action="/students/<?php echo e($s->id); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-danger" type="submit">Löschen</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/marcus/laravel/laravel-grundlagenkurs-kursverlauf-2025-12/campusmanager/resources/views/students/index.blade.php ENDPATH**/ ?>