<?php require_once('header.php');?>
<?php
$id = isset($_POST['id']) ? trim($_POST['id']) : '';
$id_user = '';
if(!empty($id)){
   $id_user = "AND `id` = '$id'";
}else{
   $id_user = "";
}
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$id_username = '';
if(!empty($username)){
   $id_username = "AND `username` = '$username'";
}else{
   $id_username = "";
}
$myname = isset($_POST['myname']) ? trim($_POST['myname']) : '';
$id_myname = '';
if(!empty($myname)){
   $id_myname = "AND `myname` =  '$myname'";
}else{
   $id_myname = "";
}
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$id_email = '';
if(!empty($email)){
   $id_email = "AND `email` = '$email'";
}else{
   $id_email = "";
}
$ip = isset($_POST['ip']) ? trim($_POST['ip']) : '';
$id_ip = '';
if(!empty($ip)){
   $id_ip = "AND `ip` = '$ip'";
}else{
   $id_ip = "";
}
$bannd = isset($_POST['bannd']) ? trim($_POST['bannd']) : '';
$id_bannd = '';
if(!empty($bannd)){
   $id_bannd = "AND `bannd` = '$bannd'";
}else{
   $id_bannd = "";
}
$level = isset($_POST['level']) ? trim($_POST['level']) : '';
$id_level = '';
if(!empty($level)){
   $id_level = "AND `level` = '$level'";
}else{
   $id_level = "";
}
?>
<body>
   <!-- Start Switcher -->
   <?php require_once('run.php');?>

   <div class="page">

   <?php require_once('nav.php');?>
   <?php require_once('sidebar.php');?>

   <div class="main-content app-content">
      <div class="container-fluid">
         <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb" bis_skin_checked="1">
            <h1 class="page-title fw-semibold fs-18 mb-0"><i class="fa-solid fa-users"></i> Users</h1>
         </div>
         <div class="row" bis_skin_checked="1">
            <div class="modal fade" id="phan_tich_utm_source_users" tabindex="-1" aria-labelledby="phan_tich_utm_source_users" data-bs-keyboard="false" bis_skin_checked="1" style="display: none;" aria-hidden="true">
               <!-- Scrollable modal -->
               <div class="modal-dialog modal-dialog-centered modal-xl" bis_skin_checked="1">
                  <div class="modal-content" bis_skin_checked="1">
                     <div class="modal-header" bis_skin_checked="1">
                        <h6 class="modal-title" id="phan_tich_utm_source_users"><i class="fa-solid fa-chart-line"></i>
                           THỐNG KÊ UTM SOURCE
                        </h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body" bis_skin_checked="1">
                        <div id="hien_thi_phan_tich_utm_source_users" class="mb-3" bis_skin_checked="1">
                           <ul class="nav nav-tabs mb-5 nav-justified nav-style-1 d-sm-flex d-block" id="myTab" role="tablist">
                              <li class="nav-item"><a class="nav-link active" id="table-tab" data-toggle="tab" href="#table-content" role="tab" aria-controls="table-content" aria-selected="true">Table</a></li>
                              <li class="nav-item"><a class="nav-link" id="chart-tab" data-toggle="tab" href="#chart-content" role="tab" aria-controls="chart-content" aria-selected="false">Pie Chart</a></li>
                           </ul>
                           <div class="tab-content" id="myTabContent" bis_skin_checked="1">
                              <div class="tab-pane fade show active" id="table-content" role="tabpanel" aria-labelledby="table-tab" bis_skin_checked="1">
                                 <div class="table-responsive table-wrapper" style="max-height: 500px;overflow-y: auto;" bis_skin_checked="1">
                                    <table class="table text-nowrap table-striped table-hover table-bordered">
                                       <thead>
                                          <tr>
                                             <th class="text-center">Xếp hạng</th>
                                             <th class="text-center">utm_source</th>
                                             <th class="text-center">Số thành viên đăng ký</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr>
                                             <td class="text-center" style="font-size:15px;">1</td>
                                             <td class="text-center">web</td>
                                             <td class="text-center"><b>12</b></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="chart-content" role="tabpanel" aria-labelledby="chart-tab" bis_skin_checked="1">
                                 <canvas id="myChart" width="1106" height="300" style="display: block; box-sizing: border-box; height: 300px; width: 1106px;"></canvas>
                              </div>
                           </div>
                     
                        </div>
                        <p>Nếu bạn muốn tracking thành viên đăng ký, bạn có thể chèn
                           <strong>?utm_sourc=ten_chien_dich</strong> vào
                           cuối link web để thu thập dữ liệu nơi thành viên đăng ký.
                        </p>
                        <p>Ví dụ bạn muốn biết có bao nhiêu user đăng ký trong chiến dịch quảng cáo
                           <strong>ABC</strong>, bạn chèn
                           link web vào quảng cáo như sau =&gt;
                           <strong>https://zshopclone7.cmsnt.net/?utm_source=camp_abc</strong>
                        </p>
                     </div>
                     <div class="modal-footer" bis_skin_checked="1">
                        <button type="button" class="btn btn-light shadow-light btn-wave waves-effect waves-light" data-bs-dismiss="modal">Đóng</button>
                     </div>
                  </div>
               </div>
            </div>
          
            <div class="col-xl-12" bis_skin_checked="1">
               <div class="card custom-card" bis_skin_checked="1">
                  <div class="card-header justify-content-between" bis_skin_checked="1">
                     <div class="card-title" bis_skin_checked="1">
                        DANH SÁCH THÀNH VIÊN
                     </div>
                  </div>
                  <div class="card-body" >
                  <form action="/admin-nc/users" class="align-items-center mb-3" name="formSearch" method="POST">
                            <div class="row row-cols-lg-auto g-3 mb-3" bis_skin_checked="1">
                                <div class="col-lg col-md-4 col-6" bis_skin_checked="1">
                                    <input class="form-control" type="number" value="<?=$id;?>" name="id" placeholder="ID Khách hàng">
                                </div>
                                <div class="col-lg col-md-4 col-6" bis_skin_checked="1">
                                    <input class="form-control" type="text" value="<?=$username;?>" name="username" placeholder="Username">
                                </div>
                                <div class="col-lg col-md-4 col-6" bis_skin_checked="1">
                                    <input class="form-control" value="<?=$myname;?>" name="myname" placeholder="Full name">
                                </div>
                                <div class="col-lg col-md-4 col-6" bis_skin_checked="1">
                                    <input class="form-control" value="<?=$email;?>" name="email" placeholder="Email">
                                </div>
                                
                                <div class="col-lg col-md-4 col-6" bis_skin_checked="1">
                                    <input class="form-control" value="<?=$ip;?>" name="ip" placeholder="Địa chỉ IP">
                                </div>
                                
                                <div class="col-lg col-md-4 col-6" bis_skin_checked="1">
                                    <select name="bannd" class="form-control">
                                       <option value="">Trạng thái</option>
                                       <option value="1" <?= isset($_POST['bannd']) && $_POST['bannd'] == '1' ? 'selected' : '' ?>>Banned</option>
                                       <option value="0" <?= isset($_POST['bannd']) && $_POST['bannd'] == '0' ? 'selected' : '' ?>>Active</option>
                                    </select>
                                 </div>
                                <div class="col-lg col-md-4 col-6" bis_skin_checked="1">
                                    <select name="level" class="form-control">
                                        <option value="">Vai trò
                                        </option>
                                       <option value="0" <?= isset($_POST['level']) && $_POST['level'] == '0' ? 'selected' : '' ?>>Thành viên</option>
                                       <option value="1" <?= isset($_POST['level']) && $_POST['level'] == '1' ? 'selected' : '' ?>>Admin</option>
                                    </select>
                                </div>
                                <div class="col-12" bis_skin_checked="1">
                                    <button class="btn btn-hero btn-primary"><i class="fa fa-search"></i>
                                        Search </button>
                                    <a class="btn btn-hero btn-danger" href="/admin-nc/users"><i class="fa fa-trash"></i>
                                        Clear filter </a>
                                </div>
                            </div>
                           
                        </form>
                     <div class="table-responsive table-wrapper mb-3"  >
                        <table class="table text-nowrap table-striped table-hover table-bordered">
                           <thead>
                              <tr>
                                 <th class="text-center">
                                    <div class="form-check form-check-md d-flex align-items-center" bis_skin_checked="1">
                                       <input type="checkbox" class="form-check-input" name="check_all" id="check_all_checkbox_users" value="option1">
                                    </div>
                                 </th>
                                 <th scope="col">ID</th>
                                 <th scope="col">HỌ VÀ TÊN</th>
                                 <th scope="col" class="text-center">USERNAME</th>
                                 <th scope="col" class="text-center">EMAIL</th>
                                 <th scope="col" class="text-center">SỐ DƯ</th>
                                 <th scope="col" class="text-center">TỔNG NẠP</th>
                                 <th scope="col" class="text-center">LEVEL</th>
                                 <th scope="col" class="text-center">TRUY CẬP GẦN ĐÂY</th>
                                 <th scope="col" class="text-center">TRẠNG THÁI</th>
                                 <th scope="col" class="text-center">THAO TÁC</th>
   
                              </tr>
                           </thead>
                           <tbody>
                              
                                <?php 
                                $i = 1;
                                foreach($ketnoi->get_list("SELECT * FROM `users` WHERE `id` != '0' $id_user $id_username $id_myname $id_email $id_ip $id_bannd $id_level ORDER BY id DESC ") as $user):?>
                              
                              <tr>
                                 <td class="text-center">
                                    <div class="form-check form-check-md d-flex align-items-center" bis_skin_checked="1">
                                       <input type="checkbox" class="form-check-input checkbox_users" data-id="4022" name="checkbox_users" value="4022">
                                    </div>
                                 </td>
                                 <td><a class="text-primary" href=""><?=$i++;?></a>
                                 </td>
                                 <td>
                                    <i class="fa fa-envelope" aria-hidden="true"></i> <?=$user['myname'];?>                  
                                 </td>
                                 <td class="text-center">
                                    <b  style="color:blue;"><?=$user['username'];?>  </b>
                                 </td>
                                 <td class="text-center">
                                    <b style="color:red;"><?=$user['email'];?></b>
                                 </td>
                                 <td class="text-center">
                                    <b><?=money($user['money']);?>đ</b>
                                 </td>
                                 <td class="text-center"><span class="badge bg-danger"><?=money($user['tong_nap']);?>đ</span></td>
                                 <td class="text-center">
                                    <span class="badge bg-success"><?= $user['level'] == 1 ? 'Admin' : 'Thành viên'; ?></span>                                        
                                 </td>
                                 <td class="text-center"><span class="badge bg-danger"><?=ngay($user['update_time']);?></span></td>
                                 <td class="text-center"><span class="badge bg-danger"><?=$user['bannd'] == 0 ? 'Hoạt động' : 'Bị cấm';?></span></td>
                                 <td class="text-center fs-base">
                                    <a href="/admin-nc/edit-thanhvien/<?=$user['id']?>" class="btn btn-sm btn-primary shadow-primary btn-wave waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                       <i class="fa fa-fw fa-edit"></i> Edit
                                    </a>
                                   
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
   <?php require_once('footer.php');?>
</body>
</html>