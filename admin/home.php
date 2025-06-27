<?php require_once('header.php');?>
<body>
   <?php require_once('run.php');?>
   <?php
      $users = $ketnoi->num_rows("SELECT * FROM `users` ");
      $hosting = $ketnoi->num_rows("SELECT * FROM `lich_su_mua_hang` ");
      $doanhthu = $ketnoi->get_row("SELECT SUM(`gia`) FROM `lich_su_mua_hang` ")['SUM(`gia`)'];
      $check_vs = file_get_contents('../version.txt');
      ?>
   <div id="loader">
      <img src="/public/theme/assets/images/media/loader.svg" alt="">
   </div>
   <div class="page">
   <?php require_once('nav.php');?>
   <?php require_once('sidebar.php');?>
   <div class="main-content app-content">
   <div class="container-fluid">
   <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
      <h1 class="page-title fw-semibold fs-18 mb-2"><i class="fa-solid fa-chart-line"></i> Dashboard</h1>
      <div class="float-right">
         <a class="btn btn-primary shadow-primary btn-wave btn-sm" type="button"
            href="https://chinhapi.net/check-license-domain" target="_blank"><i
            class="fa-solid fa-magnifying-glass"></i> KIỂM TRA BẢN QUYỀN</a>
      </div>
   </div>
   <div class="alert alert-secondary alert-dismissible fade show custom-alert-icon shadow-sm" role="alert">
      <h5>Shop tài nguyên MMO Version: <strong style="color:blue;"><?=$check_vs;?></strong></h5>
      <small>Hệ thống sẽ tự động cập nhật phiên bản mới khi bạn truy cập trang này, để tắt chức năng này quý khách
      vào menu <strong>Cài Đặt</strong> -> <strong>Cài đặt chung</strong> -> <strong>Cập nhật phiên bản tự
      động</strong> -> <strong>Chọn OFF</strong>.</small>
      <br><br>
      <h6>Giấy phép kích hoạt website của bạn là: <strong style="color:red;"
         id="copyKey"><?=$apiit['license_key'];?></strong>
         <button class="btn btn-info btn-sm shadow-sm btn-wave copy" data-clipboard-target="#copyKey"
            onclick="copy()">Copy</button>
      </h6>
      <small>Vui lòng bảo mật giấy phép của bạn, chỉ cung cấp cho <strong>CHINHAPi</strong> khi cần hỗ trợ.</small>
      <br>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
         class="bi bi-x"></i></button>
   </div>
   <div class="alert alert-warning alert-dismissible fade show custom-alert-icon shadow-sm" role="alert">
      <svg class="svg-warning" xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 0 24 24"
         width="1.5rem" fill="#000000">
         <path d="M0 0h24v24H0z" fill="none" />
         <path d="M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z" />
      </svg>
      Vui lòng cấu hình <b>SMTP</b> để sử dụng toàn bộ tiện ích từ Mail:
      <a class="text-primary"
         href="https://help.cmsnt.co/huong-dan/huong-dan-cau-hinh-smtp-vao-website-shopclone7/"
         target="_blank">Xem Hướng Dẫn</a>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
         class="bi bi-x"></i></button>
   </div>
   <div class="row">
      <div class="col-12">
         <div class="text-right mb-3">
            <img src="https://zshopclone7.cmsnt.net/mod/img/gif-live.gif" width="60px">
         </div>
      </div>
      <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6">
         <div class="card custom-card hrm-main-card primary">
            <div class="card-body">
               <div class="d-flex align-items-top">
                  <div class="me-3">
                     <span class="avatar bg-primary">
                     <i class="fa-solid fa-users fs-18"></i>
                     </span>
                  </div>
                  <div class="flex-fill">
                     <span class="fw-semibold text-muted d-block mb-2">Thành viên đăng ký</span>
                     <h5 class="fw-semibold mb-2" id="total_users_all">
                        <?=money($users);?>
                        <div class="spinner" style="display: none;">
                           <i class="fas fa-spinner fa-spin"></i>
                        </div>
                     </h5>
                     <p class="mb-0">
                        <span class="badge bg-primary-transparent">Toàn thời gian</span>
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6">
         <div class="card custom-card hrm-main-card secondary">
            <div class="card-body">
               <div class="d-flex align-items-top">
                  <div class="me-3">
                     <span class="avatar bg-info">
                     <i class="fa-solid fa-cart-shopping fs-18"></i>
                     </span>
                  </div>
                  <div class="flex-fill">
                     <span class="fw-semibold text-muted d-block mb-2">Đơn hàng đã bán</span>
                     <h5 class="fw-semibold mb-2" id="total_orders_all">
                        <?=money($hosting);?>
                        <div class="spinner" style="display: none;">
                           <i class="fas fa-spinner fa-spin"></i>
                        </div>
                     </h5>
                     <p class="mb-0">
                        <span class="badge bg-info-transparent">Toàn thời gian</span>
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6">
         <div class="card custom-card hrm-main-card warning">
            <div class="card-body">
               <div class="d-flex align-items-top">
                  <div class="me-3">
                     <span class="avatar bg-warning">
                     <i class="fa-solid fa-chart-simple fs-18"></i>
                     </span>
                  </div>
                  <div class="flex-fill">
                     <span class="fw-semibold text-muted d-block mb-2">Doanh thu đơn hàng</span>
                     <h5 class="fw-semibold mb-2" id="total_pay_all">
                        <?=money($doanhthu);?>đ
                        <div class="spinner" style="display: none;">
                           <i class="fas fa-spinner fa-spin"></i>
                        </div>
                     </h5>
                     <p class="mb-0">
                        <span class="badge bg-warning-transparent">Toàn thời gian</span>
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6">
         <div class="card custom-card hrm-main-card danger">
            <div class="card-body">
               <div class="d-flex align-items-top">
                  <div class="me-3">
                     <span class="avatar bg-danger">
                     <i class="fa-solid fa-money-bill-trend-up fs-18"></i>
                     </span>
                  </div>
                  <div class="flex-fill">
                     <span class="fw-semibold text-muted d-block mb-2">Lợi nhuận đơn hàng</span>
                     <h5 class="fw-semibold mb-2" id="profit_all">
                        <?=money($doanhthu * 10 /100);?>đ
                        <div class="spinner" style="display: none;">
                           <i class="fas fa-spinner fa-spin"></i>
                        </div>
                     </h5>
                     <p class="mb-0">
                        <span class="badge bg-danger-transparent">Toàn thời gian</span>
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-6">
         <div class="card custom-card">
            <div class="card-header">
               <div class="card-title">Thống kê doanh thu tháng <?=$thang_hien_tai;?></div>
            </div>
            <div class="card-body">
               <canvas id="chartjs-line" class="chartjs-chart"></canvas>
               <script>
                  (function() {
                      document.addEventListener('DOMContentLoaded', function() {
                          setTimeout(function() {
                              Chart.defaults.borderColor = "rgba(142, 156, 173,0.1)";
                              Chart.defaults.color = "#8c9097";
                  
                              $.ajax({
                                  url: '/admin/api.php',
                                  method: 'POST',
                                  dataType: 'json',
                                  data: {
                                      action: 'view_chart_thong_ke_don_hang_thang',
                                      token: 'POyLKf3pegBiV0lGDojThEXrQYH185AqmaRdZxM2nzc7WJ6kUwuCbIS4vstN91710434385bd4511329cdd615a183c9fcd3cc55068'
                                  },
                                  success: function(response) {
                                      const labels = response.labels;
                                      const revenues = response.revenues;
                                      const profits = response.profits;
                  
                                      const data = {
                                          labels: labels,
                                          datasets: [{
                                                  label: 'Doanh thu',
                                                  backgroundColor: 'rgb(21, 163, 163)',
                                                  borderColor: 'rgb(132, 90, 223)',
                                                  data: revenues,
                                              },
                                              {
                                                  label: 'Lợi nhuận',
                                                  backgroundColor: 'rgb(73,182,245)',
                                                  borderColor: 'rgb(73,182,245)',
                                                  data: profits,
                                              }
                                          ]
                                      };
                  
                                      const config = {
                                          type: 'bar',
                                          data: data,
                                          options: {}
                                      };
                  
                                      const myChart = new Chart(
                                          document.getElementById(
                                              'chartjs-line'),
                                          config
                                      );
                                  }
                              });
                          }, 5);
                      });
                  })();
               </script>
            </div>
         </div>
      </div>
      <div class="col-xl-6">
         <div class="card custom-card">
            <div class="card-header">
               <div class="card-title">THỐNG KÊ DOANH THU THÁNG</div>
            </div>
            <div class="card-body">
               <canvas id="chartjs-naptien" class="chartjs-chart"></canvas>
               <script>
                  (function() {
                      document.addEventListener('DOMContentLoaded', function() {
                          setTimeout(function() {
                              Chart.defaults.borderColor = "rgba(142, 156, 173,0.1)";
                              Chart.defaults.color = "#8c9097";
                  
                              $.ajax({
                                  url: '/admin/api1.php',
                                  method: 'POST',
                                  dataType: 'json',
                                  data: {
                                      action: 'view_chart_thong_ke_nap_tien_thang',
                                      token: 'POyLKf3pegBiV0lGDojThEXrQYH185AqmaRdZxM2nzc7WJ6kUwuCbIS4vstN91710434385bd4511329cdd615a183c9fcd3cc55068'
                                  },
                                  success: function(response) {
                                      const labels = response.labels;
                                      const data = response.data;
                  
                                      const chartData = {
                                          labels: labels,
                                          datasets: [{
                                              label: 'Tổng doanh thu',
                                              backgroundColor: 'rgb(229, 6, 6)',
                                              borderColor: 'rgb(132, 90, 223)',
                                              data: data,
                                          }]
                                      };
                                      const config = {
                                          type: 'bar',
                                          data: chartData,
                                          options: {
                                              scales: {
                                                  y: {
                                                      beginAtZero: true
                                                  }
                                              }
                                          }
                                      };
                                      const myChart = new Chart(
                                          document.getElementById(
                                              'chartjs-naptien'),
                                          config
                                      );
                                  }
                              });
                          }, 5);
                      });
                  })();
               </script>
            </div>
         </div>
      </div>
   </div>
   <?php require_once('footer.php');?>