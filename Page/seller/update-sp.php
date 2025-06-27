<?php
   require $_SERVER['DOCUMENT_ROOT'].'/App/header.php';
   ?>
<title>Thêm sản phẩm - TEAM API</title>
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
                        <h4>Thêm sản phẩm</h4>
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
              
              <div class="col-xl-6" bis_skin_checked="1">
                <div class="card height-equal" style="min-height: auto;" bis_skin_checked="1">
                  <div class="card-header" bis_skin_checked="1">
                    <h4>Thêm sản phẩm</h4>
                    <p class="f-m-light mt-1">
                       Chú ý thao tác kỹ trước khi thêm sản phẩm.</p>
                  </div>
                  <div class="card-body custom-input" bis_skin_checked="1">
                    <form class="row g-3">
                     <div class="col-12" bis_skin_checked="1"> 
                        <label class="form-label" >Chọn Danh Mục</label>
                        <select class="form-select" id="id_dm" required="">
                          <option selected="" disabled="" value="">Vui lòng chọn</option>
                          <?php foreach($ketnoi->get_list("SELECT * FROM `danh_muc_sp` WHERE `status` = 'hoatdong' ORDER BY `id` DESC" ) as $dm_sp): ?>
                          <option value="<?=$dm_sp['id'];?>"><?=$dm_sp['title'];?></option>
                          <?php endforeach;?>     
                        </select>
                      </div>
                      <div class="col-12" bis_skin_checked="1"> 
                        <label class="form-label" >Tên chuyên mục</label>
                        <input class="form-control" id="title" type="text" placeholder="Vd : Via việt nam ..."  required="">
                      </div>
                      <div class="col-12" bis_skin_checked="1">
                        <label class="form-label" >Giá bán</label>
                        <input class="form-control" id="price" type="number" placeholder="vd : 10000" required="">
                      </div>
                      <div class="col-12" bis_skin_checked="1"> 
                        <label class="col-sm-12 col-form-label">Quốc gia</label>
                        <input class="form-control" id="quoc_gia" type="text" placeholder="Ghi mã viết tắt của quốc gia đó" required="">
                      </div>
                      
                      <div class="col-12" bis_skin_checked="1"> 
                        <label class="form-label" >Giới thiệu sản phẩm</label>
                        <textarea class="form-control" id="list_gt" rows="3" placeholder="Vd : Nhập mô tả"></textarea>
                      </div>
                      <div class="col-12" bis_skin_checked="1"> 
                        <label class="form-label" >Tài khoản | Mật khẩu | ....</label>
                        <textarea class="form-control" id="tt_sp" rows="3"></textarea>
                      </div>
                      <div class="col-12" bis_skin_checked="1"> 
                        <label class="form-label" >Trạng Thái</label>
                        <select class="form-select" id="status" required="">
                          <option selected="" disabled="" value="">Vui lòng chọn</option>
                          <option value="dangxuly">Hoạt động</option>
                          <option value="tamdung">Ngừng Bán</option>
                        </select>
                      </div>
                      <div class="col-12" bis_skin_checked="1">
                        <button class="btn btn-primary" id="btnUpdate" >Thêm ngay</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            
            </div>
          </div>
         </div>
      </div>
   </div>
   </div>
   <script>
            $("#btnUpdate").on("click", function() {
                $('#btnUpdate').html(
                    '<i class="fa fa-spinner fa-spin"></i> Đang xử lý...'
                ).prop('disabled',
                    true);
                    var myOTPData = {
                        action: 'add_cmCon',
                        id_dm: $("#id_dm").val(),
                        title: $("#title").val(),
                        price: $("#price").val(),
                        tt_sp: $("#tt_sp").val(),
                        list_gt: $("#list_gt").val(),
                        status: $("#status").val(),
                        quoc_gia: $("#quoc_gia").val(),
                        ng_ban: <?= json_encode($username); ?>
                    };
                $.post("/admin/ajax/Category/category_children.php", myOTPData,
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
                                window.location = "/"
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
                        $('#btnUpdate').html('Đăng Nhập').prop(
                            'disabled', false);
                    }, "json");
            });
            </script>
   <?php  require $_SERVER['DOCUMENT_ROOT'].'/App/footer.php'; ?>
   </div>
   </div>
   <?php
      require $_SERVER['DOCUMENT_ROOT'].'/App/script.php';
      ?>
</body>
</html>