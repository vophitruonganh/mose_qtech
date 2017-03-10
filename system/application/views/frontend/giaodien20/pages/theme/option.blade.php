@extends('backend.layouts.default')
@section('titlePage','Theme Option')
@section('content')
<form action="{{ url('admin/template/option') }}" method="post">
  @include('backend.includes.token')
  <div class="theme">
      

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
      
    <br/>
    
    <!-- Đối tác -->
    <div id="doitac">
      <div><strong>Đối tác:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="doitac[heading]" value="{{ $optionValue['doitac']['heading'] }}" /></div>
      <br/>
      <?php unset($optionValue['doitac']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['doitac'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Image: <input type="text" name="doitac[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          <div>Url: <input type="text" name="doitac[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Đối tác -->
    
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
    
     <!-- CMS -->
    <div id="cms">
      <div><strong>CMS:</strong></div>
      <div>Url: <input type="text" name="cms[url]" value="{{ $optionValue['cms']['url'] }}" /></div>
      <div>Image: <input type="text" name="cms[image]" value="{{ $optionValue['cms']['image'] }}" /></div>
      <div>Text: <input type="text" name="cms[text]" value="{{ $optionValue['cms']['text'] }}" /></div>
      <div>TextArea: 
           <textarea type="text" name="cms[textArea]" rows="5" cols="80">{{ $optionValue['cms']['textArea'] }}
            </textarea>
      </div>
    </div>
    <br/>
    <!-- End First Banner -->
    
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
    
    // Doi tac
    $('#doitac .addRow').click(function(){
      var numberMaxElement = parseInt($('#doitac .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Class: <input type="text" name="doitac['+numberMaxElement+'][class]" value="" /></div>';
      row += '<div>Url: <input type="text" name="doitac['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#doitac .block').append(row);
      return false;
    });
    $('.theme').on('click','#doitac .remove',function(){
      $(this).parent().remove();
      return false;
    });
    
    
    
  });
</script>
@stop