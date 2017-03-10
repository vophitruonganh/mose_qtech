<!-- Giờ mở cửa -->
</main>
<!--mo main o cuoi header-->
<div class="site-footer-top">
  <div class="wrapper">
    <!-- /snippets/footer-top.liquid -->
    <div class="grid__item large--one-third medium--one-third">
      <div class=" newsletter">
        <h4 class="title">Nhận tin mới nhất</h4>
        <p class="text-center">Đăng ký nhận bản tin để cập nhật những tin tức  và sự kiện mới nhất từ cửa hàng chúng tôi</p>
        <form action="//brainos.us13.list-manage.com/subscribe/post?u=ade328137eca4a0d7d1ff928e&amp;id=6397922aa9" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" class="input-group">
          <input type="email" value="" placeholder="Email của bạn ..." name="EMAIL" id="mail" class="input-group-field" aria-label="Email của bạn ...">
          <span class="input-group-btn">
          <input type="submit" class="btn" name="subscribe" id="subscribe" value="Đăng ký">
          </span>
        </form>
      </div>
    </div>
    <div class="grid__item large--one-third medium--one-third">
      <div class="opentime">
        <h4 class="title">{{ $opendoor['heading'] }}</h4>
            {!! $opendoor['textArea'] !!}
      </div>
    </div>
    <div class="grid__item large--one-third medium--one-third">
      <a href="{{ $opendoor['url'] }}" class="site-footer-image">
      <img src="{{ $opendoor['image'] }}" >
      </a>
    </div>
  </div>
</div>
<!-- End Giờ mở cửa -->

<!-- Liên Hệ -->
<div class="site-footer" style="background-image: url(/template/giaodien15/asset/images/bg-map.jpg?v=55)">
  <div class="wrapper">
    <!-- /snippets/footer.liquid -->
    <!-- /snippets/section-contact.liquid -->
    <div class="grid">
      <div class="contact">
        <h2 class="title">
          Liên hệ
        </h2>
        <p class="text-center">
          Chúng tôi tin rằng sản phẩm của cửa hàng chúng tôi có chất lượng và <br> mẩu mã số 1 trên thị trường hiện nay
        </p>
        <div class="contact-content clearfix">
          <div class="grid__item large--one-third medium--one-third">
            <div class="inner text-center">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <br>
              {{ $storeSetting['address'] }}
            </div>
          </div>
          <div class="grid__item large--one-third medium--one-third">
            <div class="inner text-center">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <br>
              {{ $storeSetting['telephone'] }}
            </div>
          </div>
          <div class="grid__item large--one-third medium--one-third">
            <div class="inner text-center">
              <i class="fa fa-paper-plane-o"></i>
              <br>
              {{ $storeSetting['email'] }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Liên Hệ -->

<!-- Footer -->
<footer class="site-foote-bottom">
  <div class="wrapper">
    <!-- /snippets/footer-bottom.liquid -->
    <div class="site-footer__copyright">
      <div class="grid--full">
        <div class="grid__item text-center">
          <a href="/" class="site-footer__logo-link">
          <img src="/template/giaodien15/images/footer_logo.png?v=55" alt="basic">
          </a>
          <div class="bo-sicolor text-center">
             @foreach ($social as $row)
            <a class="bo-social-twitter radius-x" href="{{ $row['url'] }}">
            <i class="fa {{ $row['class'] }}"></i>
            </a>
             @endforeach
            
              
          </div>
          <div class="copyright_text ">
            Copyright © 2016 - Basic - All rights reserved.<br>
            Powered by QM-Tech.
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- //site-footer -->
</div>
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
<script src="{{ asset('template/giaodien15/asset/js/fastclick.min.js?v=55') }}" type='text/javascript'></script>
<script src="{{ asset('template/giaodien15/asset/js/timber.js?v=55') }}" type='text/javascript'></script>
<!--       <script src="{{ asset('template/giaodien15/asset/js/owl.carousel.min.js?v=55') }}" type='text/javascript'></script>
  <script>
     new WOW().init();
  </script>-->
<!--Start of Zopim Live Chat Script-->
<!--
<script type='text/javascript'>
  window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
  d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
  _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
  $.src='//v2.zopim.com/?3lqMTMfE0DcwHJjzCKAwSrzOkvRYSP8O';z.t=+new Date;$.
  type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
-->
<!--End of Zopim Live Chat Script-->
</body>
</html>
<!-- End Footer -->