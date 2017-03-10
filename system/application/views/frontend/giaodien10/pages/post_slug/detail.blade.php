@extends('frontend.giaodien10.layouts.default')
@section('content')
<?php 
$post->post_title = !empty($post->post_title) ? $post->post_title : 'No title'; 
?>
<div id="maincontainer">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{url('/')}}" target="_self">Trang chủ</a></li>
            <li><a href="{{url('tin-chinh')}}" target="_self">Tin tức</a> </li>
            <li class="active"><span>{{$post->post_title}}</span></li>
        </ul>
        <div class="row">
            <!-- Sidebar Start-->
            <aside class="col-lg-3">
                <div class="sidewidt">
                 <h2 class="heading2"><span>Danh mục bài viết </span></h2>
                 <ul class="nav nav-list categories">
                    <?php $list_cat = get_taxonomy_post('post_category'); ?>
                    @if(count($list_cat)>0)
                      @foreach( $list_cat as $cat)
                          <li class=""><a href="{{url($cat->taxonomy_slug)}}">{{$cat->taxonomy_name}}</a></li>
                      @endforeach
                    @endif
                 </ul>
              </div>

              <div class="sidewidt">
                 <h2 class="heading2"><span> Nhãn bài viết </span></h2>
                 <ul class="nav nav-list categories">
                    <?php $list_cat = get_taxonomy_post('post_tag'); ?>
                    @if(count($list_cat)>0)
                      @foreach( $list_cat as $cat)
                          <li class=""><a href="{{url($cat->taxonomy_slug)}}">{{$cat->taxonomy_name}}</a></li>
                      @endforeach
                    @endif
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
            <div class="col-lg-9">
                <!-- Blog start-->   
                <section id="latestblog">
                    <div class="blogdetail">
                        <h2 class="heading2"><span>{{ $post->post_title }}</span></h2>
                        <div class="blogicons">
                            <div class="pull-left">
                                <span class="mr10"><i class="fa-calendar"></i>{{ date('d-m-Y',$post->post_date) }}</span>
                                <!-- <span class="mr10"><a href="#"><i class="fa-comment"></i> 0<span> Bình luận</span> </a></span> -->
                                @if($post->comment_status=='yes')
                                    <i class="fa-comment"></i><span class="fb-comments-count" data-href="{{ url($post->post_slug) }}"></span> nhận xét
                                    <span class="mr10">
                                @endif
                                
                                <em>
                                </em>
                                </span>
                            </div>
                        </div>
                        <ul class="margin-none">
                            <li class="listblcok">
                                <div class="caption">
                                    <!--
                                    <div class="article-details-desc">
                                        <p>GEOX – thương hiệu giày số 1 của Ý với phát minh giày biết thở đã tổ chức buổi họp báo giới thiệu Bộ sưu tập Xuân Hè 2015 dành cho Nam, Nữ và Trẻ em.</p>
                                    </div>
                                    -->
                                    {!! $post->post_content !!}
                                    <div class="author" align="right">Người đăng: <a href="#">{{ (!empty($post->user_fullname)) ? $post->user_fullname : $post->user_email }}</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- Comment face-->
                        @if($post->comment_status=='yes')
                                <div class="fb-comments" data-href="{{ url($post->post_slug) }}" data-numposts="3"></div>
                                <div class="clear"></div>
                        @endif
                      
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@stop