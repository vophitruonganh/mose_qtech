@extends('frontend.giaodien19.layouts.default')
@section('content')


<div id="page">
   <div class="container">
      <div class="row">
         <div class="col-md-9 col-xs-12 col-sm-12" id="layout-page">
            <div class="block-title page-header"> Liên hệ </div>
            <div class="content-contact content-page">
               <p class="text-center">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.197827598388!2d106.65177431433693!3d10.79615526178249!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752935e97b0445%3A0xa4b83f2f98a593fe!2zMTU3LTE1OSBYdcOibiBI4buTbmcsIFBoxrDhu51uZyAxMiwgVMOibiBCw6xuaCwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1473064605702" width="800" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
               </p>
               <div class="col-md-7 col-form" id="contactFormWrapper">
                  <h3>Viết nhận xét</h3>
                  <hr class="line-left">
                  <p>
                     Nếu bạn có thắc mắc gì, có thể gửi yêu cầu cho chúng tôi, và chúng tôi sẽ liên lạc lại với bạn sớm nhất có thể .
                  </p>
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
                     <div class="form-group">
                        <label for="contactFormName" class="sr-only">Tên</label>
                        <input required="" type="text" id="contactFormName" class="form-control input-lg" name="name" placeholder="Tên của bạn" autocapitalize="words" value="{{old('name')}}">
                     </div>
                     <div class="form-group">
                        <label for="contactFormEmail" class="sr-only">Email</label>
                        <input required="" type="email" name="email" placeholder="Email của bạn" id="contactFormEmail" class="form-control input-lg" autocorrect="off" autocapitalize="off" value="{{old('email')}}">
                     </div>
                     <div class="form-group">
                        <label for="contactFormName" class="sr-only">Số điện thoại</label>
                        <input required="" type="text" id="contactFormName" class="form-control input-lg" name="phone" placeholder="Số điện thoại của bạn" autocapitalize="words" value="{{old('phone')}}">
                     </div>
                     <div class="form-group">
                        <label for="contactFormMessage" class="sr-only">Nội dung</label>
                        <textarea  rows="6" name="message" class="form-control" placeholder="Viết bình luận" id="contactFormMessage">{{old('message')}}</textarea>
                     </div>
                     <input type="submit" class="btn btn-primary btn-lg" value="Gửi liên hệ">
                  </form>
               </div>
               <div class="col-md-5 col-form" id="col-right">
                  <h3>Chúng tôi ở đây</h3>
                  <hr class="line-right">
                  <h3 class="name-company">QM-Tech Co.Ltd</h3>
                  <p>	Giải pháp bán hàng toàn diện từ website đến cửa hàng	</p>
                  <ul class="info-address">
                     <li>
                        <i class="glyphicon glyphicon-map-marker"></i>
                        <span>{{ $storeSetting['address'] }}</span>
                     </li>
                     <li>
                        <i class="glyphicon glyphicon-envelope"></i>
                        <span>{{ $storeSetting['email'] }}</span>
                     </li>
                     <li>
                        <i class="glyphicon glyphicon-phone-alt"></i> 
                        <span>{{ $storeSetting['telephone'] }}</span>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-md-3 col-sm-12 col-xs-12">
           <!-- Widget kkkkkkkkkk -->
            {!!showWidget('widgetkkkkkkkkkk')!!}
          <!-- End Widget kkkkkkkkkk -->

           <!-- Widget iiiiiiiiii -->
            {!!showWidget('widgetiiiiiiiiii')!!}
          <!-- End Widget iiiiiiiiii -->

         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
   
      function order(i)
      {
         $("#form_order_"+i).submit();   
      }
</script>
@stop

          