@extends('frontend.giaodien10.layouts.default')
@section('content')
<div id="maincontainer">
    <div class="container">
        <div id="page">
            <div id="layout-page">
                <span class="header-contact header-page clearfix">
                    <h1 class="heading1"><span class="maintext">Liên hệ</span></h1>
                </span>
                <div class="content-contact content-page">
                    <div class="" id="col-right">
                        <h3 class="name-company">QmTech</h3>
                        <p> Giải pháp bán hàng toàn diện từ website đến cửa hàng    </p>
                        <ul class="info-address">
                            <li>
                                <i class="glyphicon glyphicon-map-marker"></i>
                                <span>Lầu 7 Tòa nhà HHM Đường Xuân Hồng, Phường 12, QuậnTân Bình, TP Hồ Chí Minh</span>
                            </li>
                            <li>
                                <i class="glyphicon glyphicon-envelope"></i>
                                <span>info@qmtech.com.vn</span>
                            </li>
                            <li>
                                <i class="glyphicon glyphicon-phone-alt"></i> 
                                <span>08 2262 4444</span>
                            </li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                    <div class="row">
                        <div class="col-sm-5" id="col-left contactFormWrapper">
                            Cảm ơn bạn! Email đã được gửi đến nhà quản trị!
                        </div>
                        <div class="col-sm-7">
                            <h3>Bản đồ</h3>
                            <hr class="line-left">
                            <p class="text-center">
                                <iframe src="{{ $google_map['url'] }}" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop