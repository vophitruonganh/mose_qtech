@extends('frontend.giaodien6.layouts.default')
@section('content')            

<?php 
      if(count($post)>0)
      {
            $username = (!empty($post->user_nickname)) ? $post->user_nickname : $post->user_email;
            $date     = date('d/m/Y',$post->post_date);
            $time     = date('h:iA',$post->post_date);
      } 
               
            
 ?>
<main class="padding-top-mobile">
   <div class="header-navigate">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
               <ol class="breadcrumb breadcrumb-arrow">
                  <li><a href="{{url('/')}}" target="_self">Trang chủ</a></li>
                  <li><i class="fa fa-angle-right"></i></li>
                  <!--
                  <li><a href="{{url('news.html')}}">Blog - Tin tức</a></li>
                  <li><i class="fa fa-angle-right"></i></li>
                  -->
                  <li class="active"><span>{{ $post->post_title }}</span></li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <div id="article">
      <div class="container">
         <div class="row">
         <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 pd5">
         @if(count($post)>0)
            <h1>{{$post->post_title}}</h1>
            <p class="info-created-at-article">
                  Ngày:{{$date}} lúc {{$time}}
            </p>

            <div class="info-description-article clearfix">
                {!!$post->post_content!!}      
            </div>
               <div class="info-author-article">{{$username}}</div>
         @endif
            
               
               
               
               @if($post->comment_status == 'yes')
               <div class="info-socials-article clearfix">
                  <div class="box-like-socials-article">
                     <div class="fb-send fb_iframe_widget" data-href="{{url($post->post_slug)}}" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=1613769142230848&amp;container_width=0&amp;href={{url($post->post_slug)}}&amp;locale=vi_VN&amp;sdk=joey"><span style="vertical-align: bottom; width: 48px; height: 20px;"><iframe name="f3c2b7609d76f2c" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:send Facebook Social Plugin" src="https://www.facebook.com/v2.5/plugins/send.php?app_id=1613769142230848&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2Fbz-D0tzmBsw.js%3Fversion%3D42%23cb%3Df2748e970bd277c%26domain%3Dsaga-hamburg.myharavan.com%26origin%3Dhttps%253A%252F%252Fsaga-hamburg.myharavan.com%252Ff3e7b4d0ecbee3c%26relation%3Dparent.parent&amp;container_width=0&amp;href=https%3A%2F%2Fsaga-hamburg.myharavan.com%2Fblogs%2Fnews%2F1000118948-5-kieu-giay-ban-nen-tau-du-truoc-tuoi-35&amp;locale=vi_VN&amp;sdk=joey" style="border: none; visibility: visible; width: 48px; height: 20px;" class=""></iframe></span></div>
                  </div>
                  <div class="box-like-socials-article">
                     <div class="fb-like fb_iframe_widget" data-href="{{url($post->post_slug)}}" data-layout="button_count" data-action="like" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=1613769142230848&amp;container_width=0&amp;href=https%3A%2F%2Fsaga-hamburg.myharavan.com%2Fblogs%2Fnews%2F1000118948-5-kieu-giay-ban-nen-tau-du-truoc-tuoi-35&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey"><span style="vertical-align: bottom; width: 68px; height: 20px;"><iframe name="fd4d967998fa3c" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/v2.5/plugins/like.php?action=like&amp;app_id=1613769142230848&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2Fbz-D0tzmBsw.js%3Fversion%3D42%23cb%3Dfc88a583ddf07%26domain%3Dsaga-hamburg.myharavan.com%26origin%3Dhttps%253A%252F%252Fsaga-hamburg.myharavan.com%252Ff3e7b4d0ecbee3c%26relation%3Dparent.parent&amp;container_width=0&amp;href=https%3A%2F%2Fsaga-hamburg.myharavan.com%2Fblogs%2Fnews%2F1000118948-5-kieu-giay-ban-nen-tau-du-truoc-tuoi-35&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey" style="border: none; visibility: visible; width: 68px; height: 20px;" class=""></iframe></span></div>
                  </div>
                  <div class="box-like-socials-article">
                     <div class="fb-share-button fb_iframe_widget" data-href="{{url($post->post_slug)}}" data-layout="button_count" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=1613769142230848&amp;container_width=0&amp;href=https%3A%2F%2Fsaga-hamburg.myharavan.com%2Fblogs%2Fnews%2F1000118948-5-kieu-giay-ban-nen-tau-du-truoc-tuoi-35&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey"><span style="vertical-align: bottom; width: 77px; height: 20px;"><iframe name="f305f03b583c16c" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:share_button Facebook Social Plugin" src="https://www.facebook.com/v2.5/plugins/share_button.php?app_id=1613769142230848&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2Fbz-D0tzmBsw.js%3Fversion%3D42%23cb%3Df287ff8f0cf105c%26domain%3Dsaga-hamburg.myharavan.com%26origin%3Dhttps%253A%252F%252Fsaga-hamburg.myharavan.com%252Ff3e7b4d0ecbee3c%26relation%3Dparent.parent&amp;container_width=0&amp;href=https%3A%2F%2Fsaga-hamburg.myharavan.com%2Fblogs%2Fnews%2F1000118948-5-kieu-giay-ban-nen-tau-du-truoc-tuoi-35&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey" style="border: none; visibility: visible; width: 77px; height: 20px;" class=""></iframe></span></div>
                  </div>
                  <div class="box-like-socials-article">
                     <div class="g-plusone" data-href="{{url($post->post_slug)}}" data-size="medium">
                     </div>
                  </div>
               </div>
               <div class="info-title-comment"><i class="fa fa-comment-o"></i>BÌNH LUẬN</div>
               <div class="info-box-comment">
                  <div class="container-fluid">
                     <div id="fb-root"></div>
                     <div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid" data-href="{{url($post->post_slug)}}" data-numposts="5" width="100%" data-colorscheme="light" fb-xfbml-state="rendered"><span style="height: 173px;"><iframe id="f17d7c96ee1ce64" name="f14b41b8466cecc" scrolling="no" title="Facebook Social Plugin" class="fb_ltr fb_iframe_widget_lift" src="https://www.facebook.com/plugins/comments.php?api_key=1613769142230848&amp;channel_url=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2Fbz-D0tzmBsw.js%3Fversion%3D42%23cb%3Df237e66e94a4988%26domain%3Dsaga-hamburg.myharavan.com%26origin%3Dhttps%253A%252F%252Fsaga-hamburg.myharavan.com%252Ff3e7b4d0ecbee3c%26relation%3Dparent.parent&amp;colorscheme=light&amp;href=http%3A%2F%2Fsaga-hamburg.myharavan.com%2Fblogs%2Fnews%2F1000118948-5-kieu-giay-ban-nen-tau-du-truoc-tuoi-35&amp;locale=vi_VN&amp;numposts=5&amp;sdk=joey&amp;skin=light&amp;version=v2.5&amp;width=100%25" style="border: none; overflow: hidden; height: 173px; width: 100%;"></iframe></span></div>
                     <!-- script comment fb -->
                     <script type="text/javascript">(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
                        fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
                     </script>
                  </div>
               </div>
               @endif
               
               <!-- Widget 999a -->
                      {!!showWidget('widget999a')!!}
                <!-- End Widget 999a -->

            </div>



            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pd5">
               @include('frontend.giaodien6.includes.right_news')
            </div>
         </div>
      </div>
   </div>
</main>

@stop                        