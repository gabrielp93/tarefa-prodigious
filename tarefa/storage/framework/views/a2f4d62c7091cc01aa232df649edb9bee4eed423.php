

<?php $__env->startSection('title', 'TarefaBank - Meus Dados'); ?>

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
<h1><strong>Meu Perfil</strong></h1>

<ol class="breadcrumb">
  <li><a href="<?php echo e(route('admin.home')); ?>">Home</a></li>
<li><a href="<?php echo e(route('profile')); ?>">Perfil</a></li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box box-success">
            <?php if(auth()->user()->photo_profile != null): ?>
                <div class="fill"></div>
            <?php else: ?>
                <div class="blank"></div>
            <?php endif; ?>
            
 
    <form  method="POST" action="<?php echo e(route('profile.update')); ?>" enctype="multipart/form-data"> 
        <?php echo e(csrf_field()); ?>

        <div class="box-body">
            <?php echo $__env->make('admin.include.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="form-group">
                <label for="id_name">Nome Completo</label>
                <input type="text" class="form-control" name="name" id="id_name" placeholder="Nome Completo" value="<?php echo e(auth()->user()->name); ?>">
            </div>
          <div class="form-group">
            <label for="id_email">E-mail</label>
            <input type="email" class="form-control" name="email" id="id_email" placeholder="E-mail" value="<?php echo e(auth()->user()->email); ?>">
          </div>
          <div class="form-group">
            <label for="id_photo">Foto de Perfil</label>
            <input type="file"  name="photo_profile" id="id_photo">
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-success">Atualizar Perfil</button>
        </div>
    </form>

    <form method="GET" action="<?php echo e(route('profile.delete')); ?>">
        <div class="box-footer">
          <button type="submit" onclick="return confirm('Tem Certeza de Excluir sua Conta?')" class="btn btn-danger">Excluir Conta</button>
        </div>
    </form>  
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/tarefa/resources/views/admin/profile/index.blade.php ENDPATH**/ ?>