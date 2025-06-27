<?php
   require $_SERVER['DOCUMENT_ROOT'].'/App/header.php';
   ?>
<title>Đăng ký đại lý - TEAM API</title>
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
                        <h4>Đăng ký đại lý</h4>
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
                <?php if($user['level'] == 1){ ?>
                  <div class="card-body" bis_skin_checked="1">
                    <div class="alert alert-success dark alert-dismissible fade show" role="alert" bis_skin_checked="1">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                      </svg>
                      <p>Hồ sơ của bạn đã được duyệt, tới gian hàng <a href="/seller/<?=$user['id'];?>">Tại đây</a></p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  </div>
                  <br>
                <?php } elseif($ctv['status'] == 'dangxuly' ) { ?>
                  <div class="card-body" bis_skin_checked="1">
                    <div class="alert alert-secondary dark alert-dismissible fade show" role="alert" bis_skin_checked="1">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                      </svg>
                      <p>Hồ sơ của bạn đang được duyệt vui lòng chờ 12->24 tiếng.</p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  </div>
                  <br>
                <?php } ?>

                  
                  
               <div class="row" bis_skin_checked="1">
                  <div class="col-xl-6 box-col-6 notification main-timeline" bis_skin_checked="1">
                     <div class="card height-equal" style="min-height: 768.359px;" bis_skin_checked="1">
                        <div class="card-header" bis_skin_checked="1">
                           <h4>Cơ hội hợp tác</h4>
                           <p class="f-m-light mt-1">
                              Vui lòng đọc kỹ trước khi thao tác.
                           </p>
                        </div>
                        <div class="card-body dark-timeline" bis_skin_checked="1">
                           <ul>
                              <li class="d-flex">
                                 <div class="timeline-dot-primary" bis_skin_checked="1"></div>
                                 <div class="w-100 ms-3" bis_skin_checked="1">
                                    <p class="d-flex justify-content-between mb-2"><span class="date-content light-background txt-dark">.</span></p>
                                    <p>Thông tin này hoàn toàn được bảo mật, được dùng để bên mình liên lạc với bên bạn trong những lúc cần thiết (xác thực người bán, khi có tranh chấp xảy ra...).<span class="dot-notification"></span></p>
                                 </div>
                              </li>
                              <li class="d-flex">
                                 <div class="timeline-dot-secondary" bis_skin_checked="1"></div>
                                 <div class="w-100 ms-3" bis_skin_checked="1">
                                    <p class="d-flex justify-content-between mb-2"><span class="date-content light-background txt-dark">.</span><span></span></p>
                                    <p>Cùng nhau kết nối, hợp tác, cùng phát triển cộng đồng kiếm tiền online.<span class="dot-notification"></span></p>
                                 </div>
                              </li>
                              <li class="d-flex">
                                 <div class="timeline-dot-success" bis_skin_checked="1"></div>
                                 <div class="w-100 ms-3" bis_skin_checked="1">
                                    <p class="d-flex justify-content-between mb-2"><span class="date-content light-background txt-dark">.</span><span></span></p>
                                    <p>Đội ngũ hỗ trợ sẽ liên lạc để giúp bạn tối ưu khả năng bán hàng.<span class="dot-notification"></span></p>
                                 </div>
                              </li>
                              <li class="d-flex">
                                 <div class="timeline-dot-success" bis_skin_checked="1"></div>
                                 <div class="w-100 ms-3" bis_skin_checked="1">
                                    <p class="d-flex justify-content-between mb-2"><span class="date-content light-background txt-dark">Doanh thu</span><span></span></p>
                                    <p>Tổng doanh thu của bạn sẽ bị trừ đi <?=$apiit['ck_seller'];?>% phí của sàn khi bạn bán hàng trên website<span class="dot-notification"></span></p>
                                 </div>
                              </li>
                              <li class="d-flex">
                                 <div class="timeline-dot-warning" bis_skin_checked="1"></div>
                                 <div class="w-100 ms-3" bis_skin_checked="1">
                                    <p class="d-flex justify-content-between mb-2"><span class="date-content light-background txt-dark">Đẩy tin nhắn</span><span></span></p>
                                    <p>Hãy vào phần thông tin tài khoản (profile), cập nhật thêm phần đẩy tin nhắn của khách về Telegram để không bỏ lỡ khách nào nhé.<span class="dot-notification"></span></p>
                                 </div>
                              </li>
                              <li class="d-flex">
                                 <div class="timeline-dot-info" bis_skin_checked="1"></div>
                                 <div class="w-100 ms-3" bis_skin_checked="1">
                                    <p class="d-flex justify-content-between mb-2"><span class="date-content light-background txt-dark">Bật bảo mật 2 lớp (2FA)</span><span></span></p>
                                    <p>Đây là quy định bắt buộc trước khi đăng ký bán hàng, vui lòng cập nhật thêm trong profile.<span class="dot-notification"></span></p>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-6" bis_skin_checked="1">
                     <div class="card height-equal" style="min-height: 768.359px;" bis_skin_checked="1">
                        <div class="card-header" bis_skin_checked="1">
                           <h4>Thông tin hồ sơ </h4>
                           <p class="f-m-light mt-1">
                              Vui lòng nhập đúng thông tin của mình để được duyệt hồ sơ nhanh nhất.
                           </p>
                        </div>
                        <div class="card-body" bis_skin_checked="1">
                           <ul class="square-timeline">
                              <li class="timeline-event">
                                 <label class="timeline-event-icon"></label>
                                 <div class="timeline-event-wrapper" bis_skin_checked="1">
                                    <p class="timeline-thumbnail">Số điện thoại</p>
                                    <input class="form-control" id="phone" type="number" placeholder="Nhập số điện thoại" maxlength="10" oninput="this.value=this.value.slice(0,10)"> 
                                    <br>
                                 </div>
                              </li>
                              <li class="timeline-event">
                                 <label class="timeline-event-icon"></label>
                                 <div class="timeline-event-wrapper" bis_skin_checked="1">
                                    <p class="timeline-thumbnail">Địa chỉ (Nhập tỉnh)</p>
                                    <input class="form-control" id="address" type="text" placeholder="Nhập tỉnh của mình"> 
                                    <br>
                                 </div>
                              </li>
                                <li class="timeline-event">
                                    <label class="timeline-event-icon"></label>
                                    <div class="timeline-event-wrapper" bis_skin_checked="1">
                                        <p class="timeline-thumbnail">Avatar SHOP</p>
                                        <input class="form-control" id="img" type="file" name="img" required>
                                        <br>
                                    </div>
                                </li>
                              <li class="timeline-event">
                                 <label class="timeline-event-icon"></label>
                                 <div class="timeline-event-wrapper d-flex align-items-center" style="display: flex; align-items: center; gap: 10px;">
                                    <input type="checkbox" id="agreeTerms">
                                    <label for="agreeTerms"> Tôi đồng ý với <a href="#">điều khoản & chính sách</a></label>
                                    <button class="btn btn-primary" id="btnLogin" type="submit" disabled style="margin-left: auto;">Gửi đăng ký</button>
                                 </div>
                              </li>
                           </ul>
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
      document.getElementById("agreeTerms").addEventListener("change", function() {
        document.getElementById("btnLogin").disabled = !this.checked;
      });
      $("#btnLogin").on("click", function() {
    $('#btnLogin').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop('disabled', true);
    
 var fileInput = $("#img")[0].files[0];   
    if (!fileInput) {
        Swal.fire({
            title: "Lỗi",
            icon: "error",
            text: "Vui lòng chọn một ảnh trước khi tải lên!",
            customClass: { confirmButton: "btn btn-primary" }
        });
        $('#btnLogin').html('Đăng ký').prop('disabled', false);
        return;
    }


    var formData = new FormData();
    formData.append("action", "SEND_FILE");
    formData.append("id_user", <?=$user['id'];?>);
     formData.append("img", fileInput);  // Thêm file vào FormData
    formData.append("address", $("#address").val());
    formData.append("phone", $("#phone").val());

    $.ajax({
        url: "/Ajax/seller/seller.php",
        type: "POST",
        data: formData,
        contentType: false, // Do not set content type
        processData: false, // Do not process data
        dataType: "json",
        success: function(data) {
            if (data.status == '2') {
                Swal.fire({
                    title: "Thành công",
                    icon: "success",
                    text: data.msg,
                    customClass: { confirmButton: "btn btn-primary" }
                });
                setTimeout(function() {
                    window.location = "/";
                }, 2000);
            } else {
                Swal.fire({
                    title: "Lỗi",
                    icon: "error",
                    text: data.msg,
                    customClass: { confirmButton: "btn btn-primary" }
                });
            }
            $('#btnLogin').html('Đăng ký').prop('disabled', false);
        },
    });
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