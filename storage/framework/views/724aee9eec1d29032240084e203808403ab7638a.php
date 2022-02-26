
<?php $__env->startSection('title', '商品編集'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>商品編集フォーム</h2>
        <form
            method="POST"
            action="<?php echo e(route('update')); ?>"
            onSubmit="return checkSubmit()"
            enctype="multipart/form-data"
        >
        <?php echo csrf_field(); ?>
            <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
            <div class="form-group">
                <label for="product_name">
                    商品名
                </label>
                <input
                    id="product_name"
                    name="product_name"
                    class="form-control"
                    value="<?php echo e($product->product_name); ?>"
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
                    メーカー：
                </label>
                <select name="company_id" id="company_id">
                    <option value="<?php echo e($product->company_id); ?>" selected>
                        <?php echo e($product->company->company_name); ?>

                    </option>
                    <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($company->id); ?>">
                            <?php echo e($company->company_name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="price">
                    価格
                </label>
                <input
                    id="price"
                    name="price"
                    class="form-control"
                    value="<?php echo e($product->price); ?>"
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
                    value="<?php echo e($product->stock); ?>"
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
                    コメント
                </label>
                <textarea
                    id="comment"
                    name="comment"
                    class="form-control"
                    rows="4"
                ><?php echo e($product->comment); ?></textarea>
                <?php if($errors->has('comment')): ?>
                    <div class="text-danger" >
                        <?php echo e($errors->first('comment')); ?>

                    </div>
                <?php endif; ?>
            </div>            
            <div class="form-group">
                <label for="image">
                    商品画像
                </label>
                <div style="width: 15rem; margin: 16px">                
                    <img src="<?php echo e(Storage::url($product->image)); ?>" style="width: 100%;">
                </div>
                <input 
                    id="image"
                    name="image"
                    class="form-control"
                    value="<?php echo e(old('image')); ?>"
                    type="file"
                >
                <?php if($errors->has('image')): ?>
                    <div class="text-danger" >
                        <?php echo e($errors->first('image')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="mt-5">
                <a class="btn btn-secondary" href="<?php echo e(route('products')); ?>">
                    キャンセル
                </a>
                <button type="submit" class="btn btn-primary">
                    更新する
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(window.confirm('更新してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\product\resources\views/product/edit.blade.php ENDPATH**/ ?>