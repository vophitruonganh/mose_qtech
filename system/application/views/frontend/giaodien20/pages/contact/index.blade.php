@extends('frontend.giaodien20.layouts.default')
@section('content')
<main class="wrapper main-content" role="main">
   <!-- /snippets/breadcrumb.liquid -->
   <nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
      <div class="inner">
         <a href="/" title="Quay lại trang chủ">Trang chủ</a>
         <span aria-hidden="true">/</span>
         <span>Liên hệ</span>
      </div>
   </nav>
   <!-- /templates/page.contact.liquid -->
   <div class="grid text-center contact-box">
      <div class="grid__item large--one-third">
         <div class="inner"><i class="fa fa-map-marker"></i><br>{{ $storeSetting['address'] }}</div>
      </div>
      <div class="grid__item large--one-third">
         <div class="inner"><i class="fa fa-phone-square"></i><br>{{ $storeSetting['telephone'] }}</div>
      </div>
      <div class="grid__item large--one-third">
         <div class="inner"><i class="fa fa-envelope"></i><br>{{ $storeSetting['email'] }}</div>
      </div>
   </div>
   <!-- end box contact -->
   <div class="grid">
      <div class="grid__item space-30" id="contact-map">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.197827598388!2d106.65177431433693!3d10.796155261782483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752935e97b0445%3A0xa4b83f2f98a593fe!2zMTU3LTE1OSBYdcOibiBI4buTbmcsIFBoxrDhu51uZyAxMiwgVMOibiBCw6xuaCwgSOG7kyBDaMOtIE1pbmgsIFZpZXRuYW0!5e0!3m2!1sen!2sus!4v1473216858865" width="1903" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      <!-- end map -->
      <div class="grid__item">
         <h1>Liên hệ</h1>
         <div class="rte">
         </div>
         <div class="form-vertical">
            @if( count($errors) > 0 )
               <ul>
                   @foreach( $errors->all() as $error )
                   <li>{{ $error }}</li>
                   @endforeach
               </ul>
             @endif
            <form accept-charset="UTF-8" action="{{url('pages/contact')}}" class="contact-form" method="post">
               <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
               <input name="utf8" type="hidden" value="✓">
               <div class="grid">
                  <div class="grid__item large--one-third">
                     <label for="ContactFormName" class="hidden-label">Tên</label>
                     <input type="text" id="ContactFormName" class="input-full" name="name" placeholder="Tên" autocapitalize="words" value="{{old('name')}}">
                  </div>
                  <div class="grid__item large--one-third">
                     <label for="ContactFormEmail" class="hidden-label">Email </label>
                     <input type="email" id="ContactFormEmail" class="input-full" name="email" placeholder="Email " autocorrect="off" autocapitalize="off" value="{{old('email')}}">
                  </div>
                  <div class="grid__item large--one-third">
                     <label for="ContactFormPhone" class="hidden-label">Điện thoại </label>
                     <input type="tel" id="ContactFormPhone" class="input-full" name="phone" placeholder="Điện thoại " pattern="[0-9\-]*" value="{{old('phone')}}">
                  </div>
               </div>
               <label for="ContactFormMessage" class="hidden-label">Phản hồi</label>
               <textarea rows="10" id="ContactFormMessage" class="input-full" name="message" placeholder="Phản hồi">{{old('message')}}</textarea>
               <input type="submit" class="btn right" value="Gửi">
            </form>
         </div>
      </div>
   </div>
</main>


@stop  

