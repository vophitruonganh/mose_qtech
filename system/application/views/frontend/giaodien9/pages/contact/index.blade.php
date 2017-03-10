@extends('frontend.giaodien9.layouts.default')
@section('content')
<?php
 $key = 0;
 foreach( $background_page as $k => $v )
 {
   if( $v['url'] == Request::fullUrl() )
   {
     $key = $k;
     break;
   }
 }
?>
<div id="page" class="page template-contact-us wrapper">
   <div class="banner-page">
      <img src="{{ $background_page[$key]['image'] }}" alt="Liên Hệ">
   </div>
   <div class="fix-width">
      <header class="page-header">
         <h1 class="page-title wow fadeInUp" style="visibility: visible; animation-name: none;">Liên Hệ</h1>
         <div class="intro-content wow fadeInUp" style="visibility: visible; animation-name: none;">
            Mọi sự hợp tác đều có khởi đầu vô cùng đơn giản từ một cuộc trò chuyện. <br>Hãy liên hệ với chúng tôi, để trao đổi về các ý tưởng của bạn.
         </div>
      </header>
      <div class="page-content entry-content clear wow fadeInUp" style="visibility: visible; animation-name: none;">
         <div class="apart">
             @if( count($errors) > 0 )
                  <ul>
                      @foreach( $errors->all() as $error )
                      <li>{{ $error }}</li>
                      @endforeach
                  </ul>
               @endif
            <form accept-charset="UTF-8" action="{{url('pages/contact')}}" class="contact-form" method="post">
               <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
               <input name="form_type" type="hidden" value="contact">
               <input name="utf8" type="hidden" value="✓">
               <div class="content-form">
                  <div class="apart clear">
                     <p>
                        <label for="contactFormName">Họ tên</label>
                        <input type="text" id="contactFormName" name="name" value="{{old('name')}}">
                     </p>
                     <p>
                        <label for="contactFormEmail">Email</label>
                        <input type="email" id="contactFormEmail" name="email" value="{{old('email')}}">
                     </p>
                     <p>
                        <label for="contactFormTelephone">Điện thoại</label>
                        <input type="telephone" id="contactFormTelephone" name="phone" value="{{old('phone')}}">
                     </p>
                  </div>
                  <div class="apart clear">
                     <p class="request">
                        <label for="contactFormMessage">Nội dung</label>
                        <textarea rows="15" cols="75" id="contactFormMessage" name="message">{{old('message')}}</textarea>
                     </p>
                     <p class="submit">
                        <input type="submit" id="contactFormSubmit" value="Gửi liên hệ" class="btn">
                     </p>
                  </div>
               </div>
            </form>
         </div>
         <div class="map-location apart">
             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6591.289289648078!2d106.64954328729142!3d10.795677434341707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752935e97b0445%3A0xa4b83f2f98a593fe!2zMTU3LTE1OSBYdcOibiBI4buTbmcsIFBoxrDhu51uZyAxMiwgVMOibiBCw6xuaCwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1470624294464" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
         </div>
      </div>
   </div>
</div>

@stop