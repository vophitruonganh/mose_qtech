<footer class="section-footer wow fadeIn">
         <div class="container">
            <div class="row">
              <!--
               <div class="col-md-4 col-sm-12">
                  <h5 class="text-uppercase">Đăng ký nhận tin</h5>
                  <p>Quý khách hãy đăng ký nhận bản tin cập nhật hàng tháng về các đợt mở bán sản phẩm mới nhất.</p>
                  <form accept-charset='UTF-8' action='/account/contact' class='contact-form' method='post'>
                     <input name='form_type' type='hidden' value='customer'>
                     <input name='utf8' type='hidden' value='✓'>
                     <input required="required" class="" placeholder="Email của bạn" name="contact[email]" type="email" size="18" value="" />
                     <button type="submit" name="submitNewsletter" class="btn btn-white">Gửi</button>
                  </form>
                  <div class="clearfix"></div>
               </div>
              -->
               <div class="col-md-4 col-sm-12">
                  <h5 class="text-uppercase">Địa chỉ liên hệ</h5>
                  <p>Công ty Haravan</p>
                  <p class="info-text">
                     <span>
                     <img src="{{ asset('template/giaodien13/asset/css/images/loc-icon.png') }}"/>
                     </span> {{ $storeSetting['address'] }}
                  </p>
                  <p class="info-text">
                     <span>
                     <img src="{{ asset('template/giaodien13/asset/css/images/mobile-icon.png') }}"/>
                     </span>
                     <strong>Điện thoại:</strong> {{ $storeSetting['telephone'] }}
                  </p>
                  <!--
                  <p class="info-text">
                     <span>
                     <img src="{{ asset('template/giaodien13/asset/css/images/fax-icon.png') }}"/>
                     </span>
                     <strong>Fax:</strong> 1900.636.099
                  </p>
                  -->
                  <p class="info-text">
                     <span>
                     <img src="{{ asset('template/giaodien13/asset/css/images/mail-icon.png') }}"/>
                     </span>
                     <strong>Email:</strong> {{ $storeSetting['email'] }}
                  </p>
               </div>
               <div class="col-md-4 col-sm-12">
                  <h5 class="text-uppercase">Kết nối với chúng tôi</h5>
                  <div>
                     <div id="sns_facebook_16999696191449829151" class="sns-facebook">
                        <div id="fb-root">
                           <div class="facebook-fanbox" style="overflow-x : hidden;">
                              <div class="fb-like-box" data-href="https://www.facebook.com/MOSEVN/" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-width="262" data-show-border="false">
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
            </div>
         </div>
         <div class="container text-center">
            <hr/>
            <h6 class="text-uppercase">Copyright &copy; 2016 Lux Residence. <a target='_blank' href='http://qmtech.com.vn/'>Powered by MOSE.VN</a></h6>
         </div>
      </footer>
      <!--Scroll to Top-->
      <a href="#" class="scrollToTop">
      <i class="fa fa-chevron-up"></i>
      </a>
      <script>
         jQuery(document).ready(function() {
               //Check to see if the window is top if not then display button
               jQuery(window).scroll(function() {
                       if ($(this).scrollTop() > 100) {
                               $('.scrollToTop').fadeIn();
                       } else {
                               $('.scrollToTop').fadeOut();
                       }
               });

               //Click event to scroll to top
               jQuery('.scrollToTop').click(function() {
                       $('html, body').animate({
                               scrollTop: 0
                       }, 600);
                       return false;
               });

         });
      </script>
      
      <script>
    $('body').scrollspy({target: ".navbar", offset:50});

/**
 * Scroll Spy meet WordPress menu.
 */
// Only fire when not on the homepage
//console.log(window.location.pathname);
// bỏ giaodien13/
if (window.location.pathname !== "/") {
    // Selector for top nav a elements
    $('#navbar a').each( function() {
        if (this.hash.indexOf('#') === 0) {
            // Alert this to an absolute link (pointing to the correct section on the hompage)
            this.href = "/" + this.hash;
        }
    });
}

$('#navbar ul li a').click( function() {
    target = $(this).attr('href');
    offset = $(target).offset();
    $('body,html').animate({ scrollTop : offset.top }, 500);
    event.preventDefault();
});
    </script>
      
     
      

   </body>
</html>