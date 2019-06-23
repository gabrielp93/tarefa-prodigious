<?php $__env->startSection('title', 'TarefaBank - Painel'); ?>

<?php $__env->startSection('content_header'); ?>

<style>
        .fill {
            width: 200px;
            height: 200px;
            border: #00a65a solid 2px;
            background-image:url('../storage/users/<?php echo e(auth()->user()->photo_profile); ?>');
            background-position: 50% 50%;
            margin: auto;
            margin-top: 10px; 
            border-radius: 50%;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .blank {
            width: 200px;
            height: 200px;
            border: #00a65a solid 2px;
            background-image:url('../storage/users/blank-profile.png');
            background-position: 50% 50%;
            margin: auto;
            margin-top: 10px; 
            border-radius: 50%;
            background-size: cover;
            background-repeat: no-repeat;
        }

</style>
<h1>Bem-vindo(a) <?php echo e($name); ?></h1>

<ol class="breadcrumb">
    <li><a href="<?php echo e(route('admin.home')); ?>">Home</a></li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <p>Você está <i>logado(a)!</i></p>
    <?php if(auth()->user()->photo_profile != null): ?>
    <div class="fill"></div>
    <?php else: ?>
    <div class="blank"></div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/tarefa/resources/views/admin/home/index.blade.php ENDPATH**/ ?>