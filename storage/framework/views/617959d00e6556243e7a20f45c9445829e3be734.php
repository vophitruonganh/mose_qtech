  <!-- SPECIAL VERSION 1 -->
  <div class="flexslider">
    <ul class="slides">

    <?php $slider = isset($slider) ? $slider: []; ?>
      <!-- FLEXSLIDER SLIDE -->
      <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <li style="background-image: url(<?php echo e($row['image']); ?>); min-height: 560px">
        <div class="container">
          <div class="row">
            <div class="col-sm-4 col-sm-offset-6">
              <br><br><br><br><br><br><br>

              <div class="calltoaction-box  text-center">
                <h4 class="strong-header"><?php echo e($row['header']); ?></h4>
                <p><?php echo $row['content']; ?></p>
                <a href="<?php echo e($row['url']); ?>" class="btn btn-primary">Shop now</a>
              </div>
            </div>
          </div>
        </div>
      </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

    </ul>
    <div class="flexslider-full-width-controls-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="flexslider-full-width-controls"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- !FLEXSLIDER -->