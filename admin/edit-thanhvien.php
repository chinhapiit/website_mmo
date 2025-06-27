<?php require_once('header.php');?>
<?php
$id_tv = $_GET['id'];
$check_tv = $ketnoi->get_row("SELECT * FROM `users` WHERE  `id` = '$id_tv'  ");

?>
<body>
   <!-- Start Switcher -->
   <?php require_once('run.php');?>
   <div class="page">
   <?php require_once('nav.php');?>
   <?php require_once('sidebar.php');?>

   <div class="main-content app-content">
   <div class="container-fluid" bis_skin_checked="1">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb" bis_skin_checked="1">
            <h1 class="page-title fw-semibold fs-18 mb-0"><a type="button" class="btn btn-dark btn-raised-shadow btn-wave btn-sm me-1 waves-effect waves-light" href="/admin-nc/users"><i class="fa-solid fa-arrow-left"></i></a> Chỉnh sửa thành viên <?=$check_tv['username'];?></h1>
        </div>
        <div class="row gx-5" bis_skin_checked="1">
            <div class="col-12" bis_skin_checked="1">
                <div class="card custom-card shadow-none mb-4" bis_skin_checked="1">
                    <div class="card-body" bis_skin_checked="1">
                        <form >
                            <div class="row" bis_skin_checked="1">
                                <div class="col-md-6" bis_skin_checked="1">
                                    <div class="mb-4" bis_skin_checked="1">
                                        <label class="form-label">Username (<span class="text-danger">*</span>)</label>
                                        <div class="input-group" bis_skin_checked="1">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-user"></i>
                                            </span>
                                            <input type="text" class="form-control" value="<?=$check_tv['username'];?>" id="username" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" bis_skin_checked="1">
                                    <div class="mb-4" bis_skin_checked="1">
                                        <label class="form-label">Email (<span class="text-danger">*</span>)</label>
                                        <div class="input-group" bis_skin_checked="1">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-envelope"></i>
                                            </span>
                                            <input type="email" class="form-control" value="<?=$check_tv['email'];?>" id="email" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" bis_skin_checked="1">
                                <div class="col-md-4" bis_skin_checked="1">
                                    <div class="mb-4" bis_skin_checked="1">
                                        <label class="form-label">Mật khẩu (<span class="text-danger">*</span>)</label>
                                        <div class="input-group" bis_skin_checked="1">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-key"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="**********" id="password">
                                        </div>
                                        <small>Nhập mật khẩu cần thay đổi, hệ thống sẽ tự động mã hóa (bỏ trống nếu không muốn thay đổi)</small>
                                    </div>
                                </div>
                             
                                <div class="col-md-4" bis_skin_checked="1">
                                    <div class="mb-4" bis_skin_checked="1">
                                        <label class="form-label">LEVEL (<span class="text-danger">*</span>)</label>
                                        <select class="form-control select2bs4" id="level">
                                            <option value="0" <?= isset($check_tv['level']) && $check_tv['level'] == 0 ? 'selected' : '' ?>>
                                                Thành Viên
                                            </option>
                                            <option value="1" <?= isset($check_tv['level']) && $check_tv['level'] == 1 ? 'selected' : '' ?>>
                                                Admin
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4" bis_skin_checked="1">
                                    <div class="mb-4" bis_skin_checked="1">
                                        <div class="mb-4" bis_skin_checked="1">
                                            <label class="form-label">Banned (<span class="text-danger">*</span>)</label>
                                            <select class="form-control select2bs4" id="banned">
                                                <option value="0" <?= isset($check_tv['bannd']) && $check_tv['bannd'] == 0 ? 'selected' : '' ?>>
                                                    Live</option>
                                            <option value="1" <?= isset($check_tv['bannd']) && $check_tv['bannd'] == 1 ? 'selected' : '' ?>>
                                                Bannd
                                            </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" bis_skin_checked="1">
                                <div class="col-md-3" bis_skin_checked="1">
                                    <div class="mb-4" bis_skin_checked="1">
                                        <label class="form-label">Ví chính</label>
                                        <div class="input-group" bis_skin_checked="1">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-wallet"></i>
                                            </span>
                                            <input type="text" class="form-control" value="<?=money($check_tv['money']);?>đ" disabled="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3" bis_skin_checked="1">
                                    <div class="mb-4" bis_skin_checked="1">
                                        <label class="form-label">Tổng tiền nạp</label>
                                        <div class="input-group" bis_skin_checked="1">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-money-bill"></i>
                                            </span>
                                            <input type="text" class="form-control" value="<?=money($check_tv['tong_nap']);?>đ" disabled="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3" bis_skin_checked="1">
                                    <div class="mb-4" bis_skin_checked="1">
                                        <label class="form-label">Số dư đã sử dụng</label>
                                        <div class="input-group" bis_skin_checked="1">
                                            <span class="input-group-text">
                                                <i class="bx bxs-wallet-alt"></i>
                                            </span>
                                            <input type="text" class="form-control" value="<?=money($check_tv['tong_nap'] - $check_tv['money']);?>đ" disabled="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3" bis_skin_checked="1">
                                    <div class="mb-4" bis_skin_checked="1">
                                        <label class="form-label">Địa chỉ IP dùng để đăng nhập</label>
                                        <div class="input-group" bis_skin_checked="1">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-wifi"></i>
                                            </span>
                                            <input type="text" class="form-control" value="<?=$check_tv['ip'];?>" disabled="">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="row mb-4" bis_skin_checked="1">
                            <div class="col-md-3" bis_skin_checked="1">
                                    <div class="mb-4" bis_skin_checked="1">
                                        <label class="form-label">Cộng tiền thành viên</label>
                                        <div class="input-group" bis_skin_checked="1">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-calendar-days"></i>
                                            </span>
                                            <input type="number" class="form-control" id = "congtien">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3" bis_skin_checked="1">
                                    <div class="mb-4" bis_skin_checked="1">
                                        <label class="form-label">Trừ tiền thành viên</label>
                                        <div class="input-group" bis_skin_checked="1">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-calendar-days"></i>
                                            </span>
                                            <input type="number" class="form-control" id = "trutien">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3" bis_skin_checked="1">
                                    <div class="mb-4" bis_skin_checked="1">
                                        <label class="form-label">Đăng ký tài khoản vào lúc</label>
                                        <div class="input-group" bis_skin_checked="1">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-calendar-days"></i>
                                            </span>
                                            <input type="text" class="form-control" value="<?=ngay($check_tv['time']);?>" disabled="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3" bis_skin_checked="1">
                                    <div class="mb-4" bis_skin_checked="1">
                                        <label class="form-label">Đăng nhập gần nhất vào lúc</label>
                                        <div class="input-group" bis_skin_checked="1">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-calendar-days"></i>
                                            </span>
                                            <input type="text" class="form-control" value="<?=ngay($check_tv['update_time']);?>" disabled="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a type="button" class="btn btn-danger" href="/admin-nc/users"><i class="fa fa-fw fa-undo"></i> Back</a>
                            <button id="btnUpdate" class="btn btn-primary"><i class="bi bi-download"></i>
                                Lưu</button>
                                <script>
                                $("#btnUpdate").on("click", function() {
                                    $('#btnUpdate').html(
                                        '<i class="fa fa-spinner fa-spin"></i> Đang xử lý...'
                                    ).prop('disabled',
                                        true);
                                   
                                    var myOTPData = {
                                        action: 'UPDATE_USER',
                                        username: $("#username").val(),
                                        id: <?=$id_tv;?>,
                                        email: $("#email").val(),
                                        level: $("#level").val(),
                                        banned: $("#banned").val()
                                       
                                    };
                                    var password = $("#password").val();
                                    if (password !== "") {
                                        myOTPData.password = password;
                                    }
                                    var congtien = $("#congtien").val();
                                    if (congtien !== "") {
                                        myOTPData.congtien = congtien;
                                    }
                                    var trutien = $("#trutien").val();
                                    if (trutien !== "") {
                                        myOTPData.trutien = trutien;
                                    }
                                    $.post("/admin/ajax/xulyuser/xluser.php", myOTPData,
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
                                                    window.location = "/admin-nc/users"
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
                                            $('#btnUpdate').html('Cập Nhật').prop(
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
   <?php require_once('footer.php');?>
</body>
</html>