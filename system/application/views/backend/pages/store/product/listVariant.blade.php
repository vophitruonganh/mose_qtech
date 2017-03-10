<div class="table-responsive">
    <table class="table">
        <thead>
            <th class="col-1"></th>
            <th class="col-2 text-xs-center text-nowrap"></th>
            <!-- <th class="col-3">Tiêu đề</th>
            <th class="col-4">Kích thước</th>
            <th class="col-5 text-xs-center text-nowrap">Màu sắc</th>
            <th class="col-6 text-xs-center text-nowrap">Mã sản phẩm</th>
            
            <th class="col-8 text-xs-center text-nowrap">Số lượng</th> -->
            <?php $i=3?>
            @foreach( $array_title_table as $value )
            <th class="col-{{$i}} text-nowrap"><span class="variant-option text-inline-hidden">{{$value}}</span></th>
            <?php $i++; ?>
            @endforeach
            <th class="col-6 text-xs-center text-nowrap">Mã sản phẩm</th>
            <th class="col-7 text-nowrap">Giá</th>
            <th class="col-8 text-nowrap">Số lượng</th>
            <th class="col-9 text-xs-center"></th>
        </thead>
        <tbody>
        @foreach( $variant_array as $variant )
            <tr data-id="{{$variant['variant_id']}}">
                <th class="col-1 table-check"><input id="variant-id-{{$variant['variant_id']}}" class="filled-tbl" type="checkbox" name="variant_id[]" value="{{$variant['variant_id']}}" checked /><label for="variant-id-{{$variant['variant_id']}}"></label></th>
                <td class="col-2 text-xs-center"><span class="variant-thumb">@if($variant['image'])<div class="thumbnail-preview"><div class="thumbnail"><div class="centered"><img data-id="{{ $variant['image'] }}" src="{{ get_image($variant['image'],'thumb') }}"></div></div></div>@else<i class="font-icon material-icons md-20">photo_camera</i>@endif</span></td>
                @if(count($variant['option1'])>0)
                <td class="col-3"><span class="variant-title text-primary variant-option text-nowrap text-inline-hidden">{{$variant['option1']['variant_value']}}</span></td>
                @endif
                @if(count($variant['option2'])>0)
                <td class="col-4"><span class="variant-option text-nowrap text-inline-hidden">{{$variant['option2']['variant_value']}}</span></td>
                @endif
                @if(count($variant['option3'])>0)
                <td class="col-5"><span class="variant-option text-nowrap text-inline-hidden">{{$variant['option3']['variant_value']}}</span></td>
                @endif
                <td class="col-6 text-nowrap"><span class="variant-sku text-inline-hidden">{{$variant['variant_sku']}}</span></td>
                <td class="col-7 text-nowrap"><span class="variant-price text-inline-hidden">{{ number_format($variant['variant_price']) }}</span> <span class="currency-symbols" data-type="VND"></span></td>
                <td class="col-8 text-nowrap"><span class="variant-quantity text-inline-hidden">{{$variant['variant_quantity']}}</span></td>
                <td class="col-9 text-xs-center text-nowrap"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-secondary btn-edit"><i class="font-icon material-icons md-16">mode_edit</i></button><button type="button" class="btn btn-secondary btn-delete"><i class="font-icon material-icons md-16">delete_forever</i></button></div></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>