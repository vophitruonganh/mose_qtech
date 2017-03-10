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
         <section class="product"  itemscope itemtype="#">
            <div class="page-heading" style="background-image: url(<?php echo e($background_page[$key]['image']); ?>);">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h1><?php echo e($post->post_title); ?></h1>
                     </div>
                  </div>
               </div>
            </div>
            <div class="product-page">
               <div class="container">
                  <div class="row">
                      
                     <div class="col-lg-12">
                        <ul class="breadcrumb">
                           <li><a href="#">Trang chủ</a></li>
                           <!-- blog -->
                           <!-- <li><a href="#">Các nước khác</a></li> -->
                           <li class="active breadcrumb-title"><?php echo e($post->post_title); ?></li>
                           <!-- search -->
                           <!-- current_tags -->
                        </ul>
                     </div>
                    
                    
                     <div class="col-lg-6">

                        <div id="sync1" class="owl-carousel large-image">
                            <div class="item">
                            
                                <img class="sp-image" src="<?php echo e(get_image_url($post->post_image )); ?>" alt="<?php echo e($post->post_title); ?>" alt="mo ta" />
                            </div>
                        </div>
                        <div id="sync2" class="owl-carousel">
                        </div>
                     </div>
                      
                      
                      
                     
                     <div class="col-lg-6">
                        <h2 class="product-name" itemprop="name"><?php echo e($post->post_title); ?></h2>
                        <div class="product-summary">
                           <p style="text-align: justify;"><?php echo e(!empty($post->post_excerpt) ? get_excerpt($post->post_excerpt,50) : get_excerpt($post->post_content,50)); ?></p>
                        </div>
                        <div class="product-prices">
                           <!-- <p class="product-price" itemprop="price">Học phí: <span>19.000.000&#8363;</span>/ năm</p> -->
                        </div>
                        <div class="product-form">
                          
                        </div>
                     </div>
                     
                     <!-- thong tin -->
                      <div class="col-lg-12">
                        <div class="product-tabs">
                           <!-- Nav tabs -->
                           <ul class="product-tabs-title">
                              <li class="active"><a href="javascript:void(0)" data-tab="thongtin">Nội dung</a></li>
                              <li><a href="javascript:void(0)" data-tab="thetags">Thẻ tags</a></li>
                           </ul>
                           <!-- Tab panes -->
                           <div class="product-tabs-content">
                              <div class="tab-content active" id="thongtin">
                                <?php echo $post->post_content; ?>

                              </div>
                              <div class="tab-content" id="thetags">
                                  <?php $list_tax = get_taxonomy_post_detail('post_tag',$post->post_slug); ?>
                                  <?php if($list_tax): ?>
                                    <?php $__currentLoopData = $list_tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                      <a href="<?php echo e(url($tax->taxonomy_slug)); ?>" title="<?php echo e($tax->taxonomy_slug); ?>"><?php echo e($tax->taxonomy_name); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                  <?php endif; ?>
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- end thong tin -->
                      
                     <!--khoa hoc lien quan--> 
                    <!-- Widget e -->
                      <div class="col-lg-12">
                         <?php 
                            $post_related =  get_post_related('post_tag', $post->post_slug,'6'  )
                          ?>
                          <?php if(count($post_related)>0): ?>
                        <div class="product-related">
                           <div class="box">
                              <div class="box-heading">
                                 <h2>Bài viết liên quan</h2>
                                 <div class="owl-buttons">
                                    <a href="javascript:void(0)" onclick="$('#owl-product-related').data('owlCarousel').prev();"><i class="fa fa-angle-left"></i></a>
                                    <a href="javascript:void(0)" onclick="$('#owl-product-related').data('owlCarousel').next();"><i class="fa fa-angle-right"></i></a>
                                 </div>
                              </div>
                              <div class="product-related-content">
                                 <div id="owl-product-related">
                                   
                                      <?php $__currentLoopData = $post_related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                          <?php  
                                            $excerpt = get_excerpt(!empty($data->post_excerpt) ? $data->post_excerpt : $data->post_content ,20);
                                          ?>
                                          <div class="item">
                                             <div class="school-item">
                                                <div class="school-item-thumbnail">
                                                   <img src="<?php echo e(get_image_url($data->post_image)); ?>" alt="<?php echo e($data->post_title); ?>">
                                                   <a href="<?php echo e(url($data->post_slug)); ?>">Xem chi tiết</a>
                                                </div>
                                                <a href="<?php echo e(url($data->post_slug)); ?>" class="shool-item-name">
                                                   <h3><?php echo e($data->post_title); ?></h3>
                                                </a>
                                                <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i><?php echo e(date('d/m/Y', $data->post_date)); ?></p>
                                                <div class="school-item-summary">
                                                   <p style="text-align: justify;"><?php echo e($excerpt); ?> 
                                                </div>
                                                <div class="school-item-buttons">
                                                   <a href="<?php echo e(url($data->post_slug)); ?>" class="school-item-view">Xem chi tiết</a>
                                                </div>
                                             </div>
                                          </div>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                   
                                 </div>
                              </div>
                           </div>
                        </div>
                         <?php endif; ?>
                     </div>
                    <!-- End Widget e -->
              

                     <!--end khoa hoc lien quan--> 
                  </div>
               </div>
            </div>
         </section>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien1.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>