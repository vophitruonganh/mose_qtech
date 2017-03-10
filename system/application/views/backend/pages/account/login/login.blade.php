@extends('backend.layouts.login')
@section('titlePage','Đăng nhập')
@section('content')
<div class="section-login">
	<div class="login-wrap login-block">
		<div class="login-inner">
            <div class="logo"><a href="{{url('admin')}}"><img src="{{ $cdn_domain_image }}/logo.png" class="img-100" /></a></div>
			<div class="login-body">
                <h1 class="login-title">Đăng nhập</h1>
                <div class="form-alerts">@include('backend.includes.showErrorValidator')</div>
				<div class="login-form">
                    <form action="{{ url('admin/login?ref='.$ref) }}" method="post" data-parsley-validate>
                        @include('backend.includes.token')
    					<div class="form-group m-b-2">
                            <div class="fg-line">
    					    <label class="sr-only">Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required data-parsley-trigger="change focusout" data-parsley-type-message="Địa chỉ Email không không hợp lệ" data-parsley-required-message="Bạn không được để trống trường này" data-parsley-required="true" data-parsley-type="email" />
                            </div>
    					</div>
    					<div class="form-group m-b-2">
                            <div class="fg-line">
        					    <label class="sr-only">Mật khẩu</label>
                                <input type="password" class="form-control" placeholder="Mật khẩu" name="password" required data-parsley-trigger="change focusout" data-parsley-required-message="Bạn không được để trống trường này" data-parsley-required="true" />
                            </div>
    					</div>
                        <div class="clearfix">
                            <div class="remember pull-sm-left">
                                <div class="form-group m-b-2">
                                    <div class="checkbox m-y-0">                        
                                        <input id="remember" name="remember" type="checkbox"  checked="checked" /><label for="remember">Nhớ mật khẩu</label>
                                    </div>
                                </div>
                            </div>
                            <div class="forgot pull-sm-right text-sm-right">
                                <div class="form-group m-b-2">
                                    <a class="btn btn-link text-muted p-a-0" href="{{ url('admin/forgot-password') }}"><u>Quên mật khẩu?</u></a>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix">
                            <button type="submit" class="btn btn-primary btn-lg btn-block waves-effect">Đăng nhập</button>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop



<?php
    
    // GiaoDien13
    $array = [
        'viTri' => [
            'title' => 'Vị Trí',
            'image' => 'http://store.moseplus.com/template/giaodien13/asset/images/location_img.jpg',
            'text' => '<p>Sở hữu vị trí tiếp giáp và được bao bọc bởi 150,25ha Lâm viên sinh thái tự nhiên (cũng được đầu tư bởi Haravan), Lux Residence là nơi yên tĩnh nhất để tận hưởng trọn vẹn không gian xanh rộng lớn, trong lành giữa trung tâm thành phố Hồ Chí Minh sôi động. Phong cách kiến trúc Tân cổ điển mang đến cho Lux Residence vẻ sang trọng, tinh tế và sắc sảo đến từng đường nét. Kết hợp cùng cảnh quan sinh thái độc đáo, quy hoạch đô thị đồng bộ, kiến trúc toàn khu Lux Residence như một bức tranh hoàn hảo về sự yên bình, gần gũi, phồn vinh và hài hòa cùng thiên nhiên. Không chỉ có giá trị thẩm mỹ bền vững với thời gian, Lux Residence còn được thiết kế công năng ưu việt, mang đến chất lượng sống vượt trội xứng tầm phong cách sống đẳng cấp của chủ nhân.</p>',
        ],
        'duAn' => [
            'title' => 'Tinh hoa kiến trúc trong từng đường nét',
            [
                'image' => 'http://store.moseplus.com/template/giaodien13/asset/images/project_img_1.png',
                'text-1' => 'Thiết kế cảnh quan khu đô thị tốt nhất thế giới 2015',
                'text-2' => 'Tổ chức Giải thưởng Bất Động Sản Quốc tế',
                'active' => true,
            ],
            [
                'image' => 'http://store.moseplus.com/template/giaodien13/asset/images/project_img_2.png',
                'text-1' => 'Dự án xanh hàng đầu Đông Nam Á 2016',
                'text-2' => 'Giải thưởng Bất động sản Đông Nam Á',
                'active' => false,
            ],
            [
                'image' => 'http://store.moseplus.com/template/giaodien13/asset/images/project_img_3.png',
                'text-1' => 'Dự án phát triển phức hợp tốt nhất Việt Nam 2016',
                'text-2' => 'Giải thưởng Bất Động Sản Châu Á Thái Bình Dương',
                'active' => false,
            ],
            [
                'image' => 'http://store.moseplus.com/template/giaodien13/asset/images/project_img_4.png',
                'text-1' => 'Công trình kiến trúc xanh Việt Nam 2012',
                'text-2' => 'Hội kiến trúc sư Việt Nam',
                'active' => false,
            ],
            [
                'image' => 'http://store.moseplus.com/template/giaodien13/asset/images/project_img_5.png',
                'text-1' => 'Dự án phát triển phức hợp tốt nhất Việt Nam 2016',
                'text-2' => 'Hội kiến trúc sư Việt Nam',
                'active' => false,
            ],
        ],
        'comments' => [
            [
                'name' => 'Anh Trần Văn Tuấn',
                'description' => '30 tuổi, Doanh nghiệp xuất nhập khẩu tại Tây Ninh',
                'content' => 'Mình mới chuyển về làm cho một hãng phân phối ô tô mới ở khu vực Quận 1. Khi qua Lux Residence tham gia sự kiện bán hàng thấy môi trường sống bên này rất tốt. Vợ chồng mình quyết định mua một căn hộ tại khu Lux Residence để về sinh sống vì hai vợ chồng cũng đang muốn có em bé trong 2 năm tới.',
            ],
            [
                'name' => 'Bác Hải Đăng',
                'description' => 'Về Hưu',
                'content' => 'Hai bác năm nay đều ngoài 60 rồi. Có mấy người bạn rủ sang chơi Lux Residence chơi và thấy bên này thích quá. Hai bác quyết định sẽ bán căn nhà trong phố để mua ở đây vì các con cũng ra ở riêng hết, hai ông bà ở căn hộ 45m2 là vừa đủ. Số tiền bán nhà còn lại các bác sẽ lập một quỹ học bổng gia đình để hỗ trợ các cháu đi học đại học sau này.',
            ],
            [
                'name' => 'Anh Nguyễn Văn Bình',
                'description' => '40 Tuổi, Nhân viên kinh doanh vàng bạc tại TP. Hồ Chí Minh',
                'content' => 'Các khoản đầu tư của tôi tập trung nhiều trong lĩnh vực bất động sản, đặc biệt là các căn hộ cho thuê. Bay có nhiều diện tích nhỏ 45m2 – 50m2, với thiết kế hiện đại, tiện ích đầy đủ và không gian tốt rất dễ để cho người nước ngoài thuê. Đó là lý do tôi đã mua 4 căn hộ tại Lux Residence với số vốn đầu tư chỉ tương đương một căn hộ trong trung tâm thành phố.',
            ],
            [
                'name' => 'Chị Phạm Ngọc Thảo Nguyên',
                'description' => '35 Tuổi, Nhân viên văn phòng tại TP. Hồ Chí Minh',
                'content' => 'Với mức thu nhập hơn 10 triệu/ tháng, mình đã nghĩ sẽ không bao giờ mua được nhà nếu không có sự trợ của người thân. Sau khi tham quan dự án căn hộ Lux Residence, mình đã rất ngạc nhiên vì giờ đây không những có thể mua được căn hộ hiện đại, sang trọng mà lại được tận hưởng đầy đủ các tiện ích rất đẳng cấp và khác biệt của khu đô thị.',
            ],
            [
                'name' => 'Chị Trần Hoàng Lan',
                'description' => '35 Tuổi',
                'content' => 'Tôi làm việc tại Quận 1, chồng tôi làm việc tại Quận 3, khi chúng tôi chuyển về Lux Residence sống, mỗi tôi chỉ cần chạy xe 30’ mà không bị tắc đường. Căn hộ Lux Residence 55m2 chúng tôi mua không thể vừa lòng hơn vì giá tiền rất vừa phải, phương thức trả theo tiến độ hợp lý, lại có phòng ngủ phụ dành cho bé sau này. Tôi rất mong sớm được nhận nhà.',
            ],
            [
                'name' => 'Chị Phan Thị Hồng',
                'description' => '42 Tuổi, Kinh doanh tại Quận 3',
                'content' => 'Vợ chồng mình có một cháu và đang ở cùng bố mẹ chồng. Cũng định chuyển ra ở riêng nhưng nói thật là ở ông bà có con nhỏ rất tiện vì hai vợ chồng cũng bận. Khi cả nhà cùng ông bà sang thăm Lux Residence, cả nhà đã đồng ý mua 2 căn hộ cạnh nhau ở Lux Residence để dọn về sinh sống.',
            ],
        ],
        'tienIch' => [
            'title' => 'Tiện ích',
            'mainImageLarger' => 'http://store.moseplus.com/template/giaodien13/asset/images/utilities_img_text.jpg',
            'mainImageThumb' => 'http://store.moseplus.com/template/giaodien13/asset/images/utilities_img_text.jpg',
            'description' => [
                [
                    'image' => 'http://store.moseplus.com/template/giaodien13/asset/css/images/utilities_img_1.jpg',
                    'text' => 'Bãi để xe 7 tầng',
                ],
                [
                    'image' => 'http://store.moseplus.com/template/giaodien13/asset/css/images/utilities_img_2.jpg',
                    'text' => 'Nhà câu lạc bộ',
                ],
                [
                    'image' => 'http://store.moseplus.com/template/giaodien13/asset/css/images/utilities_img_3.jpg',
                    'text' => 'Phòng GYM',
                ],
                [
                    'image' => 'http://store.moseplus.com/template/giaodien13/asset/css/images/utilities_img_4.jpg',
                    'text' => 'Bể bơi',
                ],
                [
                    'image' => 'http://store.moseplus.com/template/giaodien13/asset/css/images/utilities_img_5.jpg',
                    'text' => 'Vườn cảnh quan',
                ],
                [
                    'image' => 'http://store.moseplus.com/template/giaodien13/asset/css/images/utilities_img_6.jpg',
                    'text' => 'Bến xe bus',
                ],
                [
                    'image' => 'http://store.moseplus.com/template/giaodien13/asset/css/images/utilities_img_7.jpg',
                    'text' => 'Nhà trẻ',
                ],
                [
                    'image' => 'http://store.moseplus.com/template/giaodien13/asset/css/images/utilities_img_8.jpg',
                    'text' => 'Siêu thị',
                ],
                [
                    'image' => 'http://store.moseplus.com/template/giaodien13/asset/css/images/utilities_img_9.jpg',
                    'text' => 'Cổng ra vào',
                ],
            ],
            'listImage' => [
                [
                    'thumb' => 'http://store.moseplus.com/template/giaodien13/asset/images/6_large.jpg',
                    'larger' => 'http://store.moseplus.com/template/giaodien13/asset/images/6.jpg',
                    'text' => 'An ninh 24/24',
                ],
                [
                    'thumb' => 'http://store.moseplus.com/template/giaodien13/asset/images/2_large.jpg',
                    'larger' => 'http://store.moseplus.com/template/giaodien13/asset/images/2.jpg',
                    'text' => 'Công viên mặt nước',
                ],
                [
                    'thumb' => 'http://store.moseplus.com/template/giaodien13/asset/images/5_large.jpg',
                    'larger' => 'http://store.moseplus.com/template/giaodien13/asset/images/5.jpg',
                    'text' => 'Dịch vụ',
                ],
                [
                    'thumb' => 'http://store.moseplus.com/template/giaodien13/asset/images/1_large.jpg',
                    'larger' => 'http://store.moseplus.com/template/giaodien13/asset/images/1.jpg',
                    'text' => 'Gần các khu đô thị',
                ],
                [
                    'thumb' => 'http://store.moseplus.com/template/giaodien13/asset/images/3_large.jpg',
                    'larger' => 'http://store.moseplus.com/template/giaodien13/asset/images/3.jpg',
                    'text' => 'Nhà câu lạc bộ',
                ],
                [
                    'thumb' => 'http://store.moseplus.com/template/giaodien13/asset/images/7_large.jpg',
                    'larger' => 'http://store.moseplus.com/template/giaodien13/asset/images/7.jpg',
                    'text' => 'Phố thương mại',
                ],
                [
                    'thumb' => 'http://store.moseplus.com/template/giaodien13/asset/images/8_large.jpg',
                    'larger' => 'http://store.moseplus.com/template/giaodien13/asset/images/8.jpg',
                    'text' => 'Siêu thị',
                ],
                [
                    'thumb' => 'http://store.moseplus.com/template/giaodien13/asset/images/4_large.jpg',
                    'larger' => 'http://store.moseplus.com/template/giaodien13/asset/images/4.jpg',
                    'text' => 'Trung tâm thể thao',
                ],
                [
                    'thumb' => 'http://store.moseplus.com/template/giaodien13/asset/images/9_large.jpg',
                    'larger' => 'http://store.moseplus.com/template/giaodien13/asset/images/9.jpg',
                    'text' => 'Trường học',
                ],
            ],
        ],
        'tuyChonCanHo' => [
            'title' => 'Tùy chọn căn hộ của bạn',
            'titleUrl' => 'Xem chi tiết',
            'url' => 'http://localhost/giaodien13/sanphamchitiet.php',
        ],
    ];
    unset($array);

    // GiaoDien1
    $array = [
        'feature' => [
            [
                'image' => 'http://store.moseplus.com/template/giaodien1/images/feature1.png',
                'title' => 'Thủ tục nhanh chóng',
                'description' => 'Chúng tôi có đội ngũ nhân viên chuyên nghiệp, thân thiện, được đào tạo bài bản với hơn 20 năm kinh nghiệm trong việc hỗ trợ làm hồ sơ',
            ],
            [
                'image' => 'http://store.moseplus.com/template/giaodien1/images/feature2.png',
                'title' => 'Liên kết trường danh tiếng',
                'description' => 'Bạn hoàn toàn có cơ hội được trải nghiệm học tập ở nước ngoài tại “campus” của các đối tác có danh tiếng của ĐHHS ở Pháp, Mỹ, Bỉ....',
            ],
            [
                'image' => 'http://store.moseplus.com/template/giaodien1/images/feature3.png',
                'title' => 'Miễn phí kiểm tra ngôn ngữ',
                'description' => 'Kết quả nhanh chóng của bài kiểm tra tiếng Anh EF tương ứng với những mức trình độ được Hội Đồng Châu Âu chấp nhận.',
            ],
        ],
        'testimonial' => [
            'heading' => 'HỌC VIÊN NÓI GÌ VỀ CHÚNG TÔI',
            [
                'content' => 'Là khách hàng của Đông Á, tôi thực sự hài lòng về các bạn. Cảm ơn trung tâm đã có những dịch vụ rất tốt để tôi trải nghiệm.',
                'image' => 'http://store.moseplus.com/template/giaodien1/images/user1.png',
                'name' => 'Hoàng Quốc Thiên',
                'description' => 'Cựu sinh viên Hàn Quôc',
            ],
            [
                'content' => 'Qua trung tâm tôi mới có thể tới được Oxford. Cảm ơn các bạn rất nhiều và chúc Trung tâm ngày càng phát triển hơn nữa!',
                'image' => 'http://store.moseplus.com/template/giaodien1/images/user2.png',
                'name' => 'Vũ Minh Dũng',
                'description' => 'Sinh viên Oxford',
            ],
            [
                'content' => 'Là khách hàng của Đông Á, tôi thực sự hài lòng về các bạn. Cảm ơn trung tâm đã có những dịch vụ rất tốt để tôi trải nghiệm.',
                'image' => 'http://store.moseplus.com/template/giaodien1/images/user3.png',
                'name' => 'Vũ Thu Huyền',
                'description' => 'Sinh viên Nhật Bản',
            ],
            [
                'content' => 'Là khách hàng của Đông Á, tôi thực sự hài lòng về các bạn. Cảm ơn trung tâm đã có những dịch vụ rất tốt để tôi trải nghiệm.',
                'image' => 'http://store.moseplus.com/template/giaodien1/images/user4.png',
                'name' => 'Hoàng Quỳnh Anh',
                'description' => 'Sinh viên Anh',
            ],
            [
                'content' => 'Là khách hàng của Đông Á, tôi thực sự hài lòng về các bạn. Cảm ơn trung tâm đã có những dịch vụ rất tốt để tôi trải nghiệm.',
                'image' => 'http://store.moseplus.com/template/giaodien1/images/user5.png',
                'name' => 'Vũ Thảo Linh',
                'description' => 'Sinh viên Úc',
            ],
            [
                'content' => 'Là khách hàng của Đông Á, tôi thực sự hài lòng về các bạn. Cảm ơn trung tâm đã có những dịch vụ rất tốt để tôi trải nghiệm.',
                'image' => 'http://store.moseplus.com/template/giaodien1/images/user6.png',
                'name' => 'Trần Minh Khang',
                'description' => 'Sinh viên Canada',
            ],
        ],
        'photo' => [
            'heading' => 'Hình ảnh - video',
            'url' => '#',
            'image' => 'http://store.moseplus.com/template/giaodien1/images/10r5192.jpg',
        ],
        'about' => [
            'heading' => 'Về chúng tôi',
            'url' => '#',
            'image' => 'http://store.moseplus.com/template/giaodien1/images/logo.png',
            'content' => 'Công ty cổ phần đầu tư Đông Á thành lập vào tháng 1 năm 2007. là cái tên đã từng bước khẳng định trong lĩnh vực hoạt động chủ yếu về tư vấn du học. Sau gần 10 năm hoạt động, mặc dù còn gặp nhiều khó khăn, trở ngại nhưng bằng sự nỗ lực không ngừng của Ban lãnh đạo và toàn thể cán bộ nhân viên, Tân Đại Dương....',
        ],
    ];
    unset($array);

    // GiaoDien
    $array = [
        'service' => [
            [
                'class' => 'fa-truck',
                'title' => 'Miễn Phí Giao Hàng',
                'description' => 'đơn hàng trên 500.000đ',
            ],
            [
                'class' => 'fa-repeat',
                'title' => 'Miễn Phí Đổi Trả',
                'description' => 'miễn phí 90 ngày đổi trả',
            ],
            [
                'class' => 'fa-money',
                'title' => 'Thành Viên Ưu Đãi',
                'description' => 'đang ký miễn phí',
            ],
        ],
        'firstBanner' => [
            'url' => '#',
            'image' => 'http://store.moseplus.com/template/giaodien/images/home_bannercenter.png',
        ],
        'policy' => [
            [
                'title' => 'Chính sách bảo mật',
                'url' => '#',
            ],
            [
                'title' => 'Chính sách vận chuyển',
                'url' => '#',
            ],
            [
                'title' => 'Chính sách đổi trả',
                'url' => '#',
            ],
            [
                'title' => 'Điều khoản dịch vụ',
                'url' => '#',
            ],
        ],
        'facebook' => [
            'url' => 'https://www.facebook.com/MOSEVN/?fref=ts',
        ],
    ];
    unset($array);

    // GiaoDien3
    $array = [
        'firstBanner' => [
            'url' => '#',
            'image' => 'http://store.moseplus.com/template/giaodien3/images/layer-18.jpg',
        ],
        'secondBanner' => [
            'url' => '#',
            'image' => 'http://store.moseplus.com/template/giaodien3/images/layer-21.jpg',
        ],
        'thirdBanner' => [
            'url' => '#',
            'image' => 'http://store.moseplus.com/template/giaodien3/images/banner_collection.jpg',
        ],
        'about' => [
            'image' => 'http://store.moseplus.com/template/giaodien3/images/customer_bn.jpg',
            'heading' => 'GỬI MAIL NHẬN TIN',
            'content' => 'Đầu năm học 2015 - 2016, Công ty CP Văn phòng phẩm OFFICE 365 đã cho ra mắt bộ sản phẩm vở kẻ ngang mới với sự đột phá về ý tưởng thiết kế trên bìa dành cho học sinh, sinh viên',
        ],
        'social' => [
            'heading' => 'Kênh thông tin liên hệ',
            [
                'class1' => 'facebook',
                'class2' => 'fa-facebook',
                'title' => 'Facebook',
                'url' => '#',
            ],
            [
                'class1' => 'twitter',
                'class2' => 'fa-twitter',
                'title' => 'Twitter',
                'url' => '#',
            ],
            [
                'class1' => 'tumblr',
                'class2' => 'fa-tumblr',
                'title' => 'Tumblr',
                'url' => '#',
            ],
            [
                'class1' => 'google-plus',
                'class2' => 'fa-google-plus',
                'title' => 'Google-plus',
                'url' => '#',
            ],
            [
                'class1' => 'dribbble',
                'class2' => 'fa-dribbble',
                'title' => 'Dribbble',
                'url' => '#',
            ],
        ],
        'support' => [
            'heading' => 'Hỗ trợ dịch vụ',
            [
                'title' => 'Điều khoản sử dụng',
                'url' => '#',
            ],
            [
                'title' => 'Điều khoản giao dịch',
                'url' => '#',
            ],
            [
                'title' => 'Dịch vụ tiện ích',
                'url' => '#',
            ],
            [
                'title' => 'Quyền sở hữu trí tuệ',
                'url' => '#',
            ],
            [
                'title' => 'Sản phẩm yêu thích',
                'url' => '#',
            ],
        ],
        'policy' => [
            'heading' => 'Chính sách ưu đãi',
            [
                'title' => 'Chính sách thanh toán',
                'url' => '#',
            ],
            [
                'title' => 'Chính sách vận chuyển',
                'url' => '#',
            ],
            [
                'title' => 'Chính sách đổi trả',
                'url' => '#',
            ],
            [
                'title' => 'Chính sách bảo hành',
                'url' => '#',
            ],
            [
                'title' => 'Chính sách trả góp',
                'url' => '#',
            ],
        ],
        'guide' => [
            'heading' => 'Hướng dẫn dịch vụ',
            [
                'title' => 'Hướng dẫn mua hàng',
                'url' => '#',
            ],
            [
                'title' => 'Giao nhận và thanh toán',
                'url' => '#',
            ],
            [
                'title' => 'Đổi trả và bảo hành',
                'url' => '#',
            ],
            [
                'title' => 'Tích điểm đổi quà',
                'url' => '#',
            ],
            [
                'title' => 'Đăng kí thành viên',
                'url' => '#',
            ],
        ],
    ];
    unset($array);

    // GiaoDien4
    $array = [
        'welcome' => 'Chào mừng bạn đến với Website QmTech',
        'channel' => [
            [
                'title' => 'Tai phone',
                'url' => '#',
                'image' => 'http://store.moseplus.com/template/giaodien4/images/icon-1.png',
            ],
            [
                'title' => 'Máy ảnh',
                'url' => '#',
                'image' => 'http://store.moseplus.com/template/giaodien4/images/icon-2.png',
            ],
            [
                'title' => 'Tivi',
                'url' => '#',
                'image' => 'http://store.moseplus.com/template/giaodien4/images/icon-3.png',
            ],
            [
                'title' => 'Laptop',
                'url' => '#',
                'image' => 'http://store.moseplus.com/template/giaodien4/images/icon-4.png',
            ],
            [
                'title' => 'Điện thoại',
                'url' => '#',
                'image' => 'http://store.moseplus.com/template/giaodien4/images/icon-5.png',
            ],
            [
                'title' => 'Quà tặng',
                'url' => '#',
                'image' => 'http://store.moseplus.com/template/giaodien4/images/icon-6.png',
            ],
        ],
        'firstBanner' => [
            'url' => '#',
            'image' => 'http://hstatic.net/796/1000055796/1000090795/img_banner_1.jpg',
        ],
        'secondBanner' => [
            'url' => '#',
            'image' => 'http://hstatic.net/796/1000055796/1000090795/img_banner_2.jpg',
        ],
        'thirdBanner' => [
            'url' => '#',
            'image' => 'http://hstatic.net/796/1000055796/1000090795/img_banner_3.jpg',
        ],
        'fourthBanner' => [
            'url' => '#',
            'image' => 'http://store.moseplus.com/template/giaodien4/images/banner-left-1.jpg',
        ],
        'fifthBanner' => [
            'url' => '#',
            'image' => 'http://store.moseplus.com/template/giaodien4/images/tab-banner-1.jpg',
        ],
        'sixthBanner' => [
            'url' => '#',
            'image' => 'http://store.moseplus.com/template/giaodien4/images/tab-banner-2.jpg',
        ],
        'service' => [
            [
                'class' => 'fa-truck',
                'heading' => 'Giao hàng miễn phí',
                'content' => 'Cho đơn hàng trên 500k',
            ],
            [
                'class' => 'fa-cog',
                'heading' => 'Miễn phí đổi trả hàng',
                'content' => 'Trong vòng 7 ngày',
            ],
            [
                'class' => 'fa-phone',
                'heading' => 'Đặt hàng trực tuyến',
                'content' => 'SĐT : 1900.0124',
            ],
            [
                'class' => 'fa-clock-o',
                'heading' => 'Làm việc các ngày trong tuần',
                'content' => 'Thứ 2- CN',
            ],
        ],
        'facebook' => [
            'url' => 'https://www.facebook.com/MOSEVN/?fref=ts',
        ],
        'seventhBanner' => [
            'url' => '#',
            'image' => 'http://store.moseplus.com/template/giaodien4/images/wendy_collection.jpg',
        ],
        'policy' => [
            'heading' => 'Chính sách giao hàng',
            [
                'class' => 'truck',
                'text' => 'Giao hàng bởi Giaohangnhanh',
            ],
            [
                'class' => 'location2',
                'text' => 'Giao hàng miễn phí nội thành Tp HCM',
            ],
            [
                'class' => 'box',
                'text' => 'Đôi trả trong 3 ngày, thủ tục đơn giản',
            ],
        ],
        'social' => [
            [
                'url' => '#',
                'class' => 'fa-facebook',
            ],
            [
                'url' => '#',
                'class' => 'fa-twitter',
            ],
            [
                'url' => '#',
                'class' => 'fa-rss',
            ],
            [
                'url' => '#',
                'class' => 'fa-youtube',
            ],
            [
                'url' => '#',
                'class' => 'fa-google-plus',
            ],
        ],
        'eighthBanner' => [
            'url' => '#',
            'image' => 'http://store.moseplus.com/template/giaodien4/images/left_image_ad.jpg',
        ],
        'ninthBanner' => [
            'url' => '#',
            'image' => 'http://store.moseplus.com/template/giaodien4/images/left_image_ad_2.jpg',
        ],
    ];
    unset($array);

    // GiaoDien5
    $array = [
        'service' => [
            'heading' => 'Dịch vụ',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            [
                'image' => 'http://store.moseplus.com/template/giaodien5/asset/images/dichvu-1.png',
                'text' => 'DEVELOPMENT',
                'content' => 'One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin.',
            ],
            [
                'image' => 'http://store.moseplus.com/template/giaodien5/asset/images/dichvu-2.png',
                'text' => 'FRIENDLY SUPPORT',
                'content' => 'It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls.',
            ],
            [
                'image' => 'http://store.moseplus.com/template/giaodien5/asset/images/dichvu-3.png',
                'text' => 'DEVELOPMENT',
                'content' => 'It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls.',
            ],
        ],
        'personnel' => [
            'heading' => 'Nhân sự',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed elementum gravida pharetra. Morbi interdum dapibus dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            [
                'image' => 'http://store.moseplus.com/template/giaodien5/asset/images/gioithieu-1.png',
                'name' => 'Tom L. Gunderson',
                'job' => 'Founder',
                'facebook' => '#',
                'twitter' => '#',
            ],
            [
                'image' => 'http://store.moseplus.com/template/giaodien5/asset/images/gioithieu-2.png',
                'name' => 'Mikel Jack',
                'job' => 'CEO',
                'facebook' => '#',
                'twitter' => '#',
            ],
            [
                'image' => 'http://store.moseplus.com/template/giaodien5/asset/images/gioithieu-3.png',
                'name' => 'Jenifer Lee',
                'job' => 'Manager',
                'facebook' => '#',
                'twitter' => '#',
            ],
            [
                'image' => 'http://store.moseplus.com/template/giaodien5/asset/images/gioithieu-4.png',
                'name' => 'Dany Bake',
                'job' => 'Founder',
                'facebook' => '#',
                'twitter' => '#',
            ],
        ],
        'about' => [
            'heading' => 'Về chúng tôi',
            'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ],
        'testimonial' => [
            'heading' => 'Ý kiến khách hàng',
            [
                'content' => 'Gorgeous Coming Soon page! Was easy to work with and the support was superb.',
                'image' => 'http://store.moseplus.com/template/giaodien5/asset/images/nhanxet-1.jpg',
                'name' => 'Tom Smith',
            ],
            [
                'content' => 'Gorgeous Coming Soon page! Was easy to work with and the support was superb.',
                'image' => 'http://store.moseplus.com/template/giaodien5/asset/images/nhanxet-2.jpg',
                'name' => 'Dertiny',
            ],
            [
                'content' => 'Gorgeous Coming Soon page! Was easy to work with and the support was superb.',
                'image' => 'http://store.moseplus.com/template/giaodien5/asset/images/nhanxet-3.jpg',
                'name' => 'Druid Ares',
            ],
        ],
        'doitac' => [
            'heading' => 'Đối tác',
            [
                'image' => 'http://store.moseplus.com/template/giaodien5/asset/images/doitac-1.png',
                'url' => '#',
            ],
            [
                'image' => 'http://store.moseplus.com/template/giaodien5/asset/images/doitac-2.png',
                'url' => '#',
            ],
            [
                'image' => 'http://store.moseplus.com/template/giaodien5/asset/images/doitac-3.png',
                'url' => '#',
            ],
            [
                'image' => 'http://store.moseplus.com/template/giaodien5/asset/images/doitac-4.png',
                'url' => '#',
            ],
            [
                'image' => 'http://store.moseplus.com/template/giaodien5/asset/images/doitac-5.png',
                'url' => '#',
            ],
            [
                'image' => 'http://store.moseplus.com/template/giaodien5/asset/images/doitac-6.png',
                'url' => '#',
            ],
        ],
        'policy' => [
            'heading' => 'Chính sách',
            [
                'title' => 'Chăm sóc khách hàng',
                'url' => '#',
            ],
            [
                'title' => 'Hướng dẫn thanh toán',
                'url' => '#',
            ],
            [
                'title' => 'Chính sach ưu đãi',
                'url' => '#',
            ],
            [
                'title' => 'Tuyển dụng',
                'url' => '#',
            ],
            [
                'title' => 'Câu hỏi thường gặp',
                'url' => '#',
            ],
        ],
        'facebook' => [
            'url' => 'https://www.facebook.com/MOSEVN/?fref=ts',
        ],
    ];
    unset($array);

    // GiaoDien6
    $array = [
        'facebook' => [
            'url' => 'https://www.facebook.com/MOSEVN/?fref=ts',
        ],
        'firstBanner' => [
            'url' => '#',
            'image' => 'http://store.moseplus.com/template/giaodien6/asset/images/banner-index-1.jpg',
        ],
        'secondBanner' => [
            'url' => '#',
            'image' => 'http://store.moseplus.com/template/giaodien6/asset/images/banner-index-2.jpg',
        ],
        'thirdBanner' => [
            'url' => '#',
            'image' => 'http://store.moseplus.com/template/giaodien6/asset/images/banner-group-1.jpg',
        ],
        'fourthBanner' => [
            'url' => '#',
            'image' => 'http://store.moseplus.com/template/giaodien6/asset/images/banner-group-3.jpg',
        ],
        'service' => [
            [
                'class' => 'fa-truck',
                'heading' => 'Miễn phí vận chuyển',
                'content' => 'Cho Đơn Đặt Hàng Trên 2 Triệu VNĐ',
            ],
            [
                'class' => 'fa-cog',
                'heading' => 'Hoàn 100% tiền mua hàng',
                'content' => 'Trong vòng 7 ngày',
            ],
            [
                'class' => 'fa-phone',
                'heading' => 'Đặt hàng trực tuyến',
                'content' => 'SĐT: (08) 0903 090 045',
            ],
        ],
        'hotline' => [
            'text1' => 'Hotline',
            'text2' => 'Hỗ trợ trực tuyến:',
            'text3' => '1900.0124',
        ],
        'information' => [
            'heading' => 'Thông tin hỗ trợ',
            [
                'text' => 'Tìm hiểu về mua trả góp',
                'url' => '#',
            ],
            [
                'text' => 'Tìm trung tâm bào hành hãn',
                'url' => '#',
            ],
            [
                'text' => 'Hướng dẫn mua hàng online',
                'url' => '#',
            ],
            [
                'text' => 'Giao hàng & thanh toán',
                'url' => '#',
            ],
            [
                'text' => 'Hướng dẫn thanh toán',
                'url' => '#',
            ],
        ],
        'customer' => [
            'heading' => 'Dịch vụ khách hàng',
            [
                'text' => 'Giới thiệu về công ty',
                'url' => '#',
            ],
            [
                'text' => 'Tuyển dụng',
                'url' => '#',
            ],
            [
                'text' => 'Gửi góp ý & khiếu nại',
                'url' => '#',
            ],
            [
                'text' => 'Tìm siêu thị',
                'url' => '#',
            ],
            [
                'text' => 'Liên hệ',
                'url' => '#',
            ],
        ],
        'support' => [
            'heading' => 'Dịch vụ & hỗ trợ',
            [
                'text' => 'Chính sách giao hàng',
                'url' => '#',
            ],
            [
                'text' => 'Chính sách đổi trả sản phẩm',
                'url' => '#',
            ],
            [
                'text' => 'Chính sách bảo hành',
                'url' => '#',
            ],
            [
                'text' => 'Chính sách trả góp',
                'url' => '#',
            ],
            [
                'text' => 'Giới thiệu máy đổi trả',
                'url' => '#',
            ],
        ],
        'social' => [
            [
                'class' => 'fa-facebook',
                'url' => '#',
            ],
            [
                'class' => 'fa-twitter',
                'url' => '#',
            ],
            [
                'class' => 'fa-google-plus',
                'url' => '#',
            ],
            [
                'class' => 'fa-rss',
                'url' => '#',
            ],
            [
                'class' => 'fa-youtube',
                'url' => '#',
            ],
        ],
        'fifthBanner' => [
            'url' => '#',
            'image' => 'http://store.moseplus.com/template/giaodien6/asset/images/blog-banner-1.jpg',
        ],
        'sixthBanner' => [
            'url' => '#',
            'image' => 'http://store.moseplus.com/template/giaodien6/asset/images/blog-banner-2.jpg',
        ],
    ];
    unset($array);

    // GiaoDien7
    $array = [
        'openDoor' => 'Giờ mở cửa : 8:00 - 20:00',
        'service' => [
            [
                'heading' => 'Miễn phí vận chuyển',
                'text' => 'Trong bán kính 50km',
            ],
            [
                'heading' => 'Đổi trả miễn phí',
                'text' => 'Đổi trả sản phẩm trong 24h',
            ],
            [
                'heading' => 'Thanh toán đa dạng',
                'text' => 'Tiền mặt, thẻ tín dụng...',
            ],
            [
                'heading' => 'Tư vấn 24/7',
                'text' => 'Hotline : 1900 6750',
            ],
        ],
        'facebook' => [
            'url' => 'https://www.facebook.com/MOSEVN/?fref=ts',
        ],
        'firstBanner' => [
            'url' => '#',
            'image' => 'http://store.moseplus.com/template/giaodien7/img/quangcao_nho_1.jpg',
        ],
        'secondBanner' => [
            'url' => '#',
            'image' => 'http://store.moseplus.com/template/giaodien7/img/quangcao_nho_2.jpg',
        ],
        'thirdBanner' => [
            'url' => '#',
            'image' => 'http://store.moseplus.com/template/giaodien7/img/quangcao_to.jpg',
        ],
        'information' => [
            'heading' => 'Thông tin công ty',
            [
                'text' => 'Thông tin về công ty',
                'url' => '#',
            ],
            [
                'text' => 'Giới thiệu công ty',
                'url' => '#',
            ],
            [
                'text' => 'Hệ thống các siêu thị',
                'url' => '#',
            ],
            [
                'text' => 'Tuyển dụng',
                'url' => '#',
            ],
        ],
        'support' => [
            'heading' => 'Hỗ trợ khách hàng',
            [
                'text' => 'Liên hệ và góp ý',
                'url' => '#',
            ],
            [
                'text' => 'Hướng dẫn mua hàng online',
                'url' => '#',
            ],
            [
                'text' => 'Hướng dẫn mua trả góp',
                'url' => '#',
            ],
            [
                'text' => 'Quy chế quản lý hoạt động',
                'url' => '#',
            ],
        ],
        'policy' => [
            'heading' => 'Chính sách mua hàng',
            [
                'text' => 'Quy định, chính sách',
                'url' => '#',
            ],
            [
                'text' => 'Chính sách bảo hành - đổi trả',
                'url' => '#',
            ],
            [
                'text' => 'Chính sách hội viên',
                'url' => '#',
            ],
            [
                'text' => 'Điều khoản sử dụng',
                'url' => '#',
            ],
        ],
        'social' => [
            [
                'image' => 'http://store.moseplus.com/template/giaodien7/img/facebook.png',
                'url' => '#',
                'title' => 'Facebook',
            ],
            [
                'image' => 'http://store.moseplus.com/template/giaodien7/img/pinterest.png',
                'url' => '#',
                'title' => 'Pinterest',
            ],
            [
                'image' => 'http://store.moseplus.com/template/giaodien7/img/google-plus.png',
                'url' => '#',
                'title' => 'Google Plus',
            ],
            [
                'image' => 'http://store.moseplus.com/template/giaodien7/img/youtube.png',
                'url' => '#',
                'title' => 'Youtube',
            ],
        ],
        'serviceInfo' => [
            [
                'image' => 'http://store.moseplus.com/template/giaodien7/img/free_deliverd.jpg',
                'heading' => 'Miễn phí vận chuyển',
                'content' => 'Miễn phí vận chuyển với đơn hàng lớn hơn 1.000.000 đ',
            ],
            [
                'image' => 'http://store.moseplus.com/template/giaodien7/img/giaohangngaysaukhidat.jpg',
                'heading' => 'Giao hàng ngay',
                'content' => 'Giao hàng ngay sau khi đặt hàng (áp dụng với Hà Nội & HCM)',
            ],
            [
                'image' => 'http://store.moseplus.com/template/giaodien7/img/doitra.jpg',
                'heading' => 'Đổi trả trong 3 ngày',
                'content' => 'Đổi trả trong 3 ngày, thủ tục đơn giản',
            ],
            [
                'image' => 'http://store.moseplus.com/template/giaodien7/img/hoadon.jpg',
                'heading' => 'Cung cấp hóa đơn',
                'content' => 'Nhà cung cấp xuất hóa đơn cho sản phẩm này',
            ],
        ],
    ];
    unset($array);

    // GiaoDien8
    $array = [
        'descriptionWeb' => [
            'text' => '<strong>Team Liên Kết Trẻ</strong> tập hợp những lập trình viên trẻ tuổi, nhiệt huyết và có tinh thần trách nhiệm cao trong công việc, có trình độ cao trong lĩnh vực thiết kế website và internet marketting, được hỗ trợ bởi những thành viên có kinh nghiệm lâu năm, chúng tôi tự tin mang đến cho khách hàng những sản phẩm và dịch vụ tốt nhất.',
            [
                'title' => 'Về chúng tôi',
                'url' => '#',
            ],
            [
                'title' => 'Các Dự Án',
                'url' => '#',
            ],
        ],
        'social' => [
            [
                'class' => 'fa-facebook',
                'url' => '#',
            ],
            [
                'class' => 'fa-google-plus',
                'url' => '#',
            ],
            [
                'class' => 'fa-twitter',
                'url' => '#',
            ],
            [
                'class' => 'fa-youtube',
                'url' => '#',
            ],
        ],
        'service' => [
            [
                'image' => 'https://hstatic.net/785/1000080785/1000114639/home_service_1_img.png',
                'title' => 'Thiết kế Website',
                'url' => '#',
                'text' => 'Chúng tôi tư vấn, thiết kế website chuyên nghiệp thể hiện văn hóa riêng của doanh nghiệp cũng như phong cách của mỗi cá nhân, website của bạn luôn được thiết kế trên nền tảng những công nghệ tiên tiến nhất.',
            ],
            [
                'image' => 'https://hstatic.net/785/1000080785/1000114639/home_service_2_img.png',
                'title' => 'Nâng cấp Website',
                'url' => '#',
                'text' => 'Chúng tôi nâng cấp và tối ưu hóa để giúp website của bạn có được giao diện hiện đại, cải thiện tốc độ và tương thích với các thiết bị di động, bổ sung thêm các tính năng mà bạn mong muốn',
            ],
            [
                'image' => 'https://hstatic.net/785/1000080785/1000114639/home_service_3_img.png',
                'title' => 'Hệ thống Backlink',
                'url' => '#',
                'text' => 'Được xây dựng từ những domain uy tín và thứ hạng cao, nội dung website được kiểm soát chặt chẽ, chúng tôi mạng đến cho bạn những backlink thực sự bền vững và chất lượng',
            ],
        ],
        'comment' => [
            'heading' => 'Nhận xét của Khách Hàng',
            [
                'image' => 'https://hstatic.net/785/1000080785/1/2016/4-3/avatar-aothun_large.png',
                'content' => 'Với nhiều giá trị cơ hội cần triển khai, chúng tôi cần 1 giải pháp và hệ thống vững mạnh để tự tin đẩy doanh số<br>&nbsp;Anh <strong>Phương Nam</strong> - Chủ tịch và sáng lập <span data-mce-style="color: #993300;" style="color: rgb(153, 51, 0);">Aothun.vn</span> <br>',
            ],
            [
                'image' => 'https://hstatic.net/785/1000080785/1/2016/4-3/avatar-juno_large.png',
                'content' => 'Hệ thống backend ecommerce linh hoạt, dễ dàng triển khai và sử dụng giúp tôi thực sự an tâm tập trung vào kinh doanh<br>Anh<strong> Quốc Tuấn</strong> - Phó giám đốc<span data-mce-style="color: #993300;" style="color: rgb(153, 51, 0);"> Chuỗi cửa hàng Juno<br></span>',
            ],
            [
                'image' => 'https://hstatic.net/785/1000080785/1/2016/4-3/chibao_large.png',
                'content' => 'Với QMTECH, Hiểu về trái tim đã thay đổi cách đóng góp truyền thống, giúp cho bất cứ ai cũng có thể tham gia thay đổi cuộc sống của những người bất hạnh trong xã hội. Một đóng góp nhỏ cũng có thể tạo nên thay đổi lớn<br>Diễn viên / Doanh nhân<strong> Chi Bảo</strong> - Sáng lập Mạng xã hội quốc gia <span data-mce-style="color: #993300;" style="color: rgb(153, 51, 0);">Hiểu về trái tim</span><br>',
            ],
            [
                'image' => 'https://hstatic.net/785/1000080785/1/2016/4-3/avatar-ibasic_large.png',
                'content' => '>QMTECH giúp chúng tôi nâng cao hiệu quả bán hàng online, không còn nặng đầu về kỹ thuật để tập trung hoàn toàn vào phát triển ý tưởng kinh doanh <br>Chị <strong>Thu Hiền</strong> - Giám đốc kinh doanh Chuỗi cửa hàng <span style="color: #993300;" data-mce-style="color: #993300;">iBasic Việt Nam </span>',
            ],
            [
                'image' => 'https://hstatic.net/785/1000080785/1/2016/4-3/75326556-thu-nga_large.jpg',
                'content' => 'Sau khi hợp tác với Liên Kết Trẻ, chúng tôi đã có một website vận hành rất tốt và hoàn toàn hài lòng về dịch vụ của Liên Kết Trẻ trong quá trình triển khai cũng như dịch vụ hỗ trợ sau khi website vận hành chính thức.<br>Chị <strong>Trương Thị Thu Nga</strong> - Giám Đốc <span style="color: #993300;" data-mce-style="color: #993300;">ThienNgaCorp</span>',
            ],
        ],
        'partner' => [
            'heading' => 'Đối tác và khách hàng của chúng tôi',
            [
                'image' => 'https://hstatic.net/785/1000080785/1/2016/4-3/5giay_hover_large.png',
                'url' => '#',
            ],
            [
                'image' => 'https://hstatic.net/785/1000080785/1/2016/4-3/ahamove_hover_large.png',
                'url' => '#',
            ],
            [
                'image' => 'https://hstatic.net/785/1000080785/1/2016/4-3/cafebizlogo_large.png',
                'url' => '#',
            ],
            [
                'image' => 'https://hstatic.net/785/1000080785/1/2016/4-3/logo_QMTECH_new1_large.png',
                'url' => '#',
            ],
            [
                'image' => 'https://hstatic.net/785/1000080785/1/2016/4-3/ibasic_hover_large.png',
                'url' => '#',
            ],
            [
                'image' => 'https://hstatic.net/785/1000080785/1/2016/4-3/logo-intel-hover1_large.png',
                'url' => '#',
            ],
            [
                'image' => 'https://hstatic.net/785/1000080785/1/2016/4-3/juno_hover_large.png',
                'url' => '#',
            ],
        ],
        'facebook' => [
            'url' => 'https://www.facebook.com/MOSEVN/?fref=ts',
        ],
        'textContact' => [
            'text' => '<p>Với niềm đam mê tạo ra những website cao cấp và ấn tượng, mỗi sản phẩm là một tác phẩm nghệ thuật mà chúng tôi mong muốn dành tặng riêng cho khách hàng.<br>Mọi sự hợp tác đều có khởi đầu vô cùng đơn giản từ một cuộc trò chuyện. <br>Hãy liên hệ với chúng tôi, để trao đổi về các ý tưởng của bạn.<br><br><span data-mce-style="font-size: 15pt; color: #ff00ff;" style="font-size: 15pt; color: rgb(255, 0, 255);"><strong>Team Liên Kết Trẻ</strong></span><br></p><p>Địa chỉ: D21/35B Ấp 4, xã Hưng Long, Bình Chánh, TP.HCM<br>Hotline: 0985 984 021<br>Email: info@lienkettre.com<br>Website: www.lienkettre.com</p>',
        ],
    ];
    unset($array);

    // GiaoDien9
    $array = [
        'service' => [
            'heading' => 'Dịch vụ của chúng tôi',
            'text' => 'Trên hết, chúng tôi mong muốn đem đến cho các khách hàng, đối tác của mình những sản phẩm, dịch vụ với chất lượng vượt trội. Chọn chúng tôi, bạn hoàn toàn có thể yên tâm về một trang web xứng tầm, xác lập được vị thế của doanh nghiệp bạn trên thị trường.',
            [
                'image' => 'http://hstatic.net/668/1000057668/1000083168/home_service_1_img.png',
                'title' => 'Thiết kế Website',
                'url' => '#',
                'text' => 'Chúng tôi tư vấn, thiết kế website chuyên nghiệp thể hiện văn hóa riêng của doanh nghiệp cũng như phong cách của mỗi cá nhân, website của bạn luôn được thiết kế trên nền tảng những công nghệ tiên tiến nhất.',
            ],
            [
                'image' => 'http://hstatic.net/668/1000057668/1000083168/home_service_2_img.png',
                'title' => 'Nâng cấp Website',
                'url' => '#',
                'text' => 'Chúng tôi nâng cấp và tối ưu hóa để giúp website của bạn có được giao diện hiện đại, cải thiện tốc độ và tương thích với các thiết bị di động, bổ sung thêm các tính năng mà bạn mong muốn',
            ],
            [
                'image' => 'http://hstatic.net/668/1000057668/1000083168/home_service_3_img.png',
                'title' => 'Hệ thống Backlink',
                'url' => '#',
                'text' => 'Được xây dựng từ những domain uy tín và thứ hạng cao, nội dung website được kiểm soát chặt chẽ, chúng tôi mạng đến cho bạn những backlink thực sự bền vững và chất lượng',
            ],
        ],
        'about' => [
            'image' => 'http://hstatic.net/668/1000057668/1000083168/home_aboutus_bg.png',
            'heading' => 'Chúng tôi là ai?',
            'text' => 'Team Liên Kết Trẻ tập hợp những lập trình viên trẻ tuổi, nhiệt huyết và có tinh thần trách nhiệm cao trong công việc, có trình độ cao trong lĩnh vực thiết kế website và internet marketting, được hỗ trợ bởi những thành viên có kinh nghiệm lâu năm, chúng tôi tự tin mang đến cho khách hàng những sản phẩm và dịch vụ tốt nhất.',
        ],
        'productText' => 'Liên Kết Trẻ chuyên về giải pháp website doanh nghiệp chất lượng cao. Với niềm đam mê tạo ra những website ấn tượng, tinh tế, mỗi website là một tác phẩm mà chúng tôi mong muốn dành tặng riêng cho khách hàng.',
        'comment' => [
            'heading' => 'Nhận xét của Khách Hàng',
            [
                'image' => 'http://hstatic.net/668/1000057668/1/2015/12-19/avatar-aothun_large.png',
                'content' => 'Với nhiều giá trị cơ hội cần triển khai, chúng tôi cần 1 giải pháp và hệ thống vững mạnh để tự tin đẩy doanh số<br>&nbsp;Anh <strong>Phương Nam</strong> - Chủ tịch và sáng lập <span data-mce-style="color: #993300;" style="color: rgb(153, 51, 0);">Aothun.vn</span> <br>',
            ],
            [
                'image' => 'http://hstatic.net/668/1000057668/1/2015/12-19/avatar-juno_large.png',
                'content' => 'Hệ thống backend ecommerce linh hoạt, dễ dàng triển khai và sử dụng giúp tôi thực sự an tâm tập trung vào kinh doanh<br>Anh<strong> Quốc Tuấn</strong> - Phó giám đốc<span data-mce-style="color: #993300;" style="color: rgb(153, 51, 0);"> Chuỗi cửa hàng Juno<br></span>',
            ],
            [
                'image' => 'http://hstatic.net/668/1000057668/1/2015/12-19/chibao_large.png',
                'content' => 'Với Haravan, Hiểu về trái tim đã thay đổi cách đóng góp truyền thống, giúp cho bất cứ ai cũng có thể tham gia thay đổi cuộc sống của những người bất hạnh trong xã hội. Một đóng góp nhỏ cũng có thể tạo nên thay đổi lớn<br>Diễn viên / Doanh nhân<strong> Chi Bảo</strong> - Sáng lập Mạng xã hội quốc gia <span data-mce-style="color: #993300;" style="color: rgb(153, 51, 0);">Hiểu về trái tim</span><br>',
            ],
            [
                'image' => 'http://hstatic.net/668/1000057668/1/2015/12-19/avatar-ibasic_large.png',
                'content' => '>Haravan giúp chúng tôi nâng cao hiệu quả bán hàng online, không còn nặng đầu về kỹ thuật để tập trung hoàn toàn vào phát triển ý tưởng kinh doanh <br>Chị <strong>Thu Hiền</strong> - Giám đốc kinh doanh Chuỗi cửa hàng <span style="color: #993300;" data-mce-style="color: #993300;">iBasic Việt Nam </span>',
            ],
            [
                'image' => 'http://hstatic.net/668/1000057668/1/2015/12-19/75326556-thu-nga_large.jpg',
                'content' => 'Sau khi hợp tác với Liên Kết Trẻ, chúng tôi đã có một website vận hành rất tốt và hoàn toàn hài lòng về dịch vụ của Liên Kết Trẻ trong quá trình triển khai cũng như dịch vụ hỗ trợ sau khi website vận hành chính thức.<br>Chị <strong>Trương Thị Thu Nga</strong> - Giám Đốc <span style="color: #993300;" data-mce-style="color: #993300;">ThienNgaCorp</span>',
            ],
        ],
        'partner' => [
            'heading' => 'Đối tác và khách hàng của chúng tôi',
            [
                'image' => 'http://hstatic.net/668/1000057668/1/2015/12-19/5giay_hover_large.png',
                'url' => '#',
            ],
            [
                'image' => 'http://hstatic.net/668/1000057668/1/2015/12-19/ahamove_hover_large.png',
                'url' => '#',
            ],
            [
                'image' => 'http://hstatic.net/668/1000057668/1/2015/12-19/cafebizlogo_large.png',
                'url' => '#',
            ],
            [
                'image' => 'http://hstatic.net/668/1000057668/1/2015/12-19/ibasic_hover_large.png',
                'url' => '#',
            ],
            [
                'image' => 'http://hstatic.net/668/1000057668/1/2015/12-19/logo-intel-hover1_large.png',
                'url' => '#',
            ],
            [
                'image' => 'http://hstatic.net/668/1000057668/1/2015/12-19/juno_hover_large.png',
                'url' => '#',
            ],
            [
                'image' => 'http://hstatic.net/668/1000057668/1/2015/12-19/logo-viettel_large.png',
                'url' => '#',
            ],
        ],
        'facebook' => [
            'url' => 'https://www.facebook.com/MOSEVN/?fref=ts',
        ],
        'social' => [
            [
                'class' => 'fa-facebook',
                'url' => '#',
            ],
            [
                'class' => 'fa-google-plus',
                'url' => '#',
            ],
            [
                'class' => 'fa-twitter',
                'url' => '#',
            ],
            [
                'class' => 'fa-youtube',
                'url' => '#',
            ],
        ],
    ];
    unset($array);

    // GiaoDien10
    $array = [
        'facebook' => [
            'url' => 'https://www.facebook.com/MOSEVN/?fref=ts',
        ],
    ];
    unset($array);

    // GiaoDien11
    $array = [
        'service' => [
            'heading' => 'Điều khoản dịch vụ',
            [
                'text' => 'Điều khoản sử dụng',
                'url' => '#',
            ],
            [
                'text' => 'Điều khoản giao dịch',
                'url' => '#',
            ],
            [
                'text' => 'Dịch vụ tiện ích',
                'url' => '#',
            ],
            [
                'text' => 'Quyền sở hữu trí tuệ',
                'url' => '#',
            ],
        ],
    ];
    unset($array);

    // GiaoDien12
    $array = [
        'youtube' => [
            'heading' => 'Video',
            'url' => 'https://www.youtube.com/embed/sH9XAoOuCSw',
        ],
        'policy' => [
            [
                'text' => 'Trả hàng trong 30 ngày',
            ],
            [
                'text' => 'Giao hàng miễn phí',
            ],
            [
                'text' => 'Thanh toán linh hoạt',
            ],
            [
                'text' => 'Hotline: 090 407 9496',
            ],
        ],
        'rules' => [
            'heading' => 'ĐIỀU KHOẢN',
            [
                'text' => 'Điều khoản sử dụng',
                'url' => '#',
            ],
            [
                'text' => 'Điều khoản giao dịch',
                'url' => '#',
            ],
            [
                'text' => 'Dịch vụ tiện ích',
                'url' => '#',
            ],
            [
                'text' => 'Quyền sở hữu trí tuệ',
                'url' => '#',
            ],
        ],
        'guide' => [
            'heading' => 'HƯỚNG DẪN',
            [
                'text' => 'Hướng dẫn mua hàng',
                'url' => '#',
            ],
            [
                'text' => 'Giao nhận và thanh toán',
                'url' => '#',
            ],
            [
                'text' => 'Đổi trả và bảo hành',
                'url' => '#',
            ],
            [
                'text' => 'Đăng kí thành viên',
                'url' => '#',
            ],
        ],
        'service' => [
            'heading' => 'CHÍNH SÁCH',
            [
                'text' => 'Chính sách thanh toán',
                'url' => '#',
            ],
            [
                'text' => 'Chính sách vận chuyển',
                'url' => '#',
            ],
            [
                'text' => 'Chính sách đổi trả',
                'url' => '#',
            ],
            [
                'text' => 'Chính sách bảo hành',
                'url' => '#',
            ],
        ],
    ];
    unset($array);

    // GiaoDien17
    $array = [
        'feature' => [
            [
                'image' => 'http://bizweb.dktcdn.net/100/069/071/themes/139176/assets/layer-46.jpg',
                'url' => '#',
            ],
            [
                'image' => 'http://bizweb.dktcdn.net/100/069/071/themes/139176/assets/layer-45.jpg',
                'url' => '#',
            ],
            [
                'image' => 'http://bizweb.dktcdn.net/100/069/071/themes/139176/assets/layer-47.jpg',
                'url' => '#',
            ],
        ],
        'about' => [
            [
                'image'     => 'img_1',
                'url'       => '#',
                'header'    => 'MIỄN PHÍ VẬN CHUYỂN',
                'text'      => 'Chúng tối vận chuyển miễn phí với đơn hàng trên 1000.000 đ',
            ],
            [
                'image'     => 'img_2',
                'url'       => '#',
                'header'    => 'KHUYẾN MẠI CUỐI TUẦN',
                'text'      => 'Giảm giá tới 30% vào các ngày thứ 7 và chủ nhật hàng tuần',
            ],
            [
                'image'     => 'img_3',
                'url'       => '#',
                'header'    => 'HỖ TRỢ ĐỔI TRẢ',
                'text'      => 'Hỗ trợ miễn phí đổi trả sản phẩm trong 30 ngày đầu tiên từ khi mua hàng',
            ],

        ],
        'comment' => [
            [
                'image'     => '//bizweb.dktcdn.net/thumb/compact/100/069/071/themes/139176/assets/layer_author1.png',
                'content'   => 'Tôi rất hài lòng với dịch vụ chuyên nghiệp và chất lượng sản phẩm cũng như thái độ phục vụ của Mendover. 
                        Chắc chắn rằng tôi sẽ quay lại đây nhiều lần nữa để mua hàng.',
                'name'      => 'PHẠM NHẬT THÀNH',
                'job'       => 'Web Designer'
            ],
            [
                'image'     => '//bizweb.dktcdn.net/thumb/compact/100/069/071/themes/139176/assets/layer_author2.png',
                'content'   => 'Tôi rất hài lòng với dịch vụ chuyên nghiệp và chất lượng sản phẩm cũng như thái độ phục vụ của Mendover. 
                        Chắc chắn rằng tôi sẽ quay lại đây nhiều lần nữa để mua hàng.',
                'name'      => 'Nguyễn Thành Long',
                'job'       => 'Luật sư'
            ],
            [
                'image'     => '//bizweb.dktcdn.net/thumb/compact/100/069/071/themes/139176/assets/layer_author3.png',
                'content'   => 'Tôi rất hài lòng với dịch vụ chuyên nghiệp và chất lượng sản phẩm cũng như thái độ phục vụ của Mendover. 
                        Chắc chắn rằng tôi sẽ quay lại đây nhiều lần nữa để mua hàng.',
                'name'      => 'Lê Đức Anh',
                'job'       => 'Bác sỹ'
            ],
        ],
        'partner' => [
            [
                'image'     =>'//bizweb.dktcdn.net/100/069/071/themes/139176/assets/partler1.png',
                'url'       => '#',
            ],
            [
                'image'     =>'//bizweb.dktcdn.net/100/069/071/themes/139176/assets/partler2.png',
                'url'       => '#',
            ],
            [
                'image'     =>'//bizweb.dktcdn.net/100/069/071/themes/139176/assets/partler3.png',
                'url'       => '#',
            ],
            [
                'image'     =>'//bizweb.dktcdn.net/100/069/071/themes/139176/assets/partler4.png',
                'url'       => '#',
            ],
            [
                'image'     =>'//bizweb.dktcdn.net/100/069/071/themes/139176/assets/partler5.png',
                'url'       => '#',
            ],
            [
                'image'     =>'//bizweb.dktcdn.net/100/069/071/themes/139176/assets/partler6.png',
                'url'       => '#',
            ],
            [
                'image'     =>'//bizweb.dktcdn.net/100/069/071/themes/139176/assets/partler7.png',
                'url'       => '#',
            ],
            [
                'image'     =>'//bizweb.dktcdn.net/100/069/071/themes/139176/assets/partler8.png',
                'url'       => '#',
            ],
            [
                'image'     =>'//bizweb.dktcdn.net/100/069/071/themes/139176/assets/partler9.png',
                'url'       => '#',
            ],
        ],
        'policy' => [
            'heading' => 'Chính sách',
            [
                'text' => 'Chính sách thanh toán',
                'url' => '#',
            ],
            [
                'text' => 'Chính sách vận chuyển',
                'url' => '#',
            ],
            [
                'text' => 'Chính sách đổi trả',
                'url' => '#',
            ],
            [
                'text' => 'Chính sách bảo hành',
                'url' => '#',
            ],
            [
                'text' => 'Dịch vụ tiện ích',
                'url' => '#',
            ],
        ],
        'provision' => [
            'heading' => 'Điều khoản',
            [
                'text' => 'Điều khoản sử dụng',
                'url' => '#',
            ],
            [
                'text' => 'Điều khoản giao dịch',
                'url' => '#',
            ],
            [
                'text' => 'Dịch vụ tiện ích',
                'url' => '#',
            ],
            [
                'text' => 'Quyền sở hữu trí tuệ',
                'url' => '#',
            ],
            [
                'text' => 'Đăng kí điều khoản',
                'url' => '#',
            ],            
        ],
        'guide' => [
            'heading' => 'Hướng dẫn',
            [
                'text' => 'Hướng dẫn mua hàng',
                'url' => '#',
            ],
            [
                'text' => 'Giao nhận và thanh toán',
                'url' => '#',
            ],
            [
                'text' => 'Đổi trả và bảo hành',
                'url' => '#',
            ],
            [
                'text' => 'Điều khoản sử dụng',
                'url' => '#',
            ],
            [
                'text' => 'Quyền sở hữu trí tuệ',
                'url' => '#',
            ],
        ],
        'map'       => [
            [
                'src'   => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.197827598388!2d106.65177431433693!3d10.796155261782483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752935e97b0445%3A0xa4b83f2f98a593fe!2zMTU3LTE1OSBYdcOibiBI4buTbmcsIFBoxrDhu51uZyAxMiwgVMOibiBCw6xuaCwgSOG7kyBDaMOtIE1pbmgsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1472204051119',
            ],
        ],
    ];
    unset($array);
    
    // GiaoDien16
    $array = [
        'image_sidebar' => [
            [
                'image' => '//bizweb.dktcdn.net/100/091/132/themes/139143/assets/banner.jpg',
            ],
        ],
        'first_banner' => [
            [
                'image' => '//bizweb.dktcdn.net/100/091/132/themes/139143/assets/article_ads_banner_1.jpg',
            ],
        ],
        'second_banner' => [
            [
                'image' => '//bizweb.dktcdn.net/100/091/132/themes/139143/assets/article_ads_banner_2.jpg',
            ],
        ],
        'payment'       => [
            'heading'   => 'hỗ trợ thanh toán',
            [
                'image' => 'payment-1.jpg',
            ],
            [
                'image' => 'payment-2.jpg',
            ],
            [
                'image' => 'payment-3.jpg',
            ],
            [
                'image' => 'payment-4.jpg',
            ],
            [
                'image' => 'payment-5.jpg',
            ],
        ],
        'support'   =>  [
            'heading'   => 'giải đáp thắc mắc',
            'image'     => 'tuvan.png',
            [
                'text'  => 'Tư vấn miễn phí (24/7)',
                'phone'  => '1900 6750',
            ],
            [
                'text'  => 'Góp ý, phản ánh (8h00 - 20h00)',
                'phone'  => '1900  6750',
            ],
        ],
        'information'   => [
            'heading'   => 'thông tin công ty',
            [
                'text'  => 'Thông tin',
                'url'   => '#'
            ],
            [
                'text'  => 'Giới thiệu công ty',
                'url'   => '#'
            ],
            [
                'text'  => 'Hệ thống các siêu thị',
                'url'   => '#'
            ],
            [
                'text'  => 'Tuyển dụng',
                'url'   => '#'
            ],
        ],
        'contact'       => [
            'heading'   => 'hỗ trợ khách hàng',
            [
                'text'  => 'Liên hệ và góp ý',
                'url'   => '#',
            ],
            [
                'text'  => 'Hướng dẫn mua hàng online',
                'url'   => '#',
            ],
            [
                'text'  => 'Hướng dãn mua hàng trả góp',
                'url'   => '#',
            ],
            [
                'text'  => 'Quy chế quản lý hoạt động',
                'url'   => '#',
            ],
        ],
        'policy'       => [
            'heading'   => 'chính sách mua hàng',
            [
                'text'  => 'quy định, chính sách',
                'url'   => '#',
            ],
            [
                'text'  => 'chính sách bảo hành- đổi trả',
                'url'   => '#',
            ],
            [
                'text'  => 'chính sách hội viên',
                'url'   => '#',
            ],
            [
                'text'  => 'giao hàng và lắp đặt',
                'url'   => '#',
            ],
        ],
        'facebook'  => [
            [
                'url'   => 'https://www.facebook.com/H%E1%BB%99i-nh%E1%BB%AFng-ng%C6%B0%E1%BB%9Di-ph%C3%A1t-cu%E1%BB%93ng-Th%E1%BA%BF-Anh-Ks-298445283513153/?fref=ts',
            ],
        ],
        'branch'       => [
            'heading'   => 'Công ty cổ phần Công nghệ DKT',
            [
                'address'    => 'Trụ sở chính: Tầng 4 - Tòa nhà Hanoi Group - 442 Đội Cấn - Ba Đình - Hà Nội',
                'phone'      => 'Điện thoại: HN - (04) 6674 2332 - (04) 3786 8904',
            ],
            [
                'address'    => 'VPDD: Lầu 3 - Tòa nhà Lữ Gia - Số 70 Lữ Gia - P.15 - Q.11 - TP HCM',
                'phone'      => 'HCM - (08) 6680 9686 - (08) 3866 6276',
            ],
        ],
        'map'       => [
            [
                'src'   => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.197827598388!2d106.65177431433693!3d10.796155261782483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752935e97b0445%3A0xa4b83f2f98a593fe!2zMTU3LTE1OSBYdcOibiBI4buTbmcsIFBoxrDhu51uZyAxMiwgVMOibiBCw6xuaCwgSOG7kyBDaMOtIE1pbmgsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1472204051119',
            ],
        ],
    ];
    unset($array);

    // GiaoDien14
    $array = [
        'rightMenu' => [
            'telephone' => '1900.0124',
            'link' => [
                'text' => 'parl-place',
                'url' => '#',
            ],
            'video' => [
                'text' => 'video clip',
                'youtube' => 'http://www.youtube.com/embed/OR1T4WxhtmA',
            ],
            'openDoor' => [
                'text' => 'Giờ mở của tham quan nhà mẫu',
                'image' => 'http://theart.com.vn/wp-content/uploads/2015/04/thumb-lichthamquan.jpg',
                'text1' => '<p style="margin: 0px 0px 5px;"><span style="font-weight: 700;">+ Thứ 2 – Thứ 6:</span><br>Sáng: 08h – 12h<br>Chiều: 13h30 – 18h.</p>',
                'text2' => '<p style="margin: 0px 0px 5px;"><span style="font-weight: 700;">+ Thứ 7 – Chủ nhật:</span><br><font class="">Sáng: 08h – 12h</font><br><font class="">Chiều: 13h30 – 19h.</font></p>',
            ],
        ],
        'descriptionWeb' => [
            'title' => 'Giới thiệu về <span>Park Place</span>',
            'content' => '<p>Dự án căn hộ Park-Place&nbsp;dành cho Trí Thức Trẻ có diện tích khuôn viên rộng hơn 30.000 m2 với 10 khối tháp căn hộ cao 18 tầng và một trung tâm thương mại trong tổng thể 4 Block mang tên các nghệ sĩ nổi tiếng thế giới:</p><ul><li>Picasso</li><li>Mozart</li><li>Leonardo Da Vinci</li><li>Beethoven</li></ul><p><strong>Căn hộ Park-Place</strong>&nbsp;nằm trong khu dân cư cao cấp Gia Hòa Art Village rộng gần 28,5 ha với rất nhiều tiện ích công cộng phục vụ cho cộng đồng khu dân cư bao gồm : Hồ bơi rộng 1.800m2 mang tên <strong>Ánh Viên- Nữ kình ngư tài năng của Việt Nam</strong>, khu vui chơi trẻ em, trường mẫu giáo, sân tennis, phòng khám đa khoa, khu công viên, khu sinh hoạt ngoài trời, tiệc nướng BBQ, café sân vườn, phòng tập gym và rất nhiều tiện ích khác. Căn hộ The Art được kết nối bởi 8 con đường mang tên văn nghệ sĩ Việt Nam: nhạc sĩ Trịnh Công Sơn, nhạc sĩ Phạm Trọng Cầu, nhạc sĩ Diệp Minh Tuyền, nhà văn Nguyễn Đình Thi, nhà thơ Xuân Quỳnh, nghệ sĩ nhân dân Út Trà Ôn, nhà thơ Huy Cận và nghệ sĩ ưu tú Thanh Nga.</p><p>Không chỉ mang lại cho cư dân môi trường sống trong lành và tiện ích, dự án căn hộ The Art dành cho Trí Thức Trẻ còn tạo được sự khác biệt so với các dự án khác bởi sự tiên phong mang tính đột phá. Lần đầu tiên ý tưởng xây dựng khu căn hộ sang trọng dành riêng cho trí thức trẻ, một ý tưởng rất mới xuất phát từ mong muốn của chủ đầu tư là mang đến một phong cách sống tiện nghi, hiện đại, lành mạnh và mang đậm tính nhân văn.</p><p>Với khát vọng tạo nên một khu <strong>“Resort trong lòng thành phố” và mang đậm tính nghệ thuật nhân văn</strong>, công ty Gia Hòa mong muốn là người tiên phong thực hiện căn hộ The Art dành cho giới Trí Thức Trẻ và tự tin khẳng định đây là nơi cho bạn gửi trọn niềm tin về một cuộc sống an lành, hạnh phúc với giá thành hợp lý và phù hợp với giới trẻ ngày nay.</p><p><a class="button_link" href="/pages/thong-tin-phap-ly-du-an">Thông tin pháp lý dự án</a></p>',
            'image' => 'http://store.moseplus.com/template/giaodien14/images/section-bg-3.jpg',
        ],
        'viTri' => [
            'textViewGoogleMap' => 'Xem bản đồ Google map',
            'linkGoogleMap' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.197827598388!2d106.65177431433693!3d10.796155261782483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752935e97b0445%3A0xa4b83f2f98a593fe!2zMTU3LTE1OSBYdcOibiBI4buTbmcsIFBoxrDhu51uZyAxMiwgVMOibiBCw6xuaCwgSOG7kyBDaMOtIE1pbmgsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1471599278413',
            'description' => 'Trường học<br>Sân Golf<br>Câu Lạc Bộ Golf Việt Nam<br>Siêu thị<br>',
            'image' => 'http://store.moseplus.com/template/giaodien14/images/img-map-4.jpg',
        ],
        'matBangCanHo' => [
            'slider' => [
                [
                    'image' => 'http://store.moseplus.com/template/giaodien14/images/flat_img_1.jpg',
                ],
                [
                    'image' => 'http://store.moseplus.com/template/giaodien14/images/flat_img_2.jpg',
                ],
                [
                    'image' => 'http://store.moseplus.com/template/giaodien14/images/flat_img_3.jpg',
                ],
            ],
            'text' => 'Mặt bằng căn hộ <span>Park Place</span>',
            'item' => [
                [
                    'title' => 'Mặt bằng chung',
                    'url' => '#',
                    'image' => 'http://store.moseplus.com/template/giaodien14/images/information_1.jpg',
                ],
                [
                    'title' => 'Mặt bằng tầng',
                    'url' => '#',
                    'image' => 'http://store.moseplus.com/template/giaodien14/images/information_2.jpg',
                ],
                [
                    'title' => 'Phối cảnh căn hộ',
                    'url' => '#',
                    'image' => 'http://store.moseplus.com/template/giaodien14/images/information_3.jpg',
                ],
            ],
        ],
        'tienIch' => [
            'heading' => 'Tiện ích <span>Park Place</span>',
            'linkMore' => [
                [
                    'title' => 'Tiện ích tổng quan',
                    'url' => '#',
                ],
            ],
            'list' => [
                [
                    'imageHold' => 'http://store.moseplus.com/template/giaodien14/images/utilities_icon_1.png',
                    'title' => 'Trung tâm thương mại',
                    'imageMain' => 'http://store.moseplus.com/template/giaodien14/images/tien-ich-1.jpg',
                    'description' => 'Hàng hóa rất đa dạng và được chọn lọc kĩ càng, phương thức phuc vụ văn minh, tận tâm, mở cửa 24/7',
                    'content' => '<p style="line-height: 18px; margin: 0px 0px 5px; font-family: \'Open Sans\', sans-serif; font-size: 12px;"><img class="alignnone size-large wp-image-1442" src="https://images2-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&amp;gadget=a&amp;no_expand=1&amp;refresh=604800&amp;url=http://www.theart.com.vn/wp-content/uploads/2015/07/can-ho-the-art-13-1024x707.jpg" alt="can ho the art 13" width="1024" height="707" style="height: auto; max-width: 100%; vertical-align: middle;"></p><p style="line-height: 18px; margin: 0px 0px 5px; font-family: \'Open Sans\', sans-serif; font-size: 12px;">&nbsp;</p><p style="line-height: 18px; margin: 0px 0px 5px; font-family: \'Open Sans\', sans-serif; font-size: 12px;">Hàng hóa rất đa dạng và được chọn lọc kĩ càng, phương thức phuc vụ văn minh, tận tâm, mở cửa 24/7. Trung tâm thương mại của The Art không chỉ là nơi cung cấp hàng hóa tiêu dùng thiết yếu hàng ngày của cư dân, nơi đây còn là địa điểm lý tưởng cho những giây phút shopping cuối tuần với gia đình.</p>',
                ],
                [
                    'imageHold' => 'http://store.moseplus.com/template/giaodien14/images/utilities_icon_2.png',
                    'title' => 'Phòng Gym',
                    'imageMain' => 'http://store.moseplus.com/template/giaodien14/images/tien-ich-2.jpg',
                    'description' => 'Phòng gym là một giải pháp cải thiện vóc dáng, tăng cường sức khỏe và giải tỏa stress sau giờ làm việc.',
                    'content' => '<p style="line-height: 18px; margin: 0px 0px 5px; font-family: \'Open Sans\', sans-serif; font-size: 12px;"><img class="alignnone size-large wp-image-1445" src="https://images2-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&amp;gadget=a&amp;no_expand=1&amp;refresh=604800&amp;url=http://www.theart.com.vn/wp-content/uploads/2015/07/can-ho-the-art-16-1024x575.jpg" alt="can ho the art 16" width="1024" height="575" style="height: auto; max-width: 100%; vertical-align: middle;"></p><p style="line-height: 18px; margin: 0px 0px 5px; font-family: \'Open Sans\', sans-serif; font-size: 12px;">&nbsp;</p><p style="line-height: 18px; margin: 0px 0px 5px; font-family: \'Open Sans\', sans-serif; font-size: 12px;">Phòng gym&nbsp;là một giải pháp cải thiện vóc dáng, tăng cường sức khỏe và giải tỏa stress sau giờ làm việc. Phòng gym của The Art với Trang thiết bị hiện đại phục vụ tối đa nhu cầu tập luyện của bạn. Điều này sẽ giúp các bạn tập luyện tốt hơn, an toàn hơn, và sẽ nhanh đạt kết quả hơn. Môi trường tập luyện thoáng mát, sạch sẽ, máy móc gọn gàng, ngăn nắp sẽ luôn làm bạn có những giờ phút tập luyện thoải mái nhất.</p>',
                ],
                [
                    'imageHold' => 'http://store.moseplus.com/template/giaodien14/images/utilities_icon_3.png',
                    'title' => 'Khu vực BBQ ngoài trời',
                    'imageMain' => 'http://store.moseplus.com/template/giaodien14/images/tien-ich-3.jpg',
                    'description' => 'Với thiết kế không gian mở khoáng đạt, tiện nghi và phong cảnh hữu tình, khu vực tổ chức tiệc BBQ ngoài trời',
                    'content' => '<h3 class="article_header" style="clear: both; font-weight: 300; margin: 0px; font-size: 24px; line-height: 26px; font-family: \'UTM Swiss Condensed\'; color: rgb(152, 192, 68); padding: 10px 0px 0px; text-transform: uppercase; text-align: center;"><p style="line-height: 18px; margin: 0px 0px 5px; color: rgb(0, 0, 0); font-family: \'Open Sans\', sans-serif; font-size: 12px; text-align: start; text-transform: none;"><img class="alignnone size-large wp-image-1453" src="https://images2-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&amp;gadget=a&amp;no_expand=1&amp;refresh=604800&amp;url=http://www.theart.com.vn/wp-content/uploads/2015/06/can-ho-the-art-01-1024x575.jpg" alt="can ho the art 01" width="1024" height="575" style="height: auto; max-width: 100%; vertical-align: middle;"></p><p style="line-height: 18px; margin: 0px 0px 5px; color: rgb(0, 0, 0); font-family: \'Open Sans\', sans-serif; font-size: 12px; text-align: start; text-transform: none;">&nbsp;</p><p style="line-height: 18px; margin: 0px 0px 5px; color: rgb(0, 0, 0); font-family: \'Open Sans\', sans-serif; font-size: 12px; text-align: start; text-transform: none;">Với thiết kế không gian mở khoáng đạt, tiện nghi và phong cảnh hữu tình, khu vực tổ chức tiệc BBQ ngoài trời của The Art thực sự là nơi tuyệt vời cho những buổi tiệc ngoài trời vui vẻ của gia đình hay những buổi tiệc nhỏ vào cuối tuần quay quần bạn bè. Nơi đây sẽ là nơi mang đến cảm giác thoải mái, gần gũi thiên nhiên của các bữa tiệc ngoài trời.</p></h3>',
                ],
            ],
        ],
        'gallery' => [
            'heading' => 'Thư viện',
            [
                'text' => 'Hình ảnh thực tế',
                'imageTitle' => 'http://store.moseplus.com/template/giaodien14/images/libarary_1.png',
                'titleUrl' => 'Xem tất cả',
                'url' => '#',
                'image1' => 'http://hstatic.net/286/1000076286/10/2016/3-24/untitled-2.png',
                'image2' => 'http://hstatic.net/286/1000076286/10/2016/3-24/biet-thu-vinhomes-central-park-biet-thu-vinhomes-tan-cang-biet-thu-vinhome-tan-cang-biet-thu-vinhome-central-park-gia-ban-biet-thu-vinhomes-tan-cang-central-park-1024x575.jpg',
                'image3' => 'http://hstatic.net/286/1000076286/10/2016/3-24/phoi-canh-can-ho-cao-cap-luxcity-quan-7-hai-nam-sau.jpg',
                'image4' => 'http://hstatic.net/286/1000076286/10/2016/3-24/home02.jpg',
                'image5' => 'http://hstatic.net/286/1000076286/10/2016/3-24/flat_img_2.jpg',
                'image6' => 'http://hstatic.net/286/1000076286/10/2016/3-24/can-ho-vinpearl-condotel-nha-trang-vinpearl-condotel-1024x576.jpg',
            ],
            [
                'text' => 'Nhà mẫu',
                'imageTitle' => 'http://store.moseplus.com/template/giaodien14/images/libarary_2.png',
                'titleUrl' => 'Xem tất cả',
                'url' => '#',
                'image1' => 'http://canhovinhome.com/uploads/noidung/images/nha%20mau%20vinhomes%20central%20park.jpg',
                'image2' => 'http://canhovinhome.com/uploads/noidung/images/phong_ngu_tien_nghi_vinhomes_central_park.jpg',
                'image3' => 'http://canhovinhome.com/uploads/noidung/images/phong_ngu_vinhomes.jpg',
                'image4' => 'http://vinhometancang.co/wp-content/uploads/2014/07/nha-mau-vinhomes-tan-cang.jpg',
                'image5' => 'http://vinhometancang.co/wp-content/uploads/2014/07/nha-mau-vinhomes-tan-cang_1.jpg',
                'image6' => 'http://vinhometancang.co/wp-content/uploads/2014/07/nha-mau-vinhomes-tan-cang_2.jpg',
            ],
            [
                'text' => 'Phối cảnh',
                'imageTitle' => 'http://store.moseplus.com/template/giaodien14/images/libarary_3.png',
                'titleUrl' => 'Xem tất cả',
                'url' => '#',
                'image1' => 'http://hstatic.net/286/1000076286/10/2016/3-24/c0589513-ed16-4ca5-ac80-d1c899eb20a1_biet_thu_1_.png',
                'image2' => 'http://www.theart.com.vn/wp-content/uploads/2015/04/Can-ho-Theart-12-1024x542.jpg',
                'image3' => 'http://hstatic.net/286/1000076286/10/2016/3-24/1401546768_17.jpg',
                'image4' => 'http://hstatic.net/286/1000076286/10/2016/3-24/can-ho-vinpearl-condotel-nha-trang-vinpearl-condotel-1024x576.jpg',
                'image5' => 'http://hstatic.net/286/1000076286/10/2016/3-24/flat_img_2.jpg',
                'image6' => 'http://hstatic.net/286/1000076286/10/2016/3-24/biet-thu-2-tang-hien-dai-8.jpg',
            ],
            [
                'text' => 'Tiến độ thi công',
                'imageTitle' => 'http://store.moseplus.com/template/giaodien14/images/libarary_4.png',
                'titleUrl' => 'Xem tất cả',
                'url' => '#',
                'image1' => 'http://hstatic.net/286/1000076286/10/2016/3-24/anh-3-jpg-4330-1423720215.jpg',
                'image2' => 'http://www.theart.com.vn/wp-content/uploads/2015/09/Can-ho-Theart-16-576x1024.jpg',
                'image3' => 'http://hstatic.net/286/1000076286/10/2016/3-24/thi-cong-xay-dung_1_.jpg',
                'image4' => 'http://www.theart.com.vn/wp-content/uploads/2015/04/Can-ho-Theart-10-1024x724.jpg',
                'image5' => 'http://hstatic.net/286/1000076286/10/2016/3-24/can-ho-vinpearl-condotel-nha-trang-vinpearl-condotel-1024x576.jpg',
                'image6' => 'http://hstatic.net/286/1000076286/10/2016/3-24/0103_-_02.jpg',
            ],
        ],
        'mapContact' => 'http://store.moseplus.com/template/giaodien14/images/map-contact.jpg',
        'social' => [
            [
                'class' => 'fa-twitter',
                'url' => '#',
            ],
            [
                'class' => 'fa-facebook',
                'url' => '#',
            ],
            [
                'class' => 'fa-google-plus',
                'url' => '#',
            ],
            [
                'class' => 'fa-pinterest',
                'url' => '#',
            ],
            [
                'class' => 'fa-youtube',
                'url' => '#',
            ],
            [
                'class' => 'fa-rss',
                'url' => '#',
            ],
        ],
    ];

    //print_r(encode_serialize($array));
?>