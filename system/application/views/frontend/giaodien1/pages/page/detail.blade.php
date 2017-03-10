@extends('frontend.giaodien1.layouts.default')
@section('content')
<section class="article">
	<?php
		$key = 0;
		foreach( $background_page as $k => $v )
		{
			if( $v['url'] == Request::fullUrl() )
			{
				$key = $k;
				break;
			}
		}
	?>
	<div class="page-heading" style="background-image: url({{ $background_page[$key]['image'] }});">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h1>{{ $page->post_title }}</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="article-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
	<li><a href="/">Trang chủ</a></li>
	<!-- blog -->
	
	<li class="active breadcrumb-title">{{ $page->post_title }}</li>					
	<!-- page.contact -->
	
	<!-- current_tags -->
	
</ul>
				</div>
				<div class="col-lg-12 article-content">
					<article>
						<h2 class="article-title">{{ $page->post_title }}</h2>
						<div class="article-body">
							{!! preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $page->post_content) !!}
						</div>
					</article>
				</div>
			</div>
		</div>
	</div>
</section>
@stop