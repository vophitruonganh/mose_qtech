<?php $__env->startSection('content'); ?>

<section id="collection" class="archive archive-product wrapper">
   <div class="fix-width home-section ">
      <div id="primary">
         <!-- Begin collection info -->
         <!-- Begin breadcrumb -->
         <div class="breadcrumb clearfix">
            <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo e(url('/')); ?>" title="LKT-Business" itemprop="url"><span itemprop="title">Trang chủ</span></a></span>
            <span class="arrow-space">&gt;</span>
            <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo e(url('collections')); ?>" title="Tất Cả Sản Phẩm" itemprop="url"><span itemprop="title">Tất Cả Sản Phẩm</span></a></span>
            <span class="arrow-space">&gt;</span> <strong></strong>
         </div>
         <!-- End breadcrumb -->
         <!-- Begin sort collection -->
         <header class="archive-header">
            <h1 class="collection-title archive-title">Tất Cả Sản Phẩm</h1>
            <div class="meta-tools">
               <div class="change-layout grid">
                  <span class="layout select" data-name="grid"><i class="fa fa-th"></i></span>
                  <span class="layout" data-name="row"><i class="fa fa-th-list"></i></span>
               </div>
            </div>
         </header>
         <!-- End sort collection -->
         <!-- Begin collection description -->
         <!-- End collection description -->
         <!-- End collection info -->
         <div class="products clearfix change-layout grid">
            <?php if(count($products)>0): ?>
               <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <div class="product project clear">
                     <a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" class="thumb">
                     <img src="<?php echo e(get_image_url($product['product_image_id'])); ?>" alt="<?php echo e($product['product_title']); ?>">
                     </a>
                     <div class="details">
                        <h4 class="title"><a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>">
                           <?php echo e($product['product_title']); ?>

                        </a>
                        </h4>
                        <p class="product-price">
                           <span class="price"><span class="contact"><?php echo e(number_format($product['price_new'],0,'.','.')); ?>đ</span></span>
                        </p>
                        <p class="product-description">
                        </p>
                        <form action="<?php echo e(url('cart/order/'.$product['product_slug'])); ?>" method="product" class="variants clearfix form-add-to-cart">
                           <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                           <!-- Begin product options -->
                           <input type="hidden" name="id" value="1004984987">
                           <input id="quantity" type="hidden" name="quantity" value="1" class="tc item-quantity">
                           <button type="submit" class="add-to-cart btn addtocart" name="add" value="fav_HTML">Giỏ Hàng</button>
                           <div class="cart-animation">1</div>
                           <!-- End product options -->
                        </form>
                        <a class="readmore button" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>">
                        Chi tiết
                        </a>
                        <span class="haravan-product-reviews-badge" data-id="1001418214"></span>
                     </div>
                  </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <?php endif; ?>
         </div>
         
         <div class="navigation clearfix"> 
            <?php if($products->currentPage()!=1): ?>
                    <a class="prev" href="<?php echo e(str_replace('/?','?',$products->url($products->currentPage()-1))); ?>">
                        Trang trước
                    </a>
            <?php endif; ?>
            <?php for($i=1;$i<=$products->lastPage();$i=$i+1): ?>
               <?php if($products->currentPage()==$i): ?>
                  <span class="page-node page-number current"><?php echo e($i); ?></span>
                 
               <?php else: ?>
                  <a class="<?php echo e(($products->currentPage()==$i)? 'page-node page-number current' : ''); ?>" href="<?php echo e(str_replace('/?','?',$products->url($i))); ?>"><?php echo e($i); ?></a>
               <?php endif; ?>
            <?php endfor; ?>
              
            <?php if($products->currentPage()!=$products->lastPage()): ?>
              <a class="next" href="<?php echo e(str_replace('/?','?',$products->url($products->currentPage()+1))); ?>" title="2">
                  Trang sau
              </a>
            <?php endif; ?>
         </div>

      </div>
      <div id="secondary" class="sidebar">
         <aside id="list-products" class="widget">
            <h4 class="widget-title">Danh Mục Sản Phẩm</h4>
            <div class="widget-content">
               <ul class="menu">
                  <li>
                     <a href="/collections/tat-ca-san-pham" class=" current">
                     Tất cả Mẫu Website</a>
                  </li>
                  <li>
                     <a href="/collections/website-doanh-nghiep" class="">
                     Website Doanh Nghiệp</a>
                  </li>
                  <li>
                     <a href="/collections/website-ban-hang" class="">
                     Website Bán Hàng</a>
                  </li>
               </ul>
            </div>
         </aside>
         <div class="widget support-online">
            <h4 class="widget-title">Hỗ Trợ Trực Tuyến</h4>
            <div class="widget-content">
               <div class="supports">
                  <div class="people">
                     <p><span class="name">Mr. Tin</span></p>
                     <a href="ymsgr:sendIM?tinhuynhquoctin" class="yahoo"><img alt="yahoo" src="//hstatic.net/668/1000057668/1000083168/yahoo.png?v=583"></a>
                     <a href="skype:huynhtin_92?call" class="skype"><img alt="skype" src="//hstatic.net/668/1000057668/1000083168/skype.png?v=583"></a>
                     <p></p>
                     <p><span class="label">Điện thoại:</span><span class="tel">0985 984 021</span></p>
                  </div>
                  <h4 style="margin: 0; font-size: 14px; font-size: 1.4rem; border-top: 1px solid #eee">Thời gian làm việc</h4>
                  Bất cứ khi nào bạn cần, hỗ trợ 24/7, 7 ngày trong tuần
               </div>
            </div>
         </div>
         <div class="widget product-sidebar">
            <h4 class="widget-title">Mẫu Website Chọn Nhiều</h4>
            <div class="widget-content">
               <div class="products sidebar">
                  <div class="product project clear">
                     <a href="/collections/website-doanh-nghiep/products/website-doanh-nghiep-01" class="thumb">
                     <img src="//hstatic.net/668/1000057668/1/2015/12-21/website-doanh-nghiep-01_large.png" alt="Website Doanh Nghiệp 01">
                     </a>
                     <div class="details">
                        <h4 class="title"><a href="/collections/website-doanh-nghiep/products/website-doanh-nghiep-01">
                           Website Doanh Nghiệp 01
                           </a>
                        </h4>
                        <p class="product-price">
                           <span class="price">1,000,000₫</span>
                        </p>
                        <p class="product-description">
                        </p>
                        <form action="/cart/add" method="post" class="variants clearfix form-add-to-cart">
                           <!-- Begin product options -->
                           <input type="hidden" name="id" value="1004985217">
                           <input id="quantity" type="hidden" name="quantity" value="1" class="tc item-quantity">
                           <button type="submit" class="add-to-cart btn addtocart" name="add" value="fav_HTML">Giỏ Hàng</button>
                           <div class="cart-animation">1</div>
                           <!-- End product options -->
                        </form>
                        <a class="readmore button" href="/collections/website-doanh-nghiep/products/website-doanh-nghiep-01">
                        Chi tiết
                        </a>
                        <span class="haravan-product-reviews-badge" data-id="1001418359"></span>
                     </div>
                  </div>
                  <div class="product project clear">
                     <a href="/collections/website-doanh-nghiep/products/website-doanh-nghiep-2" class="thumb">
                     <img src="//hstatic.net/668/1000057668/1/2015/12-21/website-doanh-nghiep-02_large.png" alt="Website Doanh Nghiệp 02">
                     </a>
                     <div class="details">
                        <h4 class="title"><a href="/collections/website-doanh-nghiep/products/website-doanh-nghiep-2">
                           Website Doanh Nghiệp 02
                           </a>
                        </h4>
                        <p class="product-price">
                           <span class="price"><span class="contact">Giá: vui lòng liên hệ</span></span>
                        </p>
                        <p class="product-description">
                        </p>
                        <form action="/cart/add" method="post" class="variants clearfix form-add-to-cart">
                           <!-- Begin product options -->
                           <input type="hidden" name="id" value="1004985222">
                           <input id="quantity" type="hidden" name="quantity" value="1" class="tc item-quantity">
                           <button type="submit" class="add-to-cart btn addtocart" name="add" value="fav_HTML">Giỏ Hàng</button>
                           <div class="cart-animation">1</div>
                           <!-- End product options -->
                        </form>
                        <a class="readmore button" href="/collections/website-doanh-nghiep/products/website-doanh-nghiep-2">
                        Chi tiết
                        </a>
                        <span class="haravan-product-reviews-badge" data-id="1001418364"></span>
                     </div>
                  </div>
                  <div class="product project clear">
                     <a href="/collections/website-doanh-nghiep/products/website-doanh-nghiep-3" class="thumb">
                     <img src="//hstatic.net/668/1000057668/1/2015/12-21/website-doanh-nghiep-03_large.png" alt="Website Doanh Nghiệp 03">
                     </a>
                     <div class="details">
                        <h4 class="title"><a href="/collections/website-doanh-nghiep/products/website-doanh-nghiep-3">
                           Website Doanh Nghiệp 03
                           </a>
                        </h4>
                        <p class="product-price">
                           <span class="price">1,000,000₫</span>
                        </p>
                        <p class="product-description">
                        </p>
                        <form action="/cart/add" method="post" class="variants clearfix form-add-to-cart">
                           <!-- Begin product options -->
                           <input type="hidden" name="id" value="1004985239">
                           <input id="quantity" type="hidden" name="quantity" value="1" class="tc item-quantity">
                           <button type="submit" class="add-to-cart btn addtocart" name="add" value="fav_HTML">Giỏ Hàng</button>
                           <div class="cart-animation">1</div>
                           <!-- End product options -->
                        </form>
                        <a class="readmore button" href="/collections/website-doanh-nghiep/products/website-doanh-nghiep-3">
                        Chi tiết
                        </a>
                        <span class="haravan-product-reviews-badge" data-id="1001418377"></span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>


<?php $__env->stopSection(); ?>     

<?php echo $__env->make('frontend.giaodien9.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>