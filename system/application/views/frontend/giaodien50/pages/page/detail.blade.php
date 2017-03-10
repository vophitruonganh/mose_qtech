@extends('frontend.giaodien3.layouts.default')
@section('content')
<!-- ROW 1 -->
 <div class="product-area">
    <!-- BREADCRUMB -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="breadcrumbs">
                    <ul>
                        <li class="home"> <a href="/" title="Trang chủ">Trang chủ<i class="sp_arrow">/</i></a></li>
                        <li><strong>{{ $page->post_title }}</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END BREADCRUMB -->
    
    <!-- SHOW CONTENT -->
    <div class="container">
        <div class="content_page_info">
            <h1>{{ $page->post_title }}</h1>
            <div class="rte">
                {!! preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $page->post_content) !!}
            </div>
        </div>
    </div>
     <!-- END CONTENT -->
</div>
@stop