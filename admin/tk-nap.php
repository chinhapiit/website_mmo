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
$limit = isset($_POST['limit']) ? trim($_POST['limit']) : '';
$id_limit = '';
if(!empty($limit)){
   $id_limit = "LIMIT $limit"; 
}else{
   $id_limit = "LIMIT 5";
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
         <div class="alert alert-danger alert-dismissible fade show custom-alert-icon shadow-sm" role="alert" bis_skin_checked="1">
            <svg class="svg-danger" xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 0 24 24" width="1.5rem" fill="#000000">
                <path d="M0 0h24v24H0z" fill="none"></path>
                <path d="M15.73 3H8.27L3 8.27v7.46L8.27 21h7.46L21 15.73V8.27L15.73 3zM12 17.3c-.72 0-1.3-.58-1.3-1.3 0-.72.58-1.3 1.3-1.3.72 0 1.3.58 1.3 1.3 0 .72-.58 1.3-1.3 1.3zm1-4.3h-2V7h2v6z"></path>
            </svg>
            Vui lòng thực hiện <b><a target="_blank" class="text-primary" href="#" target="_blank">https://domain/Core/mbbank.php</a> 1 phút 1 lần hoặc nhanh hơn để hệ thống xử lý nạp tiền tự động, nếu
            sử dụng Webhook thì không cần CRON.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button>
        </div>
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb" bis_skin_checked="1">
               
               <h1 class="page-title fw-semibold fs-18 mb-0">Ngân hàng</h1>
               <div class="ms-md-1 ms-0" bis_skin_checked="1">
                  <nav>
                     <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Nạp tiền</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ngân hàng</li>
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
                                    <?=money($ketnoi->get_row("SELECT SUM(`amount`) FROM `lich_su_nap_bank` ")['SUM(`amount`)']);?>đ
                                 </p>
                                 <p class="mb-0 text-muted">Toàn thời gian</p>
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
                                    <?=money($ketnoi->get_row("SELECT SUM(`amount`) AS total FROM `lich_su_nap_bank` WHERE YEAR(`time`) = YEAR(CURDATE()) AND MONTH(`time`) = MONTH(CURDATE())")['total'] ?? 0);?>đ                                      
                                 </p>
                                 <p class="mb-0 text-muted">Tháng 01</p>
                              </div>
                              <div class="ms-2" bis_skin_checked="1">
                                 <span class="avatar text-bg-info rounded-circle fs-20"><i class="bx bxs-wallet-alt"></i></span>
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
                                    <?=money($ketnoi->get_row("SELECT SUM(`amount`) AS total FROM `lich_su_nap_bank` WHERE YEARWEEK(`time`, 1) = YEARWEEK(CURDATE(), 1)")['total'] ?? 0);?>đ                                        
                                 </p>
                                 <p class="mb-0 text-muted">Trong tuần</p>
                              </div>
                              <div class="ms-2" bis_skin_checked="1">
                                 <span class="avatar text-bg-warning rounded-circle fs-20"><i class="bx bxs-wallet-alt"></i></span>
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
                                    <?=money($ketnoi->get_row("SELECT SUM(`amount`) AS total FROM `lich_su_nap_bank` WHERE DATE(`time`) = CURDATE()")['total'] ?? 0);?>đ
                                 </p>
                                 <p class="mb-0 text-muted">Hôm nay
                                 </p>
                              </div>
                              <div class="ms-2" bis_skin_checked="1">
                                 <span class="avatar text-bg-primary rounded-circle fs-20"><i class="bx bxs-wallet-alt"></i></span>
                              </div>
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
                        LỊCH SỬ NẠP TIỀN TỰ ĐỘNG
                     </div>
                  </div>
                  <div class="card-body" bis_skin_checked="1">
                     <form action="/admin-nc/tk-nap" class="align-items-center mb-3" method="POST">
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
                              <a class="btn btn-sm btn-danger" href="/admin-nc/tk-nap"><i class="fa fa-trash"></i>
                              Clear filter                                    </a>
                           </div>
                        </div>
                     </form>
                     <div class="table-responsive mb-3" bis_skin_checked="1">
                        <table class="table text-nowrap table-striped table-hover table-bordered">
                           <thead>
                              <tr>
                                 <th class="text-center">Username</th>
                                 <th class="text-center">Thời gian</th>
                                 <th class="text-right">Số tiền nạp</th>
                                 <th class="text-right">Thực nhận</th>
                                 <th class="text-center">Ngân hàng</th>
                                 <th class="text-center">Mã giao dịch</th>
                                 <th class="text-center">Trạng thái</th>
                              </tr>
                           </thead>
                           <tbody>
                           <?php 
                                $tong_nap = $ketnoi->get_row("SELECT SUM(`amount`) FROM `lich_su_nap_bank` ")['SUM(`amount`)'];
                                $thuc_nhan = $ketnoi->get_row("SELECT SUM(`thuc_nhan`) FROM `lich_su_nap_bank` ")['SUM(`thuc_nhan`)'];
                                foreach($ketnoi->get_list("SELECT * FROM `lich_su_nap_bank` WHERE `id` != '0' $id_username $id_ma_gd $id_ngan_hang $id_status ORDER BY id DESC $id_limit ") as $ls_nap):?>
                              <tr>
                                 <td class="text-center"><a class="text-primary" href="#"><?=$ls_nap['username'];?></a>
                                 </td>
                                 <td class="text-center"><span ><?=$ls_nap['time'];?></span>
                                 </td>
                                 <td class="text-right"><b style="color: green;"><?=money($ls_nap['amount']);?>đ</b>
                                 </td>
                                 <td class="text-right"><b style="color: red;"><?=money($ls_nap['thuc_nhan']);?>đ</b>
                                 </td>
                                 <td class="text-center"><b><?=$ls_nap['ngan_hang_nap'];?></b></td>
                                 <td class="text-center"><b><?=$ls_nap['ma_gd'];?></b></td>
                                 <td class="text-center"><small><?=status_ad($ls_nap['status']);?></small></td>
                              </tr>
                            <?php endforeach;?> 
                           </tbody>
                           <tfoot>
                              <tr>
                                 <td colspan="7">
                                    <div class="float-right" bis_skin_checked="1">
                                       Đã thanh toán: <strong style="color:red;"><?=money($tong_nap);?>đ</strong>
                                       |
                                       Thực nhận: <strong style="color:blue;"><?=money($thuc_nhan);?>đ</strong>
                                    </div>
                                 </td>
                              </tr>
                           </tfoot>
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