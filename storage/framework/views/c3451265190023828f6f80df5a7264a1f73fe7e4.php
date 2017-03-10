<?php $__env->startSection('titlePage',$data_arr['section_title']); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_text' => $data_arr['section_title'],
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/taxonomy/'.$data_arr['tax_slug'].'/create').'">Thêm mới '.$data_arr['tax_name'].'</a>',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-taxonomy">
        <div class="form-alerts"></div>
        <form id="taxonomy-form" action="<?php echo e(url('admin/taxonomy/'.$data_arr['tax_slug'])); ?>" method="post" data-bind="form: disable">
            <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box-typical">
                <div class="box-typical-header box-typical-header-bordered b-t-p">
                    <div class="form-inline nav-action">
                        <div class="pull-md-left">
                            <?php echo tableActionForm('','','','click: Table.Action'); ?>

                        </div>
                        <?php echo tableSearchForm($search,'<div class="pull-md-right">','</div>','click: Taxonomy.TableSearch'); ?>

                    </div>
                </div>
                <div class="box-typical-body">
                    <div class="taxonomy-list data-list data-table" data-bind="load: Table.SetCheckAll">
                        <?php echo $__env->make('backend.pages.taxonomy.listViewTaxonomy', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php echo pagination($taxonomy,$pagination); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>