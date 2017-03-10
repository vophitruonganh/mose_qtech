<?php $__env->startSection('titlePage','Cấu hình tài khoản'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_text' => 'Cấu hình tài khoản'
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-setting">
        <div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
        <form action="<?php echo e(url('admin/setting/account')); ?>" method="post">
            <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="section-group">
                <div class="row">
                    <div class="section-group-heading col-lg-3">
                        <h4>Trải nghiệm</h4>
                        <p>Xem chi tiết gói dịch vụ đang sử dụng tại đây.</p>
                    </div>
                    <div class="section-group-body col-lg-9">
                        <div class="box-typical b-t-p">
                            <div class="form-group">
                                <label>Dung lượng lưu trữ (ở mục File): <strong>0 Bytes</strong> / <span class="text-muted">1 GB</span></label>
                                <div class="storage"><span class="storage-used" style="width: 2%;"></span></div>
                            </div>
                            <div class="plan row font-lg-size">
                                <div class="col-md-3">
                                    <p class="title">Ngày bắt đầu</p>
                                    <p class="desc"><?php echo e(date('d/m/Y',$dateStartUsingWebsite)); ?></p>
                                </div>
                                <div class="col-md-3">
                                    <p class="title">Ngày hết hạn</p>
                                    <p class="desc"><?php echo e(date('d/m/Y',$dateStartUsingWebsite + 1209600)); ?></p>
                                </div>
                                <div class="col-md-3">
                                    <p class="title">Gói đang sử dụng</p>
                                    <p class="desc">Thử nghiệm</p>
                                </div>
                                <div class="col-md-3">
                                    <p class="title">Tình trạng tài khoản</p>
                                    <p class="desc">Đang hoạt động</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-group">
                <div class="row">
                    <div class="section-group-heading col-lg-3">
                        <h4>Tài khoản quản trị</h4>
                        <p>Bạn có thể cấp quyền quản lý website cửa hàng cho người khác.</p>
                    </div>
                    <div class="section-group-body col-lg-9">
                        <div class="box-typical">
                            <div class="box-typical-header box-typical-header-bordered b-t-p">
                                <div class="form-inline nav-action clearfix">
                                    <div class="form-group">
                                        <a href="<?php echo e(url('admin/setting/account/create')); ?>" class="btn btn-secondary">Thêm quản trị viên</a>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-secondary" data-bind="click: Setting.StopSessionAll">Chấm dứt các phiên đăng nhập</button>
                                    </div>
                                </div>
                            </div>
                            <div class="box-typical-body">
                                <div class="data-table data-table">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Tên</th>
                                                <th>Địa chỉ email</th>
                                                <th>Quyền hạn</th>
                                                <th>Đăng nhập cuối</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <tr>
                                                <td><div class="title-link"><a href="<?php echo e(url('admin/setting/account/edit/'.$user->user_id)); ?>"><?php echo e($user->user_fullname); ?></a></div></td>
                                                <td><?php echo e($user->user_email); ?></td>
                                                <td><?php if($user->user_level == 1): ?> Chủ tài khoản <?php else: ?> Toàn quyền truy cập <?php endif; ?></td>
                                                <td>Không tìm thấy lượt đăng nhập</td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>