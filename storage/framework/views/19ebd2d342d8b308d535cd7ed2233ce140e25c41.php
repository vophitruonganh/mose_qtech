<?php $__env->startSection('content'); ?>
          <section class="collection">
                <div class="page-heading" style="background-image: url(http://store.moseplus.com/template/giaodien1/images/bg-collection-heading.jpg);">
                    <div class="container">
                            <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h1>Kết quả tìm kiếm</h1>
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
                                <li class="active breadcrumb-title">Kết quả tìm kiếm</li>
                                <!-- current_tags -->
                             </ul>
                          </div>
                           
                        <div class="col-lg-3 sidebar">
                              <!-- Widget d -->
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
                        </div>
                        <!-- End Widget d -->
                           <?php if(count($posts)>0): ?>
                            <div class="col-lg-9 right">
                               <div class="collection-toolbar">
                                  <div class="row">
                                     <div class="col-lg-6">
                                        <div class="toolbar-views">

                                           <a href="<?php echo e((!isset($_GET['view']) || $_GET['view']=='grid')? 'javascript:void(0);' : url('index?search='.$search.'&view=grid')); ?>" class="<?php echo e((!isset($_GET['view']) || $_GET['view']=='grid')? 'active' : ''); ?>" >
                                      <i class="fa fa-th"></i>
                                      </a> 

                                            <a href="<?php echo e((isset($_GET['view']) && $_GET['view']=='list')? 'javascript:void(0);' : url('index?search='.$search.'&view=list')); ?>" class="<?php echo e((isset($_GET['view']) && $_GET['view']=='list')? 'active' : ''); ?>">
                                      
                                      <i class="fa fa-th-list"></i>
                                      </a> 
                                        </div>
                                     </div>
                                  </div>
                               </div>

                                <?php $i=0; ?>
                               <div class="collection-products">
                                
                                <div class="row">
                                      <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                      <?php $date     = date('d-m-Y',$post->post_date); ?> 

                                     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="school-item">
                                           <div class="school-item-thumbnail">
                                              <img src="<?php echo e(get_image_url($post->post_image)); ?>" alt="Học viện Quản lý Châu Á Thái Bình Dương APMI Singapore">
                                              <a href="<?php echo e(url($post->post_slug)); ?>">Xem chi tiết</a>
                                           </div>
                                           <a href="<?php echo url($post->post_slug); ?>" class="shool-item-name">
                                              <h3><?php echo e($post->post_title); ?></h3>
                                           </a>
                                           <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i><?php echo e($date); ?></p>
                                           
                                           <div class="school-item-buttons">
                                              
                                              <a href="<?php echo e(url($post->post_slug)); ?>" class="school-item-view">Xem chi tiết</a>
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
      

                                  
                                  <?php echo e($posts->appends(['search' => $search, 'view' => $view])->render()); ?>

                                  
                                  
                                  
                               </div>
                            </div> <!-- end ms-9-->
                          <?php else: ?>
                            Không tìm thấy kết quả
                          <?php endif; ?>
                       </div> <!-- end row-->
                    </div> <!-- end container-->
                 </div>
          </section>
          
          
   <?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien1.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>