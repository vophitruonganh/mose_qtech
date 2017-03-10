<div class="side-menu">
    <ul class="side-menu-list">
        <li class="{{ (Request::is('backend/dashboard*') ? 'opened' : '') }}">
            <a href="#"><span class="menu-icon dashicons dashicons-dashboard"></span><span class="lb">Bảng điều khiển</span></a>
        </li>
        <li class="side-menu-title">Nội dung</li>
        <li class="with-sub {{ (Request::is('backend/post*') ? 'opened' : '') }}">
            <a href="javascript:;"><span class="menu-icon dashicons dashicons-admin-post"></span><span class="lb">Bài viết</span></a>
            <ul class="side-menu-child">
                <li><a href="{{ url('backend/post.html') }}"><span class="lb">Danh sách bài viết</span></a></li>
                <li><a href="{{ url('backend/post/create.html') }}"><span class="lb">Thêm mới</span></a></li>
                <li><a href="{{ url('backend/post_category.html') }}"><span class="lb">Danh mục bài viết</span><span class="label label-pull">35</span></a></li>
                <li><a href="{{ url('backend/post_tag.html') }}"><span class="lb">Nhãn</span></a></li>
            </ul>
        </li>
        <li class="{{ (Request::is('backend/page*') ? 'opened' : '') }}">
            <a href="{{ url('backend/page.html') }}"><span class="menu-icon dashicons dashicons-admin-page"></span><span class="lb">Trang</span></a>
        </li>
        <li class="side-menu-title">Bán hàng</li>
        <li class="with-sub {{ ((Request::is('backend/product*') || Request::is('backend/group_product*') || Request::is('backend/manufactory_product*') ) ? 'opened' : '') }}">
            <a href="javascript:;"><span class="menu-icon fa fa-shopping-bag"></span><span class="lb">Sản phẩm</span><span class="label label-pull">35</span></a>
            <ul class="side-menu-child">
                <li><a href="{{ url('backend/product.html') }}"><span class="lb">Danh sách sản phẩm</span></a></li>
                <li><a href="{{ url('backend/product/create.html') }}"><span class="lb">Thêm mới</span></a></li>
                <li><a href="{{ url('backend/group_product.html') }}"><span class="lb">Nhóm sản phẩm</span></a></li>
                <li><a href="{{ url('backend/manufactory_product.html') }}"><span class="lb">Nhà cung cấp</span></a></li>
                <li><a href="#"><span class="lb">Khuyễn mãi</span></a></li>
                <li><a href="{{ url('backend/product_category.html') }}"><span class="lb">Danh mục</span></a></li>
                <li><a href="{{ url('backend/product_tag.html') }}"><span class="lb">Nhãn</span></a></li>
            </ul>
        </li>
        <li class="with-sub {{ (Request::is('backend/order*') ? 'opened' : '') }}">
            <a href="javascript:;"><span class="menu-icon dashicons dashicons-cart"></span><span class="lb">Đơn hàng</span></a>
            <ul class="side-menu-child">
                <li><a href="{{ url('backend/order.html') }}"><span class="lb">Danh sách đơn hàng</span></a></li>
                <li><a href="{{ url('backend/order/create.html') }}"><span class="lb">Thêm mới</span></a></li>
                <li><a href="#"><span class="lb">Nháp</span></a></li>
                <li><a href="#"><span class="lb">Giỏ hàng đang xử lý</span></a></li>
            </ul>
        </li>
        <li class="side-menu-title">Tài khoản</li>
        <li class="with-sub {{ (Request::is('backend/user*') ? 'opened' : '') }}">
            <a href="javascript:;"><span class="menu-icon dashicons dashicons-admin-users"></span><span class="lb">Người dùng</span></a>
            <ul class="side-menu-child">
                <li><a href="{{ url('backend/user.html') }}"><span class="lb">Danh sách người dùng</span></a></li>
                <li><a href="{{ url('backend/user/create.html') }}"><span class="lb">Thêm mới</span></a></li>
                <li><a href="{{ url('backend/user/edit/'.Session::get('user_id').'.html') }}"><span class="lb">Thay đổi thông tin</span></a></li>
            </ul>
        </li>
        <li class="with-sub {{ (Request::is('backend/customer*') ? 'opened' : '') }}">
            <a href="javascript:;"><span class="menu-icon dashicons dashicons-groups"></span><span class="lb">Khách hàng</span></a>
            <ul class="side-menu-child">
                <li><a href="{{ url('backend/customer.html') }}"><span class="lb">Danh sách khách hàng</span></a></li>
                <li><a href="{{ url('backend/customer/create.html') }}"><span class="lb">Thêm mới</span></a></li>
            </ul>
        </li>
        <li class="side-menu-title">Website</li>
        <li class="{{ (Request::is('backend/page*') ? 'opened' : '') }}">
            <a href="{{ url('backend/config_website.html') }}"><span class="menu-icon dashicons dashicons-admin-tools"></span><span class="lb">Cấu hình website</span></a>
        </li>
        <li class="{{ (Request::is('backend/page*') ? 'opened' : '') }}">
            <a href="{{ url('backend/page.html') }}"><span class="menu-icon dashicons dashicons-welcome-widgets-menus"></span><span class="lb">Menu</span></a>
        </li>
        <li class="{{ (Request::is('backend/page*') ? 'opened' : '') }}">
            <a href="{{ url('backend/page.html') }}"><span class="menu-icon dashicons dashicons-archive"></span><span class="lb">Tiện ích</span></a>
        </li>
        <li class="{{ (Request::is('backend/page*') ? 'opened' : '') }}">
            <a href="{{ url('backend/page.html') }}"><span class="menu-icon dashicons dashicons-admin-appearance"></span><span class="lb">Giao diện</span></a>
        </li>
        <li class="{{ (Request::is('backend/page*') ? 'opened' : '') }}">
            <a href="{{ url('backend/page.html') }}"><span class="menu-icon dashicons dashicons-admin-plugins"></span><span class="lb">Ứng dụng</span></a>
        </li>
        <li class="side-menu-border"></li>
        <li class="{{ (Request::is('backend/log*') ? 'opened' : '') }}">
            <a href="{{ url('backend/log.html') }}"><span class="menu-icon dashicons dashicons-welcome-write-blog"></span><span class="lb">Logs</span></a>
        </li>
        <li class="{{ (Request::is('backend/ticket*') ? 'opened' : '') }}">
            <a href="#"><span class="menu-icon dashicons dashicons-sos"></span><span class="lb">Hỗ trợ</span></a>
        </li>
        <li class="with-sub {{ (Request::is('backend/report*') ? 'opened' : '') }}">
            <a href="javascript:;"><span class="menu-icon dashicons dashicons-chart-pie"></span><span class="lb">Báo cáo</span></a>
            <ul class="side-menu-child">
                <li><a href="#"><span class="lb">Truy cập website</span></a></li>
                <li><a href="#"><span class="lb">Tồn kho sản phẩm</span></a></li>
                <li><a href="#"><span class="lb">Doanh thu bán hàng</span></a></li>
            </ul>
        </li>
    </ul>
</div>