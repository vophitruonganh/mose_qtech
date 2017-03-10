<?php $__env->startSection('titlePage','Thêm mới menu'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_link' => url("admin/navigation"),
        'heading_link_text' => 'Danh sách menu',
        'heading_text' => 'Thêm mới',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-navigation">
        <div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
        <form action="<?php echo e(url('admin/navigation/create')); ?>" method="post">
            <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="navigation-frame">
                <div class="navigation-widget">
                    <div class="widget widget-accordion" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="widget-item">
                            <div class="widget-item-heading" role="tab" id="headingOne">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">Danh mục bài viết <i class="font-icon material-icons">arrow_drop_down</i></a>
                            </div>
                            <div id="collapse-1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-1">
                                <div class="collapse-in" data-type="post">
                                    <div class="taxonomy-list m-b-1">
                                        <div class="tabs-panel">
                                            <ul class="taxonomy-checklist">
                                                <?php categoryInMenu($categoryPosts); ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-bind="click: Website.Navigation.AddItem">Thêm vào menu</button>
                                </div>
                            </div>
                        </div>
                        <div class="widget-item">
                            <div class="widget-item-heading" role="tab" id="headingOne">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">Tùy chỉnh menu <i class="font-icon material-icons">arrow_drop_down</i></a>
                            </div>
                            <div id="collapse-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-2">
                                <div class="collapse-in" data-type="custom">
                                    <div class="form-group">
                                        <input type="text" placeholder="http://" class="form-control custom-url" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Tên đường dẫn" class="form-control custom-name" />
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-bind="click: Website.Navigation.AddItem">Thêm vào menu</button>
                                </div>
                            </div>
                        </div>
                        <div class="widget-item">
                            <div class="widget-item-heading" role="tab" id="headingTwo">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">Danh mục sản phẩm <i class="font-icon material-icons">arrow_drop_down</i></a>
                            </div>
                            <div id="collapse-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-3">
                                <div class="collapse-in" data-type="product">
                                    <div class="taxonomy-list m-b-1">
                                        <div class="tabs-panel">
                                            <ul class="taxonomy-checklist">
                                                <?php categoryInMenu($categoryProducts,'product_category'); ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-bind="click: Website.Navigation.AddItem">Thêm vào menu</button>
                                </div>
                            </div>
                        </div>
                        <?php if( count($pages) > 0 ): ?>
                        <div class="widget-item">
                            <div class="widget-item-heading" role="tab" id="headingThree">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">Trang <i class="font-icon material-icons">arrow_drop_down</i></a>
                            </div>
                            <div id="collapse-4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-4">
                                <div class="collapse-in" data-type="page">
                                    <div class="taxonomy-list m-b-1">
                                        <div class="tabs-panel">
                                            <ul class="taxonomy-checklist">
                                                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <li data-id="<?php echo e($page->post_id); ?>" data-text="<?php echo e($page->post_title); ?>"><input id="page-<?php echo e($page->post_id); ?>" type="checkbox" class="filled-in" value="<?php echo e($page->post_id); ?>"><label for="page-<?php echo e($page->post_id); ?>"><?php echo e($page->post_title); ?></label></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-bind="click: Website.Navigation.AddItem">Thêm vào menu</button>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="navigation-menu">
                    <div class="box-typical">
                        <div class="box-typical-header box-typical-header-bordered">
                            <div class="list-nav clearfix">
                                <div class="navigation-actions">
                                    <input id="menu-title" name="title" class="form-control" placeholder="Tên menu" value="" />
                                    <select name="select_index" id="select_index" class="form-control">
                                        <option selected="selected" value="0">Chưa xác định</option>
                                        <?php $__currentLoopData = $registerNavigation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>;
                                    </select>
                                    <button id="navigation-submit-btn" type="submit" class="btn btn-primary" data-bind="click: Website.Navigation.SubmitItem">Thêm mới</button>
                                </div>
                            </div>
                        </div>
                        <div class="box-body box-body-padding">
                            <div class="navigation-instructions">
                                <ol class="menu-sortable" data-bind="load: Website.Navigation.SortableItem, load: Website.Navigation.EditItem, load: Website.Navigation.RemoveItem"></ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>