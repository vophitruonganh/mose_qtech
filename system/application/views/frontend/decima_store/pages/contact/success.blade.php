@extends('frontend.decima_store.layouts.default')
@section('content')

  <!-- !container -->
  <div class="full-width section-emphasis-1 page-header">
    <div class="container">
      <header class="row">
        <div class="col-md-12">
          <h1 class="strong-header pull-left">
            Contact
          </h1>
          <!-- BREADCRUMBS -->
          <ul class="breadcrumbs list-inline pull-right">
            <li><a href="{{url('/')}}">Home</a></li>
            <!--
                                        -->
            <!--
                                        -->
            <li>Contact us</li>
          </ul>
          <!-- !BREADCRUMBS -->
        </div>
      </header>
    </div>
  </div>
  <!-- !full-width -->
  <div class="container">
    <!-- !FULL WIDTH -->
    <!-- !SECTION EMPHASIS 1 -->


    <!-- FULL WIDTH -->
  </div>
  <!-- !container -->
  <div class="full-width google-map">
    <div id="google-map-1" style="height:350px;">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.203283315302!2d106.65163631435063!3d10.795736992308417!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175293594a7b199%3A0xbfcd85e0efe33de7!2zMTU3IFh1w6JuIEjhu5NuZywgMTIsIFTDom4gQsOsbmgsIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1479806522503" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>      
    </div>
  </div>
  <!-- !full-width -->
  <div class="container">
    <!-- !FULL WIDTH -->

    <section class="row">
      <div class="col-md-8">
        <div class="section-header col-xs-12">
          <hr>
          <h2 class="strong-header">
            Get in touch
          </h2>
        </div>
        <div class="col-xs-12">
         

          <div class="simpleForm">
            <div class="successMessage alert alert-success alert-dismissable" style="display: none">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Thank You! We will contact you shortly.
            </div>
            <div class="errorMessage alert alert-danger alert-dismissable" style="display: none">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Ups! An error occured. Please try again later.
            </div>
             @if( count($errors) > 0 )
              <ul>
                  @foreach( $errors->all() as $error )
                  <li>{{ $error }}</li>
                  @endforeach
              </ul>
            @endif
            <form  action="{{ url('pages/contact') }}" method="post"  >
            Cảm ơn bạn! Email đã được gửi đến nhà quản trị!
            </form>
          </div>
          <!-- / simpleForm -->

        </div>
      </div>
      <div class="col-md-4">
        <div class="space-30"></div>
        <div class="section-emphasis-3 page-info">
          <h3 class="strong-header">
            Contact
          </h3>

          <div class="text-widget">
            <address>
              <a href="mailto:hello@decima.com">hello@decima.com</a><br>
              (022) 1234 5678
            </address>
          </div>
          <br>
          <h3 class="strong-header">
            Location
          </h3>

          <div class="text-widget">
            <address>
              221 Baker Street, London,<br>
              United Kingdom
            </address>
          </div>
        </div>
      </div>
    </section>
  </div>
</section>

@stop