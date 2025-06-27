<?php
   require $_SERVER['DOCUMENT_ROOT'].'/App/header.php';
   $noidung = $apiit['cu_phap'];
?>

<meta name="description"content="Nạp tiền tài khoản marketmmo.vn ! ">
<meta name="keywords"content="naptien,napatm,mua tài nguyên mmo, VIA cổ, clone Facebook, tài kh...">
<title>NẠP ATM - TEAM API</title>
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
                        <h4>NẠP ATM</h4>
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
               <div class="col-sm-12" bis_skin_checked="1">
                     <div class="card" bis_skin_checked="1">
                        <div class="card-header" bis_skin_checked="1">
                           <h4>Nạp tiền khuyến mãi</h4>
                           <hr>
                           <p class="f-m-light mt-1">
                           <p>Số tiền nạp lớn hơn 1.000.000đ được khuyến mãi <span style="color: red;">10%</span>.</p>
                            
                           <p> Số tiền nạp lớn hơn 500.000đ được khuyến mãi <span style="color: red;">5%</span>.</p>
                       
                           <!--<p> Số tiền nạp lớn hơn 100.000đ được khuyến mãi <span style="color: red;">10%</span>.</p>-->
                           <p>Lưu ý : nạp tối thiểu <span style="color: red;">10.000đ</span>.</p>
                           </p>
                        </div>
                        
                     </div>
                  </div>
               <?php 
                $i = 1;
                foreach($ketnoi->get_list("SELECT * FROM `nap_bank` WHERE `status` = 'hoatdong'   ORDER BY `id` DESC") as $list_bank):?>
                  <div class="col-2xl-3 col-xl-4 col-lg-6 col-md-6" bis_skin_checked="1">
                     <div class="card" bis_skin_checked="1">
                        <div class="box border-bottom-info h-100 card-body" bis_skin_checked="1">
                           <div class="py-3 text-center" bis_skin_checked="1">
                              <img src="https://upload.wikimedia.org/wikipedia/commons/c/c7/Loading_2.gif" width="100%" data-src="https://img.vietqr.io/image/<?=$list_bank['ngang_hang'];?>-<?=$list_bank['stk'];?>-compact.jpg?amount=&addInfo=<?=$noidung." ".$user['id'];?>&accountName=<?=$list_bank['ctk'];?>" class="lazyload">
                           </div>
                           <div class="p-4" bis_skin_checked="1">
                              <div class="d-flex flex-wrap justify-content-between text-gray-700 fw-bold fs-6" bis_skin_checked="1">
                                 <span>STK
                                 <?=$list_bank['ngang_hang'];?>:
                                 </span>
                                 <span class="copy cursor-pointer text-success" data-clipboard-text="<?=$list_bank['stk'];?>">
                                    <?=$list_bank['stk'];?> <i class="fa fa-copy cursor-pointer"></i>
                                 </span>
                              </div>
                              <div class="d-flex flex-wrap justify-content-between text-gray-700 fw-bold fs-6" bis_skin_checked="1">
                                 <span>Chủ TK:</span>
                                 <span>
                                 <?=$list_bank['ctk'];?> </span>
                              </div>
                              <div class="d-flex flex-wrap justify-content-between text-gray-700 fw-bold fs-6" bis_skin_checked="1">
                                 <span>Nội Dung:</span>
                                 <span class="copy cursor-pointer text-danger" data-clipboard-text="<?=$noidung." ".$user['id'];?>">
                                 <?=$noidung." ".$user['id'];?> <i class="fa fa-copy cursor-pointer"></i>
                                 </span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php endforeach;?>  
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
   <script>
    var clipboard = new ClipboardJS('.copy');
    clipboard.on('success', function(e) {
      Swal.fire({
            title: "Thành công",
            icon: "success",
            text: 'Đã copy: ' + e.text,
            customClass: {
                  confirmButton: "btn btn-primary"
               }
      });
      e.clearSelection();
    });
</script>

</body>
</html>