<!-- <div id="loader-container">
    <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
       <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
    </svg>
</div> -->
<div class="header">
    <div class="container-fluid">
        <div class="logo">
            <button class="hamburger hamburger--htla hidden-xs-up" data-bind="click: Interface.MobileMenuLeft">
                <span>toggle menu</span>
            </button>
            <a class="navbar-logo" href="{{url('/admin')}}"><img src="{{ $cdn_domain_image }}/logo.png" /></a>
            <a class="view-front" href="{{url('/')}}" target="_blank"><i class="font-icon material-icons md-20">exit_to_app</i></a>
        </div>
        <div class="header-content">
			<div class="header-content-in clearfix">
				<div class="header-shown">
                    <?php
                        $userData = getUserData();
		       			$user_meta = decode_serialize($userData->meta_value);
                        $nickname = ( !empty($userData->user_fullname) ) ? $userData->user_fullname : $userData->user_email;
		       			$firstCharacter = strtoupper(substr($nickname,0,1));

		       		 ?>
					<div class="dropdown user-menu">
                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="img-name">{{ $firstCharacter }}</span>
                            <span class="name">{{ $nickname }}</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
		       				<!-- <div class="dropdown-item role">Nhân viên</div>
                            <div class="dropdown-divider"></div> -->
                        	<a class="dropdown-item" target="_blank" href="{{ url('/') }}">Trang chủ website</a>
                            <a class="dropdown-item" href="{{ url('admin/user/edit/'.$userData->user_id) }}">Thay đổi thông tin</a>
                            <div class="dropdown-divider"></div>
                        	<a class="dropdown-item" href="#">Mời bạn bè</a>
                            <a class="dropdown-item" href="#">Điều khoản dịch vụ</a>
                            <a class="dropdown-item" href="#">Chính sách bảo mật</a>
                            <a class="dropdown-item" href="#">Hướng dẫn</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('/admin/logout') }}">Đăng xuất</a>
                        </div>
                    </div>
				</div>
                <div class="header-service">
                    <ul class="nav navbar-nav clearfix">
                        <li class="nav-item"><a href="" class="nav-link active"><i class="font-icon material-icons md-18">web</i> Quản lý Website</a></li>
                        <li class="nav-item"><a href="" class="nav-link"><i class="font-icon material-icons md-18">pages</i> Bán trên Facebook</a></li>
                        <li class="nav-item"><a href="" class="nav-link"><i class="font-icon material-icons md-18">store</i> Bán tại cửa hàng</a></li>
                    </ul>
                </div>
			</div>
        </div>
    </div>
</div>
<div class="mobile-menu-left-overlay" data-bind="click: Interface.MobileMenuLeftDisable"></div>
@include('backend.includes.left')
<div class="page-wrap">
<div class="page-content">
{!! $setion_heading !!}
<div class="page-main">
    <div class="container-fluid">