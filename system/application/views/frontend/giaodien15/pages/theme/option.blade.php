@extends('backend.layouts.default')
@section('titlePage','Theme Option')
@section('content')
<form action="{{ url('admin/template/option') }}" method="post">
  @include('backend.includes.token')
  <div class="theme">
      
    
    
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
    
     <!-- opendoor -->
    <div id="opendoor">
      <div><strong>GIờ mở cửa:</strong></div>
      <div>Heading: <input type="text" name="opendoor[heading]" value="{{ $optionValue['opendoor']['heading'] }}" /></div>
      <div>Url: <input type="text" name="opendoor[url]" value="{{ $optionValue['opendoor']['url'] }}" /></div>
      <div>Image: <input type="text" name="opendoor[image]" value="{{ $optionValue['opendoor']['image'] }}" /></div>
      <div>Text Area: 
          <!--<input type="text" name="opendoor[textArea]" value="{{ $optionValue['opendoor']['textArea'] }}" />-->
          <textarea type="text" name="opendoor[textArea]" rows="5" cols="80">{{ $optionValue['opendoor']['textArea'] }}
            </textarea>
      </div>
    </div>
     </br>
    <!-- End First Banner -->
    
    <!-- New -->
   <div id="new">
      <div><strong>New:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['new'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Image: <input type="text" name="new[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          <div>Url: <input type="text" name="new[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End New -->
    
     
    

    <br/>
    <div><input type="submit" value="Save" /></div>
  </div>
</form>

<script type="text/javascript">
  $(document).ready(function(){
    // Đối tác
    $('#doitac .addRow').click(function(){
      var numberMaxElement = parseInt($('#doitac .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" name="doitac['+numberMaxElement+'][image]" value="" /></div>';
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
    
    // new
    $('#new .addRow').click(function(){
      var numberMaxElement = parseInt($('#new .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Class: <input type="text" name="new['+numberMaxElement+'][class]" value="" /></div>';
      row += '<div>Url: <input type="text" name="new['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#new .block').append(row);
      return false;
    });
    $('.theme').on('click','#new .remove',function(){
      $(this).parent().remove();
      return false;
    });


  });
</script>
@stop