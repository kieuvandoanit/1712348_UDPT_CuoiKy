$(document).ready(function () {
    //Login
    var form_login = $(".form_login");
    form_login.submit(function(e){
        e.preventDefault();
        $.ajax({
            type: form_login.attr('method'),
            url: form_login.attr('data-action'),
            data: form_login.serialize(),
            success: function(username){
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


    //Tim kiem

    var btnSearch = $("#submit_form_search");
    btnSearch.click(function(e){
        var formSearch = $(".formSearch");
        var searchKey = $("#searchKey").val();
        var checkbox = $('.searchType');
        var searchType = [];
        for (var i = 0; i < checkbox.length; i++){
            if (checkbox[i].checked === true){
                searchType.push(checkbox[i].value);
            }
        }
        if(searchKey === ""){
            e.preventDefault();
            alert("Vui lòng nhập từ khóa tìm kiếm!");
        }
        if(searchType.length === 0){
            e.preventDefault();
            alert("Vui lòng chọn loại tìm kiếm!");
        }
        // if(searchKey !== "" && searchType.length > 0){
        //     alert("Vui l");
        //     // formSearch.submit();
        // }
    });
});