<?php $__env->startSection('content'); ?>
<div class="product-area">
   
    <!-- BREADCRUMB -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="breadcrumbs">
                <ul>
                    <li class="home"> <a href="<?php echo url('/'); ?>" title="Trang chủ">Trang chủ<i class="sp_arrow">/</i></a></li>
                    <!--
                    <li><a href="<?php echo url('news.html'); ?>">Tin Tức</a></li>
                    -->
                    <li><strong><?php echo e($post->post_title); ?></strong></li>
                </ul>
            </div>
            </div>
        </div>
    </div>
    <!-- END BREADCRUMB -->
    
    <div class="blog-content-area">
    <div class="container">
        <div class="row">
            <!-- COL-LG-3 -->
            <div class="col-lg-3 col-md-3">
                <!-- Widget 5 -->
                <div class="sidebar-right">
                    <!-- RECENT-POST-START -->
                    
                    <?php $post_cats = get_post_cat_limit( 'tin-noi-bat',3 ) ?>
                    <?php if($post_cats): ?>
                    <div class="recent-post">
                        <h3 class="right-bar-title">Tin nổi bật</h3>
                        <?php $__currentLoopData = $post_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post_cat): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <div class="single-recent-post">
                            <div class="post-thumb">
                                <a href="<?php echo e(url('$post_cat->post_slug')); ?>" title="<?php echo e($post_cat->post_title); ?>">
                                <img alt="<?php echo e($post_cat->post_title); ?>" src="<?php echo e(get_image_url($post_cat->post_image)); ?>">
                                </a>
                            </div>
                            <div class="post-info">
                                <h3><a title="<?php echo e($post_cat->post_title); ?>" href="<?php echo e(url('$post_cat->post_slug')); ?>"><?php echo e($post_cat->post_title); ?></a></h3>
                                <div class="post_cat-date"><?php echo e(date('d/m/Y',$post_cat->post_date)); ?></div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </div>
                    <?php endif; ?>


                    <!-- RECENT-POST-END -->
                    <!-- PRODUCT-START -->
                    <?php $list_cats = get_taxonomy_post( 'post_tag') ?>
                    <?php if($list_cats): ?>
                    <div class="tags">
                        <h3 class="right-bar-title">Tags bài viết</h3>
                        <ul>
                            <?php $__currentLoopData = $list_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <li> 
                                <a href="<?php echo e(url($cat->taxonomy_slug)); ?>" title="<?php echo e($cat->taxonomy_slug); ?>"><?php echo e($cat->taxonomy_name); ?></a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    
                    <!-- PRODUCT-END -->
                </div>
                <!-- End Widget 5 -->
            </div>
            <!-- END COL-LG-3  -->
            
            
            <!--COL-LG-9 -->
            <?php 
                $username = (!empty($post->user_fullname)) ? $post->user_fullname : $post->user_email;
                $date     = date('d-m-Y',$post->post_date);
            ?>
            <div class="col-lg-9 col-md-9">
                <div class="blog-post-content">
                    <div class="single-blog">
                        <div class="hedding">
                            <h1 class="blog-hedding">
                                <a href="<?php echo url($post->post_slug); ?> "><?php echo e($post->post_title); ?></a>
                            </h1>
                        </div>
                        <div class="interview">
                            <div class="author_blog">
                                <p><span class="glyphicon glyphicon-user"></span> &nbsp; <?php echo e($username); ?></p>
                            </div>
                            <div class="date_blog">
                                <p><span class="glyphicon glyphicon-time"></span> &nbsp; <?php echo e($date); ?></p>
                            </div>
                            <?php if($post->comment_status=='yes'): ?>
                                 <div class="comment_blog">
                                <p class="comments" slug="<?php echo e($post->post_slug); ?>" style="cursor: pointer;-webkit-touch-callout: none; -webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none;">
                                <span class="glyphicon glyphicon-comment"></span> &nbsp;  <span class="fb-comments-count" data-href="<?php echo e(url($post->post_slug)); ?>"></span> nhận xét</p>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="postinfo-wrapper">
                            <div class="post-info">
                                <div class="post-decrip">
                                    <?php echo $post->post_content; ?>

                                </div>
                            </div>
                        </div>
                        <div class="fb-comments fb-comments-<?php echo e($post->post_slug); ?>" data-href="<?php echo e(url($post->post_slug)); ?>" data-width="100%" data-numposts="5" style="display:none"></div>
                    </div>
                </div>
            </div>
             <!-- END COL-LG-9  -->
            
        </div>
    </div>
</div>
</div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=1136963499687042";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

$(".comments").on('click', function() {
    var btn = $(this);
    // alert($(btn).attr('slug')) 
   $(".fb-comments-"+ $(btn).attr('slug')).toggle();

});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien3.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>