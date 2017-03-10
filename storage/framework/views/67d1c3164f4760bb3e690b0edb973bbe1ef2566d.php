<?php $__env->startSection('content'); ?>
<main class="wrapper main-content" role="main">
   <!-- /snippets/breadcrumb.liquid -->
   <nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
      <div class="inner">
         <a href="/" title="Quay lại trang chủ">Trang chủ</a>
         <span aria-hidden="true">/</span>
         <span>Danh sách sản phẩm </span>
      </div>
   </nav>
   <!-- /templates/collection.liquid -->
   <div class="grid--rev">
      <div class="grid__item large--three-quarters collection-grid">
         <header class="collection__info section-header">
            <h1 class="section-header__title">Sản phẩm </h1>
            <div class="rte rte--header space-10">
            </div>
         </header>
         <div class="collection__sort section-header">
            <div class="section-header__right">
               <!-- /snippets/collection-sorting.liquid -->
               <div class="form-horizontal">
                  <form class="filter-xs" method="POST" id="filter_product">
                     <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                     <label for="SortBy">Sắp xếp bởi</label>
                     <select name="sortBy" id="sortBy">
                        <option selected="" value="default">Mặc định</option>
                        <option value="price-asc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='price-asc')? 'selected' : ''); ?>>Giá: Tăng dần</option>
                        <option value="price-desc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='price-desc')? 'selected' : ''); ?>>Giá: Giảm dần</option>
                        <option value="alpha-asc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-asc')? 'selected' : ''); ?>>Tên: A-Z</option>
                        <option value="alpha-desc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-desc')? 'selected' : ''); ?>>Tên: Z-A</option>
                        <option value="created-asc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='created-asc')? 'selected' : ''); ?>>Cũ nhất</option>
                        <option value="created-desc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='created-desc')? 'selected' : ''); ?>>Mới nhất</option>
                     </select>
                  </form>
               </div>
               <div class="collection-view left">
                  <button type="button" title="Lưới xem" onclick="window.location='<?php echo e(url("collections?view=grid")); ?>'" class="change-view change-view--active" data-view="grid">
                  <span class="icon-fallback-text">
                  <span class="icon icon-grid-view" aria-hidden="true"></span>
                  <span class="fallback-text">Lưới xem</span>
                  </span>
                  </button>
                  <button type="button" onclick="window.location='<?php echo e(url("collections?view=list")); ?>'" title="Danh sách xem" class="change-view" data-view="list">
                  <span class="icon-fallback-text">
                  <span class="icon icon-list-view" aria-hidden="true"></span>
                  <span class="fallback-text">Danh sách xem</span>
                  </span>
                  </button>
               </div>

            </div>
         </div>
         <div class="grid-uniform">
            <?php if(isset($posts) == false): ?>
               <?php echo e('akjsdhakjsdhkasjdh'); ?>

            <?php endif; ?>
            <?php if(count($posts)!=0): ?>
               <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <!-- /snippets/product-grid-item.liquid -->
                  <div class="grid__item  large--one-quarter medium--one-third ">
                     <div class="product-container" data-publish-date="">
                        <div class="product-image ">
                           <div class="product-thumbnail">
                              <a href="<?php echo e(url('collections/'.$post['post_slug'])); ?>" title="">
                              <img class="product-featured-image" src="<?php echo e(loadFeatureImage($post['post_featured_image'])); ?>" alt="<?php echo e($post['post_title']); ?>">
                              <img class="back-img" src="<?php echo e(loadFeatureImage($post['post_featured_image'])); ?>" alt="<?php echo e($post['post_title']); ?>">
                              </a>
                           </div>
                           <!-- /.product-thumbnail -->
                        <?php if($post['percent_discount']): ?>
                           <span class="label on-sale">Giảm</span>
                        <?php endif; ?>
                        </div>
                        <!-- /.product-image -->
                        <div class="product-meta">
                           <h4 class="product-name">
                              <a href="<?php echo e(url('collections/'.$post['post_slug'])); ?>" title="<?php echo e($post['post_title']); ?>"><?php echo e($post['post_title']); ?></a>
                           </h4>
                           <!-- /.product-product -->
                           <p class="description"><?php echo e($post['post_excerpt']); ?></p>
                           <div class="product-price">
                              <span class="amout">
                              <?php if($post['price_old']>0): ?>
                              <del class="sale-price"><?php echo e(number_format($post['price_old'],0,'.','.')); ?>₫</del>
                              <?php endif; ?>
                              <span><?php echo e(number_format($post['price_new'],0,'.','.')); ?>₫</span>
                              </span>
                           </div>
                           <!-- /.product-price -->
                           <form method="post" action="<?php echo e(url('cart/order/'.$post['post_slug'])); ?>" class="add-to-cart">
                              <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                              <input type="hidden" name="quantity" value="1" />
                              <!-- <input type="submit" value="Buy now" class="btn" /> -->
                              <button type="submit" name="add" class="btn">
                              <i class="fa fa-shopping-cart"></i>Thêm vào giỏ
                              </button>
                           </form>
                        </div>
                        <!-- /.product-meta -->

                     </div>
                     <!-- product-container -->
                  </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <?php endif; ?>
         </div>
         <div class="pagination">
            <?php if($posts->currentPage()!=1): ?>
               <span class="prev">
                  <a href="<?php echo e(str_replace('/?','?',$posts->url($posts->currentPage()-1))); ?>">←</a>
              </span>
            <?php endif; ?>
            <?php for($i=1;$i<=$posts->lastPage();$i=$i+1): ?>

               <span class="<?php echo e(($posts->currentPage()==$i)? 'page current' : 'page'); ?>">
                  <a href="<?php echo e(str_replace('/?','?',$posts->url($i))); ?>"><?php echo e($i); ?></a>
               </span>
            <?php endfor; ?>
            <?php if($posts->currentPage()!=$posts->lastPage()): ?>
               <span class="next">
                  <a class="next-arrow" href="<?php echo e(str_replace('/?','?',$posts->url($posts->currentPage()+1))); ?>" title="2">→</a>
               </span>
            <?php endif; ?>
         </div>
      </div>
      <div class="sidebar grid__item large--one-quarter">
         <div class="collection-sidebar inner">
            <!-- /snippets/collection-sidebar.liquid -->
               <!-- Widget 9999999999 -->
                  <?php echo showWidget('widget9999999999'); ?>

               <!-- End Widget 9999999999 -->
            <!-- end category sidebar -->

<!--            <div class="widget-product widget">
               <h4 class="widget__title">Sản phẩm bán chạy</h4>
               <div class="widget__content">
               </div>
            </div>-->
            <!-- end widget 1 -->
            <div class="widget-ads widget">
               <a href="<?php echo e($cms['url']); ?>"><img src="<?php echo e($cms['image']); ?>" alt=""></a>
            </div>
            <!-- end advertising -->
            <div class="widget-cms widget">
               <h4 class="widget__title"><?php echo e($cms['text']); ?></h4>
               <em>
                  <?php echo $cms['textArea']; ?>

               </em>
            </div>
            <!-- end advertising --><em>
            </em>
         </div>
         <em>
         </em>
      </div>
      <em>
      </em>
   </div>
   <em>
   </em>
</main>

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

<?php echo $__env->make('frontend.giaodien20.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>