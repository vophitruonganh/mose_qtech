</div>
<!--mo the o header-->
<footer>
  <div class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="copyright">
            <p>Copyright &copy; 2016 Park place. <a target='_blank' href='http://qmtech.com.vn/'>Powered by QM-Tech</a>.</p>
          </div>
        </div>
        <div class="col-lg-6 ">
          <ul class="social">
            @foreach( $social as $row )
            <li><a href="{{ $row['url'] }}"><i class="fa {{ $row['class'] }}"></i></a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<script>
  $('body').scrollspy({target: "#navbar", offset:50});
  
  /**
  * Scroll Spy meet WordPress menu.
  */
  // Only fire when not on the homepage
  //console.log(window.location.pathname);
  // bỏ giaodien14/
  if (window.location.pathname !== "/") {
  // Selector for top nav a elements
  $('.navbar-main a').each( function() {
      if (this.hash.indexOf('#') === 0) {
          // Alert this to an absolute link (pointing to the correct section on the hompage)
          this.href = "/" + this.hash;
      }
  });
  }
  
  $('.navbar-main ul li a').click( function() {
  target = $(this).attr('href');
  offset = $(target).offset();
  $('body,html').animate({ scrollTop : offset.top }, 700);
  event.preventDefault();
  });
</script>

<!-- Right -->
<div class="navi-right">
  <ul class="nav-user">
    <li>
      <a class="phone" style="text-align: left !important;" href="#">{{ $rightMenu['telephone'] }}</a>
    </li>
    <li><a class="giahoa-logo" href="{{ $rightMenu['link']['url'] }}" target="_blank">{{ $rightMenu['link']['text'] }}</a></li>
    <li><a class="video  popup_iframe" href="#" data-toggle="modal" data-target="#video-clip">{{ $rightMenu['video']['text'] }}</a></li>
    <div id="video-clip" class="modal fade modal-tien-ich" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-wrapper">
            <div class="entry-content">
              <div class="body-page">
                <iframe src="{{ $rightMenu['video']['youtube'] }}" width="100%" height="450" data-mce-src="{{ $rightMenu['video']['youtube'] }}"></iframe>
              </div>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <li class="open">
      <a class="open" href="#" data-toggle="modal" data-target="#time-open" >{{ $rightMenu['openDoor']['text'] }}</a>
    </li>
    <div id="time-open" class="modal fade modal-tien-ich" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-wrapper">
            <div class="title">
              <h3 class="article_header">{{ $rightMenu['openDoor']['text'] }}</h3>
            </div>
            <div class="entry-content">
              <div class="body-page">
                <table width="100%" style="border-spacing: 0px; border-color: transparent; border-collapse: inherit; width: 640px; font-family: 'Open Sans', sans-serif; font-size: 12px; line-height: 18px;" data-mce-selected="1">
                  <tbody>
                    <tr>
                      <td style="padding: 10px;" class="mce-item-selected"><img class="aligncenter wp-image-640 size-full" src="{{ $rightMenu['openDoor']['image'] }}" alt="" width="179" height="127" style="height: auto; max-width: 100%; vertical-align: middle; clear: both; display: block; margin: 7px auto;"></td>
                      <td style="padding: 10px;" class="mce-item-selected">
                        {!! $rightMenu['openDoor']['text1'] !!}
                      </td>
                      <td style="padding: 10px;">
                        {!! $rightMenu['openDoor']['text2'] !!}
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div id="mceResizeHandlen" data-mce-bogus="all" class="mce-resizehandle" unselectable="true" style="cursor: n-resize; margin: 0px; padding: 0px; left: 324.5px; top: 4.5px;"></div>
                <div id="mceResizeHandlee" data-mce-bogus="all" class="mce-resizehandle" unselectable="true" style="cursor: e-resize; margin: 0px; padding: 0px; left: 644.5px; top: 85px;"></div>
                <div id="mceResizeHandles" data-mce-bogus="all" class="mce-resizehandle" unselectable="true" style="cursor: s-resize; margin: 0px; padding: 0px; left: 324.5px; top: 165.5px;"></div>
                <div id="mceResizeHandlew" data-mce-bogus="all" class="mce-resizehandle" unselectable="true" style="cursor: w-resize; margin: 0px; padding: 0px; left: 4.5px; top: 85px;"></div>
                <div id="mceResizeHandlenw" data-mce-bogus="all" class="mce-resizehandle" unselectable="true" style="cursor: nw-resize; margin: 0px; padding: 0px; left: 4.5px; top: 4.5px;"></div>
                <div id="mceResizeHandlene" data-mce-bogus="all" class="mce-resizehandle" unselectable="true" style="cursor: ne-resize; margin: 0px; padding: 0px; left: 644.5px; top: 4.5px;"></div>
                <div id="mceResizeHandlese" data-mce-bogus="all" class="mce-resizehandle" unselectable="true" style="cursor: se-resize; margin: 0px; padding: 0px; left: 644.5px; top: 165.5px;"></div>
                <div id="mceResizeHandlesw" data-mce-bogus="all" class="mce-resizehandle" unselectable="true" style="cursor: sw-resize; margin: 0px; padding: 0px; left: 4.5px; top: 165.5px;"></div>
              </div>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </ul>
</div>
<!--end right-->
<!--Scroll to Top-->
<a href="#" class="scrollToTop">
<i class="fa fa-chevron-up"></i>
</a>
<script>
  scrollDirection();
  
  jQuery(document).ready(function() {
     //Check to see if the window is top if not then display button
     jQuery(window).scroll(function() {
             if ($(this).scrollTop() > 100) {
                     $('.scrollToTop').fadeIn();
             } else {
                     $('.scrollToTop').fadeOut();
             }
     });
  
     //Click event to scroll to top
     jQuery('.scrollToTop').click(function() {
             $('html, body').animate({
                     scrollTop: 0
             }, 600);
             return false;
     });
  
  });
</script>
</div>
<!--mo the o header-->
</body>
</html>
<!-- End Right -->