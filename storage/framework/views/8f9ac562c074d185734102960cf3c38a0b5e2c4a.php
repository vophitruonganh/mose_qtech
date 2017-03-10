<?php $__env->startSection('content'); ?>

      
<div class="breadcrumbs">
<div class="container">
  <div class="row">
     <ul>
        <li class="home"> <a href="<?php echo e(url('/')); ?>" title="Trang chủ">Trang chủ</a><span>|</span></li>
        <li><strong><?php echo e($title_name); ?></strong></li>
     </ul>
  </div>
</div>
</div> 
     

<div class="main-container col2-left-layout">
   <div class="main container">
      <div class="row">
      
        
        <section class="col-main col-sm-9 col-sm-push-3">
   <div class="category-description std">
      <div class="slider-items-products">
         <div id="category-desc-slider" class="product-flexslider hidden-buttons">
            <div class="slider-items slider-width-col1" style="opacity: 0;"> 
            </div>
         </div>
      </div>
   </div>
   <div class="category-title">
      <h1><?php echo e($title_name); ?></h1>
   </div>
   <div class="category-products">
      <div class="toolbar">
         <div class="sorter">
            <div class="view-mode"> 
               <a href="<?php echo e(url('collections/'.$slug.'?view=grid')); ?>" title="Grid" class="button-active"><i class="fa fa-th"></i></a> 
               <span title="List"><i class="fa fa-list"></i></span>
            </div>
         </div>
         <div id="sort-by">
          <form id="filter_product" method="get">
            
            <label class="left" style="padding: 10px 0 2px 0px;">Sắp xếp theo: </label>
            <select name="sortBy" id="sortBy" class="selectBox" style="padding: 0px 10px; height: 34px;">
               <option selected="" value="default">Mặc định</option>
               <option value="alpha-asc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-asc')? 'selected' : ''); ?>>A → Z</option>
               <option value="alpha-desc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-desc')? 'selected' : ''); ?>>Z → A</option>
               <option value="price-asc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='price-asc')? 'selected' : ''); ?>>Giá tăng dần</option>
               <option value="price-desc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='price-desc')? 'selected' : ''); ?>>Giá giảm dần</option>
               <option value="created-desc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='created-desc')? 'selected' : ''); ?>>Hàng mới nhất</option>
               <option value="created-asc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='created-asc')? 'selected' : ''); ?>>Hàng cũ nhất</option>
            </select>
          </form>
         </div>
      </div>
      <ol id="products-list" class="products-list">
        <?php if(count($products)>0): ?>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
             <li class="item even">
                <div class="product-image"> <a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="Xe đạp gấp Fornix FB2007-PRA14"> <img class="small-image" src="<?php echo e(get_image_url($product['product_image_id'])); ?>" width="230"> </a> </div>
                <div class="product-shop">
                   <h3 class="product-name"><a title="Xe đạp gấp Fornix FB2007-PRA14" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>"><?php echo e($product['product_title']); ?></a></h3>
                   <div class="desc std">
                      <p><?php echo e($product['product_excerpt']); ?><a class="link-learn" title="" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>">Xem thêm</a> </p>
                   </div>
                   <div class="price-box">
                      <?php if($product['price_old']>0): ?>
                        <p class="old-price"> <span class="price-label"></span> <span id="old-price-212" class="price"><?php echo e(number_format($product['price_old'],0,'.','.')); ?>₫</span> </p>
                      <?php endif; ?>
                      <p class="special-price"> <span class="price-label"></span> <span id="product-price-212" class="price"><?php echo e(number_format($product['price_new'],0,'.','.')); ?>₫</span> </p>
                   </div>
                   <form action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" method="post" class="variants" id="form_order_<?php echo e($product['product_id']); ?>" enctype="multipart/form-data">
                       <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                       <input type="hidden" name="quantity" value="1" />
                      <div class="actions">
                         <button onclick="order(<?php echo e($product['product_id']); ?>)" class="button btn-cart" title="Chọn sản phẩm " type="button"><span>Chọn sản phẩm </span></button>
                      </div>
                   </form>
                </div>
             </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <?php endif; ?>
         

         

       


      </ol>
      <div class="clearfix"></div>
      <div class="pull-right">
        <?php echo e($products->links()); ?>

      </div>
      <?php
      /*
      <div class="pager">
         <div class="pages">
            <ul class="pagination">
                @if($products->currentPage()!=1)
                            <li>
                                <a href="{{str_replace('/?','?',$products->url($products->currentPage()-1))}}">
                                    Trang trước
                                </a>
                            </li>
                            @endif
                            @for($i=1;$i<=$products->lastPage();$i=$i+1)
                            <li class="{{($products->currentPage()==$i)? 'active' : ''}}">
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
      */
      ?>
   </div>
</section>   
       <!-- Left -->
          <!--<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">-->
     <div class="col-left sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12 col-md-pull-9 col-lg-pull-9">
            <?php $list_cat = get_taxonomy_product('product_category') ?>
            <?php if($list_cat): ?>
            <div class="box_collection_pr">
               <div class="title_st">
                  <h2>Danh mục sản phẩm</h2>
                  <span class="arrow_title visible-md visible-md"></span>
                  <div class="show_nav_bar hidden-lg hidden-md"></div>
               </div>
               <div class="list_item">
                  <ul>
                    <?php $__currentLoopData = $list_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li> <a href="<?php echo e(url('collections/'.$cat->taxonomy_slug)); ?>"><?php echo e($cat->taxonomy_name); ?></a> </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </ul>
               </div>
            </div>
            <?php endif; ?>

            <?php $products = get_product_tax_limit($product_type_3,$product_slug_3,'5'); ?>
            <?php if($products): ?>
            <div class="popular-posts widget widget__sidebar stl_list_item">
               <div class="title_st">
                  <?php
                     $headingText = get_taxonomy_name($product_type_3,$product_slug_3);
                     if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
                  ?>
                  <h2><?php echo e($headingText); ?></h2>
                  <span class="arrow_title"></span>
               </div>
               <div class="widget-content">
                  <ul class="posts-list unstyled clearfix">
                     <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                     <li>
                        <figure class="featured-thumb" style="width:42%">
                           <a title="<?php echo e($product['product_title']); ?>" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>">
                           <img alt="<?php echo e($product['product_title']); ?>"  src="<?php echo e(get_image_url($product['product_image_id'])); ?>" style=" width: 100px;">
                           </a> 
                        </figure>
                        <!--featured-thumb-->
                        <h3><a title="<?php echo e($product['product_title']); ?>" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>"><?php echo e($product['product_title']); ?></a></h3>
                        <div class="price-box">
                           <p class="special-price"> 
                              <span class="price"><?php echo e(number_format($product['price_new'],0,'.','.')); ?>₫</span> 
                           </p>
                           <?php if($product['price_old']): ?>
                           <p class="old-price"> 
                              <span class="price-sep">-</span> 
                              <span class="price"><?php echo e(number_format($product['price_old'],0,'.','.')); ?>₫</span> 
                           </p>
                           <?php endif; ?>
                        </div>
                     </li>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </ul>
               </div>
               <!--widget-content--> 
            </div>
            <?php endif; ?>


         </div>

          <!-- end left -->
          
      
      </div>
   </div>
</div>

<script type="text/javascript">

    function order(i)
    {
         $("#form_order_"+i).submit();   
    }
    $("#sortBy").change(function(){
           $("#filter_product").submit();
    });
    

    $("#sortBy").change(function(){
           $("#filter_product").submit();
    });

</script>  
      

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien11.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>