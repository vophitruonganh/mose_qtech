@extends('frontend.giaodien16.layouts.default')
@section('content')
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <div class="inner">
            <ul>
               <li class="home"> <a title="Quay lại trang chủ" href="/">Trang chủ</a></li>
               <i class="fa fa-angle-double-right" aria-hidden="true"></i>
               <li><span class="brn">Liên hệ</span></li>
            </ul>
         </div>
      </div>
   </div>
</div>
<div class="main-container col2-left-layout">
   <div class="container">
      <div class="row mg0">
         <header class="page-header">
            <h2>Bản đồ</h2>
         </header>
         <div class="rte">
             @foreach( $map as $row)
              <p> <iframe src="{{$row['src']}}" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe> </p>
             @endforeach
         </div>
      </div>
   </div>
</div>


<div class="container" style="margin-top: 20px;">
   <div class="row">
      <div class="col-md-6">
         <div class="form_blog_comment">
                @if( count($errors) > 0 )
                  <ul>
                      @foreach( $errors->all() as $error )
                      <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                @endif
            <form accept-charset="UTF-8" action="{{url('pages/contact')}}" id="contact" method="post">
               <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
               <input name="FormType" type="hidden" value="contact">
               <input name="utf8" type="hidden" value="true">				
               <h4 style="text-transform:uppercase; margin-top: 20px;font-weight: bold;font-family: 'Open Sans', sans-serif;">Liên hệ với chúng tôi</h4>
               <div class="form-group">
                  <label for="name">Tên<span id="required">*</span></label>
                  <input placeholder="Tên" id="name" name="name" type="text" value="{{old('name')}}" class="form-control">
               </div>
               <div class="form-group">
                  <label>Email<span id="required">*</span></label>
                  <input placeholder="Email" id="email" name="email" class="form-control" type="email" value="{{old('email')}}">
               </div>
               <div class="form-group">
                  <label for="name">Số điện thoại<span id="required"></span></label>
                  <input placeholder="Điện thoại" id="phone" name="phone" type="text" value="{{old('phone')}}" class="form-control">
               </div>
               <div class="form-group">
                  <div class="form-group">
                     <label for="exampleInputEmail1">Ý kiến<span id="required">*</span></label>
                     <textarea id="message" name="message" style="height: 120px;" class="form-control" rows="7">{{old('message')}}</textarea>
                  </div>
                  <div class="form-group">
                     <p>Những trường <span id="required">*</span> là bắt buộc</p>
                     <button style="border-radius: 0px;padding: 7px 30px;" type="submit" class="btn btn-default stl_btn_reg">Gửi</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
    <div class="col-md-6">
       <p style="font-size:14px; color:#777;margin-bottom: 20px; margin-top:20px;">DKT được thành lập với niềm đam mê và khát vọng thành công trong lĩnh vực Thương mại điện tử.Chúng tôi đã và đang khẳng định được vị trí hàng đầu bằng những sản phẩm</p>
       <ul style="list-style:none; margin:0px;">
          <li>
             <p style="color:#333"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; {{ $storeSetting['address'] }}</p>
          </li>
          <li>
             <p style="color:#333">
                <i class="fa fa-phone" aria-hidden="true"></i>  &nbsp; {{ $storeSetting['telephone'] }}
             </p>
          </li>
          <!--
          <li>
             <p style="color:#333">
                <i class="fa fa-phone" aria-hidden="true"></i> &nbsp; {{ $storeSetting['telephone'] }}
             </p>
          </li>
          -->
          <li>
             <p style="color:#383838">
                <i class="fa fa-envelope-o" aria-hidden="true"></i> &nbsp;<span style="color:#777"> {{ $storeSetting['email'] }}</span>
             </p>
          </li>
       </ul>
    </div>

   </div>
   

</div>
   

@stop