<?php
   require $_SERVER['DOCUMENT_ROOT'].'/App/header.php';
   $check_don = $ketnoi->num_rows("SELECT * FROM `history_affiliate` WHERE `id_ref` = '".$user['id']."'");
   $limit = isset($_POST['limit']) ? trim($_POST['limit']) : '';
   $id_limit = '';
   if($limit != ''){
      $id_limit = "LIMIT $limit";
   }else{
      $id_limit = "LIMIT 5";
   }
   $us = isset($_POST['us']) ? trim($_POST['us']) : '';
   $id_us = '';
   if($us != ''){
      $id_us = "WHERE `id_ref` = '$us'";
   }else{
      $id_us = "";
   }
   ?>

<title>LỊCH SỬ TIẾP THỊ - TEAM API</title>
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
                        <h4>LỊCH SỬ TIẾP THỊ</h4>
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
                           <span class="f-light f-w-500 f-14">Tổng hoa hồng</span>
                           <div class="project-details">
                              <div class="project-counter">
                                 <h2 class="f-w-600"><?=money($user['ref_money']);?></h2>
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
                           <span class="f-light f-w-500 f-14">Đã rút hoa hồng</span>
                           <div class="project-details">
                              <div class="project-counter">
                                 <h2 class="f-w-600"><?=money($user['ref_money'] - $user['is_ref']);?></h2>
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
                           <span class="f-light f-w-500 f-14">Số dư hoa hồng</span>
                           <div class="project-details">
                              <div class="project-counter">
                                 <h2 class="f-w-600"><?=money($user['is_ref']);?></h2>
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
                           <span class="f-light f-w-500 f-14">Tổng các đơn</span>
                           <div class="project-details">
                              <div class="project-counter">
                                 <h2 class="f-w-600"><?= $check_don;?></h2>
                                 <span class="f-12 f-w-400">đơn hoa hồng</span>
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
                           <h4 class="card-title mb-0">Lịch Sử Tiếp Thị</h4>
                           <div class="card-options" bis_skin_checked="1"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                           <hr>
                           <form method="POST" action="/affiliate/history">
                              <div class="row">
                                 <div class="col-lg-3 col-md-3 col-6 mb-2">
                                    <input class="form-control" type="text" name="limit" value="<?=$limit;?>" placeholder="Độ dài bảng">
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6 mb-2">
                                    <input class="form-control" type="text" name="us" value="<?=$us;?>" placeholder="Nhập username">
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6 mb-2">
                                    <button class="btn btn-primary w-100" type="submit">Tìm Kiếm</button>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6 mb-2">
                                    <a href="/affiliate/history" class="btn btn-primary w-100">Bỏ lọc</a>
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
                                       NGƯỜI MUA
                                    </th>
                                    <th>
                                       ĐƠN HÀNG
                                    </th>
                                    <th>
                                       GIÁ TIỀN
                                    </th>
                                    <th>
                                       HOA HỒNG
                                    </th>
                                    <th>
                                       THỜI GIAN
                                    </th>
                                    <th>
                                       TRẠNG THÁI
                                    </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php 
                                    $i = 1;
                                    foreach($ketnoi->get_list("SELECT * FROM `history_affiliate` WHERE `id_ref` = '".$user['id']."'  ORDER BY `id` DESC $id_limit ") as $ls_aff):?> 
                                 <tr>
                                    <td>
                                       <?=$i++;?>                                 
                                    </td>
                                    <?php
                                    $check_id = $ls_aff['id_buy'];
                                    $check_user = $ketnoi->get_row("SELECT * FROM `users` WHERE `id` = '$check_id' ");
                                    ?>
                                    <td>
                                       <?=$check_user['username'];?>                            
                                    </td>
                                    <?php
                                    $id_sp = $ls_aff['don_hang'];
                                    $check_sp = $ketnoi->get_row("SELECT * FROM `list_san_pham` WHERE `id` = '$id_sp'");
                                    ?>
                                    <td>
                                    <?=$check_sp['title'];?>                                        
                                    </td>
                                    <td>
                                       <?=money($ls_aff['price']);?>đ
                                    </td>
                                    <td>
                                    <b class="text-danger">
                                    <?=money($ls_aff['money_receive']);?>đ
                                    </b>                         
                                    </td>
                                    <td>
                                    <?=($ls_aff['time']);?>                            
                                    </td>
                                    <td>
                                    <?=status($ls_aff['status']);?>                            
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