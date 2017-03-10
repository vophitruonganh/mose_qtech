<?php $__env->startSection('titlePage','Quản lý tên miền'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_text' => 'Quản lý tên miền',
    );
    $setion_heading = section_title($heading);
?>
    <div class="">
    <button class="" data-bind1="click: test.sl">tesst</button>
        <input type="text" data-bind1="change: test.cl" />
        <button class="" data-bind2="click: test.cl" data-bind1="click: test.cl">tesst</button>
    </div>
	<div class="section-setting">
		<div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
		<form action="<?php echo e(url('admin/setting/domains')); ?>" method="post" data-parsley-validate>
			<?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box-typical">
                <div class="box-heading box-heading-action box-heading-padding">
                    <h3>Danh sách tên miền</h3>
                    <p class="text-muted">Bạn có thể đổi tên miền vừa đăng ký hoặc xóa tên miền khỏi cửa hàng của bạn.</p>
                    <div class="heading-action">
                        <div class="dropdown-action dropdown-right">
                            <div class="dropdown">
                                <button class="btn btn-icon dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons md-20">more_vert</i></button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="javascript:;">Thêm tên miền</a>
                                    <a class="dropdown-item" href="javascript:;">Cập nhật tên miền</a>
                                    <a class="dropdown-item" href="javascript:;">Xóa tên miền</a>
                                    <a class="dropdown-item" href="javascript:;">Hướng dẫn cấu hình</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-typical-body">
                    <div class="product-list data-list data-table" data-bind="load: Table.SetCheckAll">
                        <table class="table table-nbg">
                            <thead>
                                <tr>
                                    <th class="col-1">Tên miền</th>       
                                    <th class="col-2 text-xs-center">Trạng thái</th>     
                                    <th class="col-3 text-xs-center">Tên miền chính <i class="material-icons md-16" data-toggle="tooltip" data-placement="top" title="Tên miền chính là tên miền được sử dụng cho khách hàng và công cụ tìm kiếm">help</i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-1"><span class="">store.moseplus.com</span></td>
                                    <td class="col-2 text-xs-center"><span class="label label-success">OK</span></td>
                                    <td class="col-3 text-xs-center"><span class="label label-success">Tên miền chính</span></td>
                                </tr>
                                <tr>
                                    <td class="col-1"><span class="">store.moseplus.com</span></td>
                                    <td class="col-2 text-xs-center"><span class="label label-default">Đang kiểm tra...</span></td>
                                    <td class="col-3 text-xs-center"><button type="button" class="btn btn-secondary btn-sm">Đặt làm tên miền chính</button></td>
                                </tr>
                                <tr>
                                    <td class="col-1"><span class="">store.moseplus.com</span></td>
                                    <td class="col-2 text-xs-center"><span class="label label-danger">Chưa cấu hình</span></td>
                                    <td class="col-3 text-xs-center"><button type="button" class="btn btn-secondary btn-sm">Đặt làm tên miền chính</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="box-typical-body">
                    <div class="product-list data-list data-table" data-bind="load: Table.SetCheckAll">
                        <table class="table table-nbg">
                            <thead>
                                <tr>
                                    <th class="col-1">Tên miền</th>       
                                    <th class="col-2 text-xs-center">Trạng thái</th>     
                                    <th class="col-3 text-xs-center">Tên miền chính <i class="material-icons md-16" data-toggle="tooltip" data-placement="top" title="Tên miền chính là tên miền được sử dụng cho khách hàng và công cụ tìm kiếm">help</i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $list_domain; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>

                                    <td class="col-1"><span class=""><?php echo e($value); ?></span></td>
                                    <td class="col-2 text-xs-center"><span class="label label-success">OK</span></td>
                                    <?php if($value==$primary_domain): ?>
                                    <td class="col-3 text-xs-center"><span class="label label-success">Tên miền chính</span></td>
                                    <?php else: ?>
                                    <td class="col-3 text-xs-center"><button type="button" class="btn btn-secondary btn-sm">Đặt làm tên miền chính</button></td>
                                    <?php endif; ?>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
		</form>
	</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>