@extends('frontend.giaodien6.layouts.default')
@section('content')

<main class="padding-top-mobile">
   <div class="header-navigate">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
               <ol class="breadcrumb breadcrumb-arrow">
                  <li><a href="/" target="_self">Trang chủ</a></li>
                  <li><i class="fa fa-angle-right"></i></li>
                  <li class="active"><span>Liên hệ</span></li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <div class="layout-page">
      <div class="container">
         <div class="row">
            <div class="col-md-2 pd-none-r hidden-sm hidden-xs">
               <ul class="sidebar-page-left">
                  <li class=""><a href="{{ url('pages/gioi-thieu') }}">Giới thiệu</a></li>
                  <li class="active"><a href="{{url('pages/contact')}}">Liên hệ</a></li>
               </ul>
            </div>
            <div class="col-md-10 col-xs-12 page-border-left pd5">
               <h1>
                  Liên hệ
               </h1>
               <div class="clearfix page-description">

                  <iframe src="{{ $google_map['url'] }}" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
               </div>
               <div class="row">
                  <div class="col-md-6 col-xs-12">
                     <div class="page-left-contact clearfix">
                        <div class="page-left-title">
                           <i class="fa fa-envelope"></i><span>Để lại lời nhắn cho chúng tôi</span>
                        </div>
                         @if( count($errors) > 0 )
                           <ul>
                               @foreach( $errors->all() as $error )
                               <li>{{ $error }}</li>
                               @endforeach
                           </ul>
                        @endif
                        <form accept-charset="UTF-8" action="{{url('pages/contact')}}" class="contact-form" method="post">
                           <input name="form_type" type="hidden" value="contact">
                           <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                           <input name="utf8" type="hidden" value="✓">
                           <div class="contact-form">
                              <div class="clearfix">
                                 <div class="col-sm-6 col-xs-12">
                                    <div class="input-group">
                                       <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                       <input type="text" name="name" class="form-control" placeholder="Họ và tên" aria-describedby="basic-addon1" value="{{old('name')}}">
                                    </div>
                                    <div class="input-group">
                                       <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                       <input type="text" name="email" class="form-control" placeholder="Email đầy đủ" aria-describedby="basic-addon1" value="{{old('email')}}">
                                    </div>
                                    <div class="input-group">
                                       <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                       <input type="text" name="phone" class="form-control" placeholder="Số điện thoại" aria-describedby="basic-addon1" value="{{old('phone')}}">
                                    </div>
                                 </div>
                                 <div class="col-sm-6 col-xs-12">
                                    <div class="input-group">
                                       <textarea name="message" placeholder="Viết lời nhắn">{{old('message')}}</textarea>
                                    </div>
                                 </div>
                                 <div class="col-xs-12 text-center">
                                    <button>
                                    Gửi lời nhắn
                                    </button>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
                  <div class="col-md-6 col-xs-12">
                     <div class="page-right-contact clearfix">
                        <div class="page-right-title">
                           <i class="fa fa-university"></i><span>Giải pháp bán hàng toàn diện từ website đến cửa hàng</span>
                        </div>
                        <div class="phone">
                           <i class="fa fa-phone"></i><b>Điện thoại: </b>
                        </div>
                        <div class="text-indent-page">
                           <span>{{ $storeSetting['telephone'] }}</span>
                        </div>
                        <div class="address">
                           <i class="fa fa-map-marker"></i><b>Địa chỉ</b>
                        </div>
                        <div class="text-indent-page">
                           <span>{{ $storeSetting['address'] }}</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

</main>
               
@stop                         