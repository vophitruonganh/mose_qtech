<?php $__env->startSection('content'); ?> 
<?php 
   $email = $customer->customer_email;
   $fullname = $customer->customer_fullname;
   $address = $customer->customer_address;
   $phone = $customer->customer_phone;
   $customer_province = $customer->customer_province;
   $customer_district = $customer->customer_district;

?>
<main class="padding-top-mobile">
   <div class="header-navigate">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
               <ol class="breadcrumb breadcrumb-arrow">
                  <li><a href="/" target="_self">Trang chủ</a></li>
                  <li><i class="fa fa-angle-right"></i></li>
                  <li><a href="/account" target="_self">Tài khoản</a></li>
                  <li><i class="fa fa-angle-right"></i></li>
                  <li class="active"><span>Đăng nhập</span></li>
               </ol>
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
               <div class="main">
                  <div class="fvc">
                     
                     <a style="float:right;text-align:right;" class="col-md-4  col-xs-12 pull-right" href="<?php echo e(url('customer')); ?>">Quay lại trang thông tin tài khoản</a>
                      <?php if( count($errors) > 0 ): ?>
                        <div class="alert alert-danger">
                           <ul>
                                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                  <li><strong><?php echo e($error); ?></strong></li>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                              </ul>
                       </div>
                     <?php endif; ?>
                     <div class="no-gutter" style="margin-top:20px; float: left; width: 100%;">
                        <div class="col-md-6" style="margin-bottom:30px;">
                           <div class="row">
                              <div style="border:solid 1px #dedede; padding:10px;float: left;width: 99%;">
                                 <h3 style="margin: 0;padding: 5px;border-bottom: 1px solid #ccc;margin-bottom: 10px;">
                                    <?php echo e($fullname); ?>

                                 </h3>
                                 <p>
                                    <strong>Địa chỉ : </strong> <?php echo e($address); ?><br>
                                    <strong>Tỉnh/Thành phố :</strong> <?php echo e($province_name); ?><br>   
                                    <strong>Quận/Huyện : </strong> <?php echo e($district_name); ?><br>       
                                    <strong>Số điện thoại : </strong><?php echo e($phone); ?>

                                 </p>
                                 <p style="margin:10px 0px;">
                                    <a style="text-align:center;float: left; width: 17%;" href="javascript:void(0);" class="button btn_themes_acc theme_sua2" >Sửa</a>
                                   
                                 </p>
                              
                                 <div class="block-form box-border addthemsua2" id="edit_address_6742509" style="display:none;">
                                    <form accept-charset="UTF-8" action="<?php echo e(url('customer/edit')); ?>" id="customer_address" method="post">
                                       <input id="page_token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                       <input name="FormType" type="hidden" value="customer_address">
                                       <input name="utf8" type="hidden" value="true">
                                       <h3 style="padding-left:115px;    margin-top: 30px;">Sửa địa chỉ</h3>
                                       <div class="row">
                                          <div class="col-md-12">
                                             <ul class="form-list">
                                                <li>
                                                   <label for="email">Họ tên</label>
                                                   <br>                
                                                   <input style="padding: 5px;width: 99%;" type="text" class="input-text" name="fullname" placeholder="Tên" value="<?php echo e(old('fullname',$fullname)); ?>" autocapitalize="words"> 
                                                </li>
                                                <li>
                                                   <label style="padding: 5px;width: 99%;" for="email">Địa chỉ </label>
                                                   <br>                
                                                   <input style="padding: 5px;width: 99%;" type="text" class="input-text" name="address" placeholder="Địa chỉ " value="<?php echo e(old('address', $address)); ?>" autocapitalize="words">  
                                                </li>
                                                <li>
                                                  <label for="provinces">Tỉnh/Thành phố</label>
                                                     <br>
                                                      <select id="provinces" name="province" class="form-control">
                                                          <option value="">— Chọn Tỉnh/Thành Phố —</option>
                                                          <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                          <option value="<?php echo e($province->province_id); ?>" <?php if( $customer_province == $province->province_id ): ?>selected="selected" <?php endif; ?> ><?php echo e($province->province_name); ?></option>
                                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                      </select>
                                                </li>
                                                <li>
                                                  <label for="email">Quận/Huyện</label>
                                                     <br>
                                                    <select id="districts" name="district" class="form-control">
                                                        <option value="">— Chọn Quận/Huyện —</option>
                                                        <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <option  value="<?php echo e($district->district_id); ?>" <?php if( $customer_district == $district->district_id ): ?>selected="selected"<?php endif; ?> ><?php echo e($district->district_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                    </select>
                                                </li>
                                                <li>
                                                   <label for="email">Số điện thoại</label>
                                                   <br>                
                                                   <input style="padding: 5px;width: 99%;" type="text" class="input-text" name="phone" placeholder="Số điện thoại" value="<?php echo e(old('phone',$phone)); ?>">
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
                    <li class="current"><a>Tên tài khoản: <?php echo e($fullname); ?></a></li>
                     <li><a>Địa chỉ: <?php echo e($address); ?></a></li>
                     <li><a>Tỉnh/Thành phố: <?php echo e($province_name); ?></a></li>
                     <li><a>Quận/Huyện: <?php echo e($district_name); ?></a></li>
                     <li><a>Số điện thoại: <?php echo e($phone); ?></a></li>
                  </ul>
               </div>
            </div>
         </aside>
      </div>
   </div>
</div>

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
   
   
</main>
<style>

/*right*/
.block-account {
    background-color: #f8f8f8;
}
.block-account .block-title {
    padding-left: 10px;
    background-color: #363533;
    color: #fff;
    border: none;
}
.block-account .block-content {
    padding: 0 10px;
}
.block-account .block-content ul {
    margin-top: 5px;
    margin-bottom: 5px;
}
.sidebar .block-content li.current {
    font-weight: bold;
    color: #333;
}
.block-account .block-content li {
    padding: 10px 0px;
    border-top: 1px #fff solid;
    border-bottom: 1px #ddd solid;
}
.block-account .block-content li:first-child {
    border-top: none;
}
.block-account .block-content li:before {
    content: "\f105";
    font-family: FontAwesome;
    font-size: 10px;
    display: inline-block;
    position: absolute;
    cursor: pointer;
    line-height: 16px;
    color: #333;
}
.block-account .block-content li a {
    cursor: pointer;
    padding: 0 12px;
    transition: color 300ms ease-in-out 0s, background-color 300ms ease-in-out 0s, background-position 300ms ease-in-out 0s;
}

/*rieng*/
.form-list input.input-text {
    border: 1px solid #c1bfbf;
  }
input[type="text"]:focus {
    border-color: rgba(82, 168, 236, 0.8) !important;
    outline: 0;
    outline: thin dotted \9;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
    -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6)!important;
}
   

  }
</style>         


<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien6.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>