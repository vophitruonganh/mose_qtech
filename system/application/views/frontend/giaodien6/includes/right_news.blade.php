<div class="blog-sidebar">
	<?php $posts = get_taxonomy_post('post_category'); ?>
	@if( $posts )
  <div class="blog-title-sidebar">
     <span>Danh mục bài viết</span>
  </div>
  <ul class="blog-lists">
  		@foreach( $posts as $post)
     <li>
        <a href="{{ url($post->taxonomy_slug) }}" title="{{ $post->taxonomy_name }}">{{ $post->taxonomy_name }}</a>
     </li>
    	@endforeach
  </ul>
  	@endif
</div>
<div class="blog-sidebar">
	<?php
      $posts = get_post_cat_limit($post_slug_2,5);
      $headingText = get_taxonomy_name($post_type_2,$post_slug_2);
      if( $headingText == '' ) $headingText = 'Bài viết Mới';
    ?>
    @if( $posts )
  <div class="blog-title-sidebar">
     <span>{{ $headingText }}</span>
  </div>
  <ul class="blog-list-articles">
  	@foreach($posts as $post)
     <li class="clearfix">
        <div class="blog-item-image">
           <a href="{{ url($post->post_slug) }}" title="{{ $post->post_title }}">
           <img src="{{ get_image_url($post->post_image) }}" alt="{{ $post->post_title }}">
           </a>
        </div>
        <div class="blog-item-title">
           <a href="{{ url($post->post_slug) }}" title="{{ $post->post_title }}">
              <h2>{{ $post->post_title }}</h2>
           </a>
           <p>
              Ngày:{{ date('d/m/Y',$post->post_date) }}
           </p>
        </div>
     </li>
    @endforeach
  </ul>
  @endif
</div>

<div class="clearfix mt10 text-center">
   <a href="{{ $fifthBanner['url'] }}">
   <img src="{{ $fifthBanner['image'] }}">
   </a>
</div>
<div class="clearfix mt10 text-center">
   <a href="{{ $sixthBanner['url'] }}">
   <img src="{{ $sixthBanner['image'] }}">
   </a>
</div>