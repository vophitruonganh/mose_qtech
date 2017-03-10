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
              <p> <iframe src="{{$row['src']}}" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> </p>
             @endforeach
         </div>
      </div>
   </div>
</div>


<div class="container" style="margin-top: 20px;">
   <div class="row">
      <div class="col-md-6">
         <div class="form_blog_comment">
            Cảm ơn bạn! Email đã được gửi đến nhà quản trị!
         </div>
      </div>
    <div class="col-md-6">
       <p style="font-size:14px; color:#777;margin-bottom: 20px; margin-top:20px;">DKT được thành lập với niềm đam mê và khát vọng thành công trong lĩnh vực Thương mại điện tử.Chúng tôi đã và đang khẳng định được vị trí hàng đầu bằng những sản phẩm</p>
       <ul style="list-style:none; margin:0px;">
          <li>
             <p style="color:#333"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; Địa chỉ: 124 Bàu Cát 1, Phường 12, Quận Tân Bình, Tp. Hồ Chí Minh</p>
          </li>
          <li>
             <p style="color:#333">
                <i class="fa fa-phone" aria-hidden="true"></i>  &nbsp;  082 262 4444
             </p>
          </li>
          <li>
             <p style="color:#333">
                <i class="fa fa-phone" aria-hidden="true"></i> &nbsp;  082 262 4444
             </p>
          </li>
          <li>
             <p style="color:#383838">
                <i class="fa fa-envelope-o" aria-hidden="true"></i> &nbsp;<span style="color:#777"> info@qmtech.com.vn</span>
             </p>
          </li>
       </ul>
    </div>

   </div>
   

</div>
   

@stop