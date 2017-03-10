@extends('backend.layouts.default')
@section('titlePage','Chi tiết đơn hàng')
@section('content')
<?php 
    $heading = array(
        'heading_link' => url("admin/order"),
        'heading_link_text' => 'Danh sách đơn hàng',
        'heading_text' => 'Thông tin đơn hàng',
    );
    $country_currency = 2;
    if(isset($option_load['country_currency'])){
        $country_currency = $option_load['country_currency'];
    }
    
    $setion_heading = section_title($heading);
    $fullname = isset($order_meta['fullname']) ? $order_meta['fullname'] : '';
    $company = isset($order_meta['company']) ? $order_meta['company'] : '';
    $phone = isset($order_meta['phone']) ? $order_meta['phone'] : '';
    $address = isset($order_meta['address']) ? $order_meta['address'] : '';
    $province = isset($order_meta['province']) ? $order_meta['province'] : '';
    $district = isset($order_meta['district']) ? $order_meta['district'] : '';
    $email = isset($order_meta['email']) ? $order_meta['email'] : '';
?>
    @if(count($data_cancel)>0)
        <p>Đơn hàng được hủy vào lúc {{$data_cancel['time']}}</p>
        <p>Bởi {{$data_cancel['user_cancel']}} Lý do: {{$data_cancel['reason_cancel']}}</p>
        @if($data_cancel['note']!='')
        <p>Ghi chú: {{$data_cancel['note']}}</p>
        @endif
    @endif
    <div class="section-order order-detail">
        <div class="form-alerts">@include('backend.includes.showErrorValidator')</div>
        <form action="{{ url('admin/order/create') }}" method="post">
            <div class="box-container clearfix">
                <div class="box-container-1">
                    <div class="box-typical box-typical-margin">
                        <div class="box-heading box-heading-padding">
                            <h3>Mã đơn hàng: {{$order_code}}</h3>
                        </div>
                        <div class="box-body box-body-padding p-t-0">
                            <div class="detail-table">
                                <table class="table table-np">
                                    <tbody>

                                        @foreach($product_temp as $product)
                                        <?php 
                                            $quantity_buy = $product['quantity_buy'];
                                            $price = number_format($product['price'], 0, ',', ',');
                                            $total_product = number_format($quantity_buy*$product['price'], 0, ',', ',');
                                        ?>
                                        <tr>
                                            <td class="col-1"><div class="product-thumb"><div class="thumbnail-preview"><div class="thumbnail"><div class="centered"><img src="{{ $product['image'] }}"></div></div></div></div></td>
                                            <td class="col-2">
                                                <div class="title-link"><a href="{{$product['product_url']}}">{{$product['title']}}</a></div>
                                                <div>{{ $product['variant_name'] }}</div>
                                            </td>
                                            <td class="col-3 text-xs-right text-nowrap">
                                                <div class="price-group">
                                                    <span class="amount">{{$price}}</span> <span class="currency-symbols" data-type="VND">₫</span>
                                                </div>
                                            </td>
                                            <td class="col-4 text-xs-center text-muted">x</td>
                                            <td class="col-5 text-muted">{{ $quantity_buy }}</td>
                                            <td class="col-6 text-nowrap text-xs-right">
                                                <div class="price-group">
                                                    <span class="amount">{{$total_product}}</span> <span class="currency-symbols" data-type="VND">₫</span>
                                                </div>
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
        <!--     <p>Mã khuyến mãi:  -{{number_format($order->amount_discount, 0, ',', '.')}} ₫</p>
            @if($order->order_discount_notes)<p>{{$order->order_discount_notes}}</p>@endif
            @if(count($order_shipping)>0)Phí vận chuyển ({{$order_shipping['shipping_name']}})  {{$order_shipping['shipping_price']}} ₫@endif
            <p>Số tiền phải thanh toán:    {{number_format($order->amount_payment, 0, ',', '.')}} ₫</p>
            <p>Số tiền đã thanh toán:  415,000 ₫</p>
            <p>Số tiền đã hoàn trả:    {{number_format($order->amount_refuned, 0, ',', '.')}} ₫</p>
            <p>Số tiền thực nhận:  415,000 ₫</p> -->
                            <div class="amount-table">
                                <table class="table table-np">
                                    <tbody>
                                        <tr>
                                            <td class="col-1 text-xs-right"><span class="text-muted">Tổng giá trị sản phẩm:</span></td>
                                            <td class="col-2 text-xs-right text-nowrap">
                                                <div class="price-group">
                                                    <span class="amount">{{number_format($order->amount_order)}}</span> {!! get_currency($country_currency) !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-1 text-xs-right"><span class="text-muted">Mã khuyến mãi:</span></td>
                                            <td class="col-2 text-xs-right text-nowrap">
                                                <div class="price-group">
                                                    <span class="amount">{{number_format($order->amount_order)}}</span> {!! get_currency($country_currency) !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-1 text-xs-right"><span class="text-muted">Số tiền đã thanh toán:</span></td>
                                            <td class="col-2 text-xs-right text-nowrap">
                                                <div class="price-group">
                                                    <span class="amount">{{number_format($order->amount_order)}}</span> {!! get_currency($country_currency) !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-1 text-xs-right"><span class="text-muted">Tổng giá trị sản phẩm:</span></td>
                                            <td class="col-2 text-xs-right text-nowrap">
                                                <div class="price-group">
                                                    <span class="amount">{{number_format($order->amount_order)}}</span> {!! get_currency($country_currency) !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-1 text-xs-right"><span class="text-muted">Số tiền thực nhận:</span></td>
                                            <td class="col-2 text-xs-right text-nowrap">
                                                <div class="price-group">
                                                    <span class="amount">{{number_format($order->amount_order)}}</span> {!! get_currency($country_currency) !!}
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="box-typical">
                        <div class="box-body box-body-padding">
                            <div class="form-group m-b-0">
                                <label for="">Ghi chú đơn hàng</label>
                                <textarea name="" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-container-2">
                    <div class="box-typical">
                        <div class="proj-page-section proj-page-action clearfix">
                            <div class="pull-xs-right">
                                <a class="btn btn-link" href="{{ url('admin/order/trash/'.$order->order_code) }}">Hủy</a>
                                <button type="submit" class="btn btn-primary waves-effect" data-bind="click: Product.Submit">Cập nhật</button>
                            </div>
                        </div>
                        <div class="proj-page-section order-customer">
                            <div class="proj-page-subtitle">
                                <h3>Thông tin giao hàng</h3>
                                <div class="dropdown-action">
                                    <div class="dropdown">
                                        <button class="btn btn-icon dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons md-20">more_vert</i></button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item modal-render" href="javascript:;" data-action="update" data-type="customer" data-bind="click: Order.RenderModal">Chỉnh sửa thông tin</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-customer-info">
                                <ul>
                                    <li><span class="label-heading">Họ tên:</span> <span class="text">{{ $fullname }}</span></li>
                                    <li><span class="label-heading">Số điện thoại:</span> <span class="text">{{ $phone }}</span></li>
                                    <li><span class="label-heading">Email:</span> <span class="text">{{ $email }}</span></li>
                                    <li><span class="label-heading">Địa chỉ:</span> <span class="text">{{ $address }}</span></li>
                                    <li><span class="label-heading">Quận/Huyện:</span> <span class="text">{{ $district }}</span></li>
                                    <li><span class="label-heading">Tỉnh/Thành phố:</span> <span class="text">{{ $province }}</span></li>
                                    <li><a href="{{$urlMap}}" target="_blank"><i class="material-icons md-18">location_on</i> Xem bản đồ</a></li>
                                    <li><a href=""><i class="material-icons md-18">location_on</i> Thông tin khách hàng</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="proj-page-section proj-page-action clearfix">
                            <div class="proj-page-subtitle"><h3>Thông tin vận chuyển</h3></div>
                            <div class="">
                                <ul>
                                    <li>Tổng khối lượng: 0</li>
                                    <li>Phí vận chuyển: 0</li>
                                    <li>Phương thức: Giao hàng tận nơi</li>
                                    <li>Nhà vận chuyển: Giaohangnhanh</li>
                                    <li>Mã vận chuyển: #jdksaj</li>
                                    <li>Trạng thái thu hộ (COD): chưa thu</li>
                                    <li>Trạng thái vận chuyển: Chờ lấy hàng</li>
                                    <li>Tình trạng: Đang vận chuyển</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <a href="#">Giao hàng</a>
    <a href="{{ url('admin/order/refuned/'.$order->order_code) }}">Hoàn trả</a>
    <form id="form" name="form" action="{{ url('admin/order/update-status/'.$order->order_code) }}" method="post" enctype="multipart/form-data">
        @include('backend.includes.token')
        @if($order->order_status!=0 && $order->order_status!=2)
            <input type="submit" value="Xác nhận đã thanh toán">
        @endif
        @if($order->order_active==0)
            <a href="{{ url('admin/order/active-order/'.$order->order_code)}}">Xác thực</a>
        @endif
        @include('backend.includes.token')
        <input id="order_code" name="order_code" type="hidden" value="{{ $order->order_code }}"/>
        <table>
            <tbody>
                <?php $i=0; ?>
                @foreach($product_temp as $product)
                <?php 
                    $quantity_buy = $product['quantity_buy'];
                    $quantity_refuned = $product['quantity_refuned'];
                    $price = number_format($product['price'], 0, ',', '.');
                    $total_product = number_format($quantity_buy*$product['price'], 0, ',', '.');
                    
                 ?>
                <tr>
                    <td><img src="{{$product['image']}}">   </td>
                    <td>{{$product_temp[$i]['title']}}<br>{{$product_temp[$i]['variant_name']}}<br>{{$quantity_buy}} chưa hoàn thành @if($quantity_refuned!=0)<br>{{$quantity_refuned}} nhập kho @endif</td>
                    <td>{{$quantity_buy}} * {{$price}} đ</td>
                    <td>{{$total_product}} đ</td>
                </tr>
                <?php $i++;?>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <p>Tổng giá trị sản phẩm:  {{number_format($order->amount_order, 0, ',', '.')}}đ</p>
            <p>Mã khuyến mãi:  -{{number_format($order->amount_discount, 0, ',', '.')}} ₫</p>
            @if($order->order_discount_notes)<p>{{$order->order_discount_notes}}</p>@endif
            @if(count($order_shipping)>0)Phí vận chuyển ({{$order_shipping['shipping_name']}})  {{$order_shipping['shipping_price']}} ₫@endif
            <p>Số tiền phải thanh toán:    {{number_format($order->amount_payment, 0, ',', '.')}} ₫</p>
            <p>Số tiền đã thanh toán:  415,000 ₫</p>
            <p>Số tiền đã hoàn trả:    {{number_format($order->amount_refuned, 0, ',', '.')}} ₫</p>
            <p>Số tiền thực nhận:  415,000 ₫</p>
        </div>
        <hr>
        <div class="row">
            <a href="{{ url('admin/order/shipping-info/'.$order->order_code) }}">Chỉnh sửa địa chỉ </a><br>
            Địa chỉ giao hàng<br>
            {{$company}}
            {{$fullname}}<br>
            {{$address}}<br>
            {{$province}}<br>
            {{$district}}<br>
            {{$phone}}<br>
            {{$email}}<br>
            <!-- Phương thức: Giao hàng tận nơi<br> -->
            Tổng khối lượng: {{$order_weight}} kg<br>
        </div>
        <hr>
        <div class="row">
            @if($user_create!='')
                Nhân viên tạo: {{$user_create}}
            @endif
        </div>
    </form>
    
    @stop