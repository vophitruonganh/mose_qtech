@extends('backend.layouts.default')
@section('titlePage','Theme Option')
@section('content')
<form action="{{ url('admin/template/option') }}" method="post">
  @include('backend.includes.token')
  <div class="theme">

    <!-- image_sidebar -->
    <div id="image_sidebar">
      <div><strong>Image_sidebar:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['image_sidebar'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Image: <input type="text" name="image_sidebar[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End image_sidebar -->

    <!-- first_banner -->
    <div id="first_banner">
      <div><strong>First_banner:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['first_banner'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Image: <input type="text" name="first_banner[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End first_banner -->

    <!-- second_banner -->
    <div id="second_banner">
      <div><strong>Second_banner:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['second_banner'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Image: <input type="text" name="second_banner[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End second_banner -->

   <!-- payment -->
    <div id="payment">
      <div><strong>Payment:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="payment[heading]" value="{{ $optionValue['payment']['heading'] }}" /></div>
      <br/>
      <?php unset($optionValue['payment']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['payment'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Image: <input type="text" name="payment[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End payment -->

    <!-- support -->
    <div id="support">
      <div><strong>Support:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="support[heading]" value="{{ $optionValue['support']['heading'] }}" /></div>
      <div>Image: <input type="text" name="support[image]" value="{{ $optionValue['support']['image'] }}" /></div>
      <br/>
      <?php unset($optionValue['support']['heading']); ?>
      <?php unset($optionValue['support']['image']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['support'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Text: <input type="text" name="support[{{ $i }}][text]" value="{{ $row['text'] }}" /></div>
          <div>Phone: <input type="text" name="support[{{ $i }}][phone]" value="{{ $row['phone'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End support -->

    <!-- information -->
    <div id="information">
      <div><strong>Information:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="information[heading]" value="{{ $optionValue['information']['heading'] }}" /></div>
      <br/>
      <?php unset($optionValue['information']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['information'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Text: <input type="text" name="information[{{ $i }}][text]" value="{{ $row['text'] }}" /></div>
          <div>Url: <input type="text" name="information[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End information -->

    <!-- contact -->
    <div id="contact">
      <div><strong>Contact:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="contact[heading]" value="{{ $optionValue['contact']['heading'] }}" /></div>
      <br/>
      <?php unset($optionValue['contact']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['contact'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Text: <input type="text" name="contact[{{ $i }}][text]" value="{{ $row['text'] }}" /></div>
          <div>Url: <input type="text" name="contact[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End contact -->

    <!-- policy -->
    <div id="policy">
      <div><strong>Policy:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="policy[heading]" value="{{ $optionValue['policy']['heading'] }}" /></div>
      <br/>
      <?php unset($optionValue['policy']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['policy'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Text: <input type="text" name="policy[{{ $i }}][text]" value="{{ $row['text'] }}" /></div>
          <div>Url: <input type="text" name="policy[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End policy -->

    <!-- facebook -->
    <div id="facebook">
      <div><strong>Facebook:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['facebook'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>url: <input type="text" name="facebook[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End facebook -->

    <!-- branch -->
    <div id="branch">
      <div><strong>Branch:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="branch[heading]" value="{{ $optionValue['branch']['heading'] }}" /></div>
      <br/>
      <?php unset($optionValue['branch']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['branch'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Address: <input type="text" name="branch[{{ $i }}][address]" value="{{ $row['address'] }}" /></div>
          <div>Phone: <input type="text" name="branch[{{ $i }}][phone]" value="{{ $row['phone'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End branch -->

    <!-- map -->
    <div id="map">
      <div><strong>Map:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['map'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Src: <input type="text" name="map[{{ $i }}][src]" value="{{ $row['src'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End map -->

    <br/>
    <div><input type="submit" value="Save" /></div>
  </div>
</form>

<script type="text/javascript">
  $(document).ready(function(){
    // image_sidebar
    $('#image_sidebar .addRow').click(function(){
      var numberMaxElement = parseInt($('#image_sidebar .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" name="image_sidebar['+numberMaxElement+'][image]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#image_sidebar .block').append(row);
      return false;
    });
    $('.theme').on('click','#image_sidebar .remove',function(){
      $(this).parent().remove();
      return false;
    });
    //End image sidebar

    // first_banner
    $('#first_banner .addRow').click(function(){
      var numberMaxElement = parseInt($('#first_banner .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" name="first_banner['+numberMaxElement+'][image]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#first_banner .block').append(row);
      return false;
    });
    $('.theme').on('click','#first_banner .remove',function(){
      $(this).parent().remove();
      return false;
    });
    //End first_banner

    // second_banner
    $('#second_banner .addRow').click(function(){
      var numberMaxElement = parseInt($('#second_banner .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" name="second_banner['+numberMaxElement+'][image]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#second_banner .block').append(row);
      return false;
    });
    $('.theme').on('click','#second_banner .remove',function(){
      $(this).parent().remove();
      return false;
    });
    //End second_banner

    // payment
    $('#payment .addRow').click(function(){
      var numberMaxElement = parseInt($('#payment .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" name="payment['+numberMaxElement+'][image]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#payment .block').append(row);
      return false;
    });
    $('.theme').on('click','#payment .remove',function(){
      $(this).parent().remove();
      return false;
    });
    // End payment

    // support
    $('#support .addRow').click(function(){
      var numberMaxElement = parseInt($('#support .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Text: <input type="text" name="support['+numberMaxElement+'][text]" value="" /></div>';
      row += '<div>Phone: <input type="text" name="support['+numberMaxElement+'][phone]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#support .block').append(row);
      return false;
    });
    $('.theme').on('click','#support .remove',function(){
      $(this).parent().remove();
      return false;
    });
    // End support

    // information
    $('#information .addRow').click(function(){
      var numberMaxElement = parseInt($('#information .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Text: <input type="text" name="information['+numberMaxElement+'][text]" value="" /></div>';
      row += '<div>Url: <input type="text" name="information['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#information .block').append(row);
      return false;
    });
    $('.theme').on('click','#information .remove',function(){
      $(this).parent().remove();
      return false;
    });
    // End information

    // contact
    $('#contact .addRow').click(function(){
      var numberMaxElement = parseInt($('#contact .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Text: <input type="text" name="contact['+numberMaxElement+'][text]" value="" /></div>';
      row += '<div>Url: <input type="text" name="contact['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#contact .block').append(row);
      return false;
    });
    $('.theme').on('click','#contact .remove',function(){
      $(this).parent().remove();
      return false;
    });
    // End contact

    // policy
    $('#policy .addRow').click(function(){
      var numberMaxElement = parseInt($('#policy .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Text: <input type="text" name="policy['+numberMaxElement+'][text]" value="" /></div>';
      row += '<div>Url: <input type="text" name="policy['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#policy .block').append(row);
      return false;
    });
    $('.theme').on('click','#policy .remove',function(){
      $(this).parent().remove();
      return false;
    });
    // End policy

    // facebook
    $('#facebook .addRow').click(function(){
      var numberMaxElement = parseInt($('#facebook .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Url: <input type="text" name="facebook['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#facebook .block').append(row);
      return false;
    });
    $('.theme').on('click','#facebook .remove',function(){
      $(this).parent().remove();
      return false;
    });
    //End image sidebar


    // branch
    $('#branch .addRow').click(function(){
      var numberMaxElement = parseInt($('#branch .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Address: <input type="text" name="branch['+numberMaxElement+'][address]" value="" /></div>';
      row += '<div>Phone: <input type="text" name="branch['+numberMaxElement+'][phone]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#branch .block').append(row);
      return false;
    });
    $('.theme').on('click','#branch .remove',function(){
      $(this).parent().remove();
      return false;
    });
    // End branch


    // map
    $('#map .addRow').click(function(){
      var numberMaxElement = parseInt($('#map .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Src: <input type="text" name="map['+numberMaxElement+'][src]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#map .block').append(row);
      return false;
    });
    $('.theme').on('click','#map .remove',function(){
      $(this).parent().remove();
      return false;
    });
    // End map

  }); 
</script>
@stop