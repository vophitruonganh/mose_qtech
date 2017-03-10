@extends('backend.layouts.default')
@section('titlePage','Bảng điều khiển')
@section('content')
<div class="section-dashboard">
    <div class="dashboard-group dashboard-statistics">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-4 col-xl-3">
                <div class="box-typical box-typical-padding">
                    <div class="icon"><span class="bg-danger"></span><i class="font-icon material-icons md-24">add_shopping_cart</i></div>
                    <div class="text">
                        <h4 class="text-muted text-uppercase m-b-20">Đơn hàng</h4>
                        <p><span data-plugin="counterup">{{number_format($count_order)}}</span></p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-4 col-xl-3">
                <div class="box-typical box-typical-padding">
                    <div class="icon"><span class="bg-warning"></span><i class="font-icon material-icons md-24">shopping_basket</i></div>
                    <div class="text">
                        <h4 class="text-muted text-uppercase m-b-20">Sản phẩm</h4>
                        <p><span data-plugin="counterup">{{number_format($count_product)}}</span></p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-4 col-xl-3">
                <div class="box-typical box-typical-padding">
                    <div class="icon"><span class="bg-primary"></span><i class="font-icon material-icons md-24">accessibility</i></div>
                    <div class="text">
                        <h4 class="text-muted text-uppercase m-b-20">Khách hàng</h4>
                        <p><span data-plugin="counterup">{{number_format($count_customer)}}</span></p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-4 col-xl-3">
                <div class="box-typical box-typical-padding">
                    <div class="icon"><span class="bg-success"></span><i class="font-icon material-icons md-24">receipt</i></div>
                    <div class="text">
                        <h4 class="text-muted text-uppercase m-b-20">Bài viết</h4>
                        <p><span data-plugin="counterup">{{number_format($count_post)}}</span> <!-- <span class="currency-symbols" data-type="VND">&#8363;</span> --></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-group dashboard-sales">
        <div class="box-typical b-t-p">
            <div class="box-heading">
                <h3>Doanh số bán hàng</h3>
            </div>
            <div id="sales-morris" style="height: 250px;" data-plugin="morris"></div>
        </div>
    </div>
    <div class="dashboard-group dashboard-store">
        <div class="row">
            <div class="col-md-6">
                <div class="box-typical order-statistics">
                    <div class="box-heading box-heading-padding">
                        <h3>Đơn hàng mới</h3>
                    </div>
                    <div class="box-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="col-1">Đơn hàng mới</td>
                                    <td class="col-3 text-xs-right text-nowrap">{{$count_order_status['new']}}</td>
                                </tr>
                                <tr>
                                    <td class="col-1">Đơn hàng chưa thanh toán</td>
                                    <td class="col-3 text-xs-right text-nowrap">{{$count_order_status['pending']}}</td>
                                </tr>
                                <tr>
                                    <td class="col-1">Đơn hàng đã thanh toán chờ gửi hàng</td>
                                    <td class="col-3 text-xs-right text-nowrap">{{$count_order_status['paid']}}</td>
                                </tr>
                                <tr>
                                    <td class="col-1">Đơn hàng bị hoàn trả</td>
                                    <td class="col-3 text-xs-right text-nowrap">{{$count_order_status['be_refunded']}}</td>
                                </tr>
                                <tr>
                                    <td class="col-1">Đơn hàng bị hủy</td>
                                    <td class="col-3 text-xs-right text-nowrap">{{$count_order_status['cancel']}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box-typical">
                    <div class="box-heading box-heading-padding">
                        <h3>Sản phẩm bán chạy</h3>
                    </div>
                    <div class="box-body">
                        <table class="table">
                            <tbody>
                                @if($list_top_product)
                                    @foreach( $list_top_product as $product)
                                    <tr>
                                        <td class="col-1"><a href="{{url('admin/product/edit/'.$product->product_id)}}">{{$product->title}}</a></td>
                                    </tr>
                                    @endforeach
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop