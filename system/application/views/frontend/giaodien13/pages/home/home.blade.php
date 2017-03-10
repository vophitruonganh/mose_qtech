@extends('frontend.giaodien13.layouts.default')
@section('content')
<!-- Slider -->
 <section class="section-banner wow fadeIn" id="trang-chu-section">
    <div id="carousel-example-generic" class="carousel slide banner-carousel" data-ride="carousel">
       <!-- Indicators -->
       <ol class="carousel-indicators hidden-xs">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active">1</li>
          <li data-target="#carousel-example-generic" data-slide-to="1">2</li>
          <li data-target="#carousel-example-generic" data-slide-to="2">3</li>
       </ol>
       <!-- Wrapper for slides -->
       <div class="carousel-inner" role="listbox">
          <div class="item active">
             <img src="{{ asset('template/giaodien13/asset/images/slideshow_1.jpg?v=176') }}" alt="">
          </div>
          <div class="item">
             <img src="{{ asset('template/giaodien13/asset/images/slideshow_2.jpg?v=176') }}" alt="">
          </div>
          <div class="item">
             <img src="{{ asset('template/giaodien13/asset/images/slideshow_3.jpg?v=176') }}" alt="">
          </div>
       </div>
       <!-- Controls -->
       <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
       <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
       <span class="sr-only">Previous</span>
       </a>
       <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
       <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
       <span class="sr-only">Next</span>
       </a>
    </div>
 </section>
 <!--Kết thúc slidershow-->
<!-- End Slider -->

<!-- Vị Trí -->
<section class="section-loc" id="vitri">
  <div class="container">
    <div class="title-block text-center wow fadeIn">
      <h2 class="text-uppercase">{{ $viTri['title'] }}</h2>
    </div>
    <div class="row equalizer equalizer-xs">
      <div class="col-md-5 col-md-offset-1 col-sm-6">
        <img class="img-responsive center-block wow fadeIn" src="{{ $viTri['image'] }}" />
      </div>
      <div class="col-md-5 col-sm-6 wow fadeIn" data-wow-delay=".5s">
        {!! $viTri['text'] !!}
      </div>
    </div>
  </div>
</section>
<!--Kết thúc vị trí-->
<!-- End Vị Trí -->

<!-- Dự Án -->
<section class="section-grey section-prize section-parallax" id="du-an-section">
  <div class="container-fluid">
    <h2 class="text-uppercase text-center">{{ $duAn['title'] }}</h2>
    <div id="prizeCarousel" class="prize-carousel carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <?php
          $i = 0;
          unset($duAn['title']);
        ?>
        @foreach( $duAn as $key => $value )
        <li data-target="#prizeCarousel" data-slide-to="{{ $i }}" @if( $value['active'] ) class="active" @endif></li>
          <?php $i++; ?>
        @endforeach
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        @foreach( $duAn as $key => $value )
        <div class="item @if( $value['active'] ) active @endif">
          <div class="prize-item-holder">
            <div class="col-md-6 text-center">
              <img class="img-responsive center-block" src="{{ $value['image'] }}" />
              <h6 class="text-uppercase">{{ $value['text-1'] }}</h6>
              <h4 class="text-uppercase">{{ $value['text-2'] }}</h4>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <!-- Controls -->
      <a class="left carousel-control" href="#prizeCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#prizeCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

</section>
<!--Kết thúc dự án-->
<!-- End Dự Án -->

<!-- Sản Phẩm -->
 <!-- Widget ccccccc -->
    {!!showWidget('widgetccccccc')!!}
  <!-- End Widget ccccccc -->

 <script>
    $(document).ready(function() {
          $(".fancybox").fancybox({
                  openEffect	: 'none',
                  closeEffect	: 'none'
          });
    });
 </script>
 <!--Kết thúc sản phẩm-->
<!-- End Sản Phẩm -->

<!-- Nhận xét -->
<section class="section-customer section-grey section-parallax" id="nhan-xet-section">
  <div class="container text-center">
    <div class="row">
      <div class="owl-carousel people-carousel wow fadeIn">
        @foreach( $comments as $comment )
        <div class="col-md-12">
          <h6 class="text-uppercase">{{ $comment['name'] }}</h6>
          <h4 class="text-uppercase">{{ $comment['description'] }}</h4>
          <p class="margin-top-30">{{ $comment['content'] }}</p>
        </div>
        @endforeach
      </div>
    </div>
    <div class="people-carousel-dots"></div>
  </div>
</section>
<script>
  jQuery(document).ready(function($) {
      var posTabProduct = $(".people-carousel");
      posTabProduct.owlCarousel({
          items: 3,
          itemsDesktop: [1199, 3],
          itemsDesktopSmall: [991, 3],
          itemsTablet: [767, 1],
          itemsMobile: [480, 1],
          autoPlay: true,
          stopOnHover: false,
          addClassActive: true,
  
      });
  });
</script>
 <!--Kết thúc nhận xét-->
<!-- End Nhận xét -->

<!-- Tiện ích -->
<section class="section-feature" id="tien-ich-section">
  <div class="title-block text-center wow fadeIn">
    <h2 class="text-uppercase">{{ $tienIch['title'] }}</h2>
  </div>
  <a class="fancybox_gallery" rel="gallery1" href="{{ $tienIch['mainImageLarger'] }}">
  <img class="img-fullWidth wow fadeIn" src="{{ $tienIch['mainImageThumb'] }}" alt="" />
  </a>
  <div class="container">
    <div class="row wow fadeIn margin-top-30">
      @foreach( $tienIch['description'] as $row )
      <div class="col-md-4 col-sm-6 hor-block">
        <img class="img-responsive" src="{{ $row['image'] }}" />
        <h4 class="text-uppercase">{{ $row['text'] }}</h4>
      </div>
      @endforeach
    </div>
    <div class="row margin-top-30 wow fadeIn hidden-xs">
      @foreach( $tienIch['listImage'] as $row )
      <div class="col-md-4 col-sm-6 img-block">
        <img class="img-responsive" src="{{ $row['thumb'] }}" />
        <a class="fancybox_gallery" rel="gallery1" title="{{ $row['text'] }}" href="{{ $row['larger'] }}">
          <div class="overlay">
            <h4 class="text-uppercase">{{ $row['text'] }}</h4>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</section>
<script>
  $(document).ready(function() {
        $(".fancybox_gallery").fancybox({
                openEffect  : 'none',
                closeEffect : 'none'
        });
  });
</script>
<!--Kết thúc tiện ích-->
<!-- End Tiện ích -->

<!-- Tùy Chọn Căn Hộ -->
<section class="section-grey section-small section_7 section-parallax" id="can-ho-section">
  <div class="container text-center">
    <div class="title-block text-center wow fadeIn">
      <h2 class="text-uppercase">{{ $tuyChonCanHo['title'] }}</h2>
    </div>
    <a class="btn btn-white btn-big text-uppercase wow fadeIn" href="{{ $tuyChonCanHo['url'] }}">{{ $tuyChonCanHo['titleUrl'] }}</a>
  </div>
</section>
<!-- End Tùy Chọn Căn Hộ -->

<!-- Liên Hệ -->
<section class="section-contact" id="lien-he-section">
  <div class="container">
    <div class="title-block text-center wow fadeIn">
      <h2 class="text-uppercase">Liên hệ</h2>
    </div>
    <div class="row">
      <div class="col-sm-8 wow fadeIn">
        <div class="map-container">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.197827598388!2d106.65177431433693!3d10.79615526178249!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752935e97b0445%3A0xa4b83f2f98a593fe!2zMTU3LTE1OSBYdcOibiBI4buTbmcsIFBoxrDhu51uZyAxMiwgVMOibiBCw6xuaCwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1471503378982" width="800" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <h5 class="text-uppercase">Thông tin liên hệ</h5>
        <form accept-charset="UTF-8" action="{{ url('pages/contact') }}" class="contact-form" method="post">
          <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
          <input name="form_type" type="hidden" value="contact">
          <input name="utf8" type="hidden" value="✓"">
          <div id="message">
          </div>
          <div class="row">
            <div class="col-lg-12 text-center">
              <p id="error5" class="error_all"></p>
              <p id="error6" class="error_all"></p>
              <p id="error7" class="error_all"></p>
              <p id="error8" class="error_all"></p>
            </div>
            <div class="form-group">
              <div class="col-sm-6">
                <input name="email" required type="email"  id="contact_email" value="" class="form-control" placeholder="Vui lòng nhập địa chỉ email"/>
              </div>
              <div class="col-sm-6">
                <input name="name" required type="name"  id="contact_name" value="" class="form-control" placeholder="Vui lòng nhập tên"/>
              </div>
              <div class="col-sm-6">
                <input name="phone" required type="tel"  id="contact_phone" value="" class="form-control" placeholder="Vui lòng nhập số điện thoại"/>
              </div>
            </div>
            <div class="col-lg-12">
              <textarea required rows="6" name="message" class="form-control" placeholder="Viết bình luận" id="contact_body" value=""></textarea>
            </div>
            <div class="action_bottom col-lg-12">
              <a href="#" class="btn btn-pink text-uppercase" >Đăng ký</a>
            </div>
          </div>
        </form>
      </div>
      <div class="col-sm-4 wow fadeIn" data-wow-delay=".5s">
        <h5 class="text-uppercase">Công ty QMTECH</h5>
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
          <strong>Fax:</strong> {{ $storeSetting['telephone'] }}
        </p>
        -->
        <p class="info-text">
          <span>
          <img src="{{ asset('template/giaodien13/asset/css/images/mail-icon.png') }}"/>
          </span>
          <strong>Email:</strong> {{ $storeSetting['email'] }}
        </p>
        <!--
        <h5 class="text-uppercase">Chi nhánh Hà Nội</h5>
        <p class="info-text">
          <span>
          <img src="{{ asset('template/giaodien13/asset/css/images/loc-icon.png') }}"/>
          </span> 157 -159 Xuân Hồng,Phường 12, Quận Tân Bình, Tp. Hồ Chí Minh
        </p>
        <p class="info-text">
          <span>
          <img src="{{ asset('template/giaodien13/asset/css/images/mobile-icon.png') }}"/>
          </span>
          <strong>Điện thoại:</strong>  1900 0124
        </p>
        <p class="info-text">
          <span>
          <img src="{{ asset('template/giaodien13/asset/css/images/fax-icon.png') }}"/>
          </span>
          <strong>Fax:</strong>  1900 0124
        </p>
        <p class="info-text">
          <span>
          <img src="{{ asset('template/giaodien13/asset/css/images/mail-icon.png') }}"/>
          </span>
          <strong>Email:</strong> info@qmtech.com.vn
        </p>
        -->
        <h5 class="text-uppercase margin-top-30">Tham quan nhà mẫu</h5>
        <p>Quý Khách hàng có nhu cầu tham quan nhà mẫu vui lòng liên hệ chuyên viên tư vấn khách hàng</p>
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
        <p class="info-text">
          <span>
          <img src="{{ asset('template/giaodien13/asset/css/images/mail-icon.png') }}"/>
          </span>
          <strong>Email:</strong> {{ $storeSetting['email'] }}
        </p>
        <p class="info-text">
          <span>
          <img src="{{ asset('template/giaodien13/asset/css/images/clock-icon.png') }}"/>
          </span> Mở cửa từ 8:00 tới 20:00
        </p>
      </div>
    </div>
  </div>
</section>

 <script>
    $('.map-container').click(function () {
          $(this).find('iframe').css("pointer-events", "auto");
    });
    $( ".map-container" ).mouseleave(function() {
          $(this).find('iframe').css("pointer-events", "none");
    });
 </script>
 <script>
    $(document).ready(function(){
          $('.action_bottom a').click(function(e){
                  e.preventDefault();
                  $(".error_all").html("");
                  var email = $('#contact_email').val();
                  var	hovaten = $('#contact_name').val();
                  var	sodienthoai = $('#contact_phone').val();
                  var content =  $('#contact_body').val();
                  var contact_user_email = $('#contact_email').val();
                  $('#contact_body').val(content);
                  if (!validEmail(contact_user_email)) {
                          //alert('Bạn chưa nhập email hoặc email chưa đúng định dạng!');
                          $("#error5").html("* Bạn chưa nhập email hoặc email chưa đúng định dạng!");
                          $('#contact_email').val(' ');
                          return false;
                  }else if(hovaten.length == 0){
                          //alert('Bạn chưa chọn ngày nhận phòng!');
                          $("#error6").html("* Bạn chưa nhập họ và tên!");
                  } else if(sodienthoai.length == 0) {
                          //alert('Bạn chưa chọn ngày trả phòng!');
                          $("#error7").html("* Bạn chưa nhập số điện thoại!");
                  }else if(content.length == 0) {
                          //alert('Bạn chưa nhập nội dung!');
                          $("#error7").html("* Bạn chưa nhập nội dung!");
                  }else{
                          $(this).parents('form').submit();
                  }

          })

    })
    function validEmail(v) {
          var r = new RegExp("[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?");
          return (v.match(r) == null) ? false : true;
    }
 </script>
 <!--Kết thúc liên hệ-->
<!-- End Liên Hệ -->
@stop