<?php $__env->startSection('titlePage','Danh sách đơn hàng'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_text' => 'Danh sách đơn hàng',
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/order/create').'">Thêm mới đơn hàng</a>',
    );
    $setion_heading = section_title($heading);
?>
    <div id="section-order">
        <div class="form-alerts"></div>
        <form id="order-form" action="<?php echo e(url('admin/order')); ?>" method="post">
            <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <input type="hidden" name="order_status" id="order_status" value="<?php echo e($order_status); ?>"></input>
            <input type="hidden" id="customer_id" name="customer_id" value="<?php echo e($customer_id); ?>"></input>
            <div class="box-typical">
                <div class="box-typical-header box-typical-header-bordered b-t-p">
                    <div class="form-inline nav-action clearfix">
                        <div class="pull-md-left">
                            <div class="form-group">
                                <select name="order_status" id="action_status" class="form-control" data-bind="change: Table.ActionChange, change: Table.StatusChange">
                                    <?php if($order_count['all'] > 0): ?><option <?php if($order_status =='all'): ?>selected="selected" <?php endif; ?> value="all" data-url="<?php echo e(url('admin/order?order_status=all')); ?>">Tất cả <span class="count">(<?php echo e($order_count['all']); ?>)</span></option><?php endif; ?>
                                    <?php if($order_count['paid'] > 0): ?><option <?php if($order_status =='0'): ?>selected="selected" <?php endif; ?>  value="0" data-url="<?php echo e(url('admin/order?order_status=0')); ?>">Đã thanh toán <span class="count">(<?php echo e($order_count['paid']); ?>)</span></option><?php endif; ?>
                                    <?php if($order_count['pending'] > 0): ?><option <?php if($order_status =='1'): ?>selected="selected" <?php endif; ?>  value="1" data-url="<?php echo e(url('admin/order?order_status=1')); ?>">Chưa thanh toán <span class="count">(<?php echo e($order_count['pending']); ?>)</span></option><?php endif; ?>
                                    <?php if($order_count['draft'] > 0): ?><option <?php if($order_status =='3'): ?>selected="selected" <?php endif; ?>  value="3" data-url="<?php echo e(url('admin/order?order_status=3')); ?>">Nháp <span class="count">(<?php echo e($order_count['draft']); ?>)</span></option><?php endif; ?>
                                    <?php if($order_count['trash'] > 0): ?><option <?php if($order_status =='2'): ?>selected="selected" <?php endif; ?>  value="2" data-url="<?php echo e(url('admin/order?order_status=2')); ?>">Xóa <span class="count">(<?php echo e($order_count['trash']); ?>)</span></option><?php endif; ?>
                                </select>
                            </div>
                              <?php
                                $arr=array();
                                if($order_status == 'trash'){
                                    $arr=array('restore'=> 'Khôi phục','delete'=>'Xóa vĩnh viễn');
                                }
                            ?>
                            <?php echo tableActionForm($arr,'','','click: Order.TableAction'); ?>

                        </div>
                        <?php echo tableSearchForm($search,'<div class="pull-md-right">','</div>','click: Order.TableSearch'); ?>

                    </div>
                </div>

                <div class="box-typical-body">
                    <div class="order-list data-list data-table">
                        <?php echo $__env->make('backend.pages.store.order.listViewOrder', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
        </form>    
    </div>
    <?php echo pagination($list_order,$pagination); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>