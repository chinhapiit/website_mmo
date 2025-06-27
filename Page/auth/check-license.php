
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="juAuIFuoVTNmc6Rtexw4HNnGeexTPkO2xyrkn2f4">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Riho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Riho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="https://larathemes.pixelstrap.com/riho/assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="https://larathemes.pixelstrap.com/riho/assets/images/favicon.png" type="image/x-icon">
    <title>Check Bản Quyền - TEAM API IT</title>
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
    <link rel="stylesheet" type="text/css" href="https://larathemes.pixelstrap.com/riho/assets/css/vendors/animate.css">
<!-- Plugins css Ends-->

<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="https://larathemes.pixelstrap.com/riho/assets/css/vendors/bootstrap.css">
<!-- App css-->
<link rel="preload" as="style" href="https://larathemes.pixelstrap.com/riho/build/assets/style-CvJ7-60s.css" /><link rel="stylesheet" href="https://larathemes.pixelstrap.com/riho/build/assets/style-CvJ7-60s.css" data-navigate-track="reload" /><link id="color" rel="stylesheet" href="https://larathemes.pixelstrap.com/riho/assets/css/color-1.css" media="screen">
<!-- Responsive css-->
<link rel="stylesheet" type="text/css" href="https://larathemes.pixelstrap.com/riho/assets/css/responsive.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
        <!-- loader starts-->
    <div class="loader-wrapper">
        <div class="loader">
            <div class="loader4"></div>
        </div>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
        <div class="container-fluid p-0">
            <!-- Unlock page start-->
            <div class="authentication-main mt-0">
                <div class="row">
                    <div class="col-12">
                        <div class="login-card login-dark">
                            <div>
                                <div><a class="logo" href="https://larathemes.pixelstrap.com/riho/admin/default-dashboard"><img class="img-fluid for-dark"
                                            src="https://larathemes.pixelstrap.com/riho/assets/images/logo/logo.png" alt="looginpage"><img
                                            class="img-fluid for-light"
                                            src="https://larathemes.pixelstrap.com/riho/assets/images/logo/logo_dark.png" alt="looginpage"></a>
                                </div>
                                <div class="login-main">
                                    <form class="theme-form">
                                        <h4>Kích Hoạt WebSite</h4>
                                        <div class="form-group">
                                            <label class="col-form-label">Nhập key kích hoạt</label>
                                            <div class="form-input position-relative">
                                                <input class="form-control" type="email" id="email"
                                                    required="" placeholder="Nhập key">
                                                <div class="show-hide"></div>
                                            </div>
                                        </div>
                                        <p class="mt-4 mb-0">Chưa có key ?<a class="ms-2"
                                                href="/auth/login">Mua key </a></p>
                           <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                           <script>
                                $("#btnReset").on("click", function() {
                                    if (!document.getElementById('checkbox1').checked) {
                                        Swal.fire({
                                            title: "Lỗi",
                                            icon: "error",
                                            text: "Vui lòng xác nhận đặt lại mật khẩu",
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        }).then(() => {
                                            $('#btnReset').html('Đặt lại').prop('disabled', false);
                                        });
                                    }
                                    $('#btnReset').html(
                                        '<i class="fa fa-spinner fa-spin"></i> Đang xử lý...'
                                    ).prop('disabled',
                                        true);
                                        
                                    var myOTPData = {
                                        action: 'RESET_PASS',
                                        email: $("#email").val(),
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
                                                    window.location.reload();
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
                                            $('#btnReset').html('Đăng Nhập').prop(
                                                'disabled', false);
                                        }, "json");
                                });
                                </script>
                                    </form>
                                </div>
                            </div>
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
<script src="https://larathemes.pixelstrap.com/riho/assets/js/script.js"></script></body>

</html>
