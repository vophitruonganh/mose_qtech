<?php $__env->startSection('titlePage','Chỉnh sửa menu'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_link' => url("admin/navigation"),
        'heading_link_text' => 'Danh sách menu',
        'heading_text' => 'Chỉnh sửa',
        'heading_button' =>'<a class="btn btn-primary waves-effect" href="'.url('admin/navigation/create').'">Thêm mới menu</a>'
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-navigation">
        <div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
        <form id="navigation-form" action="<?php echo e(url('admin/navigation/edit/'.$slugMenuName)); ?>" method="post">
            <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="navigation-frame">
                <div class="navigation-widget">
                    <div class="widget widget-accordion" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">Danh mục bài viết <i class="font-icon material-icons">arrow_drop_down</i></a>
                            </div>
                            <div id="collapse-1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-1">
                                <div class="panel-collapse-in">
                                    <div class="taxonomy-list" data-type="post">
                                        <div class="tabs-panel">
                                            <ul class="taxonomy-checklist">
                                                <?php categoryInMenu($categoryPosts); ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary taxonomy-list-btn">Thêm vào menu</button>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">Tùy chỉnh menu <i class="font-icon material-icons">arrow_drop_down</i></a>
                            </div>
                            <div id="collapse-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-2">
                                <div class="panel-collapse-in">
                                    <div class="form-group">
                                        <input type="text" placeholder="http://" class="form-control custom-url" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Tên đường dẫn" class="form-control custom-name" />
                                    </div>
                                    <button type="button" class="btn btn-secondary taxonomy-list-btn">Thêm vào menu</button>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">Danh mục sản phẩm <i class="font-icon material-icons">arrow_drop_down</i></a>
                            </div>
                            <div id="collapse-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-3">
                                <div class="panel-collapse-in">
                                    <div class="taxonomy-list" data-type="product">
                                        <div class="tabs-panel">
                                            <ul class="taxonomy-checklist">
                                                <?php categoryInMenu($categoryProducts,'product_category'); ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary taxonomy-list-btn">Thêm vào menu</button>
                                </div>
                            </div>
                        </div>
                        <?php if( count($pages) > 0 ): ?>
                        <div class="panel">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">Trang <i class="font-icon material-icons">arrow_drop_down</i></a>
                            </div>
                            <div id="collapse-4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-4">
                                <div class="panel-collapse-in">
                                    <div class="taxonomy-list" data-type="page">
                                        <div class="tabs-panel">
                                            <ul class="taxonomy-checklist">
                                                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <li data-id="<?php echo e($page->post_id); ?>" data-text="<?php echo e($page->post_title); ?>"><label><input type="checkbox" name="page[]" value="<?php echo e($page->post_id); ?>"><?php echo e($page->post_title); ?></label></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary taxonomy-list-btn">Thêm vào menu</button>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="navigation-menu">
                    <div class="box-typical">
                        <div class="box-typical-header box-typical-header-bordered b-t-p">
                            <div class="list-nav clearfix">
                                <div class="navigation-actions">
                                    <input id="menu-title" name="title" class="form-control" placeholder="Tên menu" value="<?php echo e($menuName); ?>" />
                                    <input type="hidden" id="menu-slug" name="slug" value="<?php echo e($slugMenuName); ?>" />
                                    <select name="select_index" id="select_index" class="form-control">
                                        <option value="0">Chưa xác định</option>
                                        <?php $__currentLoopData = $registerNavigation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo e($key); ?>" <?php if( $key == $position ): ?>selected="selected"<?php endif; ?> ><?php echo e($value); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>;
                                    </select>
                                    <button id="navigation-submit-btn" type="submit" class="btn btn-primary">Cập nhật</button>
                                    <a href="<?php echo e(url('admin/navigation/delete/'.$slugMenuName)); ?>" class="btn btn-link text-danger"><span class="font-icon dashicons dashicons-trash"></span>Xóa menu</a>
                                </div>
                            </div>
                        </div>
                        <div class="box-typical-body b-t-p">
                            <div class="navigation-instructions">
                                <ol class="menu-sortable"><?php echo navigation_load($menuData); ?></ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>