<table class="table table-hover">
    <thead>
        <tr>
            <th class="col-1 table-check"><input type="checkbox" id="check-all" class="filled-tbl" /><label for="check-all"></label></th>
            <th class="col-2">Tên sản phẩm</th>       
            <th class="col-3">Danh mục</th>     
            <th class="col-4 text-nowrap text-xs-center col-4">Tình trạng</th>
        </tr>
    </thead>
    <tbody>
    @if( count($products) == 0 )
        <tr><th class="table-check"></th><td colspan="4">@include('backend.includes.nodata')</td></tr>
    @else
        <?php $i = 0; ?>
        @foreach( $products as $product )
        <?php
            $i++;
            $productMeta = decode_serialize($product->meta_value);
            $featureImage = get_image_url($productMeta['post_featured_image']);
            if( strlen($featureImage) > 0 )
            {
                $featureImage = '<img src="'.$featureImage.'" alt="'.$product->product_title.'" width="50" />';
            }
         ?>
        <tr>
            <th class="table-check col-1"><input id="tbl-check-{{$i}}" type="checkbox" class="filled-tbl" name="check[]" id="check[]" value="{{$product->product_id}}" /><label for="tbl-check-{{$i}}"></label></th>
         
            <?php if( strlen($product->product_title) == 0 ){ $title = $product->product_id; }else { $title = $product->product_title; }  ?>            
            <td class="col-2">@if($product_status=='trash' || $product->product_status == 'trash') {!! $featureImage !!} <div class="title-text text-muted">{{ $title }}</div> @else <div class="title-link">{!! $featureImage !!} <a href="{{ url('admin/product/edit/'.$product->product_id) }}">{{ $title }}</a></div>@endif</td>
            <td class="col-3"><?php echo get_cat_product($product->product_id) ?></td>
            <td class="col-4 text-nowrap text-xs-center">@if( $product->product_status == 'public' ) <span class="label label-success">Công khai</span> @elseif( $product->product_status == 'pending' ) <span class="label label-primary">Đang chờ duyệt</span> @elseif( $product->product_status == 'draft' ) <span class="label label-default">Nháp</span> @elseif( $product->product_status == 'trash' ) <span class="label label-danger">Xóa</span> @endif</td>
        </tr>
    @endforeach
    @endif
    </tbody>
</table>  