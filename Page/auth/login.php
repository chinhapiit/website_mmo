<!DOCTYPE html>
<html lang="en">
   <head>
      <meta name="csrf-token" content="VYh3D6s0iisN8RsR0WbWoZhRtjDf48HVPSLqbrGK">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description"
         content="Mua tài nguyên game MMO như VIA cổ, clone Facebook, tài khoản game giá rẻ uy tín. Hỗ trợ nhanh chóng, nhiều lựa chọn hấp dẫn.">
      <meta name="keywords"
         content="mua tài nguyên mmo, VIA cổ, clone Facebook, tài kh...">
      <meta name="author" content="pixelstrap">
      <link rel="icon" href="https://larathemes.pixelstrap.com/riho/assets/images/favicon.png" type="image/x-icon">
      <link rel="shortcut icon" href="https://larathemes.pixelstrap.com/riho/assets/images/favicon.png" type="image/x-icon">
      <title>Đăng Nhập - TEAM API IT</title>
      <!-- Google font-->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;display=swap"
         rel="stylesheet">
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
    <!-- Toastr css-->
    <link rel="stylesheet" type="text/css" href="https://larathemes.pixelstrap.com/riho/assets/css/vendors/toastr.min.css">
<!-- Plugins css Ends-->

<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="https://larathemes.pixelstrap.com/riho/assets/css/vendors/bootstrap.css">
<!-- App css-->
<link rel="preload" as="style" href="https://larathemes.pixelstrap.com/riho/build/assets/style-CxQbB_s3.css" /><link rel="stylesheet" href="https://larathemes.pixelstrap.com/riho/build/assets/style-CxQbB_s3.css" data-navigate-track="reload" /><link id="color" rel="stylesheet" href="https://larathemes.pixelstrap.com/riho/assets/css/color-1.css" media="screen">
 
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

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
                     <div>
                        <a class="logo" href="https://larathemes.pixelstrap.com/riho/admin/default-dashboard">
                        <img class="img-fluid for-dark" src="https://i.imgur.com/FJZ4kRE.png" height="170px" width="170px" alt="looginpage">
                        <img class="img-fluid for-light" src="https://i.imgur.com/FJZ4kRE.png" height="170px" width="170px"  alt="looginpage">
                        </a>
                     </div>
                     <div class="login-main">
                        <form class="theme-form">
                           <input type="hidden" name="_token" value="VYh3D6s0iisN8RsR0WbWoZhRtjDf48HVPSLqbrGK" autocomplete="off">                                
                           <h4>Đăng nhập tài khoản </h4>
                           <p>Nhập tài khoản or mật khẩu để đăng nhập</p>
                           <div class="form-group">
                              <label class="col-form-label">Tên tài khoản</label>
                              <input  type="text" class="form-control " name="username" id="username"  placeholder="Nhập tên tài khoản"  >
                           </div>
                           <div class="form-group">
                              <label class="col-form-label">Mật khẩu </label>
                              <div class="form-input position-relative">
                                 <input id="password" type="password"  class="form-control " name="password" id="password"   placeholder="**************" required autocomplete="current-password">
                                 <div class="show-hide"> <span class="show"></span></div>
                              </div>
                           </div>
                           <div class="form-group mb-0 text-end">
                              <a class="checkbox1" href="/reset-pass">Quên mật khẩu?</a>
                              <div class="text-end mt-3">
                                 <button class="btn btn-primary btn-block w-100" id="btnLogin" type="submit">Đăng nhập</button>
                              </div>
                           </div>
                           <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                           <script>
                                $("#btnLogin").on("click", function() {
                                    $('#btnLogin').html(
                                        '<i class="fa fa-spinner fa-spin"></i> Đang xử lý...'
                                    ).prop('disabled',
                                        true);
                                    var myOTPData = {
                                        action: 'LOGIN',
                                        username: $("#username").val(),
                                        password: $("#password").val()
                                       
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
                                            $('#btnLogin').html('Đăng Nhập').prop(
                                                'disabled', false);
                                        }, "json");
                                });
                                </script>
                                 <p class="mt-4 mb-0">Chưa có tài khoản ?<a class="ms-2" href="/auth/register">Đăng Ký</a></p>
                        </form>
                     </div>
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
      <!-- Theme js-->
      <script src="https://larathemes.pixelstrap.com/riho/assets/js/script.js"></script>
   </body>
</html>