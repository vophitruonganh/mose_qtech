<!doctype html>
<!--[if lt IE 7]>
<html class="no-js ie6 oldie" lang="en">
   <![endif]-->
   <!--[if IE 7]>
   <html class="no-js ie7 oldie" lang="en">
      <![endif]-->
      <!--[if IE 8]>
      <html class="no-js ie8 oldie" lang="en">
         <![endif]-->
         <!--[if gt IE 8]><!-->
         <html lang="en">
            <!--<![endif]-->
            <head>
               <?php $favicon = isset($favicon['image']) ? $favicon['image'] : ''; ?>
               <link rel="shortcut icon" href="{{ $favicon }}" type="image/png" />
               <meta charset="utf-8" />
               <!--[if IE]>
               <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
               <![endif]-->
               <title>
                  Saga Hamburg
               </title>
               <meta content='width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=0' name='viewport' />
               <link rel="canonical" href="http://saga-hamburg.myharavan.com/" />
               <meta property="og:type" content="website" />
               <meta property="og:title" content="Saga Hamburg" />
               <meta property="og:image" content="http://hstatic.net/851/1000080851/1000118934/logo.png?v=77" />
               <meta property="og:image" content="https://hstatic.net/851/1000080851/1000118934/logo.png?v=77" />
               <meta property="og:url" content="http://saga-hamburg.myharavan.com/" />
               <meta property="og:site_name" content="Saga Hamburg" />
               <!---------------- Javascript ----------------->
               <script src="{{ asset('template/giaodien6/asset/js/jquery.min.1.11.0.js') }}"></script>
               <script src="{{ asset('template/giaodien6/asset/js/bootstrap.min.js') }}" type='text/javascript'></script>
               <script src="{{ asset('template/giaodien6/asset/js/html5shiv.js') }}"></script>
               <script src="{{ asset('template/giaodien6/asset/js/jquery-migrate-1.2.0.min.js') }}"></script>
               <script src="{{ asset('template/giaodien6/asset/js/option_selection.js') }}" type='text/javascript'></script>
               <script src="{{ asset('template/giaodien6/asset/js/api.jquery.js') }}" type='text/javascript'></script>
               <script data-target=".product-resize" data-parent=".box-product-lists" data-img-box=".image-resize" src="{{ asset('template/giaodien6/asset/js/fixheightproductv2.js') }}"></script>
               <script src="{{ asset('template/giaodien6/asset/js/owl.carousel.js') }}" type='text/javascript'></script>

               <!--Thumb Productdetail-->
               <script src="{{ asset('template/giaodien6/asset/js/jquery.mThumbnailScroller.js') }}" type='text/javascript'></script>
               <!-- Script menu mobile -->
               <script src="{{ asset('template/giaodien6/asset/js/modernizr.custom.js') }}" type='text/javascript'></script>
               <script src="{{ asset('template/giaodien6/asset/js/classie.js') }}" type='text/javascript'></script>
               <script src="{{ asset('template/giaodien6/asset/js/mlpushmenu.js') }}" type='text/javascript'></script>
               <!-- End script menu -->
               <script src="{{ asset('template/giaodien6/asset/js/jquery.elevatezoom.js') }}" type='text/javascript'></script>
               <script src="{{ asset('template/giaodien6/asset/js/jquery.flexslider.js') }}" type='text/javascript'></script>
               <!-- Quickview -->
               <script src="{{ asset('template/giaodien6/asset/js/velocity.js') }}" type='text/javascript'></script>
               <!-- End Quickview -->
               <script src="{{ asset('template/giaodien6/asset/js/jquery.countdown.js') }}" type='text/javascript'></script>
               <script src="{{ asset('template/giaodien6/asset/js/bootstrap-tabdrop.js') }}" type='text/javascript'></script>
               <script src="{{ asset('template/giaodien6/asset/js/script.js') }}" type='text/javascript'></script>
               

               <!---------------- CSS ----------------->
              
               <link href="{{ asset('template/giaodien6/asset/css/bootstrap.min.css') }}" rel='stylesheet' type='text/css'  media='all'  />
               <link href="{{ asset('template/giaodien6/asset/css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'  media='all'  />
               <link href="{{ asset('template/giaodien6/asset/css/jquery.mthumbnailscroller.css') }}" rel='stylesheet' type='text/css'  media='all'  />
               <!---------------- Icon Svg ----------------->
               <svg xmlns="http://www.w3.org/2000/svg" class="hidden">
                  <symbol id="icon-phone-header">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 485.213 485.212">
                        <g>
                           <path d="M242.607,0C108.629,0,0.001,108.628,0.001,242.606c0,133.976,108.628,242.606,242.606,242.606   c133.978,0,242.604-108.631,242.604-242.606C485.212,108.628,376.585,0,242.607,0z M370.719,353.989l-19.425,19.429   c-3.468,3.463-13.623,5.624-13.949,5.624c-61.452,0.536-120.621-23.602-164.095-67.08c-43.593-43.618-67.759-102.998-67.11-164.657   c0-0.028,2.224-9.892,5.689-13.324l19.424-19.427c7.108-7.141,20.762-10.368,30.327-7.168l4.086,1.363   c9.537,3.197,19.55,13.742,22.185,23.457l9.771,35.862c2.635,9.743-0.919,23.604-8.025,30.712l-12.97,12.972   c12.734,47.142,49.723,84.138,96.873,96.903l12.965-12.975c7.141-7.141,20.997-10.692,30.719-8.061l35.857,9.806   c9.717,2.67,20.26,12.62,23.456,22.154l1.363,4.145C381.028,333.262,377.826,346.913,370.719,353.989z" />
                        </g>
                     </svg>
                  </symbol>
                  <symbol id="icon-cart-header">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 573.75 573.75">
                        <g>
                           <g>
                              <polygon points="573.75,141.125 65.236,141.125 132.146,398.166 506.84,398.166"/>
                              <circle cx="185.675" cy="457.612" r="40.147"/>
                              <circle cx="453.312" cy="457.612" r="40.147"/>
                              <path d="M47.011,125.825c6.031-6.12,9.863-12.833,9.863-21.432c0-15.704-12.733-28.403-28.437-28.403    C12.733,75.99,0,88.738,0,104.445s12.733,28.446,28.437,28.446c6.49,0,12.455-2.261,17.237-5.924l0.015-0.006    C46.142,126.615,46.583,125.825,47.011,125.825h-1.566h-0.034H47.011z"/>
                           </g>
                        </g>
                     </svg>
                  </symbol>
                  <symbol id="icon-scrollUp-bottom">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 358.012 358.012">
                        <g>
                           <path d="M179.006,358.012c98.865,0,179.006-80.141,179.006-179.006S277.871,0,179.006,0S0,80.141,0,179.006   S80.141,358.012,179.006,358.012z M84.795,234.54l-8.437-8.437L179,123.455l102.66,102.66l-8.437,8.437L179,140.335L84.795,234.54z"/>
                        </g>
                     </svg>
                  </symbol>
                  <symbol id="icon-search-filter">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 483.083 483.083">
                        <g>
                           <path d="M332.74,315.35c30.883-33.433,50.15-78.2,50.15-127.5C382.89,84.433,298.74,0,195.04,0S7.19,84.433,7.19,187.85    S91.34,375.7,195.04,375.7c42.217,0,81.033-13.883,112.483-37.4l139.683,139.683c3.4,3.4,7.65,5.1,11.9,5.1s8.783-1.7,11.9-5.1    c6.517-6.517,6.517-17.283,0-24.083L332.74,315.35z M41.19,187.85C41.19,103.133,110.04,34,195.04,34    c84.717,0,153.85,68.85,153.85,153.85S280.04,341.7,195.04,341.7S41.19,272.567,41.19,187.85z"/>
                        </g>
                     </svg>
                  </symbol>
                  <symbol id="icon-right-button-addcartfast">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 16 16">
                        <path d="M4 13h2l5-5-5-5h-2l5 5z"/>
                     </svg>
                  </symbol>
                  <symbol id="icon-left-owlCarousel">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 462.73 792.03">
                        <g>
                           <path d="M164.7,396a32.63,32.63,0,0,0,9.44,25.09L570.49,782.33a33.43,33.43,0,0,0,47.1,0,33,33,0,0,0,0-46.87L245.18,396,617.62,56.58a33,33,0,0,0,0-46.87,33.43,33.43,0,0,0-47.1,0L174.17,370.9A32.91,32.91,0,0,0,164.7,396Z" transform="translate(-164.65 0)"/>
                        </g>
                     </svg>
                  </symbol>
                  <symbol id="icon-right-owlCarousel">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 462.73 792.03">
                        <g>
                           <path d="M617.86,370.9L221.51,9.7a33.43,33.43,0,0,0-47.1,0,33,33,0,0,0,0,46.87L546.85,396,174.44,735.45a33,33,0,0,0,0,46.87,33.43,33.43,0,0,0,47.1,0L617.89,421.14A32.63,32.63,0,0,0,627.33,396,32.91,32.91,0,0,0,617.86,370.9Z" transform="translate(-164.65 0)"/>
                        </g>
                     </svg>
                  </symbol>
                  <symbol id="icon-backUrl">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                        <g>
                           <path d="M90,79c0,0-10-48.667-53.875-48.667V11L0,43.276l36.125,33.455V54.94    C59.939,54.94,77.582,57.051,90,79z" s/>
                        </g>
                     </svg>
                  </symbol>
                  <symbol id="icon-delete">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 19.342 19.342">
                        <g>
                           <path d="M2.833,4.491c0,0,0.513,0.491,0.513,0.776v12.568c0,0.832,0.736,1.507,1.645,1.507h9.362    c0.908,0,1.644-0.675,1.644-1.507V5.268c0-0.286,0.515-0.776,0.515-0.776V2.969H2.833V4.491z M12.36,6.23h1.223v9.705H12.36V6.23z     M9.086,6.23h1.22v9.705h-1.22V6.23z M6.137,6.23h1.221v9.705H6.137V6.23z" />
                           <path d="M17.108,1.711h-3.791C13.128,0.74,12.201,0,11.087,0H8.257C7.143,0,6.216,0.74,6.027,1.711H2.235    v0.93h14.873V1.711z M7.297,1.711c0.156-0.344,0.528-0.586,0.96-0.586h2.829c0.433,0,0.804,0.243,0.961,0.586H7.297z" />
                        </g>
                     </svg>
                  </symbol>
                  <symbol id="icon-list-products">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.626 511.626">
                        <g>
                           <path d="M63.953,164.453H9.135c-2.474,0-4.615,0.9-6.423,2.709C0.903,168.972,0,171.114,0,173.589v54.817    c0,2.473,0.903,4.619,2.712,6.424c1.809,1.803,3.949,2.712,6.423,2.712h54.818c2.474,0,4.615-0.905,6.423-2.712    c1.809-1.809,2.712-3.951,2.712-6.424v-54.817c0-2.475-0.904-4.617-2.712-6.427C68.568,165.356,66.427,164.453,63.953,164.453z" />
                           <path d="M63.953,383.722H9.135c-2.474,0-4.615,0.896-6.423,2.707C0.903,388.238,0,390.378,0,392.854v54.82    c0,2.471,0.903,4.609,2.712,6.42c1.809,1.813,3.949,2.714,6.423,2.714h54.818c2.474,0,4.615-0.903,6.423-2.714    c1.809-1.807,2.712-3.949,2.712-6.42v-54.82c0-2.477-0.904-4.616-2.712-6.426C68.568,384.625,66.427,383.722,63.953,383.722z" />
                           <path d="M63.953,274.082H9.135c-2.474,0-4.615,0.91-6.423,2.714S0,280.749,0,283.22v54.815c0,2.478,0.903,4.62,2.712,6.427    c1.809,1.808,3.949,2.707,6.423,2.707h54.818c2.474,0,4.615-0.896,6.423-2.707c1.809-1.807,2.712-3.949,2.712-6.427V283.22    c0-2.471-0.904-4.613-2.712-6.424C68.568,274.989,66.427,274.082,63.953,274.082z" />
                           <path d="M63.953,54.817H9.135c-2.474,0-4.615,0.903-6.423,2.712S0,61.479,0,63.953v54.817c0,2.475,0.903,4.615,2.712,6.424    s3.949,2.712,6.423,2.712h54.818c2.474,0,4.615-0.9,6.423-2.712c1.809-1.809,2.712-3.949,2.712-6.424V63.953    c0-2.475-0.904-4.615-2.712-6.424C68.568,55.725,66.427,54.817,63.953,54.817z" />
                           <path d="M502.49,383.722H118.771c-2.474,0-4.615,0.896-6.423,2.707c-1.809,1.81-2.712,3.949-2.712,6.426v54.82    c0,2.471,0.903,4.609,2.712,6.42c1.809,1.813,3.946,2.714,6.423,2.714H502.49c2.478,0,4.616-0.903,6.427-2.714    c1.81-1.811,2.71-3.949,2.71-6.42v-54.82c0-2.477-0.903-4.616-2.71-6.426C507.106,384.625,504.967,383.722,502.49,383.722z" />
                           <path d="M502.49,274.082H118.771c-2.474,0-4.615,0.91-6.423,2.714s-2.712,3.953-2.712,6.424v54.815    c0,2.478,0.903,4.62,2.712,6.427c1.809,1.808,3.946,2.707,6.423,2.707H502.49c2.478,0,4.616-0.896,6.427-2.707    c1.81-1.807,2.71-3.949,2.71-6.427V283.22c0-2.471-0.903-4.613-2.71-6.424C507.106,274.992,504.967,274.082,502.49,274.082z" />
                           <path d="M508.917,57.529c-1.811-1.805-3.949-2.712-6.427-2.712H118.771c-2.474,0-4.615,0.903-6.423,2.712    s-2.712,3.949-2.712,6.424v54.817c0,2.475,0.903,4.615,2.712,6.424s3.946,2.712,6.423,2.712H502.49c2.478,0,4.616-0.9,6.427-2.712    c1.81-1.809,2.71-3.949,2.71-6.424V63.953C511.626,61.479,510.723,59.338,508.917,57.529z" />
                           <path d="M502.49,164.453H118.771c-2.474,0-4.615,0.9-6.423,2.709c-1.809,1.81-2.712,3.952-2.712,6.427v54.817    c0,2.473,0.903,4.615,2.712,6.424c1.809,1.803,3.946,2.712,6.423,2.712H502.49c2.478,0,4.616-0.905,6.427-2.712    c1.81-1.809,2.71-3.951,2.71-6.424v-54.817c0-2.475-0.903-4.617-2.71-6.427C507.106,165.356,504.967,164.453,502.49,164.453z" />
                        </g>
                     </svg>
                  </symbol>
                  <symbol id="icon-grid-products">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 80.538 80.538">
                        <g>
                           <path d="M0,21.965h21.965V0H0V21.965z M29.287,21.965h21.965V0H29.287V21.965z M58.573,0v21.965h21.965V0H58.573z M0,51.251     h21.965V29.287H0V51.251z M29.287,51.251h21.965V29.287H29.287V51.251z M58.573,51.251h21.965V29.287H58.573V51.251z M0,80.538     h21.965V58.573H0V80.538z M29.287,80.538h21.965V58.573H29.287V80.538z M58.573,80.538h21.965V58.573H58.573V80.538z" />
                        </g>
                     </svg>
                  </symbol>
                  <symbol id="icon-viewmore">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 26.677 26.677">
                        <g>
                           <path d="M0.462,21.883C0.192,21.826,0,21.59,0,21.32C0,11.97,11.1,9.98,13.675,9.644V5.355c0-0.211,0.117-0.406,0.306-0.504   c0.188-0.1,0.413-0.086,0.588,0.027l11.858,7.984c0.156,0.105,0.25,0.281,0.25,0.477c0,0.189-0.094,0.365-0.25,0.473l-11.854,7.983   c-0.176,0.115-0.402,0.127-0.59,0.029c-0.188-0.1-0.303-0.297-0.303-0.506v-4.617c-1.867,0.014-3.409,0.098-4.696,0.252   c-6.166,0.729-7.813,4.432-7.883,4.59l0,0c-0.093,0.213-0.302,0.35-0.526,0.35C0.538,21.892,0.497,21.89,0.462,21.883z" />
                        </g>
                     </svg>
                  </symbol>
               </svg>
               <link href="{{ asset('template/giaodien6/asset/css/checkout.css') }}" rel='stylesheet' type='text/css'  media='all'  />
               <link href="{{ asset('template/giaodien6/asset/css/style.css') }}" rel='stylesheet' type='text/css'  media='all'  />
               <!-- CSS Responsive -->
               <link href="{{ asset('template/giaodien6/asset/css/media.css') }}" rel='stylesheet' type='text/css'  media='all'  />
            </head>
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
               var js, fjs = d.getElementsByTagName(s)[0];
               if (d.getElementById(id)) return;
               js = d.createElement(s); js.id = id;
               js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=1613769142230848";
               fjs.parentNode.insertBefore(js, fjs);
               }(document, 'script', 'facebook-jssdk'));
            </script>
            <body>