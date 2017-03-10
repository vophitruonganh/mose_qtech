<div class="hom-slider">
            <div class="container">
               <div id="sequence">
                  <div class="sequence-prev"><i class="fa fa-angle-left"></i></div>
                  <div class="sequence-next"><i class="fa fa-angle-right"></i></div>
                  <ul class="sequence-canvas">
                     <?php $slider = isset($slider) ? $slider: []; ?>
                     @foreach( $slider as $row )
                     <li class="animate-in">
                        <div class="flat-caption caption1 formLeft delay300 text-center"><span class="suphead">{!! $row['caption_1']!!}</span></div>
                        <div class="flat-caption caption2 formLeft delay400 text-center">
                           <h1>{!! $row['caption_2']!!}</h1>
                        </div>
                        <div class="flat-caption caption3 formLeft delay500 text-center">
                           {!! $row['caption_3']!!}
                        </div>
                        <div class="flat-button caption4 formLeft delay600 text-center"><a class="more" href="{{$row['url']}}">More Details</a></div>
                        <div class="flat-image formBottom delay200" data-duration="5" data-bottom="true"><img src="{{$row['image']}}" alt=""></div>
                     </li>
                     @endforeach

                    

                  </ul>
               </div>
            </div>
            <div class="promotion-banner">
               <div class="container">
                  <div class="row">
                     <?php $promotion_banner = isset($promotion_banner) ? $promotion_banner: []; ?>
                     @foreach( $promotion_banner as $row )
                     <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="promo-box"><img src="{{$row['image']}}" alt=""></div>
                     </div>
                     @endforeach
                  </div>
               </div>
            </div>
         </div>