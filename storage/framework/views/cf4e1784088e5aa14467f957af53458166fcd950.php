<?php $__env->startSection('content'); ?>
      <div class="breadcrumbs">
         <div class="container">
            <div class="row">
               <div class="inner">
                  <ul>
                     <li class="home">
                        <a title="Quay lại trang chủ" href="/">Trang chủ</a>
                     </li>
                     <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                     <li class="cl_breadcrumb" ><?php echo e($title_name); ?></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <section class="collection_all">
         <div class="container">
            <div class="row">

          <!-- Left -->
          <div class="col-lg-3 col-md-3 hidden-sm hidden-xs left-panel">
            <!-- Danh mục sản phẩm -->
            <?php $list_tax = get_taxonomy_product('product_category'); ?>
            <?php if( $list_tax ): ?>
            <div class="block bl_danhmucsanpham hidden-xs">
               <div class="block-title">
                  <h5>
                     <a href="collections/all">
                     <span>
                     <i class="fa fa-bars" aria-hidden="true"></i> &nbsp; Danh mục sản phẩm
                     </span>
                     </a>
                  </h5>
               </div>
               <div class="block-content">
                  <ul>
                    <?php $__currentLoopData = $list_tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li class="level0 parent "><a href="<?php echo e(url('collections/'.$tax->taxonomy_slug)); ?>"><i class="fa fa-caret-right" aria-hidden="true"></i><span><?php echo e($tax->taxonomy_name); ?></span></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </ul>
               </div>
            </div>
            <?php endif; ?>
            <!-- End Danh Mục Sản Phẩm -->
            <!-- Sản Phẩm Mới -->
            <?php
              $products_tax = get_product_tax_limit($product_type_1,$product_slug_1,8);
              $headingText = get_taxonomy_name($product_type_1,$product_slug_1);
              if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
            ?>
            <?php if( $products_tax ): ?>
            <div class="sanphambanchay block mg_bt mg_top">
               <div class="block-title pd_bt_10">
                  <h5 class="fw600"><span><?php echo e($headingText); ?></span></h5>
               </div>
               <div class="block-content bd_old">
                  <div id="slideshowproboxwrapper">
                     <div class="slideshowprobox_best_sale_products">
                        <ul class="menu">
                          <?php $__currentLoopData = $products_tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                           <li class="product-loop-list">
                              <div class="prd-loop-list">
                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 loop-img">
                                    <a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="<?php echo e($product['product_title']); ?>">
                                    <img src="<?php echo e(get_image_url($product['product_image_id'])); ?>" alt="<?php echo e($product['product_title']); ?>">
                                    </a>
                                 </div>
                                 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 loop-content">
                                    <p class="item-name"><a href="/benro-a1681tb0"><?php echo e($product['product_title']); ?></a></p>
                                    <p class="item-price cl_main fw600"><span><?php echo e(number_format($product['price_new'],0,'.','.')); ?>₫</span></p>
                                    <?php if( $product['price_old'] > 0 ): ?>
                                    <p class="item-price cl_old txt_line fs12"><span><?php echo e(number_format($product['price_old'],0,'.','.')); ?>₫</span></p>
                                    <?php endif; ?>
                                 </div>
                              </div>
                           </li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <?php endif; ?>
            <!-- End Sản Phẩm Mới -->
            <!--
            <div class="hotrotructuyen block mg_bt mg_top">
               <div class="block-title pd_bt_10">
                  <h5 class="fw600"><span>Hỗ trợ trực tuyến</span></h5>
               </div>
               <div class="block-content bd_old pd_10">
                  <div class="support_loop">
                     <p class="fw600">Hỗ trợ bán hàng</p>
                     <p>Hotline<span class="cl_main">1900 6750</span></p>
                     <div class="support_loop_content">
                        <div class="support_loop_img">
                           <img src="//bizweb.dktcdn.net/thumb/thumb/100/091/136/themes/137517/assets/skype.png?1468549824886" height="24" width="50" alt="Skype">
                        </div>
                        <div class="support_loop_chat">
                           <span class="support_loop_style">Chat ngay để nhận tư vấn</span>
                        </div>
                     </div>
                  </div>
                  <div class="support_loop">
                     <p class="fw600">Hỗ trợ bán hàng</p>
                     <p>Hotline<span class="cl_main">1900 6750</span></p>
                     <div class="support_loop_content">
                        <div class="support_loop_img">
                           <img src="//bizweb.dktcdn.net/thumb/thumb/100/091/136/themes/137517/assets/skype.png?1468549824886" height="24" width="50" alt="Skype">
                        </div>
                        <div class="support_loop_chat">
                           <span class="support_loop_style">Chat ngay để nhận tư vấn</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            -->
            <div class="fanpage_facebook block mg_bt mg_top hidden-xs">
               <div class="block-content">
                  <div class="fb-page" data-href="<?php echo e($facebook['url']); ?>" data-tabs="timeline" data-height="230" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                     <div class="fb-xfbml-parse-ignore">
                        <blockquote cite="https://www.facebook.com/MOSEVN">
                           <a href="https://www.facebook.com/MOSEVN">Facebook</a>
                        </blockquote>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Tin tức -->
            <?php
              $posts = get_post_cat_limit($post_slug_1,3);
              $headingText = get_taxonomy_name($post_type_1,$post_slug_1);
              if( $headingText == '' ) $headingText = 'Bài viết Mới';
            ?>
            <?php if( $posts ): ?>
            <div class="news_blogs block mg_bt mg_top">
               <div class="block-title pd_bt_10">
                  <h5><a href="tin-tuc"><span class="fw600"><?php echo e($headingText); ?></span></a></h5>
               </div>
               <div class="block-content bd_old pd_10">
                  <div id="owl-news-blog" class="owl-carousel owl-theme">
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <?php
                      $username = (!empty($post->user_fullname)) ? $post->user_fullname : $post->user_email;
                      $excerpt = !empty($post->post_excerpt) ? get_excerpt($post->post_excerpt,30) : get_excerpt($post->post_content,30);
                    ?>
                    <div class="item blog-post">
                        <div class="blog-image">
                           <a href="<?php echo e(url($post->post_slug)); ?>"><img src="<?php echo e(get_image_url($post->post_image)); ?>" alt="<?php echo e($post->post_title); ?>"/></a>
                        </div>
                        <div>
                           <h5 class="fw600"><a href="<?php echo e(url($post->post_slug)); ?>"><?php echo e($post->post_title); ?></a></h5>
                           <p class="cl_old fs13">
                              <span><i class="fa fa-user" aria-hidden="true"></i> <?php echo e($username); ?></span> &nbsp;
                              <span><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo e(date('d/m/Y',$post->post_date)); ?></span>
                           </p>
                           <p class="cl_old"><?php echo e($excerpt); ?></p>
                        </div>
                     </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </div>
               </div>
            </div>
            <?php endif; ?>
            <!-- End Tin Tức -->
        </div>
              <!-- End left -->


               <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 right-panel collections ">
                  <div class="col-lg-12 col-md-12 col-sm- col-xs-12 collection_header">
                     <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12 pd_0">
                        <h4 class="txt_u fw600 pd_0 pull-left"><?php echo e($title_name); ?></h4>
                     </div>
                     <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12 toolbar pd_0 ">
                        <div id="sort-by">
                           <label class="left hidden-xs">Sắp xếp theo: </label>
                           <form class="form-inline form-viewpro" action="" id="filter_product" method="get">
                              <div class="form-group">
                                 <select class="sort-by-script" id="sortBy" name="sortBy">
                                    <option value="default">Mặc định</option>
                                    <option value="price-asc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='price-asc')? 'selected' : ''); ?>>Giá tăng dần</option>
                                    <option value="price-desc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='price-desc')? 'selected' : ''); ?>>Giá giảm dần</option>
                                    <option value="alpha-asc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-asc')? 'selected' : ''); ?>>Từ A-Z</option>
                                    <option value="alpha-desc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-desc')? 'selected' : ''); ?>>Từ Z-A</option>
                                    <option value="created-asc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='created-asc')? 'selected' : ''); ?>>Cũ đến mới</option>
                                    <option value="created-desc" <?php echo e((isset($_GET['sortBy']) && $_GET['sortBy']=='created-desc')? 'selected' : ''); ?>>Mới đến cũ</option>
                                 </select>

                              </div>
                           </form>
                        </div>
                        <div class="sorter ">
                           <div class="view-mode">
                              <span title="Lưới" class=" collection_btn active view_grid"> <a href="<?php echo e((!isset($_GET['view']) || $_GET['view']=='grid')? 'javascript:void(0);' : url('collections?view=grid')); ?>"  ><i class="fa fa-th" aria-hidden="true"></i></a></span>
                              <!--<a href="?view=list" title="Danh sách" class="collection_btn view_list"><i class="fa fa-th-list" aria-hidden="true"></i></a>-->
                              <span title="Danh sách" class="collection_btn view_list"><a href="<?php echo e((isset($_GET['view']) && $_GET['view']=='list')? 'javascript:void(0);' : url('collections?view=list')); ?>" ><i class="fa fa-th-list" aria-hidden="true"></i></a></span>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd_0 mg_20_0 collection_view collection_grid">
                      <?php if(count($products)!=0): ?>
                         <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 pd_0 ">
                                    <div class="prd-loop-grid" style="margin: 10px 0;">
                                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 loop-img">
                                          <a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" title="<?php echo e($product['product_title']); ?>"><img src="<?php echo e(get_image_url($product['product_image_id'])); ?>" title="<?php echo e($product['product_title']); ?>" alt="<?php echo e($product['product_title']); ?>"></a>
                                          <div class="view_buy hidden_xs">
                                             <div class="actions">
                                                <form action="<?php echo e(url('cart/order/'.$product["product_slug"])); ?>" method="post" class="variants" id="product-actions-2940268" enctype="multipart/form-data">
                                                <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                                <input type="hidden" name="quantity" value="1" />
                                                   <input type="hidden" name="variantId" value="4711564" />
                                                   <button class="btn btn-buy btn-cus add_to_cart" title="Mua ngay"><span>Mua ngay</span></button>
                                                </form>
                                             </div>
                                             <button class="btn btn-view btn-cus" onclick="location.href='<?php echo e(url('collections/'.$product['product_slug'])); ?>'" title="Xem sản phẩm"><span>Xem chi tiết</span></button>
                                          </div>
                                       </div>
                                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 loop-content">
                                          <p class="item-name txt_center"><a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>"><?php echo e($product['product_title']); ?></a></p>
                                          <p class="prc">
                                             <span class="item-price cl_main fw600"><?php echo e(number_format($product['price_new'],0,'.','.')); ?>&#8363;</span>
                                             <?php if($product['price_old']): ?>
                                                 <span class="item-price cl_old txt_line"><?php echo e(number_format($product['price_old'],0,'.','.')); ?>&#8363;</span>
                                             <?php endif; ?>
                                          </p>
                                       </div>
                                       <?php if( $product['check_discount'] == 1 ): ?>
                                          <div class="on_sale">
                                             <span>-<?php echo e($product['percentage']); ?>%</span>
                                          </div>
                                       <?php endif; ?>
                                    </div>
                                 </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                     <?php endif; ?>
                  </div>
                  <div class="paginate-pages pull-right">
                        <?php echo e($products->links()); ?>

                  </div>
                  <?php
                  /*
                  <div class="paginate-pages ">
                     <div class="pager">
                        <div class="pages">
                           
                           <ul class="pagination">
                            @if($posts->currentPage()!=1)
                               <li>
                                   <a href="{{str_replace('/?','?',$posts->url($posts->currentPage()-1))}}">
                                       Trang trước
                                   </a>
                               </li>
                            @endif
                            @for($i=1;$i<=$posts->lastPage();$i=$i+1)
                               <li class="{{($posts->currentPage()==$i)? 'active' : ''}}">
                                   <a href="{{str_replace('/?','?',$posts->url($i))}}">{{$i}}</a>
                               </li>
                               <!-- <li class="current"><a href="#" style="pointer-events:none">1</a></li>
                               <li><a href="/collections/all?page=2">2</a></li> -->
                               @endfor
                               <!-- <li><a href="/collections/all?page=3">3</a></li>
                               <li><a href="/collections/all?page=4">4</a></li> -->
                               @if($posts->currentPage()!=$posts->lastPage())
                                  <li>
                                      <a class="next-arrow" href="{{str_replace('/?','?',$posts->url($posts->currentPage()+1))}}" title="2">
                                          Trang sau
                                      </a>
                                  </li>
                              @endif
                           </ul>
                             
                        </div>
                     </div>
                  </div>
                  */
                  ?>
               </div>
            </div>
         </div>
      </section>
      <script type="text/javascript">
          $("#sortBy").change(function(){
                 $("#filter_product").submit();
          });
      </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien7.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>