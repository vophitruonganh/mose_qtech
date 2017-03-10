<?php $__env->startSection('titlePage','Danh sách sản phẩm'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_text' => 'Danh sách sản phẩm',
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/product/create').'">Thêm mới sản phẩm</a>',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-product">
        <div class="form-alerts"></div>
        <form id="product-form" action="<?php echo e(url('admin/product')); ?>" method="post" data-bind="form: disable">
            <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box-typical">
                <div class="box-typical-header box-typical-header-bordered b-t-p">
                    <div class="form-inline nav-action clearfix">
                        <div class="pull-md-left">
                            <?php if($product_count['all'] > 0 || $product_count['trash'] > 0): ?>
                            <div class="form-group">
                                <select name="product_status" id="action_status" class="form-control" data-bind="change: Table.ActionChange, change: Table.StatusChange">
                                    <?php if($product_count['all'] > 0): ?><option <?php if($product_status=='all'): ?> selected="selected" <?php endif; ?> value="all">Tất cả (<?php echo e($product_count['all']); ?>)</option><?php endif; ?>
                                    <?php if($product_count['public'] > 0): ?><option <?php if($product_status=='public'): ?> selected="selected" <?php endif; ?> value="public">Công khai (<?php echo e($product_count['public']); ?>)</option><?php endif; ?>
                                    <?php if($product_count['pending'] > 0): ?><option <?php if($product_status=='pending'): ?> selected="selected" <?php endif; ?> value="pending">Đang chờ duyệt (<?php echo e($product_count['pending']); ?>)</option><?php endif; ?>
                                    <?php if($product_count['draft'] > 0): ?><option <?php if($product_status=='draft'): ?> selected="selected" <?php endif; ?> value="draft">Nháp (<?php echo e($product_count['draft']); ?>)</option><?php endif; ?>
                                    <?php if($product_count['trash'] > 0): ?><option <?php if($product_status=='trash'): ?> selected="selected" <?php endif; ?>  value="trash">Xóa (<?php echo e($product_count['trash']); ?>)</option><?php endif; ?>
                                </select>
                            </div>
                            <?php endif; ?>
                             <?php
                                $arr=array();
                                if($product_status == 'trash'){
                                    $arr=array('restore'=> 'Khôi phục','delete'=>'Xóa vĩnh viễn');
                                }
                            ?>
                            <?php echo tableActionForm($arr,'','','click: Table.Action'); ?>

                        </div>
                        <?php echo tableSearchForm($search,'<div class="pull-md-right">','</div>','click: Product.TableSearch'); ?>


                    </div>
                </div>
                <div class="box-typical-body">
                    <div class="product-list data-list data-table" data-bind="load: Table.SetCheckAll">
                        <?php echo $__env->make('backend.pages.store.product.listViewProduct', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
     <?php echo pagination($products,$pagination); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>