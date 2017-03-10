<?php $__env->startSection('titlePage','Chỉnh sửa '.$data_arr['tax_name']); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_link' => url("admin/taxonomy/".$data_arr['tax_slug'].""),
        'heading_link_text' => $data_arr['section_title'],
        'heading_text' => 'Chỉnh sửa',
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/taxonomy/'.$data_arr['tax_slug'].'/create').'">Thêm mới '.$data_arr['tax_name'].'</a>'
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-taxonomy">
        <div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
        <form id="taxonomy-form" action="<?php echo e(url('admin/taxonomy/'.$data_arr['tax_slug'].'/edit/'.$tax->taxonomy_id)); ?>" method="post">
            <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box-typical b-t-p b-t-m">
                <?php if(isset($data_arr['edit_view']['title'])): ?>
                <div class="form-group">
                    <label><?php echo e($data_arr['edit_view']['title']); ?></label>
                    <input type="text" name="name" class="form-control meta-title" value="<?php echo e(old('name',$tax->taxonomy_name)); ?>" />
                </div>
                <?php endif; ?>
                <?php if(isset($data_arr['edit_view']['slug'])): ?>
                <div class="form-group">
                    <label><?php echo e($data_arr['edit_view']['slug']); ?></label>
                    <input type="text" name="slug" class="form-control" value="<?php echo e(old('slug',$tax->taxonomy_slug)); ?>" />
                </div>
                <?php endif; ?>
                <?php if($data_arr['tax_level'] == '1'): ?>
                    <?php if(isset($data_arr['edit_view']['level'])): ?>
                    <div class="form-group">
                        <label><?php echo e($data_arr['edit_view']['level']); ?></label>
                        <select name="parent" class="form-control">
                            <option value="0">— Chọn danh mục —</option>
                            <?php if($parent): ?>
                                <?php echo e(taxonomy_list($parent,0,"",old('parent',$tax->taxonomy_parent))); ?>

                            <?php endif; ?>
                        </select>
                    </div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(isset($data_arr['edit_view']['excerpt'])): ?>
                <div class="form-group">
                    <label for="excerpt"><?php echo e($data_arr['edit_view']['excerpt']); ?></label>
                    <textarea rows="5" class="form-control meta-description" name="excerpt"><?php echo e(old('excerpt',$tax->taxonomy_excerpt)); ?></textarea>
                </div>
                <?php endif; ?>
                <button type="submit" class="btn btn-primary waves-effect" data-bind="click: Taxonomy.Submit">Cập nhật</button>
                <a href="<?php echo e(url('admin/taxonomy/'.$data_arr['tax_slug'].'/delete/'.$tax->taxonomy_id)); ?>" class="btn btn-link text-danger">Xóa <?php echo e($data_arr['tax_name']); ?></a>
            </div>            
            <?php if(isset($data_arr['edit_view']['seo'])): ?>
                <?php if($data_arr['edit_view']['seo'] ==  true): ?>
                    <?php echo seo_content($seo_data); ?>

                <?php endif; ?>
            <?php endif; ?>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>