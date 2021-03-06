<?php $__env->startSection('content'); ?>
<?php 
   $email = $customer->customer_email;
   $fullname = $customer->customer_fullname;
   $address = $customer->customer_address;
   $phone = $customer->customer_phone;
   $customer_province = $customer->customer_province;
   $customer_district = $customer->customer_district;

?>
   <div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="breadcrumbs">
				<ul>
					<li class="home"> <a href="/" title="Trang chủ">Trang chủ<i class="sp_arrow">/</i></a></li>
					
					<li><strong>Sổ địa chỉ</strong></li>
					
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
                     <strong>Xin chào, <?php echo e(!empty($fullname) ? $fullname : $email); ?>!</strong>
                     <p>Cập nhật thông tin tài khoản của bạn để hưởng các chính sách của cửa hàng vào chế độ bảo mật tốt nhất</p>
                  </div>
               </div>
               <div class="main hidden-xs">
                  <div class="fvc">
                     <!-- <a style="background-color: #3bb2ca; border-radius:0px; border:none; color:#fff;" class="col-md-4 col-xs-12 btn btn-default stl_btn_reg themmoi" href="javascript:void(0);">Thêm địa chỉ mới</a> -->
                     <!-- <a style="float:right;text-align:right;" class="col-md-4  col-xs-12 pull-right" href="/account">Quay lại trang thông tin tài khoản</a> -->
                      <?php if( count($errors) > 0 ): ?>
		                  <div class="alert alert-danger">
		                     <ul>
		                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		                            <li><strong><?php echo e($error); ?></strong></li>
		                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		                        </ul>
		                 </div>
		               <?php endif; ?>
                     <div class="add_address row" id="add_address" style="display: none; border:solid 1px #dedede; margin: 30px 0px;">
                        <form accept-charset="UTF-8" action="/account/addresses" id="customer_address" method="post">
                           <input name="FormType" type="hidden" value="customer_address">
                           <input name="utf8" type="hidden" value="true">
                           <div class="col-md-12">
                              <h3 style="margin-top:15px;">Thêm địa chỉ mới</h3>
                              <ul class="form-list">
                                 <li>
                                    <label for="email">Họ tên</label>
                                    <br>                
                                    <input type="text" class="input-text" name="fullname" placeholder="Tên" value="<?php echo e(old('fullname',$fullname)); ?>" autocapitalize="words"> 
                                 </li>
                                 <li>
                                    <label for="email">Địa chỉ </label>
                                    <br>                
                                    <input type="text" class="input-text" name="address" placeholder="Địa chỉ " value="<?php echo e(old('address',$address)); ?>" autocapitalize="words">  
                                 </li>
                          
                                
                                 <li>
                                    <label for="email">Số điện thoại</label>
                                    <br>                
                                    <input type="text" class="input-text" name="phone" placeholder="Số điện thoại" value="<?php echo e(old('phone',$phone)); ?>">
                                 </li>
                                 <hr>
                                 <li>
                                    <input style=" margin: 0px;" type="submit" value="Thêm địa chỉ" class="button btn btn-default stl_btn_reg btn_themes_acc"> hoặc                                 
                                    <a href="#" class="themmoi">Hủy</a>
                                 </li>
                              </ul>
                           </div>
                        </form>
                     </div>
                     <div class="no-gutter" style="margin-top:20px; float: left; width: 100%;">
                        <div class="col-md-6" style="margin-bottom:30px;">
                           <div class="row">
                              <div style="border:solid 1px #dedede; padding:10px;float: left;width: 99%;">
                                 <h3 style="margin: 0;padding: 5px;border-bottom: 1px solid #ccc;margin-bottom: 10px;">
                                    <?php echo e($fullname); ?>

                                 </h3>
                                 <p>
                                    <strong>Địa chỉ : </strong> <?php echo e($address); ?><br>
                                    <strong>Tỉnh/Thành Phố :</strong> <?php echo e($province_name); ?><br>          
                                    <strong>Quận huyện :</strong> <?php echo e($district_name); ?><br>
                                    <strong>Số điện thoại : </strong><?php echo e($phone); ?>

                                 </p>
                                 <p style="margin:10px 0px;">
                                    <a style="text-align:center;float: left; width: 17%;" href="javascript:void(0);" class="button btn_themes_acc theme_sua2" >Sửa</a>
                                    <a style="float: right; width: 17%;" href="#" class="button btn_themes_acc"  title="Xóa">Xóa</a>
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

<style>
.show {
	display:block;
	}
.form-list input[type="text"] {
min-width: 300px;
line-height: 30px;
padding-left: 15px;
}
.form-list select {
    min-width: 300px;
    line-height: 34px;
    padding-left: 15px;
}
</style>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien3.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>