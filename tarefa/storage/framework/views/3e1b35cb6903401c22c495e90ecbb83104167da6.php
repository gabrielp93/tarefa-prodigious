

<?php $__env->startSection('title', 'TarefaBank - Extrato'); ?>

<?php $__env->startSection('content_header'); ?>

<h1>Extrato</h1>

<ol class="breadcrumb">
        <li><a href="<?php echo e(route('admin.home')); ?>">Home</a></li>
        <li><a href="<?php echo e(route('admin.historic')); ?>">Extrato</a></li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="box box-success">
        <div class="box-header">
                <form method="POST" action="<?php echo e(route('historic.search')); ?>">
                <?php echo e(csrf_field()); ?> <!-- obrigado para metodo post -->
                        <div class="form-group row">
                                <div class="col-xs-2">
                                        <label for="date_id"> Filtro por Data: </label> 
                                        <input type="date" name="date" id='date_id' class="form-control"> 
                                </div>
                                <div class="col-xs-2">
                                        <label for="type_id"> Filtro por Tipo: </label>
                                        <select name="type" id='type_id' class="form-control">
                                                <option value="">Selecione Tipo</option>
                                                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($key); ?>"><?php echo e($type); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                </div>
                        </div> 
                        <button type="submit" class="btn btn-primary">Pesquisar</a> 
                </form>
        </div>
        <div class="box-body">

                <table class="table table-hover">
                        <thead>
                                <tr class="success">
                                        <th>Valor</th>
                                        <th>Tipo</th>
                                        <th>Data</th>
                                        <th>Destinatário</th>
                                </tr>
                        </thead>
                        <tbody>
                                <?php $__currentLoopData = $extracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                                <td>R$ <?php echo e(number_format($extract->amount,2,',','')); ?></td>
                                                <td><?php echo e($extract->typeFormat($extract->type)); ?></td>
                                                <td><?php echo e(date("d/m/Y (H:i:s)",strtotime($extract->created_at))); ?></td>
                                                <td>
                                                        <?php if($extract->user_id_trans): ?>
                                                                <?php echo e($extract->userTransfer->name); ?>    
                                                        <?php else: ?>
                                                                -
                                                        <?php endif; ?>
                                                        
                                                </td>
                                        </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                </table>
                <?php if(isset($allFilterData)): ?>
                        <?php echo e($extracts->appends($allFilterData)->links()); ?> <!-- paginacao com filtro --> 
                <?php else: ?>
                        <?php echo e($extracts->links()); ?> <!-- paginacao --> 
                <?php endif; ?>

                
        </div>

</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/tarefa/resources/views/admin/balance/historic.blade.php ENDPATH**/ ?>