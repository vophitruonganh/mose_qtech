@extends('frontend.decima_store.layouts.default')
@section('content')
<?php 
    $title = !empty($post->post_title) ? $post->post_title : 'No title';
    $date = date('d/m/Y', $post->post_date);
    $content = $post->post_content;
?>
        <div class="full-width section-emphasis-1 page-header">
            <div class="container">
                <header class="row">
                    <div class="col-md-12">
                        <h2 class=" pull-left">
                            {{$title}}
                        </h2>
                        <!-- BREADCRUMBS -->
                        <ul class="breadcrumbs list-inline pull-right">
                            <li><a href="{{url('/')}}">Home</a></li><!--
                            --><li>{{$title}}</li>
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
                        <div class="col-md-12 article-wrapper">
                            <!-- POST TYPE STANDARD -->
                            <article class="post post-image">
                                <a href="{{url($post->post_slug)}}">
                                    <img src="{{ get_image_url($post->post_image) }}"  alt="Blog post image">
                                </a>
                                <header class="post-info-name-date-comments">
                                    <span class="date">{{$date}}</span>&nbsp;&nbsp;
                                </header>
                                {!! $content!!}
                            </article>
                            <!-- !POST TYPE STANDARD -->
                        </div>
                    </div>

                    

            
                </div>
                <div class="col-md-3">

                   @include('frontend.decima_store.includes.sidebar_blog')


                </div>
            </div>
        </div>
    </section>


@stop