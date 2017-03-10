 </div> 
 <!-- end main-content-wrapper (header)-->
<footer class="footer-postions">
               <!--footer-->
               <div class="site-footer">
                  <div class="container">
                     <div class="row">
                        <div class="footer-service clearfix">
                          <?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                          <div class="list-service col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="ourservice-block">
                              <div class="media">
                                <div class="pull-left  ">
                                  <i class="fa <?php echo e($row['class']); ?>"></i>
                                </div>
                                <h4 class="ourservice-heading "><?php echo e($row['heading']); ?></h4>
                                <div class="ourservice-content"><?php echo e($row['content']); ?></div>
                              </div>
                            </div>
                          </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </div>
                     </div>
                     <div class="row">
                        <div class="footer-links clearfix">
                           <div class="footer-block col-lg-2 col-sm-2 col-md-2 col-xs-12">
                              <h4 class="footer-static-title"><?php echo e($links['heading']); ?></h4>
                              <div class="block_content toggle-footer" style="">
                                 <ul class="bullet">
                                    <?php unset($links['heading']); ?>
                                    <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <li><a href="<?php echo e($row['url']); ?>" title="<?php echo e($row['title']); ?>"><?php echo e($row['title']); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                 </ul>
                              </div>
                           </div>
                           <div class="footer-block col-lg-2 col-sm-2 col-md-2 col-xs-12">
                              <h4 class="footer-static-title"><?php echo e($support['heading']); ?></h4>
                              <div class="block_content toggle-footer" style="">
                                 <ul class="bullet">
                                    <?php unset($support['heading']); ?>
                                    <?php $__currentLoopData = $support; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <li><a href="<?php echo e($row['url']); ?>" title="<?php echo e($row['title']); ?>"><?php echo e($row['title']); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                 </ul>
                              </div>
                           </div>
                           <div class="footer-block col-lg-2 col-sm-2 col-md-2 col-xs-12">
                              <h4 class="footer-static-title"><?php echo e($service_menu['heading']); ?></h4>
                              <div class="block_content toggle-footer" style="">
                                 <ul class="bullet">
                                    <?php unset($service_menu['heading']); ?>
                                    <?php $__currentLoopData = $service_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <li><a href="<?php echo e($row['url']); ?>" title="<?php echo e($row['title']); ?>"><?php echo e($row['title']); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                 </ul>
                              </div>
                           </div>
                           <div class="footer-block col-lg-3 col-sm-3 col-md-3 col-xs-126">
                              <h4 class="footer-static-title">Kết nối với chúng tôi</h4>
                              <div class="footer-static-content">
                                 <!-- Tự thêm vô -->
                                 <div class="block_content">
                                    <div id="fb-root"></div>
                                    <script>(function(d, s, id) {
                                        var js, fjs = d.getElementsByTagName(s)[0];
                                        if (d.getElementById(id)) return;
                                        js = d.createElement(s); js.id = id;
                                        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=891777150888833";
                                        fjs.parentNode.insertBefore(js, fjs);
                                        }(document, 'script', 'facebook-jssdk'));
                                    </script>
                                    <div class="fb-page" 
                                        data-href="<?php echo e($facebook['url']); ?>"
                                        data-width="380" 
                                        data-hide-cover="false"
                                        data-show-facepile="false" 
                                        data-show-posts="false">
                                    </div>
                                </div>
                                <!-- End Tự thêm vô -->
                                 <!--
                                 <div class="fb-page" data-href="https://www.facebook.com/Mose.vn" data-width="100%" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">	</div>
                                 -->
                              </div>
                              <script>
                                 (function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s); js.id = id;
                                    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=263266547210244&version=v2.0";
                                    fjs.parentNode.insertBefore(js, fjs);
                                 }(document, 'script', 'facebook-jssdk'));
                              </script>
                           </div>
                           <div class="footer-block col-contact col-lg-3 col-sm-3 col-md-3 col-xs-12">
                              <div class="contact-footer">
                                 <p class="phone"><?php echo e($storeSetting['telephone']); ?></p>
                                 <!-- <span class="time-normal" style="">Thứ 2 - Thứ 6: 8:00-</span> -->
                                 <p class="marker-first"><i class="fa fa-map-marker"></i> <?php echo e($storeSetting['address']); ?></p>
                                 <p><i class="fa fa-envelope-o"></i><?php echo e($storeSetting['email']); ?></p>
                              </div>
                              <div id="icon-footer">
                                <?php $__currentLoopData = $social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <a class="_blank" href="<?php echo e($row['url']); ?>" target="_blank"><i class="fa <?php echo e($row['class']); ?>"></i></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="site-info">
                  <div class="container">
                     <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                           <div class="info-text">
                              <div class="link-copy">
                                 <a href="<?php echo e(url('collections?search=')); ?>">Tìm kiếm</a><span> | </span>
                                 <a href="<?php echo e(url('pages/gioi-thieu')); ?>">Giới thiệu</a>
                              </div>
                              <div class="copyright">
                                 <p>Copyright &copy; 2016 Qmtech. <a target='_blank' href='http://qmtech.com.vn/'>Powered by Qmtech</a>.</p>
                              </div>
                           </div>
                        </div>
                        <!--
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                           <div class="payment-footer">
                              <ul>
                                 <li><a href="#" title="Payment Method"><img src="<?php echo e(asset('template/giaodien4/images/payment-1.png')); ?>" alt="Payment"></a></li>
                                 <li><a href="#" title="Payment Method"><img src="<?php echo e(asset('template/giaodien4/images/payment-2.png')); ?>" alt="Payment"></a></li>
                                 <li><a href="#" title="Payment Method"><img src="<?php echo e(asset('template/giaodien4/images/payment-3.png')); ?>" alt="Payment"></a></li>
                                 <li><a href="#" title="Payment Method"><img src="<?php echo e(asset('template/giaodien4/images/payment-4.png')); ?>" alt="Payment"></a></li>
                              </ul>
                           </div>
                        </div>
                        -->
                     </div>
                  </div>
               </div>
            </footer>

</div>
</div>
</div>
  
   <!--Scroll to Top-->
   <a href="#" class="scrollToTop"> <i class="fa fa-chevron-up"></i></a>
   <script>
      jQuery(document).ready(function($){

            //Check to see if the window is top if not then display button
            $(window).scroll(function() {
                    if ($(this).scrollTop() > 100) {
                            $('.scrollToTop').fadeIn();
                    } else {
                            $('.scrollToTop').fadeOut();
                    }
            });

            //Click event to scroll to top
            $('.scrollToTop').click(function() {
                    $('html, body').animate({
                            scrollTop: 0
                    }, 600);
                    return false;
            });
      });

       function deletePerItem(id){
       var url = '/cart/delete_item/'+id;
          $.ajax({
            'url'       : url, 
            'type'      : 'GET',
            'success'   : function(data){
                if(data == 'Success'){
                    window.location = '/cart';
                }
            },
        });
        return false;

      
     }
   </script>

    

</body>
</html>