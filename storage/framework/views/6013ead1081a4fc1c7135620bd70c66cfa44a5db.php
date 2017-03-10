 <footer id="footer">
         <section class="footersocial">
            <div class="container">
               <div class="row">
                  <div class="col-lg-3 aboutus col-sm-6">
                     <h2><?php echo e(isset($about['title']) ? $about['title'] : ''); ?> </h2>
                     <div class="text-about-us"> <?php echo e(isset($about['text']) ? $about['text'] : ''); ?></div>
                  </div>
                  <div class="col-lg-3 contact col-sm-6">
                     <h2>Thông tin liên hệ</h2>
                     <ul>
                        <?php 
                          $phone1 = isset($phone1['text']) ? $phone1['text'] : ''; 
                          $phone2 = isset($phone2['text']) ? $phone2['text'] : '';
                          ?>
                        <li class="phone"> <?php echo e($phone1); ?> </li>
                        <li class="mobile"><?php echo e($phone2); ?></li>
                        <li class="email"> <a href="mailto:<?php echo e($storeSetting['email']); ?>"><?php echo e($storeSetting['email']); ?></a></li>
                        <li class="email"> <a href="<?php echo e(url('/')); ?>" target="_blank"><?php echo e(url('/')); ?></a></li>
                     </ul>
                  </div>
                  <div class="col-lg-6 facebook col-sm-6">
                     <h2>Kết nối với chúng tôi</h2>
                     <div id="sns_facebook_16999696191449829151" class="sns-facebook">
                        <div id="fb-root">
                           <div class="facebook-fanbox" style="overflow-x : hidden;">
                              <div class="fb-like-box" data-href="<?php echo e($facebook['url']); ?>" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-width="500" data-show-border="false">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <script>
                     jQuery(document).ready(function() {
                       initfb(document, 'script', 'facebook-jssdk');
                     });
                     function initfb(d, s, id)
                     {
                       var js, fjs = d.getElementsByTagName(s)[0];
                       if (d.getElementById(id)) 
                               return;
                       js = d.createElement(s); js.id = id;
                       js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=334341610034299";
                       fjs.parentNode.insertBefore(js, fjs);
                     }
                  </script>	
               </div>
            </div>
         </section>
         <!--
         <section class="footerlinks">
            <div class="container">
               <div class="info">
                  <ul>
                     <li>
                        <a href="/pages/huong-dan">Hướng dẫn mua hàng</a>
                     </li>
                     <li>
                        <a href="/pages/huong-dan-chon-size-so">Hướng dẫn chọn size số</a>
                     </li>
                     <li>
                        <a href="/pages/phuong-thuc-thanh-toan">Phương thức thanh toán</a>
                     </li>
                     <li>
                        <a href="/pages/quy-dinh-do-tra">Phương thức đổi trả hàng</a>
                     </li>
                     <li>
                        <a href="/pages/phuong-thuc-giao-nhan">Phương thức giao nhận</a>
                     </li>
                  </ul>
               </div>
               <div id="footersocial">
                  <a href="http://facebook.com/" target="_blank"  title="Facebook" class="facebook" >facebook</a>
                  <a href="https://twitter.com/" target="_blank" title="Twitter" class="twitter">Twitter</a>
                  <a class="googleplus" title="Googleplus" href="https://plus.google.com/up/accounts/upgrade/?continue=https://plus.google.com/u/0/?gpsrc%3Dogpy0%26tab%3DwX&gpsrc=ogpy0" target="_blank">Googleplus</a>
                  <a href="https://www.youtube.com/" target="_blank" title="youtube" class="flickr">youtube</a>
                  <a href="https://www.linkedin.com/" target="_blank" title="Linkedin" class="linkedin">Linkedin</a>
               </div>
            </div>
         </section>
         -->
         <section class="copyrightbottom">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12"><?php echo $copyright['text']; ?></div>
               </div>
            </div>
         </section>
      </footer>
      <a id="gotop" href="#" style="display: block;">Back to top</a>
   </body>
</html>
<script type="text/javascript">
   function order(i)
   {
      $("#formOrder"+i).submit();   
   }
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