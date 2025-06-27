<?php require_once('header.php');?>
<body>
   <?php require_once('run.php');?>
   <div class="page">
   <?php require_once('nav.php');?>
   <?php require_once('sidebar.php');?>
   <div class="main-content app-content">
      <div class="container-fluid" bis_skin_checked="1">
         <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb" bis_skin_checked="1">
            <h1 class="page-title fw-semibold fs-18 mb-0"><i class="fa-solid fa-gear"></i> Cài đặt</h1>
         </div>
         <div class="row" bis_skin_checked="1">
            <div class="col-xl-12" bis_skin_checked="1">
               <div class="card custom-card" bis_skin_checked="1">
                  <div class="card-body" bis_skin_checked="1">
                     <div class="row" bis_skin_checked="1">
                        <div class="col-xl-2" bis_skin_checked="1">
                           <nav class="nav nav-tabs flex-column nav-style-5 mb-3" role="tablist">
                              <a class="nav-link active" data-bs-toggle="tab" role="tab" aria-current="page" href="#cai-dat-chung" aria-selected="true"><i class="bx bx-cog me-2 align-middle d-inline-block"></i>Cài đặt chung</a>
                              <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="#ket-noi" aria-selected="false" tabindex="-1"><i class="bx bx-plug me-2 align-middle d-inline-block"></i>Kết nối</a>
                              <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="#telegram-template" aria-selected="false" tabindex="-1"><i class="fa-brands fa-telegram me-2 align-middle d-inline-block"></i>
                              Thông báo chính</a>
                           </nav>
                        </div>
                        <div class="col-xl-10" bis_skin_checked="1">
                           <div class="tab-content" bis_skin_checked="1">
                              <div class="tab-pane text-muted active show" id="cai-dat-chung" role="tabpanel" bis_skin_checked="1">
                                 <h4>Cài đặt chung</h4>
                                 <form action="" method="POST" id="formSettings">
                                    <div class="row push mb-3" bis_skin_checked="1">
                                       <div class="col-md-6" bis_skin_checked="1">
                                          <table class="table table-bordered table-striped table-hover">
                                             <tbody>
                                                <tr> 
                                                   <td>Title</td>
                                                   <td>
                                                      <input type="text" name="ten_web" value="<?=$apiit['website'];?>" class="form-control">
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td>Logo WebSite</td>
                                                   <td>
                                                      <input type="text" name="logo_website" value="<?=$apiit['logo_website'];?>" class="form-control">
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td>Favivons</td>
                                                   <td>
                                                      <input type="text" name="favicon" value="<?=$apiit['favicon'];?>" class="form-control">
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td>Description</td>
                                                   <td>
                                                      <textarea name="description" class="form-control" ><?=$apiit['description'];?></textarea>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td>Keywords</td>
                                                   <td>
                                                      <textarea name="key_words" class="form-control" ><?=$apiit['key_words'];?></textarea>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td>Name ADMIN</td>
                                                   <td>
                                                      <input type="text" name="name_ad" value="<?=$apiit['name_ad'];?>" class="form-control">
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </div>
                                       <div class="col-md-6" bis_skin_checked="1">
                                          <table class="table table-bordered table-striped table-hover">
                                             <tbody>
                                                <tr>
                                                   <td>Trạng thái website</td>
                                                   <td>
                                                      <select class="form-control" name="bao_tri">
                                                         <option value="1" <?= $apiit['bao_tri'] == '1' ? 'selected' : '' ?>>ON</option>
                                                         <option value="0" <?= $apiit['bao_tri'] == '0' ? 'selected' : '' ?>>OFF</option>
                                                      </select>
                                                      <small>Chọn OFF nếu bạn muốn bật chế độ bảo
                                                      trì.</small>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td>Email</td>
                                                   <td>
                                                      <input type="text" name="fb_admin" value="<?=$apiit['fb_admin'];?>" class="form-control">
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td>Hotline</td>
                                                   <td>
                                                      <input type="text" name="sdt_admin" value="<?=$apiit['sdt_admin'];?>" class="form-control">
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td>Telegram</td>
                                                   <td>
                                                      <input type="text" name="tele_admin" value="<?=$apiit['tele_admin'];?>" class="form-control">
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td>% Đại Lý</td>
                                                   <td>
                                                      <input type="text" name="ck_seller" value="<?=$apiit['ck_seller'];?>" class="form-control">
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td>% Affiliate</td>
                                                   <td>
                                                      <input type="text" name="hoa_hong" value="<?=$apiit['hoa_hong'];?>" class="form-control">
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td>Min rút tiền</td>
                                                   <td>
                                                      <input type="text" name="withdraw_money_ref" value="<?=$apiit['withdraw_money_ref'];?>" class="form-control">
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                    <button type="submit" id="btnLogin" class="btn btn-primary w-100 mb-3">
                                    <i class="fa fa-fw fa-save me-1"></i> Save                                            </button>
                                 </form>
                              </div>
                              <script>
                                 $("#btnLogin").on("click", function(e) {
                                         e.preventDefault(); 
                                      
                                         $('#btnLogin').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop('disabled', true);
                                         var formData = $("#formSettings").serialize(); 
                                         formData += '&action=cai-dat-chung';
                                         $.post("/admin/ajax/setting.php", formData, function(data) {
                                             if (data.status == '2') {
                                                 Swal.fire({
                                                     title: "Thành Công",
                                                     icon: "success",
                                                     text: data.msg,
                                                     confirmButtonText: "Ok, got it!",
                                                     customClass: {
                                                         confirmButton: "btn btn-primary"
                                                     }
                                                 });
                                                 setTimeout(function() {
                                                     window.location = "/admin-nc/setting";
                                                 }, 2000);
                                             } else {
                                                 $("#loading_box").hide();
                                                 $("#thongbao").html(
                                                     '<i class="fa-solid fa-triangle-exclamation" style="color: #FFD43B;"></i>' + data.msg
                                                 );
                                                 $("#thongbao").css({
                                                     "margin-top": "20px",
                                                     "padding": "10px",
                                                     "background-color": "#f8d7da",
                                                     "border": "1px solid #f5c6cb",
                                                     "color": "#721c24",
                                                     "border-radius": "4px",
                                                     "font-size": "14px"
                                                 });
                                             }
                                             $('#btnLogin').html('Save').prop('disabled', false);
                                         }, "json").fail(function() {
                                             alert("Có lỗi xảy ra khi gửi yêu cầu.");
                                             $('#btnLogin').html('Save').prop('disabled', false);
                                         });
                                     });
                                 
                              </script>
                              <div class="tab-pane text-muted" id="ket-noi" role="tabpanel" bis_skin_checked="1">
                                 <h4>Kết nối</h4>
                                 <form action="" method="POST" id="formTb">
                                    <div class="row push mb-3" bis_skin_checked="1">
                                       <div class="col-md-6" bis_skin_checked="1">
                                          <table class="mb-3 table table-bordered table-striped table-hover">
                                             <thead class="table-dark">
                                                <tr>
                                                   <th colspan="2" class="text-center">
                                                      <img src="https://zshopclone7.cmsnt.net/assets/img/icon-smtp.png" width="20px"> SMTP                                                                
                                                   </th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <tr>
                                                   <td>SMTP Host</td>
                                                   <td>
                                                      <input type="text"  value="smtp.gmail.com" class="form-control">
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td>SMTP Encryption</td>
                                                   <td>
                                                      <input type="text" value="tls" class="form-control">
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td>SMTP Port</td>
                                                   <td>
                                                      <input type="text"  value="587" class="form-control">
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td>SMTP Email</td>
                                                   <td>
                                                      <input type="text" name="smtp_email" value="<?=$apiit['smtp_email'];?>" class="form-control">
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td>SMTP Password</td>
                                                   <td>
                                                      <input type="text" name="smtp_passemail"  class="form-control" value="<?=$apiit['smtp_passmail']; ?>">
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </div>
                                       <div class="col-md-6" bis_skin_checked="1">
                                          <table class="mb-3 table table-bordered table-striped table-hover">
                                             <thead class="table-dark">
                                                <tr>
                                                   <th colspan="2" class="text-center">
                                                      <img src="https://zshopclone7.cmsnt.net/assets/img/icon-bot-telegram.avif" width="25px"> Bot Telegram                                                                
                                                   </th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <tr>
                                                   <td>Telegram Token</td>
                                                   <td>
                                                      <input type="text" name="token_tele" value="<?=$apiit['token_tele'];?>" class="form-control">
                                                      <small><a class="text-primary" href="https://help.cmsnt.co/huong-dan/huong-dan-tich-hop-bot-telegram-vao-shopclone7/" target="_blank">Xem hướng dẫn</a></small>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td>Telegram Chat ID</td>
                                                   <td>
                                                      <input type="text" name="id_tele" value="<?=$apiit['id_tele'];?>" class="form-control">
                                                      <small><a class="text-primary" href="https://help.cmsnt.co/huong-dan/huong-dan-tich-hop-bot-telegram-vao-shopclone7/" target="_blank">Xem hướng dẫn</a></small>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </div>
                                       <div class="col-md-6" bis_skin_checked="1">
                                          <table class="table table-bordered table-striped table-hover">
                                             <tbody>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                    <button type="submit" id="btnSetup" class="btn btn-primary w-100 mb-3">
                                    <i class="fa fa-fw fa-save me-1"></i> Save                                            </button>
                                 </form>
                              </div>
                              <script>
                                 $("#btnSetup").on("click", function(e) {
                                 e.preventDefault();
                                 $('#btnSetup').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop('disabled', true);
                                 var formData = $("#formTb").serialize(); 
                                 formData += '&action=SETUP';
                                 
                                 $.post("/admin/ajax/setting.php", formData, function(data) {
                                     if (data.status == '2') {
                                         Swal.fire({
                                             title: "Thành Công",
                                             icon: "success",
                                             text: data.msg,
                                             confirmButtonText: "Ok, got it!",
                                             customClass: {
                                                 confirmButton: "btn btn-primary"
                                             }
                                         });
                                         setTimeout(function() {
                                             window.location = "/admin-nc/setting";
                                         }, 2000);
                                     } else {
                                         Swal.fire({
                                             title: "Lỗi",
                                             icon: "error",
                                             text: data.msg,
                                             confirmButtonText: "Ok, got it!",
                                             customClass: {
                                                 confirmButton: "btn btn-primary"
                                             }
                                         });
                                     }
                                     $('#btnSetup').html('Save').prop('disabled', false);
                                 }, "json").fail(function() {
                                     alert("Có lỗi xảy ra khi gửi yêu cầu.");
                                     $('#btnSetup').html('Save').prop('disabled', false);
                                 });
                                 });
                                 
                              </script>
                              <div class="tab-pane text-muted" id="telegram-template" role="tabpanel" bis_skin_checked="1">
                                 <h4>Nội Dung Thông Báo Tổng</h4>
                                 <form >
                                    <div class="row push mb-3">
                                       <div class="col-md-12">
                                          <table class="mb-3 table table-bordered table-striped table-hover">
                                             <thead class="table-dark">
                                                <tr>
                                                   <th colspan="2" class="text-center">
                                                      Để mặc định nếu bạn không có nhu cầu tùy chỉnh<br>
                                                      <small>Xóa toàn bộ nội dung trong ô nếu không muốn bật thông báo</small>
                                                   </th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <tr>
                                                   <td>Thông báo hệ thống</td>
                                                   <td>
                                                   <textarea class="content" id="content" name="content" value=""><?=$apiit['thong_bao'];?></textarea>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                    <button type="submit" id="SaveSettings" class="btn btn-primary w-100 mb-3">
                                    <i class="fa fa-fw fa-save me-1"></i> Save
                                    </button>
                                 </form>
                                 <script>
                                $("#SaveSettings").on("click", function() {
                                    $('#SaveSettings').html(
                                        '<i class="fa fa-spinner fa-spin"></i> Đang xử lý...'
                                    ).prop('disabled',
                                        true);
                                        var content = CKEDITOR.instances.content.getData();
                                        $("#content").val(content);
                                    var myOTPData = {
                                        action: 'THONG_BAO',
                                        content: $("#content").val()
                                    };
                                    $.post("/admin/ajax/setting.php", myOTPData,
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
                                                    window.location = "/admin-nc/setting"
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
                                            $('#SaveSettings').html('Cập nhật').prop(
                                                'disabled', false);
                                        }, "json");
                                });
                                </script>
                              </div>
                              <script>
                                 CKEDITOR.replace("content");
                              </script>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php require_once('footer.php');?>
</body>
</html>
<script>
   document.addEventListener('DOMContentLoaded', function() {
       var activeTab = localStorage.getItem('activeTab');
       if (activeTab) {  
           $('.nav-tabs a[href="#' + activeTab + '"]').tab('show');
       }
       $('.nav-tabs a').on('shown.bs.tab', function(e) {
           var selectedTab = $(e.target).attr('href').substr(1);
           localStorage.setItem('activeTab', selectedTab);
       });
   });
</script>