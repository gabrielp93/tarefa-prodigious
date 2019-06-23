

<?php $__env->startSection('title', 'TarefaBank - Saque'); ?>

<?php $__env->startSection('content_header'); ?>

<h1>Saque</h1>

<ol class="breadcrumb">
        <li><a href="<?php echo e(route('admin.home')); ?>">Home</a></li>
        <li><a href="<?php echo e(route('admin.balance')); ?>">Saldo</a></li>
        <li><a href="<?php echo e(route('balance.draw')); ?>">Saque</a></li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<form method="POST" action="<?php echo e(route('draw.store')); ?>">
    <?php echo e(csrf_field()); ?>

    <div class="form-group">
            <input type="number" name="amount" placeholder="Valor do Saque" min='0' step='.01' required class="form-control">       
    </div>
    <div class="form-group">
            <button type="submit" class="btn btn-danger">Sacar</button>
    </div>
    <?php echo $__env->make('admin.include.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/tarefa/resources/views/admin/balance/draw.blade.php ENDPATH**/ ?>