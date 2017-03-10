<?php $__env->startSection('titlePage','Quản lý tên miền'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_text' => 'Quản lý tên miền',
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/setting/domains/create').'">Thêm mới tên miền</a>',
    );
    $setion_heading = section_title($heading);
?>
	<div class="section-setting">
		<div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
		<form action="<?php echo e(url('admin/setting/domains')); ?>" method="post" data-parsley-validate>
			<?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box-typical">
                <div class="box-typical-header box-typical-header-bordered b-t-p">
                    <div class="heading">
                        <h3>Danh sách tên miền</h3>
                        <p class="text-muted">Bạn có thể đổi tên miền vừa đăng ký hoặc xóa tên miền khỏi cửa hàng của bạn.</p>
                    </div>
                </div>
                <div class="box-typical-body">
                    <div class="product-list data-list data-table" data-bind="load: Table.SetCheckAll">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="col-2">Tên miền</th>       
                                    <th class="col-3 text-xs-center">Trạng thái</th>     
                                    <th class="col-4 text-xs-center">Tên miền chính <i class="material-icons md-16" data-toggle="tooltip" data-placement="top" title="Tên miền chính là tên miền được sử dụng cho khách hàng và công cụ tìm kiếm">help</i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-2"><div class="primary-text">store.moseplus.com</div></td>
                                    <td class="col-3 text-xs-center"><div class="primary-text"><i class="font-icon material-icons md-18">check</i> OK</div></td>
                                    <td class="col-3 text-xs-center"><div class="primary-text"><i class="font-icon material-icons md-18">check</i> Tên miền chính</div></td>
                                </tr>
                                <tr>
                                    <td class="col-2"><div class="primary-text">storemoseplus.com</div></td>
                                    <td class="col-3 text-xs-center">Đang kiểm tra...</td>
                                    <td class="col-3 text-xs-center"><div class="primary-text"><a href="">Đặt làm tên miền chính</a></div></td>
                                </tr>
                                <tr>
                                    <td class="col-2"><div class="primary-text">storemoseplus.com</div></td>
                                    <td class="col-3 text-xs-center"><a href="">Chưa cấu hình</a></td>
                                    <td class="col-3 text-xs-center"><a href="" data-bind="click: Setting.DomainPrimary">Đặt làm tên miền chính</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
		</form>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>