<?php $__env->startSection('titlePage','Thêm mới đơn hàng'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_link' => url("admin/order"),
        'heading_link_text' => 'Danh sách đơn hàng',
        'heading_text' => 'Thêm mới',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-order">
        <div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
        <form id="order-form" action="<?php echo e(url('admin/order')); ?>" method="post">
            <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box-container clearfix">
                <div class="box-container-1">
                    <div class="box-typical">
                        <div class="box-typical-header box-typical-header-bordered panel-heading">
                            <h3>Chi tiết đơn hàng</h3>
                        </div>
                        <div class="box-typical-body b-t-p">
                            <div class="form-group">
                                <div class="box-search-advance" data-bind="load: Order.RenderDropdown, load: Order.RenderModal" data-type="product">
                                    <div class="box-search-field"><input type="text" class="form-control" name="search_product" value="" placeholder="Tìm hoặc tạo mới 1 sản phẩm" data-bind="keyup: Order.DropdownSearch, load: Order.GetDropdownData" /></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="order_content">Ghi chú</label>
                                <textarea rows="3" class="form-control" placeholder="Ghi chú đơn hàng" id="order_content" name="order_content" data-plugin="autosize"></textarea>
                            </div>
                            <div class="form-group order-money-main font-lg-size">
                                <p><span class="text-muted">Tổng giá trị sản phẩm:</span> <span class="amount-order">59,999,000</span> <span class="currency-symbols" data-type="VND"></span><input type="hidden" name="amount_order" value="" /></p>
                                <p class="order-addon"><a href="" data-bind="click: Order.OrderGetDiscount"><i class="font-icon material-icons md-18">add_circle</i> Thêm khuyến mãi</a></p>
                                <ul class="order-discount">
                                    <li><span class="discount-title">Chương trình khuyến mãi:</span> <span class="discount-name font-weight-bold">Khai trương cửa hàng mới</span><button type="button" class="close" data-bind="click: Store.OrderRemoveDiscount"><span aria-hidden="true">×</span></button></li>
                                    <li><span class="discount-title">Mã khuyến mãi:</span> <span class="discount-name font-weight-bold">TRWIH3YHVH5A</span><button type="button" class="close" data-bind="click: Store.OrderRemoveDiscount"><span aria-hidden="true">×</span></button></li>
                                </ul>
                                <p class="order-addon"><a href="" data-bind="click: Store.OrderGetShip"><i class="font-icon material-icons md-18">add_circle</i> Thêm phí vận chuyển</a></p>
                                <ul class="order-discount">
                                    <li><span class="discount-title">Chương trình khuyến mãi:</span> <span class="discount-name font-weight-bold">Khai trương cửa hàng mới</span></li>
                                </ul>
                                <p><span>Số tiền phải thanh toán:</span> <span class="money-payment font-weight-bold text-danger">59,999,000 đ</span></p>
                            </div>
                            <div class="clearfix">
                                <div class="pull-xs-right">
                                    <button type="submit" class="btn btn-secondary waves-effect" data-type="draft" data-bind="click: Store.OrderAdd">Lưu nháp</button>
                                    <button type="submit" class="btn btn-primary waves-effect" data-type="pending" data-bind="click: Store.OrderAdd">Thanh toán sau</button>
                                    <button type="submit" class="btn btn-success waves-effect" data-type="paid" data-bind="click: Store.OrderAdd">Đã thanh toán</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-container-2">
                    <div class="box-typical">
                        <div class="proj-page-section order-customer-search">
                            <div class="proj-page-subtitle"><h3>Khách hàng</h3></div>
                            <div class="form-group m-b-0">
                                <div class="box-search-advance" data-bind="load: Order.RenderDropdown, load: Order.RenderModal" data-type="customer">
                                    <div class="box-search-field"><input type="text" name="search_customer" class="form-control" value="" placeholder="Tìm hoặc tạo mới khách hàng" data-bind="keyup: Order.DropdownSearch,load: Order.GetDropdownData" /></div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="proj-page-section order-customer-info">
                            <div class="proj-page-subtitle"><h3>Thông tin khách hàng</h3></div>
               
                            <ul class="font-lg-size clearfix">
                                <li class="tbl">
                                    <div class="user-picture tbl-cell"><img src="https://secure.gravatar.com/avatar/0d49da94b86b0f978d46f16e68798e20.jpg?s=40&d=https%3A%2F%2Fsecure.gravatar.com%2Favatar%2F18f9f20ec1a7be8020924ce0048b6ef2.jpg%3Fs%3D40" alt=""></div>
                                    <div class="user-nickname tbl-cell"><a href="" class="font-weight-bold">Thế Anh</a></div>
                                </li>
                                <li>
                                    <div class="user-email">theanh@gmail.com</div>
                                </li>
                                <li>
                                    <div class="order-count">0 đơn hàng</div>
                                </li>
                            </ul>
                    
                        </div>
                        <div class="proj-page-section order-customer-ship">
                            <div class="proj-page-subtitle"><h3>Thông tin giao hàng</h3></div>
                            <ul class="font-lg-size">
                                <li><span class="label-heading">Họ tên:</span> <span class="text">Thế Anh</span></li>
                                <li><span class="label-heading">Số điện thoại:</span> <span class="text">0919777776</span></li>
                                <li><span class="label-heading">Địa chỉ:</span> <span class="text">141 Trường Chinh</span></li>
                                <li><span class="label-heading">Quận/Huyện:</span> <span class="text">Quận Tân Bình</span></li>
                                <li><span class="label-heading">Tỉnh/Thành phố:</span> <span class="text">Hồ Chí Minh</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div id="modal-product" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?php echo e(url('admin/order/create-product')); ?>" data-parsley-validate>
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">Thêm sản phẩm</h4></div>
                <div class="modal-body">
                    <div class="modal-alerts"></div>
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" class="form-control" name="product_title" value="" />
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Giá</span>
                                    <input type="text" class="form-control" name="product_price" value="" />
                                    <span class="input-group-addon">VND</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Số lượng</span>
                                    <input type="number" class="form-control" name="product_quantity" value="1" />
                                </div>
               
                            </div>
                        </div>
                    </div>
                    <input id="product-ship" type="checkbox" class="filled-in" name="product_ship" checked="checked" /><label for="product-ship">Có giao hàng</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" data-bind="click: Order.ProductQuickAdd">Lưu</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div id="modal-customer" class="modal fade">
        <div class="modal-dialog" role="customer">
            <div class="modal-content">
                <form action="<?php echo e(url('admin/order/create-customer')); ?>" data-parsley-validate>
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">Thêm khách hàng</h4></div>
                <div class="modal-body">
                        <div class="modal-alerts"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Họ tên</label>
                                    <input type="text" class="form-control" name="fullname" value="" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control" name="phone" value="" data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$" data-parsley-length="[8, 11]" data-parsley-pattern-message="Số điện thoại không hợp lệ" data-parsley-length-message="Số điện thoại không hợp lệ" data-parsley-type="integer" data-parsley-type-message="Số điện thoại không hợp lệ" data-parsley-trigger="change focusout" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" value="" maxlength="60" data-parsley-trigger="change focusout" data-parsley-type="email" data-parsley-type-message="Địa chỉ Email không không hợp lệ" data-parsley-maxlength="60" data-parsley-maxlength-message="Địa chỉ Email quá dài." />
                        </div>
                        <div class="form-group">
                            <input id="email-advertising" type="checkbox" class="filled-in" name="email_advertising" checked /><label for="email-advertising">Nhận email quảng cáo</label>
                        </div>
                      
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <textarea rows="2" class="form-control" name="address"></textarea>
                        </div>
                          
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tỉnh/Thành phố</label>
                                    <?php $customer_province = old('provinces'); ?>
                                    <select id="provinces" name="provinces" class="form-control" data-bind="change: General.GetDistricts">
                                        <option value="">Chọn tỉnh/thành phố</option>    
                                        <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option <?php if( $customer_province == $province->province_id ): ?> selected <?php endif; ?> value="<?php echo e($province->province_id); ?>"><?php echo e($province->province_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>                 
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Quận/Huyện</label>
                                    <select id="districts" name="districts" class="form-control">
                                        <option value="">Chọn quận/huyện</option>                     
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" data-bind="click: Order.CreateCustomer">Lưu</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- <form id="form" name="form" action="" method="post" enctype="multipart/form-data">
        <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <input id="order_code" name="order_code" type="hidden" value="<?php echo e($order_code); ?>"/>
        <div class="row">
            <table class="border">
                <thead>
                    <tr>
                        <td>Product</td>
                        <td>Order Product</td>
                        <td>Price</td>
                        <td>Total</td>
                        <th></th>
                    </tr>
                </thead>
                <tbody data-bind='foreach: lines'>
                    <tr>
                        
                        <td>
                            <select data-bind='options: list_product, optionsText: "name", optionsCaption: "Select...", value: product'> </select>
                        </td>
                        <td class='quantity'>
                            <input type="number" data-bind='value: quantity, valueUpdate: "afterkeydown"' />
                        </td>
                        <td class='price' data-bind='with: product'>
                            <span data-bind='text: formatCurrency(price)'> </span>
                        </td>       
                        <td class='price'>
                            <span data-bind='visible: product, text: formatCurrency(subtotal())' > </span>
                        </td>
                        <td>
                            <a href='#' data-bind='click: $parent.removeLine'>Remove</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        <button data-bind='click: addLine'>Add product</button>
    </div>
		
    <div class="row">
        <label for="order_content">Order_content(*)</label>
        <textarea rows="10" cols="100" id="order_content" name="order_content" class="editor"></textarea>
            Total: <span data-bind='text: formatCurrency(grandTotal())'> </span>
    </div>
    <div class="row">
            <button data-bind='click: savePaid'>Paid</button>
            <button data-bind='click: savePending'>Pending</button>
            <button data-bind='click: saveDraft'>Draft</button>
    </div>
</form> -->
 <!-- <script src="<?php echo e(asset('public/backend/js/jquery-1.12.4.min.js')); ?>"></script> ! -->
<!-- <script src="<?php echo e(asset('template/admin/plugins/knockout/knockout-3.4.0.js')); ?>"></script> -->
<script type="text/javascript">
    //danh sách sản phẩm
    var list_product;
    // $.ajax({
    //     async: false,
    //     url: "admin/order/listProduct",
    //     success: function(data) {
    //         list_product = data;
    //     }
    // });
    function formatCurrency(value) {
        return value.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +"đ";
    }
    //thông tin 1 dòng order
    //sản phẩm, số lượng, thành tiền
    var CartLine = function() {
        var self = this;
        self.product = ko.observable();
        self.quantity = ko.observable(1);
        self.subtotal = ko.pureComputed(function() {
            return self.product() ? self.product().price * parseInt("0" + self.quantity(), 10) : 0;
        });
    };
    var Cart = function() {
        var self = this;
        self.lines = ko.observableArray([new CartLine()]);
        //thành tiền của toàn hóa đơn
        self.grandTotal = ko.pureComputed(function() {
        var total = 0;
        $.each(self.lines(), function() { total += this.subtotal() })
            return total;
        });
    
        // Operations
        //thêm sảm phẩm
        self.addLine = function() { self.lines.push(new CartLine()) };
        //xóa 1 sản phẩm đã thêm
        self.removeLine = function(line) { self.lines.remove(line) };
        //lưu order trạng thái 0 - chưa thanh toán
        //thêm thành công trả về trang order
        self.savePaid = function(){
            //kiểm tra có sản phẩm nào chưa
            if(!self.lines() || self.lines().length<=0){
                alert("Danh sách sản phẩm không hợp lệ");
                return;
            }
            if (n = !1, ko.utils.arrayForEach(self.lines(), function(item) {
                item.quantity() <= 0 && (n = !0)
                }), n == !0) {
                    alert("Số lượng không hợp lệ");
                    return;
            }
            var order_code=$("#order_code").val();
            var order_content=$("#order_content").val();
            var _token = $("form[name='form']").find("input[name='_token']").val();
            //kiểm tra ghi chú đã được nhập chưa
            if(order_content==""){
                alert("Chưa nhập ghi chú");
                return;
            }
            //thông tin các sản phẩm cần thêm vào order
            var dataToSave = $.map(self.lines(), function(line) {
                return line.product() ? {
                    post_id: line.product().post_id,
                    quantity: line.quantity(),
                    sub_total: line.subtotal(),
                    order_code: order_code,
                    order_content: order_content,
                    order_status: 0
                } : undefined
            });
            
            if(dataToSave.length==0){
                alert("Chưa có sản phẩm nào trong giỏ hàng");
                return;
            }
            //dữ liệu thêm vào order
            var data=JSON.stringify(dataToSave);
            $.ajax({
                url: 'admin/order/create',
                type:"post",
                data:{'_token':_token,'data':data},
                dataType: 'text',
                success: function (data) {
                    window.location.href = 'admin/order';
                },
            });
        };
        //end savePaid
        //lưu order trạng thái 1 - đã thanh toán
        //thêm thành công trả về trang order
        self.savePending = function(){
            //kiểm tra có sản phẩm nào chưa
            if(!self.lines() || self.lines().length<=0){
                alert("Danh sách sản phẩm không hợp lệ");
                return;
            }
            if (n = !1, ko.utils.arrayForEach(self.lines(), function(item) {
                item.quantity() <= 0 && (n = !0)
                }), n == !0) {
                    alert("Số lượng không hợp lệ");
                    return;
            }
            var order_code=$("#order_code").val();
            var order_content=$("#order_content").val();
            var _token = $("form[name='form']").find("input[name='_token']").val();
            //kiểm tra ghi chú đã được nhập chưa
            if(order_content==""){
                alert("Chưa nhập ghi chú");
                return;
            }
            //thông tin các sản phẩm cần thêm vào order
            var dataToSave = $.map(self.lines(), function(line) {
                return line.product() ? {
                    post_id: line.product().post_id,
                    quantity: line.quantity(),
                    sub_total: line.subtotal(),
                    order_code: order_code,
                    order_content: order_content,
                    order_status: 1
                } : undefined
            });
            
            if(dataToSave.length==0){
                alert("Chưa có sản phẩm nào trong giỏ hàng");
                return;
            }
            //dữ liệu thêm vào order
            var data=JSON.stringify(dataToSave);
            $.ajax({
                url: 'admin/order/create',
                type:"post",
                data:{'_token':_token,'data':data},
                dataType: 'text',
                success: function (data) {
                    window.location.href = 'admin/order';
                },
            });
        };
        //end savePending
        //lưu order trạng thái 2 - Lưu nháp
        //thêm thành công trả về trang chi tiết của order đó
        self.saveDraft = function(){
            //kiểm tra có sản phẩm nào chưa
            if(!self.lines() || self.lines().length<=0){
                alert("Danh sách sản phẩm không hợp lệ");
                return;
            }
            //kiểm tra số lượng lớn hơn 0
            if (n = !1, ko.utils.arrayForEach(self.lines(), function(item) {
                item.quantity() <= 0 && (n = !0)
                }), n == !0) {
                    alert("Số lượng không hợp lệ");
                    return;
            }
            var order_code=$("#order_code").val();
            var order_content=$("#order_content").val();
            var _token = $("form[name='form']").find("input[name='_token']").val();
            //thông tin các sản phẩm cần thêm vào order
            var dataToSave = $.map(self.lines(), function(line) {
                return line.product() ? {
                    post_id: line.product().post_id,
                    quantity: line.quantity(),
                    sub_total: line.subtotal(),
                    order_code: order_code,
                    order_content: order_content,
                    order_status: 3
                } : undefined
            });
            //kiểm tra đã thêm 1 dòng trong giỏ hàng nhưng chưa chọn sản phẩm
            if(dataToSave.length==0){
                alert("Chưa có sản phẩm nào trong giỏ hàng");
                return;
            }
            //dữ liệu thêm vào order
            var data=JSON.stringify(dataToSave);

            $.ajax({
                url: 'admin/order/create',
                type:"post",
                data:{'_token':_token,'data':data},
                dataType: 'text',
                success: function (data) {
                    window.location.href = "admin/order/edit/"+order_code;
                },
            });
        };
    }
    // ko.applyBindings(new Cart());
</script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>