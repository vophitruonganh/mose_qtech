@extends('backend.layouts.default')
@section('titlePage','Theme Option')
@section('content')
<form action="{{ url('admin/template/option') }}" method="post">
  @include('backend.includes.token')
  <div class="theme">

    <!-- Feature -->
    <div id="feature">
      <div><strong>Feature:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['feature'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Image: <input type="text" name="feature[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          <div>Url: <input type="text" name="feature[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Feature -->

    <!-- About -->
    <div id="about">
      <div><strong>About:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['about'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Class Image: <input type="text" name="about[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          <div>Url: <input type="text" name="about[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          <div>Header: <input type="text" name="about[{{ $i }}][header]" value="{{ $row['header'] }}" /></div>
          <div>Text: <input type="text" name="about[{{ $i }}][text]" value="{{ $row['text'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End About -->

    <!-- Comment -->
    <div id="comment">
      <div><strong>Comment:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['comment'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Image user: <input type="text" name="comment[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          <div>Content: <input type="text" name="comment[{{ $i }}][content]" value="{{ $row['content'] }}" /></div>
          <div>Name: <input type="text" name="comment[{{ $i }}][name]" value="{{ $row['name'] }}" /></div>
          <div>Job: <input type="text" name="comment[{{ $i }}][job]" value="{{ $row['job'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Comment -->

    <!-- partner -->
    <div id="partner">
      <div><strong>Partner:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['partner'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Image: <input type="text" name="partner[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          <div>Url: <input type="text" name="partner[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End partner -->

    <!-- Policy -->
    <div id="policy">
      <div><strong>policy:</strong><a class="addRow" href="#">Add</a></div>
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
    <!-- End Policy -->

    <!-- Provision -->
    <div id="provision">
      <div><strong>Provision:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="provision[heading]" value="{{ $optionValue['provision']['heading'] }}" /></div>
      <br/>
      <?php unset($optionValue['provision']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['provision'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Text: <input type="text" name="provision[{{ $i }}][text]" value="{{ $row['text'] }}" /></div>
          <div>Url: <input type="text" name="provision[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Provision -->

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

    // Feature
    $('#feature .addRow').click(function(){
      var numberMaxElement = parseInt($('#feature .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" name="feature['+numberMaxElement+'][image]" value="" /></div>';
      row += '<div>Url: <input type="text" name="feature['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#feature .block').append(row);
      return false;
    });
    $('.theme').on('click','#feature .remove',function(){
      $(this).parent().remove();
      return false;
    });
    //End featured

    // About
    $('#about .addRow').click(function(){
      var numberMaxElement = parseInt($('#about .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Class image: <input type="text" name="about['+numberMaxElement+'][image]" value="" /></div>';
      row += '<div>Url: <input type="text" name="about['+numberMaxElement+'][url]" value="" /></div>';
      row += '<div>Header: <input type="text" name="about['+numberMaxElement+'][header]" value="" /></div>';
      row += '<div>Text: <input type="text" name="about['+numberMaxElement+'][text]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#about .block').append(row);
      return false;
    });
    $('.theme').on('click','#about .remove',function(){
      $(this).parent().remove();
      return false;
    });
    //End about

    // Comment
    $('#comment .addRow').click(function(){
      var numberMaxElement = parseInt($('#comment .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Image user: <input type="text" name="comment['+numberMaxElement+'][image]" value="" /></div>';
      row += '<div>Content: <input type="text" name="comment['+numberMaxElement+'][content]" value="" /></div>';
      row += '<div>Name: <input type="text" name="comment['+numberMaxElement+'][name]" value="" /></div>';
      row += '<div>Job: <input type="text" name="comment['+numberMaxElement+'][job]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#comment .block').append(row);
      return false;
    });
    $('.theme').on('click','#comment .remove',function(){
      $(this).parent().remove();
      return false;
    });
    //End Comment

    // partner
    $('#partner .addRow').click(function(){
      var numberMaxElement = parseInt($('#partner .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Image : <input type="text" name="partner['+numberMaxElement+'][image]" value="" /></div>';
      row += '<div>Url: <input type="text" name="partner['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#partner .block').append(row);
      return false;
    });
    $('.theme').on('click','#partner .remove',function(){
      $(this).parent().remove();
      return false;
    });
    //End partner

    // Policy
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

    // Provision
    $('#provision .addRow').click(function(){
      var numberMaxElement = parseInt($('#provision .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Text: <input type="text" name="provision['+numberMaxElement+'][text]" value="" /></div>';
      row += '<div>Url: <input type="text" name="provision['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#provision .block').append(row);
      return false;
    });
    $('.theme').on('click','#provision .remove',function(){
      $(this).parent().remove();
      return false;
    });
    // End Provision

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
    // End Guide

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