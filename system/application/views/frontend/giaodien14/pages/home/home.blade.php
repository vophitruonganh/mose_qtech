@extends('frontend.giaodien14.layouts.default')
@section('content')
<!-- Slider -->
<section  id="section1" class="section section-1 section-trang-chu clearfix">
  <div class="main-width section-use-layout-slide">
    <ul class="js-hero-slideshow1">
      <li class="item">
        <img src="{{ asset('template/giaodien14/images/slideshow_1.jpg?v=2415') }}" class="attachment-full" alt="2323123" /> 
        <div class="elements">
          <a href="" target="_blank"></a>
          <div class="info">
            <p><strong>Park-place</strong></p>
            <p>Hoàn mỹ với thời gian</p>
          </div>
        </div>
      </li>
      <li class="item">
        <img src="{{ asset('template/giaodien14/images/slideshow_2.jpg?v=2415') }}" class="attachment-full" alt="" />  
        <div class="elements">
          <a href="" target="_blank"></a>
          <div class="info">
            <p><strong>Cuôc sống xanh </strong></p>
            <p>trong lòng thành phố</p>
          </div>
        </div>
      </li>
      <li class="item">
        <img src="{{ asset('template/giaodien14/images/slideshow_3.jpg?v=2415') }}" class="attachment-full" alt="" />  
        <div class="elements">
          <a href="" target="_blank"></a>
          <div class="info">
            <p><strong></strong></p>
            <p></p>
          </div>
        </div>
      </li>
      <li class="item">
        <img src="{{ asset('template/giaodien14/images/slideshow_4.jpg?v=2415') }}" class="attachment-full" alt="" />  
        <div class="elements">
          <a href="" target="_blank"></a>
          <div class="info">
            <p><strong></strong></p>
            <p></p>
          </div>
        </div>
      </li>
    </ul>
  </div>
  <script>
    $(document).ready(function() {
         $(".js-hero-slideshow1").owlCarousel({ 
                 loop:true,
                 animateOut: 'fadeOut',
                 autoplay:true,
    
                 autoplayTimeout:3000,
                 autoplayHoverPause:true,
                 responsiveClass:true,
                 responsive:{
                         0:{
                                 items:1      
                         },
                         600:{
                                 items:1
                         },
                         1000:{
                                 items:1
                         }
                 }
         });
    });
  </script>
</section>
<!-- End Slider -->

<!-- Giới Thiệu -->
<section  id="section2" class="section section-2 section-gioi-thieu clearfix">
  <div class="container main-width section-use-layout">
    <div class="row">
      <div class="col-lg-6 col-md-6">
        <article id="post-66" class="post-66 page type-page">
          <div class="title">
            <h3 class="article_header">{!! $descriptionWeb['title'] !!}</h3>
          </div>
          <div class="entry-content">
            <div class="body-content-page">{!! $descriptionWeb['content'] !!}</div>
          </div>
          <!-- .entry-content -->
        </article>
      </div>
      <div class="col-lg-6 col-md-6">
        <div class="box-content-img ">
          <img src="{{ $descriptionWeb['image'] }}">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Giới Thiệu -->

<!-- Vị Trí -->
<section id="section3" class="section section-3 section-vi-tri clearfix">
  <div class="main-width section-use-layout-">
    <article id="post-81" class="post-81 page type-page status-publish has-post-thumbnail">
      <div class="more">
        <a class="do-popup map" href="#" data-toggle="modal" data-target="#location-neighbouring-map">{{ $viTri['textViewGoogleMap'] }}</a>
      </div>
      <div class="entry-content">
        <p><img class="popup_iframe" src="{{ $viTri['image'] }}" /></p>
        <div class="hightlight clearfix">{!! $viTri['description'] !!}</div>
      </div>
    </article>
  </div>
  <div id="location-neighbouring-map" class="modal fade modal-map" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <p class="text-center">
          <iframe src="{{ $viTri['linkGoogleMap'] }}" width="100%" height="550" frameborder="0" style="border:0" allowfullscreen></iframe>
        </p>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
    </div>
  </div>
</section>
<!-- End Vị Trí -->

<!-- Mặt Bằng Căn Hộ -->
<section id="section4" class="section section-4 section-mat-bang-can-ho">
  <div class="main-width section-use-layout-subpage">
    <div class="flat-slides">
      <ul class="slides">
        @foreach( $matBangCanHo['slider'] as $row )
        <li>
          <img src="{{ $row['image'] }}" class="attachment-full" />
          <div class="elements">
            <div class="info">
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
  <div class="mat-bang-content">
    <div class="container mat-bang-content-inner">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="title">
            <h3 class="article_header">{!! $matBangCanHo['text'] !!}</h3>
          </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="matbang-detail">
            <ul class="list">
              @foreach( $matBangCanHo['item'] as $row )
              <li class="item item-0">
                <div class="content">
                  <div class="image-wrapper">
                    <div class="image" >
                      <a href="{{ $row['url'] }}">
                        <img  src="{{ $row['image'] }}" alt="{{ $row['title'] }}" />
                      </a>
                    </div>
                  </div>
                  <div class="info">
                    <h3><a href="{{ $row['url'] }}">{{ $row['title'] }}</a></h3>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
         $('.flat-slides').flexslider({
                 animation: "slide",
                 slideshow: true,
                 animationDuration: 700,
                 slideshowSpeed: 4000,
                 animation: "fade",
                 controlNav: false,
                 keyboardNav: false
         });
    });
  </script>
</section>
<!-- End Mặt Bằng Căn Hộ -->

<!-- Tiện Ích -->
<section id="section5" class="section section-5 section-tien-ich clearfix">
  <div class="container main-width section-use-layout-news">
    <div class="block-title clearfix">
      <h3 class="article_header">{!! $tienIch['heading'] !!}</h3>
      @foreach( $tienIch['linkMore'] as $row )
      <a href="{{ $row['url'] }}" class="link_more"><span>{{ $row['title'] }}</span></a>
      @endforeach
    </div>
    <div class="content-tien-ich">
      <div class="row">
        <?php $i=1; ?>
        @foreach( $tienIch['list'] as $row )
        <div class="col-lg-4 col-sm-4">
          <div class="elements">
            <div class="item item-1">
              <div class="item-title">
                <div class="image-hold">
                  <img src="{{ $row['imageHold'] }}">
                </div>
                <h3><a href="#" data-toggle="modal" data-target="#tien-ich-{{ $i }}" >{{ $row['title'] }}</a></h3>
              </div>
              <div class="image-wrapper-bor">
                <div class="image-view-wrap">
                  <a href="#" data-toggle="modal" data-target="#tien-ich-{{ $i }}" >
                  <img src="{{ $row['imageMain'] }}">
                  </a>
                </div>
              </div>
              <div class="info">
                <div class="desc">
                  <p>{{ $row['description'] }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php $i++; ?>
        @endforeach
      </div>
    </div>
  </div>
  <!-- Modal -->
  <?php $i=1; ?>
  @foreach( $tienIch['list'] as $row )
  <div id="tien-ich-{{ $i }}" class="modal fade modal-tien-ich" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-wrapper">
          <div class="title">
            <h3 class="article_header">{{ $row['title'] }}</h3>
          </div>
          <div class="entry-content">
            <div class="body-page">{!! $row['content'] !!}</div>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $i++; ?>
  @endforeach
</section>
<!-- End Tiện Ích -->

<!-- Thư Viện -->
<section id="section6" class="section section-6 section-thu-vien  clearfix">
  <div class="main-width section-use-layout-slide">
    <div class="title" data-slide-layout="gallery">
      <h3 class="article_header">{{ $gallery['heading'] }}</h3>
    </div>
    <div class="container post_content">
      <ul class="box-libary">
        <?php unset($gallery['heading']); ?>
        <?php $i = 0; ?>
        @foreach( $gallery as $row )
        <li>
          <a class="button secondary url" href="#element{{ $i }}">
            <img class="aligncenter size-full wp-image-630" src="{{ $row['imageTitle'] }}" /><br />
            {{ $row['text'] }}
          </a>  
        </li>
        <?php $i++; ?>
        @endforeach
      </ul>
    </div>
    <div id="demos" class="zslider 218 imageslider-linear total-image-{{ count($gallery) }} horizontal-stack horizontal-center" >
      <div class="imageslider-wrap">
        <div class="image-view loop owl-carousel" >
          <?php $i = 0; ?>
          @foreach( $gallery as $row )
          <!-- Begin -->
          <div data-hash="element{{ $i }}"  class="galleries galleries-category-" style=" width: 950px;height: 626px;" >
            <div class="item item-1">
              <div class="bg" style="background-image:url({{ $row['image1'] }});"></div>
              <a target="_blank" class="fancybox" data-fancybox-group="gallery{{ $i+1 }}"  href="{{ $row['image1'] }}" data-slideshow-index="1"></a>
            </div>
            <div class="item item-2">
              <div class="bg" style="background-image:url({{ $row['image2'] }});"></div>
              <a target="_blank" class="fancybox" data-fancybox-group="gallery{{ $i+1 }}"  href="{{ $row['image2'] }}" data-slideshow-index="2"></a>
            </div>
            <div class="item  title item-3">
              <p><a class="linknormal nopopup" href="">
                <span>
                {{ $row['text'] }}
                </span></a>
              </p>
              <p><a class="button linknormal nopopup" href="{{ $row['url'] }}"><span>{{ $row['titleUrl'] }}</span></a></p>
            </div>
            <div class="item item-4">
              <div class="bg" style="background-image:url({{ $row['image3'] }});"></div>
              <a target="_blank" class="fancybox" data-fancybox-group="gallery{{ $i+1 }}"  href="{{ $row['image3'] }}" data-slideshow-index="3"></a>
            </div>
            <div class="item item-5">
              <div class="bg" style="background-image:url({{ $row['image4'] }});"></div>
              <a target="_blank" class="fancybox" data-fancybox-group="gallery{{ $i+1 }}"  href="{{ $row['image4'] }}" data-slideshow-index="4"></a>
            </div>
            <div class="item item-6">
              <div class="bg" style="background-image:url({{ $row['image5'] }});"></div>
              <a target="_blank" class="fancybox" data-fancybox-group="gallery{{ $i+1 }}"  href="{{ $row['image5'] }}" data-slideshow-index="5"></a>
            </div>
            <div class="item item-7">
              <div class="bg" style="background-image:url({{ $row['image6'] }});"></div>
              <a target="_blank" class="fancybox" data-fancybox-group="gallery{{ $i+1 }}"  href="{{ $row['image6'] }}" data-slideshow-index="6"></a>
            </div>
          </div>
          <!-- End -->
          <?php $i++; ?>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <script>
    $('.loop').owlCarousel({
         center: true,
         margin:10,
         animateOut: 'fadeOut',
         loop:true,
         autoWidth:true,
         controlNav: true,
         nav:true,
         URLhashListener:true,
         autoplayHoverPause:true,
         startPosition: 'URLHash',
         items:{{ count($gallery) }}
    });
    
    jQuery('.nav-button.nav-back').on('click', function(e){
         e.preventDefault();
         jQuery('.image-view-wrap').trigger('owl.prev');
    });
    
    jQuery('.nav-button.nav-next').on('click', function(e){
         e.preventDefault();
         $('.image-view-wrap').trigger('owl.next');
    });
    
    jQuery(function ($) {
         $(".fancybox").fancybox({
                 'margin': 50,
                 'scrolling': 'yes'
         });
    })
  </script>
</section>
<!-- End Thư Viện -->

<!-- Tin Tức -->
      <!-- Widget 1111111 -->
        {!!showWidget('widget1111111')!!}
      <!-- End Widget 1111111 -->

<script>
    (function() {
         jQuery(function() {
                 this.film_rolls || (this.film_rolls = []);
                 this.film_rolls['demo'] = new FilmRoll({
                         container: '.history-slider',
                         height: 500
                 });
                 return true;
         });
    }).call(this);
  </script>
<!-- End Tin Tức -->

<!-- Liên Hệ -->
<section id="section8" class="section section-9 section-lien-he clearfix">
<div class="main-width section-use-layout-contact">
<div class="container">
<div class="row">
<div class="col-lg-5">
  <div class="post_info">
    <h2 class="section-title">Giới thiệu</h2>
    <div class="post_content">
      <p>Một trang bán hàng chuyên nghiệp, một blog thú vị, hay một web doanh nghiệp... Hãy làm điều đó tại Qm-Tech</p>
      <div class="contact-add">
        <p><span>Địa chỉ: {{ $storeSetting['address'] }}</span></p>
        <p><span>Điện thoại: {{ $storeSetting['telephone'] }}</span></p>
        <p><span>Email:  {{ $storeSetting['email'] }}</span></p>
      </div>
      <div class="footer-static-content">
        <div class="screen-reader-response"></div>
        <form accept-charset="UTF-8" action="{{ url('pages/contact') }}" class="contact-form" method="post">
          <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
          <input name="form_type" type="hidden" value="contact">
          <input name="utf8" type="hidden" value="✓"">
        <form method="post" class="contact-form"  action="" method="post">
          <div class="field-row clearfix">
            <label>Tên <em>*</em></label>
            <input required  type="text" name="name" class="contact-form-name" autocapitalize="words" value="" >
          </div>
          <div class="field-row clearfix">
            <label>Email <em>*</em></label>
            <input required  type="email" name="email" class="contact-form-email"  autocorrect="off" autocapitalize="off" value="">
          </div>
          <div class="field-row clearfix">
            <label>Số điện thoại <em></em></label>
            <input required  type="text" name="phone" class="contact-form-name" autocapitalize="words" value="" >
          </div>
          <div class="field-row clearfix">
            <label>Bình luận <em>*</em></label>
            <textarea required  name="message" class="contact-form-text" ></textarea>
          </div>
          <div class="field-row button">
            <button type="submit" title="Send" class="button contact-form-submit"><span>Gửi</span></button>
          </div>
        </form>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-7">
  <div class="post_image">
    <img  src="{{ $mapContact }}" class="attachment-news-thumb wp-post-image" alt="" />
  </div>
</div>
<!--
<div class="col-lg-12">
  <h2 class="section-title">Ngân hàng liên kết</h2>
  <div class="payment-footer">
    <img src="'. asset('template/giaodien14/images/payment.png?v=2415') .'" alt="Payment">
  </div>
</div>
-->
</div>
</div>
</div>
</section>
<!-- End Liên Hệ -->
@stop