<?php $__env->startSection('content'); ?>

<?php 
      if(count($post)>0)
      {
            $username = (!empty($post->user_fullname)) ? $post->user_fullname : $post->user_email;
            $date     = date('d/m/Y',$post->post_date);
           
      } 
               
            
 ?>
      
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <ul>
            <li class="home"> <a href="/" title="Trang chủ">Trang chủ</a><span>|</span></li>
            <li><a href="/tin-tuc">Tin tức</a></li>
            <li><span style="margin-right:5px;">|</span><strong><?php echo e($post->post_title); ?></strong></li>
         </ul>
      </div>
   </div>
</div>
<div class="main-container col2-left-layout">
   <div class="main container">
      <div class="row">
         
         <div class="col-main col-sm-9 col-sm-push-3">
            <div class="page-title">
               <h2>Blog</h2>
            </div>
            <div class="blog-wrapper" id="main">
               <div class="site-content" id="primary">
                  <div role="main" id="content">
                     <article class="blog_entry clearfix">
                        <header class="blog_entry-header clearfix">
                           <div class="blog_entry-header-inner">
                              <h1 class="blog_entry-title"><?php echo e($post->post_title); ?></h1>
                           </div>
                           <div class="interview">
                              <div class="author_blog">
                                 <p><span class="glyphicon glyphicon-user"></span> &nbsp; <?php echo e($username); ?></p>
                              </div>
                              <div class="date_blog">
                                 <p><span class="glyphicon glyphicon-calendar"></span> &nbsp; <?php echo e($date); ?></p>
                              </div>
                              
                           </div>
                           <!--blog_entry-header-inner--> 
                        </header>
                        <!--blog_entry-header clearfix-->
                        <div class="entry-content">
                           <?php echo $post->post_content; ?>

                        </div>
                     </article>
                   
                  </div>
                   <?php if($post->comment_status =='yes'): ?>
                   <div class="comment">
                       <div class="fb-comments" data-href="<?php echo e(url($post->post_slug)); ?>" data-width="100%" data-numposts="5"></div>
                   </div>
                   <?php endif; ?>
                   <div class="othernews">
                   <?php $post_related = get_post_related( 'post_category ', $post->post_slug, '5'  ) ?>
                   <span>Các bài viết khác</span>
                      <ul>
                         <?php $__currentLoopData = $post_related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                         <?php 
                              $excerpt = get_excerpt((!empty($data->post_excerpt) ? $data->post_excerpt: $data->post_content) , 20) ;
                          ?>
                          <li><a href="<?php echo e($data->post_slug); ?>" style="text-decoration:none;"><?php echo e($excerpt); ?></a> (02.05.2014)</li>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                      </ul>
                    </div>
                   
                  
               </div>
            </div>
         </div>
          <!-- left -->

            <div class="col-right sidebar col-sm-3 col-sm-pull-9">
             <?php $list_tax = get_taxonomy_product( 'product_category' ) ?>
                 <?php if($list_tax): ?>
                 <div class="box_collection_pr">
                    <div class="title_st">
                       <h2>Danh mục sản phẩm</h2>
                       <span class="arrow_title visible-md visible-md"></span>
                       <div class="show_nav_bar hidden-lg hidden-md"></div>
                    </div>
                    <div class="list_item">
                       <ul>
                        <?php $__currentLoopData = $list_tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                          <li> <a href="<?php echo e(url('collections/'.$tax->taxonomy_slug)); ?>"><?php echo e($tax->taxonomy_name); ?></a> </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                       </ul>
                    </div>
                 </div>
                 <?php endif; ?>

                 <?php $list_tax = get_taxonomy_post('post_category') ?>
                 
                 <?php if($list_tax): ?>
                 <div class="box_collection_pr">
                    <div class="title_st">
                       <h2>Danh mục tin tức</h2>
                       <span class="arrow_title"></span>
                    </div>
                    <div class="list_item">
                       <ul>
                          <?php $__currentLoopData = $list_tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                          <li><a href="<?php echo e(url($tax->taxonomy_slug)); ?>"><?php echo e($tax->taxonomy_name); ?></a></li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                       </ul>
                    </div>
                 </div>
                 <?php endif; ?>
                
                <?php
                  $posts = get_post_cat_limit($post_slug_2,5);
                  $headingText = get_taxonomy_name($post_type_2,$post_slug_2);
                  if( $headingText == '' ) $headingText = 'Bài viết Mới';
                ?>
                 <?php if($posts): ?>
                 <div class="popular-posts widget widget__sidebar stl_list_item " id="recent-posts-4">
                    <div class="title_st">
                       <h2><?php echo e($headingText); ?></h2>
                       <span class="arrow_title"></span>
                    </div>
                    <div class="widget-content">
                       <ul class="posts-list unstyled clearfix">
                          <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <li>
                             <figure class="featured-thumb" style="width:35%">
                                <a href="<?php echo e(url($post->post_slug)); ?>" title="<?php echo e($post->post_title); ?>">
                                <img src="<?php echo e(get_image_url($post->post_image)); ?>" style=" width: 100px;" alt="<?php echo e($post->post_title); ?>">
                                </a> 
                             </figure>
                             <!--featured-thumb-->
                             <h4><a title="<?php echo e($post->post_title); ?>" href="<?php echo e(url($post->post_slug)); ?>"><?php echo e($post->post_title); ?></a></h4>
                             <p class="post-meta"><i class="icon-calendar"></i>
                                <time class="entry-date"><?php echo e(date('d/m/Y', $post->post_date)); ?></time>
                                .
                             </p>
                          </li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                          
                         
                       </ul>
                    </div>
                    <!--widget-content--> 
                 </div>
                 <?php endif; ?>

                 <div class="ad-spots widget widget__sidebar">
                    <!-- <div class="widget-content"><a target="_self" href="#" title=""><img alt="offer banner" src="//bizweb.dktcdn.net/100/049/382/themes/145846/assets/blog-offer-banner.jpg?1470100651174"></a></div> -->
                 </div>
          </div>
          <!-- end left -->
      </div>
   </div>
</div>
   
     
      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien11.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>