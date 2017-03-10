<?php $__env->startSection('content'); ?>
<!-- Slider -->
<section>
  <div class="full_screen">
    <div class="inner space-20 section-slider">
      <!-- /templates/snippets/section-slider.liquid -->
      <div class="slider-carousel owl-carousel owl-theme" id="slider-carousel" data-mobile="[479,1]" data-tabletsmall="[768,1]" data-desktopsmall="[979,1]" data-desktop="[1199,1]" data-pagination="false" data-navigation="true" data-autoPlay="8000" data-items="1">
        <div class="text-center">
          <a class="slide" href="/collections/all" title=""><img src='//hstatic.net/033/1000104033/1000147703/slide_logo_1.jpg?v=55' alt=''  /></a>
        </div>
        <div class="text-center">
          <a class="slide" href="/collections/all" title=""><img src='//hstatic.net/033/1000104033/1000147703/slide_logo_2.jpg?v=55' alt=''  /></a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Slider -->

<!-- Row 1 -->
<section>
  <div class="wrapper">
    <div class="inner space-30 space-top-60 section-intro">
      <!-- /templates/snippets/section-intro.liquid -->
      <div class="grid">
        <div class="grid__item large--one-half">
          <div class="intro">
            <h2 class="title">
              Basic Shop  
            </h2>
            <p class="tes text-center">
              Chào mừng bạn đến với cửa hàng của chúng tôi.<br/>
              Basic Shop cung cấp cho bạn những mẫu thời trang<br/>
              mới và hot nhất trên thị trường hiện nay. Đến với cửa <br/>
              hàng chúng tôi là lựa chọn tốt nhất chủa bạn. 
            </p>
          </div>
        </div>
        <div class="grid__item large--one-half">
          <div class="slider-carousel owl-carousel owl-theme" id="slider-carousel" data-mobile="[479,1]" data-tabletsmall="[768,1]" data-desktopsmall="[979,1]" data-desktop="[1199,1]" data-pagination="false" data-navigation="true" data-items="1">
            <div class="text-center">
              <a class="slide" href="http://localhost/giaodien15/sanpham.php" title=""><img src='//hstatic.net/033/1000104033/1000147703/intro_slide_logo_1.jpg?v=55' alt=''  /></a>
            </div>
            <div class="text-center">
              <a class="slide" href="http://localhost/giaodien15/sanpham.php" title=""><img src='//hstatic.net/033/1000104033/1000147703/intro_slide_logo_2.jpg?v=55' alt=''  /></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Row 1 -->

<!-- Product -->
  
<section>
  <div class="wrapper">
    <div class="inner space-30 section-product-tab">
      <!-- /templates/snippets/section-product-tab.liquid -->
      <div class="tab-products ">
        <h2 class="title">
          Sản phẩm
        </h2>
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Sản phẩm mới</a></li>
          <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Sản phẩm nổi bật</a></li>
          <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Sản phẩm khuyến mãi</a></li>
        </ul>
        <div class="tab-content">
            <!-- Widget aaaaaaaa -->
              <?php echo showWidget('widgetaaaaaaaa'); ?>

            <!-- End Widget aaaaaaaa -->



             
                <!-- product-container -->
        
              
             
              
             
            </div>
          </div>

        </div>
      </div>
      <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
          $('.nav-tabs li:first').addClass('active');
          $('.tab-content .tab-pane:first').addClass('active');
        });
      </script>
    </div>
  </div>
</section>
<!-- End Product -->

<!-- News -->
  <!-- Widget bbbbbbbb -->
    <?php echo showWidget('widgetbbbbbbbb'); ?>

  <!-- End Widget bbbbbbbb -->

<!-- End News -->

<!-- Đối Tác -->
<section>
  <div class="wrapper">
    <div class="inner  section-brand">
      <!-- /templates/snippets/section-brand.liquid -->
      <div class="brands-carousel owl-carousel owl-theme " id="brands-carousel" data-items="6" data-pagination="false" data-navigation="true" data-autoPlay="false">
        <?php unset($doitac['heading']); ?>
        <?php $__currentLoopData = $doitac; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="text-center">
          <a class="brand" href="<?php echo e($row['url']); ?>" title=""><img src='<?php echo e($row['image']); ?>'  /></a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        
       
          
      </div>
    </div>
  </div>
</section>
<!-- End Đối Tác -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien15.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>