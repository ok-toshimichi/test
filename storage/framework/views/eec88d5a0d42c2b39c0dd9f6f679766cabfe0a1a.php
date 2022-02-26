
<?php $__env->startSection('title', '商品一覧'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-10 col-md-offset-2">
      <h2 style="float: left;">商品一覧</h2>
      <?php if(session('err_msg')): ?>
            <h2 class="text-danger" style="text-align: center;">
                <?php echo e(session('err_msg')); ?>

            </h2>
      <?php endif; ?>
      <form action="<?php echo e(url('/dashboard')); ?>" method="GET" style="float: right;">
            <?php echo $__env->make('search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </form>
      <?php if($products->count()): ?>
      <table class="table table-striped">
          <tr>
              <th>商品番号</th>
              <th>商品画像</th>
              <th>商品名</th>
              <th>価格</th>
              <th>在庫数</th>
              <th>メーカー名</th>
              <th></th>
              <th></th>
          </tr>
          <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
              <td><?php echo e($product->id); ?></td>
              <td style="width: 10rem; float: left; margin:16px;">
                <img src="<?php echo e(Storage::url($product->image)); ?>" style="width: 100%;"/>                
              </td>
              <td><a href="/product/<?php echo e($product->id); ?>"><?php echo e($product->product_name); ?></a></td>
              <td><?php echo e($product->price); ?></td>
              <td><?php echo e($product->stock); ?></td>
              <td><?php echo e($product->company->company_name); ?></td>
              <td><button type="button" class="btn btn-primary" onclick="location. href='/product/edit/<?php echo e($product->id); ?>' ">編集</button></td>
              <form method="POST" action="<?php echo e(route('delete', $product->id)); ?>" onSubmit="return checkDelete()">
              <?php echo csrf_field(); ?>
              <td><button type="submit" class="btn btn-primary" onclick=>削除</button></td>
              </form>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </table>
      <?php else: ?>
      <h2 style="color: red;">　※検索結果：該当なし</h2>
      <?php endif; ?>
  </div>
</div>
<script>
function checkDelete(){
    if(window.confirm('削除してよろしいですか？')){
        return true;
    } else {
        return false;
    }
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\product\resources\views/product/list.blade.php ENDPATH**/ ?>