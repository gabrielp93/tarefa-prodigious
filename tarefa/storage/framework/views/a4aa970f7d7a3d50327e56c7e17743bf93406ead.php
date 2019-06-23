

<?php $__env->startSection('title', 'TarefaBank - Trocar de Senha'); ?>

<?php $__env->startSection('content_header'); ?>


<h1><strong>Trocar de Senha</strong></h1>

<ol class="breadcrumb">
    <li><a href="<?php echo e(route('admin.home')); ?>">Home</a></li>
    <li><a href="<?php echo e(route('profile.changepwd')); ?>">Mudar Senha</a></li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box box-success">

            
 
    <form  method="POST" action="<?php echo e(route('changepwd.store')); ?>" > 
        <?php echo e(csrf_field()); ?>

        <div class="box-body">
            <?php echo $__env->make('admin.include.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="form-group">
                <label for="id_pwd1">Nova Senha</label>
                <input type="password" class="form-control" name="pwd1" id="id_pwd1" pattern=".{8,}" title="Mínimo de 8 caracteres" placeholder="Nova Senha">
            </div>
          <div class="form-group">
            <label for="id_pwd2">Repetir a Senha</label>
            <input type="password" class="form-control" name="pwd2" id="id_pwd2" pattern=".{8,}" title="Mínimo de 8 caracteres" placeholder="Confirmar Senha">
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-success">Confirmar</button>
        </div>
    </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/tarefa/resources/views/admin/profile/changeConfirm.blade.php ENDPATH**/ ?>