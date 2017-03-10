@extends('frontend.decima_store.layouts.default')
@section('content')

        <div class="full-width section-emphasis-1 page-header">
            <div class="container">
                <header class="row">
                    <div class="col-md-12">
                        <h1 class="strong-header pull-left">
                            {{ $page->post_title }}
                        </h1>
                        <!-- BREADCRUMBS -->
                        <ul class="breadcrumbs list-inline pull-right">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li>{{ $page->post_title }} </li>
                        </ul>
                        <!-- !BREADCRUMBS -->
                    </div>
                </header>
            </div>
        </div><!-- !full-width -->
        <div class="container">
            <!-- !FULL WIDTH -->
            <!-- !SECTION EMPHASIS 1 -->


            <section class="row">
            {!! preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $page->post_content) !!}
             </section>


        <!-- !SECTION EMPHASIS 1 -->
        <!-- FULL WIDTH -->
        </div><!-- !container -->
        
        
       
       
    </section>


@stop