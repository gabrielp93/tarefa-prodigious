

<?php $__env->startSection('title', 'TarefaBank - Transferência'); ?>

<?php $__env->startSection('content_header'); ?>

<style>

    .form-control{
        display: inline-block;
    }

</style>

<h1>Transferência</h1>

<ol class="breadcrumb">
    <li><a href="<?php echo e(route('admin.home')); ?>">Home</a></li>
    <li><a href="<?php echo e(route('admin.balance')); ?>">Saldo</a></li>
    <li><a href="<?php echo e(route('balance.transfer')); ?>">Transferência</a></li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<form method="POST" action="<?php echo e(route('transfer.store')); ?>">
    <?php echo e(csrf_field()); ?>

    <div class="form-group row">
        <div class="col-xs-2">
            <input type="number" name="account" placeholder="Número da Conta" min='0' required class="form-control"> 
        </div>
        <div class="col-xs-2">
            <input type="email" name="emailDest" placeholder="E-mail do Destinatário" min='0' required class="form-control"> 
        </div>
              
    </div>
    <div class="form-group">
            <button type="submit" class="btn btn-warning">Confirma</button>
    </div>
    <?php echo $__env->make('admin.include.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/tarefa/resources/views/admin/balance/transfer.blade.php ENDPATH**/ ?>