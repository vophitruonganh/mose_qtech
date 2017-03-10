 <!-- CATEGORIES WIDGET -->
<?php $list_tax = get_taxonomy_post('post_category') ?>
@if($list_tax)
<h3 class="strong-header">
    Danh mục bài viết
</h3>
<div class="categories-widget">
    <ul class="list-unstyled">
        @foreach($list_tax as $tax)
        <li><a href="{{$tax->taxonomy_slug}}">{{$tax->taxonomy_name}}</a></li>
        @endforeach
    </ul>
</div>
@endif
<!-- !CATEGORIES WIDGET -->

<!-- RECENT POSTS WIDGET -->
<?php $posts = get_post_cat_limit('','3' ) ?>
@if($posts)
<h3 class="strong-header">
    Bài viết mới
</h3>
<div class="recent-posts-widget">
    <ul class="list-unstyled">
        @foreach($posts as $post)
        <li>
            <h5><a href="{{url($post->post_slug)}}">{{$post->post_title}}</a></h5>
            <span class="date">{{date('d/m/Y',$post->post_date)}}</span>
        </li>
        @endforeach
   
    </ul>
</div>
@endif
<!-- !RECENT POSTS WIDGET -->