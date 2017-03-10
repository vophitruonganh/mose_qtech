<?php $__env->startSection('content'); ?>
<div id="maincontainer">
<div class="container">
<section id="product">
    <!--  breadcrumb -->  
    <ul class="breadcrumb">
        <li><a href="<?php echo e(url('/')); ?>" target="_self">Trang chủ</a></li>
        <!--
        <li><a href="/collections/all" target="_self">Danh mục</a></li>
        -->
        <li class="active"><span><?php echo e($title_name); ?></span></li>
    </ul>
    <div class="row">
    <!-- Sidebar Start-->
    <aside class="col-lg-3">
        <!-- Category-->
        <!-- Widget 44444 -->
        <?php $list_cat = get_taxonomy_product( 'product_category')  ?>
        <div class="sidewidt">
             <h2 class="heading2"><span>Danh Mục sản phẩm</span></h2>
             <ul class="nav nav-list categories">
               <?php if($list_cat): ?>
                    <?php $__currentLoopData = $list_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li class="item  first">
                       <a href="<?php echo e(url('collections/'.$cat->taxonomy_slug)); ?>"> <?php echo e($cat->taxonomy_name); ?></a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?>
             </ul>
          </div>
        <?php /* {!!showWidget('widget44444')!!} */ ?>
        <!-- End Widget 44444 -->
        <?php $tax_products = (get_product_tax_limit('product_category','van-phong-pham','5')) ?>
        <?php if($tax_products): ?>
            <div class="sidewidt">
             <div class="product-list clearfix ">
                <h2 class="heading2">Sản phẩm mới nhất</h2>
                <ul class="bestseller">
                    <?php $__currentLoopData = $tax_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax_product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li>
                          <img width="50" height="50"  src="<?php echo e(get_image_url($tax_product['product_image_id'])); ?>" alt="<?php echo e($tax_product['product_title']); ?>" />
                          <a class="productname" href="<?php echo e(url('collections/'.$tax_product['product_slug'])); ?>" title="<?php echo e($tax_product['product_title']); ?>"><?php echo e($tax_product['product_title']); ?></a>
                          <span class="price"><?php echo e(number_format($tax_product['price_new'],0,'.','.')); ?>₫</span>
                          <?php if($tax_product['price_old']): ?>
                          <p class="priceold"><?php echo e(number_format($tax_product['price_old'],0,'.','.')); ?>₫</p>
                          <?php endif; ?>
                          <div class="clear"></div>
                       </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </ul>
             </div>
          </div>
        <?php endif; ?>
        

        <!-- Best Seller-->
        <!-- Widget 22222 -->
        <?php /*{!!showWidget('widget22222')!!} */ ?>
        <!-- End Widget 22222 -->
        <!-- BMust Have-->
        <?php $miniSlider = isset($mini_slider) ? $mini_slider: []; ?>
        <div class="sidewidt mt20">
            <div class="flexslider" id="mainsliderside">
                <ul class="slides">
                    <?php $__currentLoopData = $miniSlider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li>
                        <a href="<?php echo e($row['url']); ?>"><img src="<?php echo e($row['image']); ?>" ></a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </ul>
            </div>
        </div>
    </aside>
    <!-- Sidebar End-->
    <!-- Category-->
    <div class="col-lg-9">
        <!-- Category Products-->
        <section id="category">
            <h1 class="heading1">
                <span class="maintext"><?php echo e($title_name); ?></span>
            </h1>
            <!-- Sorting-->
            <div class="sorting well">
                <form id="filter_product" class=" form-inline pull-left" method="get">
                    Sắp xếp :
                    <select id="sortBy" name="sortBy" class="sort-by">
                        <option selected="" value="default">Mặc định</option>
                        <option value="alpha-asc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-asc')? 'selected' : ''); ?>>A → Z</option>
                        <option value="alpha-desc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-desc')? 'selected' : ''); ?>>Z → A</option>
                        <option value="price-asc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='price-asc')? 'selected' : ''); ?>>Giá tăng dần</option>
                        <option value="price-desc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='price-desc')? 'selected' : ''); ?>>Giá giảm dần</option>
                        <option value="created-desc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='created-desc')? 'selected' : ''); ?>>Hàng mới nhất</option>
                        <option value="created-asc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='created-asc')? 'selected' : ''); ?>>Hàng cũ nhất</option>
                    </select>
                    &nbsp;&nbsp;
                </form>
                <div class="btn-group pull-right">
                    <button class="btn" id="list"><i class="fa-th-list"></i>
                    </button>
                    <button class="btn btn-orange" id="grid"><i class="fa-th icon-white"></i></button>
                </div>
            </div>
            <!-- Category-->
            <section id="categorygrid">
                <?php if( count($products)>0 ): ?>
                <ul class="thumbnails grid row">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li class="col-lg-4 col-sm-6">
                        <a class="prdocutname" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="<?php echo e($product['product_title']); ?>"><?php echo e($product['product_title']); ?></a>
                        <div class="thumbnail">
                            <?php if($product['check_discount']): ?>
                            <span class="sale tooltip-test">Sale</span>
                            <?php endif; ?>
                            <!-- Add code html -->
                            <div class="image-thumbnail-preview">
                               <div class="image-thumbnail">
                                     <div class="centered">
                                        <a class="img-product" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="<?php echo e($product['product_title']); ?>">
                                           <img alt="<?php echo e($product['product_title']); ?>" src="<?php echo e(get_image_url($product['product_image_id'])); ?>"/>
                                        </a>
                                     </div>
                                </div>
                            </div>
                            <!-- End -->
                            <!--
                            <a class="img-product" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="<?php echo e($product['product_title']); ?>">
                            <img alt="<?php echo e($product['product_title']); ?>"
                                src="<?php echo e(get_image_url($product['product_image_id'])); ?>"/>
                            </a>
                            -->
                            <div class="pricetag">
                                <span class="spiral"></span><a href="#" onclick="order(<?php echo e($product['product_id']); ?>)" class="productcart">Mua ngay</a>
                                <div class="price">
                                    <div class="pricenew"><?php echo e(number_format($product['price_new'],0,'.','.')); ?>₫</div>
                                    <?php if($product['price_old']): ?>
                                    <div class="priceold"><?php echo e(number_format($product['price_old'],0,'.','.')); ?>₫</div>
                                    <?php endif; ?>
                                </div>
                                <form id="formOrder<?php echo e($product['product_id']); ?>" action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" method="post">
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                    <input type="hidden" name="quantity" value="1" />
                                </form>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </ul>
                <?php endif; ?>
                <?php if( count($products)>0 ): ?>
                <ul class="thumbnails list row">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li>
                        <div class="thumbnail">
                        <div class="col-lg-4 col-sm-4">
                            <span class="offer tooltip-test" data-original-title="" title="">Offer</span>
                            <a class="img-product" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="<?php echo e($product['product_title']); ?>"><img alt="<?php echo e($product['product_title']); ?>" src="<?php echo e(get_image_url($product['product_image_id'])); ?>" /></a>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <a class="prdocutname" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="<?php echo e($product['product_title']); ?>"><?php echo e($product['product_title']); ?></a>
                            <div class="productdiscrption">
                                <?php echo e($product['product_excerpt']); ?>

                                <div class="clear"></div>
                                <div class="pricetag mar35t">
                                    <span class="spiral"></span><a href="#" onclick="order(<?php echo e($product['product_id']); ?>)" class="productcart">Mua ngay</a>
                                    <div class="price">
                                        <div class="pricenew"><?php echo e(number_format($product['price_new'],0,'.','.')); ?>₫</div>
                                        <div class="priceold"><?php echo e(number_format($product['price_old'],0,'.','.')); ?>₫</div>
                                    </div>
                                    <form id="formOrder<?php echo e($product['product_id']); ?>" action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" method="post">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                        <input type="hidden" name="quantity" value="1" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </ul>
                <?php endif; ?>
                <div class="pull-right">
                    <?php echo e($products->render()); ?>

                <?php
                /*
                <ul class="pagination pull-right">
                    @if($products->currentPage()!=1)
                    <li>
                        <a class="prev fa fa-angle-left" href="{{ str_replace('/?','?',$products->url($products->currentPage()-1)) }}"><span>Trang trước</span></a>
                    </li>
                    @endif
                    <li>
                    @for($i=1;$i<=$products->lastPage();$i=$i+1)
                        @if( $products->currentPage() == $i )
                        <span class="page-node current">{{ $i }}</span>
                        @else
                        <a class="page-node" href="{{ str_replace('/?','?',$products->url($i)) }}">{{ $i }}</a>
                        @endif
                    @endfor
                    </li>
                    @if($products->currentPage()!=$products->lastPage())
                    <li class="">
                        <a href="{{ str_replace('/?','?',$products->url($products->currentPage()+1)) }}">Trang sau</a>
                    </li>
                    @endif
                </ul>
                */
                ?>
                </div>
            </section>
        </section>
        </div>
        </div>
</section>
</div>
</div>
<script type="text/javascript">
    $("#sortBy").change(function(){
           $("#filter_product").submit();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien10.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>