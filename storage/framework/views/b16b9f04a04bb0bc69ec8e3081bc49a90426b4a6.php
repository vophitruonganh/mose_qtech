<?php $__env->startSection('content'); ?>
 <!--breadcrumbs-->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="breadcrumbs">
                <ul>
                    <li class="home"> <a href="/" title="Trang chủ">Trang chủ<i class="sp_arrow">/</i></a></li>
                    <li><strong>Kết quả tìm kiếm</strong></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumbs--> 
<!--container-->
 <div class="shop-content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-nopad-right" style="padding-right: 0px;">
                <?php echo $__env->make('frontend.giaodien3.includes.category_sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-nopad-left" style="padding-left: 0px;">
                <?php echo $__env->make('frontend.giaodien3.includes.thirdBanner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!-- ALL-PRODUCT-AREA START-->
                <div class="all-product-area">
                    <!-- ALL-PRODUCT-TOP-ROW START-->
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="box_tool">
                                <!-- TOOLBAR START-->
                                <div class="view-mode"> 
                                    <a href="<?php echo e((!isset($_GET['view']) || $_GET['view']=='grid')? 'javascript:void(0);' : url('collections?view=grid&search='.$search)); ?>" class="<?php echo e((!isset($_GET['view']) || $_GET['view']=='grid')? 'active' : ''); ?>" >
                                    <i class="fa fa-th"></i>
                                    </a> 
                                    <!-- <a href="?view=list"> -->
                                    <a href="<?php echo e((isset($_GET['view']) && $_GET['view']=='list')? 'javascript:void(0);' : url('collections?view=list&search='.$search)); ?>" class="<?php echo e((isset($_GET['view']) && $_GET['view']=='list')? 'active' : ''); ?>">
                                    
                                    <i class="fa fa-th-list"></i>
                                    </a>
                                </div>
                                <div class="result-short pull-right">
                                    <p class="result-count"> Sắp xếp : </p>
                                    <form id="filter_product"  class="filter-xs" method="GET" >
                                        <input name="search" value="<?php echo e($search); ?>" type="hidden">
                                        <?php if(isset($_GET['view'])): ?>
                                        <input name="view" value="<?php echo e($_GET['view']); ?>" type="hidden">
                                        <?php endif; ?>
                                        <div class="orderby-wrapper">
                                            <select name="sortBy" id="sortBy" class="selectBox" style="padding: 0px 10px; height: 30px;">
                                                <option selected="" value="default">Mặc định</option>
                                                <option value="alpha-asc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-asc')? 'selected' : ''); ?>>A → Z</option>
                                                <option value="alpha-desc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-desc')? 'selected' : ''); ?>>Z → A</option>
                                                <option value="price-asc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='price-asc')? 'selected' : ''); ?>>Giá tăng dần</option>
                                                <option value="price-desc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='price-desc')? 'selected' : ''); ?>>Giá giảm dần</option>
                                                <option value="created-desc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='created-desc')? 'selected' : ''); ?>>Hàng mới nhất</option>
                                                <option value="created-asc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='created-asc')? 'selected' : ''); ?>>Hàng cũ nhất</option>
                                            </select>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- TOOLBAR END-->
                    </div>
                </div>
                <!-- ALL-PRODUCT-TOP-ROW END-->
                <!-- multi-columm -->
                <?php 
                    $i=0;
                    $today=time();
                ?>
                <?php if(count($products)!=0): ?>
                <div class="styl_collection multi-columns-row">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <?php
                        
                        $i++;
                    ?>
                    <div class="col-sm-6 col-lg-3 col-md-3 mar-bt15 col-xs-6 <?php if($i==1): ?> first-in-row <?php endif; ?>">
                        <!-- SINGLE-PRODUCT START-->
                        <div class="single-product">
                            <?php if( $product['check_discount']>0 ): ?>
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
                                    <form action="<?php echo e(url('cart/order/'.$product["product_slug"])); ?>" method="post" class="variants" id="product-actions-<?php echo e($product['product_id']); ?>" enctype="multipart/form-data">
                                        <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                        <div class="add-to-wishlist">
                                            <input type="hidden" name="quantity" value="1" />
                                            <input type="hidden" name="variantId" value="<?php echo e($product['product_id']); ?>">
                                            <button class="button color-tooltip btn-cart add_to_cart" title="MUA NGAY"><i class="fa fa-shopping-basket"></i>&nbsp;MUA NGAY</button>
                                        </div>
                                        <div class="quickviewbtn">
                                            <a class="color-tooltip" data-toggle="tooltip" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="" data-original-title="Chi tiết"><i class="fa fa-retweet"></i></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="product-name-ratting">
                                <h3 class="product-name">
                                    <a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="Dụng cụ cắt băng dính vàng"><?php echo e($product['product_title']); ?></a>
                                </h3>
                                <div class="price-box-small">
                                    <span class="old-price">
                                        <?php if($product['price_old']>0): ?>
                                            <?php echo e(number_format($product['price_old'],0,'.','.')); ?>₫
                                        <?php endif; ?>
                                    </span>
                                    <span class="special-price">
                                        <?php echo e(number_format($product['price_new'],0,'.','.')); ?>₫
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- SINGLE-PRODUCT END-->
                    </div>
                    <?php 
                        if($i==4){
                            $i=0;
                        }
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                
                    
                    <!--  SHOP-CONTENT-AREA START-->
                </div>
                <!-- end multi-columm -->

                <div class="paginations pull-right">
                    <?php echo e($products->links()); ?>

                </div>

                <?php
                /*
                <!-- PAGINATION-START -->
                <div class="col-xs-12 col-lg-12 col-md-12" style="padding:0px;">
                    <div class="paginations">
                        <ul>
                            @if($products->currentPage()!=1)
                            <li>
                                <a href="{{str_replace('/?','?',$products->url($products->currentPage()-1))}}">
                                    Trang trước
                                </a>
                            </li>
                            @endif
                            @for($i=1;$i<=$products->lastPage();$i=$i+1)
                            <li class="{{($products->currentPage()==$i)? 'current' : ''}}">
                                <a href="{{str_replace('/?','?',$products->url($i))}}">{{$i}}</a>
                            </li>
                            <!-- <li class="current"><a href="#" style="pointer-events:none">1</a></li>
                            <li><a href="/collections/all?page=2">2</a></li> -->
                            @endfor
                            <!-- <li><a href="/collections/all?page=3">3</a></li>
                            <li><a href="/collections/all?page=4">4</a></li> -->
                            @if($products->currentPage()!=$products->lastPage())
                            <li>
                                <a class="next-arrow" href="{{str_replace('/?','?',$products->url($products->currentPage()+1))}}" title="2">
                                    Trang sau
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- PAGINATION-START END-->
                */
                ?>
                
            </div>
            
            <!-- ALL-PRODUCT-AREA END-->
        </div>
        <?php else: ?>
        Không tìm thấy sản phẩm nào phù hợp
        <?php endif; ?>
    </div>
</div>
<!--end container-->
<script type="text/javascript">
    $("#sortBy").change(function(){
           $("#filter_product").submit();
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien3.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>