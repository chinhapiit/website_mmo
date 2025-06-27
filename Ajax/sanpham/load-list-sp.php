<?php 
   require $_SERVER['DOCUMENT_ROOT'].'/App/header.php';
   $id_sp = $_POST['id'] ?? 0; 
   $danh_muc = $ketnoi->get_list("SELECT * FROM `danh_muc_sp` WHERE `status` = 'hoatdong' ");
   if ($id_sp == 0) {
       $list_sp = $ketnoi->get_list("SELECT * FROM `list_san_pham` WHERE `status` = 'hoatdong' ORDER BY `id` DESC");
   } else {
       $list_sp = $ketnoi->get_list("SELECT * FROM `list_san_pham` WHERE `id_dm` = '$id_sp' AND `status` = 'hoatdong' ORDER BY `id` DESC");
   }
   $sp_theo_danh_muc = [];
   foreach ($list_sp as $sp) {
       $sp_theo_danh_muc[$sp['id_dm']][] = $sp;
   }
   if (empty($list_sp)) {
       echo '<div class="row" bis_skin_checked="1">
               <div class="col-sm-12 text-center" bis_skin_checked="1">
                   <div class="iq-maintenance" bis_skin_checked="1">
                       <img src="https://larathemes.pixelstrap.com/riho/assets/images/email-template/delivery.png" height="300px" width="300px" class="img-fluid" alt="">
                       <h3 class="mt-4 mb-2">Sản phẩm không tồn tại</h3>
                   </div>
               </div>
             </div>';
       return;
   }
   ?>
<?php foreach ($danh_muc as $dm): ?>
<?php if (!isset($sp_theo_danh_muc[$dm['id']])) continue; ?>
<div class="row">
   <div class="col-sm-12">
      <div class="alert d-flex align-items-center p-3 mb-3" 
         style="background-color: #176F6B; color: white; border-radius: 10px; font-weight: bold; display: flex;">
         <img src="<?=$dm['img'];?>" height="30px" width="30px" class="img-fluid me-2 lazyload" alt="">
         <span style="flex-grow: 1;"><?= strtoupper($dm['title']); ?></span>
      </div>
   </div>
</div>
<?php foreach ($sp_theo_danh_muc[$dm['id']] as $sp): ?>
<div class="col-xl-3 col-sm-12">
   <div class="card">
      <div class="card-body">
         <div class="product-page-details two-line-ellipsis ">
            <h3><?php echo $sp['title']; ?></h3>
         </div>
         <div class="product-price">
            <?php echo money($sp['price'], 2); ?>đ
            <del><?php echo money($sp['price'] * 1.2, 2); ?>đ</del> 
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
         <ul>
            <?php 
               $details = explode("\n", $sp['list_gt']); 
               foreach ($details as $detail): ?>
            <li class="one-line-ellipsis">
               <i class="fa-solid fa-circle-check"></i> <?php echo trim($detail); ?>
            </li>
            <?php endforeach; ?>
         </ul>
         </p>
         <hr>
         <div>
            <table class="product-page-width">
               <tbody>
                  <tr>
                     <td><b>Quốc gia &nbsp;&nbsp;&nbsp;:</b></td>
                     <td><?php echo quocgia($sp['quoc_gia']); ?></td>
                  </tr>
                  <tr>
                     <td><b>Hiện có &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                     <td class="txt-success">
                        <?php 
                           $tt_sp = $sp['tt_sp'];
                           $san_pham_list = array_filter(explode("\n", $tt_sp));
                           echo count($san_pham_list); 
                           ?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Người bán &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                     <?php
                        $us = $sp['ng_ban'];
                        $check_user = $ketnoi->get_row("SELECT * FROM `users` WHERE `username` = '$us' ");
                        ?>
                     <td><a href="/seller/<?=$check_user['id'];?>"><?= strtoupper($sp['ng_ban']); ?> (Xem Gian Hàng)</a></td>
                  </tr>
               </tbody>
            </table>
         </div>
         <hr>
         <?php if (count($san_pham_list) > 0): ?>
         <?php if($sp['loai'] == 1) {;?>
         <div class="row">
            <div class="col-6">
               <button class="btn btn-square btn-warning-gradien w-100 text-center" style="border-radius: 10px;" 
                  onclick="window.location.href='/view-products/<?php echo $sp['id']; ?>'">
               Xem Chi Tiết
               </button>
            </div>
            <div class="col-6">
               <button class="btn btn-square btn-primary-gradien w-100 text-center" data-bs-toggle="modal" data-bs-target="#tooltipmodal-<?php echo $sp['id']; ?>" style="border-radius: 10px;" type="button">
               <i class="fa fa-shopping-cart me-1"></i> Mua ngay
               </button>
            </div>
         </div>
         <?php } else { ?>
         <div class="row">
            <div class="col-12">
               <button class="btn btn-square btn-primary-gradien w-100 text-center" data-bs-toggle="modal" data-bs-target="#tooltipmodal-<?php echo $sp['id']; ?>" style="border-radius: 10px;" type="button">
               <i class="fa fa-shopping-cart me-1"></i> Mua ngay
               </button>
            </div>
         </div>
         <?php } ?>
         <?php else: ?>
         <button class="btn btn-square btn-secondary-gradien w-100 text-center"  style="border-radius: 10px;" type="button" title="btn btn-square btn-secondary-gradien" disabled> <i class="fa fa-ban me-1"></i>Hết hàng</button> 
         <?php endif; ?>
         <div class="modal fade" id="tooltipmodal-<?php echo $sp['id']; ?>"  aria-labelledby="tooltipmodal-<?php echo $sp['id']; ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Thanh toán đơn hàng</h5>
                     <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <h5>Tên sản phẩm :</h5>
                     <div class="mt-2">
                        <input type="text" class="form-control" value="<?php echo $sp['title']; ?>" readonly>
                     </div>
                     <br>
                     <h5>Nhập số lượng cần mua :</h5>
                     <div class="mt-2">
                        <input type="number" class="form-control quantity-input" data-price="<?php echo $sp['price']; ?>" placeholder="Nhập số lượng" min="1" step="1">
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
                        <span id="total-price-<?php echo $sp['id']; ?>">0đ</span>
                     </p>
                  </div>
                  <div class="modal-footer">
                     <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Đóng</button>
                     <button class="btn btn-primary btn-thanhtoan" id="btnThanhtoan-<?php echo $sp['id']; ?>" data-id="<?php echo $sp['id']; ?>" type="button">Thanh toán</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php endforeach; ?>
<?php endforeach; ?>
<script>
   $(document).on('input', '.quantity-input', function () {
       const price = parseFloat($(this).data('price'));
       const quantity = parseInt($(this).val()) || 0;
       const totalPrice = price * quantity;
       const modalId = $(this).closest('.modal').attr('id'); 
       $('#' + modalId + ' #total-price-' + modalId.split('-')[1]).text(totalPrice.toLocaleString('vi-VN') + 'đ');
   });  
</script>