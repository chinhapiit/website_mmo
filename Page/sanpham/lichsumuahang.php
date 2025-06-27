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
  
   ?>
<?php
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
   $total_hang = $ketnoi->num_rows("SELECT * FROM `lich_su_mua_hang` WHERE `username` = '$username' ");
   ?>
<title>LỊCH SỬ MUA HÀNG - TEAM API</title>
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
                        <h4>LỊCH SỬ ĐƠN HÀNG</h4>
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
                                       <h2 class="total-num counter"><?=$total_hang;?></h2>
                                       <p>Đơn hàng đã mua</p>
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
                              <p>Mua hàng</p>
                              <a href="/" class="btn btn-primary">Truy cập</a>
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
                              <p>Nạp tiền</p>
                              <a href="/nap-atm" class="btn btn-secondary">Truy cập</a>
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
                  <div class="col-sm-12" bis_skin_checked="1">
                     <div class="card" bis_skin_checked="1">
                        <div class="card-body" bis_skin_checked="1">
                           <form method="POST" action="/lich-su-mua-hang">
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
                                          foreach($ketnoi->get_list("SELECT * FROM `lich_su_mua_hang` WHERE `username` = '$username'  $inta $id_sp  ORDER BY `id` DESC") as $ls_sp):?>
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
                                                <li class="delete">
                                                   <a href="#" class="delete-btn" data-id="<?=$ls_sp['id'];?>"> 
                                                   <i class="fa-solid fa-trash fa-2xl" style="color: #cd0404;"></i>
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