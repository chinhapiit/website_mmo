<?php
   require $_SERVER['DOCUMENT_ROOT'].'/App/header.php';
    $ma_gd = $_GET['id'];
   $list_view = $ketnoi->get_row("SELECT * FROM `lich_su_mua_hang` WHERE `ma_gd` = '$ma_gd' ");
   if(!$list_view){
    header("Location: /");
    exit();
   }else{
    $check_id = $list_view['id_sp'];
    $check_list = $ketnoi->get_row("SELECT * FROM `list_san_pham` WHERE `id` = '$check_id' ");
   }
   ?>
<title>Đơn Hàng <?=strtoupper($list_view['ma_gd']);?> - TEAM API</title>
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
                        <h4>ĐƠN HÀNG : <?=strtoupper($list_view['ma_gd']);?></h4>
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
               <div class="row">
               <div class="col-sm-12" bis_skin_checked="1">
                     <div class="card" bis_skin_checked="1">
                        <div class="card-header" bis_skin_checked="1">
                           <h4><?=$check_list['title'];?></h4>
                           <hr>
                           <button class="btn btn-square btn-success-gradien" type="button" style="border-radius: 10px;" >Số Lượng Mua : <?php
                           $tt_sp = $list_view['don_hang'];
                           $san_pham_list = array_filter(explode("\n", $tt_sp));
                           echo count($san_pham_list); 
                           ?></button>
                           <button class="btn btn-square btn-warning-gradien" type="button"style="border-radius: 10px;" >Thanh Toán : <?=money($list_view['gia']);?>đ</button>
                           <p class="f-m-light mt-1">
                            Đơn hàng bị lỗi hay bị vấn đề gì liên hệ hỗ trợ để được bảo hành .
                           </p>
                        </div>
                        
                     </div>
                  </div>
                  <div class="col-sm-12" bis_skin_checked="1">
                     <div class="card" bis_skin_checked="1">
                        <div class="card-body" bis_skin_checked="1">
                           
                           <div class="table-responsive custom-scrollbar" bis_skin_checked="1">
                              <div id="basic-1_wrapper" class="dataTables_wrapper no-footer" bis_skin_checked="1">
                                 <table class="display dataTable no-footer" id="basic-1" role="grid" aria-describedby="basic-1_info">
                                    <thead>
                                       <tr role="row">
                                          <th class="sorting_asc"  aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 50px;">ID</th>
                                          <th class="sorting" aria-label="Position: activate to sort column ascending" style="width: 300px;">THÔNG TIN TÀI KHOẢN</th>
                                          <th class="sorting"  aria-label="Office: activate to sort column ascending" style="width: 200.641px;">TRẠNG THÁI</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                       
                                    <tr role="row" class="odd">
                                    <td>1</td>
                                    <td>
                                    <?php
                                    $don_hang_lines = explode("\n", $list_view['don_hang']);
                                    foreach ($don_hang_lines as $line) {
                                        echo htmlspecialchars($line) . '<br>';
                                    }
                                    ?>
                                    </td>

                                    <td><?=status($list_view['status']);?></td>
                                    </tr>
                                    </tbody>
                                 </table>
                               
                              </div>
                           </div>
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