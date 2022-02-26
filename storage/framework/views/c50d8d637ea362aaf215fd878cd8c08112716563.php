
<?php $__env->startSection('title', '商品登録'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>商品登録フォーム</h2>
        <form
            method="POST"
            action="<?php echo e(route('store')); ?>"
            onSubmit="return checkSubmit()"
            enctype="multipart/form-data"
        >
        <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="product_name">
                    商品名
                </label>
                <input
                    id="product_name"
                    name="product_name"
                    class="form-control"
                    value="<?php echo e(old('product_name')); ?>"
                    type="text"
                >
                <?php if($errors->has('product_name')): ?>
                    <div class="text-danger">
                        <?php echo e($errors->first('product_name')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="company_id">
                    メーカー
                </label>
                <select
                    name="company_id"
                    id="company_id"
                    value="<?php echo e(old('company_id')); ?>"
                >
                    <option value=""> - 選択してください - </option>
                    <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($company->id); ?>">
                            <?php echo e($company->company_name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('company_id')): ?>
                    <div class="text-danger">
                        <?php echo e($errors->first('company_id')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="price">
                    価格
                </label>
                <input
                    id="price"
                    name="price"
                    class="form-control"
                    value="<?php echo e(old('price')); ?>"
                    type="number"                    
                >
                <?php if($errors->has('price')): ?>
                    <div class="text-danger">
                        <?php echo e($errors->first('price')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="stock">
                    在庫数
                </label>
                <input
                    id="stock"
                    name="stock"
                    class="form-control"
                    value="<?php echo e(old('stock')); ?>"
                    type="number"
                >
                <?php if($errors->has('stock')): ?>
                    <div class="text-danger">
                        <?php echo e($errors->first('stock')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="comment">
                    商品説明
                </label>
                <textarea
                    id="comment"
                    name="comment"
                    class="form-control"
                    rows="4"
                ><?php echo e(old('comment')); ?></textarea>
            </div>
            <div class="form-group">
                <label for="image">
                    商品画像
                </label>
                <input 
                    id="image"
                    name="image"
                    class="form-control"
                    value="<?php echo e(old('image')); ?>"
                    type="file"
                >
                <?php if($errors->has('image')): ?>
                    <div class="text-danger">
                        <?php echo e($errors->first('image')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="mt-5">
                <a class="btn btn-secondary" href="<?php echo e(route('products')); ?>">
                    キャンセル
                </a>
                <button type="submit" class="btn btn-primary">
                    登録する
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(window.confirm('送信してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\product\resources\views/product/form.blade.php ENDPATH**/ ?>