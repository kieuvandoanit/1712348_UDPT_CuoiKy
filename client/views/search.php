<!DOCTYPE html>
<html lang="en">

<head>
  <base href="<?php echo _BASELINK_;?>"/>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hello</title>
  <link rel="stylesheet" href="client/public/reset.css">
  <!-- <link rel="stylesheet" href="../../public/bootstrap/bootstrap.min.css"> -->
  <!-- <link rel="stylesheet" href="../../public/bootstrap/bootstrap-theme.min.css"> -->
  <link rel="stylesheet" href="client/public/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="client/public/font-awesome/css/all.css"> -->
  <script src="https://kit.fontawesome.com/5cca95f2cf.js" crossorigin="anonymous"></script>

 

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/wafynfll6yk0et81pwlvcwdx6r76d4pl4gy3397p9126dmzm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="client/public/js/main.js"></script>

</head>
<body>
    <div class="container">
        <div class="header">
            Banner
        </div>
        <div class="navbar">
            <div class="icon_home">
                <i class="fas fa-home"></i>
            </div>
            <ul class="menu">
                <li class="item"><button class="item_button"><a href="">Tìm kiếm</a></button></li>
                <li class="item"><button class="item_button"><a href="">Thêm bài viết</a></button></li>
                <li class="item"><button class="item_button"><a href="">Thêm album</a></button></li>
            </ul>
            
        </div>
        <div class="content">
            <div class="left_sidebar col-md-3">
                <div class="category">
                    <div class="title">CÁC THỂ LOẠI</div>
                    <ul>
                        <?php 
                        foreach($data['category'] as $category){
                            ?>
                            <li><a href=""><?php echo $category['GenreName']; ?></a></li>
                            <?php 
                        }
                        ?>
                        
                        
                    </ul>
                </div>
                <div class="singer_band">
                    <div class="title">CÁC CA SĨ / NHÓM NHẠC</div>
                    <ul>
                        <?php 
                        foreach($data['singerband'] as $singerband){
                            ?>
                            <li><a href=""><?php echo $singerband['Name']; ?></a></li>
                            <?php 
                        }
                        ?>
                        
                    </ul>
                </div>
            </div>
            <div class="main col-md-6">
                <div class="search">
                    <h4>Tìm kiếm</h4>
                    <form data-action="<?php echo HEADERLINK."Home/Search" ?>" method="POST" class="formSearch" id="formSearch">
                        <!-- <div class="left_form"> -->
                            <label for="search">Từ khóa</label>
                            <input type="text" name="keySearch" id="searchKey"><br>

                            <input type="checkbox" style="margin-left: 40px;" id="singer_search" class="searchType" name="singer" value="singer">
                            <label for="">Ca sĩ</label>

                            <input type="checkbox" style="margin-left: 15px;" id="album_search" class="searchType" name="album" value="album">
                            <label for="">Album</label>

                            <input type="checkbox" style="margin-left: 15px;" id="song_search" class="searchType" name="song" value="song">
                            <label for="">Bài hát</label>
                        <!-- </div> -->
                        <!-- <div class="right_form"> -->
                            <!-- <input type="submit"  value="Tìm kiếm"> -->
                            <button type="submit" style="margin-left: 50px;" id="submit_form_search">Tìm kiếm</button>
                            <!-- </div> -->
                    </form>

                </div>
                <div class="result">
                    <div class="song_result">
                        <h4>Kết quả</h4>
                        <div class="icon_result">
                            <i class="fas fa-angle-double-right"></i>
                            <p>BÀI HÁT</p>
                        </div>
                        <ul id="song_result">
                            
                        </ul>
                        <div class="pagging_song">
                            <ul id = "pagging_song_result" style="display: flex; justify-content: center;">
                                
                            </ul>
                        </div>
                    </div>
                    
                    <div class="album_result">
                        <div class="icon_result">
                            <i class="fas fa-angle-double-right"></i>
                            <p>ALBUM</p>
                        </div>
                        
                        <ul id="album_result">
                            
                        </ul>
                        <div class="pagging_album">
                            <ul id = "pagging_album_result" style="display: flex; justify-content: center;">
                                
                            </ul>
                        </div>
                    </div>
                    
                    <div class="singer_band_result">
                        <div class="icon_result">
                            <i class="fas fa-angle-double-right"></i>
                            <p>CA SĨ / NHÓM NHẠC</p>
                        </div>
                        
                        <ul id="singer_result">
                        
                        </ul>
                    </div>
                </div>
            </div>
            <div class="right_sidebar col-md-3">
                <div class="is_login"></div>
                <div class="login">
                    <div class="title_login">
                        ĐĂNG NHẬP
                    </div>
                    <form data-action="<?php echo HEADERLINK.'Home/loginHandle' ?>" method="POST" class="form_login">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" id="username" name="username">
                        <label for="password">Mật khẩu</label>
                        <input type="password" id="password" name="password">
                        <input type="submit" value="Đăng nhập" name="login">
                    </form>
                </div>
                <div class="new_album">
                    <div class="title">ALBUM MỚI</div>
                    <ul>
                        <?php 
                        foreach($data['newalbum'] as $album){
                            ?>
                            <li><a href=""><?php echo $album['Title']; ?></a></li>
                            <?php 
                        }
                        ?>
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer">
            1712348 - Kiều Văn Đoàn
        </div>
    </div>
    <!-- <img src="abc.PNG" alt=""> -->
</body>
</html>