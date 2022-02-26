<p><input type="text" name="keyword" value="<?php echo e($keyword); ?>" placeholder="- キーワード検索 -"></p>
<select
    name="search_id"
    id="search_id"
    value="<?php echo e($search_id); ?>"
>
    <option value=""> - 選択してください - </option>
    <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($company->id); ?>">
        <?php echo e($company->company_name); ?>

    </option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<br>
<br>
<p><input type="submit" value="検索"></p>

<?php /**PATH C:\MAMP\htdocs\product\resources\views/search.blade.php ENDPATH**/ ?>