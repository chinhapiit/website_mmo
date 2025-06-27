<?php

   require $_SERVER['DOCUMENT_ROOT'].'/App/header.php';
   $don_nap = $ketnoi->num_rows("SELECT * FROM `lich_su_nap_bank` WHERE `username` = '$username'");
   ?>
<?php
   $ma_gd = isset($_POST['ma_gd']) ? trim($_POST['ma_gd']) : '';
   $inta = '';
   if (!empty($ma_gd)) {
       $inta = "AND `ma_gd` = '$ma_gd'";
   } else {
       $inta = "";
   }
   
   $amount = isset($_POST['amount']) ? trim($_POST['amount']) : '';
   $id_amount = '';
   if (!empty($id_ls)) {
       $id_amount = "AND `amount` = '$id_amount'";
   } else {
       $id_amount = "";
   }
   
   ?>
<meta name="description"content="Lịch sử nạp tiền tài khoản marketmmo.vn ! ">
<meta name="keywords"content="lichsunaptien,napatm,mua tài nguyên mmo, VIA cổ, clone Facebook, tài kh...">
<title>LỊCH SỬ NẠP TIỀN - TEAM API</title>
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
                        <h4>LỊCH SỬ NẠP TIỀN</h4>
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
            <div class="container-fluid" bis_skin_checked="1">
               <div class="row" bis_skin_checked="1">
                  <div class="col-xl-3 col-sm-6">
                     <div class="card o-hidden small-widget">
                        <div class="card-body total-Progress border-b-warning border-2">
                           <span class="f-light f-w-500 f-14">Tổng Nạp</span>
                           <div class="project-details">
                              <div class="project-counter">
                                 <h2 class="f-w-600"><?=money($user['tong_nap']);?></h2>
                                 <span class="f-12 f-w-400">đ</span>
                              </div>
                              <div class="product-sub bg-warning-light">
                              <script src="https://cdn.lordicon.com/lordicon.js"></script>
                              <lord-icon src="https://cdn.lordicon.com/jzvoyjzb.json" trigger="hover" colors="primary:#121331,secondary:#ebe6ef,tertiary:#911710" style="width:40px;height:40px">
                              </lord-icon>
                              </div>
                           </div>
                           <ul class="bubbles">
                              <li class="bubble"></li>
                              <li class="bubble"></li>
                              <li class="bubble"></li>
                              <li class="bubble"></li>
                              <li class="bubble"></li>
                              <li class="bubble"></li>
                              <li class="bubble"></li>
                              <li class="bubble"></li>
                              <li class="bubble"></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6">
                     <div class="card o-hidden small-widget">
                        <div class="card-body total-Complete border-b-secondary border-2">
                           <span class="f-light f-w-500 f-14">Đã Tiêu</span>
                           <div class="project-details">
                              <div class="project-counter">
                                 <h2 class="f-w-600"><?=money($user['tong_nap'] - $user['money']);?></h2>
                                 <span class="f-12 f-w-400">đ</span>
                              </div>
                              <div class="product-sub bg-secondary-light">
                              <lord-icon src="https://cdn.lordicon.com/nvhwrysk.json" trigger="hover" style="width:40px;height:40px">
                              </lord-icon>
                              </div>
                           </div>
                           <ul class="bubbles">
                              <li class="bubble"> </li>
                              <li class="bubble"></li>
                              <li class="bubble"></li>
                              <li class="bubble"> </li>
                              <li class="bubble"></li>
                              <li class="bubble"> </li>
                              <li class="bubble"></li>
                              <li class="bubble"></li>
                              <li class="bubble"> </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6">
                     <div class="card o-hidden small-widget">
                        <div class="card-body total-upcoming">
                           <span class="f-light f-w-500 f-14">Số Dư</span>
                           <div class="project-details">
                              <div class="project-counter">
                                 <h2 class="f-w-600"><?=money($user['money']);?></h2>
                                 <span class="f-12 f-w-400">đ</span>
                              </div>
                              <div class="product-sub bg-light-light">
                              <lord-icon src="https://cdn.lordicon.com/dypzookn.json" trigger="hover" style="width:40px;height:40px">
                              </lord-icon>
                              </div>
                           </div>
                           <ul class="bubbles">
                              <li class="bubble"> </li>
                              <li class="bubble"></li>
                              <li class="bubble"></li>
                              <li class="bubble"></li>
                              <li class="bubble"></li>
                              <li class="bubble"></li>
                              <li class="bubble"></li>
                              <li class="bubble"></li>
                              <li class="bubble"></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6">
                     <div class="card o-hidden small-widget">
                        <div class="card-body total-project border-b-primary border-2">
                           <span class="f-light f-w-500 f-14">Đơn Nạp</span>
                           <div class="project-details">
                              <div class="project-counter">
                                 <h2 class="f-w-600"><?=$don_nap;?></h2>
                                 <span class="f-12 f-w-400">đơn nạp tiền</span>
                              </div>
                              <div class="product-sub bg-primary-light">
                              <lord-icon src="https://cdn.lordicon.com/jtiihjyw.json" trigger="loop" delay="1000" style="width:40px;height:40px">
                              </lord-icon>
                              </div>
                           </div>
                           <ul class="bubbles">
                              <li class="bubble"></li>
                              <li class="bubble"></li>
                              <li class="bubble"></li>
                              <li class="bubble"></li>
                              <li class="bubble"></li>
                              <li class="bubble"></li>
                              <li class="bubble"></li>
                              <li class="bubble"></li>
                              <li class="bubble"></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12" bis_skin_checked="1">
                     <div class="card" bis_skin_checked="1">
                        <div class="card-header" bis_skin_checked="1">
                           <h4 class="card-title mb-0">Lịch Sử Nạp Tiền</h4>
                           <div class="card-options" bis_skin_checked="1"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                           <hr>
                           <form method="POST" action="/nap-atm">
                              <div class="row">
                                 <div class="col-lg-3 col-md-3 col-6 mb-2">
                                    <input class="form-control" type="text" name="ma_gd" value="<?=$ma_gd;?>" placeholder="Nhập mã giao dịch">
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6 mb-2">
                                    <input class="form-control" type="text" name="amount" value="<?=$id_amount;?>" placeholder="Nhập số tiền cần tìm">
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6 mb-2">
                                    <button class="btn btn-primary w-100" type="submit">Tìm Kiếm</button>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6 mb-2">
                                    <a href="/nap-atm" class="btn btn-primary w-100">Bỏ lọc</a>
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
                                       PHƯƠNG THỨC NẠP
                                    </th>
                                    <th>
                                       MÃ GIAO DỊCH
                                    </th>
                                    <th>
                                       SỐ TIỀN
                                    </th>
                                    <th>
                                       TRẠNG THÁI
                                    </th>
                                    <th>
                                       THỜI GIAN
                                    </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php 
                                    $i = 1;
                                    foreach($ketnoi->get_list("SELECT * FROM `lich_su_nap_bank` WHERE `username` = '$username' $inta $amount  ORDER BY `id` DESC ") as $ls_bank):?> 
                                 <tr>
                                    <td>
                                       <?=$i++;?>                                 
                                    </td>
                                    <td>
                                       <?=$ls_bank['ngan_hang_nap'];?>                                    
                                    </td>
                                    <td>
                                       <?=$ls_bank['ma_gd'];?>                                           
                                    </td>
                                    <td>
                                       <b class="text-danger">
                                       <?=money($ls_bank['amount']);?>đ</b>
                                    </td>
                                    <td>
                                       <?=status($ls_bank['status']);?>                                  
                                    </td>
                                    <td>
                                       <?=($ls_bank['time']);?>                                 
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
         <!-- SweetAlert2 -->
         <?php  require $_SERVER['DOCUMENT_ROOT'].'/App/footer.php'; ?>
      </div>
   </div>
   <!-- page-wrapper Ends-->
   <!-- latest jquery-->
   <?php
      require $_SERVER['DOCUMENT_ROOT'].'/App/script.php';
      ?>
   <!-- Plugins JS Ends-->
   <!-- Theme js-->
</body>
</html>