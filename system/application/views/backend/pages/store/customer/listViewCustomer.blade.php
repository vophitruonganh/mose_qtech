<table class="table table-hover">
    <thead>
        <tr>
            <th class="col-1 table-check"><input type="checkbox" id="check-all" class="filled-tbl" /><label for="check-all"></label></th>
            <th class="col-2">Tên khách hàng</th>
            <th class="col-3">Số điện thoại</th>
            <th class="col-4 text-nowrap text-xs-center">Đơn hàng</th>
            <th class="col-5 text-nowrap text-xs-center">Đơn hàng gần nhất</th>
            <th class="col-6">Tổng tiền</th>
        </tr>
    </thead>
    <tbody>
    @if( count($customers) == 0 )
        <tr><th class="table-check"></th><td colspan="5">@include('backend.includes.nodata')</td></tr>
    @else
    <?php $i = 0; ?>
    @foreach( $customers as $customer)
    <?php $i++; ?>
        <tr>
            <th class="col-1 table-check"><input id="tbl-check-{{$i}}" type="checkbox" class="filled-tbl" name="check[]" id="check[]" value="{{$customer['customer_id']}}" /><label for="tbl-check-{{$i}}"></label></th>
            <td class="col-2"><div class="table-title"><a href="{{ url('admin/customer/edit/'.$customer['customer_id']) }}">@if($customer['customer_fullname']){{$customer['customer_fullname']}} @elseif($customer['customer_email']){{$customer['customer_email']}} @else {{$customer['customer_id']}} @endif</a></div></td>
            <td class="col-3">{{ $customer['customer_phone'] }}</td>
            <td class="col-4 text-nowrap text-xs-center">{{ $customer['count_order'] }}</td>
            <td class="col-5 text-nowrap text-xs-center"><a href="{{url('admin/order/detail/'.$customer['order_id'])}}">{{ get_template_order_code($customer['order_new']) }}</a></td>
            <td class="col-6 text-nowrap"><div class=""><span class="">{{ number_format($customer['price']) }}</span> <span class="currency-symbols" data-type="VND"></span></div></td>
        </tr>
    @endforeach
    @endif
    </tbody>
</table>  