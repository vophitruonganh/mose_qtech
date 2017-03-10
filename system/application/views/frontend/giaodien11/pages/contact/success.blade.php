@extends('frontend.giaodien11.layouts.default')
@section('content')
 
      
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <ul>
            <li class="home"> <a href="/" title="Trang chủ">Trang chủ</a><span>|</span></li>
            <li><strong>Liên hệ</strong></li>
         </ul>
      </div>
   </div>
</div>



<div class="google-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.197827598388!2d106.65177431433693!3d10.79615526178249!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752935e97b0445%3A0xa4b83f2f98a593fe!2zMTU3LTE1OSBYdcOibiBI4buTbmcsIFBoxrDhu51uZyAxMiwgVMOibiBCw6xuaCwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1470812140363" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

<div class="container" style="margin-top: 20px;">
   <div class="row">
      <div class="col-md-6">
         <div class="form_blog_comment">
               Cảm ơn bạn! Email đã được gửi đến nhà quản trị!
         </div>
      </div>
      <div class="col-md-6">
         <a class="logo" href="//bike-themes.bizwebvietnam.net" style="margin: 30px 0;float: left;width: 100%; ">
             <img alt="Bike-themes" src="{{asset('template/giaodien11/asset/images/logo_contact.png')}}">
         </a>
         <p style="font-size:14px; color:#777;margin-bottom: 20px; margin-top:20px;">DKT được thành lập với niềm đam mê và khát vọng thành công trong lĩnh vực Thương mại điện tử.Chúng tôi đã và đang khẳng định được vị trí hàng đầu bằng những sản phẩm</p>
         <ul style="list-style:none; margin:0px;">
            <li>
               <p style="color:#333"><span style="color:#777" class="glyphicon glyphicon-map-marker"></span> &nbsp; Địa chỉ: 124 Bàu Cát 1, Phường 12, Quận Tân Bình, Tp. Hồ Chí Minh</p>
            </li>
            <li>
               <p style="color:#333">
                  <span style="color:#777" class="glyphicon glyphicon-earphone"></span> &nbsp;  082 262 4444
               </p>
            </li>
            <li>
               <p style="color:#333">
                  <i style="color:#777" class="fa fa-archive"></i> &nbsp;  082 262 4444
               </p>
            </li>
            <li>
               <p style="color:#383838">
                  <span style="color:#777" class="glyphicon glyphicon-envelope"></span> &nbsp;<span style="color:#777"> info@qmtech.com.vn</span>
               </p>
            </li>
         </ul>
      </div>
   </div>
   

</div>
@stop