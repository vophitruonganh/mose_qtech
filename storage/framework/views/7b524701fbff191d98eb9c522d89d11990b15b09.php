<!-- CATEGORY-SIDEBAR-START -->
<div class="menu_index_left side_collection">

        <!-- Widget 7 -->
        <?php $list_tax = get_taxonomy_product('product_category') ?>
        <?php if($list_tax): ?>
        <h2 class="menu_title icon_title_1">
            Danh Mục Sản Phẩm
            <div class="show_nav_bar1 hidden-lg hidden-md"><i class="fa fa-bars"></i></div>
        </h2>
        <ul class="menu_index_lv1 show1">
            <?php $__currentLoopData = $list_tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <li class="li_lv1  icon1"><a href="<?php echo e(url('collections/'.$tax->taxonomy_slug)); ?>"><?php echo e($tax->taxonomy_name); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </ul>
        <?php endif; ?>
        <!-- End Widget 7 -->
</div>
<!-- CATEGORY-SIDEBAR-END -->
<!-- CATEGORY-SIDEBAR-START -->
<div class="menu_index_left menu_index2_left side_collection">
        <!-- Widget 8 -->
        <div class="menu_index_left menu_index2_left">
        <?php $list_tax = get_taxonomy_product('product_group') ?>
        <?php if($list_tax): ?>
        <h2 class="menu_title icon_title_2">
            Nhóm sản phẩm
            <div class="show_nav_bar2 hidden-lg hidden-md"><i class="fa fa-bars"></i></div>
        </h2>
        <ul class="menu_index_lv1 show2">
            <?php $__currentLoopData = $list_tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <li class="li_lv1  icon1"><a href="<?php echo e(url('collections/'.$tax->taxonomy_slug)); ?>"><?php echo e($tax->taxonomy_name); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </ul>
        <!--
        <div class="banner_tab_left hidden-xs hidden-sm">
            <a href="https://">
            <img alt="Office 365" src="images/layer-21.jpg?1459504100932" />
            </a>
        </div>
        -->
        <?php endif; ?>
        </div>
        <!-- End Widget 8 -->
</div>
<!-- CATEGORY-SIDEBAR-END -->