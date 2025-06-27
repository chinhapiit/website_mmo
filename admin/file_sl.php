<?php require_once('header.php');?>
<?php
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$id_username = '';
if(!empty($username)){
   $id_username = "AND `username` = '$username'";
}else{
   $id_username = "";
}
$ma_gd = isset($_POST['ma_gd']) ? trim($_POST['ma_gd']) : '';
$id_ma_gd = '';
if(!empty($ma_gd)){
   $id_ma_gd = "AND `ma_gd` = '$ma_gd'";
}else{
   $id_ma_gd = "";
}
$ngan_hang_nap = isset($_POST['ngan_hang_nap']) ? trim($_POST['ngan_hang_nap']) : '';
$id_ngan_hang = '';
if(!empty($ngan_hang_nap)){
   $id_ngan_hang = "AND `ngan_hang_nap` = '$ngan_hang_nap'";
}else{
   $id_ngan_hang = "";
}
$status = isset($_POST['status']) ? trim($_POST['status']) : '';
$id_status = '';
if(!empty($status)){
   $id_status = "AND `status` = '$status'";
}else{
   $id_status = "";
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $action = $_POST['action'];

    // Xác định trạng thái cần cập nhật
    if ($action === 'approved') {
        $status = 'thanhcong'; // Trạng thái khi duyệt
    } elseif ($action === 'canceled') {
        $status = 'huy'; // Trạng thái khi hủy đơn
    } else {
        echo json_encode(["success" => false, "message" => "Trạng thái không hợp lệ!"]);
        exit;
    }
$updates = $ketnoi->update("seller", array('status' => 'thanhcong'), "id = '$id'");
    if ($updates) {
        echo json_encode(["success" => true, "message" => "Cập nhật thành công!", "new_status" => $status]);
    } else {
        echo json_encode(["success" => false, "message" => "Lỗi khi cập nhật!"]);
    }
}


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
               
               <h1 class="page-title fw-semibold fs-18 mb-0">HỒ SƠ ĐẠI LÝ</h1>
               <div class="ms-md-1 ms-0" bis_skin_checked="1">
                  <nav>
                     <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Hồ sơ</li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
         <div class="row" bis_skin_checked="1">
            <div class="col-xl-12" bis_skin_checked="1">
               <div class="text-right" bis_skin_checked="1">
                  <a class="btn btn-primary label-btn mb-3" href="/admin-nc/list-bank">
                  <i class="ri-settings-4-line label-btn-icon me-2"></i> CẤU HÌNH
                  </a>
               </div>
            </div>
            <div class="col-xl-12" bis_skin_checked="1">
               <div class="row" bis_skin_checked="1">
                  <div class="col-xl-3" bis_skin_checked="1">
                     <div class="card custom-card" bis_skin_checked="1">
                        <div class="card-body" bis_skin_checked="1">
                           <div class="d-flex align-items-center" bis_skin_checked="1">
                              <div class="flex-fill" bis_skin_checked="1">
                                 <p class="mb-1 fs-5 fw-semibold text-default">
                                    <?=money($ketnoi->num_rows("SELECT * FROM `seller` WHERE `status` = 'thanhcong' "));?> đơn
                                 </p>
                                 <p class="mb-0 text-muted">Hồ Sơ Đã Duyệt</p>
                              </div>
                              <div class="ms-2" bis_skin_checked="1">
                                 <span class="avatar text-bg-danger rounded-circle fs-20"><i class="bx bxs-wallet-alt"></i></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3" bis_skin_checked="1">
                     <div class="card custom-card" bis_skin_checked="1">
                        <div class="card-body" bis_skin_checked="1">
                           <div class="d-flex align-items-center" bis_skin_checked="1">
                              <div class="flex-fill" bis_skin_checked="1">
                                 <p class="mb-1 fs-5 fw-semibold text-default">
                                    <?=money($ketnoi->num_rows("SELECT * FROM `seller` WHERE `status` = 'dangxuly' "));?> đơn                     
                                 </p>
                                 <p class="mb-0 text-muted">Hồ Sơ Đợi Duyệt</p>
                              </div>
                              <div class="ms-2" bis_skin_checked="1">
                                 <span class="avatar text-bg-info rounded-circle fs-20"><i class="bx bxs-wallet-alt"></i></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                 
            </div>
            <div class="col-xl-12" bis_skin_checked="1">
               <div class="card custom-card" bis_skin_checked="1">
                  <div class="card-header justify-content-between" bis_skin_checked="1">
                     <div class="card-title" bis_skin_checked="1">
                        Danh Sách Hồ Sơ
                     </div>
                  </div>
                  <div class="card-body" bis_skin_checked="1">
                     <form action="/admin-nc/don-rut-tien" class="align-items-center mb-3" method="POST">
                        <div class="row row-cols-lg-auto g-3 mb-3" bis_skin_checked="1">
                           <div class="col-md-3 col-6" bis_skin_checked="1">
                              <input class="form-control form-control-sm" value="<?=$limit;?>" name="limit" placeholder="Nhập độ dài bảng">
                           </div>
                           <div class="col-md-3 col-6" bis_skin_checked="1">
                              <input class="form-control form-control-sm" value="<?=$username;?>" name="username" placeholder="Tìm Username">
                           </div>
                           <div class="col-md-3 col-6" bis_skin_checked="1">
                              <input class="form-control form-control-sm" value="<?=$ma_gd;?>" name="ma_gd" placeholder="Mã giao dịch">
                           </div>
                           <div class="col-md-3 col-6" bis_skin_checked="1">
                              <input class="form-control form-control-sm" value="<?=$ngan_hang_nap;?>" name="ngan_hang_nap" placeholder="Ngân hàng">
                           </div>
                           <div class="col-md-3 col-6" bis_skin_checked="1">
                              <input class="form-control form-control-sm" value="" name="status" placeholder="Trạng thái">
                           </div>
                           <div class="col-12" bis_skin_checked="1">
                              <button class="btn btn-sm btn-primary"><i class="fa fa-search"></i>
                              Search                                    </button>
                              <a class="btn btn-sm btn-danger" href="/admin-nc/don-rut-tien"><i class="fa fa-trash"></i>
                              Clear filter                                    </a>
                           </div>
                        </div>
                     </form>
                     <div class="table-responsive mb-3" bis_skin_checked="1">
                        <table class="table text-nowrap table-striped table-hover table-bordered">
                           <thead>
                              <tr>
                                    <th>
                                       ID
                                    </th>
                                    <th>
                                      USERNAME
                                    </th>
                                    <th>
                                      IMG
                                    </th>
                                    <th>
                                      ĐỊA CHỈ
                                    </th>
                                    <th>
                                      PHONE
                                    </th>
                                    <th>
                                       NGÀY GỬI
                                    </th>
                                    <th>
                                       TRANG THÁI
                                    </th>
                                  
                                    
                                                                        <th>
                                       THAO TÁC
                                    </th>
                                 </tr>
                           </thead>
                           <tbody>
    <?php 
     
      $i = 1;
    
        foreach($ketnoi->get_list("SELECT * FROM `seller` WHERE `id` != '0' $id_username $id_ma_gd $id_ngan_hang $id_status ORDER BY id DESC  ") as $ls_nap): ?>
        <?php
        $check_u = $ls_nap['id_user'];
        $u = $ketnoi->get_row("SELECT * FROM `users` WHERE `id`= '$check_u' ORDER BY id DESC  ")
        ?>
        <tr>
             <td class="text-center"><a class="text-primary" href="#"><?=$i++;?></a></td>
            <td class="text-center"><a class="text-primary" href="#"><?=$u['username'];?></a></td>
            <td class="text-center"><span>
                  <img src="<?=$ls_nap['img'];?>" alt="" height="50px">
                
                </span></td>
            <td class="text-right"><b style="color: green;"><?=($ls_nap['address']);?></b></td>
            <td class="text-right"><b style="color: red;"><?=($ls_nap['phone']);?></b></td>
            <td class="text-center"><b><?=ngay($ls_nap['register_date']);?>đ</b></td>
            <td class="text-center"><b><?=status_ad($ls_nap['status']);?></b></td>
       
           

           <td class="text-center">
    <button class="btn btn-success btn-sm" onclick="updateStatus(<?=$ls_nap['id'];?>, 'approved')">Duyệt</button>

</td>

        </tr>
    <?php endforeach; ?>
</tbody>


<script>


 
 

function updateStatus(orderId, action) {
    Swal.fire({
        title: "Xác nhận?",
        text: "Bạn có chắc chắn muốn " + (action === 'approved' ? "duyệt" : "hủy") + " đơn này?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: action === 'approved' ? "Duyệt" : "Hủy"
    }).then((result) => {
        if (result.isConfirmed) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "seller", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    
                    Swal.fire({
                        title: response.success ? "Thành công!" : "Lỗi!",
                        text: response.message,
                        icon: response.success ? "success" : "error",
                        timer: 2000, // Đóng sau 2 giây
                        showConfirmButton: false
                    });

                    if (response.success) {
                        setTimeout(() => {
                            location.reload(); // Reload trang sau khi cập nhật thành công
                        }, 2000);
                    }
                }
            };
            xhr.send("id=" + orderId + "&action=" + action);
        }
    });
}
</script>





                          
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php require_once('footer.php');?>
</body>
</html>