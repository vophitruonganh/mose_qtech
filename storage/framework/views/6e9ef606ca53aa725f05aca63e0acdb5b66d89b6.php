<?php $__env->startSection('content'); ?>
<!-- Slider -->
<div id="slider" class="flexslider main-slider">
    <ul class="slides">
      <?php $slider = isset($slider) ? $slider : []; ?>
      <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
       <li class="slide <?php if( $loop->first ): ?> active <?php endif; ?>">
          <a href="<?php echo e($row['url']); ?>">
          <img src="<?php echo e($row['big_image']); ?>" alt="" />
          </a>
       </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </ul>
 </div>
<!-- End Slider -->

<!-- Dich Vu -->
<section class="home-services home-section">
  <div class="fix-width">
    <div class="section-header">
      <h3 class="section-title wow fadeInUp"><?php echo e($service['heading']); ?></h3>
      <div class="section-description wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s"><?php echo e($service['text']); ?></div>
    </div>
    <div class="section-content">
      <?php unset($service['heading']); unset($service['text']); ?>
      <?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <div class="entry service wow fadeInDown" data-wow-delay="0.5s">
        <a class="thumb" href="<?php echo e($row['url']); ?>"><img src="<?php echo e($row['image']); ?>" alt="<?php echo e($row['title']); ?>" /></a>
        <h2 class="entry-title"><a href="<?php echo e($row['url']); ?>"><?php echo e($row['title']); ?></a></h2>
        <div class="excerpt"><?php echo e($row['text']); ?></div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </div>
  </div>
</section>
<!-- End Dich Vu -->

<!-- About -->
<section class="home-section home-aboutus wow fadeInUp" data-wow-duration="2s">
  <div class="parallax not-margin">
    <div data-position="-450" data-speed="3" class="layer_back">
      <img alt="banner thumb" src="<?php echo e($about['image']); ?>">
    </div>
    <div class="background_layer">
      <div class="fix-width">
        <h3 class="section-title"><?php echo e($about['heading']); ?></h3>
        <div class="section-description"><?php echo e($about['text']); ?></div>
      </div>
    </div>
  </div>
</section>
<!-- End About -->

<!-- Du an -->
<section class="home-projects home-section">
<div class="fix-width">
<div class="section-header">
  <h3 class="section-title wow fadeInUp">Sản phẩm</h3>
  <div class="section-description wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s"><?php echo e($productText); ?></div>
  <p class="readmore wow fadeInUp" data-wow-delay="0.5s"><a href="<?php echo e(url('collections')); ?>">Xem tất cả Sản Phẩm</a></p>
</div>
<!-- Sản Phẩm -->
<?php
  $products = get_product_tax_limit($product_type_1,$product_slug_1,4);
  // $headingText = get_taxonomy_name($product_type_1,$product_slug_1);
  // if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
?>
<?php if( $products ): ?>
<div class="products section-content clearfix wow slideInLeft">
  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
  <div class="product project clear">
     <a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" class="thumb">
     <img src="<?php echo e(get_image_url($product['product_image_id'])); ?>" alt="<?php echo e($product['product_title']); ?>" />
     </a>
     <div class="details">
        <h4 class="title"><a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>">
           <?php echo e($product['product_title']); ?>

           </a>
        </h4>
        <p class="product-price">
           <span class="price"><span class="contact">Giá: <?php echo e(number_format($product['price_new'],0,'.','.')); ?>₫</span></span>
        </p>
        <p class="product-description">
        </p>
        <form action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" id="form_order_<?php echo e($product['product_id']); ?>" method="post" class="variants clearfix form-add-to-cart">
           <!-- Begin product options -->
           <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
           <input type="hidden" name="id" value="1004984987" />
           <input type="hidden" name="quantity" value="1" />
           <button type="submit" class="add-to-cart btn addtocart" name="add" value="fav_HTML">Giỏ Hàng</button>
           <div class="cart-animation">1</div>
           <!-- End product options -->
        </form>
        <a class="readmore button" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>">
        Chi tiết
        </a>
        <span class="haravan-product-reviews-badge" data-id="1001418214"></span>
     </div>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</div>
<?php endif; ?>
<!-- End Du an -->

<!-- Nhan xet -->
<section class="home-section home-news-testimonials">
    <div class="fix-width">
      <div class="list-testimonials wow fadeInLeft">
        <h3 class="section-title"><?php echo e($comment['heading']); ?></h3>
        <div class="section-content slides">
          <?php unset($comment['heading']); ?>
          <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <div class="slide">
            <div class="article entry">
              <div class="thumb">
                <img src="<?php echo e($row['image']); ?>" />
              </div>
              <div class="entry-content"><?php echo $row['content']; ?></div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div>
        <div class="customNavigation">
          <span class="btn prev">Trước</span>
          <span class="btn next">Sau</span>
        </div>
      </div>
      <?php
       $posts = get_post_cat_limit($post_slug_1,5);
       $headingText = get_taxonomy_name($post_type_1,$post_slug_1);
       if( $headingText == '' ) $headingText = 'Bài viết Mới';
      ?>
      <?php if($posts): ?>
      <div class="list-news wow fadeInRight" data-wow-delay=".5s">
          <h3 class="section-title"><?php echo $headingText; ?></h3>
          <div class="section-content">
          <?php $i=0; ?>
          <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <?php if( $i==0 ): ?>
             <div class="article entry">
                <h4 class="entry-title"><a href="<?php echo e(url($post->post_slug)); ?>"><?php echo e($post->post_title); ?></a></h4>
                <div class="excerpt">
                   <div><img src="<?php echo e(get_image_url($post->post_image)); ?>" alt="<?php echo e($post->post_title); ?>"></div>
                   <?php echo e($post->post_excerpt); ?>

                </div>
             </div>
            <?php else: ?>
            <div class="article entry">
                <h4 class="entry-title"><a href="<?php echo e(url($post->post_slug)); ?>"><?php echo e($post->post_title); ?></a></h4>
                <div class="excerpt">
                   <div><img src="<?php echo e(get_image_url($post->post_image)); ?>" alt="<?php echo e($post->post_title); ?>"></div>
                   <?php echo e($post->post_excerpt); ?>

                </div>
             </div>
            <?php endif; ?>
            <?php $i++; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
          </div>
       </div>
      <?php endif; ?>
    

    </div>
 </section>

<!-- End Nhan xet -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien9.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>