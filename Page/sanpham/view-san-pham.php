<?php
   require $_SERVER['DOCUMENT_ROOT'].'/App/header.php';
   $id = $_GET['list'];
   $list_view = $ketnoi->get_row("SELECT * FROM `danh_muc_sp` WHERE  `toslug` = '$id' AND  `status` = 'hoatdong'");
   $id_sp = $list_view['id'];
   ?>
<title><?=$list_view['title'];?> - TEAM API</title>
<style>
   .card-container .card {
   transition: all 0.3s ease;
   }
   .card-container.active .card {
   border: 2px solid #007bff; /* Đổi màu viền khi active */
   box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Thêm hiệu ứng shadow */
   transform: scale(1.05); /* Phóng to nhẹ */
   }
</style>
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
                        <h4><?=$list_view['title'];?></h4>
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
                  <?php 
                     foreach($ketnoi->get_list("SELECT * FROM `list_san_pham` WHERE `id_dm` = '$id_sp' AND `status` = 'hoatdong'  ORDER BY `id` DESC") as $ls_sp):?>
                  <div class="col-xl-3 col-sm-12" bis_skin_checked="1">
                     <div class="card" bis_skin_checked="1">
                        <div class="card-body" bis_skin_checked="1">
                           <div class="product-page-details two-line-ellipsis" bis_skin_checked="1">
                              <h3><?=$ls_sp['title'];?></h3>
                           </div>
                           <div class="product-price" bis_skin_checked="1">
                              <?=money($ls_sp['price']);?>đ
                              <del><?=money($ls_sp['price'] * 1.2, 2);?>đ</del> 
                           </div>
                           <ul class="product-color">
                              <li class="bg-primary"></li>
                              <li class="bg-secondary"></li>
                              <li class="bg-success"></li>
                              <li class="bg-info"></li>
                              <li class="bg-warning"></li>
                           </ul>
                           <hr>
                           <p>
                           </p>
                           <ul>
                              <?php 
                                 $details = explode("\n", $ls_sp['list_gt']); 
                                 foreach ($details as $detail): ?>
                              <li class="one-line-ellipsis">
                                 <i class="fa-solid fa-circle-check"></i> <?php echo trim($detail); ?>
                              </li>
                              <?php endforeach; ?>
                           </ul>
                           <p></p>
                           <hr>
                           <div bis_skin_checked="1">
                              <table class="product-page-width">
                                 <tbody>
                                    <tr>
                                       <td><b>Quốc gia &nbsp;&nbsp;&nbsp;:</b></td>
                                       <td><?=quocgia($ls_sp['quoc_gia']);?></td>
                                    </tr>
                                    <tr>
                                       <td><b>Hiện có &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                       <td class="txt-success">
                                          <?php 
                                             $tt_sp = $ls_sp['tt_sp'];
                                             $san_pham_list = array_filter(explode("\n", $tt_sp));
                                             echo count($san_pham_list); 
                                             ?>                          
                                       </td>
                                    </tr>
                                    <tr>
                                       <td><b>Người bán &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                       <td><?=$ls_sp['ng_ban'];?></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <hr>
                           <?php if (count($san_pham_list) > 0): ?>
                             <?php if($ls_sp['loai'] == 1) {;?>
                             <div class="row">
                                <div class="col-6">
                                   <button class="btn btn-square btn-warning-gradien w-100 text-center" style="border-radius: 10px;" 
                                      onclick="window.location.href='/view-products/<?php echo $ls_sp['id']; ?>'">
                                   Xem Chi Tiết
                                   </button>
                                </div>
                                <div class="col-6">
                                   <button class="btn btn-square btn-primary-gradien w-100 text-center" data-bs-toggle="modal" data-bs-target="#tooltipmodal-<?php echo $ls_sp['id']; ?>" style="border-radius: 10px;" type="button">
                                   <i class="fa fa-shopping-cart me-1"></i> Mua ngay
                                   </button>
                                </div>
                             </div>
                             <?php } else { ?>
                             <div class="row">
                                <div class="col-12">
                                   <button class="btn btn-square btn-primary-gradien w-100 text-center" data-bs-toggle="modal" data-bs-target="#tooltipmodal-<?php echo $ls_sp['id']; ?>" style="border-radius: 10px;" type="button">
                                   <i class="fa fa-shopping-cart me-1"></i> Mua ngay
                                   </button>
                                </div>
                             </div>
                             <?php } ?>
                             <?php else: ?>
                             <button class="btn btn-square btn-secondary-gradien w-100 text-center"  style="border-radius: 10px;" type="button" title="btn btn-square btn-secondary-gradien" disabled> <i class="fa fa-ban me-1"></i>Hết hàng</button> 
                             <?php endif; ?>
                           <div class="modal fade" id="tooltipmodal-<?php echo $ls_sp['id']; ?>"   aria-labelledby="tooltipmodal-<?php echo $ls_sp['id']; ?>" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title">Thanh toán đơn hàng</h5>
                                       <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                       <h5>Tên sản phẩm :</h5>
                                       <div class="mt-2">
                                          <input type="text" class="form-control" value="<?php echo $ls_sp['title']; ?>" readonly>
                                       </div>
                                       <br>
                                       <h5>Nhập số lượng cần mua :</h5>
                                       <div class="mt-2">
                                          <input type="number" class="form-control quantity-input" data-price="<?php echo $ls_sp['price']; ?>" placeholder="Nhập số lượng" min="1" step="1">
                                       </div>
                                       <br>
                                       <h5>Mã giảm giá :</h5>
                                       <div class="mt-2">
                                          <input type="text" class="form-control" placeholder="Nhập mã giảm giá (nếu có)" min="1">
                                       </div>
                                       <hr>
                                       <h5>Tổng tiền cần thanh toán:</h5>
                                       <p class="mt-2">
                                          <span>Số tiền giảm :</span> 0đ
                                          <br>
                                          <span class="tooltip-test text-info" data-bs-toggle="tooltip" data-bs-original-title="Tooltip">Tổng tiền :</span>
                                          <span id="total-price-<?php echo $ls_sp['id']; ?>">0đ</span>
                                       </p>
                                    </div>
                                    <div class="modal-footer">
                                       <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Đóng</button>
                                       <button class="btn btn-primary btn-thanhtoan" id="btnThanhtoan-<?php echo $ls_sp['id']; ?>" data-id="<?php echo $ls_sp['id']; ?>" type="button">Thanh toán</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php endforeach;?>   
               </div>
            </div>
         </div>
         <?php  require $_SERVER['DOCUMENT_ROOT'].'/App/footer.php'; ?>
      </div>
   </div>
   <script>
      $(document).on('input', '.quantity-input', function () {
          const price = parseFloat($(this).data('price'));
          const quantity = parseInt($(this).val()) || 0;
          const totalPrice = price * quantity;
          const modalId = $(this).closest('.modal').attr('id'); 
          $('#' + modalId + ' #total-price-' + modalId.split('-')[1]).text(totalPrice.toLocaleString('vi-VN') + 'đ');
      });  
      
       $(document).on("click", ".btn-thanhtoan", function () {
       const button = $(this);
       const modal = button.closest('.modal');
       const id_sp = button.data('id');
       const quantity = parseInt(modal.find('.quantity-input').val()) || 0; 
       const price = parseFloat(modal.find('.quantity-input').data('price')); 
       const totalPrice = price * quantity; 
      
       if (quantity <= 0) {
          Swal.fire({
                title: "Lỗi",
                text: "Vui lòng nhập số lượng hợp lệ!",
                icon: "error",
                confirmButtonText: "Thử lại",
                customClass: {
                   confirmButton: "btn btn-primary"
                }
          });
          return;
       }
      
       const myOTPData = {
          action: 'MUA_TK',
          id_sp: id_sp,
          gia_tien: totalPrice,
          so_luong: quantity,
          giam_gia: 0 
       };
      
       button.html('Đang xử lý...').prop('disabled', true);
      
       $.post("/Ajax/sanpham/buy-sp.php", myOTPData, function (data) {
          if (data.status === '2') {
                Swal.fire({
                   title: "Thành công",
                   icon: "success",
                   text: data.msg,
                   confirmButtonText: "OK",
                   customClass: {
                      confirmButton: "btn btn-primary"
                   }
                   
                }).then(() => {
                   window.location = "/lich-su-mua-hang"; 
                });
          } else {
                Swal.fire({
                   title: "Thất bại",
                   icon: "error",
                   text: data.msg,
                   confirmButtonText: "Thử lại",
                   customClass: {
                      confirmButton: "btn btn-primary"
                   }
                });
                button.html('Thanh toán').prop('disabled', false);
          }
       }, "json").fail(function () {
          Swal.fire({
                title: "Lỗi",
                text: "Đã xảy ra lỗi khi gửi yêu cầu!",
                icon: "error",
                confirmButtonText: "Đồng ý"
          });
          button.html('Thanh toán').prop('disabled', false); 
       });
      });
      
      
   </script>
   <!-- page-wrapper Ends-->
   <!-- latest jquery-->
   <?php
      require $_SERVER['DOCUMENT_ROOT'].'/App/script.php';
      ?>
</body>
</html>