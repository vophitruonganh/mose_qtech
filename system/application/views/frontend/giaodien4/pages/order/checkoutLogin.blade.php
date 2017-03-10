@extends('frontend.giaodien4.layouts.default')
@section('content')

 <form method="post" action="{{ url('cart/checkoutLogin.html') }}" data-toggle="validator" class="formCheckout">
    <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div context="checkout" class="container">
                
                <div class="main">
                    <div class="wrap clearfix">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                @if( count($errors) > 0 )   
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach( $errors->all() as $error )
                                            <li><strong>{{ $error }}</strong></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif  

                                <div class="form-group m0">
                                    <h2>
                                        <label class="control-label">Thông tin mua hàng</label>
                                    </h2>
                                </div>
                                <hr class="divider">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" id="email" value="{{$user->user_email }}" disabled>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="phone" name="phone" id="phone" value="{{ $user->user_telephone }}" disabled>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="address" id="address" value="{{ $address }}" disabled>
                                </div>
                                <hr class="divider">
                                <div class="form-group">
                                    <textarea name="note" class="form-control" placeholder="Ghi chú">{{old('note')}}</textarea>
                                </div>
                                <!-- end thông tin mua hang-->   
                            </div>
                            <div class="col-md-4 col-sm-6">

                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="order-summary order-summary--custom-background-color ">
                                    <div class="order-summary-header">
                                        <h2>
                                            <label class="control-label">Đơn hàng</label>
                                        </h2>
                                    </div>
                                    <div class="summary-body  summary-section">
                                        <div class="summary-product-list">
                                            <ul class="product-list">
                                            @if(!empty($orderCart))
                                            <?php $total = 0; ?>
                                                @foreach($orderCart as $key => $value)
                                                <?php 
                                                    $title      = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $value->post_title);
                                                    $totalPrice = $priceHeader[$value->post_id] * $quantity[$value->post_id];
                                                    $total      += $totalPrice;
                                                 ?>
                                                    <li class="product product-has-image clearfix">
                                                        <img src="//bizweb.dktcdn.net/thumb/thumb/100/059/226/products/7cfa522d0a33117c1fb21a7297795078.jpg?v=1456819550010" alt="File hộp gập 4cm - Hồng" class="pull-left product-image">
                                                        <div class="product-info pull-left">
                                                            <span class="product-info-name">
                                                            <strong>{{ $title }}</strong> x {{ $quantity[$value->post_id] }}
                                                            </span>
                                                            <span class="product-info-description">
                                                        
                                                            </span>
                                                        </div>
                                                        <strong class="product-price pull-right">
                                                        {{ number_format($totalPrice, 0, ',', '.') }}₫
                                                        </strong>
                                                    </li>
                                                @endforeach
                                            @endif
                                                 
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="summary-section" style="display: none">
                                        <div class="form-group m0">
                                            <div class="input-group">
                                                <input bind="code" name="code" type="text" class="form-control" placeholder="Nhập mã giảm giá">
                                                <span class="input-group-btn">
                                                <button bind-event-click="caculateShippingFee()" class="btn btn-primary event-voucher-apply" type="button">Áp dụng</button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="error mt10 hide" bind-show="inValidCode">
                                            Mã khuyễn mãi không hợp lệ
                                        </div>
                                    </div>
                                    <div class="summary-section">
                                        <div class="total-line total-line-subtotal clearfix">
                                            <span class="total-line-name pull-left">
                                            Tạm tính
                                            </span>
                                            <span class="total-line-subprice pull-right">{{ number_format($total, 0, ',', '.') }}₫</span>
                                        </div>
                                        <div class="total-line total-line-shipping clearfix" bind-show="requiresShipping">
                                            <span class="total-line-name pull-left">
                                            Phí ship
                                            </span>
                                            <span class="total-line-shipping pull-right">0₫</span>
                                        </div>
                                        <div class="total-line total-line-total">
                                            <span class="total-line-name pull-left">
                                            Tổng cộng
                                            </span>
                                            <span class="total-line-price pull-right">{{ number_format($total, 0, ',', '.') }}₫</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <input class="btn btn-primary col-md-12 mt10" type="submit" value="ĐẶT HÀNG">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

<script type="text/javascript">
$('form.formCheckout').change(function (){
    var email      = $('input#BillingAddress_Email').val();
    var phone      = $('input#BillingAddress_Phone').val();
    var token      = $('input[name="_token"]').val();
    var url        = 'checkout-pending.html';
    
    if(email != '' && phone == ''){
        data = {
            'email' : email,
        };
    }else if(email == '' && phone != ''){
        data = {
            'phone' : phone,
        };
    }
    
    $.ajax({
        type      : "POST",
        url       : url,
        dataType  : 'html',
        data      : {"_token" : token,"data" : data},
        success: function(data){
                    
        },
    });

});
                                                

</script>
    



@stop

    