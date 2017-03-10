@extends('frontend.giaodien17.layouts.default')
@section('content')

<div class="fvc" style="float:left;width:100%;">
   <div class="banner_page_list">
      <h1>{{$slug_name}}</h1>
   </div>
   <div class="breadcrumbs">
      <div class="container">
         <ul>
            <li class="home"> <a href="/" title="Trang chủ">Trang chủ &nbsp;</a></li>
            <li><strong>{{$slug_name}}</strong></li>
         </ul>
      </div>
   </div>
   <section class="tzblog-wrap">
      <div class="container">
         
         <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 tzshop-aside">
            <!-- Widget hhhhhhhhh -->
               {!!showWidget('widgethhhhhhhhh')!!}
            <!-- End Widget hhhhhhhhh -->
            
            <!-- Widget iiiiiiiii -->
               {!!showWidget('widgetiiiiiiiii')!!}
            <!-- End Widget iiiiiiiii -->
            
         </div>


         <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="row gird-margin">
               @foreach($dataNews as $data)
                   <?php 
                       $username = (!empty($data->user_nickname)) ? $data->user_nickname : $data->user_email;
                       $date     = date('d/m/Y',$data->post_date);
                       $value    = decode_serialize($data->meta_value);
                   ?>
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <article class="blog-gird-item blog-item blog-gird-item3">
                           <div class="pageblog-thumb">
                              <a href="{{url($data->post_slug)}}"><img alt="{{$data->post_title}}" src="{{ loadFeatureImage($value['post_featured_image']) }}"></a>
                              <a href="{{url($data->post_slug)}}" class="tzblog-view"><i class="fa fa-search"></i></a>
                           </div>
                           <h2><a href="{{url($data->post_slug)}}">{{$data->post_title}}</a></h2>
                           <span class="tzblog-meta">
                           <em><i class="fa fa-user"></i>{{$username}}</em>
                           <em><i class="fa fa-clock-o"></i>{{$date}}</em>
                           </span>
                           <div class="action-button-hiden" style="    text-align: left;">
                              <p></p>
                              <p style="text-align: justify;">{{$data->post_excerpt}}</p>
                              <p></p>
                              <div class="quickviewbtn">
                                 <a style="margin:0px;padding: 13px 40px;" class="color-tooltip" data-toggle="tooltip" href="{{url($data->post_slug)}}" title="Đọc tiếp">Đọc tiếp</a>
                              </div>
                           </div>
                        </article>
                     </div>
               @endforeach
                

                 <div class="tzpagenavi-shop">
                  <ul>
                      @if($dataNews->currentPage()!=1)
                          <li>
                              <a href="{{str_replace('/?','?',$dataNews->url($dataNews->currentPage()-1))}}">
                                  <
                              </a>
                          </li>
                       @endif
                       @for($i=1;$i<=$dataNews->lastPage();$i=$i+1)
                          <li class="{{($dataNews->currentPage()==$i)? 'active' : ''}}">
                              <a href="{{str_replace('/?','?',$dataNews->url($i))}}">{{$i}}</a>
                          </li>
                       @endfor
                       @if($dataNews->currentPage()!=$dataNews->lastPage())
                          <li>
                              <a class="next-arrow" href="{{str_replace('/?','?',$dataNews->url($dataNews->currentPage()+1))}}" title="2">
                                  >
                              </a>
                          </li>
                       @endif
                      
                  </ul>
               </div>
        
              
          
            </div>
            <!--end class row-->
         </div>
      </div>
      <!--end class container-->
   </section>
   <!--end class tzblog-wrap-->
  
</div>

@stop