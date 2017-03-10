<div class="clearfix visible-xs visible-sm"></div>
<!-- fixes floating problems when mobile menu is visible -->

<footer>
  <div class="container">
    <section class="row">
      <div class="col-md-3 col-sm-6">
        <h3 class="strong-header">
          Contact us
        </h3>

        <div class="text-widget">
          <address>
            221 Baker Street, London,<br>
            United Kingdom
          </address>
          <a href="16-pages-contact.html">View on the map</a>
        </div>
        <div class="text-widget">
          <address>
            (022) 1234 5678<br>
            <a href="mailto:hello@decima.com">hello@decima.com</a>
          </address>
        </div>

      </div>
      <div class="col-md-3 col-sm-6">
        <h3 class="strong-header">
          Recent Posts
        </h3>

        <div class="recent-posts-widget">
          <ul class="list-unstyled">
            <li>
              <h5><a href="#">Rope necklace strong eyebrows center part shoe razor pleat white</a></h5>
              <span class="date">Aug, 9, 2013</span>&nbsp;&nbsp;<a href="#" class="comments">3 comments</a>
            </li>
            <li>
              <h5 class="title"><a href="#">Grey leather shorts collar vintage</a></h5>
              <span class="date">Aug 7, 2013</span>&nbsp;&nbsp;<a href="#" class="comments">1 comments</a>
            </li>
            <li>
              <h5 class="title"><a href="#">Tucked t-shirt motif Missoni maxi skirt white Lanvin headscarf</a></h5>
              <span class="date">Aug 5, 2013</span>&nbsp;&nbsp;<a href="#" class="comments">12 comments</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <h3 class="strong-header">
          Photo Stream
        </h3>

        <div class="photo-stream-widget">
          <div class="flickr_badge">
            <div class="flickr_badge_image">
              <a href="#"><img src="<?php echo e(asset('template/decima_store/images/content/flickr-01.jpg')); ?>" alt=" "></a>
            </div>
            <div class="flickr_badge_image">
              <a href="#"><img src="<?php echo e(asset('template/decima_store/images/content/flickr-02.jpg')); ?>" alt=" "></a>
            </div>
            <div class="flickr_badge_image">
              <a href="#"><img src="<?php echo e(asset('template/decima_store/images/content/flickr-03.jpg')); ?>" alt=" "></a>
            </div>
            <div class="flickr_badge_image">
              <a href="#"><img src="<?php echo e(asset('template/decima_store/images/content/flickr-04.jpg')); ?>" alt=" "></a>
            </div>
            <div class="flickr_badge_image">
              <a href="#"><img src="<?php echo e(asset('template/decima_store/images/content/flickr-05.jpg')); ?>" alt=" "></a>
            </div>
            <div class="flickr_badge_image">
              <a href="#"><img src="<?php echo e(asset('template/decima_store/images/content/flickr-06.jpg')); ?>" alt=" "></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <h3 class="strong-header">
          Follow us
        </h3>

        <div class="social-widget">
          <ul class="list-inline">
            <li><a href="#" class="fb"><span class="sr-only">Facebook</span></a></li>
            <li><a href="#" class="tw"><span class="sr-only">Twitter</span></a></li>
            <li><a href="#" class="gp"><span class="sr-only">Google+</span></a></li>
            <li><a href="#" class="pt"><span class="sr-only">Pinterest</span></a></li>
            <li><a href="#" class="in"><span class="sr-only">LinkedIn</span></a></li>
          </ul>
        </div>

        <h3 class="strong-header">
          Our Newsletter
        </h3>

        <!-- NEWSLETTER BOX -->
        <div class="newsletter-box">
          <div class="successMessage alert alert-success alert-dismissable" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Thank You! E-mail was sent.
          </div>
          <div class="errorMessage alert alert-danger alert-dismissable" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Ups! An error occured. Please try again later.
          </div>

          <form novalidate role="form" action="form/send.php" method="post" class="form-inline validateIt" data-email-subject="Newsletter Form" data-show-errors="true" data-hide-form="true">
            <div class="form-group">
              <label class="sr-only" for="newsletter-widget-email-1">Your email</label>
              <input type="email" required name="field[]" class="form-control" id="newsletter-widget-email-1" placeholder="Your email">
            </div>
            <input type="submit" class="btn btn-primary btn-small" value="Sign up">
          </form>
        </div>
        <!-- !NEWSLETTER BOX -->

      </div>
    </section>
    <hr>
    <section class="row">
      <div class="col-md-12">
        <span class="copyright pull-left">&copy; 2014 Decima Store</span>
        <ul class="payment-methods list-inline pull-right">
          <li>
            <span class="payment-visa"><span class="sr-only">Visa</span></span>
          </li>
          <li>
            <span class="payment-mastercard"><span class="sr-only">MasterCard</span></span>
          </li>
          <li>
            <span class="payment-paypal"><span class="sr-only">PayPal</span></span>
          </li>
          <li>
            <span class="payment-americanexpress"><span class="sr-only">American Express</span></span>
          </li>
        </ul>
      </div>
    </section>
  </div>
</footer>

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
    
</div>

<!-- SCRIPTS -->
<!-- core -->

<script src="<?php echo e(asset('template/decima_store/bootstrap/js/bootstrap.min.js')); ?>"></script>

<!-- !core -->

<!-- plugins -->
<script src="<?php echo e(asset('template/decima_store/js/jquery.flexslider-min.js')); ?>"></script>

<script src="<?php echo e(asset('template/decima_store/js/jquery.isotope.min.js')); ?>"></script>
<script src="<?php echo e(asset('template/decima_store/js/jquery.ba-bbq.min.js')); ?>"></script>

<script src="<?php echo e(asset('template/decima_store/js/jquery-ui-1.10.3.custom.min.js')); ?>"></script>

<script src="<?php echo e(asset('template/decima_store/js/jquery.raty.min.js')); ?>"></script>

<script src="<?php echo e(asset('template/decima_store/js/jquery.prettyPhoto.js')); ?>"></script>

<script src="<?php echo e(asset('template/decima_store/js/chosen.jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('template/decima_store/form/js/contact-form.js')); ?>"></script>
<script src="<?php echo e(asset('template/decima_store/twitter/js/jquery.tweet.js')); ?>"></script>
<!-- !plugins -->

<script src="<?php echo e(asset('template/decima_store/js/main.js')); ?>"></script>

</body>
</html>