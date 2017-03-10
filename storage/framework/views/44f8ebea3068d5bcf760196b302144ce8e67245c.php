<div class="blog-sidebar">
	<?php $posts = get_taxonomy_post('post_category'); ?>
	<?php if( $posts ): ?>
  <div class="blog-title-sidebar">
     <span>Danh mục bài viết</span>
  </div>
  <ul class="blog-lists">
  		<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
     <li>
        <a href="<?php echo e(url($post->taxonomy_slug)); ?>" title="<?php echo e($post->taxonomy_name); ?>"><?php echo e($post->taxonomy_name); ?></a>
     </li>
    	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
  </ul>
  	<?php endif; ?>
</div>
<div class="blog-sidebar">
	<?php
      $posts = get_post_cat_limit($post_slug_2,5);
      $headingText = get_taxonomy_name($post_type_2,$post_slug_2);
      if( $headingText == '' ) $headingText = 'Bài viết Mới';
    ?>
    <?php if( $posts ): ?>
  <div class="blog-title-sidebar">
     <span><?php echo e($headingText); ?></span>
  </div>
  <ul class="blog-list-articles">
  	<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
     <li class="clearfix">
        <div class="blog-item-image">
           <a href="<?php echo e(url($post->post_slug)); ?>" title="<?php echo e($post->post_title); ?>">
           <img src="<?php echo e(get_image_url($post->post_image)); ?>" alt="<?php echo e($post->post_title); ?>">
           </a>
        </div>
        <div class="blog-item-title">
           <a href="<?php echo e(url($post->post_slug)); ?>" title="<?php echo e($post->post_title); ?>">
              <h2><?php echo e($post->post_title); ?></h2>
           </a>
           <p>
              Ngày:<?php echo e(date('d/m/Y',$post->post_date)); ?>

           </p>
        </div>
     </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
  </ul>
  <?php endif; ?>
</div>

<div class="clearfix mt10 text-center">
   <a href="<?php echo e($fifthBanner['url']); ?>">
   <img src="<?php echo e($fifthBanner['image']); ?>">
   </a>
</div>
<div class="clearfix mt10 text-center">
   <a href="<?php echo e($sixthBanner['url']); ?>">
   <img src="<?php echo e($sixthBanner['image']); ?>">
   </a>
</div>