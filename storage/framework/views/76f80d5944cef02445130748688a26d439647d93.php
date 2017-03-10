<?php $__env->startSection('content'); ?>
<!--// menu left-->

<?php 
        $product_id = $product['product_id'];
        $title     = $product['product_title'];
        $slug      = $product['product_slug'];
        $excerpt   = $product['product_excerpt'];
        $content   = $product['product_content'];
        $featureImage = get_image_url($product['product_image_id']);
        $comment_status = $product['comment_status'];
        $priceNew  = number_format($product['price_new'], 0, ',', '.');
        $priceOld  = ($product['price_old'] == 0) ? 0 : number_format($product['price_old'], 0, ',', '.');
        $list_post_image = decode_serialize($product['product_image']);

    
?>
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <div class="col-md-12 " >
            <ol class="breadcrumb breadcrumb-arrow hidden-sm hidden-xs">
               <li><a href="<?php echo e(url('/')); ?>" target="_self">Trang chủ</a></li>
               <!--li><a href="/collections" target="_self">Danh mục</a></li-->
               <li class="active"><span> <?php echo e($title); ?></span></li>
            </ol>
         </div>
      </div>

   </div>
</div>
<div class="wrapper-deatil">
   <div class="container">
      <div class="row ">
         <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div id="surround">
               <a class="slide-prev slide-nav" href="javascript:">
               <i class="fa fa-arrow-circle-o-left fa-2"></i>
               </a>
               <a class="slide-next slide-nav" href="javascript:">
               <i class="fa fa-arrow-circle-o-right fa-2"></i>
               </a>
               <img class="product-image-feature" src="<?php echo e($featureImage); ?>" alt="<?php echo e($title); ?>">
               <div id="sliderproduct" class="">
                  <ul class="slides" >
                     <?php if(count($list_post_image)>0): ?>
                       <?php $__currentLoopData = $list_post_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                       <li class="product-thumb">
                           <a href="javascript:" data-image="<?php echo e(get_image_url($img)); ?>" data-zoom-image="<?php echo e(get_image_url($img)); ?>">
                           <img alt="<?php echo e($title); ?>" data-image="<?php echo e(get_image_url($img)); ?>" src="<?php echo e(get_image_url($img)); ?>" >
                           </a>
                        </li>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                     <?php endif; ?>
                     
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
            <div class="product-title">
               <h1><?php echo e($title); ?></h1>
               <span id="pro_sku"></span>
            </div>
            <div class="variant">
                <?php if(count($list_variant_id)>1): ?>
                    <?php $i=1; ?>
                    <?php $__currentLoopData = $list_variant_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant_name): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php $list_variant_value = get_variant_meta_product_detail( $variant_name , $product_id ) ?>
                        <?php if(count($list_variant_value)>1): ?>
                        <div class="variant-name"><?php echo e($variant_name); ?></div>
                        <input type="hidden" value="<?php echo e($variant_name); ?>" id="variant_name_<?php echo e($i); ?>">
                        <select name="variant_option_<?php echo e($i); ?>" id="variant_option_<?php echo e($i); ?>">
                            <?php $__currentLoopData = $list_variant_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                 <option <?php if(in_array($value->variant_value,$list_variant_meta_value)): ?> selected <?php endif; ?> value="<?php echo e($value->variant_value); ?>"><?php echo e($value->variant_value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </select>
                        <?php $i++; ?>
                        <?php endif; ?>
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?>
            </div>

            <div class="product-price-p20">
               <div class="product-price price-detail" id="price-preview">
                  <span><?php echo e($priceNew); ?>đ</span>
               </div>
               <div class="pt20 share-p20">
                  <!-- Begin social icons -->
                  <div class="addthis_toolbox addthis_default_style ">
                     <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                     <a class="addthis_button_google_plusone" g:plusone:size="medium" g:plusone:count="false"></a>
                  </div>
                  <script type="text/javascript" src="//s7.addthis.com/js/250/addthis_widget.js"></script>
                  <!-- End social icons -->
               </div>
            </div>
            <div class="goods-subtitle">
               <p><?php echo e($excerpt); ?></p>
            </div>
            <form id="add-item-form" action="<?php echo e(url("cart/order/$slug")); ?>" method="post" class="variants clearfix">
              <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
              <input type="hidden" id="product_id" name="product_id" value="<?php echo e($product_id); ?>">
              <input type="hidden" id="variant_id" name="variant_id" value="">
               <div class="select clearfix" style="display:none">
                  <select id="product-select" name="id" style="display:none">
                     <option value="1004706200">Default Title - 700,000₫</option>
                  </select>
               </div>
               <div class="select-wrapper ">
                  <div class="quantity-box">
                     <label for="Quantity" class="quantity-selector sr-only">Số lượng</label>
                     <input type="button" value="-" class="qtyminus">
                     <input type="text" id="Quantity" name="quantity" value="1" min="1" class="quantity-selector">
                     <input type="button" value="+" class="qtyplus">    
                  </div>
               </div>
               <div class="product_button">
                  <div class="clearfix">
                     <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12 btn-submit">
                        <button id="add-to-cart"   class=" btn-detail btn-color-add btn-min-width btn-mgt" name="add"> 
                        Thêm vào giỏ 
                        </button>
                     </div>
                  </div>
               </div>
            </form>
            <div class="pt20">
               <!-- Begin tags -->
               <!-- End tags -->
            </div>
         </div>
         <div class="col-md-3  hidden-sm hidden-xs">
            <div class="adr box" id="box_delivery_policies">
               <div class="header">
                  <h4 class="title"><?php echo e($policy['heading']); ?></h4>
               </div>
               <div class="body">
                  <div class="adr list" id="delivery_policies_list">
                     <?php unset($policy['heading']); ?>
                     <?php $__currentLoopData = $policy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                     <div class="item">
                        <div class="icon"><i class="adr huge icon <?php echo e($row['class']); ?>"></i></div>
                        <div class="text"><?php echo e($row['text']); ?></div>
                     </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </div>
               </div>
            </div>
            <!--
            <div class="adr box box-truck">
               <img src="<?php echo e(asset('template/giaodien4/images/vanchuyen.jpg')); ?>">
            </div>
            -->
         </div>
      </div>
   </div>
</div>
<div class="container">
   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="row margin-describe">
            <div class="col-md-3 right-col-3 hidden-sm hidden-xs">
                <!-- Widget 77 -->
                <div class="pos-best-sellers products_block bestsellers ">
                  <div class="block-title">
                      <?php
                         $headingText = get_taxonomy_name($product_type_7,$product_slug_7);
                         if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
                      ?>
                     <h4 class="title_possellers">
                        <?php echo e($headingText); ?>

                     </h4>
                  </div>
                  <div class="block_content_bestsellers">
                     <div class="Topsellers block_content products-block owl-carousel owl-theme" style="display: block; opacity: 1;">
                        <?php
                          $i = 0;
                          $products = get_product_tax_limit($product_type_7,$product_slug_7,9);
                          $count = count($products);
                        ?>
                        <?php if( $products ): ?>
                          <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                              <?php if( $i%3 == 0 ): ?>
                              <div class="item_out">
                              <?php endif; ?>
                             <div class="seller-item item">
                                <div class="sellers-img">
                                   <a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="<?php echo e($product['product_title']); ?>" class="products-block-image content_img clearfix">
                                   <img class="replace-2x img-responsive" src="<?php echo e(get_image_url($product['product_image_id'])); ?>" alt="<?php echo e($product['product_title']); ?>">
                                   </a>
                                </div>
                                <div class="product-content">
                                   <h5 class="bs-title">
                                      <a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="<?php echo e($product['product_title']); ?>">
                                      <?php echo e($product['product_title']); ?>

                                      </a>
                                   </h5>
                                   <div class="price-box-side">
                                      <p class="price"><?php echo e(number_format($product['price_new'],0,'.','.')); ?>₫</p>
                                   </div>
                                </div>
                             </div>
                             <?php $i++; ?>
                             <?php if( $i%3 == 0 ): ?>
                             </div>
                             <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                          <?php if( $count%3 != 0 ): ?>
                          </div>
                          <?php endif; ?>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
                <!-- End Widget 77 -->
        
               <!-- Banner quảng cáo -->
               <div class="list-banner-1 banner-left">
                  <a href="<?php echo e($eighthBanner['url']); ?>">
                  <img src="<?php echo e($eighthBanner['image']); ?>" >
                  </a>
               </div>
               <!-- Banner quảng cáo -->
               <div class="list-banner-1 banner-left">
                  <a href="<?php echo e($ninthBanner['url']); ?>">
                  <img src="<?php echo e($ninthBanner['image']); ?>" >
                  </a>
               </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
               <div class="row">
                  <div class="wrapper-deatil">
                     <div role="tabpanel" class="product-comment">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" id="page-product" role="tablist">
                           <li role="presentation" ><a  href="#mota" aria-controls="mota" role="tab" data-toggle="tab">Mô tả sản phẩm</a></li>
                          <?php if($comment_status == 'yes'): ?>
                           <li role="presentation">
                              <a href="#binhluan" aria-controls="binhluan" role="tab" data-toggle="tab"  role="tab">Bình luận</a>
                           </li>
                          <?php endif; ?>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                           <div role="tabpanel" class="tab-pane" id="mota">
                              <div class="container-fluid product-description-wrapper">
                                 <?php echo $content; ?>

                              </div>
                           </div>
                           <?php if($comment_status == 'yes'): ?>
                           <div role="tabpanel" class="tab-pane active" id="binhluan">
                              <div class="container-fluid">
                                 <div class="fb-comments" data-href="<?php echo e(url('collections/'.$slug)); ?>" data-width="100%" data-numposts="5"></div>
                                 <div id="fb-root"></div>
                                 <!-- script comment fb -->
                                 <script>(function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s); js.id = id;
                                    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.4&appId=1376564555975870";
                                    fjs.parentNode.insertBefore(js, fjs);
                                    }(document, 'script', 'facebook-jssdk'));
                                 </script>
                              </div>
                           </div>
                           <?php endif; ?>
                        </div>
                     </div>
                  </div>

               <div class="col-md-12 list-like">
                     <div class="row">
                        <div id="like">
                           <div class="title-like">
                              <h2>Sản phẩm khác</h2>
                           </div>
                           <div class="product-list ">
                              <div class="content-product-list">
                                <?php $products = get_product_related('product_category',$slug,8); ?>
                                <?php if( $products ): ?>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                 <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12 pro-loop">
                                    <!--sử dụng  -->
                                    <div class="product-block product-resize">
                                       <div class="product-img image-resize view view-third clearfix">
                                          <a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="<?php echo e($product['product_title']); ?>">
                                          <img alt="<?php echo e($product['product_title']); ?>" src="<?php echo e(get_image_url($product['product_image_id'])); ?>" />
                                          </a>
                                       </div>
                                       <div class="product-detail clearfix">
                                          <h3 class="pro-name"><a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="<?php echo e($product['product_title']); ?>"><?php echo e($product['product_title']); ?></a></h3>
                                          <!-- sử dụng pull-left -->
                                          <div class="content_price">
                                             <p class="pro-price"><?php echo e(number_format($product['price_new'],0,'.','.')); ?>₫</p>
                                             <?php if($product['price_old']): ?>
                                             <p class="pro-price-del"><del class="compare-price"><?php echo e(number_format($product['price_old'],0,'.','.')); ?>₫</del></p>
                                             <?php endif; ?>
                                          </div>
                                          <div class="actions clearfix">
                                            <!--
                                             <a class="btn-like mask-view" href="#" data-handle="/products/xiaomi-redmi-note-3" ><i class="fa fa-bar-chart"></i><span>Xem nhanh</span></a>
                                            -->
                                             <a class="btn-buy ajax_add_to_cart " data-variant="1004703251" onclick="order(<?php echo e($product['product_id']); ?>)" href="javascript:void(0);">
                                             <span> + Thêm vào giỏ </span> <i class="shoppping-cart"><img src=//hstatic.net/796/1000055796/1000090795/Capture.PNG?v=138></i></a> 
                                             <form id="form_order_<?php echo e($product['product_id']); ?>" action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" method="post">
                                                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                                  <input type="hidden" name="quantity" value="1" />
                                              </form>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                 <?php endif; ?>
                              </div>
                           </div>
                           
                        </div>
                     </div>
                  </div>
              
               </div>
            </div>
         </div>
      </div>
      <!-- Sản phẩm liên quan -->
   </div> 
</div>
<script>
   $('.product-comment #binhluan').addClass('hides');
   $('.product-comment #page-product > li').eq(0).addClass('active');
   $('.product-comment .tab-content > div').eq(0).addClass('active');
   $(document).ready(function(){
      $('#page-product > li > a').click(function(){
         $('.product-comment #binhluan').removeClass('hides');
   
         $('#page-product > li').removeClass('active');
         $(this).parent('li').addClass('active');
         var index = $(this).parent('li').index();
         $('.tab-content > div').removeClass('active');
         $('.tab-content > div').eq(index).addClass('active');
         setTimeout(function(){ 
            $(window).resize();
         }, 1000);
   
      })
   });
   
</script>
<script>
   $(".product-thumb img").click(function(){
      $(".product-thumb").removeClass('active');
      $(this).parents('li').addClass('active');
      $(".product-image-feature").attr("src",$(this).attr("data-image"));
      $(".product-image-feature").attr("data-zoom-image",$(this).attr("data-zoom-image"));
   });
   
   $(".product-thumb").first().addClass('active');
   
</script>
<script>
   $(document).ready(function(){
      if($(".slides .product-thumb").length>4){
         $('#sliderproduct').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth:70,
            itemMargin:10,
         });
      }
      if($(window).width() > 960){
         jQuery(".product-image-feature").elevateZoom({
            gallery:'sliderproduct',
            scrollZoom : true
         });
      } else {
   
      }
      jQuery('.slide-next').click(function(){
         if($(".product-thumb.active").prev().length>0){
            $(".product-thumb.active").prev().find('img').click();
         }
         else{
            $(".product-thumb:last img").click();
         }
      });
      jQuery('.slide-prev').click(function(){
         if($(".product-thumb.active").next().length>0){
            $(".product-thumb.active").next().find('img').click();
         }
         else{
            $(".product-thumb:first img").click();
         }
      });
   });
</script>
<script>
   //Button số lượng trang product-
   $('.qtyplus').click(function(e){
      e.preventDefault();
      var currentVal = parseInt($('input[name="quantity"]').val());
      if (!isNaN(currentVal)) {
         $('input[name="quantity"]').val(currentVal + 1);
      } else {
         $('input[name="quantity"]').val(1);
      }
   
   });
   
   $(".qtyminus").click(function(e) {
   
      e.preventDefault();
      var currentVal = parseInt($('input[name="quantity"]').val());
      if (!isNaN(currentVal) && currentVal > 0) {
         $('input[name="quantity"]').val(currentVal - 1);
      } else {
         $('input[name="quantity"]').val(1);
      }
   
   });
   
   
</script>
<script type="text/javascript">
   function order(i)
    {
         $("#form_order_"+i).submit();   
    }
</script>

<script>
      $('#variant_option_1, #variant_option_2, #variant_option_3').change(function(){
             var data = {};
             var product_id   = $('#product_id').val();
             var token      = $('input[name="_token"]').val();
             var variant_value_1 = $('select[name="variant_option_1"]').val(); 
             var variant_value_2 = $('select[name="variant_option_2"]').val(); 
             var variant_value_3 = $('select[name="variant_option_3"]').val();
             var variant_name_1 = $('#variant_name_1').val(); 
             var variant_name_2 = $('#variant_name_2').val(); 
             var variant_name_3 = $('#variant_name_3').val(); 
             
             if(variant_value_1 != 'undefined' && variant_value_1 != undefined){
                  data[variant_name_1] = variant_value_1;
             }
             if(variant_value_2 != 'undefined' && variant_value_2 != undefined ){
                  data[variant_name_2] = variant_value_2;
             }
             if(variant_value_3 != 'undefined' && variant_value_3 != undefined ){
                  data[variant_name_3] = variant_value_3;
             }
             $.ajax({
                  type      : "POST",
                  url       : '/collections/get_variant_price',
                  dataType  : 'json',
                  data      : {"_token" : token,"variant_meta" : data, 'product_id': product_id},
                  success: function(data){
                      product_meta = data;
                      if(data ==0){
                          $('.product-image-feature').attr('src','');
                          $('.btn-submit').html('<button id="add-to-cart" type="button"  class=" btn-detail btn-color-add btn-min-width btn-mgt" name="add">Hết hàng</button>');
                          $('.productpageprice').html('<span class="spiral"></span>0');
                          $('.price-detail').html('<span>0đ</span>'); 
                          $('.old-price').html('<span id="old-price-48" class="price" display="none">');
                      }else{
                          $('.change-image').attr('data-image',data.image);
                          $('.product-image-feature').attr('src',data.image);
                          $('.old-price').html('<span>'+data.price_old+'</span>'); 
                          $('.price-detail').html('<span id="product-price-48" class="price" itemprop="price">'+data.price_new); 
                          $('.btn-submit').html('<button id="add-to-cart"   class=" btn-detail btn-color-add btn-min-width btn-mgt" name="add">Thêm vào giỏ</button>');
                          $('#variant_id').val(data.variant_id);
                      }    
                  },
              });
      });
          
  </script>    

<?php $__env->stopSection(); ?>

    
<?php echo $__env->make('frontend.giaodien4.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>