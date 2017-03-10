@extends('backend.layouts.default')
@section('titlePage','Show Option')
@section('content')
    {!!section_title('Cấu hình website')!!}
    @include('backend.includes.showErrorValidator')
    <div class="section-setting website-setting edit-page">
        <form action="{{ url('admin/setting/website') }}" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="box-typical">
                        <div class="box-typical-header panel-heading">
                            <h3 class="panel-title">Chung</h3>
                        </div>
                        <div class="box-typical-body panel-body">
                            <div class="form-group">
                                <label>Tên website</label>
                                <input class="form-control" name="taxonomy-name" type="text" value="" />
                            </div>
                            <div class="form-group">
                                <label>Mô tả website</label>
                                <input class="form-control" name="taxonomy-name" type="text" value="" />
                            </div>
                            <div class="form-group">
                                <label>Đường dẫn</label>
                                <input class="form-control" name="taxonomy-name" type="text" value="" readonly="readonly" />
                            </div>
                            <div class="form-group">
                                <label>Tên miền</label>
                                <input class="form-control" name="taxonomy-name" type="text" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="box-typical">
                        <div class="box-typical-header panel-heading">
                            <h3 class="panel-title">SEO</h3>
                        </div>
                        <div class="box-typical-body panel-body">
                            <div class="form-group">
                                <label>Tên website</label>
                                <input class="form-control" name="taxonomy-name" type="text" value="" />
                            </div>
                            <div class="form-group">
                                <label>Mô tả website</label>
                                <input class="form-control" name="taxonomy-name" type="text" value="" />
                            </div>
                            <div class="form-group">
                                <label>Đường dẫn</label>
                                <input class="form-control" name="taxonomy-name" type="text" value="" readonly="readonly" />
                            </div>
                            <div class="form-group">
                                <label>Tên miền</label>
                                <input class="form-control" name="taxonomy-name" type="text" value="" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box-typical">
                        <div class="box-typical-header panel-heading">
                            <h3 class="panel-title">Hình ảnh</h3>
                        </div>
                        <div class="box-typical-body panel-body">
                            <label>Kích thước nhỏ</label>
                            <div class="form-group">
                                
                                <div class="form-inline">
                                <input class="form-control" placeholder="Chiều rộng" name="taxonomy-name" type="number" value="" />
                                <input class="form-control" placeholder="Chiều Cao" name="taxonomy-name" type="number" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Kích thước trung bình</label>
                                <div class="form-inline">
                                <input class="form-control" placeholder="Chiều rộng" name="taxonomy-name" type="number" value="" />
                                <input class="form-control" placeholder="Chiều Cao" name="taxonomy-name" type="number" value="" />
                                </div>
                            </div><div class="form-group">
                                <label>Kích thước lớn</label>
                                <div class="form-inline">
                                <input class="form-control" placeholder="Chiều rộng" name="taxonomy-name" type="number" value="" />
                                <input class="form-control" placeholder="Chiều Cao" name="taxonomy-name" type="number" value="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <form action="{{ url('admin/setting/website') }}" method="post">
        @include('backend.includes.token')
        <div class="row">
            <div class="col-md-6">
                <div class="box-typical">
                    <div class="box-typical-header panel-heading">
                        <h3 class="panel-title">Cấu hình website</h3>
                    </div>
                    <div class="box-typical-body panel-body">
                        <div class="form-group">
                            <label>Tiêu đề website</label>
                            <input type="text" class="form-control" id="inputPassword" placeholder="Tiêu đề website" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Mô tả website</label>
                            <input type="text" class="form-control" id="inputPassword" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề website</label>
                            <input type="text" class="form-control" id="inputPassword" placeholder="Tiêu đề website" />
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề Trang chủ</label>
                            <input type="text" class="form-control" id="inputPassword" placeholder="Tiêu đề website" />
                        </div>
                        <div class="form-group">
                            <label>Mô tả trang chủ</label>
                            <textarea name="" id="" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Từ khóa trang chủ</label>
                            <input type="text" class="form-control" id="inputPassword" placeholder="Tiêu đề website" />
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề website</label>
                            <input type="text" class="form-control" id="inputPassword" placeholder="Tiêu đề website" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <label for="defaultPostCategory">Default Post Category</label>
            <select id="defaultPostCategory" name="defaultPostCategory">
				{{ menuMulti($data['postCategory'],0,"---|",old('defaultPostCategory',$configWebsite['defaultPostCategory'])) }}
			</select>
        </div>
        <div class="row">
            <label for="defaultProductCategory">Default Product Category</label>
            <select id="defaultProductCategory" name="defaultProductCategory">
				{{ menuMulti($data['productCategory'],0,"---|",old('defaultProductCategory',$configWebsite['defaultProductCategory'])) }}
			</select>
        </div>
        <?php
            $_explode = explode('x',$configWebsite['sizeThumbImage']);
            $widthThumb = $_explode[0];
            $heightThumb = $_explode[1];
        ?>
        <div class="row">
            <label>Size Thumb Image</label>
            <input name="widthSizeThumbImage" type="text" value="{{ old('widthSizeThumbImage',$widthThumb) }}"/> x <input name="heightSizeThumbImage" type="text" value="{{ old('heightSizeThumbImage',$heightThumb) }}"/>
        </div>
        <?php
            $_explode = explode('x',$configWebsite['sizeMediumImage']);
            $widthMedium = $_explode[0];
            $heightMedium = $_explode[1];
        ?>
        <div class="row">
            <label>Size Medium Image</label>
            <input name="widthSizeMediumImage" type="text" value="{{ old('widthSizeMediumImage',$widthMedium) }}"/> x <input name="heightSizeMediumImage" type="text" value="{{ old('heightSizeMediumImage',$heightMedium) }}"/>
        </div>
        <?php
            $_explode = explode('x',$configWebsite['sizeLargerImage']);
            $widthLarger = $_explode[0];
            $heightLarger = $_explode[1];
        ?>
        <div class="row">
            <label>Size Larger Image</label>
            <input name="widthSizeLargerImage" type="text" value="{{ old('widthSizeLargerImage',$widthLarger) }}"/> x <input name="heightSizeLargerImage" type="text" value="{{ old('heightSizeLargerImage',$heightLarger) }}"/>
        </div>
        <div class="row">
            <input value="Submit" type="submit"/>
        </div>
    </form>
@stop