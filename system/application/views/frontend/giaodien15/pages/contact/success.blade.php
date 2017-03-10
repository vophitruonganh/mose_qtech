@extends('frontend.giaodien15.layouts.default')
@section('content')

      

<main class="wrapper main-content" role="main">
   <!-- /snippets/breadcrumb.liquid -->
   <nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
      <img src="//hstatic.net/033/1000104033/1000147703/bg-breadcrumb.jpg?v=55" alt="">
      <div class="inner">
         <div class="breadcrumb-list">
            <a href="/" title="Quay lại trang chủ">Trang chủ</a>
            <span aria-hidden="true">/</span>
            <span>Liên hệ</span>
         </div>
         <h3 class="page_name">Liên hệ</h3>
      </div>
   </nav>
   <!-- /templates/page.contact.liquid -->
   <div class="grid text-center contact-box">
      <div class="grid__item large--one-third">
         <div class="inner"><i class="fa fa-map-marker"></i><br>124 Bàu Cát 1, Phường 12,<br> Quận Tân Bình, Tp. Hồ Chí Minh</div>
      </div>
      <div class="grid__item large--one-third">
         <div class="inner"><i class="fa fa-phone-square"></i><br>1900 0124<br> 08 2262 4444</div>
      </div>
      <div class="grid__item large--one-third">
         <div class="inner"><i class="fa fa-envelope"></i><br>info@qmtech.com.vn</div>
      </div>
   </div>
   <!-- end box contact -->
   <div class="grid">
      <div class="grid__item space-30" id="contact-map">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.197827598388!2d106.65177431433693!3d10.79615526178249!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752935e97b0445%3A0xa4b83f2f98a593fe!2zMTU3LTE1OSBYdcOibiBI4buTbmcsIFBoxrDhu51uZyAxMiwgVMOibiBCw6xuaCwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1471940772129" width="1903" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      <!-- end map -->
      <div class="grid__item">
         <h1>Liên hệ</h1>
         <div class="rte">
         </div>
         <div class="form-vertical">
           
            Cảm ơn bạn! Email đã được gửi đến nhà quản trị!
         </div>
      </div>
   </div>
</main>

@stop
       