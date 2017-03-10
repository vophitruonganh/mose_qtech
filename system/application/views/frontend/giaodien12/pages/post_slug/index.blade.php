@extends('frontend.giaodien12.layouts.default')
@section('content')
            
<div class="header-breadcrumb">
    <div class="container">
        <div class="row ">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="/" title="Trang chủ">Trang chủ</a>
                    </li>
                    <li class="active breadcrumb-title">Tin tức</li>
                </ol>
            </div>
        </div>
    </div>
</div> 


<section class="mtb25">
<div class="container">
<div class="row">
           <!--dong o left-->

<div class="megamenu-right col-md-9 col-md-push-3">
   <div class="row">

      <section class="section-blog">
         <div class="section-blog-title">
            <h1 class="section-blog-title-heading">{{$slug_name}}</h1>
         </div>
          @foreach($dataNews as $data)
            <?php 
                $username = (!empty($data->user_nickname)) ? $data->user_nickname : $data->user_email;
                $value    = decode_serialize($data->meta_value);
            ?>
            <div class="blog-item">
              <div class="col-md-5">
                 <div class="blog-img">
                    <a href="{{url($data->post_slug)}}" title="{{$data->post_title}}"><img src="{{ loadFeatureImage($value['post_featured_image']) }}" alt="{{$data->post_title}}"></a>
                 </div>
              </div>
              <div class="col-md-7">
                 <p class="blog-info">
                    <i class="fa fa-pencil-square-o"></i> {{$username}} 
                    @if($data->comment_status=='yes')
                      <i class="fa fa-comment-o"></i> <span class="fb-comments-count" data-href="{{ url($data->post_slug) }}">0 </span> Bình luận
                    @endif
                 </p>
                 <h3 class="blog-name"><a href="{{url($data->post_slug)}}" title="{{$data->post_title}}">{{$data->post_title}}</a></h3>
                 <p class="blog-description">
                    {{$data->post_excerpt}}
                 </p>
            </div>
         </div>
          @endforeach
         
         
         <div class="col-xs-12">
            <div class="blog-info-page">
               <ul class="pagination pagination-blog">

                  @if($dataNews->currentPage() != 1)
                      <li>
                          <a href="{{ $dataNews->url($dataNews->currentPage()-1) }}" aria-label="Previous"><<</a>
                      </li>
                      @endif
                      @for ($i = 1; $i <= $dataNews->lastPage(); $i++)
                          <li class="{{ ($dataNews->currentPage() == $i) ? 'active' : '' }}">
                              <a href="{{ $dataNews->url($i) }}">{{ $i }}</a>
                          </li>
                      @endfor
                      @if($dataNews->currentPage() != $dataNews->lastPage())
                      <li>
                          <a href="{{ $dataNews->url($dataNews->currentPage()+1) }}" aria-label="Next">>></a>
                      </li>
                    @endif
                 
               </ul>
              
            </div>
         </div>

      </section>

   </div>
</div>
           
           
           
           
<div class="megamenu-left col-md-3 col-md-pull-9">
  <div class="cd-dropdown-wrapper">
    <!-- Danh mục sản phẩm -->
    <!-- Widget 111111 -->
        {!!showWidget('widget111111')!!}
        <!-- End Widget 111111 -->
    <!-- .cd-dropdown -->
  </div>
  <!-- .cd-dropdown-wrapper -->

  <!-- Nhà sản xuất -->
  <!-- Widget 222222 -->
    {!!showWidget('widget222222')!!}
    <!-- End Widget 222222 -->
  
  <!-- Sản phẩm nổi bật -->
  <!-- Widget 333333 -->
    {!!showWidget('widget333333')!!}
    <!-- End Widget 333333 -->
  
  <!-- Video -->
  <!-- Widget 666666 -->
    {!!showWidget('widget666666')!!}
    <!-- End Widget 666666 -->
</div>
</div>
</div>
</section>
<!--dong right-->

       
@stop
