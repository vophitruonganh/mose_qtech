@extends('frontend.giaodien5.layouts.default')
@section('content')

      <div class="contact mt60">
        <div class="container">
           <div class="title">
              <h1>Liên hệ</h1>
              <p>Các ý kiến đóng góp vui lòng gửi mail cho chúng tôi theo mẫu bên dưới. Chân thành cám ơn!</p>
           </div>
           <div class="row-fluid">
              <div class="col-xs-12 col-sm-5 fix-height-contact">
                 <h3>Thông tin liên hệ</h3>
                 <!-- thông báo lỗi -->
                  @if( count($errors) > 0 )
                  <ul>
                      @foreach( $errors->all() as $error )
                      <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                  @endif
                <!-- end -->
                 <form accept-charset="UTF-8" action="{{url('pages/contact')}}" class="contact-form" method="post">
                 <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input name="form_type" type="hidden" value="contact">
                    <input name="utf8" type="hidden" value="✓">
                    <div class="control-group">
                       <div class="controls">
                          <input class="span12" type="text" id="name" name="name" placeholder="* Họ tên" value="{{old('name')}}" >
                       </div>
                    </div>
                    <div class="control-group">
                       <div class="controls">
                          <input class="span12" type="email" name="email" id="email" placeholder="* Địa chỉ email" value="{{old('email')}}" >
                       </div>
                    </div>
                    <div class="control-group">
                       <div class="controls">
                          <input class="span12" type="text" id="name" name="phone" placeholder=" Số điện thoại" value="{{old('phone')}}" >
                       </div>
                    </div>
                    <div class="control-group">
                       <div class="controls">
                          <textarea class="span12" name="message" id="comment" placeholder="* Nội dung" >{{old('message')}}</textarea>
                       </div>
                    </div>
                    <div class="control-group">
                       <div class="controls">
                          <button type="submit" class="message-btn">Gửi liên hệ</button>
                       </div>
                    </div>
                 </form>
              </div>
              <div class="col-xs-12 col-sm-7 map-fix">
                <iframe src="{{ $google_map['url'] }}" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
           </div>
        </div>
     </div>
     
@stop