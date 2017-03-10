@extends('backend.layouts.default')
@section('titlePage','Theme Option')
@section('content')
<form action="{{ url('admin/template/option') }}" method="post">
  @include('backend.includes.token')
  <div class="theme">
      
    <!-- First Advertise -->
    <div id="firstAdvertise">
      <div><strong>First Advertise:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['firstAdvertise'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Image: <input type="text" name="firstAdvertise[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          <div>Url: <input type="text" name="firstAdvertise[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End First Advertise -->
    
     <!-- First Banner -->
    <div id="firstBanner">
      <div><strong>First Banner:</strong></div>
      <div>Text: <input type="text" name="firstBanner[text]" value="{{ $optionValue['firstBanner']['text'] }}" /></div>
      <div>Url: <input type="text" name="firstBanner[url]" value="{{ $optionValue['firstBanner']['url'] }}" /></div>
      <div>Image: <input type="text" name="firstBanner[image]" value="{{ $optionValue['firstBanner']['image'] }}" /></div>
    </div>
    <br/>
    <!-- End First Banner -->
    
    <!-- Second Banner -->
    <div id="secondBanner">
      <div><strong>Second Banner:</strong></div>
      <div>Text: <input type="text" name="secondBanner[text]" value="{{ $optionValue['secondBanner']['text'] }}" /></div>
      <div>Url: <input type="text" name="secondBanner[url]" value="{{ $optionValue['secondBanner']['url'] }}" /></div>
      <div>Image: <input type="text" name="secondBanner[image]" value="{{ $optionValue['secondBanner']['image'] }}" /></div>
    </div>
    <br/>
    <!-- End Second Banner -->

    <!-- Third Banner -->
    <div id="thirdBanner">
      <div><strong>Third Banner:</strong></div>
      <div>Text: <input type="text" name="thirdBanner[text]" value="{{ $optionValue['thirdBanner']['text'] }}" /></div>
      <div>Url: <input type="text" name="thirdBanner[url]" value="{{ $optionValue['thirdBanner']['url'] }}" /></div>
      <div>UrlShopping: <input type="text" name="thirdBanner[urlShopping]" value="{{ $optionValue['thirdBanner']['urlShopping'] }}" /></div>
      <div>Image: <input type="text" name="thirdBanner[image]" value="{{ $optionValue['thirdBanner']['image'] }}" /></div>
    </div>
    <br/>
    <!-- End Third Banner -->
    
     <!-- Facebook -->
    <div id="facebook">
      <div><strong>Facebook:</strong></div>
      <div>Url: <input type="text" name="facebook[url]" value="{{ $optionValue['facebook']['url'] }}" /></div>
    </div>
    <br/>
    <!-- End Facebook -->
      
    <br/>
    <div><input type="submit" value="Save" /></div>
  </div>
</form>

<script type="text/javascript">
  $(document).ready(function(){

    // Advertise
    $('#firstAdvertise .addRow').click(function(){
      var numberMaxElement = parseInt($('#firstAdvertise .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" name="firstAdvertise['+numberMaxElement+'][image]" value="" /></div>';
      row += '<div>Url: <input type="text" name="firstAdvertise['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#firstAdvertise .block').append(row);
      return false;
    });
    $('.theme').on('click','#firstAdvertise .remove',function(){
      $(this).parent().remove();
      return false;
    });

  });
</script>
@stop