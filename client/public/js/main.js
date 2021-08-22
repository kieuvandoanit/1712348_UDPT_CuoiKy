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
            return;
        }
        if(searchType.length === 0){
            e.preventDefault();
            alert("Vui lòng chọn loại tìm kiếm!");
            return;
        }
        formSearch.submit(function(e){
            
            e.preventDefault();
            $.ajax({
                type: formSearch.attr('method'),
                url: formSearch.attr('data-action'),
                data: formSearch.serialize(),
                success: function(data){
                    var result = JSON.parse(data);
                    console.log(result.result_song);
                    var result_song = "";
                    $("#song_result").html('');
                    $("#pagging_song_result").html('');
                    if(result.result_song !== undefined){
                        var result_song_length = result.result_song.length>2?2:result.result_song.length;
                        for(let i = 0; i < result_song_length; i++){
                            result_song = result_song+'<li class="item_result">'
                                +'<div class="item_result_left">'
                                +'<p class="title_song">'+(i+1)+'. <a href="">'+result.result_song[i].Title+' - '+result.result_song[i].Name+'</a></p>'
                                +'<p class="title_category">Tên thể loại:'+result.result_song[i].GenreName+' <span>('+Math.floor(result.result_song[i].Length/60)+':'+result.result_song[i].Length%60+')</span></p>'
                                +'</div>'
                                +'<div class="item_result_right"><i class="fas fa-play"></i></div>'
                                +'</li>';
                        }
                        $("#song_result").html(result_song);
                        
                        $("#pagging_song_result").html('');
                        if(result.result_song.length > 2){
                            var paging_result_song_html = '';
                            var paging_result_song_num = Math.ceil(result.result_song.length / 2);
                            for(let i=0; i < paging_result_song_num; i++){
                                paging_result_song_html = paging_result_song_html + '<li class="paging_result_song" id="'+(i+1)+'" style="padding: 10px; cursor: pointer;">'+(i+1)+'</li>';
                            }
                            $("#pagging_song_result").html(paging_result_song_html);
                        }
                        //click phan trang
                        $(document).on("click",".paging_result_song",function(e){
                            console.log(e.target.id);
                            if(e.target.id == paging_result_song_num){
                                console.log(paging_result_song_num);
                                var paging_result_song_num_temp = 1;
                            }
                            else{
                                var paging_result_song_num_temp = 2;
                            }
                            var result_song = "";
                            for(let i = 0; i < paging_result_song_num_temp; i++){
                                result_song = result_song+'<li class="item_result">'
                                    +'<div class="item_result_left">'
                                    +'<p class="title_song">'+((e.target.id-1)*2+1 + i)+'. <a href="">'+result.result_song[(e.target.id-1)*2 +i].Title+' - '+result.result_song[(e.target.id-1)*2 +i].Name+'</a></p>'
                                    +'<p class="title_category">Tên thể loại:'+result.result_song[i].GenreName+' <span>('+Math.floor(result.result_song[(e.target.id-1)*2 +i].Length/60)+':'+result.result_song[(e.target.id-1)*2 +i].Length%60+')</span></p>'
                                    +'</div>'
                                    +'<div class="item_result_right"><i class="fas fa-play"></i></div>'
                                    +'</li>';
                            }
                            $("#song_result").html(result_song);
                        });
                    }
                    

                    //Album
                    $("#album_result").html('');
                    if(result.result_album !== undefined){
                        var result_album = "";
                        var result_album_length = result.result_album.length>2?2:result.result_album.length;
                        for(let i = 0; i < result_album_length; i++){
                            result_album = result_album+'<li class="item_result">'
                            +'<div class="item_result_left">'
                                +'<p>1. <a href="">'+result.result_album[i].Title+' - (Số bài hát: '+result.result_album[i].SL+')</a></p>'
                                +'<p class="date_release">Ngày phát hành: '+result.result_album[i].ReleaseDate+'</p>'
                            +'</div>'
                            +'<div class="item_result_righta">Cover</i></div>'
                        +'</li>';
                        }
                        $("#album_result").html(result_album);
                        
                        $("#pagging_album_result").html('');
                        if(result.result_album.length > 2){
                            var paging_result_album_html = '';
                            var paging_result_album_num = Math.ceil(result.result_album.length / 2);
                            for(let i=0; i < paging_result_album_num; i++){
                                paging_result_album_html = paging_result_album_html + '<li class="paging_result_album" id="'+(i+1)+'" style="padding: 10px; cursor: pointer;">'+(i+1)+'</li>';
                            }
                            $("#pagging_album_result").html(paging_result_album_html);
                        }   
                        // // click phan trang
                        // $(document).on("click",".paging_result_album",function(e){
                        //     console.log(e.target.id);
                        //     if(e.target.id == paging_result_album_num){
                        //         console.log(paging_result_album_num);
                        //         var paging_result_album_num_temp = 1;
                        //     }
                        //     else{
                        //         var paging_result_album_num_temp = 2;
                        //     }
                        //     var result_album = "";
                        //     for(let i = 0; i < paging_result_album_num_temp; i++){
                        //         result_album = result_+'<li class="item_result">'
                        //             +'<div class="item_result_left">'
                        //             +'<p class="title_album">'+((e.target.id-1)*2+1 + i)+'. <a href="">'+result.result_album[(e.target.id-1)*2 +i].Title+' - '+result.result_album[(e.target.id-1)*2 +i].Name+'</a></p>'
                        //             +'<p class="title_category">Tên thể loại:'+result.result_song[i].GenreName+' <span>('+Math.floor(result.result_song[(e.target.id-1)*2 +i].Length/60)+':'+result.result_song[(e.target.id-1)*2 +i].Length%60+')</span></p>'
                        //             +'</div>'
                        //             +'<div class="item_result_right"><i class="fas fa-play"></i></div>'
                        //             +'</li>';
                        //     }
                        //     $("#song_result").html(result_song);
                        // });

                    }
                        //Singer
                        $("#singer_result").html('');
                    if(result.result_singer !== undefined){
                        var result_singer = "";
                        var result_singer_length = result.result_singer.length>2?2:result.result_singer.length;
                        for(let i = 0; i < result_singer_length; i++){
                            result_singer = result_singer+'<li class="item_result">'
                            +'<div class="item_result_left">'
                                +'<p>'+(i+1)+'. <a href="">'+result.result_singer[i].Name+'</a></p>'
                            +'</div>'
                            +'<div class="item_result_righta">Image</i></div>'
                        +'</li>';
                        }
                        $("#singer_result").html(result_singer);
                        
                        // $("#pagging_album_result").html('');
                        // if(result.result_album.length > 2){
                        //     var paging_result_album_html = '';
                        //     var paging_result_album_num = Math.ceil(result.result_album.length / 2);
                        //     for(let i=0; i < paging_result_album_num; i++){
                        //         paging_result_album_html = paging_result_album_html + '<li class="paging_result_album" id="'+(i+1)+'" style="padding: 10px; cursor: pointer;">'+(i+1)+'</li>';
                        //     }
                        //     $("#pagging_album_result").html(paging_result_album_html);
                        // }
                    }

                    }
            });
        });
        
    });


    
});