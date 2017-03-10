<!-- Footer section start -->
      <div class="footer">
         <div class="container clearfix">
            <div class="row">
               <div class="col-xs-12 col-sm-6 col-md-3 footer-block">
                  <h3>
                     Thông tin liên hệ
                  </h3>
                  <div class="footer-content">
                     <!-- Company plus<br/> -->
                     Địa chỉ: <?php echo e($storeSetting['address']); ?><br/>
                     Hotline: <?php echo e($storeSetting['telephone']); ?><br/>
                     Email: <?php echo e($storeSetting['email']); ?>

                  </div>
                  <!--
                  <h3>Đăng ký nhận tin</h3>
                  <div class="newsletter">
                     <form accept-charset='UTF-8' action='/account/contact' class='contact-form' method='post'>
                        <input name='form_type' type='hidden' value='customer'>
                        <input name='utf8' type='hidden' value='✓'>
                        <input type="hidden" id="contact_tags" name="contact[tags]" value="khách hàng tiềm năng, nhận thông báo" />
                        <input name="contact[email]" type="email" id="contact_email"  placeholder="Đăng ký email">
                        <button class="button button-sp">Đăng ký</button>
                     </form>
                  </div>
                  -->
               </div>
               <div class="col-xs-12 col-sm-6 col-md-3 footer-block">
                  <h3><?php echo e($policy['heading']); ?></h3>
                  <ul class="nav">
                    <?php unset($policy['heading']); ?>
                    <?php $__currentLoopData = $policy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li><a href="<?php echo e($row['url']); ?>"><i class="fa fa-angle-double-right"></i><?php echo e($row['title']); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </ul>
               </div>
               <?php  $posts = get_post_cat_limit('',3 )?>
               <?php if($posts): ?>
               <div class="col-xs-12 col-sm-6 col-md-3 footer-block">

                  <h3>
                     Bài viết mới nhất
                  </h3>
                  <div class="blog-list">
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                      <div class="blog-item">
                        <h4>
                           <a href="<?php echo e(url($post->post_slug)); ?>"><?php echo e($post->post_title); ?></a>
                        </h4>
                        <p class="time">
                           Ngày đăng <?php echo e(date('d/m/Y',$post->post_date)); ?>

                        </p>
                     </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </div>
                <?php endif; ?>  
               </div>
               <div class="col-xs-12 col-sm-6 col-md-3 footer-block">
                  <h3>
                     Fanpage facebook
                  </h3>
                  <div class="fb-like-box small--hide" data-href="<?php echo e($facebook['url']); ?>" style="width:100%; !important" data-height="200" data-width="260" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
               </div>
            </div>
         </div>
         <p class="copyright">Copyright &copy; 2016 - <a href="http://qmtech.com.vn">Powered by Qmtech</a></p>
      </div>
      <!-- Footer section end -->
      <!-- ScrollUp button start -->
      <div class="scrollup">
         <a href="https://company-plus.myharavan.com/javascript:void(0)">
         <i class="fa fa-chevron-up"></i>
         </a>
      </div>
      
 <!--      <script src="<?php echo e(asset('template/giaodien5/asset/js/option_selection.min.js')); ?>"></script> -->
  <!--     <script src="<?php echo e(asset('template/giaodien5/asset/js/api.jquery.min.js')); ?>"></script> -->
      <script type="text/javascript" src="<?php echo e(asset('template/giaodien5/asset/js/modernizr.custom.js')); ?>"></script>
      <script type="text/javascript" src="<?php echo e(asset('template/giaodien5/asset/js/jquery.bxslider.js')); ?>"></script>
      <script type="text/javascript" src="<?php echo e(asset('template/giaodien5/asset/js/jquery.placeholder.js')); ?>"></script>
      <script type="text/javascript" src="<?php echo e(asset('template/giaodien5/asset/js/jquery.inview.js')); ?>"></script>
      <script src="<?php echo e(asset('template/giaodien5/asset/js/jquery.slicknav.min.js')); ?>" type='text/javascript'></script>
      <!-- css3-mediaqueries.js for IE8 or older -->
      <script type="text/javascript" src="<?php echo e(asset('template/giaodien5/asset/js/app.js')); ?>"></script>
<!--      <script>
         $(document).ready(function(){
               window.onload = function(e){
                       var ha = location.hash;
                       if(ha != ''){
                               history.pushState(null , null , 'http://localhost/giaodien5/');	
                               $("#top-navigation li a[href="+ha+"]").trigger("click");
                       }
               }
         })
      </script>
      -->
  
      
      <script src="<?php echo e(asset('template/giaodien5/asset/js/jquery.flexslider.min.js')); ?>" type='text/javascript'></script>
      <script>
         $(document).ready(function() {
               $('.slider-container').flexslider({
                       namespace: "leo-", 
                       animation: "slide",
                       smoothHeight: false
               });
         });
      </script>
      <script type="text/javascript">
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