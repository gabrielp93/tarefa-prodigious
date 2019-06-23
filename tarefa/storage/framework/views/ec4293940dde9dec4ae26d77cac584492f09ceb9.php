<?php if(session('success')): ?>
    <div class="alert alert-success">
        <p style="text-align:center"><strong><?php echo e(session('success')); ?></strong></p>
    </div>   
<?php endif; ?>

<?php if(session('fail')): ?>
    <div class="alert alert-danger">
        <p style="text-align:center"><strong><?php echo e(session('fail')); ?></strong></p>
    </div>   
<?php endif; ?>
<?php /**PATH /var/www/tarefa/resources/views/admin/include/messages.blade.php ENDPATH**/ ?>