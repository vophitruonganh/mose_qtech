<?php $__env->startSection('content'); ?>

<?php echo $__env->make('frontend.decima_store.includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="col-sm-8 col-md-9">
    <div class="row">
        <div class="shop-list-filters col-sm-6 col-md-8">
            <span class="filters-result-count"><span><?php echo e(count($products)); ?></span> Sản phẩm</span>
        </div>
        <div class="shop-list-filters col-sm-6 col-md-4">
            <div class="filters-sort">
                <form id="filter_product" class="form-inline pull-left" action="">
                <div class="btn-group myFilters" >
                    <select id="sortBy" name="sortBy" class="btn btn-default dropdown-toggle" >
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
<div class="clearfix"></div>
<div class="col-xs-12">


<!-- ISOTOPE GALLERY -->
    <div id="isotopeContainers" class="shop-product-list isotope">
    <?php if(count($products)!=0): ?>
    <?php $i=0; ?>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="isotope-item color3 size1 size2" data-date="January 1, 2012" data-popular="40" data-rating="4.0">
  <!-- SHOP FEATURED ITEM -->
        <div class="shop-item shop-item-featured overlay-element">
            <div class="overlay-wrapper">
                <a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>"><img src="<?php echo e(get_image_url($product['product_image_id'])); ?>" alt="<?php echo e($product['product_title']); ?>" style="height: 200px; height: 214px"></a>
                <div class="overlay-contents">
                    <form action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" method="post" class="variants" id="form_order_<?php echo e($product['product_id']); ?>" enctype="multipart/form-data">
                         <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                         <input type="hidden" name="quantity" value="1" />
                         <div class="shop-item-actions">
                            <button class="btn btn-primary btn-block" type="button" onclick="order(<?php echo e($product['product_id']); ?>)">Add to cart</button>
                            <button class="btn btn-default btn-block" type="button" onclick="window.location='<?php echo e(url("collections/".$product['product_slug'])); ?>'">View details</button>
                        </div>
                    </form>
                </div>
  
    </div>
    <div class="item-info-name-price">
      <h4><a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>"><?php echo e($product['product_title']); ?></a></h4>
      <span class="price"><?php echo e(number_format($product['price_new'],0,'.','.')); ?>&#8363;</span>
    </div>
  </div>
  <!-- !SHOP FEATURED ITEM -->
</div>
<?php $i++; ?>
<?php if($i%3 ==0): ?>
<div class="clearfix"></div>
<?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php endif; ?>

</div>
<!-- !ISOTOPE GALLERY -->


</div>


</div>
<div class="col-md-12 article-wrapper">
    <!-- PAGER -->
    <nav>
        <div class="pager">
            <ul class="list-inline">
                <?php if($products->currentPage()!=1): ?>
                  <li class="prev"><a href="<?php echo e(str_replace('/?','?',$products->url($products->currentPage()-1))); ?>" class="icon-decima-small-arrow-left"><span class="sr-only">Prev</span></a></li>
                <?php endif; ?>
                <?php for($i=1;$i<=$products->lastPage();$i=$i+1): ?>
                  <li class=" <?php echo e(($products->currentPage()==$i)? 'active' : ''); ?>"><a href="<?php echo e(str_replace('/?','?',$products->url($i))); ?>"><?php echo e($i); ?></a></li>
                <?php endfor; ?>
                <?php if($products->currentPage()!=$products->lastPage()): ?>
                  <li class="next"><a href="<?php echo e(str_replace('/?','?',$products->url($products->currentPage()+1))); ?>" class="icon-decima-small-arrow-right"><span class="sr-only">Next</span></a></li>  
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <!-- !PAGER -->
</div>
</div>


</div>
<!-- / row -->

</div>
</section>

<script type="text/javascript">

    $("#sortBy").change(function(event){

           $("#filter_product").submit();

           event.preventDefault();

    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.decima_store.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>