<div class="footer-top-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12 col-lg-8 col-md-8">
                <div class="about_us">
                    <img src="<?php echo e($about['image']); ?>" alt="GỬI MAIL NHẬN TIN" />
                    <h2><span><?php echo e($about['heading']); ?></span></h2>
                    <p><?php echo e($about['content']); ?></p>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12 col-lg-4 col-md-4 about_us">
                <h2><span><?php echo e($social['heading']); ?></span></h2>
                <div class="social-media">
                    <ul>
                        <?php unset($social['heading']); ?>
                        <?php $__currentLoopData = $social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li>
                            <a class="color-tooltip <?php echo e($row['class1']); ?>" target="_blank" href="<?php echo e($row['url']); ?>" data-toggle="tooltip" title="<?php echo e($row['title']); ?>">
                            <i class="fa <?php echo e($row['class2']); ?>"></i>
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>