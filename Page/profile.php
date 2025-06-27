<?php
   require $_SERVER['DOCUMENT_ROOT'].'/App/header.php';
   $ip = isset($_POST['ip']) ? trim($_POST['ip']) : '';
   $inta = '';
   if (!empty($ip)) {
       $inta = "AND `ip` = '$ip'";
   } else {
       $inta = "";
   }
   
   $id_ls = isset($_POST['thiet_bi']) ? trim($_POST['thiet_bi']) : '';
   $id_sp = '';
   if (!empty($id_ls)) {
       $id_sp = "AND `thiet_bi` = '$id_ls'";
   } else {
       $id_sp = "";
   }
   $limit = isset($_POST['limit']) ? trim($_POST['limit']) : '';
   $limit_id = '';
   
   if (!empty($limit)) {
       $limit_id = "LIMIT $limit"; 
   } else {
       $limit_id = "LIMIT 5"; 
   }
?>
<title>PROFILE - TEAM API</title>
<body>
   <div class="loader-wrapper">
      <div class="loader">
         <div class="loader4"></div>
      </div>
   </div>
   <div class="tap-top"><i data-feather="chevrons-up"></i></div>
   <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <?php  require $_SERVER['DOCUMENT_ROOT'].'/App/nav.php'; ?>
      <div class="page-body-wrapper">
         <?php  require $_SERVER['DOCUMENT_ROOT'].'/App/siderbar.php'; ?>
         <div class="page-body">
            <div class="container-fluid">
               <div class="page-title">
                  <div class="row">
                     <div class="col-6">
                        <h4>Thông Tin Tài Khoản</h4>
                     </div>
                     <div class="col-6">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item active text-end">Số Dư : <?=money($user['money']);?>đ</li>
                        </ol>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Thông tin tài khoản</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row mb-2">
                                    <div class="profile-title">
                                        <div class="media"> <img class="img-70 rounded-circle" alt="" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwLeIGjrPAK2i_tTs9x9TqL9LrUXSi9zmS3g&s">
                                            <div class="media-body">
                                                <h5 class="mb-1"><?=$user['myname'];?></h5>
                                                <p><?=$username;?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="mb-2" bis_skin_checked="1">
                                    <label class="form-label">Số Dư (VNĐ):</label>
                                    <div class="input-group" bis_skin_checked="1">
                                        <input class="form-control" placeholder="<?=money($user['money']);?>đ" readonly="">
                                        <a href="/nap-atm" class="btn btn-sm btn-danger">Nạp Tiền</a>
                                    </div>
                                </div>
                                <div class="mb-2" bis_skin_checked="1">
                                    <label class="form-label">Tổng Nạp (VNĐ):</label>
                                    <div class="input-group" bis_skin_checked="1">
                                        <input class="form-control" placeholder="<?=money($user['tong_nap']);?>đ" readonly="">
                                        <a href="/nap-atm" class="btn btn-sm btn-danger">Nạp Tiền</a>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Chiết khẩu</label>
                                    <input class="form-control" readonly="" value = "30%">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <form class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Cập nhật thông tin</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body" bis_skin_checked="1">
                            <div class="row" bis_skin_checked="1">
                                <div class="col-md-6" bis_skin_checked="1">
                                    <div class="mb-3" bis_skin_checked="1">
                                        <label class="form-label">Email</label>
                                        <input class="form-control" type="text"  id="email" placeholder="<?=$user['email'];?>" value="<?=$user['email'];?>">
                                    </div>
                                </div>
                                <div class="col-md-6" bis_skin_checked="1">
                                    <div class="mb-3" bis_skin_checked="1">
                                        <label class="form-label">Mật Khẩu Mới</label>
                                        <input class="form-control" type="text" id="newpass" placeholder="Nhập mật khẩu mới" >
                                    </div>
                                </div>
                                <div class="col-md-6" bis_skin_checked="1">
                                    <div class="mb-3" bis_skin_checked="1">
                                        <label class="form-label">ID Telegram (<a href="https://t.me/getmyid_bot">Lấy
                                                ID</a>)</label>
                                        <div class="input-group" bis_skin_checked="1">
                                            <input class="form-control" type="text" id="id_tele" placeholder="Liên Kết Telegram Để Nhận Thông Báo" value="<?=$user['id_tele'];?>">
                                            <a href="https://t.me/autodvfun_bot" target="_blank">
    <button class="btn btn-sm btn-danger" type="button">
        Chat Bot
    </button>
</a>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" bis_skin_checked="1">
                                    <div class="mb-3" bis_skin_checked="1">
                                        <label class="form-label">Trạng Thái API</label>
                                        <input class="form-control" type="text" placeholder="Tắt" value="Tắt" disabled="">
                                    </div>
                                </div>
                                <div class="col-md-6" bis_skin_checked="1">
                                    <div class="mb-3" bis_skin_checked="1">
                                        <label class="form-label">Ngày Đăng Ký</label>
                                        <input class="form-control" type="text" placeholder="<?=ngay($user['time']);?>" value="<?=ngay($user['time']);?>" disabled="">
                                    </div>
                                </div>
                                <div class="col-md-6" bis_skin_checked="1">
                                    <div class="mb-3" bis_skin_checked="1">
                                        <label class="form-label">Hoạt Động Gần Đây</label>
                                        <input class="form-control" type="text" placeholder="<?=ngay($user['update_time']);?>" value="<?=ngay($user['update_time']);?>" disabled="">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" id="btnUpdate">Cập Nhật</button>
                        </div>
                        <script>
                                $("#btnUpdate").on("click", function() {
                                    $('#btnUpdate').html(
                                        '<i class="fa fa-spinner fa-spin"></i> Đang xử lý...'
                                    ).prop('disabled',
                                        true);
                                   
                                    var myOTPData = {
                                        action: 'UPDATE_PROFILE',
                                        email: $("#email").val(),
                                        id_tele: $("#id_tele").val()
                                       
                                    };
                                    var newpass = $("#newpass").val();
                                    if (newpass !== "") {
                                        myOTPData.newpass = newpass;
                                    }
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
                                                    window.location = "/profile"
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
                <div class="col-md-12" bis_skin_checked="1">
                     <div class="card" bis_skin_checked="1">
                        <div class="card-header" bis_skin_checked="1">
                           <h4 class="card-title mb-0">Lịch Sử Hoạt Động</h4>
                           <div class="card-options" bis_skin_checked="1"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                           <hr>
                           <form method="POST" action="/profile">
                              <div class="row" bis_skin_checked="1">
                                 <div class="col-lg-2 col-md-2 col-6 mb-2" bis_skin_checked="1">
                                    <input class="form-control" type="text" name="ip" value="<?=$ip;?>" placeholder="Nhập địa chỉ ip">
                                 </div>
                                 <div class="col-lg-2 col-md-2 col-6 mb-2" bis_skin_checked="1">
                                    <input class="form-control" type="text" name="thiet_bi" value="<?=$id_ls;?>" placeholder="Nhập thiết bị">
                                 </div>
                                 <div class="col-lg-2 col-md-2 col-6 mb-2" bis_skin_checked="1">
                                    <input class="form-control" type="text" name="limit" value="<?=$limit;?>" placeholder="Nhập độ dài bảng">
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6 mb-2" bis_skin_checked="1">
                                    <button class="btn btn-primary w-100" type="submit">Tìm Kiếm</button>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6 mb-2" bis_skin_checked="1">
                                    <a href="/profile" class="btn btn-primary w-100">Bỏ lọc</a>
                                 </div>
                              </div>
                           </form>
                        </div>
                        <div class="table-responsive p-2" bis_skin_checked="1">
                           <table class="table">
                              <thead>
                                 <tr>
                                    <th>
                                       ID
                                    </th>
                                    <th>
                                       TRẠNG THÁI
                                    </th>
                                    <th>
                                       IP
                                    </th>
                                    <th>
                                       TRÌNH DUYỆT
                                    </th>
                                    <th>
                                       THIẾT BỊ
                                    </th>
                                    <th>
                                       THỜI GIAN
                                    </th>
                                 </tr>
                              </thead>
                              <tbody>
                              <?php 
                            $i = 1;
                            foreach($ketnoi->get_list("SELECT * FROM `history_login` WHERE `username` = '$username' $inta $id_sp  ORDER BY `id` DESC $limit_id") as $ls_login):?>
                                 <tr>
                                    <td>
                                       <?=$i++;?>                                
                                    </td>
                                    <td>
                                      <?=$ls_login['title'];?>                                   
                                    </td>
                                    <td>
                                    <b class="text-danger">
                                    <?=$ls_login['ip'];?>   </b>                                             
                                    </td>
                                    <td>
                                    <?=$ls_login['trinh_duyet'];?>
                                    </td>
                                    <td>
                                    <?=$ls_login['thiet_bi'];?> 
                                    </td>
                                    <td>
                                    <?=ngay($ls_login['time_log']);?>                             
                                    </td>
                                 </tr>
                            <?php endforeach;?>  
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
            </div>
        </div>
    </div>
         </div>
         <?php  require $_SERVER['DOCUMENT_ROOT'].'/App/footer.php'; ?>
      </div>
   </div>
   
   <?php
      require $_SERVER['DOCUMENT_ROOT'].'/App/script.php';
      ?>
</body>
</html>