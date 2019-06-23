<?php $__env->startSection('title', 'TarefaBank - Saldo'); ?>

<?php $__env->startSection('content_header'); ?>
    
  <style>
    div#operacoes{
      padding: 10px;
    }
  </style>

  <h1>Bem-vindo(a) <?php echo e($name); ?>!</h1>

  <ol class="breadcrumb">
    <li><a href="<?php echo e(route('admin.home')); ?>">Home</a></li>
    <li><a href="<?php echo e(route('admin.balance')); ?>">Saldo</a></li>
  </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="small-box bg-green">
      <div class="inner">
        <h3>R$ <?php echo e(number_format($balance, 2,',','')); ?></h3>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
        <a href="<?php echo e(route('admin.historic')); ?>" class="small-box-footer">Extrato <i class="fa fa-arrow-circle-right"></i></a>
    </div>
    <div id="operacoes">
      <?php if($balance > 0): ?>
        <a href="<?php echo e(route('balance.transfer')); ?>" class="btn btn-warning">Transferir</a> 
      <?php endif; ?>
      <a href="<?php echo e(route('balance.deposit')); ?>" class="btn btn-primary">Depositar</a>
      <?php if($balance > 0): ?>
        <a href="<?php echo e(route('balance.draw')); ?>" class="btn btn-danger">Sacar</a>
      <?php endif; ?>
    </div>

    <?php echo $__env->make('admin.include.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/tarefa/resources/views/admin/balance/index.blade.php ENDPATH**/ ?>