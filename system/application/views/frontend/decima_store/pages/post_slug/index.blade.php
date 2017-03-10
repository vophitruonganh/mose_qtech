@extends('frontend.decima_store.layouts.default')
@section('content')

        <div class="full-width section-emphasis-1 page-header">
            <div class="container">
                <header class="row">
                    <div class="col-md-12">
                        <h1 class=" pull-left">
                            {{ $slug_name }}
                        </h1>
                        <!-- BREADCRUMBS -->
                        <ul class="breadcrumbs list-inline pull-right">
                            <li><a href="{{url('/')}}">Home</a></li><!--
                            --><li>{{ $slug_name }}</li>
                        </ul>
                        <!-- !BREADCRUMBS -->
                    </div>
                </header>
            </div>
        </div><!-- !full-width -->
            <!-- !FULL WIDTH -->
            <!-- !SECTION EMPHASIS 1 -->

        <div class="container">
            <div class="row">
                <div class="col-md-9 space-right-30">
                    <div class="row">
                        @foreach( $dataNews as $data )
                        <?php 
                            $title = !empty($data->post_title)? $data->post_title: 'No title';
                            $excerpt = !empty($data->post_excerpt) ? $data->post_excerpt : get_excerpt($data->post_content,40);
                            $date = date('d/m/Y', $data->post_date);
                        ?>
                        <div class="col-md-12 article-wrapper">
                            <!-- POST TYPE STANDARD -->
                            <article class="post-preview post-preview-image">
                                <a href="{{ url($data->post_slug) }}">
                                    <img src="{{ get_image_url($data->post_image) }}"  alt="Blog post image">
                                </a>
                                <header class="post-info-name-date-comments">
                                    <span class="date">{{$date}}</span>&nbsp;&nbsp;
                                    <h2><a href="{{ url($data->post_slug) }}">{{$title}}</a></h2>
                                </header>
                                <p>{{$excerpt}}</p>
                                <a href="{{ url($data->post_slug) }}" class="btn btn-default btn-small read-more">Đọc tiếp</a>
                            </article>
                            <!-- !POST TYPE STANDARD -->
                        </div>
                        @endforeach

                        <div class="col-md-12 article-wrapper">
                            <!-- PAGER -->
                            <nav>
                                <div class="pager">
                                    <ul class="list-inline">
                                        @if($dataNews->currentPage()!=1)
                                        <li class="prev">
                                            <a class="icon-decima-small-arrow-left" href="{{ $dataNews->url($dataNews->currentPage()-1) }}"><span class="sr-only">Prev</span></a>
                                        </li>
                                        @endif
                                      
                                        @for($i=1;$i<=$dataNews->lastPage();$i=$i+1)
                                            <li {{($dataNews->currentPage()==$i)? 'class="active"' : ''}}><a href="{{str_replace('/?','?',$dataNews->url($i))}}">{{$i}}</a></li>
                                        @endfor
                                 
                                        @if($dataNews->currentPage()!=$dataNews->lastPage())
                                        <li class="next">
                                            <a class="icon-decima-small-arrow-right" href="{{ $dataNews->url($dataNews->currentPage()+1) }}"><span class="sr-only">Next</span></a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </nav>
                            <!-- !PAGER -->
                        </div>
                    </div>
                </div>

                <div class="col-md-3">

                    <!-- SEARCH WIDGET -->
                    <div class="search-widget">
                        <form role="search">
                            <div class="form-group">
                                <label class="sr-only" for="page-search">Type your search here</label>
                                <input type="search" id="page-search" class="form-control">
                            </div><!-- no whitespace
                            --><button class="btn btn-default page-search">
                                <span class="fa fa-search">
                                    <span class="sr-only">Search</span>
                                </span>
                            </button>
                        </form>
                    </div>
                    <!-- !SEARCH WIDGET -->

                    @include('frontend.decima_store.includes.sidebar_blog')


                </div>
            </div>
        </div>
    </section>


@stop