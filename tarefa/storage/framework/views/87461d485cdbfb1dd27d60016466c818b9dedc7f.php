

<?php $__env->startSection('title', 'TarefaBank - Confirmação'); ?>

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

<div class="box">
    <div class="box-header">
    <p>Transferência será realizada para o Usuário <strong><?php echo e($receiver->name); ?></strong></p>
    <p>Saldo Disponível: <strong>R$ <?php echo e(number_format($balance,'2')); ?></strong></p>
    </div>    

    <div class="box-body">
        <form method="POST" action="<?php echo e(route('transfer.confirm')); ?>">
            <?php echo e(csrf_field()); ?>


            <input type="hidden" name="receiverId" value="<?php echo e($receiver->id); ?>">

            <div class="form-group row">
                <div class="col-xs-2">
                    <input type="number" name="amount" placeholder="Valor da Transferência" min='0' step='.01' required class="form-control"> 
                </div>          
            </div>
            <div class="form-group">
                    <button type="submit" class="btn btn-warning">Confirma</button>
            </div>
            <?php echo $__env->make('admin.include.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
            
        </form>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/tarefa/resources/views/admin/balance/transferConfirm.blade.php ENDPATH**/ ?>