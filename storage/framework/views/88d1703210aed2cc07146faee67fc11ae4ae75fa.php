 <footer class="site-footer bgFull">
    <div class="wrapper">
       <!-- /snippets/footer.liquid -->
       <div class="site-footer__top grid small--hide">
          <div class="grid__item large--one-quarter">
             <div class="inner">
                <i class="fa fa-truck red"></i>
                <h4>  Miễn phí vận chuyển</h4>
                <p>Cho đơn hàng trên 500k</p>
             </div>
          </div>
          <div class="grid__item large--one-quarter">
             <div class="inner">
                <i class="fa fa-repeat blue"></i>
                <h4> Trả lại miễn phí</h4>
                <p>Hoàn lại 100% tiền trong 30 ngày</p>
             </div>
          </div>
          <div class="grid__item large--one-quarter">
             <div class="inner">
                <i class="fa fa-gift green"></i>
                <h4> Quà tặng</h4>
                <p>Đăng ký và nhận quà miễn phí</p>
             </div>
          </div>
          <!--
          <div class="grid__item large--one-quarter">
             <div class="inner">
                <h4> Đăng ký nhận bản tin</h4>
                <div class="newsletter">
                   <form action="//brainos.us13.list-manage.com/subscribe/post?u=ade328137eca4a0d7d1ff928e&amp;id=6397922aa9" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" class="form-horizontal">
                      <div class="newsletter-form">
                         <input type="email" value="" placeholder="Email của bạn ..." name="EMAIL" id="mail" aria-label="Email của bạn ...">
                         <input type="submit" class="btn" name="subscribe" id="subscribe" value="Đăng ký">
                      </div>
                   </form>
                </div>
             </div>
          </div>
          -->
       </div>
       <div class="site-footer__main grid">
          <div class="grid__item large--one-sixth medium--one-sixth">
             <h4>Thông tin</h4>
             <ul>
                <li><a href="/">Tài khoản của tôi</a></li>
                <li><a href="/">Liên hệ</a></li>
                <li><a href="/">Giới thiệu</a></li>
                <li><a href="/">Tìm kiếm</a></li>
                <li><a href="/">Về chúng tôi</a></li>
             </ul>
          </div>
          <div class="grid__item large--one-sixth medium--one-sixth">
             <h4>Danh sách</h4>
             <ul>
                <li><a href="/">Vận chuyển</a></li>
                <li><a href="/">Giao hàng</a></li>
                <li><a href="/">Trả hàng</a></li>
                <li><a href="/">Tuyển dụng</a></li>
                <li><a href="/">Đối tác</a></li>
             </ul>
          </div>
          <div class="grid__item large--one-sixth medium--one-sixth">
             <h4>Hỗ trợ</h4>
             <ul>
                <li><a href="/">Hướng dẫn mua hàng</a></li>
                <li><a href="/">Đổi, trả hàng</a></li>
                <li><a href="/">Thanh toán</a></li>
                <li><a href="/">Tư vấn</a></li>
                <li><a href="/">Sự kiện</a></li>
             </ul>
          </div>
          <div class="grid__item large--one-quarter medium--one-quarter">
             <h4>Liên hệ</h4>
             <p>Chúng tôi luôn cam kết với khách hàng mang lại các sản phẩm với giá cả phải chăng, trên hết là chất lượng vượt trội , uy tín là số 1.</p>
             <p>
                Thứ hai - thứ sáu...........8.00 Giờ - 18.00 Giờ
                <br>
                Thứ bảy.......................9.00 Giờ - 21.00 Giờ
                <br>Chủ nhật.........................10.00Giờ  - 21.00 Giờ
             </p>
          </div>
          <div class="grid__item large--one-quarter medium--one-quarter">
             <h4>Kết nối với chúng tôi</h4>
             <div class="social">
                <p>Kết nối để được hỗ trợ tận tình hơn</p>
                <?php $__currentLoopData = $social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                
                <a href="<?php echo e($row['url']); ?>"><i class="icon <?php echo e($row['class']); ?>"></i></a>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
             </div>
             <h4>Thanh toán</h4>
             <div class="inner">
                <a class="i-payment" href="#" title=""><img src="<?php echo e(asset('template/giaodien20/asset/images/payment1.jpg')); ?>" alt=''  /></a>
                <a class="i-payment" href="#" title=""><img src="<?php echo e(asset('template/giaodien20/asset/images/payment2.jpg')); ?>" alt=''  /></a>
                <a class="i-payment" href="#" title=""><img src="<?php echo e(asset('template/giaodien20/asset/images/payment3.jpg')); ?>" alt=''  /></a>
                <a class="i-payment" href="#" title=""><img src="<?php echo e(asset('template/giaodien20/asset/images/payment4.jpg')); ?>" alt=''  /></a>
                <a class="i-payment" href="#" title=""><img src="<?php echo e(asset('template/giaodien20/asset/images/payment5.jpg')); ?>" alt=''  /></a>
             </div>
          </div>
       </div>
       <!-- end main -->
       <div class="site-footer__bottom grid">
          <div class="grid__item large--one-half">
          </div>
          <!-- end newsletter -->
          <div class="grid__item large--one-half">
          </div>
          <!-- end payment -->
       </div>
       <!-- end bottom -->
       <div class="site-footer__copyright text-center bgFull">
          <p>2016 <a href="/">QM-Tech</a>. All Rights Reserved. <a target='_blank' href='http://qmtech.com.vn/'>Powered by QM-Tech</a></p>
       </div>
    </div>
 </footer>

</div>
<!--dong o dau header-->


<script type="text/javascript">
     function deletePerItem(id){
       var url = '/cart/delete_item/'+id;
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

<script src="<?php echo e(asset('template/giaodien20/asset/js/fastclick.min.js?v=96')); ?>" type='text/javascript'></script>
     <script src="<?php echo e(asset('template/giaodien20/asset/js/timber.js?v=96')); ?>" type='text/javascript'></script>
      <script src="<?php echo e(asset('template/giaodien20/asset/js/owl.carousel.min.js?v=96')); ?>" type='text/javascript'></script>
      <script src="<?php echo e(asset('template/giaodien20/asset/js/wow.min.js?v=96')); ?>" type='text/javascript'></script>
      
      <script>
         new WOW().init();
      </script>
         
     
   </body>
</html>