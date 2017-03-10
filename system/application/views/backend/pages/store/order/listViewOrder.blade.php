<table class="table table-hover">
    <thead>
        <tr>
            <th class="col-1 table-check"><input type="checkbox" id="check-all" class="filled-tbl" /><label for="check-all"></label></th>
            <th class="col-2">Mã đơn hàng</th>
            <th class="col-3">Ngày đặt</th>
            <th class="col-4">Khách hàng</th>
            <th class="col-5 text-nowrap">Tổng tiền</th>
            <th class="col-6 text-nowrap text-xs-center">Tình trạng</th>
        </tr>
    </thead>
    <tbody> 
    @if( count($list_order) == 0 )
        <tr><th class="table-check"></th><td colspan="4">@include('backend.includes.nodata')</td></tr>
    @else
    <?php $i = 0; ?>
    @foreach( $list_order as $order  )
    <?php $i++; 
        $order_code=$order_prefix.$order['order_code'].$order_suffix;
    ?>
    <tr>
        <th class="col-1 table-check"><input id="tbl-check-{{$i}}" type="checkbox" class="filled-tbl" name="check[]" id="check[]" value="{{ $order['order_code'] }}" /><label for="tbl-check-{{$i}}"></label></th>
        @if($order['order_status']==3)
            <td class="col-2"><div class="title-link"><a href="{{ url('admin/order/draft/'.$order['order_code']) }}">{{$order_code}}</a></div></td>
        @else
            <td class="col-2"><div class="title-link"><a href="{{ url('admin/order/detail/'.$order['order_id']) }}">{{$order_code}}</a></div></td>
        @endif
        <td class="col-3">{{ date('d-m-Y H:i',$order["order_date"]) }}</td>
        <td class="col-4"><a href="{{ url('admin/order?customer_id='.$order['customer_id']) }}" >{{ $order["customer_fullname"] }}</a></td>
        <td class="col-5 text-nowrap">{{ number_format($order["amount_order"],0,',',',')}} ₫</td>
        <td class="col-6 text-nowrap text-xs-center">@if( $order["order_status"]==0 ) <span class="label label-success">Đã thanh toán</span> @elseif( $order["order_status"]==1 ) <span class="label label-primary">Chưa thanh toán</span> @elseif( $order["order_status"]==3 ) <span class="label label-default">Nháp</span> @elseif( $order["order_status"]==4 ) <span class="label label-default">Hoàn trả một phần</span> @elseif( $order["order_status"]==5 ) <span class="label label-default">Hoàn trả toàn bộ</span> @endif</td>
    </tr>
    @endforeach
    @endif
    </tbody>
</table>