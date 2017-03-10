@extends('frontend.giaodien9.layouts.default')
@section('content')
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
<div id="page" class="page template-about-us wrapper">
   <div class="banner-page">
      <img src="{{ $background_page[$key]['image'] }}" alt="Giới thiệu">
   </div>
   <div class="fix-width">
      <header class="page-header">
         <h1 class="page-title wow fadeInUp" style="visibility: visible; animation-name: none;">{{ $page->post_title }}</h1>
      </header>
      <div class="style-three-colum">
         <div class="intro-content wow fadeInUp" style="visibility: visible; animation-name: none;">{!! preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $page->post_content) !!}</div>
         <div class="section-boxes">
            <div class="box wow slideInLeft" style="visibility: hidden; animation-name: none;">
               <h3 class="title-box">Tầm nhìn</h3>
               <div class="thumbnail"><img src="//hstatic.net/494/1000041494/10/2015/11-1/tam-nhin.png" data-mce-src="//hstatic.net/494/1000041494/10/2015/11-1/tam-nhin.png"></div>
               <div class="content-box">Với đội ngũ trẻ tuổi và tràn đầy nhiệt huyết, mục tiêu của chúng tôi là trở thành đơn vị chuyên thiết kế website cao cấp, là đối tác hàng đầu của các tổ chức cung cấp dịch vụ thiết kế website chuyên nghiệp tại Việt Nam và nước ngoài.</div>
            </div>
            <div class="box wow slideInUp" style="visibility: hidden; animation-name: none;">
               <h3 class="title-box">Sứ mệnh</h3>
               <div class="thumbnail">
                  <div><img src="//hstatic.net/494/1000041494/10/2015/11-1/su-menh.png" data-mce-src="//hstatic.net/494/1000041494/10/2015/11-1/su-menh.png"></div>
               </div>
               <div class="content-box">Chúng tôi mang đến cho khách hàng những website chất lượng cao với chi phí hợp lý, giúp doanh nghiệp xây dựng thương hiệu và xác lập vị thế của mình. Đồng thời, góp phần khẳng định chất lượng webiste mang thương hiệu Việt.</div>
            </div>
            <div class="box wow slideInRight" style="visibility: hidden; animation-name: none;">
               <h3 class="title-box">Giá trị cốt lõi</h3>
               <div class="thumbnail">
                  <div><img src="//hstatic.net/494/1000041494/10/2015/11-1/gia-tri-cot-loi.png" data-mce-src="//hstatic.net/494/1000041494/10/2015/11-1/gia-tri-cot-loi.png"></div>
               </div>
               <div class="content-box">Chúng tôi làm việc với niềm đam mê và chữ 'tâm' đặt trên tất cả. Tất cả mọi thành viên của Liên Kết Trẻ đều làm việc với tinh thần đoàn kết, sự trung thực, và trách nhiệm cao nhất với công việc và nhiệm vụ của mình.</div>
            </div>
         </div>
      </div>
   </div>
</div>

@stop