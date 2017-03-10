<!-- Doi Tac -->
 <div id="partners" class="home-section wow zoomIn">
    <div class="fix-width">
       <div class="section-header">
          <h3 class="section-title"><?php echo e($partner['heading']); ?></h3>
       </div>
       <div class="section-content">
          <div class="slides">
            <?php unset($partner['heading']); ?>
            <?php $__currentLoopData = $partner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <div class="article entry">
              <a href="<?php echo e($row['url']); ?>">
                <img src="<?php echo e($row['image']); ?>" />
              </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
          </div>
       </div>
    </div>
 </div>
<!-- End Doi Tac -->

<!-- Footer -->
<footer class="footer">
         <div class="footer-wrapper fix-width">
            <!-- Begin footer navigation -->
              <div class="widget menu-footer">
               <h4 class="widget-title">Liên Kết Nhanh</h4>
               <ul class="menu">
                  <li><a href="<?php echo e(url('collections?search=')); ?>" title="Tìm kiếm">Tìm kiếm</a></li>
                  <li><a href="<?php echo e(url('pages/gioi-thieu')); ?>" title="Giới thiệu">Giới thiệu</a></li>
                  <!-- <li><a href="https://lkt-discover.myQMTECH.com//collections/services" title="Dịch Vụ">Dịch Vụ</a></li> -->
                  <li><a href="<?php echo e(url('collections')); ?>" title="Sản Phẩm">Sản Phẩm</a></li>
                  <li><a href="<?php echo e(url('post')); ?>" title="Tin Tức">Tin Tức</a></li>
                  <li><a href="<?php echo e(url('pages/contact')); ?>" title="Liên Hệ">Liên Hệ</a></li>
               </ul>
            </div>
            <!-- End footer navigation -->
            <!--
            <div class="newsletter widget">
               <h4 class="widget-title">Đăng ký nhận tin</h4>
               Cơ hội cập nhật kịp thời những bài viết mới nhất trên blog, các dự án nổi bật và ưu đãi đặc biệt từ Chúng tôi.
               <form action="" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
                  <input type="email" value="" placeholder="Email của bạn" name="EMAIL" id="mail" />
                  <input type="submit" class="button newsletter" value="Đăng ký nhận tin" name="subscribe" id="subscribe" />
               </form>
            </div>
            -->
            <div class="socials widget">
               <h4 class="widget-title">Liên kết với chúng tôi</h4>
               <div class="content-socials">
                  <div class="fb-page" data-href="<?php echo e($facebook['url']); ?>" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">
                     <div class="fb-xfbml-parse-ignore">
                        <blockquote cite="<?php echo e($facebook['url']); ?>"><a href="<?php echo e($facebook['url']); ?>">Qm-Tech</a></blockquote>
                     </div>
                  </div>
                  <script>(function(d, s, id) {
                     var js, fjs = d.getElementsByTagName(s)[0];
                     if (d.getElementById(id)) return;
                     js = d.createElement(s); js.id = id;
                     js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.4&appId=732043950258590";
                     fjs.parentNode.insertBefore(js, fjs);
                     }(document, 'script', 'facebook-jssdk'));
                  </script>
               </div>
            </div>
            <div class="copyright widget">
               <h4 class="widget-title">Liên Hệ</h4>
               <div class="content-copyright">
                  QM-Tech<br />
                  Hotline: <?php echo e($storeSetting['telephone']); ?><br />
                  Email: <?php echo e($storeSetting['email']); ?><br />
                  Website: http://qmtech.com.vn/
                  <!--
                  <ul class="credit-cards clearfix">
                     <li><img src="asset/images/icon-cc-visa.png?v=583" alt="Visa" /></li>
                     <li><img src="asset/images/icon-cc-mastercard.png?v=583" alt="MasterCard" /></li>
                     <li><img src="asset/images/icon-cc-amex.png?v=583" alt="Amex" /></li>
                  </ul>
                  -->
               </div>
            </div>
         </div>
         <!-- Begin copyright -->
         <div class="powered-by">
            <div class="fix-width">
               <p>Bản quyền được đăng ký &copy; 2016 cho <a href="/" title="">LKT-Business</a> | <a target='_blank' href='http://www.qmtech.com.vn'>Powered by QMTECH</a></p>
            </div>
         </div>
         <!-- End copyright -->
      </footer>
      <!-- End footer -->
      <div class="overlay-background"></div>
      <div id="mobile-menu" class="show-mobile">
         <span class="close-menu-mobile"><i class="fa fa-close"></i></span>
         <div class="main-menu-mobile">
            <ul class="menu">
               <li>
                  <a href="/" class=" current">
                  <span>Trang chủ</span></a>
               </li>
               <li>
                  <a href="/pages/about-us" class="">
                  <span>Giới thiệu</span></a>
               </li>
               <li>
                  <a href="/collections/dich-vu" class="">
                  <span>Dịch Vụ</span></a>
               </li>
               <li>
                  <a href="/collections/tat-ca-san-pham" class="">
                  <span>Sản phẩm</span></a>
               </li>
               <li>
                  <a href="/blogs/news" class="">
                  <span>Tin Tức</span></a>
               </li>
               <li>
                  <a href="/pages/frontpage" class="">
                  <span>Liên Hệ</span></a>
               </li>
               <li><a class="reg" href="/account/register" title="layout.customer.create_account">Đăng ký</a></li>
               <li> <a class="log-only" href="/account/login" title="layout.customer.login">Đăng nhập</a></li>
            </ul>
         </div>
      </div>
       <script type="text/javascript">
           function deletePerItem(id){
             var url = 'cart/delete_item/'+id;
                $.ajax({
                  'url'       : url, 
                  'type'      : 'GET',
                  'success'   : function(data){
                      if(data == 'Success'){
                          window.location = 'cart';
                      }
                  },
              });
              return false;
         
           }
      </script>
      <script src="<?php echo e(asset('template/giaodien9/asset/js/owl.carousel.min.js?v=583')); ?>" type='text/javascript'></script>
      <script src="<?php echo e(asset('template/giaodien9/asset/js/wow.js?v=583')); ?>" type='text/javascript'></script>
      <script src="<?php echo e(asset('template/giaodien9/asset/js/jquery.zoom.js?v=583')); ?>" type='text/javascript'></script>
      <script src="<?php echo e(asset('template/giaodien9/asset/js/jquery.tweet.js?v=583')); ?>" type='text/javascript'></script>
      <script src="<?php echo e(asset('template/giaodien9/asset/js/jquery.fancybox.js?v=583')); ?>" type='text/javascript'></script>
   </body>
</html>
<!-- End Footer -->