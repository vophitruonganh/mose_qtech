@extends('backend.layouts.default')
@section('titlePage','Thêm mới khuyến mãi')
@section('content')
<?php 
    $heading = array(
        'heading_link' => url("admin/discount"),
        'heading_link_text' => 'Danh sách khuyến mãi',
        'heading_text' => 'Thêm mới'
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-discount">
        <div class="form-alerts">@include('backend.includes.showErrorValidator')</div>
        <form id="discount-form" action="{{ url('admin/discount/') }}" method="post" data-parsley-validate>
            @include('backend.includes.token')
            <div class="box-container clearfix">
                <div class="box-container-1">
                    <div class="box-typical b-t-p b-t-m">
                        <div class="form-group">
                            <label for="">Loại khuyến mãi</label>
                            <select id="discount_promotion" name="discount_promotion" class="form-control" data-bind="change: Store.DiscountPromotion">
                                <option value="1" selected="selected">Mã khuyến mãi (Coupon)</option>
                                <option value="2">Chương trình khuyến mãi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title" id="discount_lbl">Tên mã khuyến mãi</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="title" name="title" value="" required data-parsley-trigger="change focusout" data-parsley-required-message="Bạn không được để trống trường này" data-parsley-required="true" />
                                <span class="input-group-btn discount-coupon">
                                    <button id="generate-code-btn" type="button" class="btn btn-info waves-effect" data-bind="click: Store.DiscountGenerateCode">Tạo mã tự động</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group discount-coupon">
                            <input type="checkbox" id="discount_join" class="filled-in" />
                            <label for="discount_join">Cho phép sử dụng chung với chương trình khuyến mãi</label>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon p-y-0">Số lần sử dụng</span>
                                <input type="text" class="form-control" id="discount_limit" name="discount_limit" value="" readonly="readonly" data-bind="keyup: Store.DiscountLimit" data-parsley-trigger="change focusout" data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$" data-parsley-pattern-message="Số lần khuyến mãi không hợp lệ" data-parsley-type="integer" data-parsley-type-message="Số lần khuyến mãi không hợp lệ" data-parsley-maxlength="6" data-parsley-maxlength-message="Số lần khuyến mãi quá lớn" />
                                <span class="input-group-addon p-y-0"><input type="checkbox" id="limit" class="filled-in" checked="checked" data-bind="change: Store.DiscountLimit" /> <label for="limit">Không giới hạn</label></span>
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Loại khuyến mãi</span>
                                    <span class="input-group-btn">
                                        <select id="discount_type" name="discount_type" class="form-control" data-model="discount_type" data-bind="change: Store.DiscountTypeChange">
                                            <option value="1" selected="selected">VNĐ</option>
                                            <option value="2">%</option>
                                        </select>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Giảm</span>
                                    <input type="text" class="form-control" id="discount_take" name="discount_take" value="" data-bind="keyup: Store.DiscountTake" />
                                    <span class="input-group-addon discount_unit" data-bind="text: discount_type">VNĐ</span>
                                </div>
                            </div>
                            <div class="form-group m-b-0">
                                <select id="discount_offer_value" class="form-control" data-bind="change: Store.DiscountOffer">
                                    <option value="all" selected="selected">Tất cả đơn hàng</option>
                                    <option value="cart_price">Trị giá đơn hàng</option>
                                    <option value="product_group">Nhóm sản phẩm</option>
                                    <option value="product">Sản phẩm</option>
                                    <option value="customer_group">Nhóm khách hàng</option>
                                </select>
                            </div>
                        </div>
                        <div id="discount_list" class="m-t-1"></div>
                    </div>
                </div>
                <div class="box-container-2">
                    <div class="box-typical">
                        <div class="proj-page-section proj-page-action clearfix">
                            <div class="pull-xs-right">
                                <a class="btn btn-link" href="{{ url('admin/discount/') }}">Hủy</a>
                                <button type="submit" class="btn btn-primary waves-effect" data-bind="click: Store.DiscountCreate">Thêm khuyến mãi</button>
                            </div>
                        </div>
                        <div class="proj-page-section proj-page-info">
                            <div class="form-group">
                                <label for="">Bắt đầu khuyến mãi</label>
                                <input type="text" name="start_date" id="start_date" class="form-control" data-plugin="datetimepicker" value="{{ date('H:i d/m/Y',time())}}" placeholder="Ngày bắt đầu" />
                            </div>
                            <div class="form-group">
                                <label for="">Kết thúc khuyến mãi</label>
                                <input type="text" name="end_date" id="end_date" class="form-control" data-plugin="datetimepicker" value="" placeholder="Ngày kết thúc" readonly="readonly" />
                            </div>
                            <div class="form-group m-b-0">
                                <input type="checkbox" id="date_limit" class="filled-in" checked="checked" data-bind="change: Store.DiscountDateLimit" /><label for="date_limit">Không bao giờ hết hạn</label>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </form>
    </div>
<?php /*
    @include('backend.includes.showErrorValidator')
    <div class="error">
    </div>
    <form id="discount-form" name="form" action="" method="post" enctype="multipart/form-data">
        @include('backend.includes.token')
        <div class="row">
            <label for="discount_name" id="label_discount_name">Tạo mã khuyến mãi</label>
            <a href="javascript:generate_code_discount()" id="generate_code_discount">Tạo mã tự động</a>
            <input id="discount_name" name="discount_name" type="text" value=""/>
        </div>
        <div class="row">
            <label for="discount_promotion">Chọn chương trình khuyến mãi</label>
            <select id="discount_promotion" name="discount_promotion">
                <option value="1">Mã khuyến mãi (Coupon)</option>
                <option value="2">Chương trình khuyến mãi</option>
            </select>
            <span id="sp_discount_join"><input type="checkbox" id="discount_join" /> Cho phép sử dụng chung với chương trình khuyến mãi</span>
        </div>
        <div class="row" id="div_discount_limit">
            <label for="discount_limit">Nhập số lần sử dụng của mã khuyến mãi</label>
            <input type="text" name="discount_limit" id="discount_limit" value="∞" style="width:25px">
            <input type="checkbox" id="limit" checked />Không giới hạn
        </div>
        <div class="row">
            <label for="discount_type">Loại khuyến mãi</label>
            <select id="discount_type" name="discount_type">
                <option value="1">VNĐ</option>
                <option value="2">%</option>
            </select>
             <span>Giảm</span><span class="unit_vnd" style=" border: 1px solid; width: 20px; height: 20px; display: inline-block; text-align: center;">đ</span><input type="text" name="discount_take" id="discount_take"><span class="unit_percent" style=" border: 1px solid; width: 20px; height: 20px; display: inline-block; text-align: center;">%</span>
             <span>áp dụng cho</span>
             <select id="discount_offer_value">
                 <option value="all">Tất cả đơn hàng</option>
                 <option value="cart_price">Trị giá đơn hàng từ</option>
                 <option value="group_product">Nhóm sản phẩm</option>
                 <option value="product">Sản phẩm</option>
             </select>
             <div id="dv_money"><span style=" border: 1px solid; width: 20px; height: 20px; display: inline-block; text-align: center;">đ</span><input type="text" name="money" id="money"></div>
             
                 <select id="discount_list" name="discount_list">
                 </select>
                 
             
        </div>
        <div class="row" id="div_dv_count">
            <select id="dv_count">
                <option value="0">Một lần trên một đơn hàng</option>
                <option value="1">Cho từng mặt hàng trong giỏ hàng</option>
            </select>
        </div>
        <div class="row">
            <label for="discount_type">Thời gian áp dụng</label>
            <span>Bắt đầu khuyến mãi</span>
            <input type="text" name="date_start" id="date_start">
            <span>Hết hạn khuyến mãi</span>
            <input type="text" name="date_end" id="date_end">
            <input type="checkbox" id="date_limit" checked/> Không bao giờ hết hạn
        </div>
        <div class="row">
            <button type="button" onclick="saveDiscount();">Lưu</button>
        </div>
        
    </form>
    */ ?>
    <script type="text/javascript">
        // giá trị mặc định của các input
        $(".unit_vnd").show();
        $(".unit_percent").hide();
        $("#dv_money").hide();
        $("#discount_list").hide();
        $("#div_dv_count").hide();

        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();

        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;

        var today = day + "/" + month + "/" + year;
        $('#date_start').val(today);
        $('#date_end').val(today);
        $('#date_end').prop('readonly', true);
        $('#discount_limit').prop('readonly', true);
        //  giá trị mặc định

        // sự kiện select của combobox chương trình khuyến mãi
        // $("#discount_promotion").change(function(){
        //     var html="";
        //     var arr_discount_offer_value=[];
        //     var arr_dv_count=[];
        //     $("#div_dv_count").html('');
        //     var discount_promotion = $("#discount_promotion").val();
        //     //khi giá trị chọn là tạo mã
        //     if(discount_promotion==1){
        //         //$("#label_discount_name").text("Tạo mã khuyến mãi");
        //         //$("#generate_code_discount").show();
        //         $("#sp_discount_join").show();
        //         $("#div_discount_limit").show();
        //         $("#discount_list").hide();
        //         $("#div_dv_count").hide();

        //         arr_discount_offer_value=[
        //         {"offer_key" : "all","offer_value": "Tất cả đơn hàng"},
        //         {"offer_key" : "cart_price","offer_value" : "Trị giá đơn hàng từ"},
        //         {"offer_key" : "group_product","offer_value": "Nhóm sản phẩm"},
        //         {"offer_key" : "product","offer_value": "Sản phẩm"}];
        //         arr_dv_count=[
        //         {"dv_key" : "0","dv_value": "Một lần trên một đơn hàng"},
        //         {"dv_key" : "1","dv_value" : "Cho từng mặt hàng trong giỏ hàng"}];
               
        //         $.each(arr_discount_offer_value,function(index){
        //             html+='<option value="'+arr_discount_offer_value[index].offer_key+'">'+arr_discount_offer_value[index].offer_value+'</option>';
        //         });
        //         $('#discount_offer_value').html(html);
        //         html='<select name="dv_count" id="dv_count">';
        //         $.each(arr_dv_count,function(index){
        //             html+='<option value="'+arr_dv_count[index].dv_key+'">'+arr_dv_count[index].dv_value+'</option>';
        //         });
        //         html+='</select>';
        //         $('#div_dv_count').html(html);
        //     }
        //     //khi giá trị chọn là tạo chương trình
        //     else{
        //         $("#label_discount_name").text("Tạo chương trình khuyến mãi");   
        //         $("#generate_code_discount").hide();
        //         $("#sp_discount_join").hide();
        //         $("#div_discount_limit").hide();
        //         $("#div_dv_count").show();
        //         $("#discount_list").show();
        //         arr_discount_offer_value=[
        //         {"offer_key" : "group_product","offer_value": "Nhóm sản phẩm"},
        //         {"offer_key" : "product","offer_value": "Sản phẩm"}]
        //         $.each(arr_discount_offer_value,function(index){
        //             html+='<option value="'+arr_discount_offer_value[index].offer_key+'">'+arr_discount_offer_value[index].offer_value+'</option>';
        //         });
        //         $('#discount_offer_value').html(html);
                
        //         //nạp danh sách nhóm sản phẩm cho combobox group_product
        //         $.getJSON('admin/discount/list_group_product', function(data){
        //             html='<option value="">Chọn nhóm sản phẩm</option>';
        //             $.each(data,function(index){
        //                 html+='<option value="'+data[index].term_id+'">'+data[index].name+'</option>';
        //             });
        //             $('#discount_list').html(html);
        //         });
                
        //         html='Số lượng sản phẩm áp dụng: ';
        //         html+='<input type="text" id="dv_count" name="dv_count"/>';
        //         $('#div_dv_count').html(html);
        //     }
        // });
        // sự kiện khi chọn combobox loại khuyến mãi
        // $("#discount_type").change(function(){
        //     var discount_type = $("#discount_type").val();
        //     //giá trị VND
        //     if(discount_type==1){
        //         $(".unit_vnd").show();
        //         $(".unit_percent").hide();
        //     }
        //     //giá trị %
        //     else{
        //         $(".unit_vnd").hide();
        //         $(".unit_percent").show();
        //     }
        // });
        //sự kiện checkbox ngày hết hạn
        // $('#date_limit').change(function() {
        //      if($(this).is(":checked")){
        //         $('#date_end').prop('readonly', true);
        //      }
        //      else{
        //         $('#date_end').prop('readonly', false);
        //      }
        // });
        //sự khiện checkbox cho phép dùng chung chương trình khuyến mãi
        // $('#limit').change(function() {
        //     if($(this).is(":checked")){
        //         $("#discount_limit").val("∞")
        //         $('#discount_limit').prop('readonly', true);
        //     }
        //     else{
        //         $("#discount_limit").val("");
        //         $('#discount_limit').prop('readonly', false);
        //     }
        // });
        //sự kiện combobox hình thức khuyến mãi
        $('#discount_offer_value1').change(function(){
            var html='';
            var discount_promotion = $("#discount_promotion").val();
            var discount_offer_value = $("#discount_offer_value").val();
            //mã khuyễn mãi
            if(discount_promotion==1)
            {
                //tất cả đơn hàng
                if(discount_offer_value=="all"){
                    $("#discount_list").hide();
                    $("#div_dv_count").hide();
                    $("#dv_money").hide();
                }
                //giá trị đơn hàng từ
                if(discount_offer_value=="cart_price"){
                    $("#discount_list").hide();
                    $("#div_dv_count").hide();
                    $("#dv_money").show();
                }
                //nhóm sản phẩm
                if(discount_offer_value=="group_product"){
                    $("#discount_list").show();
                    $("#div_dv_count").show();
                    $("#dv_money").hide();
                    html+='<option value="">Chọn nhóm sản phẩm</option>';
                    //nạp danh sách nhóm sản phẩm cho combobox group_product
                    $.getJSON('admin/discount/list_group_product', function(data){
                        $.each(data,function(index){
                            html+='<option value="'+data[index].term_id+'">'+data[index].name+'</option>';
                        });
                           
                        $('#discount_list').html(html);
                        
                    });
                }
                //sản phẩm
                if(discount_offer_value=="product"){
                    $("#discount_list").show();
                    $("#div_dv_count").show();
                    $("#dv_money").hide();
                    html+='<option value="">Chọn sản phẩm</option>';
                    //nạp danh sách nhóm sản phẩm cho combobox product
                    $.getJSON('admin/discount/list_product', function(data){
                        $.each(data,function(index){
                            html+='<option value="'+data[index].post_id+'">'+data[index].post_title+'</option>';
                        });
                           
                        $('#discount_list').html(html);
                        
                    });
                }
            }
            //chương trình khuyến mãi
            else if(discount_promotion==2){
      
                //sản phẩm
                if(discount_offer_value=="product"){
                    $("#discount_list").show();
                    $("#div_dv_count").show();
                    $("#dv_money").hide();
                    html+='<option value="">Chọn sản phẩm</option>';
                    //nạp danh sách nhóm sản phẩm cho combobox product
                    $.getJSON('admin/discount/list_product', function(data){
                        $.each(data,function(index){
                            html+='<option value="'+data[index].post_id+'">'+data[index].post_title+'</option>';
                        });
                           
                        $('#discount_list').html(html);
                        
                    });
                }
            }
            
        });
        //button tạo khuyến mãi
        function saveDiscount(){
            var _token = $("form[name='form']").find("input[name='_token']").val();
            //lấy giá trị ngày bắt đầu
            var date_start = $("#date_start").val();
            date_start=date_start.split("/");
            date_start=date_start[2]+"."+date_start[1]+"."+date_start[0];
            date_start=(new Date(date_start.split(".").join("-")).getTime())/1000;

            //lấy giá trị ngày kết thúc
            var date_end = $("#date_end").val();
            date_end=date_end.split("/");
            date_end=date_end[2]+"."+date_end[1]+"."+date_end[0];
            date_end=(new Date(date_end.split(".").join("-")).getTime())/1000;
            $(".error").empty();
            var error=[];
            var discount_name = $("#discount_name").val();
            var discount_take = $("#discount_take").val();
            var discount_promotion = $("#discount_promotion").val();
            var discount_offer_value = $("#discount_offer_value").val();
            var discount_type = $("#discount_type").val();
            //mã khuyễn mãi
            if(discount_promotion==1)
            {
                //kiểm tra input nhập mã
                if (discount_name.length==0) {
                    error.push("Bạn phải nhập mã khuyến mãi, hoặc tạo mã tự động");
                }
                //kiểm tra số lần sử dụng mã
                if(!$("#limit").is(":checked")){
                    if($("#discount_limit").val().length==0 || 
                        isNaN($("#discount_limit").val()) || 
                        $("#discount_limit").val()<=0){
                        error.push("Số lần sử dụng mã phải lớn hơn 0");
                    }

                }
                //loại hình khuyến mãi là tất cả đơn hàng
                if(discount_offer_value=="all"){
                    if(discount_take<=0 || discount_take.length==0 || isNaN(discount_take)){
                        error.push("Giá trị giảm giá phải lớn hơn 0");
                    }
                }
                //loại hình khuyến mãi theo trị giá đơn hàng
                if(discount_offer_value=="cart_price"){
                    if(discount_take<=0 || discount_take.length==0 || isNaN(discount_take)){
                        error.push("Giá trị giảm giá phải lớn hơn 0");
                    }
                    if($("#money").val().length==0 || 
                        isNaN($("#money").val()) || 
                        $("#money").val()<=0){
                        error.push("Giá trị hóa đơn phải lớn hơn 0");
                    }
                }
                //loại hình khuyến mãi là nhóm sản phẩm
                if(discount_offer_value=="group_product"){
                    if(discount_take<=0 || discount_take.length==0 || isNaN(discount_take)){
                        error.push("Giá trị giảm giá phải lớn hơn 0");
                    }
                }
                //loại hình khuyến mãi là sản phẩm
                if(discount_offer_value=="product"){
                    if(discount_take<=0 || discount_take.length==0 || isNaN(discount_take)){
                        error.push("Giá trị giảm giá phải lớn hơn 0");
                    }
                }
                if(error.length!=0){
                    var html="";
                    html+='<ul>';
                    for(var i=0;i<error.length;i++){
                        html+='<li>'+error[i]+'</li>';
                    }
                    html+='</ul>';
                    $(".error").append(html);
                    return;
                }
                else{
                    //loại hình khuyến mãi là tất cả đơn hàng
                    if(discount_offer_value=="all"){
                        //kiểm tra giảm giá theo %
                        if(discount_type==2){
                            if(discount_take<0 || discount_take>=100){
                                alert("Giá trị giảm theo % phải lớn hơn 0 và nhỏ hơn 100");
                                return;
                            }
                        }
                    }
                    //loại hình khuyến mãi theo trị giá đơn hàng
                    if(discount_offer_value=="cart_price"){
                        //kiểm tra giá trị giảm giá và giá trị hóa đơn
                        if(discount_type==1){
                            if($("#money").val()<discount_take){
                                alert("Giá trị hóa đơn phải lớn hơn giá trị giảm giá");
                                return;
                            }
                        }
                        //kiểm tra giảm giá theo %
                        if(discount_type==2){
                            if(discount_take<0 || discount_take>=100){
                                alert("Giá trị giảm theo % phải lớn hơn 0 và nhỏ hơn 100");
                                return;
                            }
                        }
                    }
                    //loại hình khuyến mãi là nhóm sản phẩm
                    if(discount_offer_value=="group_product"){
                        //kiểm tra giảm giá theo %
                        if(discount_type==2){
                            if(discount_take<0 || discount_take>=100){
                                alert("Giá trị giảm theo % phải lớn hơn 0 và nhỏ hơn 100");
                                return;
                            }
                        }
                        //kiểm tra chọn nhóm sản phẩm
                        if($("#discount_list").val()==""){
                            alert("Chưa chọn nhóm sản phẩm");
                            return;
                        }
                    }
                    //loại hình khuyến mãi là sản phẩm
                    if(discount_offer_value=="product"){
                        //kiểm tra giảm giá theo %
                        if(discount_type==2){
                            if(discount_take<0 || discount_take>=100){
                                alert("Giá trị giảm theo % phải lớn hơn 0 và nhỏ hơn 100");
                                return;
                            }
                        }
                        //kiểm tra chọn sản phẩm
                        if($("#discount_list").val()==""){
                            alert("Chưa chọn sản phẩm");
                            return;
                        }
                    }
                    //kiểm tra trạng thái checkbox hết hạn
                    if($("#date_limit").is(":checked")){
                        if(isNaN(date_start)){
                            alert("Ngày bắt đầu không hợp lệ");
                            return;
                        }
                    }
                    else{
                        //kiểm tra giá trị của ngày bắt đầu và ngày kết thúc
                        if(isNaN(date_start) || isNaN(date_end)){
                            alert("Ngày bắt đầu hoặc ngày kết thúc không hợp lệ");
                            return;
                        }
                        if(date_end<date_start){
                            alert("Ngày hết hạn phải lớn hơn hoặc bằng ngày bắt đầu");
                            return;
                        }
                    }
                    var dataToSave={};
                    dataToSave["discount_promotion"]=discount_promotion;
                    dataToSave["discount_name"]=discount_name;
                    dataToSave["slug"]=$("#slug").val();
                    
                    if($("#discount_join").is(":checked")){
                        dataToSave["discount_join"]=true;
                    }
                    else{
                        dataToSave["discount_join"]=false;   
                    }
                    if($("#limit").is(":checked")){
                        dataToSave["limit"]=0;
                    }
                    else{
                        dataToSave["limit"]=$("#discount_limit").val();   
                    }
                    dataToSave["discount_type"]=discount_type;
                    dataToSave["discount_take"]=discount_take;
                    if(discount_offer_value=="all"){
                        dataToSave["discount_offer"]=1;
                        dataToSave["dv_value"]="";
                        dataToSave["dv_count"]="";
                        dataToSave["dv_money"]="";
                    }
                    if(discount_offer_value=="cart_price"){
                        dataToSave["discount_offer"]=2;
                        dataToSave["dv_value"]="";
                        dataToSave["dv_count"]="";
                        dataToSave["dv_money"]=$("#money").val();
                    }
                    if(discount_offer_value=="group_product"){
                        dataToSave["discount_offer"]=3;
                        dataToSave["dv_value"]=$("#discount_list").val();
                        dataToSave["dv_count"]=$("#dv_count").val();
                        dataToSave["dv_money"]="";
                    }
                    if(discount_offer_value=="product"){
                        dataToSave["discount_offer"]=4;
                        dataToSave["dv_value"]=$("#discount_list").val();
                        dataToSave["dv_count"]=$("#dv_count").val();
                        dataToSave["dv_money"]="";
                    }
                    if($("#date_limit").is(":checked")){
                        dataToSave["date_start"]=date_start;
                        dataToSave["date_end"]="";
                        dataToSave["date_limit"]=true;
                    }
                    else{
                        dataToSave["date_start"]=date_start;
                        dataToSave["date_end"]=date_end;
                        dataToSave["date_limit"]=false;
                    }
                   
                    $.ajax({
                        url: 'admin/discount/create',
                        type:"post",
                        data:{'_token':_token,'data':dataToSave},
                        dataType: 'json',
                        success: function (data) {
                            if(data.status=="error"){
                                alert(data.messenger);
                            }
                            if(data.status=="success"){
                                window.location.href = 'admin/discount';
                            }
                        },
                    });
                }
            }
            //chương trình khuyến mãi
            else if(discount_promotion==2){
                //kiểm tra input nhập tên
                if (discount_name.length==0) {
                    error.push("Bạn phải nhập tên chương trình khuyến mãi");
                }
                if(discount_offer_value=="group_product"){
                    if(discount_take<=0 || discount_take.length==0 || isNaN(discount_take)){
                        error.push("Giá trị giảm giá phải lớn hơn 0");
                    }
                }
                if(discount_offer_value=="product"){
                    if(discount_take<=0 || discount_take.length==0 || isNaN(discount_take)){
                        error.push("Giá trị giảm giá phải lớn hơn 0");
                    }
                }
                if(error.length!=0){
                    var html="";
                    html+='<ul>';
                    for(var i=0;i<error.length;i++){
                        html+='<li>'+error[i]+'</li>';
                    }
                    html+='</ul>';
                    $(".error").append(html);
                    return;
                }
                else{
                    if(discount_offer_value=="group_product"){
                        if(discount_type==2){
                            if(discount_take<0 || discount_take>=100){
                                alert("Giá trị giảm theo % phải lớn hơn 0 và nhỏ hơn 100");
                                return;
                            }
                        }
                        if($("#discount_list").val()==""){
                            alert("Chưa chọn nhóm sản phẩm");
                            return;
                        }
                        if($("#dv_count").val().length==0 || 
                        isNaN($("#dv_count").val()) || 
                        $("#dv_count").val()<=0){
                            alert("Số lượng sản phẩm áp dụng phải lớn hơn 0");
                            return;
                        }
                    }
                    if(discount_offer_value=="product"){
                        if(discount_type==2){
                            if(discount_take<0 || discount_take>=100){
                                alert("Giá trị giảm theo % phải lớn hơn 0 và nhỏ hơn 100");
                                return;
                            }
                        }
                        if($("#discount_list").val()==""){
                            alert("Chưa chọn sản phẩm");
                            return;
                        }
                        if($("#dv_count").val().length==0 || 
                        isNaN($("#dv_count").val()) || 
                        $("#dv_count").val()<=0){
                            alert("Số lượng sản phẩm áp dụng phải lớn hơn 0");
                            return;
                        }
                    }
                    if($("#date_limit").is(":checked")){
                        if(isNaN(date_start)){
                            alert("Ngày bắt đầu không hợp lệ");
                            return;
                        }
                    }
                    else{
                        if(isNaN(date_start) || isNaN(date_end)){
                            alert("Ngày bắt đầu hoặc ngày kết thúc không hợp lệ");
                            return;
                        }
                        if(date_end<date_start){
                            alert("Ngày hết hạn phải lớn hơn hoặc bằng ngày bắt đầu");
                            return;
                        }
                    }
                    var dataToSave={};
                    dataToSave["discount_promotion"]=discount_promotion;
                    dataToSave["discount_name"]=discount_name;
                    dataToSave["slug"]=$("#slug").val();
                    dataToSave["discount_join"]=false;   
                    dataToSave["limit"]=0;
                    dataToSave["discount_type"]=discount_type;
                    dataToSave["discount_take"]=discount_take;
                    if(discount_offer_value=="group_product"){
                        dataToSave["discount_offer"]=3;
                        dataToSave["dv_value"]=$("#discount_list").val();
                        dataToSave["dv_count"]=$("#dv_count").val();
                        dataToSave["dv_money"]="";
                    }
                    if(discount_offer_value=="product"){
                        dataToSave["discount_offer"]=4;
                        dataToSave["dv_value"]=$("#discount_list").val();
                        dataToSave["dv_count"]=$("#dv_count").val();
                        dataToSave["dv_money"]="";
                    }

                    if($("#date_limit").is(":checked")){
                        dataToSave["date_start"]=date_start;
                        dataToSave["date_end"]="";
                        dataToSave["date_limit"]=true;
                    }
                    else{
                        dataToSave["date_start"]=date_start;
                        dataToSave["date_end"]=date_end;
                        dataToSave["date_limit"]=false;
                    }
                    $.ajax({
                        url: 'admin/discount/create',
                        type:"post",
                        data:{'_token':_token,'data':dataToSave},
                        dataType: 'json',
                        success: function (data) {
                            if(data.status=="error"){
                                alert(data.messenger);
                            }
                            if(data.status=="success"){
                                window.location.href = 'admin/discount';
                            }
                        },
                    });
                }
            }
            
        }
    </script>
    @stop