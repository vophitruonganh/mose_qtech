@extends('frontend.giaodien7.layouts.default')
@section('content')

<?php 
   $email = $customer->customer_email;
   $fullname = $customer->customer_fullname;
   $address = $customer->customer_address;
   $phone = $customer->customer_phone;
   $customer_province = $customer->customer_province;
   $customer_district = $customer->customer_district;
?>

<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <div class="inner">
            <ul>
               <li class="home">
                  <a title="Quay lại trang chủ" href="/">Trang chủ</a>
               </li>
               <i class="fa fa-angle-double-right" aria-hidden="true"></i>
               <li class="cl_breadcrumb">Thanh Toán</li>
            </ul>
         </div>
      </div>
   </div>
</div>


<div class="main-container col2-right-layout">
   <div class="main container">
      <div class="row">
         <section class="col-main col-sm-9">
            <div class="my-account">
               <div class="page-titlae">
                  <h2>Thông tin địa chỉ</h2>
               </div>
               <div class="dashboard">
                  <div class="welcome-msg">
                     <strong>Xin chào, Thế anh Trần!</strong>
                     <p>Cập nhật thông tin tài khoản của bạn để hưởng các chính sách của cửa hàng vào chế độ bảo mật tốt nhất</p>
                  </div>
               </div>
               <div class="main hidden-xs">
                  <div class="fvc">
                     
                     <a style="float:right;text-align:right;" class="col-md-4  col-xs-12 pull-right" href="{{url('customer')}}">Quay lại trang thông tin tài khoản</a>
                      @if( count($errors) > 0 )
                        <div class="alert alert-danger">
                           <ul>
                                  @foreach( $errors->all() as $error )
                                  <li><strong>{{ $error }}</strong></li>
                                  @endforeach
                              </ul>
                       </div>
                     @endif
                     <div class="no-gutter" style="margin-top:20px; float: left; width: 100%;">
                        <div class="col-md-6" style="margin-bottom:30px;">
                           <div class="row">
                              <div style="border:solid 1px #dedede; padding:10px;float: left;width: 99%;">
                                 <h3 style="margin: 0;padding: 5px;border-bottom: 1px solid #ccc;margin-bottom: 10px;">
                                    {{$fullname}}
                                 </h3>
                                 <p>
                                    <strong>Địa chỉ : </strong> {{$address}}<br>
                                    <strong>Tỉnh/Thành phố :</strong> {{$province_name}}<br>   
                                    <strong>Quận/Huyện : </strong> {{$district_name}}<br>       
                                    <strong>Số điện thoại : </strong>{{$phone}}
                                 </p>
                                 <p style="margin:10px 0px;">
                                    <a style="text-align:center;float: left; width: 17%;" href="javascript:void(0);" class="button btn_themes_acc theme_sua2" >Sửa</a>
                                   
                                 </p>
                              
                                 <div class="block-form box-border addthemsua2" id="edit_address_6742509" style="display:none;">
                                    <form accept-charset="UTF-8" action="{{url('customer/edit')}}" id="customer_address" method="post">
                                       <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                                       <input name="FormType" type="hidden" value="customer_address">
                                       <input name="utf8" type="hidden" value="true">
                                       <h3 style="padding-left:115px;    margin-top: 30px;">Sửa địa chỉ</h3>
                                       <div class="row">
                                          <div class="col-md-12">
                                             <ul class="form-list">
                                                <li>
                                                   <label for="email">Họ tên</label>
                                                   <br>                
                                                   <input style="padding: 5px;width: 99%;" type="text" class="input-text" name="fullname" placeholder="Tên" value="{{old('fullname',$fullname)}}" autocapitalize="words"> 
                                                </li>
                                                <li>
                                                   <label style="padding: 5px;width: 99%;" for="email">Địa chỉ </label>
                                                   <br>                
                                                   <input style="padding: 5px;width: 99%;" type="text" class="input-text" name="address" placeholder="Địa chỉ " value="{{old('address', $address)}}" autocapitalize="words">  
                                                </li>
                                                <li>
                                                  <label for="provinces">Tỉnh/Thành phố</label>
                                                     <br>
                                                      <select id="provinces" name="province" class="form-control">
                                                          <option value="">— Chọn Tỉnh/Thành Phố —</option>
                                                          @foreach( $provinces as $province )
                                                          <option value="{{ $province->province_id }}" @if( $customer_province == $province->province_id )selected="selected" @endif >{{ $province->province_name }}</option>
                                                          @endforeach
                                                      </select>
                                                </li>
                                                <li>
                                                  <label for="email">Quận/Huyện</label>
                                                     <br>
                                                    <select id="districts" name="district" class="form-control">
                                                        <option value="">— Chọn Quận/Huyện —</option>
                                                        @foreach( $districts as $district )
                                                        <option  value="{{ $district->district_id }}" @if( $customer_district == $district->district_id )selected="selected"@endif >{{ $district->district_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </li>
                                                <li>
                                                   <label for="email">Số điện thoại</label>
                                                   <br>                
                                                   <input style="padding: 5px;width: 99%;" type="text" class="input-text" name="phone" placeholder="Số điện thoại" value="{{old('phone',$phone)}}">
                                                </li>
                                                <hr>
                                                <li>
                                                   <input style=" margin: 0px;" type="submit" value="Cập nhật" class="button btn btn-default btn_themes_acc stl_btn_reg"> hoặc                                 
                                                   <a href="#" class="theme_sua2">Hủy</a>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <aside class="col-right sidebar col-sm-3">
            <div class="block block-account">
               <div class="block-title" style="padding:10px;"><span>Thông tin tài khoản</span></div>
               <div class="block-content">
                  <ul>
                     <li><a><b>Tên tài khoản: {{$fullname}}</b></a></li>
                     <li><a>Địa chỉ: {{$address}}</a></li>
                     <li><a>Tỉnh/Thành phố: {{$province_name}}</a></li>
                     <li><a>Quận/Huyện: {{$district_name}}</a></li>
                     <li><a>Số điện thoại: {{$phone}}</a></li>
                  </ul>
               </div>
            </div>
         </aside>
      </div>
   </div>
</div>

<style>
.form-list input.input-text {
	border: 1px solid #c3c2c2;
}
.button {
	background-color: red;
    padding-top: 5px;
    padding-bottom: 5px;
    color: white;
	}
.dashboard .welcome-msg strong {
    font-weight: 700;
    font-size: 13px;
}	
input[type="text"]:focus {
    border-color: rgba(82, 168, 236, 0.8);
    outline: 0;
    outline: thin dotted \9;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
    -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
}


</style>

<script>
///add
$(document).ready(function(){
	//theme_sua
	 $(".theme_sua2").click(function(){
          $('.addthemsua2').toggleClass('show');
    });
});
</script>
<script>
  $(document).on('change','#provinces', function() {
        var id_province = $('#provinces').val();
        $.ajax({
            method: 'get',
            url: '/cart/get_district/'+id_province,
            success: function(data){
                $('#districts').html(data);
            }
        });
    });
</script>

@stop