
<?php $__env->startSection('title', '商品詳細'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>商品情報ID：<?php echo e($product->id); ?></h2>
        <div style="width: 15rem; float: left; margin: 16px">
            <img src="<?php echo e(Storage::url($product->image)); ?>" style="width: 100%;">
        </div>
        <h2>商品名：<?php echo e($product->product_name); ?></h2>
        <p>メーカー：<?php echo e($product->company->company_name); ?></p>
        <span>価格：<?php echo e($product->price); ?></span>
        <span>在庫数：<?php echo e($product->stock); ?></span>
        <p><?php echo e($product->comment); ?></p>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\product\resources\views/product/detail.blade.php ENDPATH**/ ?>