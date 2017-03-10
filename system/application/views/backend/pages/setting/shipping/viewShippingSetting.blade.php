@foreach($array_shipping as $shipping)
<div class="shipping-group">
    <div class="box-heading box-heading-action">
        <h3 class="heading-text">{{$shipping['shipping_name']}}</h3>
        <div class="heading-action">
            <div class="dropdown-action dropdown-right">
                <div class="dropdown">
                    <button type="button" class="btn btn-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons md-20">more_vert</i></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:;" data-action="add" data-bind="click: Setting.Shipping.Action">Thêm phí vận chuyển</a>
                        <a class="dropdown-item" href="javascript:;" data-action="remove" data-bind="click: Setting.Shipping.Action">Xóa khu vực</a>
                    </div>
                </div>
            </div>
            <input type="hidden" class="shipping-id" value="{{ $shipping['shipping_id'] }}" />
            <input type="hidden" class="shipping-name" value="{{ $shipping['shipping_name'] }}" />
            <input type="hidden" class="place-id" value="{{ $shipping['place_id'] }}" />
        </div>
    </div>
    <div class="box-body">
        @foreach($shipping['shipping_child'] as $arr_c)
        <div class="shipping-content">
            <div class="shipping-name"><a data-toggle="collapse" href="#shipping-collapse-{{ $arr_c['shipping_id'] }}" aria-expanded="false" aria-controls="shipping-collapse-{{ $arr_c['shipping_id'] }}">{{$arr_c['name']}}</a></div>
            <div class="shipping-info clearfix">
                <div class="pull-xs-left">
                    <?php 
                        if($arr_c['type']=='price'){
                            $unit = get_currency($option_load['country_currency']);
                        }else {
                            $unit = 'grams';
                        }
                    ?>
                    @if($arr_c['rate_to']==0)
                        <span class="shipping-rate-group">
                            <span class="shipping-rate-form">{{ number_format($arr_c['rate_from']) }}</span> {!! $unit !!} <span class="shipping-rate-to">trở lên</span>
                        </span>
                    @else
                        <span class="shipping-rate-group">
                            <span class="shipping-rate-form">{{ number_format($arr_c['rate_from']) }}</span> {!! $unit !!} <span class="sep">-</span> <span class="shipping-rate-to">{{ number_format($arr_c['rate_to']) }}</span> {!! $unit !!}
                        </span>
                    @endif
                </div>
                <div class="pull-xs-right">
                    <span class="text-muted">Giá vận chuyển:</span> <span class="shipping-price">{{ number_format($arr_c['price']) }}</span> {!! get_currency($option_load['country_currency']) !!}
                </div>
            </div>
            <div id="shipping-collapse-{{$arr_c['shipping_id']}}" class="collapse">
                <div class="shipping-detail m-y-1">
                    <div class="form-group">
                        <label>Tên tỷ lệ vận chuyển</label>
                        <input type="text" class="form-control" value="{{$arr_c['name']}}" name="rate_name" />
                        <input type="hidden" name="rate_id" value="{{$arr_c['shipping_id']}}" />
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Giá vận chuyển</label>
                                <input type="text" name="shipping_price" class="form-control origin-price" value="{{number_format($arr_c['price'])}}" data-bind="keyup: Format.Number" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tiêu chuẩn tính phí</label>
                                <select name="shipping_criteria" class="form-control" data-type="add" data-bind="change: Setting.Shipping.ChangeCriteria">
                                    <option value="price" {{ ($arr_c['type']=='price') ? 'selected' : '' }}>Dựa trên giá sản phẩm</option>
                                    <option value="weight" {{ ($arr_c['type']=='weight') ? 'selected' : '' }}>Dựa trên khối lượng sản phẩm</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <label><span class="criteria-price" @if($arr_c['type']!=='price') style="display:none;" @endif>Giá trị đơn hàng khoảng (Đơn vị: {!! get_currency($option_load['country_currency']) !!})</span><span class="criteria-weight" @if($arr_c['type']=='price') style="display:none;" @endif>Trọng lượng đơn hàng khoảng (Đơn vị: grams)</span></label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Từ</span>
                                    <input type="text" name="range_from" class="form-control" value="{{ number_format($arr_c['rate_from']) }}" data-bind="keyup: Format.Number" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Đến</span>
                                    <input type="text" name="range_to" class="form-control" value="{{ number_format($arr_c['rate_to']) }}" data-bind="keyup: Format.Number" />
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(count($arr_c['district'])>0)
                    <div class="m-y-1">
                        <p class="font-weight-bold m-a-0">Phí vận chuyển cho quận/huyện</p>
                        <p class="m-a-0">Bạn có thể điều chỉnh phí vận chuyển cho quận/huyện thuộc {{$shipping['shipping_name']}}</p>
                    </div>
                    <table class="table table-np">
                        <thead>
                            <tr>
                                <th class="col-1"></th>
                                <th class="col-2">Quận/Huyện</th>
                                <th class="col-3">Giá điều chỉnh</th>
                                <th class="col-4">Giá cuối cùng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($arr_c['district'] as $district)
                            <tr>
                                <th class="col-1 table-check"><input id="district-{{$district['shipping_id']}}" type="checkbox" name="is_district_shipping[]" class="filled-tbl" value="{{$district['shipping_id']}}" data-bind="change: Setting.Shipping.ActiveRate" {{($district['status']==1)? 'checked' : ''}} /><label for="district-{{$district['shipping_id']}}"></label></th>
                                <td class="col-2">{{$district['name']}}</td>
                                <td class="col-3">
                                    <div class="input-group">
                                        <input type="text" name="district_shipping_price[]" class="form-control district-price" value="{{number_format($district['price'])}}" data-bind="keyup: Setting.Shipping.SetRate" {{($district['status']==0)? 'readonly' : ''}} />
                                        <span class="input-group-addon">{!! get_currency($option_load['country_currency']) !!}</span>
                                    </div>
                                </td>
                                <td class="col-4 text-nowrap">
                                    <span class="have-delivery" @if($district['status']!==1) style="display:none;" @endif><span class="price-group"><span class="sum-price amount">{{number_format($district['price_ship'])}}</span> {!! get_currency($option_load['country_currency']) !!} (<span class="text-success"><span class="addition-price amount font-weight-bold">{{number_format($district['price'])}}</span> {!! get_currency($option_load['country_currency']) !!})</span></span></span>
                                    <span class="no-delivery" @if($district['status']==1) style="display:none;" @endif>Không giao hàng</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
                <div class="clearfix m-b-1">
                    <div class="pull-xs-left">
                        <button class="btn btn-secondary" type="button" data-bind="click: Setting.Shipping.DeleteRate">Xóa giá</button>
                    </div>
                    <div class="pull-xs-right">
                        <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#shipping-collapse-{{ $arr_c['shipping_id'] }}" aria-expanded="false">Hủy</button>
                        <button class="btn btn-primary waves-effect" type="button" data-bind="click: Setting.Shipping.UpdateRate">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endforeach