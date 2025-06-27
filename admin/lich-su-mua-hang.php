<?php require_once('header.php');?>
<?php
$ma_gd = isset($_POST['ma_gd']) ? trim($_POST['ma_gd']) : '';
$id_ma_gd = '';
if(!empty($ma_gd)){
   $id_ma_gd = "AND `ma_gd` = '$ma_gd'";
}else{
   $id_ma_gd = "";
}
$us = isset($_POST['username']) ? trim($_POST['username']) : '';
$id_us = '';
if(!empty($us)){
    $id_us = "AND `username` = '$us'";
}else{
   $id_us = "";
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
            <h1 class="page-title fw-semibold fs-18 mb-0"><i class="fa-solid fa-users"></i> LỊCH SỬ BÁN HÀNG</h1>
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
                        ĐƠN HÀNG ĐÃ BÁN
                     </div>
                  </div>
                  <div class="card-body" >
                  <form action="/admin-nc/ls-mua-hang" class="align-items-center mb-3" name="formSearch" method="POST">
                            <div class="row row-cols-lg-auto g-3 mb-3" bis_skin_checked="1">
                                <div class="col-lg col-md-4 col-6" bis_skin_checked="1">
                                    <input class="form-control" type="text" value="<?=$ma_gd;?>" name="ma_gd" placeholder="Mã giao dịch">
                                </div>
                                <div class="col-lg col-md-4 col-6" bis_skin_checked="1">
                                    <input class="form-control" type="text" value="<?=$us;?>" name="username" placeholder="Username">
                                </div>
                                <div class="col-12" bis_skin_checked="1">
                                    <button class="btn btn-hero btn-primary"><i class="fa fa-search"></i>
                                        Search </button>
                                    <a class="btn btn-hero btn-danger" href="/admin-nc/ls-mua-hang"><i class="fa fa-trash"></i>
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
                             
                                 <th scope="col" class="text-center">MÃ GIAO DỊCH</th>
                                 <th scope="col" class="text-center">NGƯỜI MUA</th>
                                 <th scope="col" class="text-center">ĐƠN HÀNG</th>
                                 <th scope="col" class="text-center">GIÁ</th>
                                 <th scope="col" class="text-center">THỜI GIAN</th>
                                 <th scope="col" class="text-center">TRẠNG THÁI</th>
                                 <th scope="col" class="text-center">THAO TÁC</th>
                              </tr>
                           </thead>
                           <tbody>
                              
                                <?php 
                                $i = 1;
                                foreach($ketnoi->get_list("SELECT * FROM `lich_su_mua_hang` WHERE `id` != '0' $id_ma_gd $id_us ORDER BY id DESC ") as $ls_don):?>
                              <tr>
                                 <td class="text-center">
                                    <div class="form-check form-check-md d-flex align-items-center" bis_skin_checked="1">
                                       <input type="checkbox" class="form-check-input checkbox_users" >
                                    </div>
                                 </td>
                                 <td class="text-center">
                                    <i class="fa fa-envelope" aria-hidden="true"></i> <?=$ls_don['ma_gd'];?>                  
                                 </td>
                                 <td class="text-center">
                                    <b  style="color:blue;"><?=$ls_don['username'];?>  </b>
                                 </td>
                                 <?php
                                 $id_check = $ls_don['id_sp'];
                                 $check_id = $ketnoi->get_row("SELECT * FROM `list_san_pham` WHERE `id` = '$id_check'");
                                 ?>
                                 <td class="text-center">
                                    <b style="color:red;"><?=$check_id['title'];?></b>
                                 </td>
                                 <td class="text-center">
                                    <b><?=money($ls_don['gia']);?>đ</b>
                                 </td>
                                 <td class="text-center">
                                    <b><?=($ls_don['time']);?></b>
                                 </td>
                                 
                                 <td class="text-center"><?=status_ad($ls_don['status']);?></td>
                                 <td>
                                 <a type="button" onclick="removeAccount('<?=($ls_don['id']);?>')" class="btn btn-sm btn-danger shadow-danger btn-wave waves-effect waves-light text-center" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                       <i class="fas fa-trash"></i> Delete
                                    </a>
                                 </td>
                              </tr>
                        <?php endforeach;?> 
                           </tbody>
                        </table>
                       <script>
                        function removeAccount(id) {
                            var dataS = { 
                                action:'REMOVE_TK',
                                id: id };
                            Swal.fire({
                                title: 'Bạn có chắc chắn muốn xóa?',
                                text: 'Hành động này không thể hoàn tác!',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Xóa',
                                cancelButtonText: 'Hủy'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.post("/admin/ajax/Category/xoa_sp.php", dataS,
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
                                                window.location = "/admin-nc/ls-mua-hang"
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
                                }
                            });
                        }
                       </script>
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