<?php $__env->startSection('titlePage','Danh sách khuyến mãi'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_text' => 'Danh sách khuyến mãi',
        'heading_button' => '<a class="btn btn-primary" href="'.url('admin/discount/create').'">Thêm mới khuyến mãi</a>',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-discount">
        <div class="form-alerts"></div>
        <form id="discount-form" action="<?php echo e(url('admin/discount')); ?>" method="post">
            <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box-typical">
                <div class="box-typical-header box-typical-header-bordered b-t-p">
                    <div class="form-inline nav-action">
                        <div class="pull-md-left">
                            <div class="form-group">
                                <?php if( $discountCount['all'] > 0 ): ?>
                                <select name="discount_status" id="action_status" class="form-control" data-bind="change: Table.StatusChange">
                                    <option <?php if($actionStatus=='all'): ?> selected="selected" <?php endif; ?> value="all">Tất cả <span class="count">(<?php echo e($discountCount['all']); ?>)</span></option>
                                    <?php if( $discountCount['activated'] > 0 ): ?> <option <?php if( $actionStatus == 'active' ): ?> selected="selected" <?php endif; ?> value="active">Đã kích hoạt <span class="count">(<?php echo e($discountCount['activated']); ?>)</span></option> <?php endif; ?>
                                    <?php if( $discountCount['not_activated'] > 0 ): ?> <option <?php if( $actionStatus == 'deactive' ): ?> selected="selected" <?php endif; ?> value="deactive">Chưa kích hoạt <span class="count">(<?php echo e($discountCount['not_activated']); ?>)</span></option> <?php endif; ?>
                                    <?php if( $discountCount['waiting'] > 0 ): ?> <option <?php if( $actionStatus == 'waiting' ): ?> selected="selected" <?php endif; ?> value="waiting">Tạm ngưng <span class="count">(<?php echo e($discountCount['waiting']); ?>)</span></option> <?php endif; ?>
                                    <?php if( $discountCount['expired'] > 0 ): ?> <option <?php if( $actionStatus == 'expired' ): ?> selected="selected" <?php endif; ?> value="expired">Hết hạn <span class="count">(<?php echo e($discountCount['expired']); ?>)</span></option> <?php endif; ?>
                                </select>
                                <?php endif; ?>
                            </div>
                            <?php
                                $arr = array('active'=> 'Sử dụng khuyến mãi','deactive'=> 'Ngừng khuyến mãi','trash'=>'Xóa')
                            ?>
                            <?php echo tableActionForm($arr,'','','click: Table.Action'); ?>

                        </div>
                        <?php echo tableSearchForm($search,'<div class="pull-md-right">','</div>','click: Discount.TableSearch'); ?>

                    </div>
                </div>
                <div class="box-typical-body">
                    <div class="discount-list data-list data-table" data-bind="load: Table.SetCheckAll, load: Discount.Detail">
                        <?php echo $__env->make('backend.pages.store.discount.listViewDiscount', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php echo pagination($discounts,$pagination); ?>

    <script>
        // $(document).ready(function(){
        //     $(document).on('change','#action_status',function(){
        //         this.form.submit();
        //     });
        // });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>