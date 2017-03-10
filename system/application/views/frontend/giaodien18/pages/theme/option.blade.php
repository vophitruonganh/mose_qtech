@extends('backend.layouts.default')
@section('titlePage','Theme Option')
@section('content')
<form action="{{ url('admin/template/option') }}" method="post">
  @include('backend.includes.token')
  <div class="theme">

    <!-- Advertise -->
    <div id="advertise">
      <div><strong>Advertise:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['advertise'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Image: <input type="text" name="advertise[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          <div>Url: <input type="text" name="advertise[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Advertise -->
    
    <!-- First Banner -->
    <div id="firstBanner">
      <div><strong>First Banner:</strong></div>
      <div>Url: <input type="text" name="firstBanner[url]" value="{{ $optionValue['firstBanner']['url'] }}" /></div>
      <div>Image: <input type="text" name="firstBanner[image]" value="{{ $optionValue['firstBanner']['image'] }}" /></div>
    </div>
    <br/>
    <!-- End First Banner -->
    
    <!-- Facebook -->
    <div id="facebook">
      <div><strong>Facebook:</strong></div>
      <div>Url: <input type="text" name="facebook[url]" value="{{ $optionValue['facebook']['url'] }}" /></div>
    </div>
    <br/>
    <!-- End Facebook -->
    
    <!-- Social -->
    <div id="social">
      <div><strong>Social:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['social'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Class: <input type="text" name="social[{{ $i }}][class]" value="{{ $row['class'] }}" /></div>
          <div>Url: <input type="text" name="social[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Social -->

    <br/>
    <div><input type="submit" value="Save" /></div>
  </div>
</form>

<script type="text/javascript">
  $(document).ready(function(){

    // Advertise
    $('#advertise .addRow').click(function(){
      var numberMaxElement = parseInt($('#advertise .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Class: <input type="text" name="advertise['+numberMaxElement+'][image]" value="" /></div>';
      row += '<div>Url: <input type="text" name="advertise['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#advertise .block').append(row);
      return false;
    });
    $('.theme').on('click','#advertise .remove',function(){
      $(this).parent().remove();
      return false;
    });
    
    // Social
    $('#social .addRow').click(function(){
      var numberMaxElement = parseInt($('#social .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Class: <input type="text" name="social['+numberMaxElement+'][class]" value="" /></div>';
      row += '<div>Url: <input type="text" name="social['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#social .block').append(row);
      return false;
    });
    $('.theme').on('click','#social .remove',function(){
      $(this).parent().remove();
      return false;
    });

  });
</script>
@stop