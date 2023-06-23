$().ready(function() {
    $("#validateForm").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            "name":{ required: true, maxlength: 120 },
            "your_name":{ required: true, maxlength: 50, minlength: 3, },
            "email":{ required: true, email: true },
            "password":{ required: true, },
            "passwordold":{ required: true, },
            "passwordagain":{ equalTo: "#password", },
            "sku":{ required: true, equalTo: "#sku", },
            "area":{ number: true, },
            "price":{ number: true, },
            "number":{ number: true, },
            "bedroom":{ number: true, },
            "category_id":{ required: true, },
        },
        messages: {
            "name": {
                required: "Bắt buộc phải nhập ...",
                maxlength: "Nhập ít hơn 120 ký tự",
            },
            "your_name": {
                required: "Nhập Họ & Tên",
                maxlength: "Nhập ít hơn 50 ký tự",
                minlength: "Nhập nhiều hơn 3 ký tự",
            },
            "email": {
                required: "Nhập Email",
                email: "Nhập đúng định dạng email",
            },
            "passwordold": {
                required: "Nhập mật khẩu",
            },
            "password": {
                required: "Nhập mật khẩu",
            },
            "passwordagain": {
                equalTo: "Mật khẩu không khớp",
            },
            "sku": {
                required: "Nhập mã xác nhận",
                equalTo: "Mã xác nhận không đúng",
            },
            "area": {
                number: "Nhập số 88 / 8.8",
            },
            "price": {
                number: "Nhập số 88 / 8.8",
            },
            "number": {
                number: "Nhập số 88 / 8.8",
            },
            "bedroom": {
                number: "Nhập số 88 / 8.8",
            },
            "category_id": {
                required: "Bắt buộc phải nhập ...",
            },
        }
    });
});