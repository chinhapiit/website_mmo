<?php require_once('header.php');?>
<body>
   <!-- Start Switcher -->
   <?php require_once('run.php');?>
   <div class="page">
   <?php require_once('nav.php');?>
   <?php require_once('sidebar.php');?>
   <div class="main-content app-content">
   <div class="container-fluid" bis_skin_checked="1">
      <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb" bis_skin_checked="1">
         <h1 class="page-title fw-semibold fs-18 mb-0">Cấu hình ngân hàng</h1>
         <div class="ms-md-1 ms-0" bis_skin_checked="1">
            <nav>
               <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="#">Nạp tiền</a></li>
                  <li class="breadcrumb-item"><a href="https://zshopclone7.cmsnt.net/?module=admin&amp;action=recharge-bank">Ngân hàng</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Cấu hình</li>
               </ol>
            </nav>
         </div>
      </div>
      
      <div class="row" bis_skin_checked="1">
         <div class="col-xl-12" bis_skin_checked="1">
            <div class="text-right" bis_skin_checked="1">
               <a class="btn btn-danger label-btn mb-3" href="/admin-nc/tk-nap">
               <i class="ri-arrow-go-back-line label-btn-icon me-2"></i> QUAY LẠI
               </a>
            </div>
         </div>
         <div class="col-xl-12" bis_skin_checked="1">
               <div class="card custom-card" bis_skin_checked="1">
                  <div class="card-header justify-content-between" bis_skin_checked="1">
                     <div class="card-title" bis_skin_checked="1">
                     DANH SÁCH NGÂN HÀNG
                     </div>
                     <div class="d-flex" bis_skin_checked="1">
                     <a href="/admin-nc/add-bank"  class="btn btn-sm btn-primary btn-wave waves-light waves-effect waves-light">
                        <i class="ri-add-line fw-semibold align-middle"></i> 
                        Thêm ngân hàng
                     </a>
                  </div>
                  </div>
                  <div class="card-body" >
     
                     <div class="table-responsive table-wrapper mb-3"  >
                        <table class="table text-nowrap table-striped table-hover table-bordered">
                           <thead>
                              <tr>
                                 <th class="text-center">
                                    <div class="form-check form-check-md d-flex align-items-center" bis_skin_checked="1">
                                       <input type="checkbox" class="form-check-input" name="check_all" id="check_all_checkbox_users" value="option1">
                                    </div>
                                 </th>
                                 <th scope="col">ID</th>
                                 <th scope="col">CHỦ TÀI KHOẢN</th>
                                 <th scope="col" class="text-center">SỐ TÀI KHOẢN</th>
                                 <th scope="col" class="text-center">NGÂN HÀNG</th>
                                 <th scope="col" class="text-center">NẠP TỐI THIỂU</th>
                                 <th scope="col" class="text-center">TRẠNG THÁI</th>
                                 <th scope="col" class="text-center">THAO TÁC</th>
                              </tr>
                           </thead>
                           <tbody>
                                <?php 
                                $i = 1;
                                foreach($ketnoi->get_list("SELECT * FROM `nap_bank`   ORDER BY id DESC ") as $list_bank):?>
                              
                              <tr>
                                 <td class="text-center">
                                    <div class="form-check form-check-md d-flex align-items-center" bis_skin_checked="1">
                                       <input type="checkbox" class="form-check-input checkbox_users" data-id="4022" name="checkbox_users" value="4022">
                                    </div>
                                 </td>
                                 <td><a class="text-primary" href=""><?=$i++;?></a>
                                 </td>
                                 <td>
                                    <i class="fa fa-envelope" aria-hidden="true"></i> <?=$list_bank['ctk'];?>                  
                                 </td>
                                 <td class="text-center">
                                    <b  style="color:blue;"><?=$list_bank['stk'];?>  </b>
                                 </td>
                                 <td class="text-center">
                                    <b style="color:red;"><?=$list_bank['ngang_hang'];?></b>
                                 </td>
                                 <td class="text-center">
                                    <b><?=money($list_bank['min_nap']);?>đ</b>
                                 </td>
                                 <td class="text-center"><?=status_ad($list_bank['status']);?></td>
                                 
                                 <td class="text-center fs-base">
                                    <a href="/admin-nc/edit-bank/<?=$list_bank['id']?>" class="btn btn-sm btn-primary shadow-primary btn-wave waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                       <i class="fa fa-fw fa-edit"></i> Edit
                                    </a>
                                    <a type="button" onclick="removeAccount('<?=$list_bank['id'];?>')" class="btn btn-sm btn-danger shadow-danger btn-wave waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                       <i class="fas fa-trash"></i> Delete
                                    </a>
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
   </div>
<script>
function removeAccount(id) {
    var dataS = { 
        action:'REMOVE_BANK',
        id: id };
    Swal.fire({
        title: 'Bạn có chắc chắn muốn xóa?',
        text: 'Hành động này không thể hoàn tác!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post("/admin/ajax/bank/xulybank.php", dataS,
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
                        window.location = "/admin-nc/list-bank"
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
                $('#btnUpdate').html('Cập Nhật').prop(
                    'disabled', false);
            }, "json");
        }
    });
}
</script>
   <?php require_once('footer.php');?>
</body>
</html>