<?php $__env->startSection('content'); ?>
<div id="maincontainer">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo e(url('/')); ?>" target="_self">Trang chủ</a></li>
            <li class="active"><span><?php echo e($slug_name); ?></span></li>
        </ul>
        <div class="row">
            <!-- Sidebar Start-->
            <aside class="col-lg-3">
              <div class="sidewidt">
                 <h2 class="heading2"><span>Danh mục bài viết </span></h2>
                 <ul class="nav nav-list categories">
                    <?php $list_cat = get_taxonomy_post('post_category'); ?>
                    <?php if(count($list_cat)>0): ?>
                      <?php $__currentLoopData = $list_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                          <li class=""><a href="<?php echo e(url($cat->taxonomy_slug)); ?>"><?php echo e(ucfirst($cat->taxonomy_name)); ?></a></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    <?php endif; ?>
                 </ul>
              </div>

              <div class="sidewidt">
                 <h2 class="heading2"><span> Nhãn bài viết </span></h2>
                 <ul class="nav nav-list categories">
                    <?php $list_cat = get_taxonomy_post('post_tag'); ?>
                    <?php if(count($list_cat)>0): ?>
                      <?php $__currentLoopData = $list_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                          <li class=""><a href="<?php echo e(url($cat->taxonomy_slug)); ?>"><?php echo e($cat->taxonomy_name); ?></a></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    <?php endif; ?>
                 </ul>
              </div>
                <!-- New Categories -->
                <!-- Widget 55555 -->
                <?php /* {!!showWidget('widget55555')!!} */ ?>
                <!--
                <div class="sidewidt">
                   <h2 class="heading2"><span>Danh mục tin tức </span></h2>
                   <ul class="nav nav-list categories">
                      <li class=""><a href="/blogs/thoi-trang-nu">Thời trang nữ</a></li>
                      <li class=""><a href="/blogs/thoi-trang-nam">Thời trang nam</a></li>
                      <li class=""><a href="/blogs/tin-cong-nghe">Tin công nghệ</a></li>
                   </ul>
                </div>
                -->
                <!-- End Widget 55555 -->

                <!--Begin: Bài viết mới nhất-->
                <!-- Widget 66666 -->
                <?php /*   {!!showWidget('widget66666')!!} */ ?>
                <!--
                <div class="sidewidt">
                   <h2 class="heading2"><span>Bài viết mới nhất </span></h2>
                   <div class="tab-content sideblog">
                      <ul>
                         <li>
                            <img width="50" height="50" src="http://www.elle.vn/wp-content/uploads/2015/07/14/bo-suu-tap-thoi-trang-pre-fall-dior-fithteen-490x367.jpg" alt="Bộ sưu tập thời trang Christian Dior Pre-Fall 2015" class="sideblogimage">
                            <a href="/blogs/news/1000039149-bo-suu-tap-thoi-trang-christian-dior-pre-fall-2015" class="blogtitle">Bộ sưu tập thời trang Christian Dior Pre-Fall 2015</a>
                            <div class="">
                               <span class="mr10"><i class="fa-calendar"></i> 14/08/2015  </span>
                            </div>
                         </li>
                         <li>
                            <img width="50" height="50" src="http://www.elle.vn/wp-content/uploads/2015/07/02/qu%E1%BA%A7n-jeans-n%E1%BB%AF-%C4%91en-1.jpg" alt="Bí quyết phối đồ với quần jeans nữ của Kendall Jenner" class="sideblogimage">
                            <a href="/blogs/news/1000039148-bi-quyet-phoi-do-voi-quan-jeans-nu-cua-kendall-jenner" class="blogtitle">Bí quyết phối đồ với quần jeans nữ của Kendall Jenner</a>
                            <div class="">
                               <span class="mr10"><i class="fa-calendar"></i> 14/08/2015  </span>
                            </div>
                         </li>
                         <li>
                            <img width="50" height="50" src="http://www.elle.vn/wp-content/uploads/2015/08/07/B-trng-Gio-dc-New-Zealand-i-s-v-Jenifer-Phm-490x326.jpg" alt="New Zealand và Việt Nam: Kết nối văn hóa qua thời trang" class="sideblogimage">
                            <a href="/blogs/news/1000039147-new-zealand-va-viet-nam-ket-noi-van-hoa-qua-thoi-trang" class="blogtitle">New Zealand và Việt Nam: Kết nối văn hóa qua thời trang</a>
                            <div class="">
                               <span class="mr10"><i class="fa-calendar"></i> 14/08/2015  </span>
                            </div>
                         </li>
                         <li>
                            <img width="50" height="50" src="http://www.elle.vn/wp-content/uploads/2015/07/21/thoi-trang-thiet-ke-anh-minh-hoa-490x490.jpg" alt="Vì sao nên chọn thời trang thiết kế ." class="sideblogimage">
                            <a href="/blogs/news/1000038277-vi-sao-nen-chon-thoi-trang-thiet-ke" class="blogtitle">Vì sao nên chọn thời trang thiết kế .</a>
                            <div class="">
                               <span class="mr10"><i class="fa-calendar"></i> 10/08/2015  </span>
                            </div>
                         </li>
                      </ul>
                   </div>
                </div>
                -->
                <!--End: Bài viết mới nhất-->
                <!-- End Widget 66666 -->
               

                <!-- Tag Post -->
                <!-- Widget 77777 -->
                <?php /* {!!showWidget('widget77777')!!} */?>
                <!--
                <div class="sidewidt">
                   <h2 class="heading2"><span>Tags</span></h2>
                   <ul class="tags">
                      <li>
                         <a href="http://alluare-theme.myharavan.com/blogs/news/tagged/tinh-do-thoi-trang"> <i class="fa-tag"></i> tính đồ thời trang</a>
                      </li>
                      <li>
                         <a href="http://alluare-theme.myharavan.com/blogs/news/tagged/gu-thoi-trang"> <i class="fa-tag"></i> Gu thời trang</a>
                      </li>
                   </ul>
                </div>
                -->
                <!-- End Widget 77777 -->
            </aside>
            <!-- Sidebar End-->
            <div class="col-lg-9 bloggrid">
                <h1 class="heading1"><span class="maintext"><?php echo e($slug_name); ?></span></h1>
                <ul class="thumbnails">
                    <?php $i = 0; ?>
                    <?php $__currentLoopData = $dataNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <?php $i++; ?>
                    <li class="col-lg-4 col-sm-4">
                        <div class="thumbnail">
                            <a href="<?php echo e(url($data->post_slug)); ?>" class="minhieght" style="height: 200px;"><img src="<?php echo e(get_image_url($data->post_image)); ?>" alt="<?php echo e($data->post_title); ?>"><span class="viewfancypopup">&nbsp;</span></a>
                            <div class="caption">
                                <a href="<?php echo e(url($data->post_slug)); ?>" class="bloggridtitle"><?php echo e(!empty($data->post_title)? $data->post_title: 'No title'); ?></a>               
                                <div class="author">Người đăng : <a href="#"><?php echo e((!empty($data->user_fullname)) ? $data->user_fullname : $data->user_email); ?></a>
                                </div>
                                <div>
                                    <span class="mr10"><i class="fa-calendar"></i><?php echo e(date('d-m-Y',$data->post_date)); ?></span>
                                    <!-- <span class="mr10"><a href="/blogs/news/1000039149-bo-suu-tap-thoi-trang-christian-dior-pre-fall-2015#comments"><i class="fa-comment"></i> 0 <em> Bình luận </em></a></span> -->
                                    <br>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php if( $i%3 == 0 ): ?>
                    <li><div class="clearfix"></div></li>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </ul>
                <!-- Paging-->
                <div class="row">
                    <div class="pull-right">
                        <?php echo e($dataNews->render()); ?>

                        <?php
                        /*
                        <ul class="pagination pull-right">
                            @if($dataNews->currentPage()!=1)
                            <li>
                                <a class="prev fa fa-angle-left" href="{{ $dataNews->url($dataNews->currentPage()-1) }}"><span>Trang trước</span></a>
                            </li>
                            @endif
                            <li>
                            @for($i=1;$i<=$dataNews->lastPage();$i=$i+1)
                                @if( $dataNews->currentPage() == $i )
                                <span class="page-node current">{{ $i }}</span>
                                @else
                                <a class="page-node" href="{{ $dataNews->url($i) }}">{{ $i }}</a>
                                @endif
                            @endfor
                            </li>
                            @if($dataNews->currentPage()!=$dataNews->lastPage())
                            <li class="">
                                <a href="{{ $dataNews->url($dataNews->currentPage()+1) }}">Trang sau</a>
                            </li>
                            @endif
                        </ul>
                        */
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien10.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>