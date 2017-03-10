<?php $__env->startSection('content'); ?>

<!-- !container -->
<div class="full-width no-space flexslider-full-width">
  <!-- FLEXSLIDER -->
<?php echo $__env->make('frontend.decima_store.includes.slide_main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<!-- !full-width -->
<div class="container">
<!-- !FULL WIDTH -->


<section class="row">
  <div class="section-header col-xs-12">
    <hr>
    <h2 class="strong-header">
      Features
    </h2>
  </div>
  <?php $features = isset($features) ? $features: []; ?>
  <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
  <div class="col-sm-4 text-center">
    <!-- ICON BOX LONG -->
    <div class="icon-box icon-box-long">
      <?php echo $row['class']; ?>

      <h4 class="strong-header"><?php echo $row['header']; ?></h4>
      <p>
        <?php echo $row['content']; ?>

      </p>
    </div>
    <!-- !ICON BOX LONG -->
  </div>
  <div class="clearfix visible-xs space-30"></div>
  <!-- VIRTUAL ROW !IMPORTANT -->
  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

</section>


<!-- FLEXSLIDER WITH FLIPPED IMAGES -->
<!-- STANDARD -->
<?php 
  $product_type_1 = isset($product_type_1) ? $product_type_1 : '';
  $product_slug_1 = isset($product_slug_1) ? $product_slug_1 : '';
  $headingText = get_taxonomy_name($product_type_1,$product_slug_1);
  if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
 ?>
<section class="row">
  <div class="section-header col-xs-12">
    <hr>
    <h2 class="strong-header">
      <?php echo e($headingText); ?>

    </h2>
  </div>
  <div class="col-md-12">
    <div class="flexslider flexslider-nopager row">
      <ul class="slides">
        <?php 
          $products= get_product_tax_limit($product_type_1,$product_slug_1,12);  
          $count_check = count($products);
          $i = 0;
        ?>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <?php if($i%4==0): ?>
            <li class="row">
          <?php endif; ?>
          <!-- VIRTUAL ROW !IMPORTANT -->
          <div class="col-md-3 col-sm-6">
            <!-- SHOP FEATURED ITEM -->
            <div class="shop-item shop-item-featured overlay-element">
              <div class="flipImage clearfix">
                <a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>">
                 <span class="frontImg">
                   <img style="width: 220px; height: 280px" src="<?php echo e(set_image_size(get_image_url($product['product_image_id']),'thumb')); ?>" alt="<?php echo e($product['product_title']); ?>">
                 </span>

                 <span class="backImg">
                   <img style="width: 220px; height: 280px" src="<?php echo e(set_image_size(get_image_url($product['product_image_id']),'thumb')); ?>" alt="<?php echo e($product['product_title']); ?>">
                 </span>
                </a>
              </div>
              <div class="item-info-name-price">
                <h4><a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>"><?php echo e($product['product_title']); ?></a></h4>
                <?php if($product['price_old']): ?>
                <span class="price-old"><?php echo e(number_format($product['price_old'],0,'.','.')); ?>đ</span>&nbsp;&nbsp;
                <?php endif; ?>
                <span class="price"><?php echo e(number_format($product['price_new'],0,'.','.')); ?>đ</span>
              </div>
              <?php if($product['check_discount']): ?>
              <span class="sale-tag">Sale</span>
              <?php endif; ?>
            </div>
          </div>
          <div class="clearfix visible-xs visible-sm space-30"></div>

          <?php $i++; ?>
          <?php if($i%4==0): ?>
          </li>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <?php if($count_check %4 != 0): ?>
        </li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</section>
<!-- !FLEXSLIDER -->

<!-- SHOP HIGHLIGHT -->
<?php  
  $highlights = isset($highlights) ? $highlights : [];
?>
<section class="row">
  <div class="section-header col-xs-12">
    <hr>
    <h2 class="strong-header">
      Highlights
    </h2>
  </div>
  <?php $__currentLoopData = $highlights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
  <div class="col-md-4">
    <!-- SHOP HIGHLIGHT -->
    <!-- VERSION 2 -->
    <a href="<?php echo e($row['url']); ?>" class="shop-item-highlight shop-item-highlight-version-2">
      <img src="<?php echo e($row['image']); ?>" alt="Highlighted shop item">

      <div class="item-info-name-data">
        <div class="item-info-name-data-wrapper">
          <h4><?php echo $row['header']; ?></h4>

          <p>
           <?php echo $row['content']; ?>

          </p>
        </div>
      </div>
    </a>
    <!-- !SHOP HIGHLIGHT -->
    <!-- !VERSION 2 -->
  </div>
  <div class="clearfix visible-sm space-30"></div>
  <!-- VIRTUAL ROW !IMPORTANT -->
  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</section>


<!-- SECTION EMPHASIS 2 -->
<!-- FULL WIDTH -->
</div>
<!-- !container -->
<div class="full-width section-emphasis-2">
  <div class="container">
    <section class="row">
      <div class="col-md-12">
        <!-- CALL TO ACTION BOX INLINE -->
        <div class="calltoaction-box calltoaction-box-inline">
          <h4 class="strong-header">30% Off clothing with purchase of shoes</h4>
          <a href="<?php echo e(url('collections')); ?>" class="btn btn-primary">View products</a>
        </div>
        <!-- !CALL TO ACTION BOX INLINE -->
      </div>
    </section>

  </div>
</div>
<!-- !full-width -->
<div class="container">
  <!-- !FULL WIDTH -->
  <!-- !SECTION EMPHASIS 2 -->

  <?php $featured_brands = isset($featured_brands) ? $featured_brands : [] ?>
  <section class="row">
    <div class="section-header col-xs-12">
      <hr>
      <h2 class="strong-header">
        <?php echo e(isset($featured_brands['heading']) ?  $featured_brands['heading'] : 'Featured brands'); ?>

        <?php unset($featured_brands['heading']); ?>
      </h2>
    </div>
    <div class="col-md-12 text-center logotypes">
      <?php $__currentLoopData = $featured_brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <img src="<?php echo e($row['image']); ?>" alt=" ">
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </div>
  </section>


  <!-- FULL WIDTH -->
</div>
<!-- !container -->
<div class="full-width section-emphasis-1">
  <div class="container"><!-- FLEXSLIDER -->
    <!-- STANDARD -->
    <section class="row">
      <div class="col-md-12">
        <!-- display tweets here -->
        <!-- configuration is placed in twitter/config.php -->
        <div class="tweets_display flexslider row" data-limit="2"></div>
      </div>
    </section>
    <!-- !FLEXSLIDER -->
  </div>
</div>
<!-- !full-width -->
<div class="container">
  <!-- !FULL WIDTH -->


</div>

</div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.decima_store.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>