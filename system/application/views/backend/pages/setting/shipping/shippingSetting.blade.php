@extends('backend.layouts.default')
@section('titlePage','Cấu hình vận chuyển')
@section('content')
<?php
    $heading = array(
        'heading_text' => 'Cấu hình vận chuyển'
    );
    $setion_heading = section_title($heading);
?>
<div class="section-setting">
    <div class="form-alerts"></div>
    @include('backend.includes.token')
    <div class="shipping-setting">
        <div class="section-group">
            <div class="row">
                <div class="section-group-heading col-lg-3">
                    <h4>Khu vực vận chuyển</h4>
                    <p>Thêm phí vận chuyển mới cho các khu vực vận chuyển khác nhau.</p>
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-shipping">Thêm khu vực vận chuyển</button>
                </div>
                <div class="section-group-body col-lg-9">
                    <div class="box-typical shipping-data">
                        @include('backend.pages.setting.shipping.viewShippingSetting')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-shipping" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="{{ url('admin/setting/shipping/create') }}" method="post">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button><h4 class="modal-title">Thêm khu vực vận chuyển</h4></div>
            <div class="modal-body">
                <div class="modal-alerts"></div>
                <div class="form-group">
                    <label>Nhập khu vực vận chuyển</label>
                    <select class="form-control custom-select" name="province_shipping">
                        @foreach($provinces as $p)
                        <option value="{{$p['id']}}">{{$p['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary waves-effect" data-bind="click: Setting.Shipping.Add">Thêm khu vực</button>
            </div>
        </form>
        </div>
    </div>
</div>
<div id="modal-rate" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('admin/setting/shipping/rate/create') }}" method="post" data-bind="form: disable">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button><h4 class="modal-title">Thêm phí vận chuyển cho khu vực</h4></div>
                <div class="modal-body">
                    <div class="modal-alerts"></div>
                    <div class="form-group">
                        <label>Tên tỷ lệ vận chuyển</label>
                        <input type="text" name="rate_name" class="form-control" value="" />
                        <input type="hidden" name="shipping" value="0">
                    </div>
                    <div class="form-group">
                        <label>Tiêu chuẩn tính phí</label>
                        <select name="shipping_criteria" class="form-control" data-bind="change: Setting.Shipping.ChangeCriteria">
                            <option value="price">Dựa trên giá sản phẩm</option>
                            <option value="weight">Dựa trên khối lượng sản phẩm</option>
                        </select>
                    </div>
                    <label><span class="criteria-price">Giá trị đơn hàng khoảng (Đơn vị: {!! get_currency($option_load['country_currency']) !!})</span><span class="criteria-weight" style="display: none;">Trọng lượng đơn hàng khoảng (Đơn vị: grams)</span></label>
                    <div class="form-inline">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Từ</span>
                                <input type="text" name="range_from" class="form-control" value="0" data-bind="keyup: Format.Number" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Đến</span>
                                <input type="text" name="range_to" class="form-control" value="0" data-bind="keyup: Format.Number"  />
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-t-1 m-b-0">
                        <label>Giá vận chuyển</label>
                        <div class="input-group">
                            <input type="text" name="shipping_price" class="form-control" value="" data-bind="keyup: Format.Number"  />
                            <span class="input-group-addon">{!! get_currency($option_load['country_currency']) !!}</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Hủy</button>
                    <button id="set-image-btn" type="button" class="btn btn-primary waves-effect" data-bind="click: Setting.Shipping.Add">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div style="display: none;">
    <a href="{{ url('admin/setting/shipping/create') }}">Thêm khu vực vận chuyển</a>
    @foreach($array_shipping as $shipping)
    <div>
        <p>
            <span style="color:red;font-size:18px">+{{$shipping['shipping_name']}}</span><a href="{{ url('admin/setting/shipping-rate/create/'.$shipping['shipping_id']) }}">Thêm phí vận chuyển</a><a href="{{ url('admin/setting/shipping/delete/'.$shipping['shipping_id']) }}">Xóa</a>
            <div>
                <ul>
                    @foreach($shipping['shipping_child'] as $arr_c)
                    <li>
                        <?php
                        $dvt='';
                        if($arr_c['type']=='price'){
                        $dvt='đ';
                        }
                        else{
                        $dvt='gr';
                        }
                        ?>
                        {{$arr_c['name']}} :
                        @if($arr_c['rate_to']==0)
                        <p>{{$arr_c['rate_from']}}{{$dvt}} trở lên</p>
                        @else
                        <p>{{$arr_c['rate_from']}}{{$dvt}} - {{$arr_c['rate_to']}}{{$dvt}}</p>
                        @endif
                        <p>Loại: {{$arr_c['type']}}</p>
                        <p>Giá: {{$arr_c['price']}}đ</p>
                        <p>Điều chỉnh</p>
                        <div>
                            <div class="form-alerts">@include('backend.includes.showErrorValidator')</div>
                            <form action="{{ url('admin/setting/shipping-rate/edit/'.$arr_c['shipping_id']) }}" method="post">
                                @include('backend.includes.token')
                                <dir>
                                <label>Tên tỷ lệ vận chuyển</label>
                                <input type="text" name="rate_name" value="{{$arr_c['name']}}">
                                </dir>
                                <dir>
                                <label>Tiểu chuẩn tính phí</label>
                                <select name="shipping_criteria">
                                    <option value="price" {{($arr_c['type']=='price')? 'selected' : ''}}>Dựa trên giá sản phẩm</option>
                                    <option value="weight" {{($arr_c['type']=='weight')? 'selected' : ''}}>Dựa trên khối lượng sản phẩm</option>
                                </select>
                                
                                <label>Hạn mức đơn hàng khoảng</label>
                                <input type="text" name="range_from" value="{{$arr_c['rate_from']}}">--<input type="text" name="range_to" value="{{$arr_c['rate_to']}}">
                                </dir>
                                <dir>
                                <label>Giá vận chuyển</label>
                                <input type="text" name="shipping_price" value="{{$arr_c['price']}}">
                                </dir>
                                <dir>
                                <input type="submit" name="save-district-province" value="Lưu">
                                <a href="{{ url('admin/setting/shipping/delete/'.$arr_c['shipping_id']) }}">Xóa</a>
                                </dir>
                            </form>
                        </div>
                        @if(count($arr_c['district'])>0)
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Quận / Huyện</th>
                                    <th>Giá điều chỉnh</th>
                                    <th>Giá cuối cùng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{ url('admin/setting/shipping/edit/'.$shipping['shipping_id']) }}" method="post">
                                    @include('backend.includes.token')
                                    <!-- <input type="hidden" name="place_id" value="{{$shipping['place_id']}}"> -->
                                    <input type="hidden" name="district_parent" value="{{$arr_c['shipping_id']}}">
                                    @foreach($arr_c['district'] as $district)
                                    <!-- <input type="hidden" name="district_place_id[]" value="{{$district['place_id']}}"> -->
                                    <input type="hidden" name="district_shipping_id[]" value="{{$district['shipping_id']}}">
                                    <tr>
                                        <td><input type="checkbox" name="is_district_shipping[]" value="{{$district['shipping_id']}}" style=" position: static; left: -9999px; opacity: 1; " {{($district['status']==1)? 'checked' : ''}}></td>
                                        <td>{{$district['name']}}</td>
                                        <td><input type="text" name="district_shipping[]" value="{{$district['price']}}"
                                            {{($district['status']==0)? 'style=display:none' : ''}}
                                        ></td>
                                        <td>
                                            @if($district['status']==1)
                                            {{$district['price_ship']}}đ ({{$district['price']}}đ)
                                            @else
                                            Không giao hàng
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    <input type="submit" name="update" value="update">
                                </form>
                            </tbody>
                        </table>
                        @endif
                        <ul>
                            
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
        </p>
    </div>
    @endforeach
</div>
@stop