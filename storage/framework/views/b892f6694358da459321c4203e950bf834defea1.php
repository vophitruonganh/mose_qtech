<div class="clearfix">
  <div class="our-brand">
    <h3 class="title">
      <strong>
        Our
      </strong>
      Brands
    </h3>
    <div class="control">
      <a id="prev_brand" class="prev" href="#">
        &lt;
      </a>
      <a id="next_brand" class="next" href="#">
        &gt;
      </a></div>
    <ul id="braldLogo">
      <li>
        <ul class="brand_item">
          <li>
            <a href="#">
              <div class="brand-logo">
                <img src="<?php echo e(asset('template/shop/asset/images/envato.png')); ?>" alt="">
              </div>
            </a>
          </li>
          <li>
            <a href="#">
              <div class="brand-logo">
                <img src="<?php echo e(asset('template/shop/asset/images/themeforest.png')); ?>" alt="">
              </div>
            </a>
          </li>
          <li>
            <a href="#">
              <div class="brand-logo">
                <img src="<?php echo e(asset('template/shop/asset/images/photodune.png')); ?>" alt="">
              </div>
            </a>
          </li>
          <li>
            <a href="#">
              <div class="brand-logo">
                <img src="<?php echo e(asset('template/shop/asset/images/activeden.png')); ?>" alt="">
              </div>
            </a>
          </li>
          <li>
            <a href="#">
              <div class="brand-logo">
                <img src="<?php echo e(asset('template/shop/asset/images/envato.png')); ?>" alt="">
              </div>
            </a>
          </li>
        </ul>
      </li>
      <li>
        <ul class="brand_item">
          <li>
            <a href="#">
              <div class="brand-logo">
                <img src="<?php echo e(asset('template/shop/asset/images/envato.png')); ?>" alt="">
              </div>
            </a>
          </li>
          <li>
            <a href="#">
              <div class="brand-logo">
                <img src="<?php echo e(asset('template/shop/asset/images/themeforest.png')); ?>" alt="">
              </div>
            </a>
          </li>
          <li>
            <a href="#">
              <div class="brand-logo">
                <img src="<?php echo e(asset('template/shop/asset/images/photodune.png')); ?>" alt="">
              </div>
            </a>
          </li>
          <li>
            <a href="#">
              <div class="brand-logo">
                <img src="<?php echo e(asset('template/shop/asset/images/activeden.png')); ?>" alt="">
              </div>
            </a>
          </li>
          <li>
            <a href="#">
              <div class="brand-logo">
                <img src="<?php echo e(asset('template/shop/asset/images/envato.png')); ?>" alt="">
              </div>
            </a>
          </li>
        </ul>
      </li></ul>
  </div>
</div>
<div class="clearfix"></div>
   <div class="footer">
      <div class="footer-info">
         <div class="container">
            <div class="row">
               <div class="col-md-3">
                  <div class="footer-logo"><a href="#"><img src="<?php echo e(asset('template/shop/asset/images/logo.png')); ?>" alt=""></a></div>
               </div>
               <div class="col-md-3 col-sm-6">
                  <h4 class="title">Contact <strong>Info</strong></h4>
                  <p>No. 08, Nguyen Trai, Hanoi , Vietnam</p>
                  <p>Call Us : (084) 1900 1008</p>
                  <p>Email : michael@leebros.us</p>
               </div>
               <div class="col-md-3 col-sm-6">
                  <h4 class="title">Customer<strong> Support</strong></h4>
                  <ul class="support">
                     <li><a href="#">FAQ</a></li>
                     <li><a href="#">Payment Option</a></li>
                     <li><a href="#">Booking Tips</a></li>
                     <li><a href="#">Infomation</a></li>
                  </ul>
               </div>
               <div class="col-md-3">
                  <h4 class="title">Get Our <strong>Newsletter </strong></h4>
                  <p>Lorem ipsum dolor ipsum dolor.</p>
                  <form class="newsletter">
				<input type="text" name="" placeholder="Type your email....">
				<input type="submit" value="SignUp" class="button">
			</form>
               </div>
            </div>
         </div>
      </div>
      <div class="copyright-info">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <p>Copyright © 2012. Designed by <a href="#">Michael Lee</a>. All rights reseved</p>
               </div>
               <div class="col-md-6">
                  <ul class="social-icon">
                     <li><a href="#" class="linkedin"></a></li>
                     <li><a href="#" class="google-plus"></a></li>
                     <li><a href="#" class="twitter"></a></li>
                     <li><a href="#" class="facebook"></a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
function order(i)
  {
       $("#form_order_"+i).submit();
  }
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

<script src="<?php echo e(asset('template/shop/asset/js/jquery-1.10.2.min.js')); ?>" type='text/javascript'></script>
<script src="<?php echo e(asset('template/shop/asset/js/jquery.easing.1.3.js')); ?>" type='text/javascript'></script>
<script src="<?php echo e(asset('template/shop/asset/js/bootstrap.min.js')); ?>" type='text/javascript'></script>
<script src="<?php echo e(asset('template/shop/asset/js/jquery.sequence-min.js')); ?>" type='text/javascript'></script>
<script src="<?php echo e(asset('template/shop/asset/js/jquery.carouFredSel-6.2.1-packed.js')); ?>" type='text/javascript'></script>
<script src="<?php echo e(asset('template/shop/asset/js/jquery.flexslider.js')); ?>" type='text/javascript'></script>
<script src="<?php echo e(asset('template/shop/asset/js/script.min.js')); ?>" type='text/javascript'></script>
</body>
</html>