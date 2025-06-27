<?php
   require $_SERVER['DOCUMENT_ROOT'].'/App/header.php';
   $id = $_GET['id'];
   $vp = $ketnoi->get_row("SELECT * FROM `list_san_pham` WHERE `id` = '$id'");
   if(!$vp){
       echo "Cac";
   }
   ?>
<title>Chi Tiết Sản Phẩm - TEAM API</title>
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
                        <h4>Trang Chủ</h4>
                     </div>
                     <div class="col-6">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item active text-end">Số Dư : <?=money($user['money']);?>đ</li>
                        </ol>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container-fluid">
               <div>
                  <div class="row product-page-main p-0">
                     <div class="col-xxl-4 col-md-6 box-col-6">
                        <div class="card">
                           <div class="card-body">
                              <div class="container mt-4">
                                 <div class="main-image-container text-center">
                                    <img id="mainImage" src="https://hackernoon.com/images/0*4Gzjgh9Y7Gu8KEtZ.gif" data-src="<?=$vp['img'];?>" class="img-fluid main-image lazyload" alt="<?=$vp['title'];?>">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xxl-5 box-col-6 order-xxl-0 order-1">
                        <div class="card">
                           <div class="card-body">
                              <div class="product-page-details">
                                 <h3><?=$vp['title'];?></h3>
                              </div>
                              <div class="product-price"><?=money($vp['price' ]);?>đ
                                 <del><?=money($vp['price' ] * 1.2, 2);?>đ</del>
                              </div>
                              <ul class="product-color">
                                 <li class="bg-primary"></li>
                                 <li class="bg-secondary"></li>
                                 <li class="bg-success"></li>
                                 <li class="bg-info"></li>
                                 <li class="bg-warning"></li>
                              </ul>
                              <hr>
                              <p>Lưu Ý : Phát hiện bán tool ngừng hỗ trợ bảo hành.
                              </p>
                              <hr>
                              <div>
                                 <table class="product-page-width">
                                    <tbody>
                                       <tr>
                                          <td> <b>Brand &nbsp;&nbsp;&nbsp;:</b></td>
                                          <td>API SOFWARE</td>
                                       </tr>
                                       <tr>
                                          <td> <b>Seller &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                          <td><?=strtoupper($vp['ng_ban']);?></td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-md-4">
                                    <h6 class="product-title">Đánh Giá</h6>
                                 </div>
                                 <div class="col-md-8">
                                    <div class="d-flex gap-2">
                                       <div><i class="fa fa-star font-warning"></i><i class="fa fa-star font-warning"></i><i class="fa fa-star font-warning"></i><i class="fa fa-star font-warning"></i><i class="fa fa-star font-warning"></i></div>
                                       <span>(250 review)</span>
                                    </div>
                                 </div>
                              </div>
                              <hr>
                              <div class="m-t-15 btn-showcase"><div class="row">
                            <div class="col-6">
                              <button class="btn btn-square btn-warning-gradien w-100 text-center"  style="border-radius: 10px;" 
                                        onclick="window.location.href='/'">
                                    Quay Lại
                                </button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-square btn-primary-gradien w-100 text-center" data-bs-toggle="modal" data-bs-target="#tooltipmodal-<?php echo $vp['id']; ?>" style="border-radius: 10px;" type="button">
                                    <i class="fa fa-shopping-cart me-1"></i> Mua ngay
                                </button>
                            </div>
                        </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xxl-3 col-md-6 box-col-12">
                        <div class="card">
                           <div class="card-body">
                              <!-- side-bar colleps block stat-->
                              <div class="filter-block">
                                 <h4>Thông Tin</h4>
                                 <ul> 
                                  <?php 
                                    $details = explode("\n", $vp['list_gt']); 
                                    foreach ($details as $detail): ?>
                                     <li>
                                         <a class="f-w-500"><?php echo trim($detail); ?></a>
                                    </li>
                                <?php endforeach; ?>
                                   
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="card">
                           <div class="card-body">
                              <div class="collection-filter-block">
                                 <ul class="pro-services">
                                    <li>
                                       <div class="media">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck">
                                             <rect x="1" y="3" width="15" height="13"></rect>
                                             <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                             <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                             <circle cx="18.5" cy="18.5" r="2.5"></circle>
                                          </svg>
                                          <div class="media-body">
                                             <p>Hỗ Trợ Setup</p>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="media">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock">
                                             <circle cx="12" cy="12" r="10"></circle>
                                             <polyline points="12 6 12 12 16 14"></polyline>
                                          </svg>
                                          <div class="media-body">
                                             <p>Online Service For New Customer</p>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="media">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-gift">
                                             <polyline points="20 12 20 22 4 22 4 12"></polyline>
                                             <rect x="2" y="7" width="20" height="5"></rect>
                                             <line x1="12" y1="22" x2="12" y2="7"></line>
                                             <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path>
                                             <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path>
                                          </svg>
                                          <div class="media-body">
                                             <p>New Online Special Festival</p>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="media">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                                             <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                             <line x1="1" y1="10" x2="23" y2="10"></line>
                                          </svg>
                                          <div class="media-body">
                                             <p>Contrary To Popular Belief. </p>
                                          </div>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                           <!-- silde-bar colleps block end here-->
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card">
                  <div class="row product-page-main">
                     <div class="col-sm-12">
                        <ul class="nav nav-tabs border-tab nav-primary mb-0" id="top-tab" role="tablist">
                           <li class="nav-item" role="presentation">
                              <a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true">Thông Tin Sản Phẩm</a>
                              <div class="material-border"></div>
                           </li>
                           <li class="nav-item" role="presentation">
                              <a class="nav-link" id="profile-top-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false" tabindex="-1">Ảnh Sản Phẩm</a>
                              <div class="material-border"></div>
                           </li>
                        </ul>
                        <br>
                        <div class="tab-content" id="top-tabContent">
                           <div class="tab-pane fade active show" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                              <p class="mb-0 m-t-20">Đang Cập Nhật
                              </p>
                           </div>
                           <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                              <ul style="list-style: none; padding: 0; display: flex; flex-direction: column; align-items: center;">
                                   <?php 
                    $list_img = explode("\n", $vp['list_img']); 
                    foreach ($list_img as $detail): ?>
                                 <li>
                                     <img  src="https://hackernoon.com/images/0*4Gzjgh9Y7Gu8KEtZ.gif" data-src="<?php echo trim($detail); ?>" alt="Nguyễn Chính" class="img-fluid lazyload" 
                                    style="display: block; max-width: 100%; border-radius: 15px;">
                                 </li>
                                <hr>
                    <?php endforeach; ?>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
                <div class="modal fade" id="tooltipmodal-<?php echo $vp['id']; ?>"  aria-labelledby="tooltipmodal-<?php echo $vp['id']; ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Thanh toán đơn hàng</h5>
                     <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <h5>Tên sản phẩm :</h5>
                     <div class="mt-2">
                        <input type="text" class="form-control" value="<?php echo $vp['title']; ?>" readonly>
                     </div>
                     <br>
                     <h5>Nhập số lượng cần mua :</h5>
                     <div class="mt-2">
                        <input type="number" class="form-control quantity-input" data-price="<?php echo $vp['price']; ?>" placeholder="Nhập số lượng" min="1" step="1">
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
                        <span id="total-price-<?php echo $vp['id']; ?>">0đ</span>
                     </p>
                  </div>
                  <div class="modal-footer">
                      
                     <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Đóng</button>
                     <button class="btn btn-primary btn-thanhtoan" id="btnThanhtoan-<?php echo $vp['id']; ?>" data-id="<?php echo $vp['id']; ?>" type="button">Thanh toán</button>
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
   <script>
      $(document).ready(function() {
      const defaultId = 0; 
      $.ajax({
      url: '/Ajax/sanpham/load-list-sp.php',
      type: 'POST',
      data: { id: defaultId },
         success: function(response) {
            $('#modal-content').html(response);
            },
      });
      });
      $(document).on('click', '.col-lg-3.col-md-6.col-sm-12', function() {
         const id = $(this).data('id'); 
         $.ajax({
            url: '/Ajax/sanpham/load-list-sp.php',
            type: 'POST',
            data: { id: id },
            success: function(response) {
                  $('#modal-content').html(response);
            },
         });
      });
   </script>
   <script>
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
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script>
      $(document).ready(function () {
          $(".category-btn").click(function () {
              $(".category-btn .category-card").removeClass("selected-category"); // Xóa class active trên tất cả
              $(this).find(".category-card").addClass("selected-category"); // Thêm class vào danh mục đang chọn
          });
      });
   </script>
   <script>
   $(document).on('input', '.quantity-input', function () {
       const price = parseFloat($(this).data('price'));
       const quantity = parseInt($(this).val()) || 0;
       const totalPrice = price * quantity;
       const modalId = $(this).closest('.modal').attr('id'); 
       $('#' + modalId + ' #total-price-' + modalId.split('-')[1]).text(totalPrice.toLocaleString('vi-VN') + 'đ');
   });  
</script>
</body>
</html>