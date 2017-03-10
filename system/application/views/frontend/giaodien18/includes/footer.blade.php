<footer id="wrap-footer-top">
  <div class="container">
    <!-- <div class="col-md-3 col-sm-4 col-xs-12 box-footer-top">
      <h3 class="title-footer">Đăng kí nhận tin</h3>
      <span class="line-footer"></span>
      <p>
      </p>
      <input type="hidden" id="contact_tags" name="contact[tags]" value="prospect,newsletter"/>
      <div id="newsletter-signup">
        <form accept-charset='UTF-8' action='/account/contact' class='contact-form' method='post'>
          <input name='form_type' type='hidden' value='customer'>
          <input name='utf8' type='hidden' value='✓'>
        <form class="form-inline input-group" id="signup" action="/" method="get">
          <div class="input-group input-group-sm">
            <input type="text" class="form-control" name="contact[email]" id="your_email" placeholder="Nhập email của bạn">
            <span class="input-group-btn">
            <button name="bt_submitemail" id="bt_submitemail" class="btn btn-default theme_button" type="submit">Đăng ký</button>
            </span>
          </div>
        </form>
        </form>
      </div>
    </div> -->
    <!--end .col-sm-4 col-xs-6 box-footer-top-->
    <div class="col-md-2 col-sm-4 col-xs-12 box-footer-top">
      <h3 class="title-footer">Hỗ trợ</h3>
      <span class="line-footer"></span>
      <ul>
        <li><a href="{{url('collections?search=')}}">Tìm kiếm</a></li>
        <li><a href="{{url('pages/gioi-thieu')}}">Giới thiệu</a></li>
      </ul>
    </div>
    <!--end .col-sm-4 col-xs-6 box-footer-top-->                       
    <div class="col-md-3 col-sm-4 col-xs-12 box-footer-top box-footer-card">
      <h3 class="title-footer">Giới thiệu</h3>
      <span class="line-footer"></span> 
      <ul>
        <li class="footer-cty"><span>Công ty QM-Tech - {{ $storeSetting['address'] }}</span></li>
        <li>Email: <span>{{ $storeSetting['email'] }}</span></li>
        <li>Hotline: <span>{{ $storeSetting['telephone'] }}</span></li>
        <li>
          <p class="text-footer-list">
            Đem lại cho Quý khách dịch vụ tốt nhất trong công nghệ. Chúng tôi đang ngày càng hoàn thiện sản phẩm và dịch vụ của mình nhằm không ngừng đáp ứng sự tin tưởng và niềm tin của khách hàng
          </p>
        </li>
      </ul>
    </div>
    <!--end .col-sm-4 col-xs-6 box-footer-top-->
    <div class="col-md-4 col-sm-12 col-xs-12 box-footer-top facebook-footer">
      <div class="widget widget_tag_cloud" id="widget-footer-facebook">
        <h3 class="title-footer">Facebook</h3>
        <span class="line-footer"></span>       
        <div class="face-content">
          <div class="fb-like-box small--hide" data-href="{{ $facebook['url'] }}" data-height="400" data-width="370px" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
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
    </div>
    <!--end .facebook-footer-->
  </div>
  <!--end .container-->
</footer>
<!--end #wrap-footer-top-->
<footer id="wrap-footer-bottom">
  <div class="container">
    <div class="pull-left">
      <p>Copyright © 2015. Designed by qmtech.com.vn. All rights reseved</p>
    </div>
    <!--end .pull-left-->
    <div class="pull-right">
      <ul>
        @foreach( $social as $row )
        <li><a href="{{ $row['url'] }}"><i class="fa {{ $row['class'] }}"></i></a></li>
        @endforeach
      </ul>
    </div>
    <!--end .pull-right-->
  </div>
  <!--end .container-->
</footer>
<!--end #wrap-footer-bottom-->
<script src="{{ asset('template/giaodien18/asset/js/custom.js') }}" type='text/javascript'></script>  
<script>
  $("#showmenu").click(function(e){
     e.preventDefault();
     $("#menu-mobile").toggleClass("show");
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
                    window.location = 'cart';
                }
            },
        });
        return false;
}
</script>


</div>
</body>
</html>