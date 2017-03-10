<?php $__env->startSection('titlePage','Danh sách khách hàng'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_text' => 'Danh sách khách hàng',
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/customer/create').'">Thêm mới</a>',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-customer mode-list">
        <div class="form-alerts"></div>
        <form id="customer-form" action="<?php echo e(url('admin/customer')); ?>" method="post" data-bind="form: disable">
            <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box-typical">
                <div class="box-typical-header box-typical-header-bordered b-t-p">
                    <div class="form-inline nav-action">
                        <div class="pull-md-left">
                            <?php echo tableActionForm('','','','click: Table.Action'); ?>

                        </div>
                        <?php echo tableSearchForm($search,'<div class="pull-md-right">','</div>','click: Customer.TableSearch'); ?>

                    </div>
                </div>
                <div class="box-typical-body">
                    <div class="customer-list data-list data-table" data-bind="load: Table.SetCheckAll">
                        <?php echo $__env->make('backend.pages.store.customer.listViewCustomer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php echo pagination($customers,$pagination); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>