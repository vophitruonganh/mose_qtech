@extends('backend.layouts.default')
@section('titlePage','Show Option')
@section('content')
    {!!section_title('Cấu hình SEO')!!}
    @include('backend.includes.showErrorValidator')
    <div class="section-setting seo-setting">
        <form action="{{ url('admin/setting/seo') }}" method="post">
            <div class="section-tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home" role="tab">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile" role="tab">Bài đăng</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#messages" role="tab">Chuyên mục</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#messages" role="tab">Mạng xã hội</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#messages" role="tab">XML sitemap</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings" role="tab">Khác</a></li>
                </ul>
            </div>
            <div class="section-group">
                <div class="row">
                    <div class="col-lg-3">
                        <h4>Trang chủ</h4>
                        <p>Cấu trúc thẻ meta mặc định của bài viết. Việc điều chỉnh các thẻ meta mặc định sẽ áp dụng cho tất cả bài viết, riêng các tùy chình trong bài viết cụ thể sẽ bỏ qua các giá trị mặc định.</p>
                    </div>
                    <div class="col-lg-8">
                        <div class="box-typical b-t-p">
                            <div class="form-group">
                                <label for="seo-home-title" class="font-weight-normal">Tiêu đề</label>
                                <input id="seo-home-title" name="" class="form-control" value="" />
                            </div>
                            <div class="form-group">
                                <label for="seo-home-description">Mô tả</label>
                                <textarea id="seo-home-description" rows="3" name="" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="seo-home-keyword">Từ khóa</label>
                                <input id="seo-home-keyword" name="" class="form-control" value="" />
                                <small class="form-text text-muted">Phân cách nhau bởi dấu phẩy (Ví dụ: điện thoại, điện thoại giá rẻ, ...)</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-group">
                <div class="row">
                    <div class="col-lg-3">
                        <h4>Bài viết</h4>
                        <p>Cấu trúc thẻ meta mặc định của bài viết. Việc điều chỉnh các thẻ meta mặc định sẽ áp dụng cho tất cả bài viết, riêng các tùy chình trong bài viết cụ thể sẽ bỏ qua các giá trị mặc định.</p>
                    </div>
                    <div class="col-lg-8">
                        <div class="box-typical b-t-p">
                            <div class="form-group">
                                <label for="seo-home-title" class="font-weight-normal">Tiêu đề</label>
                                <input id="seo-home-title" name="" class="form-control" value="" />
                            </div>
                            <div class="form-group">
                                <label for="seo-home-description">Mô tả</label>
                                <textarea id="seo-home-description" rows="3" name="" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="seo-home-keyword">Từ khóa</label>
                                <input id="seo-home-keyword" name="" class="form-control" value="" />
                                <small class="form-text text-muted">Phân cách nhau bởi dấu phẩy (Ví dụ: điện thoại, điện thoại giá rẻ, ...)</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-group">
                <div class="row">
                    <div class="col-lg-3">
                        <h4>Trang</h4>
                        <p>Cấu trúc thẻ meta mặc định của bài viết. Việc điều chỉnh các thẻ meta mặc định sẽ áp dụng cho tất cả bài viết, riêng các tùy chình trong bài viết cụ thể sẽ bỏ qua các giá trị mặc định.</p>
                    </div>
                    <div class="col-lg-8">
                        <div class="box-typical b-t-p">
                            <div class="form-group">
                                <label for="seo-home-title" class="font-weight-normal">Tiêu đề</label>
                                <input id="seo-home-title" name="" class="form-control" value="" />
                            </div>
                            <div class="form-group">
                                <label for="seo-home-description">Mô tả</label>
                                <textarea id="seo-home-description" rows="3" name="" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="seo-home-keyword">Từ khóa</label>
                                <input id="seo-home-keyword" name="" class="form-control" value="" />
                                <small class="form-text text-muted">Phân cách nhau bởi dấu phẩy (Ví dụ: điện thoại, điện thoại giá rẻ, ...)</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-group">
                <div class="row">
                    <div class="col-lg-3">
                        <h4>Sản phẩm</h4>
                        <p>Cấu trúc thẻ meta mặc định của bài viết. Việc điều chỉnh các thẻ meta mặc định sẽ áp dụng cho tất cả bài viết, riêng các tùy chình trong bài viết cụ thể sẽ bỏ qua các giá trị mặc định.</p>
                    </div>
                    <div class="col-lg-8">
                        <div class="box-typical b-t-p">
                            <div class="form-group">
                                <label for="seo-home-title" class="font-weight-normal">Tiêu đề</label>
                                <input id="seo-home-title" name="" class="form-control" value="" />
                            </div>
                            <div class="form-group">
                                <label for="seo-home-description">Mô tả</label>
                                <textarea id="seo-home-description" rows="3" name="" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="seo-home-keyword">Từ khóa</label>
                                <input id="seo-home-keyword" name="" class="form-control" value="" />
                                <small class="form-text text-muted">Phân cách nhau bởi dấu phẩy (Ví dụ: điện thoại, điện thoại giá rẻ, ...)</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop