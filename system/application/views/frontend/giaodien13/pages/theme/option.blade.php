@extends('backend.layouts.default')
@section('titlePage','Theme Option')
@section('content')
<form action="{{ url('admin/template/option') }}" method="post">
  @include('backend.includes.token')
  <div class="theme">
    <!-- Vị Trí -->
    <div><strong>Vị Trí:</strong></div>
    <div>Title: <input type="text" name="viTri[title]" value="{{ $optionValue['viTri']['title'] }}" /></div>
    <div>Image: <input type="text" name="viTri[image]" value="{{ $optionValue['viTri']['image'] }}" /></div>
    <div>Text: <textarea name="viTri[text]" >{{ $optionValue['viTri']['text'] }}</textarea></div>
    <br/>
    <br/>
    <!-- End Vị Trí -->

    <!-- Dự Án -->
    <div id="duAn">
      <div><strong>Dự Án:</strong><a class="addRow" href="#">Add</a></div>
      <div>Title: <input type="text" name="duAn[title]" value="{{ $optionValue['duAn']['title'] }}" /></div>
      <br/>
      <?php unset($optionValue['duAn']['title']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['duAn'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Image: <input type="text" name="duAn[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          <div>Text-1: <input type="text" name="duAn[{{ $i }}][text-1]" value="{{ $row['text-1'] }}" /></div>
          <div>Text-2: <input type="text" name="duAn[{{ $i }}][text-2]" value="{{ $row['text-2'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Dự Án -->

    <!-- Comments -->
    <div id="comments">
      <div><strong>Ý Kiến Khách Hàng:</strong><a class="addRow" href="#">Add</a></div>
      <br/>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['comments'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Name: <input type="text" name="comments[{{ $i }}][name]" value="{{ $row['name'] }}" /></div>
          <div>Description: <input type="text" name="comments[{{ $i }}][description]" value="{{ $row['description'] }}" /></div>
          <div>Content: <textarea name="comments[{{ $i }}][content]" >{{ $row['content'] }}</textarea></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Comments -->

    <!-- Tiện Ích -->
    <div id="tienIch">
      <div><strong>Tiện Ích:</strong><a class="addRowDescription" href="#">Add Description</a> - <a class="addRowListImage" href="#">Add List Image</a></div>
      <div>Title: <input type="text" name="tienIch[title]" value="{{ $optionValue['tienIch']['title'] }}" /></div>
      <div>Main Image Larger: <input type="text" name="tienIch[mainImageLarger]" value="{{ $optionValue['tienIch']['mainImageLarger'] }}" /></div>
      <div>Main Image Thumb: <input type="text" name="tienIch[mainImageThumb]" value="{{ $optionValue['tienIch']['mainImageThumb'] }}" /></div>
      <br/>
      <?php $i = 0; ?>
      <div class="blockDescription">
      @foreach( $optionValue['tienIch']['description'] as $row )
        <div class="rowDescription" data-id="{{ $i }}">
          <div>Image: <input type="text" name="tienIch[description][{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          <div>Text: <input type="text" name="tienIch[description][{{ $i }}][text]" value="{{ $row['text'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
      <br/>
      <?php $i = 0; ?>
      <div class="blockListImage">
      @foreach( $optionValue['tienIch']['listImage'] as $row )
        <div class="rowListImage" data-id="{{ $i }}">
          <div>Thumb: <input type="text" name="tienIch[listImage][{{ $i }}][thumb]" value="{{ $row['thumb'] }}" /></div>
          <div>Larger: <input type="text" name="tienIch[listImage][{{ $i }}][larger]" value="{{ $row['larger'] }}" /></div>
          <div>Text: <input type="text" name="tienIch[listImage][{{ $i }}][text]" value="{{ $row['text'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Tiện Ích -->

    <!-- Tùy Chọn Căn Hộ -->
    <div><strong>Tùy Chọn Căn Hộ:</strong></div>
    <div>Title: <input type="text" name="tuyChonCanHo[title]" value="{{ $optionValue['tuyChonCanHo']['title'] }}" /></div>
    <div>Url Title: <input type="text" name="tuyChonCanHo[titleUrl]" value="{{ $optionValue['tuyChonCanHo']['titleUrl'] }}" /></div>
    <div>Url: <input type="text" name="tuyChonCanHo[url]" value="{{ $optionValue['tuyChonCanHo']['url'] }}" /></div>
    <br/>
    <br/>
    <!-- End Tùy Chọn Căn Hộ -->

    <br/>
    <div><input type="submit" value="Save" /></div>
  </div>
</form>

<script type="text/javascript">
  $(document).ready(function(){

    // Dự Án
    $('#duAn .addRow').click(function(){
      var numberMaxElement = parseInt($('#duAn .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" name="duAn['+numberMaxElement+'][image]" value="" /></div>';
      row += '<div>Text-1: <input type="text" name="duAn['+numberMaxElement+'][text-1]" value="" /></div>';
      row += '<div>Text-2: <input type="text" name="duAn['+numberMaxElement+'][text-2]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#duAn .block').append(row);
      return false;
    });
    $('.theme').on('click','#duAn .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Comments
    $('#comments .addRow').click(function(){
      var numberMaxElement = parseInt($('#comments .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Name: <input type="text" name="comments['+numberMaxElement+'][name]" value="" /></div>';
      row += '<div>Description: <input type="text" name="comments['+numberMaxElement+'][description]" value="" /></div>';
      row += '<div>Content: <textarea name="comments['+numberMaxElement+'][content]" ></textarea></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#comments .block').append(row);
      return false;
    });
    $('.theme').on('click','#comments .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Tiện Ích
    $('#tienIch .addRowDescription').click(function(){
      var numberMaxElement = parseInt($('#tienIch .rowDescription').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="rowDescription" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" name="tienIch[description]['+numberMaxElement+'][image]" value="" /></div>';
      row += '<div>Text: <input type="text" name="tienIch[description]['+numberMaxElement+'][text]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#tienIch .blockDescription').append(row);
      return false;
    });

    $('#tienIch .addRowListImage').click(function(){
      var numberMaxElement = parseInt($('#tienIch .rowListImage').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="rowListImage" data-id="'+numberMaxElement+'">';
      row += '<div>Thumb: <input type="text" name="tienIch[listImage]['+numberMaxElement+'][thumb]" value="" /></div>';
      row += '<div>Larger: <input type="text" name="tienIch[listImage]['+numberMaxElement+'][larger]" value="" /></div>';
      row += '<div>Text: <input type="text" name="tienIch[listImage]['+numberMaxElement+'][text]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#tienIch .blockListImage').append(row);
      return false;
    });

    $('.theme').on('click','#tienIch .remove',function(){
      $(this).parent().remove();
      return false;
    });

  }); 
</script>
@stop