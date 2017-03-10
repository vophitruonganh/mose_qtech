@extends('backend.layouts.default')
@section('titlePage','Theme Option')
@section('content')
<form action="{{ url('admin/template/option') }}" method="post">
  @include('backend.includes.token')
  <div class="theme">

    <!-- Right Menu -->
    <div><strong>Right Menu:</strong></div>
    <div>Telephone: <input type="text" name="rightMenu[telephone]" value="{{ $optionValue['rightMenu']['telephone'] }}" /></div>
    <div>Link:<br />
      Text: <input type="text" name="rightMenu[link][text]" value="{{ $optionValue['rightMenu']['link']['text'] }}" />
      <br/>
      Url: <input type="text" name="rightMenu[link][url]" value="{{ $optionValue['rightMenu']['link']['url'] }}" />
    </div>
    <div>Video:<br />
      Text: <input type="text" name="rightMenu[video][text]" value="{{ $optionValue['rightMenu']['video']['text'] }}" />
      <br/>
      Youtube: <input type="text" name="rightMenu[video][youtube]" value="{{ $optionValue['rightMenu']['video']['youtube'] }}" />
    </div>
    <div>Open Door:<br />
      Text: <input type="text" name="rightMenu[openDoor][text]" value="{{ $optionValue['rightMenu']['openDoor']['text'] }}" />
      <br/>
      Image: <input type="text" name="rightMenu[openDoor][image]" value="{{ $optionValue['rightMenu']['openDoor']['image'] }}" />
      <br/>
      Text1: <textarea name="rightMenu[openDoor][text1]" >{{ $optionValue['rightMenu']['openDoor']['text1'] }}</textarea>
      <br/>
      Text2: <textarea name="rightMenu[openDoor][text2]" >{{ $optionValue['rightMenu']['openDoor']['text2'] }}</textarea>
    </div>
    <br/>
    <br/>
    <!-- End Right Menu -->

    <!-- Description Web -->
    <div><strong>Description Web:</strong></div>
    <div>Title: <textarea name="descriptionWeb[title]" >{{ $optionValue['descriptionWeb']['title'] }}</textarea>
    <div>Content: <textarea name="descriptionWeb[content]" >{{ $optionValue['descriptionWeb']['content'] }}</textarea>
    <div>Image: <input type="text" name="descriptionWeb[image]" value="{{ $optionValue['descriptionWeb']['image'] }}" /></div>
    <br/>
    <br/>
    <!-- End Description Web -->

    <!-- Vị Trí -->
    <div><strong>Vị Trí:</strong></div>
    <div>Text View Google Map: <input type="text" name="viTri[textViewGoogleMap]" value="{{ $optionValue['viTri']['textViewGoogleMap'] }}" /></div>
    <div>Link Google Map: <input type="text" name="viTri[linkGoogleMap]" value="{{ $optionValue['viTri']['linkGoogleMap'] }}" /></div>
    <div>Description: <textarea name="viTri[description]" >{{ $optionValue['viTri']['description'] }}</textarea></div>
    <div>Image: <input type="text" name="viTri[image]" value="{{ $optionValue['viTri']['image'] }}" /></div>
    <br/>
    <br/>
    <!-- End Vị Trí -->

    <!-- Mặt Bằng Căn Hộ -->
    <div id="matBangCanHo">
      <div><strong>Mặt Bằng Căn Hộ:</strong><a class="addRowSlider" href="#">Add Slider</a> - <a class="addRowItem" href="#">Add Item</a></div>
      <div>Text: <textarea name="matBangCanHo[text]" >{{ $optionValue['matBangCanHo']['text'] }}</textarea></div>
      <br/>
      <?php $i = 0; ?>
      <div class="blockSlider">
      @foreach( $optionValue['matBangCanHo']['slider'] as $row )
        <div class="rowSlider" data-id="{{ $i }}">
          <div>Image: <input type="text" name="matBangCanHo[slider][{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
      <br/>
      <?php $i = 0; ?>
      <div class="blockItem">
      @foreach( $optionValue['matBangCanHo']['item'] as $row )
        <div class="rowItem" data-id="{{ $i }}">
          <div>Title: <input type="text" name="matBangCanHo[item][{{ $i }}][title]" value="{{ $row['title'] }}" /></div>
          <div>Url: <input type="text" name="matBangCanHo[item][{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          <div>Image: <input type="text" name="matBangCanHo[item][{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Mặt Bằng Căn Hộ -->

    <!-- Tiện Ích -->
    <div id="tienIch">
      <div><strong>Tiện Ích:</strong><a class="addRowLinkMore" href="#">Add Link</a> - <a class="addRowList" href="#">Add List</a></div>
      <div>Heading: <textarea name="tienIch[heading]" >{{ $optionValue['tienIch']['heading'] }}</textarea></div>
      <br/>
      <?php $i = 0; ?>
      <div class="blockLinkMore">
      @foreach( $optionValue['tienIch']['linkMore'] as $row )
        <div class="rowLinkMore" data-id="{{ $i }}">
          <div>Title: <input type="text" name="tienIch[linkMore][{{ $i }}][title]" value="{{ $row['title'] }}" /></div>
          <div>Url: <input type="text" name="tienIch[linkMore][{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
      <br/>
      <?php $i = 0; ?>
      <div class="blockList">
      @foreach( $optionValue['tienIch']['list'] as $row )
        <div class="rowList" data-id="{{ $i }}">
          <div>Image Hold: <input type="text" name="tienIch[list][{{ $i }}][imageHold]" value="{{ $row['imageHold'] }}" /></div>
          <div>Title: <input type="text" name="tienIch[list][{{ $i }}][title]" value="{{ $row['title'] }}" /></div>
          <div>Image Main: <input type="text" name="tienIch[list][{{ $i }}][imageMain]" value="{{ $row['imageMain'] }}" /></div>
          <div>Description: <input type="text" name="tienIch[list][{{ $i }}][description]" value="{{ $row['description'] }}" /></div>
          <div>Content: <textarea name="tienIch[list][{{ $i }}][content]" >{{ $row['content'] }}</textarea></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Tiện Ích -->

    <!-- Gallery -->
    <div id="gallery">
      <div><strong>Gallery:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="gallery[heading]" value="{{ $optionValue['gallery']['heading'] }}" /></div>
      <br/>
      <?php unset($optionValue['gallery']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['gallery'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Text: <input type="text" name="gallery[{{ $i }}][text]" value="{{ $row['text'] }}" /></div>
          <div>Image Title: <input type="text" name="gallery[{{ $i }}][imageTitle]" value="{{ $row['imageTitle'] }}" /></div>
          <div>Title Url: <input type="titleUrl" name="gallery[{{ $i }}][titleUrl]" value="{{ $row['titleUrl'] }}" /></div>
          <div>Url: <input type="text" name="gallery[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          <div>Image 1: <input type="text" name="gallery[{{ $i }}][image1]" value="{{ $row['image1'] }}" /></div>
          <div>Image 2: <input type="text" name="gallery[{{ $i }}][image2]" value="{{ $row['image2'] }}" /></div>
          <div>Image 3: <input type="text" name="gallery[{{ $i }}][image3]" value="{{ $row['image3'] }}" /></div>
          <div>Image 4: <input type="text" name="gallery[{{ $i }}][image4]" value="{{ $row['image4'] }}" /></div>
          <div>Image 5: <input type="text" name="gallery[{{ $i }}][image5]" value="{{ $row['image5'] }}" /></div>
          <div>Image 6: <input type="text" name="gallery[{{ $i }}][image6]" value="{{ $row['image6'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Gallery -->

    <!-- Map Contact -->
    <div id="mapContact">
      <div><strong>Map Contact:</strong></div>
      <div><input type="text" name="mapContact" value="{{ $optionValue['mapContact'] }}" /></div>
    </div>
    <br/>
    <!-- End Map Contact -->

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

    // Mặt Bằng Căn Hộ
    $('#matBangCanHo .addRowSlider').click(function(){
      var numberMaxElement = parseInt($('#matBangCanHo .rowSlider').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="rowSlider" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" name="matBangCanHo[slider]['+numberMaxElement+'][image]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#matBangCanHo .blockSlider').append(row);
      return false;
    });

    $('#matBangCanHo .addRowItem').click(function(){
      var numberMaxElement = parseInt($('#matBangCanHo .rowItem').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="rowItem" data-id="'+numberMaxElement+'">';
      row += '<div>Title: <input type="text" name="matBangCanHo[item]['+numberMaxElement+'][title]" value="" /></div>';
      row += '<div>Url: <input type="text" name="matBangCanHo[item]['+numberMaxElement+'][url]" value="" /></div>';
      row += '<div>Image: <input type="text" name="matBangCanHo[item]['+numberMaxElement+'][image]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#matBangCanHo .blockItem').append(row);
      return false;
    });

    $('.theme').on('click','#matBangCanHo .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Tiện Ích
    $('#tienIch .addRowLinkMore').click(function(){
      var numberMaxElement = parseInt($('#tienIch .rowLinkMore').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="rowLinkMore" data-id="'+numberMaxElement+'">';
      row += '<div>Title: <input type="text" name="tienIch[linkMore]['+numberMaxElement+'][title]" value="" /></div>';
      row += '<div>Url: <input type="text" name="tienIch[linkMore]['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#tienIch .blockLinkMore').append(row);
      return false;
    });

    $('#tienIch .addRowList').click(function(){
      var numberMaxElement = parseInt($('#tienIch .rowList').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="rowList" data-id="'+numberMaxElement+'">';
      row += '<div>Image Hold: <input type="text" name="tienIch[list]['+numberMaxElement+'][imageHold]" value="" /></div>';
      row += '<div>Title: <input type="text" name="tienIch[list]['+numberMaxElement+'][title]" value="" /></div>';
      row += '<div>Image Main: <input type="text" name="tienIch[list]['+numberMaxElement+'][imageMain]" value="" /></div>';
      row += '<div>Description: <input type="text" name="tienIch[list]['+numberMaxElement+'][description]" value="" /></div>';
      row += '<div>Content: <textarea name="tienIch[list]['+numberMaxElement+'][content]" ></textarea></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#tienIch .blockList').append(row);
      return false;
    });

    $('.theme').on('click','#tienIch .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Gallery
    $('#gallery .addRow').click(function(){
      var numberMaxElement = parseInt($('#gallery .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Text: <input type="text" name="gallery['+numberMaxElement+'][text]" value="" /></div>';
      row += '<div>Image Title: <input type="text" name="gallery['+numberMaxElement+'][imageTitle]" value="" /></div>';
      row += '<div>Title Url: <input type="titleUrl" name="gallery['+numberMaxElement+'][titleUrl]" value="" /></div>';
      row += '<div>Url: <input type="text" name="gallery['+numberMaxElement+'][url]" value="" /></div>';
      row += '<div>Image 1: <input type="text" name="gallery['+numberMaxElement+'][image1]" value="" /></div>';
      row += '<div>Image 2: <input type="text" name="gallery['+numberMaxElement+'][image2]" value="" /></div>';
      row += '<div>Image 3: <input type="text" name="gallery['+numberMaxElement+'][image3]" value="" /></div>';
      row += '<div>Image 4: <input type="text" name="gallery['+numberMaxElement+'][image4]" value="" /></div>';
      row += '<div>Image 5: <input type="text" name="gallery['+numberMaxElement+'][image5]" value="" /></div>';
      row += '<div>Image 6: <input type="text" name="gallery['+numberMaxElement+'][image6]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#gallery .block').append(row);
      return false;
    });
    $('.theme').on('click','#gallery .remove',function(){
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