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
    <div class="section-order order-create" data-bind="load: Order.DropdownSet, load: Order.RenderModal">
        <div class="form-alerts"><?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
        <form action="<?php echo e(url('admin/order/create')); ?>" method="post">
            <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box-container clearfix">
                <div class="box-container-1">
                    <div class="box-typical">
                        <div class="box-heading box-heading-padding">
                            <h3>Chi tiết đơn hàng</h3>
                        </div>
                        <div class="box-body box-body-padding p-t-0">
                            <div class="product-table m-b-1" data-bind="load: Order.RemoveProduct, load: Order.UpdateProduct" style="display: none;">
                                <div class="product-table-alerts"></div>
                                <table class="table table-np"><tbody></tbody></table>
                            </div>
                            <div class="form-group">
                                <div class="box-search-advance" data-bind="load: Order.Dropdown" data-type="product">
                                    <div class="box-search-field"><input type="text" class="form-control" name="search_product" value="" placeholder="Tìm hoặc tạo mới 1 sản phẩm" data-bind="keyup: Order.DropdownSearch" /><div class="search-panel"><div class="search-panel-header"><div class="search-additem" data-type="product" data-bind="click: Order.RenderModal"><i class="font-icon material-icons md-18">add_circle</i><span>Tạo mới sản phẩm</span></div></div><div class="search-panel-body"></div></div></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="order_content">Ghi chú</label>
                                        <textarea rows="3" class="form-control" placeholder="Ghi chú đơn hàng" id="order_content" name="order_content" data-plugin="autosize"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="amount-table m-t-1">
                                        <table class="table table-np">
                                            <tbody>
                                                <tr>
                                                    <td class="col-1 text-xs-right"><span class="text-muted">Tổng giá trị sản phẩm:</span></td>
                                                    <td class="col-2 text-xs-right text-nowrap"><div class="price-group"><span class="amount-order price text-inline-hidden">0</span> <span class="currency-symbols" data-type="VND"></span><input type="hidden" name="amount_order" value="0" /><input type="hidden" name="order_weight" value="0" /></div></td>
                                                </tr>
                                                <tr>
                                                    <td class="col-1 text-xs-right">
                                                        <div class="discount-add"><a href="#modal-sale" data-toggle="modal"><i class="font-icon material-icons md-18">add_circle</i> Thêm giảm giá:</a></div>
                                                        <div class="discount-edit" style="display: none;"><a href="#modal-sale" data-toggle="modal">Giảm giá:</a><p class="m-a-0"></p></div>
                                                    </td>
                                                    <td class="col-2 text-xs-right text-nowrap"><div class="price-group"><span class="amount-discount price text-inline-hidden" data-option="amount">0</span> <span class="currency-symbols" data-type="VND"></span><input type="hidden" name="amount_discount_notes" value="" /><input type="hidden" name="amount_discount" value="0" /></div></td>
                                                </tr>
                                                <tr>
                                                    <td class="col-1 text-xs-right">
                                                        <div class="shipping-add"><a href="#modal-shipping" data-toggle="modal"><i class="font-icon material-icons md-18">add_circle</i> Thêm phí vận chuyển:</a></div>
                                                        <div class="shipping-edit" style="display: none;"><a href="#modal-shipping" data-toggle="modal">Phí vận chuyển:</a><p class="m-a-0"></p><input type="hidden" name="shipping_id" value="0" /><input type="hidden" name="shipping_name" value="" /><input type="hidden" name="shipping_custom" value="" /></div>
                                                    </td>
                                                    <td class="col-2 text-xs-right text-nowrap">
                                                        <div class="price-group"><span class="amount-shipping price text-inline-hidden">0</span> <span class="currency-symbols" data-type="VND"></span><input type="hidden" name="amount_shipping" value="0" /></div>
                                                    </td>
                                                </tr>
                                                <tr class="order-discount" style="display: none;">
                                                    <td class="col-1 text-xs-right"><span class="discount-title text-danger font-weight-bold"></span></td>
                                                    <td class="col-2 text-xs-right text-nowrap">
                                                        <div class="price-group"><span class="discount-price price text-inline-hidden">0</span> <span class="currency-symbols" data-type="VND"></span><input type="hidden" name="order_discount_notes" value="" /><input type="hidden" name="order_discount" value="0" /></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="col-1 text-xs-right"><span class="font-weight-bold">Số tiền phải thanh toán:</span></td>
                                                    <td class="col-2 text-xs-right font-weight-bold text-nowrap"><div class="price-group"><span class="amount-payment price text-inline-hidden">0</span> <span class="currency-symbols" data-type="VND"></span></div><input type="hidden" name="amount_payment" value="0" /></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix m-t-1">
                                <div class="pull-xs-right">
                                    <button type="submit" class="btn btn-secondary waves-effect" data-type="draft" data-bind="click: Order.Create">Lưu nháp</button>
                                    <button type="submit" class="btn btn-primary waves-effect" data-type="pending" data-bind="click: Order.Create">Thanh toán sau</button>
                                    <button type="submit" class="btn btn-success waves-effect" data-type="paid" data-bind="click: Order.Create">Đã thanh toán</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-container-2">
                    <div class="box-typical">
                        <div class="proj-page-section order-customer">
                            <div class="proj-page-subtitle">
                                <h3>Khách hàng</h3>
                                <div class="dropdown-action" style="display: none;">
                                    <div class="dropdown">
                                        <button class="btn btn-icon dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons md-20">more_vert</i></button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="javascript:;" data-bind="click: Order.RemoveCustomer">Xóa khách hàng</a>
                                            <a class="dropdown-item modal-render" href="javascript:;" data-action="update" data-type="customer" data-bind="click: Order.RenderModal">Cập nhật thông tin</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-customer-search">
                                <div class="form-group m-b-0">
                                    <div class="box-search-advance" data-bind="load: Order.Dropdown" data-type="customer">
                                        <div class="box-search-field"><input type="text" name="search_customer" class="form-control" value="" placeholder="Tìm hoặc tạo mới khách hàng" data-bind="keyup: Order.DropdownSearch" /><div class="search-panel"><div class="search-panel-header"><div class="search-additem" data-action="create" data-type="customer" data-bind="click: Order.RenderModal"><i class="font-icon material-icons md-18">add_circle</i><span>Tạo mới khách hàng</span></div></div><div class="search-panel-body"></div></div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-customer-info" style="display: none;">
                                <ul></ul>
                            </div>
                        </div>
                        <div class="proj-page-section order-customer-ship" style="display: none;">
                            <div class="proj-page-subtitle"><h3>Thông tin giao hàng</h3></div>
                            <ul></ul>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div id="modal-sale" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">Giảm giá đơn hàng</h4></div>
                <div class="modal-body">
                    <div class="modal-alerts"></div>
                    <div class="form-group">
                        <label>Giảm giá đơn hàng này theo</label>
                        <div class="input-group">
                            <span class="input-group-btn"><button type="button" class="btn btn-secondary btn-option btn-active" data-option="amount" data-bind="click: Order.OptionSale">&#8363;</button></span>
                            <span class="input-group-btn"><button type="button" class="btn btn-secondary btn-option" data-option="percentage" data-bind="click: Order.OptionSale">%</button></span>
                            <input type="text" class="form-control sale-amount" value="" data-bind="keyup: Order.ChangeSale" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Lý do giảm giá</label>
                        <input type="text" class="form-control sale-notes" value="" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" data-bind="click: Order.CreateSale">Thêm giảm giá</button>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-shipping" class="modal fade" data-bind="load: Order.ChangeShipping">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">Phí vận chuyển</h4></div>
                <div class="modal-body">
                    <div class="modal-alerts"></div>
                    <div class="shipping-place"></div>
                    <div class="shipping-default">
                        <div class="form-check selected" data-id="0">
                            <input id="free-shipping" type="radio" class="with-gap" name="shipping" value="free" checked /><label for="free-shipping">Miễn phí vận chuyển</label>
                            <input type="hidden" class="shipping-name" value="Miễn phí vận chuyển" />
                            <input type="hidden" class="shipping-price" value="0" />
                        </div>
                        <div class="form-check" data-id="0">
                            <input id="custom-shipping" type="radio" class="with-gap" name="shipping" value="custom" /><label for="custom-shipping">Tùy chỉnh</label>
                        </div>
                    </div>
                    <div class="row shipping-custom">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" class="form-control shipping-name" placeholder="Tên phí vận chuyển" value="" readonly />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control shipping-price" value="0" data-bind="keyup: Format.Number" readonly />
                                    <span class="input-group-addon">&#8363;</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" data-bind="click: Order.CreateShipping">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-product" class="modal fade">
        <div class="modal-dialog">
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
                                    <input type="text" class="form-control" name="price_new" value="" data-bind="keyup: Format.Number" />
                                    <span class="input-group-addon"><span class="currency-symbols" data-type="VND">&#8363;</span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Số lượng</span>
                                    <input type="text" class="form-control" name="product_quantity" value="1" data-bind="keyup: Format.Number" />
                                </div>
               
                            </div>
                        </div>
                    </div>
                    <input id="product-ship" type="checkbox" class="filled-in" name="product_ship" checked="checked" /><label for="product-ship">Có giao hàng</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" data-bind="click: Order.CreateProduct">Lưu</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div id="modal-customer" class="order-modal modal fade" data-action="create">
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
                        <div class="form-group create-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" value="" maxlength="60" data-parsley-trigger="change focusout" data-parsley-type="email" data-parsley-type-message="Địa chỉ Email không không hợp lệ" data-parsley-maxlength="60" data-parsley-maxlength-message="Địa chỉ Email quá dài." />
                        </div>
                        <div class="form-group create-group">
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
                        <div class="update-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <button type="button" class="btn btn-primary" data-bind="click: Order.UpdateCustomer">Lưu</button>
                        </div>
                        <div class="create-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <button type="button" class="btn btn-primary" data-bind="click: Order.CreateCustomer">Thêm mới</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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