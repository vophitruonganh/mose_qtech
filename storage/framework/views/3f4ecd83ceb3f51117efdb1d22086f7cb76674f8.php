<?php 
        $product_id = $product['product_id'];
        $title     = $product['product_title'];
        $slug      = $product['product_slug'];
        $excerpt   = $product['product_excerpt'];
        $content   = $product['product_content'];
        $list_variant = $product['list_variant'];
        $featureImage = get_image_url($product['product_image_id']);
        $comment_status = $product['comment_status'];
        $priceNew  = number_format($product['price_new'], 0, ',', '.');
        $priceOld  = ($product['price_old'] == 0) ? 0 : number_format($product['price_old'], 0, ',', '.') . '&#8363;';
        $list_post_image = decode_serialize($product['product_image']);

    
?>

<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <ul>
            <li class="home"> <a href="/" title="Trang chủ">Trang chủ</a><span>|</span></li>
            <li><a href="<?php echo e(url('collections')); ?>"> Sản phẩm</a><span>|</span></li>
            <li><strong><?php echo e($title); ?></strong>
            <li>
         </ul>
      </div>
   </div>
</div>
<section class="main-container col1-layout" itemscope itemtype="http://schema.org/Product">
   <div class="main container">
      <div class="col-main">
         <div class="row">
            <div class="product-view">
               <div class="product-essential">
                  <form action="<?php echo e(url('cart/order/'.$slug)); ?>" method="post" enctype="multipart/form-data" id="product_addtocart_form">
                  <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                     <div class="product-img-box col-lg-5 col-sm-5 col-xs-12">
                        <div class="large-image">
                           <ul class="moreview" id="moreview">
                              <?php if(count($list_post_image)>0): ?>
                                <?php $__currentLoopData = $list_post_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <li class="moreview_thumb">
                                      <img class="moreview_thumb_image" src="<?php echo e(get_image_url($img)); ?>" alt="<?php echo e($title); ?>"> 
                                      <img class="moreview_small_image_fake" style="display:none;" src="<?php echo e(get_image_url($img)); ?>" alt="<?php echo e($title); ?>">
                                      <img class="moreview_source_image" src="<?php echo e(get_image_url($img)); ?>" alt="<?php echo e($title); ?>"> 
                                      <!--<span class="roll-over">Di chuột vào ảnh để xem chi tiết</span> -->
                                      <img  class="zoomImg" src="<?php echo e(get_image_url($img)); ?>" alt="<?php echo e($title); ?>">
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                              <?php endif; ?>
                           </ul>
                        </div>
                        <div class="moreview-control"> 
                           <a href="javascript:void(0)" class="moreview-prev"></a>
                           <a href="javascript:void(0)" class="moreview-next"></a>
                        </div>
                     </div>
                     <div class="product-shop col-lg-7 col-sm-7 col-xs-12">
                        <div class="product-name">
                           <h1 itemprop="name"><?php echo e($title); ?></h1>
                        </div>
                        <?php /*
                        @if(count($list_variant)>1)
                            @foreach($list_variant as $variant)
                                <a onclick="get_variant('{{$product_id}}','{{$variant->variant_id}}')">{{$variant->variant_name}} : {{$variant->variant_value}} </a><br>
                            @endforeach
                        @endif
                        */ ?>
                        <div class="variant">
                            <?php if(count($list_variant_id)>1): ?>
                            <form action="">
                                <?php $i=1; ?>
                                <?php $__currentLoopData = $list_variant_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant_name): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <?php $list_variant_value = get_variant_meta_product_detail( $variant_name , $product_id ) ?>
                                    <?php if(count($list_variant_value)>1): ?>
                                    <div class="variant-name"><?php echo e($variant_name); ?></div>
                                    <input type="hidden" value="<?php echo e($variant_name); ?>" id="variant_name_<?php echo e($i); ?>">
                                    <select name="variant_option_<?php echo e($i); ?>" id="variant_option_<?php echo e($i); ?>">
                                        <?php $__currentLoopData = $list_variant_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                             <option value="<?php echo e($value->variant_value); ?>"><?php echo e($value->variant_value); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                    <?php $i++; ?>
                                    <?php endif; ?>
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            <?php endif; ?>
                            </form>
                        </div>
                        <div class="price-block">
                           <div class="price-box">
                              <p class="special-price" itemprop="price"> <span id="product-price-48" class="price" itemprop="price"> <?php echo e($priceNew); ?>&#8363; </span> </p>
                              <?php if($priceOld): ?>
                              <p class="old-price"> <span id="old-price-48" class="price"> <?php echo e($priceOld); ?>&#8363; </span> </p>
                              <?php endif; ?>
                           </div>
                        </div>
                        <div class="short-description">
                           <p> <?php echo e($excerpt); ?></p>
                        </div>
                        <div class="add-to-box">
                           <div class="add-to-cart" style=" float: left; width: 100%;">
                              <div class="pull-left" style=" float: left; width: 100%;">
                                 <input type="hidden" name="variantId" value="1850772" />
                              </div>
                           </div>
                           <div class="add-to-cart">
                              <label for="qty">Số lượng:</label>
                              <div class="pull-left">
                                 <div class="custom pull-left">
                                    <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon-minus">&nbsp;</i></button>
                                    <input onkeypress="isAlphaNum(event);"  type="text" title="Qty" value="1" maxlength="12" id="qty" name="quantity" class="input-text qty"  oninput="validity.valid||(value='');" >
                                    <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="icon-plus">&nbsp;</i></button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="social">
                           <button class="button btn-cart  add_to_cart" title="Thêm vào giỏ hàng" type="submit"><span>Thêm vào giỏ hàng</span></button>
                        </div>
                        <!--<div class="social" style="border-top:none;">
                           <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5269ddad0d5cefd6" async="async"></script>
                           <div class="addthis_native_toolbox"></div>
                           </div>-->
                        <input type="hidden" id="variant_id" name="variant_id" value="">
                     </div>
                  </form>
               </div>
               <div class="product-collateral">
                  <div class="col-sm-12">
                     <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                        <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Chi tiết sản phẩm </a> </li>
                        <li><a href="#product_tabs_tags" data-toggle="tab">Tags sản phẩm</a></li>
                        
                     </ul>
                     <div id="productTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="product_tabs_description">
                           <div class="std">
                            <?php echo $content; ?>

                           </div>
                        </div>
                        <div class="tab-pane fade" id="product_tabs_tags">
                           <div class="box-collateral box-tags">
                                <div class="tags">
                                   <?php $taxs = get_taxonomy_product_detail( 'product_tag', $slug) ?>
                                    <?php if($taxs): ?>
                                     <ul>
                                        <?php $__currentLoopData = $taxs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                         <li><a href="<?php echo e(url('collections/'.$tax->taxonomy_slug)); ?>" title='<?php echo e($slug); ?>'><?php echo e($tax->taxonomy_name); ?></a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </ul>
                                    <?php endif; ?>
                                </div>
                             </div>
                        </div>
                       
                     </div>
                  </div>
                   <?php if($comment_status=='yes'): ?> 
                   <div class="comment">
                       <div class="fb-comments" data-href="<?php echo e(url('collections/'.$slug)); ?>" data-width="100%" data-numposts="5"></div>
                   </div>
                   <?php endif; ?>
                  <div class="col-sm-12">
                     <div class="box-additional">
                        <div class="related-pro">
                           <div class="slider-items-products">
                              <?php $product_relateds = get_product_related('product_category', $slug, 10 ) ?>
                              <?php if($product_relateds): ?>
                              <div class="slider-items-products">
                              <div class="new_title center">
                                 <h2>Sản phẩm liên quan</h2>
                              </div>
                              <div id="related-products-slider" class="product-flexslider hidden-buttons ">
                                 <div class="slider-items slider-width-col4 hidden_btn_cart">
                                  <?php $__currentLoopData = $product_relateds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>  
                   
                                    <div class="item">
                                       <div class="col-item">
                                          <?php if($product['check_discount']): ?>
                                          <div class="sale-label sale-top-right">-<?php echo e($product['percentage']); ?>%</div>
                                          <?php endif; ?>
                                          <div class="product-image-area"> 
                                             <a class="product-image" title="<?php echo e($product['product_title']); ?>" href="/vong-lac-massage-boyu"> 
                                             <img src="<?php echo e(get_image_url($product['product_image_id'])); ?>" class="img-responsive" alt="<?php echo e($product['product_title']); ?>" /> 
                                             </a>
                                          </div>
                                          <div class="hidden_mobile  hidden-sm hidden-xs">
                                             <form action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" method="post" class="variants" id="form_order_<?php echo e($product['product_id']); ?>" enctype="multipart/form-data">
                                                <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                                
                                                <input type="hidden" name="quantity" value="1" />
                                                <div class="hover_fly">
                                                   <a class="exclusive ajax_add_to_cart_button btn-cart add_to_cart" onclick="order(<?php echo e($product['product_id']); ?>)" title="Cho vào giỏ hàng">
                                                      <div><i class="icon-shopping-cart"></i><span>Mua hàng</span></div>
                                                   </a>
                                                   <input type="hidden" name="variantId" value="1850762" />
                                                </div>
                                                <a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" class="over_bg"></a>
                                             </form>
                                          </div>
                                          <div class="info">
                                             <div class="info-inner">
                                                <div class="item-title">
                                                   <h3><a title="<?php echo e($product['product_title']); ?>" href="/vong-lac-massage-boyu"><?php echo e($product['product_title']); ?></a></h3>
                                                </div>
                                                <!--item-title-->
                                                <div class="item-content">
                                                   <div class="price-box">
                                                      <p class="special-price"> 
                                                         <span class="price"><?php echo e(number_format($product['price_new'],0,'.','.')); ?>&#8363;</span> 
                                                      </p>
                                                      <?php if($product['price_old']): ?>
                                                      <p class="old-price"> 
                                                         <span class="price-sep">-</span> 
                                                         <span class="price"><?php echo e(number_format($product['price_old'],0,'.','.')); ?>&#8363;</span> 
                                                      </p>
                                                      <?php endif; ?>
                                                   </div>
                                                </div>
                                                <div class="button_mobile hidden-lg hidden-md">
                                                   <form action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" method="post" class="variants" id="product-actions-1195907" enctype="multipart/form-data">
                                                      <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                                      <input type="hidden" name="quantity" value="1" />
                                                      <div class="actions">
                                                         <input type="hidden" name="variantId" value="1850762" />
                                                         <button class="button btn-cart btn-cart add_to_cart" title="Cho vào giỏ hàng" type="submit"><span>Mua hàng</span></button>
                                                      </div>
                                                   </form>
                                                </div>
                                                <!--item-content--> 
                                             </div>
                                             <!--info-inner-->
                                             <div class="clearfix"> </div>
                                          </div>
                                       </div>
                                    </div>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>  
                                 </div>
                              </div>
                            
                                 </div>
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
   </div>
</section>
<!--End main-container --> 
<script src='//bizweb.dktcdn.net/assets/themes_support/option-selectors.js?16052016' type='text/javascript'></script>
<style>
   .add-to-cart .selector-wrapper label{
   float: left !important;
   margin-right: 15px;
   }
</style>

<script type="text/javascript">

  function order(i)
    {
         $("#form_order_"+i).submit();   
    }
</script>

 <script>
        function get_variant(product_id, variant_id){
                 $.ajax({
                   async: false,
                   method: 'get',
                   url: '/collections/'+product_id+'/'+variant_id,
                   success: function(data) {
                   product_meta = data;
                 }});
                 //number_format($product['price_new'], 0, ',', '.');
                $('.special-price').html('<span id="product-price-48" class="price" itemprop="price">'+product_meta['price_new']);
                $('.old-price').html('<span id="old-price-48" class="price">'+product_meta['price_old']);   
                $('#variant_id').val(variant_id);   
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
                          $('.social').html('<button class="button btn-cart  add_to_cart" title="Hết hàng" type="button"><span>Hết hàng</span></button>');
                          $('.productpageprice').html('<span class="spiral"></span>0');
                          $('.special-price').html('<span id="product-price-48" class="price" itemprop="price">0đ'); 
                          $('.old-price').html('<span id="old-price-48" class="price" display="none">');
                      }else{
                          $('.old-price').html('<span id="old-price-48" class="price">'+data.price_old); 
                          $('.special-price').html('<span id="product-price-48" class="price" itemprop="price">'+data.price_new); 
                          $('.social').html('<button class="button btn-cart  add_to_cart" title="Thêm vào giỏ hàng" type="submit"><span>Thêm vào giỏ hàng</span></button>');
                          $('#variant_id').val(data.variant_id);
                      }    
                  },
              });
      });
          
  </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien11.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>