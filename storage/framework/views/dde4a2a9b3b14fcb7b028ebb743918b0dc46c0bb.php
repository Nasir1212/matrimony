
<?php $__env->startSection("content"); ?>

<section class="breadcrumbs bg-primary py-5">
<div class="container">
<div class="row">
<div class="col-xl-12">
<div class="breadcrumbs-title">
<h4 class="text-light"> পছন্দের বায়োডাটা </h4>
</div>
</div>
</div>
</div>
</section>



<section class="profile-section py-5">
<div class="container">
<div class="row">
<div class="col-xl-4">
    <?php $__env->startComponent("component/profile_card"); ?><?php echo $__env->renderComponent(); ?>
</div>
<div class="col-md-8">
    <?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>
<div class="table-header text-center">
<h3>পছন্দের তালিকা</h3>
</div>
<div class="favorite-table pt-20 table-responsive">
<table class="table align-middle w-100 table-stripped justify-content-center text-center">
<thead>
<tr>
<th scope="col">ক্র.নং</th>
<th scope="col">বায়োডাটা নাম</th>
<th scope="col">লিঙ্গ</th>
<th scope="col">এ্যাকশন</th>
</tr>
</thead>
<tbody>
    <?php $i=0 ?>
    <?php $__currentLoopData = App\Http\Controllers\home_controller::show_favorite(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


<tr id="delete_row_3318">
<th scope="row"><?php echo e(++$i); ?></th>
<td><a href="/show_biodata/<?php echo e($data->user_table_id); ?>" target><?php echo e($data->user_name); ?></a></td>
<td><span class="badge badge primary bg-primary text-light"><?php if($data->biodata_type=="1"): ?> পুরুষ <?php else: ?>  নারী <?php endif; ?></span></td>
<td><a href="/delete_favorite/<?php echo e($data->favorite_id); ?>" class="text-center data-delete" data-id="3318"><i class="fa fa-trash text-danger"></i></a></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("master.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ordhang1/public_html/resources/views/pages/favoritelist.blade.php ENDPATH**/ ?>