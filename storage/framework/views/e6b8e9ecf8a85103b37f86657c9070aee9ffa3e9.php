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


<?php $__env->startSection('content'); ?>

<div id="maincontainer">
    <div class="container">
        <section id="product">
            <ul class="breadcrumb">
                <li><a href="/" target="_self">Trang chủ</a></li>
                <!--li><a href="/collections" target="_self">Danh mục</a></li-->
                <li class="active"><span><?php echo e($title); ?></span></li>
            </ul>
            <!-- Product Details-->
            <h1 class="heading1"><span class="maintext">Chi tiết sản phẩm</span></h1>
            <div class="row">
                <!-- Left Image-->
                <div class="col-lg-4">
                    <div id="surround">
                        <!--
                        <img class=" product-image-feature" src="//hstatic.net/025/1000032025/1/2015/8-7/ao-so-mi-1_master.png" alt="<?php echo e($title); ?>">
                        -->
                        <img style="" class="product-image-feature" src="<?php echo e($featureImage); ?>" alt="<?php echo e($title); ?>">
                        <div id="sliderproduct" class="">
                            <ul class="slides" >
                            <?php if(count($list_post_image)>0): ?>
                                <?php $__currentLoopData = $list_post_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <li class="product-thumb">
                                    <div class="img-thumb-wp">
                                        <a href="#" data-image="<?php echo e(get_image_url($img)); ?>" data-zoom-image="<?php echo e(get_image_url($img)); ?>">
                                            <img style="width: 80px; height: 80px" alt="<?php echo e($title); ?>" src="<?php echo e(get_image_url($img)); ?>" />
                                        </a>
                                    </div>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            <?php endif; ?>
                            </ul>
                        </div>
                        <script>
                            $(document).ready(function() {
                            
                                if($(".slides .product-thumb").length>4){
                                    $('#sliderproduct').flexslider({
                                        animation: "slide",
                                        controlNav: false,
                                        animationLoop: false,
                                        slideshow: false,
                                        itemWidth: 95,
                                        itemMargin: 10,
                                    });
                                }
                                if($(window).width() > 960){
                                    jQuery(".product-image-feature").elevateZoom({
                                        gallery:'sliderproduct',
                                        cursor: 'pointer',
                                        imageCrossfade: true,
                                        zoomType: "inner"
                                    });
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
                    </div>
                </div>
                <!-- Right Details-->
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h1 class="productname"><span class="bgnone"><?php echo e($title); ?></span></h1>
                                    <div class="variant">
                                        <?php if(count($list_variant_id)>1): ?>
                                            <?php $i=1; ?>
                                            <?php $__currentLoopData = $list_variant_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant_name): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php $list_variant_value = get_variant_meta_product_detail( $variant_name , $product_id ) ?>
                                                <div class="variant-name"><?php echo e($variant_name); ?></div>
                                                <input type="hidden" value="<?php echo e($variant_name); ?>" id="variant_name_<?php echo e($i); ?>">
                                                <select name="variant_option_<?php echo e($i); ?>" id="variant_option_<?php echo e($i); ?>">
                                                    <?php $__currentLoopData = $list_variant_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                         <option <?php if(in_array($value->variant_value,$list_variant_meta_value)): ?> selected <?php endif; ?> value="<?php echo e($value->variant_value); ?>"><?php echo e($value->variant_value); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                </select>
                                                <?php $i++; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        <?php endif; ?>
                                    </div>

                                    <div class="pt20">
                                        <!-- Begin social icons -->
                                        <?php if($comment_status == 'yes'): ?>
                                        <div class="addthis_toolbox addthis_default_style ">
                                            <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                            <a class="addthis_button_google_plusone" g:plusone:size="medium" g:plusone:count="false"></a>
                                        </div>
                                        <?php endif; ?>
                                        <script type="text/javascript" src="//s7.addthis.com/js/250/addthis_widget.js"></script>
                                        <!-- End social icons -->
                                    </div>

                                    <div class="productprice">
                                        <div class="productpageprice">
                                            <span class="spiral"></span><?php echo e($priceNew); ?>₫
                                        </div>
                                        <?php if($priceOld>0): ?>
                                        <div class="productpageoldprice">
                                            <span>Giá cũ :</span> <?php echo e($priceOld); ?>₫
                                        </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="clear"></div>
                                    <div class="quantityboxs">
                                        <form id="add-item-form" action="<?php echo e(url('cart/order/'.$slug)); ?>" method="post" class="variants clearfix">
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                            <input type="hidden" id="variant_id" name="variant_id" value="">
                                            <input type="hidden" id="product_id" name="product_id" value="<?php echo e($product_id); ?>">
                                            <!--
                                            <div class="select w50">
                                                <select id="product-select" name="id" style="display:none">
                                                    <option value="1003139553">Trắng - 225,000₫</option>
                                                    <option value="1003139585">Đen - 225,000₫</option>
                                                    <option value="1003139586">Xanh ngọc - 225,000₫</option>
                                                    <option value="1003139588">Xanh Đen - 225,000₫</option>
                                                    <option value="1003172126">Xanh bích - 225,000₫</option>
                                                </select>
                                            </div>
                                            -->
                                            <div class="clear"></div>
                                            <div class="select-wrapper ">
                                                <label><strong>Số lượng</strong></label>
                                                <input id="quantity" type="number" name="quantity" min="1" value="1" class="tc item-quantity" />
                                            </div>
                                            <ul class="productpagecart">
                                                <li>                    
                                                    <button id="add-to-cart" type="submit" class=" btn-detail addtocart btn-color-add btn-min-width btn-mgt" name="add"> 
                                                    Thêm vào giỏ
                                                    </button>
                                                    <!-- <button id="add-to-cart"   class=" btn-detail addtocart btn-color-add btn-min-width btn-odernow" name="add"> 
                                                    Mua ngay
                                                    </button> -->
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                    <div class="pt20">
                                        <!-- Begin tags -->
                                        <!-- Widget 88888 -->
                                       <?php /* {!!showWidget('widget88888')!!} */ ?>
                                       <!--
                                        <div class="tag-wrapper">
                                             <label>
                                             Tags:
                                             </label>
                                             <ul class="">
                                                <li class="active">
                                                   <a href="/collections/all/ao-so-mi">áo sơ mi</a>
                                                </li>
                                                <li class="active">
                                                   <a href="/collections/all/ao-so-mi-han-quoc">ao sơ mi hàn quốc</a>
                                                </li>
                                                <li class="active">
                                                   <a href="/collections/all/ao-nam">áo nam</a>
                                                </li>
                                             </ul>
                                          </div>
                                          -->
                                        <!-- End Widget 88888 -->
                                        <!-- End tags -->
                                    </div>
                                </div>
                                <!--
                                <div class="col-lg-6">
                                    <div class="product-right-col">
                                        <ul class="guides">
                                            <li><a href="http://simple-one.myharavan.com/pages/huong-dan" title="" class="guide guide_1">1</a></li>
                                            <li><a href="http://simple-one.myharavan.com/pages/huong-dan-chon-size-so" title="" class="guide guide_2">2</a></li>
                                            <li><a href="http://simple-one.myharavan.com/pages/phuong-thuc-thanh-toan" class="guide guide_3">3</a></li>
                                        </ul>
                                        <ul class="guides">
                                            <li><a href="http://simple-one.myharavan.com/pages/quy-dinh-do-tra" title="" class="guide guide_4">4</a></li>
                                            <li><a href="http://simple-one.myharavan.com/pages/phuong-thuc-giao-nhan" title="" class="guide guide_5">5</a></li>
                                        </ul>
                                        <div class="guides_text">
                                            <p>1.<a href="#" title=""> Hướng dẫn mua hàng</a> </p>
                                            <p>2. <a href="http://simple-one.myharavan.com/pages/huong-dan-chon-size-so" title="">Hướng dẫn chọn size số</a></p>
                                            <p>3. <a href="http://simple-one.myharavan.com/pages/phuong-thuc-thanh-toan" title="">Phương thức thanh toán</a></p>
                                            <p>4. <a href="http://simple-one.myharavan.com/pages/quy-dinh-do-tra" title="">Phương thức đổi, trả hàng</a></p>
                                            <p>5.<a href="http://simple-one.myharavan.com/pages/phuong-thuc-giao-nhan" title=""> Phương thức giao nhận</a></p>
                                        </div>
                                    </div>
                                </div>
                                -->
                            </div>
                            <!-- Product Description tab & comments-->
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="productdesc">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#description">Mô tả sản phẩm</a>
                    </li> 
                    <?php if($comment_status == 'yes'): ?>
                    <li><a href="#comment-tab">Bình luận</a></li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="description">
                        <?php echo $content; ?>

                    </div>
                    <div class="tab-pane active" id="comment-tab">
                        <div id="fb-root"></div>
                        <div class="fb-comments" data-href="<?php echo e(url('collections/'.$slug)); ?>" data-numposts="5" width="100%" data-colorscheme="light"></div>
                        <!-- script comment fb -->
                        <script type="text/javascript">(function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s); js.id = id;
                            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
                            fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));
                        </script>
                    </div>
                </div>
            </div>
            
        </section>
        <!-- Product Related -->
        <!-- Widget 99999 -->
       <?php /* {!!showWidget('widget99999')!!} */ ?>
        <!--
        <section class="row" id="related">
         <div id="like">
            <h1 class="heading1"><span class="maintext">Sản phẩm khác</span></h1>
            <ul class="thumbnails">
               <li class="col-lg-3 col-sm-3">
                  <a class="prdocutname" href="/collections/thoi-trang-nam/products/ao-so-mi-hoa-tiet-ca-chep-asm654" title="Áo Sơ Mi Họa Tiết Cá Chép">Áo Sơ Mi Họa Tiết Cá Chép</a>
                  <div class="thumbnail">
                     <a href="/collections/thoi-trang-nam/products/ao-so-mi-hoa-tiet-ca-chep-asm654" title="Áo Sơ Mi Họa Tiết Cá Chép"><img alt="Áo Sơ Mi Họa Tiết Cá Chép" src="//hstatic.net/025/1000032025/1/2015/8-12/ao-sm1_large.png" alt="" /></a>
                     <div class="pricetag">
                        <span class="spiral"></span><a href="/collections/thoi-trang-nam/products/ao-so-mi-hoa-tiet-ca-chep-asm654" class="productcart">Mua ngay</a>
                        <div class="price">
                           <div class="pricenew">185,000₫</div>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="col-lg-3 col-sm-3">
                  <a class="prdocutname" href="/collections/thoi-trang-nam/products/ao-thun-co-co-tay-dai-vang" title="Áo thun có cổ tay dài Vàng">Áo thun có cổ tay dài Vàng</a>
                  <div class="thumbnail">
                     <a href="/collections/thoi-trang-nam/products/ao-thun-co-co-tay-dai-vang" title="Áo thun có cổ tay dài Vàng"><img alt="Áo thun có cổ tay dài Vàng" src="//hstatic.net/025/1000032025/1/2015/8-13/aothunvang_large.png" alt="" /></a>
                     <div class="pricetag">
                        <span class="spiral"></span><a href="/collections/thoi-trang-nam/products/ao-thun-co-co-tay-dai-vang" class="productcart">Mua ngay</a>
                        <div class="price">
                           <div class="pricenew">185,000₫</div>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="col-lg-3 col-sm-3">
                  <a class="prdocutname" href="/collections/thoi-trang-nam/products/ao-so-mi-hoa-tiet-ca-chep-asm654-1" title="Quần Kaki Hàn Quốc Xanh Đen">Quần Kaki Hàn Quốc Xanh Đen</a>
                  <div class="thumbnail">
                     <a href="/collections/thoi-trang-nam/products/ao-so-mi-hoa-tiet-ca-chep-asm654-1" title="Quần Kaki Hàn Quốc Xanh Đen"><img alt="Quần Kaki Hàn Quốc Xanh Đen" src="//hstatic.net/025/1000032025/1/2015/8-12/q-kaki_large.png" alt="" /></a>
                     <div class="pricetag">
                        <span class="spiral"></span><a href="/collections/thoi-trang-nam/products/ao-so-mi-hoa-tiet-ca-chep-asm654-1" class="productcart">Mua ngay</a>
                        <div class="price">
                           <div class="pricenew">185,000₫</div>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="col-lg-3 col-sm-3">
                  <a class="prdocutname" href="/collections/thoi-trang-nam/products/so-mi-nam-han-quoc-rcsm42" title="Sơ mi nam Hàn quốc RCSM42">Sơ mi nam Hàn quốc RCSM42</a>
                  <div class="thumbnail">
                     <a href="/collections/thoi-trang-nam/products/so-mi-nam-han-quoc-rcsm42" title="Sơ mi nam Hàn quốc RCSM42"><img alt="Sơ mi nam Hàn quốc RCSM42" src="//hstatic.net/025/1000032025/1/2015/8-7/78_943828f8-0050-4827-542b-f0bc7d4b6f0a_large.png" alt="" /></a>
                     <div class="pricetag">
                        <span class="spiral"></span><a href="/collections/thoi-trang-nam/products/so-mi-nam-han-quoc-rcsm42" class="productcart">Mua ngay</a>
                        <div class="price">
                           <div class="pricenew">340,000₫</div>
                        </div>
                     </div>
                  </div>
               </li>
            </ul>
            
         </div>
      </section>
      -->
        <!-- End Widget 99999 -->
        <script>
            $(document).ready(function(){
                    $('.product-thumb img').click(function(){
                            $('.product-thumb').removeClass('active');
                            $(this).parents('.product-thumb').addClass('active');
                    });
                    $('.product-thumb:first').addClass('active');
            })
        </script>
        <script>
            $('.tab-content #comment-tab').addClass('hides');
            $('.tab-content #comment-tab> li').eq(0).addClass('active');
            $('.tab-content > div').eq(0).addClass('active');
            $(document).ready(function(){
             $('#myTab > li > a').click(function(){
              $('.tab-content #comment-tab').removeClass('hides');
            
              $('#myTab > li').removeClass('active');
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
        
        <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>
        <script>
            function get_variant(product_id, variant_id){
                 $.ajax({
                   async: false,
                   method: 'get',
                   url: '/collections/'+product_id+'/'+variant_id,
                   success: function(data) {
                   product_meta = data;
                   $('.productpageprice').html('<span class="spiral"></span>'+product_meta['price_new']);
                 }});
                 //number_format($product['price_new'], 0, ',', '.');
                 
                
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
                   data[variant_name_1] = variant_value_1;
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
                            if(data ==0){
                                $('.product-image-feature').attr('src','');
                                $('.productpagecart').html('<li><button id="add-to-cart" type="button"   class=" btn-detail addtocart btn-color-add btn-min-width btn-mgt" name="add">Hết hàng</button></li>')
                                $('.productpageprice').html('<span class="spiral"></span>0đ');
                            }else{
                                $('.product-image-feature').attr('src',data.image);
                                $('.productpageprice').html('<span class="spiral"></span>'+data.price_new);
                                $('.productpagecart').html('<li><button id="add-to-cart" type="submit"   class=" btn-detail addtocart btn-color-add btn-min-width btn-mgt" name="add">Thêm vào giỏ</button></li>');
                                $('#variant_id').val(data.variant_id);

                            }    
                        },
                    });
            });
                
        </script>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien10.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>