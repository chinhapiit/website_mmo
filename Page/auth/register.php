
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mua tài nguyên game MMO như VIA cổ, clone Facebook, tài khoản game giá rẻ uy tín. Hỗ trợ nhanh chóng, nhiều lựa chọn hấp dẫn.">
    <meta name="keywords" content="mua tài nguyên mmo, VIA cổ, clone Facebook, tài kh...">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="https://larathemes.pixelstrap.com/riho/assets//images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="https://larathemes.pixelstrap.com/riho/assets//images/favicon.png" type="image/x-icon">
    <title>Đăng Ký - TEAM API IT</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://larathemes.pixelstrap.com/riho/assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="https://larathemes.pixelstrap.com/riho/assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="https://larathemes.pixelstrap.com/riho/assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="https://larathemes.pixelstrap.com/riho/assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="https://larathemes.pixelstrap.com/riho/assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="https://larathemes.pixelstrap.com/riho/assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="https://larathemes.pixelstrap.com/riho/assets/css/style.css">
    <link id="color" rel="stylesheet" href="https://larathemes.pixelstrap.com/riho/assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="https://larathemes.pixelstrap.com/riho/assets/css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <!-- login page start-->
    <div class="container-fluid p-0"> 
      <div class="row m-0">
        <div class="col-12 p-0">    
          <div class="login-card login-dark">
            <div>
              <div><a class="logo" href="index.html"> <img class="img-fluid for-dark" src="https://i.imgur.com/FJZ4kRE.png" height="170px" width="170px" alt="looginpage">
                        <img class="img-fluid for-light" src="https://i.imgur.com/FJZ4kRE.png" height="170px" width="170px"  alt="looginpage"></a></div>
              <div class="login-main"> 
                <form class="theme-form">
                  <h4>Đăng ký tài khoản</h4>
                  <p>Nhập thông tin của bạn để tạo tài khoản</p>
                  <div class="form-group">
                    <label class="col-form-label pt-0">Tên của bạn</label>
                    <div class="row g-2">
                      <div class="col-6">
                        <input class="form-control" type="text" required="" id="firstname" placeholder="Họ">
                      </div>
                      <div class="col-6">
                        <input class="form-control" type="text" id="lastname" placeholder="Tên">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Tên tài khoản</label>
                    <input class="form-control" type="text" id="username" placeholder="chinh....">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Email</label>
                    <input class="form-control" type="email" id="email" placeholder="admin@gmail.com">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Mật khẩu</label>
                    <div class="form-input position-relative">
                        <input id="password" type="password"  class="form-control " name="password" id="password"   placeholder="**************" required autocomplete="current-password">
                        <div class="show-hide"> <span class="show"></span></div>
                    </div>
                  </div>
                  <div class="form-group mb-0">
                  
                    <button class="btn btn-primary btn-block w-100" id="btnRegister" type="submit">Đăng ký</button>
                  </div>
                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                <script>
                    $("#btnRegister").on("click", function() {
                        $('#btnRegister').html(
                            'Đang xử lý...'
                        ).prop('disabled',
                            true);
                        
                        var myOTPData = {
                            action: 'REGISTER',
                            username: $("#username").val(),
                            password: $("#password").val(),
                            firstname: $("#firstname").val(),
                            lastname: $("#lastname").val(),
                            email: $("#email").val()
                            
                        };
                        $.post("/Ajax/auth/auth.php", myOTPData,
                            function(data) {
                                if (data.status == '2') {
                                    Swal.fire({
                                        title: "Thành công",
                                        icon: "success",
                                        text: data.msg,
                                        customClass: {
                                                confirmButton: "btn btn-primary"
                                                }
                                    });
                                    setTimeout(function() {
                                        window.location = "/"
                                    }, 2000);
                                } else {
                                    Swal.fire({
                                        title: "Lỗi",
                                        icon: "error",
                                        text: data.msg,
                                        customClass: {
                                                confirmButton: "btn btn-primary"
                                                }
                                    });
                                }
                                $('#btnRegister').html('Đăng Nhập').prop(
                                    'disabled', false);
                            }, "json");
                    });
                    </script>
                  <p class="mt-4 mb-0">Nếu bạn đã có tài khoản?<a class="ms-2" href="/auth/login">Đăng nhập</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- latest jquery-->
      <script src="https://larathemes.pixelstrap.com/riho/assets/js/jquery.min.js"></script>
      <!-- Bootstrap js-->
      <script src="https://larathemes.pixelstrap.com/riho/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
      <!-- feather icon js-->
      <script src="https://larathemes.pixelstrap.com/riho/assets/js/icons/feather-icon/feather.min.js"></script>
      <script src="https://larathemes.pixelstrap.com/riho/assets/js/icons/feather-icon/feather-icon.js"></script>
      <!-- scrollbar js-->
      <!-- Sidebar jquery-->
      <script src="https://larathemes.pixelstrap.com/riho/assets/js/config.js"></script>
      <!-- Plugins JS start-->
      <!-- calendar js-->
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="https://larathemes.pixelstrap.com/riho/assets/js/script.js"></script>
    </div>
  </body>
</html>