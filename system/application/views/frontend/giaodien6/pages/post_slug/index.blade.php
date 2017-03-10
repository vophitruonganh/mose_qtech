@extends('frontend.giaodien6.layouts.default')
@section('content')      

<main class="padding-top-mobile">
   <div class="header-navigate">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
               <ol class="breadcrumb breadcrumb-arrow">
                  <li><a href="/" target="_self">Trang chủ</a></li>
                  <li><i class="fa fa-angle-right"></i></li>
                  <li class="active"><span>{{ $slug_name }}</span></li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <div id="blog-template">
      <div class="container">
         <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
               <div class="row">
                  <ul class="col-xs-12 blog-list-articles lists-articles pd5" id="list-articles">
                     @foreach($dataNews as $data)
                        <?php 
                            $username = (!empty($data->user_nickname)) ? $data->user_nickname : $data->user_email;
                            $date     = date('d/m/Y',$data->post_date);
                            $time     = date('h:iA',$data->post_date);
                            $value    = decode_serialize($data->meta_value);
                            
                        ?>
                          <li class="clearfix">
                              <div class="blog-item-image">
                                 <a href="{!! url($data->post_slug) !!}"><img src="{{ get_image_url($data->post_image) }}" alt="{{$data->post_title}}"></a>
                              </div>
                              <div class="blog-item-title">
                                 <a href="{!! url($data->post_slug) !!}" title="{{$data->post_title}}">
                                    <h2>{{$data->post_title}}</h2>
                                 </a>
                                 <p>
                                    Ngày:{{$date}} lúc {{$time}}
                                 </p>
                                 <div class="blog-content-short-description">{{$data->post_excerpt}}</div>
                              </div>
                         </li>
                         <hr>
                     @endforeach
                  </ul>

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
            </div>
            <!--thêm if news_recent_show and -->
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pd5">
              @include('frontend.giaodien6.includes.right_news')
            </div>
         </div>
      </div>
   </div>

</main>


@stop 