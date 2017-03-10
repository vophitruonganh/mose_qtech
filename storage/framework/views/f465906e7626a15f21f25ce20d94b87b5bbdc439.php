<?php $__env->startSection('titlePage','Danh sách tập tin'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_text' => 'Danh sách tập tin',
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/attachment/create').'">Thêm mới tập tin</a>',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-attachment">
        <div class="form-alerts"></div>
        <form id="attachment-form" action="<?php echo e(url('admin/attachment')); ?>" method="post" data-bind="form: disable">
            <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box-typical">
                <div class="box-typical-header box-typical-header-bordered b-t-p">
                    <div class="form-inline nav-action" data-bind="load: Attachment.VSSelect">
                        <div class="pull-md-left">
                            <div class="form-group">
                                <div class="view-switch">
                                    <a href="javascript:;" class="view-item view-list <?php if( $mode == 'list' ): ?> current <?php endif; ?>" data-layout="list" data-bind="click: Attachment.ViewSwitch"><label class="sr-only">List View</label><i class="font-icon material-icons">list</i></a>
                                    <a href="javascript:;" class="view-item view-grid <?php if( $mode !== 'list' ): ?> current <?php endif; ?>" data-layout="grid" data-bind="click: Attachment.ViewSwitch"><label class="sr-only">Grid View</label><i class="font-icon material-icons">view_module</i></a>
                                </div>
                            </div>
                            <?php echo tableActionForm('','','','click: Attachment.TableAction'); ?>

                        </div>
                        <?php echo tableSearchForm($search,'<div class="pull-md-right">','</div>','click: Attachment.TableSearch'); ?>

                    </div>
                </div>
                <div class="box-typical-body">
                    <div class="attachment-list data-list data-table" data-bind="load: Table.SetCheckAll, load: Attachment.DeleteGrid">
                        <?php if( $mode == 'list' ): ?>
                            <?php echo $__env->make('backend.pages.attachment.viewListAttachment', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php else: ?>
                            <?php echo $__env->make('backend.pages.attachment.viewGridAttachment', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php echo pagination($attachments,$pagination); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>