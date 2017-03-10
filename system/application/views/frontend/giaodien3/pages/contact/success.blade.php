@extends('frontend.giaodien3.layouts.default')
@section('content')
 <!--breadcrumbs-->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="breadcrumbs">
                <ul>
                    <li class="home"> <a href="/" title="Trang chủ">Trang chủ<i class="sp_arrow">/</i></a></li>
                    <li><strong>Liên hệ</strong></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumbs--> 
<!--container-->
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="form_blog_comment">
                Cảm ơn bạn! Email đã được gửi đến nhà quản trị!
            </div>
        </div>
        <div class="col-md-5">
            <h4 style="margin-top: 60px; color:#3bb2ca; margin-bottom: 30px;">LIÊN HỆ VỚI CHÚNG TÔI</h4>
            <a class="logo" href="{{ url('/') }}">
            <img alt="Office 365" src="{{ asset('template/giaodien3/images/logo.png') }}">
            </a>
            <p style="font-size:14px;color: #797979; margin-bottom: 20px; margin-top:20px;">DKT được thành lập với niềm đam mê và khát vọng thành công trong lĩnh vực Thương mại điện tử.Chúng tôi đã và đang khẳng định được vị trí hàng đầu bằng những sản phẩm</p>
            <ul style="list-style:none; margin:0px;">
                <li>
                    <p style="color:#797979">
                        <span style="color:#3bb2ca" class="glyphicon glyphicon-phone"></span> &nbsp; 08 2262 4444
                    </p>
                </li>
                <li>
                    <p style="color:#797979">
                        <span style="color:#3bb2ca" class="glyphicon glyphicon-envelope"></span> &nbsp;<span style="color:#797979"> info@qmtech.com.vn</span>
                    </p>
                </li>
            </ul>
        </div>
    </div>
</div>
@stop