<?php $__env->startSection('content'); ?>

<div class="container">
   <div class="row">
      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
         <div class="col-lg-12 content-page" id="search">
            <span class="header-search header-page clearfix">
               <h1>Tìm kiếm</h1>
            </span>
            <span class="subtext">
            Kết quả tìm kiếm cho  <strong><?php echo e($search); ?></strong>.
            </span>
         </div>
         <div class="col-lg-12  results content-page content-product-list product-list">
            <div class="row">
               <!-- Begin results -->
               <?php if( count($products)>0 ): ?>
               <?php $i = 0; ?>
                  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <?php $i++; ?>
                  <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12 pro-loop">
                  <!--sử dụng  -->
                     <div class="product-block product-resize fixheight" style="height: 383px;">
                        <div class="product-img image-resize view view-third clearfix" style="height: 285px;">
                        <?php if( $product['check_discount']>0 ): ?>
                           <div class="product-sale">
                              <span><label class="sale-lb">-</label> <?php echo e($product['percentage']); ?>%</span>
                           </div>
                        <?php endif; ?>
                           <a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="Tai nghe bluetooth thể thao 4.0 HBS HV-800">
                           <img alt="<?php echo e($product['product_title']); ?>" src="<?php echo e(get_image_url($product['product_image_id'])); ?>">
                           </a>
                        </div>
                        <div class="product-detail clearfix">
                           <h3 class="pro-name"><a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="<?php echo e($product['product_title']); ?>"><?php echo e($product['product_title']); ?></a></h3>
                           <!-- sử dụng pull-left -->
                           <div class="content_price">
                              <p class="pro-price"><?php echo e(number_format($product['price_new'],0,'.','.')); ?>₫</p>
                              <p class="pro-price-del"><del class="compare-price"> <?php if($product['price_old']>0): ?>
                                            <?php echo e(number_format($product['price_old'],0,'.','.')); ?>₫
                                        <?php endif; ?></del>
                              </p>
                           </div>
                           <div class="actions clearfix">
                              <a class="btn-like mask-view"  href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" data-handle="/products/tai-nghe-bluetooth-the-thao-4-0-hbs-hv-800"><i class="fa fa-bar-chart"></i><span>Xem nhanh</span></a>
                               <form id="form_order_<?php echo e($i); ?>"action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" method="post" class="variants" id="product-actions-<?php echo e($product['product_id']); ?>" enctype="multipart/form-data">
                                        <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                       <input type="hidden" name="quantity" value="1" />
                                       <a class="btn-buy ajax_add_to_cart " data-variant="1004976322" onclick="order(<?php echo e($i); ?>)">
                                       <span> + Thêm vào giỏ </span> <i class="shoppping-cart"><img src="<?php echo e(asset('template/giaodien4/images/Capture.PNG')); ?>"></i></a> 
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                     
                <div class="col-lg-12 pagination-blog">
                  <div class="row">
                     <!-- Begin: Phân trang blog --> 
                     <div id="pagination" class="pw">
                     
                        <?php if($products->lastPage() > 1): ?>
                           <?php if($products->currentPage() != 1): ?>
                                <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs">
                                 <a class="prev" href="<?php echo e($products->url($products->currentPage()-1)); ?>"><span><i class=" fa fa-angle-left"></i>Trang trước  </span></a>
                            </div>
                           <?php endif; ?>
                            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 text-center">
                           <?php for($i = 1; $i <= $products->lastPage(); $i++): ?>
                                 <?php if($products->currentPage() == $i): ?>
                                  <span class="page-node current"><?php echo e($i); ?></span>
                                 <?php else: ?> 
                                    <a class="page-node" href="<?php echo e($products->url($i)); ?>"><?php echo e($i); ?></a>
                                 <?php endif; ?>
                                   
                            <?php endfor; ?>
                             </div>

                           <?php if($products->currentPage() != $products->lastPage()): ?>
                              <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs">
                                 <a class="pull-right next" href="<?php echo e($products->url($products->currentPage()+1)); ?>"><span>Trang sau <i class="fa fa-angle-right"></i></span></a>
                              </div>
                           <?php endif; ?>
                        <?php endif; ?>
                      </div>
                     
                     <!-- End: Phân trang blog --> 
                  </div>
               </div>
                
               <?php else: ?>
                  Không có kết quả 
               <?php endif; ?>
         
          
      
            </div>
         </div>
         <!-- End results -->
      </div>
      
      <!-- /#search -->
      <style>
         div#search {
         float: left;
         width: 100%;
         outline: none;
         }
         .search-field {
         width: 100%!important;
         }
         input#go {
         width: 34px!important;
         height: 34px!important;
         float: right!important;
         background: url(//hstatic.net/0/0/global/design/theme-default/icon-search.png) #f5f5f5 center no-repeat;
         margin: 0px!important;
         font-size: 0px;
         position: relative!important;
         top:0px!important;
         }
         #search .search_box
         {
         width: calc(100% - 34px)!important;
         float: left;
         outline: none;
         padding: 0px 0px 0px 10px;
         }
         div#search {
         background: #fff;
         margin-top: 20px;
         padding: 15px 10px;
         margin-bottom: 20px;
         }
         span.header-search h1 {
         margin-top: 20px;
         margin-bottom: 0;
         }
      </style>
   </div>
</div>
					
 <script type="text/javascript">
   
    function order(i)
    {
         $("#form_order_"+i).submit();   
    }
   </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien4.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>