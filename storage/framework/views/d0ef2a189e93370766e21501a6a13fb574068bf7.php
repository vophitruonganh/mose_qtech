<?php $__env->startSection('content'); ?>
  <?php
    $key = 0;
    foreach( $background_page as $k => $v )
    {
      if( $v['url'] == Request::fullUrl() )
      {
        $key = $k;
        break;
      }
    }
  ?>
          <section class="collection">
                <div class="page-heading" style="background-image: url(<?php echo e($background_page[$key]['image']); ?>);">
                    <div class="container">
                            <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h1><?php echo e($slug_name); ?></h1>
                                    </div>
                            </div>
                    </div>
                </div>
              
                <div class="collection-page">
                    <div class="container">
                       <div class="row">
                          <div class="col-lg-12">
                             <ul class="breadcrumb">
                                <li><a href="/">Trang chủ</a></li>
                                <!-- blog -->
                                <li class="active breadcrumb-title"><?php echo e($slug_name); ?></li>
                                <!-- current_tags -->
                             </ul>
                          </div>
                           
                          <div class="col-lg-3 sidebar">
                             
                              <!-- Menu Left -->
                              <div class="box">
                                <div class="box-heading">
                                   <h2>Danh mục bài viết</h2>
                                </div>
                                <div class="box-content">
                                   <nav class="nav-sidebar">
                                      <ul>
                                      <?php $list_cat = get_taxonomy_post('post_category') ?>
                                      <?php if(count($list_cat)>0): ?>
                                        <?php $__currentLoopData = $list_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                           <li><a href="<?php echo e(url($cat->taxonomy_slug)); ?>"><?php echo e($cat->taxonomy_name); ?></a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                      <?php endif; ?>
                                          </ul>
                                       </nav>
                                    </div>
                                </div>

                            <div class="box">
                                <div class="box-heading">
                                   <h2>Nhãn bài viết</h2>
                                </div>
                                <div class="box-content">
                                   <nav class="nav-sidebar">
                                      <ul>
                                      <?php $list_cat = get_taxonomy_post('post_tag') ?>
                                      <?php if(count($list_cat)>0): ?>
                                        <?php $__currentLoopData = $list_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                           <li><a href="<?php echo e(url($cat->taxonomy_slug)); ?>"><?php echo e($cat->taxonomy_name); ?></a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                      <?php endif; ?>
                                      </ul>
                                   </nav>
                                </div>
                            </div>
                          <!-- End Menu Left -->
                            
                          </div>
                            <div class="col-lg-9 right">
                               <div class="collection-toolbar">
                                 
                               </div>
                                <?php $i=0; ?>
                               <div class="collection-products">
                                <div class="row">
                                      <?php $__currentLoopData = $dataNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> 
                                      <?php 
                                            $date     = date('d-m-Y',$data->post_date); 
                                       ?> 
                                     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="school-item">
                                           <div class="school-item-thumbnail">
                                              <img src="<?php echo e(get_image_url($data->post_image)); ?>" alt="<?php echo e($data->post_title); ?>">
                                              <a href="<?php echo url($data->post_slug); ?>">Xem chi tiết</a>
                                           </div>
                                           <a href="<?php echo url($data->post_slug); ?>" class="shool-item-name">
                                              <h3><?php echo e($data->post_title); ?></h3>
                                           </a>
                                           <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i><?php echo e($date); ?></p>
                                           
                                           <div class="school-item-buttons">
                                              <a href="<?php echo e(url($data->post_slug)); ?>" class="school-item-view">Xem chi tiết</a>
                                           </div>
                                        </div>
                                     </div>
                                       <?php 
                                              if(($i+1)%3==0) 
                                                echo '<div class="clearfix"></div>';
                                              $i++;
                                             
                                          ?>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                  </div>
                                 <?php echo e($dataNews->render()); ?>

                                  
                               </div>
                            </div> <!-- end ms-9-->
                        
                       </div> <!-- end row-->
                    </div> <!-- end container-->
                 </div>
          </section>
          
          
   <?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien1.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>