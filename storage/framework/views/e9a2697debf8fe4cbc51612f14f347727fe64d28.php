<?php $__env->startSection('titlePage','Chỉnh sửa menu'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_link' => url("admin/navigation"),
        'heading_link_text' => 'Danh sách menu',
        'heading_text' => 'Chỉnh sửa',
        'heading_button' =>'<a class="btn btn-primary waves-effect" href="'.url('admin/navigation/create').'">Thêm mới</a>'
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-navigation">
        <div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
        <form action="<?php echo e(url('admin/navigation/edit/'.$slugMenuName)); ?>" method="post">
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
                        <div class="box-typical-header box-typical-header-bordered b-t-p">
                            <div class="input-group">
                                     
                                    <input id="menu-title" name="title" class="form-control" placeholder="Tên menu" value="<?php echo e($menuName); ?>" />
                                    <input type="hidden" name="slug" value="<?php echo e($slugMenuName); ?>" />
                                    <div class="input-group-btn" data-bind="load: Website.Navigation.SetItem">
                                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php if($position): ?> <?php if(isset($registerNavigation[$position])): ?> <?php echo e($registerNavigation[$position]); ?> <?php endif; ?> <?php else: ?> Chưa xác định <?php endif; ?></button>
                                        <input type="hidden" name="menu" value="<?php echo e($position); ?>" />
                                        <div class="dropdown-menu dropdown-menu-item">
                                            <?php if($position): ?> <a class="dropdown-item" href="javascript:;" data-value="0">Chưa xác định</a> <?php endif; ?>
                                            <?php $__currentLoopData = $registerNavigation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php if( $key !== $position ): ?><a class="dropdown-item" href="javascript:;" data-value="<?php echo e($key); ?>"><?php echo e($value); ?></a><?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </div>
                                    </div>
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-primary waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thao tác</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:;" data-bind="click: Website.Navigation.SubmitItem">Cập nhật</a>
                                            <a class="dropdown-item" href="<?php echo e(url('admin/navigation/delete/'.$slugMenuName)); ?>">Xóa</a>
                                        </div>
                                    </div>
                                   <!--  <div class="input-group-addon">


                                    <select name="select_index" id="select_index" class="form-control" data-plugin="select2">
                                        <option value="0">Chưa xác định</option>
                                        <?php $__currentLoopData = $registerNavigation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo e($key); ?>" <?php if( $key == $position ): ?>selected="selected"<?php endif; ?> ><?php echo e($value); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                    </div> -->
                            </div>
                     
                     
                        </div>
                        <div class="box-body box-body-padding">
                            <div class="navigation-instructions">
                                <ol class="menu-sortable" data-bind="load: Website.Navigation.SortableItem, load: Website.Navigation.EditItem, load: Website.Navigation.RemoveItem"><?php echo navigation_load($menuData); ?></ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>