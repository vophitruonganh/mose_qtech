<?php $__env->startSection('content'); ?>


<div id="collection">
   <div class="breadcrumbs">
      <div class="container">
         <div class="row">
            <div class="col-md-12 ">
               <ol class="breadcrumb breadcrumb-arrow hidden-sm hidden-xs">
                  <li><a href="<?php echo e(url('/')); ?>" target="_self">Trang chủ</a></li>
                  <li class="active"><span><?php echo e($title_name); ?></span></li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <!-- Begin collection info -->
   <!-- Content-->
   <div class="container">
      <div class="row">
         <aside class="col-md-3">
            <!-- Sidebar menu-->
            <div class="list-group  hidden-sm hidden-xs" id="list-group-l">
               <ul class="nav navs sidebar menu" id="cssmenu">
                  <div class="mega-left-title">
                     <strong>Danh mục</strong>
                  </div>
                  <li class="item  first">
                     <a href="<?php echo e(url('/')); ?>">
                     <span>Trang chủ</span>
                     </a>
                  </li>
                  <li class="item  ">
                     <a href="<?php echo e(url('product.html')); ?>">
                     <span>Sản phẩm</span>
                     </a>
                  </li>
                  <?php
                  /*
                  <li class="item has-sub active ">
                     <a href="/collections/onsale">
                     <span class="lbl">Sản phẩm</span>
                     <span data-toggle="collapse" data-parent="#cssmenu" href="#sub-item-2" class="sign">
                     <img src="//hstatic.net/0/0/global/design/theme-default/arrow-down.png">
                     </span>
                     </a>
                     <ul class="nav children collapse" id="sub-item-2">
                        <li class="has-sub first">
                           <a href="/collections/dien-thoai" title="Điện thoại">
                           <span>Điện thoại</span>
                           <span class="sign drop-down">
                           <img src="//hstatic.net/0/0/global/design/theme-default/arrow-down.png">
                           </span>
                           </a>
                           <ul class="nav children collapse lve2">
                              <li class="even">
                                 <a href="/collections/dien-thoai" title="SamSung">
                                 <span>SamSung</span>
                                 </a>				
                              </li>
                              <li class="odd">
                                 <a href="/collections/dien-thoai" title="Sony">
                                 <span>Sony</span>
                                 </a>				
                              </li>
                              <li class="even">
                                 <a href="/collections/onsale" title="Khuyến mãi">
                                 <span>Khuyến mãi</span>
                                 </a>				
                              </li>
                           </ul>
                        </li>
                        <li class="">
                           <a href="/collections/phu-kien" title="Tai nghe">
                           <span>Tai nghe</span>
                           </a>
                        </li>
                        <li class="">
                           <a href="/collections/hot-products" title="Phụ kiện">
                           <span>Phụ kiện</span>
                           </a>
                        </li>
                        <li class="last">
                           <a href="/collections/qua-tang" title="Quà tặng">
                           <span>Quà tặng</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  */
                  ?>
                  <li class="item  ">
                     <a href="<?php echo e(url('news.html')); ?>">
                     <span>Blog</span>
                     </a>
                  </li>
                  <li class="item  ">
                     <a href="<?php echo e(url('page/gioi-thieu.html')); ?>">
                     <span>Giới thiệu</span>
                     </a>
                  </li>
                  <li class="item  last">
                     <a href="<?php echo e(url('contact.html')); ?>">
                     <span>Liên hệ</span>
                     </a>
                  </li>
               </ul>
            </div>
            <script>
               $(document).ready(function(){
               	//$('ul li:has(ul)').addClass('hassub');
               	$('#cssmenu ul ul li:odd').addClass('odd');
               	$('#cssmenu ul ul li:even').addClass('even');
               	$('#cssmenu > ul > li > a').click(function() {
               		$('#cssmenu li').removeClass('active');
               		$(this).closest('li').addClass('active');
               		var checkElement = $(this).nextS();
               		if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
               			$(this).closest('li').removeClass('active');
               			checkElement.slideUp('normal');
               		}
               		if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
               			$('#cssmenu ul ul:visible').slideUp('normal');
               			checkElement.slideDown('normal');
               		}
               		if($(this).closest('li').find('ul').children().length == 0) {
               			return true;
               		} else {
               			return false;
               		}
               	});
               
               	$('.drop-down').click(function(e){		
               		if ( $(this).parents('li').hasClass('has-sub') ){
               			e.preventDefault();
               			if($(this).hasClass('open-nav')){
               				$(this).removeClass('open-nav');
               				$(this).parents('li').children('ul.lve2').slideUp('normal').removeClass('in');
               			}else {
               				$(this).addClass('open-nav');
               				$(this).parents('li').children('ul.lve2').slideDown('normal').addClass('in');
               			}
               		}else {
               
               		}
               	});
               
               });
               
               $("#list-group-l ul.navs li.active").parents('ul.children').addClass("in");
            </script>
            <!--Bộ lọc-->
            <!-- Sidebar menu-->
            <?php
            /*
            <div class="wrap-in">
               <nav class="" id="top-nav-collec" role="navigation">
                  <div class="row">
                     <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="block sns-snsproductspecials sns-productlist margin-repon" id="layered_block_left">
                           <div class="slider-inner">
                              <div type="button" class="collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
                                 <span class="sr-only">Toggle navigation</span>
                                 <div class=" ">
                                    <p class="title_block">Tìm theo</p>
                                 </div>
                              </div>
                           </div>
                           <div class="navbar-collapse collapse" style="border-top-style: none; height: 0px;" id="bs-example-navbar-collapse-2" aria-expanded="false">
                              <div class="row">
                                 <div class="block-title hidden-xs">
                                    <strong></strong>
                                 </div>
                             
                           </div>
                        </div>
                     </div>
                  </div>
               </nav>
            </div>
            */
            ?>
           
         </aside>
         <!--Sidebar Menu-->
         <div class="col-md-9 col-sm-12 col-xs-12 content-collection">
            <div class="row">
               <div class="main-content">
                  <div class="col-md-12 img-span3-collections">
                     <div class="img-collec" style="padding-bottom:30px;">
                        <a href="<?php echo e($seventhBanner['url']); ?>">
                        <img src="<?php echo e($seventhBanner['image']); ?>">	
                        </a>	
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                           <h1>
                              <?php echo e($title_name); ?>

                           </h1>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                           <div class="browse-tags">
                              <span>Sắp xếp theo:</span>
                              <form id="filter_product" class="filter-xs" method="get">
                               
                              <span class="custom-dropdown custom-dropdown--white">
                                 <select class="sort-by custom-dropdown__select custom-dropdown__select--white" name="sortBy" id="sortBy">
                                    <!-- <option value="manual">Sản phẩm nổi bật</option> -->
                                    <option value="created-desc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='created-desc')? 'selected' : ''); ?>>Mới nhất</option>
                                    <option value="created-asc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='created-asc')? 'selected' : ''); ?>>Cũ nhất</option>
                                    <option value="price-asc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='price-asc')? 'selected' : ''); ?>>Giá: Tăng dần</option>
                                    <option value="price-desc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='price-desc')? 'selected' : ''); ?>>Giá: Giảm dần</option>
                                    <option value="alpha-asc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-asc')? 'selected' : ''); ?>>Tên: A-Z</option>
                                    <option value="alpha-desc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-desc')? 'selected' : ''); ?>>Tên: Z-A</option>
                                    
                                 </select>
                              </span>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12 content-product-list">
                     <div class="product-list-view row grid products-grid">
                     <?php if(count($products)>0): ?>
                     <?php $i=0; ?>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                              <?php $i++; ?>

                           <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12 pro-loop">
                              <!--sử dụng  -->
                              <div class="product-block product-resize fixheight" style="height: 314px;">
                                 <div class="product-img image-resize view view-third clearfix" style="height: 216px;">
                                 <?php if( $product['check_discount']>0 ): ?>
                                    <div class="product-sale">
                                       <span><label class="sale-lb">-</label> <?php echo e($product['percentage']); ?>%</span>
                                    </div>
                                 <?php endif; ?>
                                    <a href="<?php echo e(url('product-detail/'.$product['product_slug'].'.html')); ?>" title="<?php echo e($product['product_title']); ?>">
                                    <img alt="<?php echo e($product['product_title']); ?>" src="<?php echo e(get_image_url($product['product_image_id'])); ?>">
                                    </a>
                                 </div>
                                 <div class="product-detail clearfix">
                                    <h3 class="pro-name"><a href="<?php echo e(url('product-detail/'.$product['product_slug'].'.html')); ?>" title="<?php echo e($product['product_title']); ?>"><?php echo e($product['product_title']); ?></a></h3>
                                    <!-- sử dụng pull-left -->
                                    <div class="content_price">
                                       <p class="pro-price">
                                       <?php echo e(number_format($product['price_new'],0,'.','.')); ?>₫
                                          </p>
                                       <p class="pro-price-del"><del class="compare-price">
                                       <?php if($product['price_old']>0): ?>
                                           <?php echo e(number_format($product['price_old'],0,'.','.')); ?>₫
                                           <?php endif; ?></del>
                                       </p>
                                    </div>
                                    <div class="actions clearfix">


                                     <form id="form_order_<?php echo e($i); ?>"action="<?php echo e(url('order/'.$product['product_slug'].'.html')); ?>" method="post" class="variants" id="product-actions-<?php echo e($product['product_id']); ?>" enctype="multipart/form-data">
                                        <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                         <input type="hidden" name="quantity" value="1" />
                                       <a class="btn-like mask-view" href="<?php echo e(url('product-detail/'.$product['product_slug'].'.html')); ?>" data-handle="/products/pin-sac-du-phong-10000-mah-x-mobile"><i class="fa fa-bar-chart"></i><span>Xem nhanh</span></a>
                                       <a class="btn-buy ajax_add_to_cart " data-variant="1004706200" onclick="order({{}})">

                                     



                                       <span> + Thêm vào giỏ </span> <i class="shoppping-cart"><img src="//hstatic.net/796/1000055796/1000090795/Capture.PNG?v=138"></i></a> 
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <?php endif; ?>
                     </div>
                  </div>
                  <div class="col-md-12 pw-default">
                     <div id="pagination" class="pw">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End collection info -->
   <!-- Begin no products -->
   <!-- End no products -->
</div>
					 

  <script type="text/javascript">
    $("#sortBy").change(function(){
           $("#filter_product").submit();
    });
    function order(i)
    {
         $("#form_order_"+i).submit();   
    }
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien4.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>