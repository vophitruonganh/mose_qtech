 @if(count($product_list)>0)
<ul id="box-search-result" class="clearfix product" data-type="product">
    @foreach ($product_list as $product)
    
        <li data-product-id="{{ $product['product_id'] }}">
            <div class="product-thumb tbl-cell"><img src="{{ $product['product_image'] }}"></div>
            <div class="product-name table-cell">{{$product['product_title']}} </div>
            <ul>
                @foreach ($product['variant'] as $variant)
                <li class="search-item" data-id="{{ $variant['variant_id']}}">
                    <div class="tbl">
                        <a class="product-variant-name tbl-cell"><span>{{ $variant['variant_name']}}</span></a>
                        <div class="product-variant-price tbl-cell text-nowrap text-xs-right"><span class="price-new">{{ number_format($variant['price_new']) }}</span> <span class="currency-symbols" data-type="VND">&#8363;</span></div>
                    </div>
                </li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>
@else
<div class="p-a-1">Không tìm thấy sản phẩm</div>
@endif