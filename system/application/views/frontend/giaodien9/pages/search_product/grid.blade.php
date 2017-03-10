@extends('frontend.giaodien9.layouts.default')
@section('content')

<div id="search">
   <header class="archive-header">
      <h1 class="archive-title">Kết quả tìm kiếm</h1>
   </header>

   <div class="search-content">
   @if(count($posts)>0)
      @foreach($posts as $post)
       <!-- Begin results -->
         <div class="entry results">
         <a href="{{url('collections/'.$post['post_slug'])}}" class="thumb"><img src="{{ loadFeatureImage($post['post_featured_image']) }}" alt="{{$post['post_title']}}"></a>
         <div class="search-result">
            <h3 class="entry-title"><a href="{{url('collections/'.$post['post_slug'])}}" title="">{{$post['post_title']}}</a></h3>
               {{$post['post_excerpt']}}
         </div>
      </div>
      <!-- End results -->
      @endforeach
   @else
         Không tìm thấy sản phẩm nào !
      
   @endif
     
      
      
      
      <div class="navigation clearfix">
        @if($posts->currentPage()!=1)
                 <a class="prev" href="{{str_replace('/?','?',$posts->url($posts->currentPage()-1))}}">
                     Trang trước
                 </a>
         @endif
         @for($i=1;$i<=$posts->lastPage();$i=$i+1)
            @if($posts->currentPage()==$i)
               <span class="page-node page-number current">{{$i}}</span>
              
            @else
               <a class="{{($posts->currentPage()==$i)? 'page-node page-number current' : ''}}" href="{{str_replace('/?','?',$posts->url($i))}}">{{$i}}</a>
            @endif
         @endfor
           
         @if($posts->currentPage()!=$posts->lastPage())
           <a class="next" href="{{str_replace('/?','?',$posts->url($posts->currentPage()+1))}}" title="2">
               Trang sau
           </a>
         @endif
      </div>
   </div>
</div>


@stop             
