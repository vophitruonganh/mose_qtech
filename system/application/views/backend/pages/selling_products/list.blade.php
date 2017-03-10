@extends('backend.layouts.default')
@section('titlePage','Selling Products')
@section('content')
<a href="{{ url('admin/selling-products') }}">Trở về</a>
@if( count($sellingProducts) == 0 )
    @include('backend.includes.nodata')
@else
<table class="border">
	<thead>
		<tr>
			<td>Product</td>
			<td>Numbers Buyer</td>
		</tr>
	</thead>
	<tbody data-bind='foreach: lines'>
		@foreach( $sellingProducts as $sellingProduct )
		<tr>
			<td>
				{{ $sellingProduct->post_title }}
			</td>
			<td>
				{{ $sellingProduct->count_buys }}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endif
@stop