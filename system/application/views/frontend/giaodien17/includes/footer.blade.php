<footer>
  <!-- FOOTER-MIDDLE-AREA START-->
  <div class="footer-middle-area">
    <div class="container">
      <div class="row  multi-columns-row">
        <div class="col-xs-12 col-sm-6 col-lg-4 col-md-4">
          <div class="footer-mid-menu contuct">
            <h2>
              <a class="logo" href="//mendover-theme-1.bizwebvietnam.net">
              <img alt="Mendover Theme" src="//bizweb.dktcdn.net/100/069/071/themes/139176/assets/logo_footer.png?1472090442121" />
              </a>
            </h2>
            <ul>
              <li style="margin-top: 30px;margin-bottom: 10px;">
                <i style="color:#bda87f;"  class="fa fa-map-marker"> </i> {{ $storeSetting['address'] }}
              </li>
              <li>
                <i style="color:#bda87f;" class="fa fa-mobile"> </i><span>{{ $storeSetting['telephone'] }}</span>
              </li>
              <li>
                <i style="color:#bda87f;" class="fa fa-envelope-o"> </i><span>{{ $storeSetting['email'] }}</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-2 col-md-2">
          <div class="footer-mid-menu">
            <h3><span>Tài khoản</span></h3>
            <ul>
              <li><a href="{{url('collections?search=')}}">Tìm kiếm</a></li>
              <li><a href="{{url('user/register')}}">Đăng kí</a></li>
              <li><a href="{{url('user/login')}}">Đăng nhập</a></li>
              <li><a href="{{url('cart')}}">Giỏ hàng</a></li>
              <li><a href="{{url('post')}}">Tin tức</a></li>
            </ul>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-2 col-md-2">
          <div class="footer-mid-menu">
            <h3><span>{{$policy['heading']}}</span></h3>
            <ul>
              <?php unset($policy['heading']); ?>
              @foreach($policy as $row)
                <li><a href="{{$row['url']}}">{{$row['text']}}</a></li>
              @endforeach
             </ul>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-2 col-md-2">
          <div class="footer-mid-menu">
            <h3><span>{{$provision['heading']}}</span></h3>
            <ul>
              <?php unset($provision['heading']); ?>
              @foreach($provision as $row)
                <li><a href="{{$row['url']}}">{{$row['text']}}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-2 col-md-2">
          <div class="footer-mid-menu">
            <h3><span>{{$guide['heading']}}</span></h3>
            <ul>
              <?php unset($guide['heading']); ?>
              @foreach($guide as $row)
                <li><a href="{{$row['url']}}">{{$row['text']}}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- FOOTER-MIDDLE-AREA END-->
  <!-- FOOTER-BOTTUM-AREA START-->
  <div class="footer-bottum-area">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-7 col-lg-6">
          <div class="copyright-info">
            © Bản quyền thuộc về Avent Team | Cung cấp bởi <a href="https://www.bizweb.vn" target="_blank" title="Bizweb">Bizweb</a>
          </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-lg-6 col-md-5 company-links">
          <ul class="links">
            <li><a href="{{url('/')}}">Trang chủ</a></li>
            <li><a href="{{url('pages/gioi-thieu')}}">Giới thiệu</a></li>
            <li><a href="{{url('collections')}}">Sản phẩm</a></li>
            <li><a href="{{url('post')}}">Tin tức</a></li>
            <li><a href="{{url('pages/contact')}}">Liên hệ</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- FOOTER-BOTTUM-AREA END-->
</footer>
<!--end class tz-footer-->
</div> 
<!--mo o cuoi header-->
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

<script>
  // jQuery for flexslider------------------
  $(document).ready(function() {
     jQuery( ".click_show" ).click(function() {
             $(this).toggleClass('change_icon');
             $( ".click_hiden" ).toggle( "slow", function() {
             });
     });
     $( ".show_nav_bar1" ).click(function() {
             $( ".show1" ).toggle( "slow", function() {
             });
     });
     $(".sub_minus").click(function(){
             $(this).next('.level0_415').toggle();      
     });
     $('.plazart-mainnav').css({'height':(($('.fix_height_mobile').height()))+'px'});
     $('.header-search button').click(function(){
             $( ".hiden_search" ).toggle( "slow", function() {
             });
     });
  });
</script>
<script src="{{ asset('template/giaodien17/asset/js/jgrowl.js?1472090442121') }}" type='text/javascript'></script>
</body>
</html>