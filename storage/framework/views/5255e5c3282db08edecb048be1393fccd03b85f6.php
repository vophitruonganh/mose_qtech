<?php $__env->startSection('content'); ?>

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
               <div class="inner">
                  <ul>
                     <li class="home">
                        <a title="Quay lại trang chủ" href="/">Trang chủ</a>
                     </li>
                     <!--
                        <li>
                            <a href="/may-anh-canon"> / Máy ảnh Canon</a>
                            <span><i class="fa fa-angle-double-right" aria-hidden="true"></i> </span>
                        </li>
                        -->
                     <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                     <li class="cl_breadcrumb"><?php echo e($title); ?>

                     <li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div itemscope itemtype="http://schema.org/Product">
         <meta itemprop="url" content="/canon-eos-80d">
         <meta itemprop="image" content="//bizweb.dktcdn.net/100/091/136/products/canon-eos-80-d-1-1-min.jpg?v=1468298756140">
         <meta itemprop="shop-currency" content="">
         <section class="main-container col1-layout">
            <div class="main container">
               <div class="col-main">
                  <div class="row product_info mg_bt_10 bd_red">
                     <div class="product-view">
                        <div class="product-essential">
                           <div class="product-img-box col-lg-4 col-md-4 col-sm-4 col-xs-12 prd_view_slide  wow bounceInLeft animated">
                              <div class="product-image">
                                 <div class="large-image">
                                    <a href="<?php echo e($featureImage); ?>" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20">
                                    <!--
                                    <img src="<?php echo e(asset('template/giaodien7/img/canon-eos-80-d-1-1-min.jpg')); ?>">
                                    -->
                                    <img class="product-image-feature" src="<?php echo e($featureImage); ?>" alt="<?php echo e($title); ?>">
                                    </a>
                                 </div>
                                 <div class="flexslider flexslider-thumb">
                                    <ul class="previews-list slides">
                                       <?php if( count($list_post_image) > 0 ): ?>
                                           <?php $__currentLoopData = $list_post_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                           <li>
                                              <a href="<?php echo e(get_image_url($img)); ?>" class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '<?php echo e(get_image_url($img)); ?>' ">
                                              <img src="<?php echo e(get_image_url($img)); ?>" alt = ""/>
                                              </a>
                                           </li>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                       <?php endif; ?>
                                    </ul>
                                 </div>
                              </div>
                              <div class="clear"></div>
                           </div>
                           <div class="col-lg-5 col-md-5 col-sm-8 col-xs-12 ">
                              <div class="product_information mg_bt">
                                 <link itemprop="availability" href="http://schema.org/InStock">
                                 <div class="product_title">
                                    <h3 class="fw600"><?php echo e($title); ?></h3>
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
                                 <div class="product_vendor">
                                    
                                 </div>
                                 <div class="product_price">
                                    <div class="price-block">
                                       <div class="price-box">
                                          <p class="special-price"> <span class="price-label">Giá </span> <span class="price"><?php echo e($priceNew); ?>&#8363;</span> </p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="product_content">
                                    <h5 class="fw600">Mô tả :</h5>
                                    <div class="cl_old"><?php echo e($excerpt); ?></div>
                                 </div>
                              </div>
                              <div class="product_color_quantity_buy mg_bt">
                                 <div class="add-to-box">
                                    <div class="add-to-cart">
                                       <form action="<?php echo e(url('cart/order/'.$slug)); ?>" method="post" enctype="multipart/form-data" id="add-to-cart-form">
                                          <input type="hidden" id="product_id" name="product_id" value="<?php echo e($product_id); ?>">
                                          <input type="hidden" id="variant_id" name="variant_id" value="">
                                          <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                          <div class="prd_detail_quantity">Số lượng</div>
                                          <div class="pull-left">
                                             <div class="custom pull-left">
                                                <input type="number" value="1" name="quantity" min="1" class="form-control prd_quantity" id="qty">

                                             </div>
                                          </div>
                                          <div class="pull-left button-submit">
                                             <button class="btn btn_buynow bg_main add_to_cart" title="Mua ngay"><span>Mua ngay</span></button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!--
                           <div class="col-lg-3 col-md-3 hidden-sm hidden-xs prd_detail_col3 ">
                              <div>
                                 <img src="<?php echo e(asset('template/giaodien7/img/free_deliverd.jpg')); ?>" height="23" width="29" alt="Miễn phí vận chuyển" />
                                 <p>Miễn phí vận chuyển với đơn hàng lớn hơn <span class="fw_600">1.000.000 đ</span></p>
                              </div>
                              <div>
                                 <img src="<?php echo e(asset('template/giaodien7/img/giaohangngaysaukhidat.jpg')); ?>" height="30" width="29" alt="Giao hàng ngay">
                                 <p>Giao hàng ngay sau khi đặt hàng <span class="txt_i">(áp dụng với Hà Nội & HCM)</span></p>
                              </div>
                              <div>
                                 <img src="<?php echo e(asset('template/giaodien7/img/doitra.jpg')); ?>" height="23" width="30" alt="Đổi trả trong 3 ngày">
                                 <p>Đổi trả trong 3 ngày, thủ tục đơn giản</p>
                              </div>
                              <div>
                                 <img src="<?php echo e(asset('template/giaodien7/img/hoadon.jpg')); ?>" height="38" width="31" alt="Cung cấp hóa đơn">
                                 <p>Nhà cung cấp xuất hóa đơn cho sản phẩm này</p>
                              </div>
                           </div>
                           -->
                          <div class="col-lg-3 col-md-3 hidden-sm hidden-xs prd_detail_col3 ">  
                            <?php $__currentLoopData = $serviceInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <div>
                              <img src="<?php echo e($row['image']); ?>" height="23" width="29" alt="<?php echo e($row['heading']); ?>" />
                              <p><?php echo e($row['content']); ?></p>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                          </div>

                        </div>
                     </div>
                  </div>
                  <div class="row product_description bd_red">
                     <div class="prd_tabs">
                        <ul class="nav nav-tabs pd-nav" role="tablist">
                           <li role="presentation" class="active">
                              <a href="#pd-thongtin" aria-controls="pd-thongtin" role="tab" data-toggle="tab">
                                 <h5>Thông tin sản phẩm</h5>
                              </a>
                           </li>
                           
                           <li role="presentation">
                              <a href="#pd-thetag" aria-controls="pd-thetag" role="tab" data-toggle="tab">
                                 <h5>Thẻ tag</h5>
                              </a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div role="tabpanel" class="tab-pane active" id="pd-thongtin">
                              <div class="thongtin_content">
                                 <?php echo $content; ?>

                              </div>
                           </div>
                           <!-- tag sản phẩm -->
                           
                           <div role="tabpanel" class="tab-pane" id="pd-thetag">
                              <?php $taxs = get_taxonomy_product_detail('product_tag', $slug) ?>
                              <?php if($taxs): ?>
                              <div class="thetag_content">
                                 <?php $__currentLoopData = $taxs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                 <a href="<?php echo e(url('collections/'.$tax->taxonomy_slug)); ?>"><?php echo e($tax->taxonomy_name); ?></a>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                              </div>
                              <?php endif; ?>
                           </div>
                           <!--  end tag -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <!-- sản phẩm liên quan -->
       <!-- Widget kkkk -->
         <?php echo showWidget('widgetkkkk'); ?>

      <!-- End Widget kkkk -->
      
                        

      <!-- end sản phẩm liên quan -->
      <script src='//bizweb.dktcdn.net/assets/themes_support/option-selectors.js?16052016' type='text/javascript'></script>
      <script>


         jQuery(function($) {


             // Add label if only one product option and it isn't 'Title'. Could be 'Size'.


              // Hide selectors if we only have 1 variant and its title contains 'Default'.

              $('.selector-wrapper').hide();

               $('.selector-wrapper').css({
                   'text-align':'left',
                   'margin-bottom':'15px'
               });
               });
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
                          $('.button-submit').html('<button class="btn-style-add addtocart-modal" type="button">Hết hàng</button>');
                          $('.price-box-small').html('<span class="old-price"> 0đ'); 
                          $('.product-price').html('<span itemprop="price" class="special-price" style="font-size: 18px;">0đ');
                          $('.old-price').html('<span id="old-price-48" class="price" display="none">');
                      }else{
                          $('.product-image-feature').attr('src',data.image);
                          $('.price-box-small').html('<span class="old-price">'+data.price_old); 
                          $('.product-price').html('<span>'+data.price_new+'</span>');
                          $('.button-submit').html('<button class="btn-style-add addtocart-modal" type="submit">Thêm vào giỏ</button>');
                          $('#variant_id').val(data.variant_id);
                      }    
                  },
              });
      });
          
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien7.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>