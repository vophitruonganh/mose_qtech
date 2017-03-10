<div class="hom-slider">
            <div class="container">
               <div id="sequence">
                  <div class="sequence-prev"><i class="fa fa-angle-left"></i></div>
                  <div class="sequence-next"><i class="fa fa-angle-right"></i></div>
                  <ul class="sequence-canvas">
                     <?php $slider = isset($slider) ? $slider: []; ?>
                     <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                     <li class="animate-in">
                        <div class="flat-caption caption1 formLeft delay300 text-center"><span class="suphead"><?php echo $row['caption_1']; ?></span></div>
                        <div class="flat-caption caption2 formLeft delay400 text-center">
                           <h1><?php echo $row['caption_2']; ?></h1>
                        </div>
                        <div class="flat-caption caption3 formLeft delay500 text-center">
                           <?php echo $row['caption_3']; ?>

                        </div>
                        <div class="flat-button caption4 formLeft delay600 text-center"><a class="more" href="<?php echo e($row['url']); ?>">More Details</a></div>
                        <div class="flat-image formBottom delay200" data-duration="5" data-bottom="true"><img src="<?php echo e($row['image']); ?>" alt=""></div>
                     </li>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                    

                  </ul>
               </div>
            </div>
            <div class="promotion-banner">
               <div class="container">
                  <div class="row">
                     <?php $promotion_banner = isset($promotion_banner) ? $promotion_banner: []; ?>
                     <?php $__currentLoopData = $promotion_banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                     <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="promo-box"><img src="<?php echo e($row['image']); ?>" alt=""></div>
                     </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </div>
               </div>
            </div>
         </div>