<div class="slider-and-category-saidebar  menu-category">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <!-- SLIDER-AREA-START -->
                        <div class="slider-wrap">
                            <div class="owl_coverage">
                                <?php $slider = isset($slider) ? $slider: []; ?>
                                <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <div class="item_owl_coverage">
                                    <a href="<?php echo e($row['url']); ?>"><img src="<?php echo e($row['image']); ?>" width="100%"></a>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </div>
                        </div>
                        <!-- SLIDER-AREA-END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>