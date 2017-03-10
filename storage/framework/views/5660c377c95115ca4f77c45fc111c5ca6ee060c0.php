<?php $__env->startSection('content'); ?>
<div id="blog" class="mt60">
   <div class="container">
      <h1><?php echo e($slug_name); ?></h1>
      <div class="row clearfix">
         <div class="col-md-9 blog-container">
            <div class="row clearfix">
	            <?php if(count($dataNews)>0): ?>
	            	<?php $__currentLoopData = $dataNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	            	<?php
	            		$username = (!empty($data->user_fullname)) ? $data->user_fullname : $data->user_email;
	                    $date     =  date('d/m/Y',$data->post_date); 
	                    $excerpt  = !empty($data->post_excerpt) ? $data->post_excerpt : get_excerpt($data->post_content,30);
	            	 ?>
	            	  <div class="col-xs-12 col-sm-6">
	                  <div class="article-loop">
	                     <div class="image">
	                        <a href="<?php echo url($data->post_slug); ?>"><img src="<?php echo e(get_image_url($data->post_image)); ?>" alt="<?php echo e($data->post_title); ?>"></a>
	                     </div>
	                     <div class="info">
	                        <h3>
	                           <a href="<?php echo url($data->post_slug); ?>"><?php echo e($data->post_title); ?></a>
	                        </h3>
	                        <p class="time">Đăng bởi:<?php echo e($username); ?> - <?php echo e($date); ?></p>
	                        <p class="des"><?php echo e($data->post_excerpt); ?></p>
	                        <a href="<?php echo url($data->post_slug); ?>" class="view-more">Đọc tiếp</a>
	                     </div>
	                  </div>
	                </div>
	            	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	            <?php endif; ?>
           </div>
         
            <?php if($dataNews->lastPage() > 1): ?>
	            <div class="paginations">
	                <ul>
	                    <?php if($dataNews->currentPage() != 1): ?>
	                    <li>
	                        <a href="<?php echo e($dataNews->url($dataNews->currentPage()-1)); ?>">Trang Trước</a>
	                    </li>
	                    <?php endif; ?>
	                    <?php for($i = 1; $i <= $dataNews->lastPage(); $i++): ?>
	                        <li class="<?php echo e(($dataNews->currentPage() == $i) ? 'current' : ''); ?>">
	                            <a href="<?php echo e($dataNews->url($i)); ?>"><?php echo e($i); ?></a>
	                        </li>
	                    <?php endfor; ?>
	                    <?php if($dataNews->currentPage() != $dataNews->lastPage()): ?>
	                    <li>
	                        <a href="<?php echo e($dataNews->url($dataNews->currentPage()+1)); ?>" >Trang Sau</a>
	                    </li>
	                    <?php endif; ?>
	                </ul>
	            </div>
            <?php endif; ?>

         </div>
         <div class="col-md-3">
         	<?php $list_tax = get_taxonomy_post( 'post_category') ?>
         	<?php if($list_tax): ?>
         	<div class="widget category">
               <h4 class="title">
                  Danh mục
               </h4>
               <ul class="list">
               	  <?php $__currentLoopData = $list_tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
               	  <li><a href="<?php echo e(url($tax->taxonomy_slug)); ?>"><i class="fa fa-angle-right"></i><?php echo e($tax->taxonomy_name); ?></a></li>
               	  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
               </ul>
            </div>
            <?php endif; ?>

			<?php $list_tax = get_taxonomy_post( 'post_tag') ?>
			<?php if($list_tax): ?>
            <div class="widget tags">
               <h4 class="title">
                  Tags
               </h4>
               <ul class="list">
           			<?php $__currentLoopData = $list_tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
           	  		<li><a href="<?php echo e(url($tax->taxonomy_slug)); ?>"><i class="fa fa-angle-right"></i><?php echo e($tax->taxonomy_name); ?></a></li>
           	  		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
               </ul>
            </div>
            <?php endif; ?>

            
         </div>
      </div>
   </div>
</div>     
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien5.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>