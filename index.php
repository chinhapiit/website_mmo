<?php
   require $_SERVER['DOCUMENT_ROOT'].'/App/header.php';
?>
<meta name="description" content="<?=$apiit['description'];?>">
<meta name="keywords" content="<?=$apiit['key_words'];?>">
<title>TRANG CHỦ - TEAM API</title>
<style>
   .card-container .card {
   transition: all 0.3s ease;
   }
   .card-container.active .card {
   border: 2px solid #007bff; 
   box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); 
   transform: scale(1.05); 
   }
.category-card {
    transition: transform 0.1s ease-in-out, box-shadow 0.2s ease-in-out;
    cursor: pointer;
    border-radius: 8px;
}

.category-card:active {
    transform: scale(0.95); /* Hiệu ứng chìm xuồng */
}

.category-card:hover {
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); /* Hiệu ứng bóng khi hover */
    background-color: rgba(200, 200, 200, 0.3); /* Màu xám nhẹ khi hover */
}

.selected-category {
    background-color: #B0B0B0 !important; /* Màu xám cho danh mục khi được chọn */
    color: white !important;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.3);
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
            <!-- Container-fluid starts-->
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="card">
                        <div class="card-header">
                             <?=$apiit['thong_bao'];?>
                        </div>
                     </div>
                  </div>
               </div>
                <div class="row">
                  <div class="col-lg-auto col-md-6 col-sm-auto category-btn" data-id="0">
                     <div class="card o-hidden small-widget category-card">
                        <div class="card-body total-project border-b-primary border-2 text-center">
                           <i class="fa-solid fa-cart-shopping"></i> 
                           <span class="f-light f-w-500 f-14">Tất cả sản phẩm</span>
                        </div>
                     </div>
                  </div>
                  <?php foreach($ketnoi->get_list("SELECT * FROM `danh_muc_sp` WHERE `status` = 'hoatdong' ORDER BY `id` DESC" ) as $dm_sp): ?>
                  <div class="col-lg-auto col-md-6 col-sm-auto category-btn" data-id="<?=$dm_sp['id'];?>">
                     <div class="card o-hidden small-widget category-card">
                        <div class="card-body total-Progress border-b-warning border-2 text-center">
                           <img src="<?=$dm_sp['img'];?>" alt="" height="20px"> 
                           <span class="f-light f-w-500 f-14"><?=$dm_sp['title'];?></span>
                        </div>
                     </div>
                  </div>
                  <?php endforeach;?>     
                  </div>


               <div class="row" id="modal-content">
               </div>
            </div>
         </div>
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
            $(document).on('click', '.col-lg-auto.col-md-6.col-sm-auto', function() {
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
         <!-- SweetAlert2 -->
         <?php  require $_SERVER['DOCUMENT_ROOT'].'/App/footer.php'; ?>
      </div>
   </div>
   <!-- page-wrapper Ends-->
   <!-- latest jquery-->
   <?php
      require $_SERVER['DOCUMENT_ROOT'].'/App/script.php';
      ?>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $(".category-btn").click(function () {
        $(".category-btn .category-card").removeClass("selected-category"); // Xóa class active trên tất cả
        $(this).find(".category-card").addClass("selected-category"); // Thêm class vào danh mục đang chọn
    });
});
</script>
</body>
</html>