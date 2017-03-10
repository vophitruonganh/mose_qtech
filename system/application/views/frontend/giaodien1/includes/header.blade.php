<body>
  <div id="content">
    <header id="header">
    <div class="header-top hidden-xs">
       <div class="container">
          <div class="row">
             <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="header-hotline">
                    <?php
                    /*
                    <p><i class="fa fa-phone"></i> {{isset($header_info['text']) ? $header_info['text']: '' }}</p>
                    */
                    ?>
                    <p><i class="fa fa-phone"></i> {{ $storeSetting['telephone'] }}</p>
                </div>
             </div>
             <div class="col-lg-6 col-md-6 col-sm-6">
                    <form method="get" action="{{url('/index')}}">
                            <div class="form-search">
                              <?php
                                $search = isset($_GET['search']) ? $_GET['search'] : '';
                              ?>
                                    <input type="text" name="search" class="style-form-text search-form-text" value="{{$search}}" placeholder="Bạn muốn tìm kiếm gì">
                                    <button type="submit" class="style-form-submit search-form-submit"><i class="fa fa-search"></i></button>
                            </div>
                    </form>

            </div>
          </div>
       </div>
    </div>
    <div class="header-bottom">
       <div class="container">
          <div class="row">
          <!-- ảnh logo -->
             <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                 <a href="{{ url('/') }}" class="logo"><img src="{{ isset($logo_main['image']) ? $logo_main['image'] : '' }}"></a>
             </div>
          <!--  -->
             <div class="col-lg-9 col-md-8 col-sm-7 hidden-xs">
                <nav class="header-nav-main">
                   <ul>
                      <li class="{{ ((Request::is('/') || Request::is('index.html')) ? 'active' : '') }}">
                         <a href="{{ url('/') }}">Trang chủ</a>
                      </li>
                      <li class="{{ (Request::is('pages/gioi-thieu') ? 'active' : '') }}">
                         <a href="{{ url('pages/gioi-thieu') }}">Giới thiệu</a>
                      </li>
                      <li class="{{ (Request::is('tin-chinh') ? 'active' : '') }}">
                         <a href="{{ url('tin-chinh') }}">Tin Tức</a>
                      </li>
                      <li class="{{ (Request::is('danh-sach-cac-nuoc') ? 'active' : '') }}">
                         <a href="{{ url('danh-sach-cac-nuoc') }}">Danh sách các nước</a>
                         <?php
                         /*
                         <ul class="nav-main-sub">
                            <li>
                               <a href="#collections/all">Danh sách các trường</a>
                            </li>
                            <li>
                               <a href="#frontpage">Các trường mới</a>
                            </li>
                            <li>
                               <a href="#san-pham-noi-bat">Các trường nổi bẩt</a>
                            </li>
                            <li>
                               <a href="#du-hoc-my">Du học Mỹ</a>
                            </li>
                            <li>
                               <a href="#du-hoc-anh">Du học Anh</a>
                            </li>
                            <li>
                               <a href="#du-hoc-uc">Du học Úc</a>
                            </li>
                            <li>
                               <a href="#du-hoc-canada">Du học Canada</a>
                            </li>
                            <li>
                               <a href="#du-hoc-singapore">Du học Singapore</a>
                            </li>
                            <li>
                               <a href="#du-hoc-nhat-ban">Du học Nhật Bản</a>
                            </li>
                            <li>
                               <a href="#cac-nuoc-khac">Các nước khác</a>
                            </li>
                         </ul>
                         */
                         ?>
                      </li>
                      <li class="{{ (Request::is('post_category/hoc-bong.html') ? 'active' : '') }}">
                         <a href="{{url('hoc-bong')}}">Học bổng</a>
                      </li>
                      
                      <li class="{{ (Request::is('post_category/cam-nang-du-hoc.html') ? 'active' : '') }}">
                            <a href="{{url('cam-nang-du-hoc')}}">Cẩm nang du học</a>
                       </li>
                      
                      <li class="{{ (Request::is('pages/contact') ? 'active' : '') }}">
                         <a href="{{ url('pages/contact') }}">Liên hệ</a>
                      </li>
                   </ul>
                </nav>
             </div>
          </div>
       </div>
    </div>
    <div class="nav-bar-mobile">
       <div class="container">
          <div class="row">
             <div class="col-sm-12 col-xs-12">
                <div class="nav-mobile-btn">
                   <a href="#nav-mobile"><i class="fa fa-bars"></i></a>
                </div>
                <div class="mobile-search-btn hidden-xs hidden-sm">
                   <a href="#search"><i class="fa fa-search"></i></a>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div id="nav-mobile">
       <ul>
          <li>
             <a href="{{ url('/') }}">Trang chủ</a>
          </li>
          <li>
             <a href="{{ url('pages/gioi-thieu') }}">Giới thiệu</a>
          </li>
          <li>
             <a href="{{ url('danh-sach-cac-nuoc') }}">Danh sách các nước</a>
             <?php
             /*
             <ul>
                <li>
                   <a href="#collections/all">Danh sách các trường</a>
                </li>
                <li>
                   <a href="#frontpage">Các trường mới</a>
                </li>
                <li>
                   <a href="#san-pham-noi-bat">Các trường nổi bẩt</a>
                </li>
                <li>
                   <a href="#du-hoc-my">Du học Mỹ</a>
                </li>
                <li>
                   <a href="#du-hoc-anh">Du học Anh</a>
                </li>
                <li>
                   <a href="#du-hoc-uc">Du học Úc</a>
                </li>
                <li>
                   <a href="#du-hoc-canada">Du học Canada</a>
                </li>
                <li>
                   <a href="#du-hoc-singapore">Du học Singapore</a>
                </li>
                <li>
                   <a href="#du-hoc-nhat-ban">Du học Nhật Bản</a>
                </li>
                <li>
                   <a href="#cac-nuoc-khac">Các nước khác</a>
                </li>
             </ul>
             */ ?>
          </li>
          <li>
             <a href="{{url('hoc-bong')}}">Học bổng</a>
          </li>
        
          <li>
             <a href="{{ url('pages/contact') }}">Liên hệ</a>
          </li>
       </ul>
    </div>
 </header>