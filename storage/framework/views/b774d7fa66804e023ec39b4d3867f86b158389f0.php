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
        $priceOld  = ($product['price_old'] == 0) ? 0 : number_format($product['price_old'], 0, ',', '.') ;
        $list_post_image = decode_serialize($product['product_image']);
       // $variant_value_first = $variant_meta_first[0]->variant_value;
?>


<?php $__env->startSection('content'); ?>
<div class="product-area">
   
    <!-- BREADCRUMB -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="breadcrumbs">
                    <ul>
                        <li class="home"> <a href="<?php echo url('/'); ?>" title="Trang chủ">Trang chủ<i class="sp_arrow">/</i></a></li>
                        <li><a href="<?php echo e(url('collections')); ?>">Sản Phẩm</a></li>
                        <li><i class="sp_arrow">/</i><strong><?php echo e($title); ?></strong></li>
                    </ul>

                </div>

            </div>

        </div>
    </div>
    <!-- END BREADCRUMB -->
    
   <!-- PRODUCT-VIEW-AREA-START -->
    <div class="product-view-area"  itemscope itemtype="http://schema.org/Product">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-5 col-lg-5 col-md-5">
                    <div id="sync1" class="owl-carousel large-image">
                        <?php if(count($list_post_image)>0): ?>
                                <?php $__currentLoopData = $list_post_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <div class="item">
                                        <img class="sp-image" src="<?php echo e(get_image_url($img)); ?>" alt="<?php echo e($title); ?>" />
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <?php endif; ?>
                        
                       <!--  <div class="item">
                            <img class="sp-image" src="<?php echo e(asset('template/giaodien3/images/59264841_3[1].png')); ?>"  alt="<?php echo e($title); ?>"/>
                        </div>
                        <div class="item">
                            <img class="sp-image" src="<?php echo e(asset('template/giaodien3/images/59293081_2[1].png')); ?>" alt="<?php echo e($title); ?>" />
                        </div> -->
                    </div>
                    <div id="sync2" class="owl-carousel">
                         <?php if(count($list_post_image)>0): ?>
                                <?php $__currentLoopData = $list_post_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <div class="item">
                                        <img src="<?php echo e(get_image_url($img)); ?>" alt="<?php echo e($title); ?>" />
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7">
                    <div class="product-details-area">
                        <div class="product-description">
                            <form action='<?php echo e(url("cart/order/$slug")); ?>' method="post" enctype="multipart/form-data" id="add-to-cart-form" class="cart">
                                <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                <input type="hidden" id="product_id" name="product_id" value="<?php echo e($product_id); ?>">
                                <h1  itemprop="name"><?php echo e($title); ?></h1>
                                <?php /*
                                @if(count($list_variant)>1)
                                    @foreach($list_variant as $variant)
                                        <a onclick="get_variant('{{$product_id}}','{{$variant->variant_id}}')">{{$variant->variant_name}} : {{$variant->variant_value}} </a><br>
                                    @endforeach
                                @endif
                                */ ?>
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
                                                  
                                                     <option  value="<?php echo e($value->variant_value); ?>"><?php echo e($value->variant_value); ?></option>
                                                   
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>
                                            <?php $i++; ?>
                                            <?php endif; ?>
                                            
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    <?php endif; ?>
                                 
                                </div>
                                <div class="short-description">
                                    <div class="price-box-small">
                                        
                                        <span class="old-price">
                                        <?php echo e($priceOld); ?> &#8363; 
                                        </span>
                                       
                                        
                                        <span itemprop="price" class="special-price" style="font-size: 18px;"><?php echo e($priceNew); ?> &#8363;</span>
                                    </div>
                                    <p class="des_content"><?php echo e($excerpt); ?>...</p>
                                </div>
                                <div class="add-to-cart">
                                    <label for="qty">Số lượng:</label>
                                    <div class="pull-left">
                                        <div class="custom pull-left">
                                            <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="fa fa-minus"></i></button>
                                            <input onkeypress="isAlphaNum(event);"  type="text" title="Số lượng" value="1" maxlength="12" id="qty" name="quantity" class="input-text qty"  oninput="validity.valid||(value='');" >
                                            <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Thuộc tính variant của sp  -->
                                    <input type="hidden" id="variant_id" name="variant_id" value="">
                                <!-- End thuộc tính -->
                                <div class="qnt-addcart">
                                    <button class="btn-cart add_to_cart"  title="MUA NGAY" type="submit"><i class="fa fa-shopping-basket"></i>&nbsp;&nbsp;MUA NGAY</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT-VIEW-AREA-END -->

    <!-- PRODUCT-OVERVIEW-TAB-START -->
    <div class="product-overview-tab">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="tab-menu-area">
                        <ul class="tab-menu">
                            <li class="active">
                                <a data-toggle="tab" href="#description">Thông tin sản phẩm</a>
                            </li>
                            <!--
                            <li>
                                <a data-toggle="tab" href="#reviews">Chính sách vận chuyển</a>
                            </li>
                            -->
                            <li>
                                <a data-toggle="tab" href="#reviews2">Tag sản phẩm</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div id="description" class="tab-pane fade in active">
                            <?php echo $content; ?>

                        </div>
                        <!--
                        <div id="reviews" class="tab-pane fade">
                            Khong biet
                        </div>
                        -->
                        <div id="reviews2" class="tab-pane fade">
                            <!-- Widget 9 -->
                            <?php $taxs = get_taxonomy_product_detail( 'product_tag', $slug) ?>
                            <?php if($taxs): ?>
                                <?php $__currentLoopData = $taxs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <a href="<?php echo e(url('collections/'.$tax->taxonomy_slug)); ?>"><?php echo e($tax->taxonomy_name); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            <?php endif; ?>
                            <!-- End Widget 9 -->
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT-OVERVIEW-TAB-END -->

    <!--Sản phẩm liên quan-->
        <!-- Widget 6 -->
        <?php $product_relateds = get_product_related('product_category', $slug, 8 ) ?>
        <?php if($product_relateds): ?>
        <div class="related-product-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h2 class="area-headding"><span>Sản phẩm liên quan</span></h2>
                        <div class="row">
                            <div class="product-carusol-9 product-carusol-detail">
                            <?php $__currentLoopData = $product_relateds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <div class="pad_tab_pr">
                                    <!-- SINGLE-PRODUCT START-->
                                    <div class="single-product">
                                        <?php if($product['check_discount']): ?>
                                        <span class="onsale">
                                        <span class="sale-bg"></span>
                                        <span class="sale-text">-<?php echo e($product['percentage']); ?>%</span>
                                        </span>
                                        <?php endif; ?>
                                        <div class="product-img">
                                            <!-- Add code html -->
                                            <div class="image-product-thumbnail-preview">
                                               <div class="image-product-thumbnail">
                                                     <div class="centered">
                                                        <a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>">
                                                           <img src="<?php echo e(get_image_url($product['product_image_id'])); ?>" alt="<?php echo e($product['product_title']); ?>">
                                                        </a>
                                                     </div>
                                                </div>
                                            </div>
                                            <!-- End -->
                                            <!--
                                            <a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="<?php echo e($product['product_title']); ?>">
                                            <img src="<?php echo e(get_image_url($product['product_image_id'])); ?>" class="primary-image" alt="<?php echo e($product['product_title']); ?>"> 
                                            <img class="secondary-image" alt="<?php echo e($product['product_title']); ?>" src="<?php echo e(get_image_url($product['product_image_id'])); ?>"> 
                                            </a>
                                            -->
                                            <div class="action-button">
                                                <form action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" method="post" class="variants" id="product-actions-1478216" enctype="multipart/form-data">
                                                    <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                                    <input type="hidden" name="quantity" value="1" />
                                                    <div class="add-to-wishlist">
                                                        <input type="hidden" id="variant_id" name="variant_id" value="">
                                                        <button class="button color-tooltip btn-cart add_to_cart" title="MUA NGAY"><i class="fa fa-shopping-basket"></i>&nbsp;MUA NGAY</button>
                                                    </div>
                                                    <div class="quickviewbtn">
                                                        <a class="color-tooltip" data-toggle="tooltip" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="Chi tiết"><i class="fa fa-retweet"></i></a>
                                                    </div>

                                                    
                                                </form>
                                            </div>
                                        </div>
                                        <div class="product-name-ratting">
                                            <h3 class="product-name">
                                                <a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="<?php echo e($product['product_title']); ?>"><?php echo e($product['product_title']); ?></a>
                                            </h3>
                                            <div class="price-box-small">
                                                <?php if($product['price_old']): ?>
                                                <span class="old-price">
                                                <?php echo e(number_format($product['price_old'],0,'.','.')); ?>&#8363;
                                                </span>
                                                <?php endif; ?>
                                                <span class="special-price">
                                                <?php echo e(number_format($product['price_new'],0,'.','.')); ?>&#8363;
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- SINGLE-PRODUCT END-->
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <!-- End Widget 6 -->
    
    <!--end sản phẩm liên quan-->
    
</div>
    <script>
        function get_variant(product_id, variant_id){
                 $.ajax({
                   async: false,
                   method: 'get',
                   url: '/collections/'+product_id+'/'+variant_id,
                   success: function(data) {
                   product_meta = data;
                   $('.price-box-small').html('<span class="old-price">'+product_meta['price_old']);
                   $('.price-box-small').html('<span itemprop="price" class="special-price" style="font-size: 18px;">'+product_meta['price_new']);
                   $('#variant_id').val(variant_id);
                 }});
                 //number_format($product['price_new'], 0, ',', '.');
                
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
                          $('.qnt-addcart').html('<button class="btn-cart add_to_cart"  title="HẾT HÀNG" type="button"><i class="fa fa-shopping-basket"></i>&nbsp;&nbsp;HẾT HÀNG</button>');
                          $('.price-box-small').html('<span class="old-price"> 0đ'); 
                          $('.price-box-small').html('<span itemprop="price" class="special-price" style="font-size: 18px;">0đ');
                          $('.old-price').html('<span id="old-price-48" class="price" display="none">');
                      }else{
                          $('.price-box-small').html('<span class="old-price">'+data.price_old); 
                          $('.price-box-small').html('<span itemprop="price" class="special-price" style="font-size: 18px;">'+data.price_new);
                          $('.qnt-addcart').html('<button class="btn-cart add_to_cart"  title="MUA NGAY" type="submit"><i class="fa fa-shopping-basket"></i>&nbsp;&nbsp;MUA NGAY</button>');
                          $('#variant_id').val(data.variant_id);
                      }    
                  },
              });
      });
          
  </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien3.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>