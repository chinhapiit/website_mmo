
<?php
if (isset($_GET['id']) && isset($_GET['don_hang'])) {
    $donHang = $_GET['don_hang']; 
    $id = $_GET['id'];
    $fileName = "don_hang_" . $id . ".txt";
    $fileContent = "Thông tin đơn hàng:\n\n" . $donHang;
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    header('Content-Length: ' . strlen($fileContent));
    echo $fileContent;
    exit();
}
   $ma_gd = isset($_POST['ma_gd']) ? trim($_POST['ma_gd']) : '';
   $inta = '';
   if (!empty($ma_gd)) {
       $inta = "AND `ma_gd` = '$ma_gd'";
   } else {
       $inta = "";
   }
   
   $id_ls = isset($_POST['id_sp']) ? trim($_POST['id_sp']) : '';
   $id_sp = '';
   if (!empty($id_ls)) {
       $id_sp = "AND `id` = '$id_ls'";
   } else {
       $id_sp = "";
   }
   
   ?>
<?php
   require $_SERVER['DOCUMENT_ROOT'].'/App/header.php';
 $total_hang = $ketnoi->num_rows("SELECT * FROM `lich_su_mua_hang` WHERE `ng_ban` = '$username' ");
 $doanhthu = $ketnoi->get_row("SELECT SUM(`gia`) FROM `lich_su_mua_hang` WHERE `ng_ban` = '$username' ")['SUM(`gia`)'];
 $sp_dang_ban = $ketnoi->num_rows("SELECT * FROM `list_san_pham` WHERE `ng_ban` = '$username' ");
 $us =  $user['id'];
 $seller = $ketnoi->get_row("SELECT * FROM `seller` WHERE `id_user` = '$us' ");
   ?>
<title>Cửa hàng của bạn - TEAM API</title>
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
                        <h4>CỬA HÀNG CỦA BẠN</h4>
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
                  <div class="col-md-6">
                     <div class="card role-management">
                        <div class="card-body">
                           <div class="blog-card">
                              <div class="blog-card-content">
                                 <div class="role-details">
                                    <div class="role-profile">
                                       <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwLeIGjrPAK2i_tTs9x9TqL9LrUXSi9zmS3g&s" alt="Ticket-star">
                                    </div>
                                    <div class="role-profile-details">
                                       <h3>Chào bạn đến với quản lý đơn hàng!</h3>
                                    </div>
                                 </div>
                                 <div class="blog-tags">
                                    <div class="tags-icon bg-primary">
                                    <i class="fa-solid fa-inbox"></i>
                                    </div>
                                    <div class="tag-details">
                                       <h2 class="total-num counter"><?=$sp_dang_ban;?></h2>
                                       <p>Sản phẩm đang bán</p>
                                    </div>
                                 </div>
                              </div>
                              <div class="blog-card-image">
                                 <img src="https://larathemes.pixelstrap.com/riho/assets/images/user-management.png" alt="">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-3" bis_skin_checked="1">
                     <div class="card" bis_skin_checked="1">
                        <div class="card-body border-b-primary border-2" bis_skin_checked="1">
                           <div class="upcoming-box" bis_skin_checked="1">
                              <div class="upcoming-icon bg-primary" bis_skin_checked="1">
                              <i class="fa-solid fa-cart-shopping"></i>
                              </div>
                              <p>Thêm sản phẩm</p>
                              <a href="/update-sp" class="btn btn-primary">Truy cập</a>
                           </div>
                           <ul class="bubbles role">
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
                  <div class="col-sm-3" bis_skin_checked="1">
                     <div class="card" bis_skin_checked="1">
                        <div class="card-body border-b-secondary border-2" bis_skin_checked="1">
                           <div class="upcoming-box" bis_skin_checked="1">
                              <div class="upcoming-icon bg-secondary" bis_skin_checked="1">
                              <i class="fa-solid fa-money-check-dollar"></i>
                              </div>
                              <p>Rút tiền</p>
                              <a href="/rut-tien-sl" class="btn btn-secondary">Truy cập</a>
                           </div>
                           <ul class="bubbles role role-user">
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
                        <div class="card-body total-Progress border-b-warning border-2">
                           <span class="f-light f-w-500 f-14">Doanh Thu</span>
                           <div class="project-details">
                              <div class="project-counter">
                                 <h2 class="f-w-600"><?=money($seller['money']);?></h2>
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
                           <span class="f-light f-w-500 f-14">Số Dư </span>
                           <div class="project-details">
                              <div class="project-counter">
                                 <h2 class="f-w-600"><?=money($seller['money'] - $seller['total']);?></h2>
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
                           <span class="f-light f-w-500 f-14">Đã Rút</span>
                           <div class="project-details">
                              <div class="project-counter">
                                 <h2 class="f-w-600"><?=money($seller['total']);?></h2>
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
                           <span class="f-light f-w-500 f-14">Đơn đã bán</span>
                           <div class="project-details">
                              <div class="project-counter">
                                 <h2 class="f-w-600"><?=$total_hang;?></h2>
                                 <span class="f-12 f-w-400">đơn</span>
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
                  <div class="col-sm-12" bis_skin_checked="1">
                     <div class="card" bis_skin_checked="1">
                        
                        <div class="card-body" bis_skin_checked="1">
                        <h4 class="card-title mb-0">Sản phẩm của bạn</h4>
                        <hr>
                           <form method="POST" action="/lich-su-mua-hang">
                              <div class="row">
                                 <div class="col-lg-3 col-md-3 col-6 mb-2">
                                    <input class="form-control" type="text" name="ma_gd"  placeholder="Mã đơn hàng">
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6 mb-2">
                                    <input class="form-control" type="text" name="id_sp"  placeholder="Nhập ID sản phẩm">
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6 mb-2">
                                    <button class="btn btn-primary w-100" type="submit">Tìm Kiếm</button>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6 mb-2">
                                    <a href="/lich-su-mua-hang" class="btn btn-primary w-100">Bỏ lọc</a>
                                 </div>
                              </div>
                           </form>
                           <div class="table-responsive custom-scrollbar" bis_skin_checked="1">
                              <div id="basic-1_wrapper" class="dataTables_wrapper no-footer" bis_skin_checked="1">
                                 <table class="display dataTable no-footer" id="basic-1" role="grid" aria-describedby="basic-1_info">
                                    <thead>
                                       <tr role="row">
                                          <th class="sorting_asc"  aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 50px;">ID</th>
                                          <th class="sorting" aria-label="Position: activate to sort column ascending" style="width: 100px;">TITLE</th>
  
                                          <th class="sorting"  aria-label="Age: activate to sort column ascending" style="width: 70px;">GIÁ TIỀN</th>
                                          <th class="sorting"  aria-label="Start date: activate to sort column ascending" style="width: 120.109px;">QUỐC GIA</th>
                                          <th class="sorting"  aria-label="Salary: activate to sort column ascending" style="width: 118.797px;">TRẠNG THÁI</th>
                                          <th class="sorting"  aria-label="Action: activate to sort column ascending" style="width: 122.062px;">THÁO TÁC</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                          $i = 1;
                                          foreach($ketnoi->get_list("SELECT * FROM `list_san_pham` WHERE `ng_ban` = '$username'   ORDER BY `id` DESC") as $ls_sp):?>
                                      
                                       <tr role="row" class="odd">
                                          <td class="sorting_1"><?=$i++;?></td>
                                          <td><?=$ls_sp['title'];?></td>
                                          <td><?=money($ls_sp['price']);?>đ</td>
                                          <td><?=quocgia($ls_sp['quoc_gia']);?></td>
                                          <td><?=status_ad($ls_sp['status']);?></td>
                                         <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center" style="width: 80px;">
                                          <div class="col-xxl-6 col-md-6 col-sm-12" bis_skin_checked="1">
                                            <div class="btn-group" role="group" aria-label="Basic example" bis_skin_checked="1">
                                              <button class="btn btn-dark edit-product" data-id="<?=$ls_sp['id'];?>" type="button">Chỉnh Sửa</button>
                                              <button class="btn btn-dark" type="button">X</button>
                                              <button class="btn btn-dark add-product" data-id="<?=$ls_sp['id'];?>" type="button">Thêm Hàng</button>
                                            </div>
                                          </div>
                                         </td>
                                       </tr>
                                       <div class="modal fade" id="addProductModal-<?=$ls_sp['id'];?>" aria-labelledby="addProductModalLabel" aria-modal="true" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Thêm Hàng</h5>
                                                        <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5>Tên sản phẩm:</h5>
                                                        <div class="mt-2">
                                                            <input type="text" id="product_name" class="form-control" value="<?=$ls_sp['title'];?>">
                                                        </div>
                                                        <br>
                                                        <h5>Thêm hàng bán:</h5>
                                                        <div class="mt-2">
                                                            <textarea class="form-control" id="thongtinacc" placeholder="Vd : Nhập mô tả"></textarea>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Đóng</button>
                                                        <button class="btn btn-primary btn-add-product" id="btnAddProduct-<?=$ls_sp['id'];?>" data-id="<?=$ls_sp['id'];?>" type="button">Thêm Hàng</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                       <div class="modal fade" id="tooltipmodal-<?=$ls_sp['id'];?>" aria-labelledby="tooltipmodal-4" aria-modal="true" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered" role="document" bis_skin_checked="1">
                                               <div class="modal-content" bis_skin_checked="1">
                                                  <div class="modal-header" bis_skin_checked="1">
                                                     <h5 class="modal-title">Sửa sản phẩm</h5>
                                                     <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>
                                                  <div class="modal-body" bis_skin_checked="1">
                                                      <h5>Danh Mục  :</h5>
                                                     <div class="mt-2" bis_skin_checked="1">
                                                       <select class="form-select" id="id_dm" required="">
                                                           <?php
                                                           $check_id = $ls_sp['id_dm'];
                                                           $dm = $ketnoi->get_row("SELECT * FROM `danh_muc_sp`  WHERE `id` = '$check_id'");
                                                           ?>
                                                          <option selected="" disabled="" value="<?=$ls_sp['id'];?>"><?=$dm['title'];?></option>
                                                          <?php foreach($ketnoi->get_list("SELECT * FROM `danh_muc_sp` WHERE `status` = 'hoatdong' ORDER BY `id` DESC" ) as $dm_sp): ?>
                                                          <option value="<?=$dm_sp['id'];?>"><?=$dm_sp['title'];?></option>
                                                          <?php endforeach;?>     
                                                        </select>
                                                     </div>
                                                     <br>
                                                     <h5>Tên sản phẩm :</h5>
                                                     <div class="mt-2" bis_skin_checked="1">
                                                        <input type="text" class="form-control" id="title" value="<?=$ls_sp['title'];?>" >
                                                     </div>
                                                     <br>
                                                     <h5>Giá tiền :</h5>
                                                     <div class="mt-2" bis_skin_checked="1">
                                                        <input type="number" class="form-control quantity-input" id="price" value="<?=$ls_sp['price'];?>">
                                                     </div>
                                                     <br>
                                                     <h5>Quốc gia :</h5>
                                                     <div class="mt-2" bis_skin_checked="1">
                                                        <input type="text" class="form-control" value="<?=$ls_sp['quoc_gia'];?>" id="quoc_gia" placeholder="Nhập mã viết tắt quốc gia">
                                                     </div>
                                                      <br>
                                                     <h5>Thông tin sản phẩm :</h5>
                                                     <div class="mt-2" bis_skin_checked="1">
                                                        <textarea class="form-control" id="list_gt" placeholder="Vd : Nhập mô tả"><?= htmlspecialchars($ls_sp['list_gt']); ?></textarea>
                                                     </div>
                                                     <hr>
                                                  </div>
                                                  <div class="modal-footer" bis_skin_checked="1">
                                                     <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Đóng</button>
                                                     <button class="btn btn-primary btn-thanhtoan btn-update" id="btnUpdate-<?=$ls_sp['id'];?>" data-id="<?=$ls_sp['id'];?>" type="button">Cập nhật</button>
                                                  </div>
                                               </div>
                                            </div>
                                      </div>
                                       <?php endforeach;?>     
                                    </tbody>
                                 </table>
                                 <script>
                        

                                        $(document).on("click", ".btn-update", function() {
                                            let btn = $(this);
                                            let id_sp = btn.data("id");
                                        btn.html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop("disabled", true);
                                        var myOTPData = {
                                            action: 'UPDATE_SP',
                                            id_sp: id_sp,
                                            id_dm: $("#id_dm").val(),
                                            title: $("#title").val(),
                                            price: $("#price").val(),
                                            quoc_gia: $("#quoc_gia").val(),
                                            list_gt: $("#list_gt").val()
                                        };
                                        $.post("/Ajax/seller/seller.php", myOTPData,
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
                                                        window.location = "/shop"
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
                                                $('#btnUpdate-<?=$ls_sp['id'];?>').html('Cập nhật').prop(
                                                    'disabled', false);
                                            }, "json");
                                    });
                                    document.addEventListener("DOMContentLoaded", function() {
                                        document.querySelectorAll(".edit-product").forEach(icon => {
                                            icon.addEventListener("click", function() {
                                                let id = this.getAttribute("data-id");
                                                let modal = document.getElementById(`tooltipmodal-${id}`);
                                                if (modal) {
                                                    let bsModal = new bootstrap.Modal(modal);
                                                    bsModal.show();
                                                }
                                            });
                                        });
                                        document.querySelectorAll(".add-product").forEach(icon => {
                                            icon.addEventListener("click", function() {
                                                let id = this.getAttribute("data-id");
                                                let modal = document.getElementById(`addProductModal-${id}`);
                                                if (modal) {
                                                    let bsModal = new bootstrap.Modal(modal);
                                                    bsModal.show();
                                                }
                                            });
                                        });
                                    });
                                    document.querySelectorAll('.delete-btn').forEach(button => {
                                        button.addEventListener('click', function(event) {
                                            event.preventDefault();
                                            const id = this.getAttribute('data-id');
                                            Swal.fire({
                                                title: 'Bạn có chắc chắn muốn xóa?',
                                                text: "Dữ liệu sẽ bị xóa vĩnh viễn.",
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonText: 'Xóa',
                                                cancelButtonText: 'Hủy',
                                                customClass: {
                                                   confirmButton: 'btn btn-primary',
                                                   cancelButton: 'btn btn-secondary' 
                                                }
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                $.post("/Ajax/sanpham/xoasp.php", { id: id }, function(data) {
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
                                                    }
                                                },"json")};
                                            });
                                        });
                                    });
$(document).on("click", ".btn-add-product", function() {
    let btn = $(this);
    let id_sp = btn.data("id");  // Lấy giá trị từ data-id của nút

    // Lấy giá trị từ textarea
    let thongtinacc = $("#thongtinacc").val(); 

    // Kiểm tra xem textarea có giá trị không
    if (!thongtinacc) {
        Swal.fire({
            title: "Lỗi",
            icon: "error",
            text: "Vui lòng nhập thông tin vào ô 'Thêm hàng bán'.",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
        return;  // Dừng lại nếu không có giá trị
    }

    // Cập nhật UI để người dùng biết đang xử lý
    btn.html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop("disabled", true); 

    var myProductData = {
        action: 'CO_CC',
        thongtinacc: thongtinacc,   // Gửi giá trị từ textarea
        id_sp: id_sp                // Gửi ID sản phẩm từ data-id
    };

    $.post("/Ajax/seller/seller.php", myProductData, function(data) {
        if (data.status == '2') {
            // Thông báo thành công
            Swal.fire({
                title: "Thêm sản phẩm thành công",
                icon: "success",
                text: data.msg,
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
            setTimeout(function() {
                window.location.reload();  // Tải lại trang sau khi thành công
            }, 2000);
        } else {
            // Thông báo lỗi
            Swal.fire({
                title: "Lỗi",
                icon: "error",
                text: data.msg,
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
        }
        // Cập nhật lại UI khi hoàn thành xử lý
        btn.html('Thêm Hàng').prop('disabled', false);
    }, "json");
});


                                 </script>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12" bis_skin_checked="1">
                     <div class="card" bis_skin_checked="1">
                        
                        <div class="card-body" bis_skin_checked="1">
                        <h4 class="card-title mb-0">Lịch sử đơn hàng</h4>
                        <hr>
                           <form method="POST" action="/shop">
                              <div class="row">
                                 <div class="col-lg-3 col-md-3 col-6 mb-2">
                                    <input class="form-control" type="text" name="ma_gd" value="<?=$ma_gd;?>" placeholder="Mã đơn hàng">
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6 mb-2">
                                    <input class="form-control" type="text" name="id_sp" value="<?=$id_ls;?>" placeholder="Nhập ID sản phẩm">
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6 mb-2">
                                    <button class="btn btn-primary w-100" type="submit">Tìm Kiếm</button>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6 mb-2">
                                    <a href="/shop" class="btn btn-primary w-100">Bỏ lọc</a>
                                 </div>
                              </div>
                           </form>
                           <div class="table-responsive custom-scrollbar" bis_skin_checked="1">
                              <div id="basic-1_wrapper" class="dataTables_wrapper no-footer" bis_skin_checked="1">
                                 <table class="display dataTable no-footer" id="basic-1" role="grid" aria-describedby="basic-1_info">
                                    <thead>
                                       <tr role="row">
                                          <th class="sorting_asc"  aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 50px;">ID</th>
                                          <th class="sorting" aria-label="Position: activate to sort column ascending" style="width: 100px;">MÃ GIAO DỊCH</th>
                                          <th class="sorting"  aria-label="Office: activate to sort column ascending" style="width: 200.641px;">SẢN PHẨM</th>
                                          <th class="sorting"  aria-label="Age: activate to sort column ascending" style="width: 70px;">GIÁ TIỀN</th>
                                          <th class="sorting"  aria-label="Start date: activate to sort column ascending" style="width: 120.109px;">NGÀY MUA</th>
                                          <th class="sorting"  aria-label="Salary: activate to sort column ascending" style="width: 118.797px;">TRẠNG THÁI</th>
                                          <th class="sorting"  aria-label="Action: activate to sort column ascending" style="width: 122.062px;">THÁO TÁC</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                          $i = 1;
                                          foreach($ketnoi->get_list("SELECT * FROM `lich_su_mua_hang` WHERE `ng_ban` = '$username'  $inta $id_sp  ORDER BY `id` DESC") as $ls_sp):?>
                                       <?php
                                          $check_sp = $ls_sp['id_sp'];
                                          $sp_ls = $ketnoi->get_row("SELECT * FROM `list_san_pham` WHERE `id` = '$check_sp'   ");
                                          ?>
                                       <tr role="row" class="odd">
                                          <td class="sorting_1"><?=$i++;?></td>
                                          <td><?=$ls_sp['ma_gd'];?></td>
                                          <td><?=$sp_ls['title'];?></td>
                                          <td><?=money($ls_sp['gia']);?>đ</td>
                                          <td><?=($ls_sp['time']);?></td>
                                          <td><?=status($ls_sp['status']);?></td>
                                          <td>
                                             <ul class="action">
                                                <li class="edit"> <a href="/view-ls/<?=$ls_sp['ma_gd'];?>"><i class="fa-solid fa-eye fa-2xl" style="color: #74C0FC;"></i></a></li>
                                                <li class="edit"> 
                                                   <a href="#" class="download-btn" data-id="<?=$ls_sp['id'];?>" data-don-hang="<?=$ls_sp['don_hang'];?>"> 
                                                   <i class="fa-solid fa-download fa-2xl" style="color: #63E6BE;"></i>
                                                   </a>
                                                </li>
                                               
                                             </ul>
                                          </td>
                                       </tr>
                                       <?php endforeach;?>     
                                    </tbody>
                                 </table>
                                 <script>
                                    document.querySelectorAll('.download-btn').forEach(button => {
                                        button.addEventListener('click', function(event) {
                                            event.preventDefault();
                                            const donHang = this.getAttribute('data-don-hang');
                                            const id = this.getAttribute('data-id');
                                            Swal.fire({
                                                title: 'Bạn có muốn tải xuống?',
                                                text: "Tệp sẽ chứa thông tin đơn hàng của bạn.",
                                                icon: 'question',
                                                showCancelButton: true,
                                                confirmButtonText: 'Tải xuống',
                                                cancelButtonText: 'Hủy',
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = `/lich-su-mua-hang?id=${id}&don_hang=${encodeURIComponent(donHang)}`;
                                                }
                                            });
                                        });
                                    });
                                   
                                
                                 </script>
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