 <!-- CATEGORIES WIDGET -->
<?php $list_tax = get_taxonomy_post('post_category') ?>
<?php if($list_tax): ?>
<h3 class="strong-header">
    Danh mục bài viết
</h3>
<div class="categories-widget">
    <ul class="list-unstyled">
        <?php $__currentLoopData = $list_tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <li><a href="<?php echo e($tax->taxonomy_slug); ?>"><?php echo e($tax->taxonomy_name); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </ul>
</div>
<?php endif; ?>
<!-- !CATEGORIES WIDGET -->

<!-- RECENT POSTS WIDGET -->
<?php $posts = get_post_cat_limit('','3' ) ?>
<?php if($posts): ?>
<h3 class="strong-header">
    Bài viết mới
</h3>
<div class="recent-posts-widget">
    <ul class="list-unstyled">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <li>
            <h5><a href="<?php echo e(url($post->post_slug)); ?>"><?php echo e($post->post_title); ?></a></h5>
            <span class="date"><?php echo e(date('d/m/Y',$post->post_date)); ?></span>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
   
    </ul>
</div>
<?php endif; ?>
<!-- !RECENT POSTS WIDGET -->