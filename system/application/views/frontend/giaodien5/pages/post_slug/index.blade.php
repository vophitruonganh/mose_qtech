@extends('frontend.giaodien5.layouts.default')
@section('content')
<div id="blog" class="mt60">
   <div class="container">
      <h1>{{$slug_name}}</h1>
      <div class="row clearfix">
         <div class="col-md-9 blog-container">
            <div class="row clearfix">
	            @if(count($dataNews)>0)
	            	@foreach($dataNews as $data)
	            	<?php
	            		$username = (!empty($data->user_fullname)) ? $data->user_fullname : $data->user_email;
	                    $date     =  date('d/m/Y',$data->post_date); 
	                    $excerpt  = !empty($data->post_excerpt) ? $data->post_excerpt : get_excerpt($data->post_content,30);
	            	 ?>
	            	  <div class="col-xs-12 col-sm-12">
	                  <div class="article-loop">
	                     <div class="image">
	                        <a href="{!! url($data->post_slug) !!}"><img src="{{get_image_url($data->post_image)}}" alt="{{$data->post_title}}"></a>
	                     </div>
	                     <div class="info">
	                        <h3>
	                           <a href="{!! url($data->post_slug) !!}">{{$data->post_title}}</a>
	                        </h3>
	                        <p class="time">Đăng bởi:{{$username}} - {{$date}}</p>
	                        <p class="des">{{$data->post_excerpt}}</p>
	                        <a href="{!! url($data->post_slug) !!}" class="view-more">Đọc tiếp</a>
	                     </div>
	                  </div>
	                </div>
	            	@endforeach
	            @endif
           </div>
         	
           	<div class="paginations">
           		{{ $dataNews->links() }}
           	</div>

         	<?php
         	/*
            @if ($dataNews->lastPage() > 1)
	            <div class="paginations">
	                <ul>
	                    @if($dataNews->currentPage() != 1)
	                    <li>
	                        <a href="{{ $dataNews->url($dataNews->currentPage()-1) }}">Trang Trước</a>
	                    </li>
	                    @endif
	                    @for ($i = 1; $i <= $dataNews->lastPage(); $i++)
	                        <li class="{{ ($dataNews->currentPage() == $i) ? 'current' : '' }}">
	                            <a href="{{ $dataNews->url($i) }}">{{ $i }}</a>
	                        </li>
	                    @endfor
	                    @if($dataNews->currentPage() != $dataNews->lastPage())
	                    <li>
	                        <a href="{{ $dataNews->url($dataNews->currentPage()+1) }}" >Trang Sau</a>
	                    </li>
	                    @endif
	                </ul>
	            </div>
            @endif
            */
            ?>

         </div>
         <div class="col-md-3">
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
           	  		<li><a href="{{url($tax->taxonomy_slug)}}">{{$tax->taxonomy_name}}</a></li>
           	  		@endforeach
               </ul>
            </div>
            @endif
         </div>
      </div>
   </div>
</div>     
@stop