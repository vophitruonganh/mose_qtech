@extends('frontend.giaodien5.layouts.default')
@section('content')
  
   <div id="article" class="mt60 clearfix">
   @if(count($post)>0)
   <?php 
      $username = (!empty($post->user_nickname)) ? $post->user_nickname : $post->user_email;
      $date     = date('d/m/Y',$post->post_date);
    ?>
   <div class="container">
      <div class="row-fluid">
         <div class="row">
            <div class="col-md-9 articles clearfix">
               <h1>{{$post->post_title}}</h1>
               <div class="content-page">
                  <div class="clearfix">
                     <p class="time pull-left">Đăng bởi:{{$username}} - {{$date}}</p>
                     @if($post->comment_status == 'yes')
                     <div class="socials pull-right">
                        <div class="fb-like fb_iframe_widget" data-href="{{url($post->post_slug)}}" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=&amp;container_width=0&amp;href=http%3A%2F%2Fcompany-plus.myharavan.com%2Fblogs%2Fdu-an%2Fsolar-systems&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true"><span style="vertical-align: bottom; width: 121px; height: 20px;"><iframe name="f1fa7238d814f78" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/v2.4/plugins/like.php?action=like&amp;app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2Fbz-D0tzmBsw.js%3Fversion%3D42%23cb%3Df35981f1c6a16b8%26domain%3Dcompany-plus.myharavan.com%26origin%3Dhttps%253A%252F%252Fcompany-plus.myharavan.com%252Ff2c705b36dab618%26relation%3Dparent.parent&amp;container_width=0&amp;href=http%3A%2F%2Fcompany-plus.myharavan.com%2Fblogs%2Fdu-an%2Fsolar-systems&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true" style="border: none; visibility: visible; width: 121px; height: 20px;" class=""></iframe></span></div>
                     </div>
                     @endif
                  </div>
                  <div class="body-content">
                     {!!$post->post_content!!}
                  </div>
               </div>
            </div>
            <div class="col-md-3 clearfix">
                 <?php $list_tax = get_taxonomy_post( 'post_category') ?>
                  @if($list_tax)
                  <div class="widget category">
                       <h4 class="title">
                          Danh mục
                       </h4>
                       <ul class="list">
                          @foreach($list_tax as $tax)
                          <li><a href="{{url($tax->taxonomy_slug)}}"><i class="fa fa-angle-right"></i>{{$tax->taxonomy_name}}</a></li>
                          @endforeach
                       </ul>
                    </div>
                    @endif

              <?php $list_tax = get_taxonomy_post( 'post_tag') ?>
              @if($list_tax)
                    <div class="widget tags">
                       <h4 class="title">
                          Tags
                       </h4>
                       <ul class="list">
                        @foreach($list_tax as $tax)
                          <li><a href="{{url($tax->taxonomy_slug)}}"><i class="fa fa-angle-right"></i>{{$tax->taxonomy_name}}</a></li>
                          @endforeach
                       </ul>
              </div>
              @endif
            </div>
         </div>
      </div>
   </div>
   @endif
</div>  
      

@stop