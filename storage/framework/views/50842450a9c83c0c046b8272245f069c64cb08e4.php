<div class="menu-left" style="overflow-y: hidden;" data-plugin="jScrollPane" data-resize="true" data-type="menu-left">
    <ul class="menu-list">
        <li class="<?php echo e((Request::is('admin/dashboard*') || Request::is('admin') ? 'opened' : '')); ?>">
            <a href="<?php echo e(url('admin/dashboard')); ?>"><i class="font-icon material-icons md-20">dashboard</i><span class="lbl">Bảng điều khiển</span></a>
        </li>
        <li class="menu-title">Cửa hàng</li>
        <li class="with-sub <?php echo e(((Request::is('admin/product*') || Request::is('admin/group-product*') || Request::is('admin/manufactory-product*') || Request::is('admin/taxonomy/product-*') ) ? 'opened' : '')); ?>">
            <a href="javascript:;"><i class="font-icon material-icons md-20">shopping_cart</i><span class="lbl">Sản phẩm</span><span class="label label-danger">35</span></a>
            <ul class="menu-child">
                <li><a href="<?php echo e(url('admin/product')); ?>"><span class="lbl">Danh sách sản phẩm</span></a></li>
                <li><a href="<?php echo e(url('admin/product/create')); ?>"><span class="lbl">Thêm mới</span></a></li>
                <li><a href="<?php echo e(url('admin/taxonomy/product-group')); ?>"><span class="lbl">Nhóm sản phẩm</span></a></li>
                <li><a href="<?php echo e(url('admin/taxonomy/product-vendor')); ?>"><span class="lbl">Nhà cung cấp</span></a></li>
                <li><a href="<?php echo e(url('admin/taxonomy/product-category')); ?>"><span class="lbl">Danh mục</span></a></li>
                <li><a href="<?php echo e(url('admin/taxonomy/product-tag')); ?>"><span class="lbl">Nhãn</span></a></li>
            </ul>
        </li>
        <li class="with-sub <?php echo e((Request::is('admin/order*') ? 'opened' : '')); ?>">
            <a href="javascript:;"><i class="font-icon material-icons md-20">add_shopping_cart</i><span class="lbl">Đơn hàng</span></a>
            <ul class="menu-child">
                <li><a href="<?php echo e(url('admin/order')); ?>"><span class="lbl">Danh sách đơn hàng</span></a></li>
                <li><a href="<?php echo e(url('admin/order/create')); ?>"><span class="lbl">Thêm mới</span></a></li>
                <li><a href="<?php echo e(url('admin/order/pending')); ?>"><span class="lbl">Giỏ hàng đang xử lý</span></a></li>
            </ul>
        </li>
        <li class="<?php echo e((Request::is('admin/discount*') ? 'opened' : '')); ?>">
            <a href="<?php echo e(url('admin/discount')); ?>"><i class="font-icon material-icons md-20">card_giftcard</i><span class="lbl">Khuyến mãi</span></a>
        </li>
        <li class="with-sub <?php echo e((Request::is('admin/customer*')  || Request::is('admin/taxonomy/customer-group*') ? 'opened' : '')); ?>">
            <a href="javascript:;"><i class="font-icon material-icons md-20">accessibility</i><span class="lbl">Khách hàng</span></a>
            <ul class="menu-child">
                <li><a href="<?php echo e(url('admin/customer')); ?>"><span class="lbl">Danh sách khách hàng</span></a></li>
                <li><a href="<?php echo e(url('admin/customer/create')); ?>"><span class="lbl">Thêm mới</span></a></li>
                <li><a href="<?php echo e(url('admin/taxonomy/customer-group')); ?>"><span class="lbl">Nhóm khách hàng</span></a></li>
            </ul>
        </li>
        <li class="menu-title">Website</li>
        <li class="with-sub <?php echo e((Request::is('admin/post*') || Request::is('admin/taxonomy/post-*') ? 'opened' : '')); ?>">
            <a href="javascript:;"><i class="font-icon material-icons md-20">receipt</i><span class="lbl">Bài viết</span></a>
            <ul class="menu-child">
                <li><a href="<?php echo e(url('admin/post')); ?>"><span class="lbl">Danh sách bài viết</span></a></li>
                <li><a href="<?php echo e(url('admin/post/create')); ?>"><span class="lbl">Thêm mới</span></a></li>
                <li><a href="<?php echo e(url('admin/taxonomy/post-category')); ?>"><span class="lbl">Danh mục</span><span class="label label-danger">35</span></a></li>
                <li><a href="<?php echo e(url('admin/taxonomy/post-tag')); ?>"><span class="lbl">Nhãn</span></a></li>
            </ul>
        </li>
        <li class="<?php echo e((Request::is('admin/page*') ? 'opened' : '')); ?>">
            <a href="<?php echo e(url('admin/page')); ?>"><i class="font-icon material-icons md-20">description</i><span class="lbl">Trang</span></a>
        </li>
        <?php if( !$hiddenMenu ): ?>
        <li class="<?php echo e((Request::is('admin/navigation*') ? 'opened' : '')); ?>">
            <a href="<?php echo e(url('admin/navigation')); ?>"><i class="font-icon material-icons md-20">dvr</i><span class="lbl">Menu</span></a>
        </li>
        <?php endif; ?>
        <li class="<?php echo e((Request::is('admin/widget*') ? 'opened' : '')); ?>">
            <a href="<?php echo e(url('admin/widget')); ?>"><i class="font-icon material-icons md-20">widgets</i><span class="lbl">Tiện ích</span></a>
        </li>
        <li class="<?php echo e((Request::is('admin/template*') ? 'opened' : '')); ?>">
            <a href="<?php echo e(url('admin/template')); ?>"><i class="font-icon material-icons md-20">view_compact</i><span class="lbl">Giao diện</span></a>
        </li>
        <li class="<?php echo e((Request::is('admin/setting/website') ? 'opened' : '')); ?>">
            <a href="<?php echo e(url('admin/setting/website')); ?>"><i class="font-icon material-icons md-20">settings</i><span class="lbl">Thiết lập</span></a>
        </li>
        <li class="<?php echo e((Request::is('admin/setting/domains') ? 'opened' : '')); ?>">
            <a href="<?php echo e(url('admin/setting/domains')); ?>"><i class="font-icon material-icons md-20">domain</i><span class="lbl">Tên miền</span></a>
        </li>
        <li class="menu-border"></li>        
        <li class="with-sub <?php echo e((Request::is('admin/setting*') ? 'opened' : '')); ?>">
            <a href="javascript:;"><i class="font-icon material-icons md-20">build</i><span class="lbl">Cấu hình</span></a>
            <ul class="menu-child">
                <li><a href="<?php echo e(url('admin/setting/general')); ?>"><span class="lbl">Chung</span></a></li>
           <!--      <li><a href="<?php echo e(url('admin/setting/seo')); ?>"><span class="lbl">SEO</span></a></li> -->
                <!-- <li><a href="<?php echo e(url('admin/setting/store')); ?>"><span class="lbl">Cửa hàng</span></a></li> -->
              <!--   <li><a href="<?php echo e(url('admin/setting/domain')); ?>"><span class="lbl">Tên miền</span></a></li> --><!-- 
                <li><a href="<?php echo e(url('admin/setting/image')); ?>"><span class="lbl">Hình ảnh</span></a></li> -->
                <li><a href="<?php echo e(url('admin/setting/shipping')); ?>"><span class="lbl">Vận chuyển</span></a></li>
                <li><a href="<?php echo e(url('admin/setting/checkout')); ?>"><span class="lbl">Thanh toán</span></a></li>
                <li><a href="<?php echo e(url('admin/setting/account')); ?>"><span class="lbl">Tài khoản</span></a></li>
                <li><a href="<?php echo e(url('admin/setting/locations')); ?>"><span class="lbl">Địa chỉ</span></a></li>
                <li><a href="<?php echo e(url('admin/setting/notifications')); ?>"><span class="lbl">Thông báo</span></a></li>
            </ul>
        </li>
        <li class="with-sub <?php echo e((Request::is('admin/user*') ? 'opened' : '')); ?>">
            <a href="javascript:;"><i class="font-icon material-icons md-20">supervisor_account</i><span class="lbl">Nhân viên</span></a>
            <ul class="menu-child">
            <?php $userCurrentLevel = Session::get('user_level'); ?>
            <?php if( $userCurrentLevel != 3 ): ?>
                <li><a href="<?php echo e(url('admin/user')); ?>"><span class="lbl">Danh sách nhân viên</span></a></li>
                <li><a href="<?php echo e(url('admin/user/create')); ?>"><span class="lbl">Thêm mới</span></a></li>
            <?php endif; ?>
                <li><a href="<?php echo e(url('admin/user/edit/'.Session::get('user_id'))); ?>"><span class="lbl">Thay đổi thông tin</span></a></li>
            </ul>
        </li>
        <li class="with-sub <?php echo e((Request::is('admin/attachment*') ? 'opened' : '')); ?>">
            <a href="javascript:;"><i class="font-icon material-icons md-20">cloud_upload</i><span class="lbl">Đính kèm</span></a>
            <ul class="menu-child">
                <li><a href="<?php echo e(url('admin/attachment')); ?>"><span class="lbl">Danh sách tập tin</span></a></li>
                <li><a href="<?php echo e(url('admin/attachment/create')); ?>"><span class="lbl">Thêm mới</span></a></li>
            </ul>
        </li>
        <li class="with-sub <?php echo e((Request::is('admin/plugin*') ? 'opened' : '')); ?>">
            <a href="javascript:;"><i class="font-icon material-icons md-20">apps</i><span class="lbl">Ứng dụng</span><span class="label label-danger">4</span></a>
            <ul class="menu-child">
                <li><a href="<?php echo e(url('admin/plugin')); ?>"><span class="lbl">Danh sách ứng dụng</span></a></li>
                <li><a href="<?php echo e(url('admin/plugin/create')); ?>"><span class="lbl">Thêm mới</span></a></li>
            </ul>
        </li>
        <!-- <li class="<?php echo e((Request::is('admin/ticket*') ? 'opened' : '')); ?>">
            <a href="#"><i class="font-icon material-icons md-20">question_answer</i><span class="lbl">Hỗ trợ</span></a>
        </li> -->
        <!-- <li class="with-sub <?php echo e(( ( Request::is('admin/report*') || Request::is('admin/turnover') ) ? 'opened' : '')); ?>">
            <a href="javascript:;"><i class="font-icon material-icons md-20">trending_up</i><span class="lbl">Báo cáo</span></a>
            <ul class="menu-child">
                <li><a href="<?php echo e(url('admin/report/statistic')); ?>"><span class="lbl">Truy cập website</span></a></li>
                <li><a href="#"><span class="lbl">Tồn kho sản phẩm</span></a></li>
                <li><a href="<?php echo e(url('admin/turnover')); ?>"><span class="lbl">Doanh thu bán hàng</span></a></li>
            </ul>
        </li> -->
    </ul>
</div>