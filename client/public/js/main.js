$(document).ready(function () {
    var form_login = $(".form_login");
    form_login.submit(function(e){
        e.preventDefault();
        // var username = $("#username").val();
        // var password = $("#password").val();
        // alert(form_login.serialize());
        $.ajax({
            type: form_login.attr('method'),
            url: form_login.attr('data-action'),
            data: form_login.serialize(),
            success: function(username){
                // alert(username);
                if(username !== '-1'){
                    var form = $(".login");
                    form.css("display", "none");
                    $(".is_login").html("<p class='logined'>Xin chào: "+username+"</p>");
                }else{
                    $(".is_login").html("<p style='color: red; margin-top: 10px;'>Thông tin đăng nhập không chính xác!</p>"); 
                }
            }
        });
    });

    
});