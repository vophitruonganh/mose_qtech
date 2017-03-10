@extends('backend.layouts.default')
@section('titlePage','Chỉnh sửa variant')
@section('content')
    @include('backend.includes.showErrorValidator')

    <div class="section-post edit-page">
        <div class="form-alerts"></div>
        <form id="product-form" action="{{ url('admin/variant/edit/'.$variant->variant_id) }}" method="post">
            @include('backend.includes.token')
           
            <div class="box-container clearfix">
                <div class="box-container-1">
                    <div class="box-typical b-t-m">
                        <div class="box-typical-body b-t-p">
                            <div class="row">
                                @foreach ($variant_meta as $value)
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span>{{$value->variant_name}}</span>
                                            <input type="text" class="form-control" id="variant_value" name="variant_value[]" value="{{$value->variant_value}}" />
                                            <input type="hidden" class="form-control" id="variant_name" name="variant_name[]" value="{{$value->variant_name}}" />
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Mã sản phẩm</span>
                                    <input type="hidden" class="form-control" id="product_id" name="product_id" value="{{$variant->product_id}}" />
                                    <input type="text" class="form-control" id="product_code" name="product_code" value="{{ old('product_code',$variant->sku) }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">Giá cũ</span>
                                            <input type="text" class="form-control" id="price_old" name="price_old" value="{{ old('price_old',$variant->price_old) }}" />
                                            <span class="input-group-addon">VNĐ</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">Giá mới</span>
                                            <input type="text" class="form-control" id="price_new" name="price_new" value="{{ old('price_new',$variant->price_new) }}" />
                                            <span class="input-group-addon">VNĐ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select id="tracking-select" name="tracking" class="form-control" data-on-change="Store.ProductTrackingChange">
                                            <option value="notracking" {{($variant->tracking_policy==0)? 'selected' : ''}}>Không quản lý tồn kho</option>
                                            <option value="tracking" {{($variant->tracking_policy==1)? 'selected' : ''}}>Quản lý tồn kho</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon p-y-0">Số lượng</span>
                                            <input type="number" class="form-control" id="product-quantity" name="product_quantity" value="{{ old('product_quantity',$variant->quantity) }}"  />
                                            <span class="input-group-addon p-y-0"><input type="checkbox" id="quantity-limit" class="filled-in" name="quantity_limit" {{($variant->out_of_stock==1)? 'checked' : ''}}/> <label for="quantity-limit">Cho đặt hàng khi đã hết hàng</label></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon p-y-0">Khối lượng</span>
                                    <input type="text" class="form-control" id="product-weight" name="product_weight" value="{{ old('product_weight',$variant->weight) }}"  />
                                    <span class="input-group-addon p-y-0">(grams)</span>
                                    <span class="input-group-addon p-y-0"><input type="checkbox" id="product-ship" class="filled-in" name="product_ship" {{($variant->ship==1)? 'checked' : ''}}/> <label for="product-ship">Có giao hàng</label></span>
                                </div>
                            </div>
                            <input type="submit" name="update" value="Cập nhật">
                        </div>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
    
@stop
