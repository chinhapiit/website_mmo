<?php
   require $_SERVER['DOCUMENT_ROOT'].'/App/header.php';
   $limit = isset($_POST['limit']) ? trim($_POST['limit']) : '';
   $id_limit = '';
   if (!empty($limit)) {
       $id_limit = "LIMIT $limit";
   } else {
       $id_limit =  "LIMIT 5";
   }
   $amount = isset($_POST['amount']) ? trim($_POST['amount']) : '';
   $id_amount = '';
   if (!empty($amount)) {
       $id_amount = "AND `amount` = '$amount'";
   } else {
       $id_amount = "";
   }
    $doanhthu = $ketnoi->get_row("SELECT SUM(`gia`) FROM `lich_su_mua_hang` WHERE `ng_ban` = '$username' ")['SUM(`gia`)'];
   ?>
<title>Rút tiền - TEAM API</title>
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
                        <h4>RÚT TIỀN</h4>
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
                  <div class="col-md-6">
                     <div class="card">
                        <div class="card-header">
                           <h4>Rút Tiền</h4>
                        </div>
                        <div class="card-body">
                           <div class="card-wrapper border rounded-3">
                              <form class="row g-3">
                               <div class="col-md-12">
                                    <label class="form-label">Ngân hàng</label>
                                    <select class="form-control" id="bank">
                                        <option value="" disabled selected>Chọn ngân hàng</option>
                                        <option value="vietcombank">Vietcombank</option>
                                        <option value="techcombank">Techcombank</option>
                                        <option value="acb">ACB</option>
                                        <option value="bidv">BIDV</option>
                                        <option value="vietinbank">Vietinbank</option>
                                        <option value="mbbank">MB Bank</option>
                                        <option value="vpbank">VPBank</option>
                                    </select>
                                </div>
                                 <div class="col-md-12">
                                    <label class="form-label" >Số tài khoản</label>
                                    <input class="form-control" id="stk" type="number" placeholder="Nhập số tài khoản">
                                 </div>
                                 <div class="col-md-12">
                                    <label class="form-label" >Chủ tài khoản</label>
                                    <input class="form-control" id="ctk" type="text" placeholder="Nhập tên của bạn">
                                 </div>
                                 <div class="col-md-12">
                                    <label class="form-label" >Số tiền rút</label>
                                    <input class="form-control" id="amount" type="number" placeholder="Nhập số tiền" realpathly>
                                 </div>
                                 <div class="col-md-12">
                                    <label class="form-label" >Nội dung</label>
                                    <input class="form-control" id="content" type="text" placeholder="Nội dung rút tiền" realpathly>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-check checkbox-checked">
                                       <input class="form-check-input" id="confirmWithdraw" type="checkbox">
                                       <label class="form-check-label" >Xác nhận rút tiền</label>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <button class="btn btn-primary" id="btnWithdraw" >Rút tiền </button>
                                 </div>
                              </form>
                              <script>
                                $("#btnWithdraw").on("click", function() {
                                    event.preventDefault();
                                    if (!$("#bank").val() || !$("#stk").val() || !$("#ctk").val() || !$("#amount").val() || !$("#content").val()) {
                                        Swal.fire({
                                            title: "Lỗi",
                                            icon: "error",
                                            text: "Vui lòng nhập đủ thông tin!",
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        });
                                        $('#btnWithdraw').html('Rút tiền').prop('disabled', false);
                                        return;
                                    }
                                    if (!$('#confirmWithdraw').is(':checked')) {
                                        Swal.fire({
                                            title: "Lỗi",
                                            icon: "error",
                                            text: "Bạn cần xác nhận trước khi rút tiền!",
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        });
                                        $('#btnWithdraw').html('Rút tiền').prop('disabled', false);
                                        return;
                                    }
                                    $('#btnWithdraw').html(
                                        '<i class="fa fa-spinner fa-spin"></i> Đang xử lý...'
                                    ).prop('disabled',
                                        true);
                                    var myOTPData = {
                                        action: 'WITH_DRAW',
                                        bank: $("#bank").val(),
                                        stk: $("#stk").val(),
                                        ctk: $("#ctk").val(),
                                        content: $("#content").val(),
                                        amount: $("#amount").val()   
                                    };
                                    $.post("/Ajax/seller/withdraw_money.php", myOTPData,
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
                                                    window.location = "/rut-tien-sl"
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
                                            $('#btnWithdraw').html('Rút tiền').prop(
                                                'disabled', false);
                                        }, "json");
                                });
                              </script>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="card">
                        <div class="card-header">
                           <h4>Thống kê của bạn</h4>
                        </div>
                        <div class="card-body">
                           <div class="card-wrapper border rounded-3">
                              <form class="row g-3">
                                 <div class="col-md-12">
                                    <label class="form-label" for="inputEmail4">Số tiền của shop : </label>
                                 </div>
                                 <h4 style="color: red;"><?=money($ctv['money'] - $ctv['total']);?>đ</h4>
                                 <span>Số tiền rút tối thiểu : <strong><?=money($apiit['withdraw_money_ref']);?>đ</strong></span>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12" bis_skin_checked="1">
                     <div class="card" bis_skin_checked="1">
                        <div class="card-header" bis_skin_checked="1">
                           <h4 class="card-title mb-0">Lịch Sử Rút Tiền</h4>
                           <div class="card-options" bis_skin_checked="1"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                           <hr>
                           <form method="POST" action="/affiliate/rut-tien-sl">
                              <div class="row">
                                 <div class="col-lg-3 col-md-3 col-6 mb-2">
                                    <input class="form-control" type="text" name="limit" value="<?=$limit;?>" placeholder="Nhập độ dài bảng">
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6 mb-2">
                                    <input class="form-control" type="text" name="amount" value="<?=$amount;?>" placeholder="Nhập số tiền cần tìm">
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6 mb-2">
                                    <button class="btn btn-primary w-100" type="submit">Tìm Kiếm</button>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6 mb-2">
                                    <a href="/affiliate/ruttien" class="btn btn-primary w-100">Bỏ lọc</a>
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
                                       NGÂN HÀNG
                                    </th>
                                    <th>
                                       CHỦ TÀI KHOẢN
                                    </th>
                                    <th>
                                       SỐ TÀI KHOẢN
                                    </th>
                                    <th>
                                       SỐ TIỀN
                                    </th>
                                    <th>
                                       NỘI DUNG
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
                                    foreach($ketnoi->get_list("SELECT * FROM `withdraw_money` WHERE `username` = '$username' AND `type` = 'dai-ly' $id_amount  ORDER BY `id` DESC $id_limit") as $his_aff):?> 
                                 <tr>
                                    <td>
                                       <?=$i++;?>                                 
                                    </td>
                
                                    <td>
                                       <?=$his_aff['bank'];?>                                        
                                    </td>
                                    <td>
                                       <?=$his_aff['ctk'];?>
                                    </td>
                                    <td>
                                       <b class="text-danger">
                                       <?=($his_aff['stk']);?>
                                       </b>                         
                                    </td>
                                    <td>
                                       <?=money($his_aff['amount']);?>đ                         
                                    </td>
                                    <td>
                                       <?=($his_aff['content']);?>                        
                                    </td>
                                    <td>
                                       <?=ngay($his_aff['time']);?>                            
                                    </td>
                                    <td>
                                       <?=status($his_aff['status']);?>                            
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