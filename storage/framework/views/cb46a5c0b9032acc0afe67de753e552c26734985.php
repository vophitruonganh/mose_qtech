<?php $__env->startSection('content'); ?>

<div class="container">
   <div class="row">
      <div id="article" class="article-detail clearfix">
         <div class="col-md-12 col-sm-12 col-xs-12 article">
            <div class="main-content">
               <div class="col-md-12 blog-breadcrumb">
                  <ol class="breadcrumb breadcrumb-arrow hidden-sm hidden-xs">
                     <li><a href="<?php echo e(url('/')); ?>" target="_self">Trang chủ</a></li>
                     <li><a href="<?php echo e(url('/post')); ?>" target="_self">Tin tức</a> </li>
                     <li class="active"><span><?php echo e($post->post_title); ?></span></li>
                  </ol>
               </div>
               <!-- Begin article -->
               <?php 
                   //$username = (!empty($post->user_nickname)) ? $post->user_nickname : $post->user_email;
                   $date     = date('d-m-Y',$post->post_date);
               ?>
               <div class="article-body">
                  <div class="col-md-9 articles clearfix" id="layout-page">
                     <span class="header-page clearfix">
                        <h1><?php echo e($post->post_title); ?></h1>
                     </span>
                     <div class="content-page row">
                        <div class="col-md-2">
                           <!--Begin:ngày giờ đăng bài viết  -->
                           <div class="author-date">
                              <ul class="date-post">
                                 <li>
                                    <i class="icon-time"></i>
                                    <p>
                                       <?php echo e($date); ?>

                                    </p>
                                 </li>
                              </ul>
                           </div>
                           <!--End:ngày giờ đăng bài viết  -->
                           <!--Begin: số bình luận  -->
                           <?php if($post->comment_status=='yes'): ?>
                           <div class="article-count">
                              <ul class="count-comment">
                                 <li>
                                    <i class="icon-comment fa fa-comments-o"slug="<?php echo e($post->post_slug); ?>" style="cursor: pointer;-webkit-touch-callout: none; -webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none;"></i>
                                    <a class="fb-comments-count" data-href="<?php echo e(url('$post->post_slug')); ?>">
                                    0</a><span > Bình luận</span>
                                      
                                 </li>
                              </ul>
                           </div>
                           <?php endif; ?>
                           <!--End: số đăng bình luận   -->
                        </div>
                        <div class="col-md-10 article-content">
                           <div class="body-content">
                             <?php echo $post->post_content; ?>

                           </div>
                        </div>
                        <div class="col-md-12  pl0">
                           <!-- Begin article comments -->
                           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;">
                              <div role="tabpanel" class="product-comment">
                                 <!-- Nav tabs -->
                                 <ul class="nav visible-lg visible-md" role="tablist">
                                    <li role="presentation" class="active">
                                       
                                    
                                    </li>
                                 </ul>
                                 <!-- Tab panes -->
                                 <div id="comment">
                                    <!-- Begin comments -->
                                    <div class="fb-comments fb-comments-<?php echo e($post->post_slug); ?>" data-href="<?php echo e(url($post->post_slug)); ?>" data-width="100%" data-numposts="5" style="display:none"></div>
                                    <!-- End comments -->
                                 </div>
                                
                              </div>
                           </div>
                           <!-- End article comments -->
                        </div>
                     </div>
                  </div>
                  <!-- End article--> 
                  <!-- Begin sidebar -->
                  <div class="col-md-3 clearfix">
                     <div class="sidebar margin-top-30">
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
                        <?php
                        /*
                        <div class="news-menu list-group">
                           <span class="list-group-item active">Danh mục blog</span>
                           <ul class="nav sidebar" id="menu-blog">
                              <li class=" first">
                                 <a href="{{url('/')}}">
                                 <span>Trang chủ</span>
                                 </a>
                              </li>
                              <li class=" ">
                                <a href="{{url('collections')}}">
                                    <span>Sản Phẩm</span>
                                </a>
                              </li>
                      
                              <li class=" ">
                                 <a href="{{url('/post')}}">
                                 <span>Blog</span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="{{url('pages/gioi-thieu')}}">
                                 <span>Giới thiệu</span>
                                 </a>
                              </li>
                              <li class=" last">
                                 <a href="{{url('pages/contact')}}">
                                 <span>Liên hệ</span>
                                 </a>
                              </li>
                           </ul>
                           <script>
                              $(document).ready(function(){
                              	//$('ul li:has(ul)').addClass('hassub');
                              	$('#menu-blog ul ul li:odd').addClass('odd');
                              	$('#menu-blog ul ul li:even').addClass('even');
                              	$('#menu-blog > ul > li > a').click(function() {
                              		$('#menu-blog li').removeClass('active');
                              		$(this).closest('li').addClass('active');
                              		var checkElement = $(this).nextS();
                              		if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
                              			$(this).closest('li').removeClass('active');
                              			checkElement.slideUp('normal');
                              		}
                              		if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
                              			$('#menu-blog ul ul:visible').slideUp('normal');
                              			checkElement.slideDown('normal');
                              		}
                              		if($(this).closest('li').find('ul').children().length == 0) {
                              			return true;
                              		} else {
                              			return false;
                              		}
                              	});
                              
                              	$('.drop-down-1').click(function(e){		
                              		if ( $(this).parents('li').hasClass('has-sub') ){
                              			e.preventDefault();
                              			if($(this).hasClass('open-nav')){
                              				$(this).removeClass('open-nav');
                              				$(this).parents('li').children('ul.lve2-blog').slideUp('normal').removeClass('in');
                              			}else {
                              				$(this).addClass('open-nav');
                              				$(this).parents('li').children('ul.lve2-blog').slideDown('normal').addClass('in');
                              			}
                              		}else {
                              
                              		}
                              	});
                              
                              });
                              
                              $(".news-menu  ul.navs li.active").parents('ul.children').addClass("in");
                           </script>
                        </div>
                        */
                        ?>
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
                     <!-- End sidebar -->
                  </div>
               </div>
            </div>
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

   $(".icon-comment").on('click', function() {
       var btn = $(this);
       // alert($(btn).attr('slug')) 
      $(".fb-comments-"+ $(btn).attr('slug')).toggle();
      // alert($(location).attr('href')+"#comment");
      // var href = $(location).attr('href');
      // if(href.search("#comment")==-1){
      //    href = href+"#comment";
      // }
      
      // window.location.href=href;
   });
   </script>      	

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien4.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>