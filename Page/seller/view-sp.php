<?php
   require $_SERVER['DOCUMENT_ROOT'].'/App/header.php';
   $sl = $_GET['sl'];
   $check_sl = $ketnoi->get_row("SELECT * FROM `users` WHERE `id` = '$sl' ");
   $ng_ban = $check_sl['username'];
   $check_u = $ketnoi->get_row("SELECT * FROM `seller` WHERE `id_user` = '$sl'  ");
    $sp_dang_ban = $ketnoi->num_rows("SELECT * FROM `list_san_pham` WHERE `ng_ban` = '$username' ");
     $seller  = $ketnoi->num_rows("SELECT * FROM `lich_su_mua_hang` WHERE `ng_ban` = '$username' ");
  
   ?>
<title>Chi tiết người bán - TEAM API</title>
<script src="/public/js/chinhapi.js"></script>  
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
                        <h4>Chi tiết người bán</h4>
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
               <div class="edit-profile">
                  <div class="row">
                     <div class="col-xl-2">
                        <div class="card">
                           <div class="card-header">
                              <h4 class="card-title mb-0">Chi tiết người bán</h4>
                              <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                           </div>
                           <div class="card-body">
                              <form>
                                 <div class="row mb-2">
                                    <div class="profile-title">
                                       <div class="media">
                                          <img class="img-70 rounded-circle lazyload" alt="" src="https://hackernoon.com/images/0*4Gzjgh9Y7Gu8KEtZ.gif" data-src="<?=$check_u['img'];?>">
                                          <div class="media-body">
                                             <h5 class="mb-1"><?=$check_sl['myname'];?></h5>
                                             <p>Quê Quán : <?=$check_u['address'];?> </p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="mb-2" bis_skin_checked="1">
                                    <label class="form-label">Sản phẩm : <?=$sp_dang_ban;?></label>
                                 </div>
                                 <div class="mb-2" bis_skin_checked="1">
                                    <label class="form-label">Đã bán : <?=$seller;?></label>
                                 </div>
                                 <div class="mb-3">
                                    <label class="form-label">Chức vụ : Đại Lý</label>  
                                 </div>
                                 <div class="mb-3">
                                    <label class="form-label">Thông tin : Đã xác minh <img src="https://checkscam.com/assets/default/images/icon/check.png" alt="" height="15px"></label>  
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-10 col-sm-12" bis_skin_checked="1">
                        <div class="row">
                           <div class="col-lg-2 col-md-6 col-sm-12" data-id="0">
                              <div class="card o-hidden small-widget">
                                 <div class="card-body total-project border-b-primary border-2 text-center">
                                    <i class="fa-solid fa-cart-shopping"></i> 
                                    <span class="f-light f-w-500 f-14">Tất cả sản phẩm</span>
                                 </div>
                              </div>
                           </div>
                           <?php foreach($ketnoi->get_list("SELECT * FROM `danh_muc_sp` WHERE `status` = 'hoatdong' ORDER BY `id` DESC" ) as $dm_sp): ?>
                           <div class="col-lg-2 col-md-6 col-sm-12" data-id="<?=$dm_sp['id'];?>">
                              <div class="card o-hidden small-widget">
                                 <div class="card-body total-Progress border-b-warning border-2 text-center">
                                      <img src="https://hackernoon.com/images/0*4Gzjgh9Y7Gu8KEtZ.gif" data-src="<?=$dm_sp['img'];?>" alt="<?=$dm_sp['title'];?>" height="20px" class="lazyload"> 
                                    <span class="f-light f-w-500 f-14"><?=$dm_sp['title'];?></span>
                                 </div>
                              </div>
                           </div>
                           <?php endforeach;?>     
                        </div>
                        <div class="row">
                           <div class="col-xl-2 col-4" data-id="0">
                              <div class="card o-hidden small-widget">
                                 <button class="btn btn-pill btn-primary-gradien" type="button">Phổ biến</button>
                              </div>
                           </div>
                           <div class="col-xl-2 col-4" data-id="0">
                              <div class="card o-hidden small-widget">
                                 <button class="btn btn-pill btn-secondary-gradien" type="button">Giá giảm</button>
                              </div>
                           </div>
                           <div class="col-xl-2 col-4" data-id="0">
                              <div class="card o-hidden small-widget">
                                 <button class="btn btn-pill btn-success-gradien" type="button">Giá tăng</button>
                              </div>
                           </div>
                        </div>
                        <div id="loading" style="display: none;" class="text-center">
                           <img src="https://files.playerduo.net/production/static-files/loading.gif" alt="Loading..." height="100%">
                        </div>
                        <div class="row">
                           <?php 
                              foreach($ketnoi->get_list("SELECT * FROM `list_san_pham` WHERE `ng_ban` = '$ng_ban' AND `status` = 'hoatdong' ORDER BY `id` DESC") as $ls_sp):?>
                           <div class="col-xl-3 col-sm-12" bis_skin_checked="1" dadata-filter="<?=$ls_sp['id_dm'];?>">
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
                                                   <span id="total-price-<?php echo $ls_sp['id']; ?>" class="product-price">0đ</span>
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
               </div>
            </div>
         </div>
         <?php  require $_SERVER['DOCUMENT_ROOT'].'/App/footer.php'; ?>
      </div>
      <script>
   $(document).on('input', '.quantity-input', function () {
       const price = parseFloat($(this).data('price'));
       const quantity = parseInt($(this).val()) || 0;
       const totalPrice = price * quantity;
       const modalId = $(this).closest('.modal').attr('id'); 
       $('#' + modalId + ' #total-price-' + modalId.split('-')[1]).text(totalPrice.toLocaleString('vi-VN') + 'đ');
   });  
</script>
   </div>
  
   <?php
      require $_SERVER['DOCUMENT_ROOT'].'/App/script.php';
      ?>
</body>
</html>