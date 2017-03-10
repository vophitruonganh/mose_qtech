@extends('frontend.giaodien1.layouts.default')
@section('content')
          <section class="collection">
                <div class="page-heading">
                    <div class="container">
                            <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h1>{{$category_name}}</h1>
                                    </div>
                            </div>
                    </div>
                </div>
                <div class="collection-page">
                    <div class="container">
                       <div class="row">
                          <div class="col-lg-12">
                             <ul class="breadcrumb">
                                <li><a href="/">Trang chủ</a></li>
                                <!-- blog -->
                                <li class="active breadcrumb-title">{{$category_name}}</li>
                                <!-- current_tags -->
                             </ul>
                          </div>
                           
                          <div class="col-lg-3 sidebar">
                             	@include('frontend.giaodien1.includes.left')
                          </div>
                          <div class="col-lg-9">
                            <div class="blog-articles">
                               <div class="row">
                                  <div class="col-lg-12">
                                  	@foreach($posts as $post)
	                                  	 <article class="article-item">
	                                        <a href="{{url('news/'.$post->post_slug.'.html')}}">
	                                           <h3>{{$post->post_title}}</h3>
	                                        </a>
	                                        <nav class="article-item-info">
	                                           <ul>
	                                              <li><i class="fa fa-calendar-minus-o"></i><time>{{date('d-m-Y',$post->post_date)}}</time></li>
	                                              <li>
	                                                 <p><i class="fa fa-user"></i>QM Theme</p>
	                                              </li>
                                                @if($post->comment_status == 'yes')
	                                              <li>
	                                              	<p style="cursor: pointer;" class="comments" slug="{{$post->post_slug}}" >  <span class="fb-comments-count" data-href="{{url('news/'.$post->post_slug.'.html')}}">0</span> Bình luận</p>
	                                              </li>
                                                @endif
	                                           </ul>
	                                        </nav>
	                                        <a class="article-item-image" href="{{url('news/'.$post->post_slug.'.html')}}">
	                                        <img src="{{ asset('template/giaodien1/images/10r5192-e0eb16c0-fdba-4d32-8f49-e543914f2f5a.jpg') }}" alt="{{$post->post_title}}">
	                                        </a>
	                                        <p class="article-item-summary"></p>
	                                        <p style="text-align: justify;">{{$post->post_excerpt}}</p>
	                                        <p></p>
	                                        
	                                        <div class="fb-comments fb-comments-{{$post->post_slug}}" data-href="{{ url('news/'.$post->post_slug.'.html') }}" data-width="100%" data-numposts="4" style="display:none"></div>
	                                     </article>
                                    @endforeach
                                  </div>
                                   {{$posts->render()}}
                                  
                               </div>
                            </div>
                            </div>
                           <!-- end ms-9-->
                       </div> <!-- end row-->
                    </div> <!-- end container-->
                 </div>
          </section>
         
			
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6";
		  fjs.parentNode.insertBefore(js, fjs);
		  }
		  (document, 'script', 'facebook-jssdk'));
    		$(".comments").on('click', function() {
    			 var btn = $(this);
    		     $(".fb-comments-"+ $(btn).attr('slug')).toggle();
    		});
		</script>
  @stop