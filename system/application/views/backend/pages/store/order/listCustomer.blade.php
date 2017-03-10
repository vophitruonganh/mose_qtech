@if(count($customer_list)>0)
<ul id="box-search-result" class="clearfix customer" data-type="customer">
 @foreach ($customer_list as $customer)
    <li class="search-item" data-id="{{$customer->customer_id}}">
        <div class="tbl">
            <div class="customer-thumb tbl-cell">@if($customer->avatar)<img src="{{ $customer->avatar }}" />@else <i class="font-icon material-icons">account_circle</i> @endif</div>
            <div class="customer-name tbl-cell">@if($customer->customer_fullname)<p class="name">{{$customer->customer_fullname}}</p>@endif @if($customer->customer_email)<p class="email text-muted">{{$customer->customer_email}}</p>@endif</div>
        </div>
    </li>
 @endforeach
</ul>
@else
<div class="p-a-1">Không tìm thấy khách hàng</div>
@endif