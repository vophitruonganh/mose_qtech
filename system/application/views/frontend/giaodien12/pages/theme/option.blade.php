@extends('backend.layouts.default')
@section('titlePage','Theme Option')
@section('content')
<form action="{{ url('admin/template/option') }}" method="post">
  @include('backend.includes.token')
  <div class="theme">

    <!-- Youtube -->
    <div id="youtube">
      <div><strong>Youtube:</strong></div>
      <div>Heading: <input type="text" name="youtube[heading]" value="{{ $optionValue['youtube']['heading'] }}" /></div>
      <div>Url: <input type="text" name="youtube[url]" value="{{ $optionValue['youtube']['url'] }}" /></div>
    </div>
    <br/>
    <!-- End Youtube -->

    <!-- Policy -->
    <div id="policy">
      <div><strong>Policy:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['policy'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Text: <input type="text" name="policy[{{ $i }}][text]" value="{{ $row['text'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Policy -->

    <!-- Rules -->
    <div id="rules">
      <div><strong>Rules:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="rules[heading]" value="{{ $optionValue['rules']['heading'] }}" /></div>
      <br/>
      <?php unset($optionValue['rules']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['rules'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Text: <input type="text" name="rules[{{ $i }}][text]" value="{{ $row['text'] }}" /></div>
          <div>Url: <input type="text" name="rules[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Rules -->

    <!-- Guide -->
    <div id="guide">
      <div><strong>Guide:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="guide[heading]" value="{{ $optionValue['guide']['heading'] }}" /></div>
      <br/>
      <?php unset($optionValue['guide']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['guide'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Text: <input type="text" name="guide[{{ $i }}][text]" value="{{ $row['text'] }}" /></div>
          <div>Url: <input type="text" name="guide[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Guide -->

    <!-- Service -->
    <div id="service">
      <div><strong>Service:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="service[heading]" value="{{ $optionValue['service']['heading'] }}" /></div>
      <br/>
      <?php unset($optionValue['service']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['service'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Text: <input type="text" name="service[{{ $i }}][text]" value="{{ $row['text'] }}" /></div>
          <div>Url: <input type="text" name="service[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Service -->

    <br/>
    <div><input type="submit" value="Save" /></div>
  </div>
</form>

<script type="text/javascript">
  $(document).ready(function(){

    // Policy
    $('#policy .addRow').click(function(){
      var numberMaxElement = parseInt($('#policy .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Text: <input type="text" name="policy['+numberMaxElement+'][text]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#policy .block').append(row);
      return false;
    });
    $('.theme').on('click','#policy .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Rules
    $('#rules .addRow').click(function(){
      var numberMaxElement = parseInt($('#rules .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Text: <input type="text" name="rules['+numberMaxElement+'][text]" value="" /></div>';
      row += '<div>Url: <input type="text" name="rules['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#rules .block').append(row);
      return false;
    });
    $('.theme').on('click','#rules .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Guide
    $('#guide .addRow').click(function(){
      var numberMaxElement = parseInt($('#guide .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Text: <input type="text" name="guide['+numberMaxElement+'][text]" value="" /></div>';
      row += '<div>Url: <input type="text" name="guide['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#guide .block').append(row);
      return false;
    });
    $('.theme').on('click','#guide .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Service
    $('#service .addRow').click(function(){
      var numberMaxElement = parseInt($('#service .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Text: <input type="text" name="service['+numberMaxElement+'][text]" value="" /></div>';
      row += '<div>Url: <input type="text" name="service['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#service .block').append(row);
      return false;
    });
    $('.theme').on('click','#service .remove',function(){
      $(this).parent().remove();
      return false;
    });

  }); 
</script>
@stop