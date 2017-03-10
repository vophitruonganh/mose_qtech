<footer>
   <div class="footer-top">
      <div class="container">
         <div class="row">
            <?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pd5 wow animated fadeInLeft">
               <div class="ourservice-block">
                  <div class="">
                     <div class="pull-left  ">
                        <i class="fa <?php echo e($row['class']); ?>"></i>
                     </div>
                     <h4 class="ourservice-heading "><?php echo e($row['heading']); ?></h4>
                     <div class="ourservice-content"><?php echo e($row['content']); ?></div>
                  </div>
               </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pd5 wow animated fadeInLeft">
               <div class="hotline">
                  <p><?php echo e($hotline['text1']); ?></p>
                  <span class="free-call"><?php echo e($hotline['text2']); ?></span>
               </div>
               <div class="number-phone">
                  <h3 class="call-number"><?php echo e($hotline['text3']); ?></h3>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="footer-center">
      <div class="container">
         <div class="footer-center-wrap">
            <div class="row">
               <div class="col-md-3 col-sm-6 col-xs-12 pd5 wow animated fadeInUp" data-wow-delay="100ms">
                  <div class="footer-block" id="block_links_footer_1">
                     <h4 class="title_block"><?php echo e($information['heading']); ?></h4>
                     <div class="block_content">
                        <ul class="toggle-footer list-group bullet">
                           <?php unset($information['heading']); ?>
                           <?php $__currentLoopData = $information; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                           <li class="item">
                              <a href="<?php echo e($row['url']); ?>" title="<?php echo e($row['text']); ?>"><?php echo e($row['text']); ?></a>
                           </li>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-md-3 col-sm-6 col-xs-12 pd5 wow animated fadeInUp" data-wow-delay="100ms">
                  <div class="footer-block" id="block_links_footer_2">
                     <h4 class="title_block"><?php echo e($customer_link['heading']); ?></h4>
                     <div class="block_content">
                        <ul class="toggle-footer list-group bullet">
                           <?php unset($customer_link['heading']); ?>
                           <?php $__currentLoopData = $customer_link; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                           <li class="item">
                              <a href="<?php echo e($row['url']); ?>" title="<?php echo e($row['text']); ?>"><?php echo e($row['text']); ?></a>
                           </li>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-md-3 col-sm-6 col-xs-12 pd5 wow animated fadeInUp" data-wow-delay="100ms">
                  <div class="footer-block" id="block_links_footer_3">
                     <h4 class="title_block"><?php echo e($support['heading']); ?></h4>
                     <div class="block_content">
                        <ul class="toggle-footer list-group bullet">
                           <?php unset($support['heading']); ?>
                           <?php $__currentLoopData = $support; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                           <li class="item">
                              <a href="<?php echo e($row['url']); ?>" title="<?php echo e($row['text']); ?>"><?php echo e($row['text']); ?></a>
                           </li>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </ul>
                     </div>
                  </div>
               </div>
                <!--
               <div class="col-md-3 col-sm-6 col-xs-12 pd5 wow animated fadeInUp" data-wow-delay="100ms">
                  <div id="newsletter_block" class="footer-block">
                     <h4 class="title_block">
                        Bản tin
                     </h4>
                     <div class="block_content">
                        <form id="mc-embedded-subscribe-form" accept-charset="UTF-8" action="/account/contact" class="contact-form" method="post">
                           <div class="des_newsletter">
                              Đăng Ký Thành Viên Để Nhận Bản Tin Mỗi Ngày:
                           </div>
                           <input name="form_type" type="hidden" value="customer">
                           <input name="utf8" type="hidden" value="✓">
                           <input type="hidden" id="contact_tags" name="contact[tags]" value="khách hàng tiềm năng,Bản tin">
                           <input type="hidden" id="newsletter-first-name" name="contact[first_name]" value="Người đăng ký">
                           <input type="hidden" id="newsletter-last-name" name="contact[last_name]" value="">
                           <div class="newsletter-form">
                              <input type="email" placeholder="Nhập email của bạn.." name="contact[email]" id="mail" class="newsletter-input form-control input-lg" >                
                              <button class="btn-newsletter" type="submit">
                              <span>Gửi</span>
                              </button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               -->
            </div>
         </div>
      </div>
   </div>
   <div class="footer-bottom">
      <div class="container">
         <div class="row">
            <div class="footer-bottom-wrap clearfix">
               <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pd5 wow animated fadeInLeft" data-wow-delay="150ms">
                  <div class="block_aboutshop block">
                     <div class="block_content">
                        <div class="box logo-ft">
                           <a href="<?php echo e(url('/')); ?>">
                              <img src="<?php echo e($logo_footer); ?>" class="img-responsive"/>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 pd5 border-left wow animated fadeInUp" data-wow-delay="150ms">
                  <div class="block footer_contact">
                     <div class="block_content">
                        <ul class="list">
                           <li><i class="fa fa-map-marker">&nbsp;</i> - Địa chỉ: <?php echo e($storeSetting['address']); ?></li>
                           <li><i class="fa fa-phone">&nbsp;</i>- Điện thoại: <?php echo e($storeSetting['telephone']); ?></li>
                           <li><i class="fa fa-envelope">&nbsp;</i>- Địa chỉ email: <?php echo e($storeSetting['email']); ?></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pd5 text-right wow animated fadeInRight" data-wow-delay="150ms">
                  <div class="copyright">
                     <p><?php echo $copyright['text']; ?></p>
                  </div>
                  <div class="social pull-right">
                     <ul class="list-unstyled clearfix">
                        <?php $__currentLoopData = $social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li class="facebook">
                           <a target="_blank"  href="<?php echo e($row['url']); ?>"  class="fa <?php echo e($row['class']); ?>"></a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>
<div id="myCart" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">
               Bạn có <b></b> sản phẩm trong giỏ hàng
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <a aria-hidden="true"></a>
            </button>
         </div>
         <form action="/cart" method="post" id="cartform">
            <div class="modal-body">
               <table style="width:100%;" id="cart-table">
                  <tr>
                     <th></th>
                     <th>Tên sản phẩm</th>
                     <th>Số lượng</th>
                     <th>Giá tiền</th>
                     <th></th>
                  </tr>
                  <tr class="line-item original">
                     <td class="item-image"></td>
                     <td class="item-title">
                        <a></a>
                     </td>
                     <td class="item-quantity"></td>
                     <td class="item-price"></td>
                     <td class="item-delete text-center"></td>
                  </tr>
               </table>
            </div>
            <div class="modal-footer">
               <div class="row">
                  <div class="col-sm-6">
                     <div class="modal-note">
                        <textarea placeholder="Viết ghi chú" id="note" name="note" rows="5"></textarea>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="total-price-modal">
                        Tổng cộng : <span class="item-total"></span>
                     </div>
                  </div>
               </div>
               <div class="row" style="margin-top:10px;">
                  <div class="col-lg-6">
                     <div class="comeback">
                        <a href="/collections/all">
                           <svg class="svg-icon-size-25 svg-icon-bg svg-icon-inline" style="fill:#555555;vertical-align:sub;">
                              <use xlink:href="#icon-backUrl"></use>
                           </svg>
                           Tiếp tục mua hàng
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-6 text-right">
                     <div class="buttons btn-modal-cart">
                        <button type="submit" class="button-default" id="checkout" name="checkout">
                        Đặt hàng
                        </button>
                     </div>
                     <div class="buttons btn-modal-cart">
                        <button type="submit" class="button-default" id="update-cart-modal" name="">
                        Cập nhật
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<div class="wrapper-quickview">
   <div class="">
      <div class="quickview-image">
         <img src="" alt="">
      </div>
      <div id="quickview-sliderproduct">
         <div class="quickview-slider">
            <ul class="slides"></ul>
         </div>
      </div>
   </div>
   <div class="">
      <form id="form-quickview" method="post" action="/cart/add">
         <div class="quickview-information">
            <div class="quickview-close">
               <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
            </div>
            <a href="#" class="quickview-title" title="">
               <h2></h2>
            </a>
            <div class="quickview-price">
               <span></span><del></del>
            </div>
            <div class="quickview-variants variant-style clearfix">
               <div class="selector-wrapper opt1-quickview">
                  <label></label>
                  <ul class="data-opt1-quickview clearfix style-variant-template">
                  </ul>
               </div>
               <div class="selector-wrapper opt2-quickview">
                  <label></label>
                  <ul class="data-opt2-quickview clearfix style-variant-template">
                  </ul>
               </div>
               <div class="selector-wrapper opt3-quickview">
                  <label></label>
                  <ul class="data-opt3-quickview clearfix style-variant-template">
                  </ul>
               </div>
               <style>
                  .selector-wrapper:not(.opt1):not(.opt1-quickview):not(.opt2):not(.opt2-quickview):not(.opt3):not(.opt3-quickview) {
                  display: none;
                  }
               </style>
               <select name="id" class="" id="quickview-select"></select>
               <div class="clearfix">
                  <button class="btn-style-add">Thêm vào giỏ</button>	
               </div>
            </div>
            <div class="quickview-description"></div>
         </div>
      </form>
   </div>
</div>
<script src="<?php echo e(asset('template/giaodien6/asset/js/cutums.js')); ?>" type='text/javascript'></script>
<div class="back-to-top">
   <a href="javascript:void(0);">
      <svg class="svg-icon-size-35 svg-icon-bg" style="fill:#0bd9a9">
         <use xlink:href="#icon-scrollUp-bottom"></use>
      </svg>
   </a>
</div>
</div>
<!-- /scroller-inner -->
</div>
<!-- /scroller -->
</div>
</div>


<script src="<?php echo e(asset('template/giaodien6/asset/js/bootstrap.min.js')); ?>" type='text/javascript'></script>
<script src="<?php echo e(asset('template/giaodien6/asset/js/html5shiv.js')); ?>"></script>
<script src="<?php echo e(asset('template/giaodien6/asset/js/jquery-migrate-1.2.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('template/giaodien6/asset/js/option_selection.js')); ?>" type='text/javascript'></script>
<script src="<?php echo e(asset('template/giaodien6/asset/js/api.jquery.js')); ?>" type='text/javascript'></script>
<script data-target=".product-resize" data-parent=".box-product-lists" data-img-box=".image-resize" src="<?php echo e(asset('template/giaodien6/asset/js/fixheightproductv2.js')); ?>"></script>
<script src="<?php echo e(asset('template/giaodien6/asset/js/owl.carousel.js')); ?>" type='text/javascript'></script>

<!--Thumb Productdetail-->
<script src="<?php echo e(asset('template/giaodien6/asset/js/jquery.mThumbnailScroller.js')); ?>" type='text/javascript'></script>
<!-- Script menu mobile -->
<script src="<?php echo e(asset('template/giaodien6/asset/js/modernizr.custom.js')); ?>" type='text/javascript'></script>
<script src="<?php echo e(asset('template/giaodien6/asset/js/classie.js')); ?>" type='text/javascript'></script>
<script src="<?php echo e(asset('template/giaodien6/asset/js/mlpushmenu.js')); ?>" type='text/javascript'></script>
<!-- End script menu -->
<script src="<?php echo e(asset('template/giaodien6/asset/js/jquery.elevatezoom.js')); ?>" type='text/javascript'></script>
<script src="<?php echo e(asset('template/giaodien6/asset/js/jquery.flexslider.js')); ?>" type='text/javascript'></script>
<!-- Quickview -->
<script src="<?php echo e(asset('template/giaodien6/asset/js/velocity.js')); ?>" type='text/javascript'></script>
<!-- End Quickview -->
<script src="<?php echo e(asset('template/giaodien6/asset/js/jquery.countdown.js')); ?>" type='text/javascript'></script>
<script src="<?php echo e(asset('template/giaodien6/asset/js/bootstrap-tabdrop.js')); ?>" type='text/javascript'></script>
<script src="<?php echo e(asset('template/giaodien6/asset/js/script.js')); ?>" type='text/javascript'></script>

<script type="text/javascript">
         function deletePerItem(id){
            var url = 'cart/delete_item/'+id;
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