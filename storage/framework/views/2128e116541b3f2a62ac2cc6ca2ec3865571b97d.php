<?php $__env->startSection('content'); ?>

<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <div class="col-md-12 ">
            <ol class="breadcrumb breadcrumb-arrow hidden-sm hidden-xs">
               <li><a href="<?php echo e(url('/')); ?>" target="_self">Trang chủ</a></li>
               <li class="active"><span><?php echo e($slug_name); ?></span></li>
            </ol>
         </div>
      </div>
   </div>
</div>


<div class="container">
   <div class="row">
      <!--Begin Content-->
      <div class="col-lg-12">
         <div class="row">
            <div class="col-md-9 col-sm-12 col-xs-12">
               <!-- Begin: Nội dung blog --> 
               <div class="content-blog">
               <?php $__currentLoopData = $dataNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <?php 
                      $username = (!empty($data->user_fullname)) ? $data->user_fullname : $data->user_email;
                      $date     = date('d-m-Y',$data->post_date);
                  ?>

                  <div class="topLine">
                     <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <a href="<?php echo url($data->post_slug); ?>">
                        <img src="<?php echo e(get_image_url($data->post_image)); ?>">
                        </a>
                     </div>
                     <div class="dd col-lg-7 col-md-7 col-sm-7 col-xs-12">
                        <h2><a href="<?php echo url($data->post_slug); ?>"><?php echo e($data->post_title); ?></a></h2>
                        <span class="first-bor"><a href="#">Người đăng: <?php echo e($username); ?></a></span><span><?php echo e($date); ?></span>
                        <span><a href="#"> Tin tức </a></span>
                        <?php if($data->comment_status=='yes'): ?>
                        <span><em class="views">
                        <i class="comment-icon fa fa-comments-o"slug="<?php echo e($data->post_slug); ?>" style="cursor: pointer;-webkit-touch-callout: none; -webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none;">
                        <a class="fb-comments-count" data-href="<?php echo e(url($data->post_slug)); ?>">
                        0</a> Bình luận</i>
                                     
                        </em></span>
                        <?php endif; ?>
                        <p><?php echo e($data->post_excerpt); ?>

                           <a href="<?php echo url($data->post_slug); ?>">Xem thêm <i class="fa fa-arrow-right"></i></a>
                        
                        </p>
                        <div class="fb-comments fb-comments-<?php echo e($data->post_slug); ?>" data-href="<?php echo e(url($data->post_slug)); ?>" data-width="100%" data-numposts="5" style="display:none"></div>
                     </div>
                  </div>

               <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                   
               </div>
               <div class="col-lg-12 pagination-blog">
                  <div class="row">
                     <!-- Begin: Phân trang blog --> 
                     <div id="pagination" class="pw">
                     
                        <?php if($dataNews->lastPage() > 1): ?>
                           <?php if($dataNews->currentPage() != 1): ?>
                                <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs">
                                 <a class="prev" href="<?php echo e($dataNews->url($dataNews->currentPage()-1)); ?>"><span><i class=" fa fa-angle-left"></i>Trang trước  </span></a>
                            </div>
                           <?php endif; ?>
                            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 text-center">
                           <?php for($i = 1; $i <= $dataNews->lastPage(); $i++): ?>
                                 <?php if($dataNews->currentPage() == $i): ?>
                                  <span class="page-node current"><?php echo e($i); ?></span>
                                 <?php else: ?> 
                                    <a class="page-node" href="<?php echo e($dataNews->url($i)); ?>"><?php echo e($i); ?></a>
                                 <?php endif; ?>
                                   
                            <?php endfor; ?>
                             </div>

                           <?php if($dataNews->currentPage() != $dataNews->lastPage()): ?>
                              <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs">
                                 <a class="pull-right next" href="<?php echo e($dataNews->url($dataNews->currentPage()+1)); ?>"><span>Trang sau <i class="fa fa-angle-right"></i></span></a>
                              </div>
                           <?php endif; ?>
                        <?php endif; ?>
                      </div>
                     
                     <!-- End: Phân trang blog --> 
                  </div>
               </div>
            </div>
            <div class="col-md-3  hidden-sm hidden-xs">
               <!-- Begin sidebar blog -->
               <div class="sidebar">
                  <!-- Begin: Danh mục tin tức -->
                  <?php $list_cat = get_taxonomy_post('post_category') ?>
                  <?php if($list_cat): ?>
                     <div class="news-menu list-group">
                        <span class="list-group-item active">Danh mục bài viết</span>
                        <ul class="nav sidebar" id="menu-blog">
                           <?php $__currentLoopData = $list_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                           <li class=" first">
                              <a href="<?php echo e(url($cat->taxonomy_slug)); ?>">
                              <span><?php echo e($cat->taxonomy_name); ?></span>
                              </a>
                           </li>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </ul>
                     </div>
                  <?php endif; ?>
          
                  <!-- End: Danh mục tin tức -->
                  <!--Begin: Bài viết mới nhất-->
                  <div class="news-latest list-group">
                     <?php
                        $posts = get_post_cat_limit($post_slug_2,4);
                        $headingText = get_taxonomy_name($post_type_2,$post_slug_2);
                        if( $headingText == '' ) $headingText = 'Bài viết Mới';
                     ?>
                     <span class="list-group-item active">
                     <?php echo e($headingText); ?>

                     </span>
                     <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                     <div class="article">
                        <div class="col-ld-3 col-md-3 col-sm-4 col-xs-4">
                           <a href="<?php echo e(url($post->post_slug)); ?>"><img src="<?php echo e(get_image_url($post->post_image)); ?>" alt="<?php echo e($post->post_title); ?>"></a>
                        </div>
                        <div class="post-content  col-lg-9 col-md-9 col-sm-8 col-xs-8 ">
                           <a href="<?php echo e(url($post->post_slug)); ?>"><?php echo e($post->post_title); ?></a><span class="date"> <i class="time-date"></i><?php echo e(date('d/m/Y',$post->post_date)); ?></span>
                        </div>
                     </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </div>
                  <!--End: Bài viết mới nhất-->
               </div>
               <!-- End sidebar blog -->
            </div>
         </div>
      </div>
      <!--End Content-->
   </div>
</div>
   <script>(function(d, s, id) {
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) return;
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=1136963499687042";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

   $(".comment-icon").on('click', function() {
       var btn = $(this);
       // alert($(btn).attr('slug')) 
      $(".fb-comments-"+ $(btn).attr('slug')).toggle();

   });
   </script>				
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien4.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>