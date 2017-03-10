module.validation = {
    /*
    Taxonomy: function () {
        $("#taxonomy-form").validate({
            rules: {
                name: "required",
                lastname: "required",
                name: {
                    required: true,
                    minlength: 2
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                agree: "required"
            },
            messages: {
                name: "Please enter your firstname",
                lastname: "Please enter your lastname",
                username: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 2 characters"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email: "Please enter a valid email address",
                agree: "Please accept our policy",
                topic: "Please select at least 2 topics"
            },
            errorPlacement: function(error, element) {
                //error.appendTo( element.parent());
            },
            highlight: function (element, required) {
                $(element).css('border', '2px solid #FDADAF');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).css('border', '1px solid #CCC');
            }
        });
    },
    */
    Post: function() {
        $("#post-form").validate({
            rules: {
                title: "required"
            },
            messages: {
                title: "Tiêu đề không được để trống"
            },
            //errorPlacement: function(error, element) {
                //error.appendTo( element.parent());
            //},
            highlight: function (element, required) {
                $(element).css('border', '1px solid #d8e2e7');
            },
            unhighlight: function (element, errorClass, validClass) {
                //$(element).css('border', '1px solid #CCC');
            }
        });
    },
    Page: function() {
        $("#page-form").validate({
            rules: {
                title: "required"
            },
            messages: {
                title: "Tiêu đề không được để trống"
            },
            //errorPlacement: function(error, element) {
                //error.appendTo( element.parent());
            //},
            highlight: function (element, required) {
                $(element).css('border', '1px solid #d8e2e7');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).css('border', '1px solid #CCC');
            }
        });
    },
    Product: function() {
        $("#product-form").validate({
            rules: {
                title: "required",
                product_code: "required",
                price_old: {
                    required: true,
                    number: true,
                    min: 0
                },
                price_new: {
                    required: true,
                    number: true,
                    min: 0
                }
            },
            messages: {
                title: "Tiêu đề không được để trống",
                product_code: "Mã sản phẩm không được để trống",
                price_old: {
                    required: "Giá cũ không được để trống",
                    number: "Giá cũ phải là số",
                    min: "Giá cũ phải là số lớn hơn hoặc bằng 0"
                },
                price_new: {
                    required: "Giá mới không được để trống",
                    number: "Giá mới phải là số",
                    min: "Giá mới phải là số lớn hơn hoặc bằng 0"
                }
            },
            //errorPlacement: function(error, element) {
                //error.appendTo( element.parent());
            //},
            highlight: function (element, required) {
                $(element).css('border', '2px solid #FDADAF');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).css('border', '1px solid #CCC');
            }
        });
    },
    ProductGroup: function() {
        $("#productGroup-form").validate({
            rules: {
                name: "required"
            },
            messages: {
                name: "Tên nhóm sản phẩm không được để trống"
            },
            //errorPlacement: function(error, element) {
                //error.appendTo( element.parent());
            //},
            highlight: function (element, required) {
                $(element).css('border', '2px solid #FDADAF');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).css('border', '1px solid #CCC');
            }
        });
    },
    ProductManufactory: function() {
        $("#manufactoryProduct-form").validate({
            rules: {
                name: "required"
            },
            messages: {
                name: "Tên nhà sản xuất không được để trống"
            },
            //errorPlacement: function(error, element) {
                //error.appendTo( element.parent());
            //},
            highlight: function (element, required) {
                $(element).css('border', '2px solid #FDADAF');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).css('border', '1px solid #CCC');
            }
        });
    },
    /*
    Discount: function() {
        $("#discount-form").validate({
            rules: {
                discount_name: "required"
            },
            messages: {
                discount_name: "Mã khuyến mãi không được để trống"
            },
            //errorPlacement: function(error, element) {
                //error.appendTo( element.parent());
            //},
            highlight: function (element, required) {
                $(element).css('border', '2px solid #FDADAF');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).css('border', '1px solid #CCC');
            }
        });
    },
    */
    Taxonomy: function() {
        $("#taxonomy-form").validate({
            rules: {
                name: "required"
            },
            messages: {
                name: "Tên không được để trống"
            },
            //errorPlacement: function(error, element) {
                //error.appendTo( element.parent());
            //},
            highlight: function (element, required) {
                //$(element).css('border', '2px solid #FDADAF');
                $(element).parents(".form-group").addClass('error');
            },
            unhighlight: function (element, errorClass, validClass) {
                //$(element).css('border', '1px solid #CCC');
                $(element).parents(".form-group").removeClass('error');
            }
        });
    },
    User_create: function() {
        
        $.validator.addMethod("regex_username",function(value,element){
            return this.optional(element) || /^[A-Za-z0-9_]+$/.test(value);
        });
        
        $.validator.addMethod("regex_telephone",function(value,element){
            return this.optional(element) || /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/.test(value);
        });
        
        $.validator.addMethod("valueNotEquals", function(value, element, arg){
            return arg != value;
        });

        $("#userCreate-form").validate({
            rules: {
                username: {
                    required: true,
                    regex_username: true,
                    rangelength: [5, 32]
                },
                password: {
                    required: true,
                    minlength: 6
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password"
                },
                email: "email",
                telephone: "regex_telephone",
                gender: {
                    valueNotEquals: "choise"
                },
                level: {
                    valueNotEquals: "choise"
                },
                status: {
                    valueNotEquals: "choise"
                }
            },
            messages: {
                username: {
                    required: "Tên đăng nhập không được để trống",
                    regex_username: "Tên đăng nhập bao gồm ký tự hoặc là số hoặc dấu gạch dưới",
                    rangelength: "Tên đăng nhập phải từ 5 đến 32 ký tự"
                },
                password: {
                    required: "Mật khẩu không được để trống",
                    minlength: "Mật khẩu cần có ít nhất 6 ký tự"
                },
                password_confirmation: {
                    required: "Mật khẩu xác nhận không được để trống",
                    equalTo: "Mật khẩu và mật khẩu xác nhận cần phải giống nhau"
                },
                email: "Email không đúng, vui lòng nhập lại",
                telephone: "Điện thoại không đúng, vui lòng nhập lại",
                gender: {
                    valueNotEquals: "Vui lòng chọn giới tính"
                },
                level: {
                    valueNotEquals: "Vui lòng chọn quyền hạn"
                },
                status: {
                    valueNotEquals: "Vui lòng chọn tình trạng"
                }
            },
            //errorPlacement: function(error, element) {
                //error.appendTo( element.parent());
            //},
            highlight: function (element, required) {
                $(element).css('border', '2px solid #FDADAF');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).css('border', '1px solid #CCC');
            }
        });
    },
    User_edit: function() {
        
        $.validator.addMethod("regex_username",function(value,element){
            return this.optional(element) || /^[A-Za-z0-9_]+$/.test(value);
        });
        
        $.validator.addMethod("regex_telephone",function(value,element){
            return this.optional(element) || /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/.test(value);
        });
        
        $.validator.addMethod("valueNotEquals", function(value, element, arg){
            return arg != value;
        });

        $("#userEdit-form").validate({
            rules: {
                username: {
                    required: true,
                    regex_username: true,
                    rangelength: [5, 32]
                },
                password: {
                    minlength: 6
                },
                password_confirmation: {
                    equalTo: "#password"
                },
                email: "email",
                telephone: "regex_telephone",
                gender: {
                    valueNotEquals: "choise"
                },
                level: {
                    valueNotEquals: "choise"
                },
                status: {
                    valueNotEquals: "choise"
                }
            },
            messages: {
                username: {
                    required: "Tên đăng nhập không được để trống",
                    regex_username: "Tên đăng nhập bao gồm ký tự hoặc là số hoặc dấu gạch dưới",
                    rangelength: "Tên đăng nhập phải từ 5 đến 32 ký tự"
                },
                password: {
                    minlength: "Mật khẩu cần có ít nhất 6 ký tự"
                },
                password_confirmation: {
                    equalTo: "Mật khẩu và mật khẩu xác nhận cần phải giống nhau"
                },
                email: "Email không đúng, vui lòng nhập lại",
                telephone: "Điện thoại không đúng, vui lòng nhập lại",
                gender: {
                    valueNotEquals: "Vui lòng chọn giới tính"
                },
                level: {
                    valueNotEquals: "Vui lòng chọn quyền hạn"
                },
                status: {
                    valueNotEquals: "Vui lòng chọn tình trạng"
                }
            },
            //errorPlacement: function(error, element) {
                //error.appendTo( element.parent());
            //},
            highlight: function (element, required) {
                $(element).css('border', '2px solid #FDADAF');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).css('border', '1px solid #CCC');
            }
        });
    },
    Customer: function() {
        
        $.validator.addMethod("regex_username",function(value,element){
            return this.optional(element) || /^[A-Za-z0-9_]+$/.test(value);
        });
        
        $.validator.addMethod("regex_telephone",function(value,element){
            return this.optional(element) || /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/.test(value);
        });
        
        $.validator.addMethod("valueNotEquals", function(value, element, arg){
            return arg != value;
        });

        $("#customer-form").validate({
            rules: {
                username: {
                    regex_username: true,
                    rangelength: [5, 32]
                },
                password: {
                    minlength: 6
                },
                password_confirmation: {
                    equalTo: "#password"
                },
                email: "email",
                telephone: "regex_telephone",
                nickname: "required",
                gender: {
                    valueNotEquals: "choise"
                },
                status: {
                    valueNotEquals: "choise"
                }
            },
            messages: {
                username: {
                    regex_username: "Tên đăng nhập bao gồm ký tự hoặc là số hoặc dấu gạch dưới",
                    rangelength: "Tên đăng nhập phải từ 5 đến 32 ký tự"
                },
                password: {
                    minlength: "Mật khẩu cần có ít nhất 6 ký tự"
                },
                password_confirmation: {
                    equalTo: "Mật khẩu và mật khẩu xác nhận cần phải giống nhau"
                },
                email: "Email không đúng, vui lòng nhập lại",
                telephone: "Điện thoại không đúng, vui lòng nhập lại",
                nickname: "Họ tên không được để trống",
                gender: {
                    valueNotEquals: "Vui lòng chọn giới tính"
                },
                status: {
                    valueNotEquals: "Vui lòng chọn tình trạng"
                }
            },
            //errorPlacement: function(error, element) {
                //error.appendTo( element.parent());
            //},
            highlight: function (element, required) {
                $(element).css('border', '2px solid #FDADAF');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).css('border', '1px solid #CCC');
            }
        });
    },
    init: function () {
        //module.validation.Taxonomy();
        module.validation.Post();
        module.validation.Page();
        module.validation.Product();
        module.validation.ProductGroup();
        module.validation.ProductManufactory();
        //module.validation.Discount();
        module.validation.Taxonomy();
        module.validation.User_create();
        module.validation.User_edit();
        module.validation.Customer();
    }
}
$(document).ready(function() {
    module.validation.init();
});