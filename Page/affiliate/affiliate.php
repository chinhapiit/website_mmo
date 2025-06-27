<?php

   require $_SERVER['DOCUMENT_ROOT'].'/App/header.php';
   $currentDate = new DateTime();
   $currentDate->modify('first day of this month');
   $days = [];
   for ($i = 0; $i < 30; $i++) {
       $days[] = $currentDate->format('d/m/Y');
       $currentDate->modify('+1 day');
   }
   $daysJson = json_encode($days);
   $thang = date('n'); 
   $nam = date('Y'); 
   $tongClick = array_fill(1, count($days), 0); 
   $tongMoney = array_fill(1, count($days), 0); 
   $sqlClick = "
       SELECT DAY(`time`) AS day, COUNT(*) AS total_clicks
       FROM `ref_click`
       WHERE MONTH(`time`) = $thang 
         AND YEAR(`time`) = $nam 
         AND `id_user` = '$username'
       GROUP BY DAY(`time`)
   ";
   $resultsClick = $ketnoi->get_list($sqlClick);
   if ($resultsClick) {
       foreach ($resultsClick as $row) {
           $tongClick[$row['day']] = $row['total_clicks'];
       }
   }
   $sqlMoney = "
       SELECT DAY(`time`) AS day, SUM(`money_receive`) AS total_money
       FROM `history_affiliate`
       WHERE MONTH(`time`) = $thang 
         AND YEAR(`time`) = $nam 
         AND `id_ref` = '".$user['id']."'
       GROUP BY DAY(`time`)
   ";
   $resultsMoney = $ketnoi->get_list($sqlMoney);
   if ($resultsMoney) {
       foreach ($resultsMoney as $row) {
         $tongMoney[$row['day']] = round($row['total_money'] / 1000, 1);
       }
   }
   $tongClickJson = json_encode(array_values($tongClick));
   $tongMoneyJson = json_encode(array_values($tongMoney)); 
   $user_new = $ketnoi->get_row(" SELECT COUNT(id) FROM `users` WHERE `ref_id` = '".$user['id']."' ")['COUNT(id)'];
   ?>
<title>Tiếp thị liên kết - TEAM API</title>
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
                        <h4>Tiếp thị liên kết</h4>
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
               <div class="row">
                  <div class="col-sm-12 col-xl-6 box-col-6">
                     <div class="card">
                        <div class="card-header">
                           <h4>Doanh thu tháng <?=$thang_hien_tai;?></h4>
                        </div>
                        <div class="card-body">
                           <div id="area-spaline"></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-6 col-md-12 box-col-12">
                     <div class="card">
                        <div class="card-body">
                           <div class="alert alert-secondary dark alert-dismissible fade show" role="alert">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                 <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                              </svg>
                              <p>Bạn sẽ nhận được hoa hồng khi bạn bè được bạn giới thiệu sử dụng dịch vụ</p>
                              <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                           </div>
                           <div class="row">
                              <div class="col-xl-6 col-md-6 box-col-6 total-revenue-total-order">
                                 <div class="card">
                                    <div class="card-body">
                                       <div class="total-revenue mb-2">
                                          <span>Số lần nhấp liên kết</span>
                                       </div>
                                       <h3 class="f-w-600"><?=$user['ref_click'];?></h3>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-md-6 box-col-6 total-revenue-total-order">
                                 <div class="card">
                                    <div class="card-body">
                                       <div class="total-revenue mb-2">
                                          <span>Tỷ lệ hoa hồng</span>
                                       </div>
                                       <h3 class="f-w-600"><?=$apiit['hoa_hong'];?>%</h3>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-md-6 box-col-6 total-revenue-total-order">
                                 <div class="card">
                                    <div class="card-body">
                                       <div class="total-revenue mb-2">
                                          <span>Tổng số tiền hoa hồng đã nhận</span>
                                       </div>
                                       <h3 class="f-w-600"><?=money($user['ref_money']);?>đ</h3>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-md-6 box-col-6 total-revenue-total-order">
                                 <div class="card">
                                    <div class="card-body">
                                       <div class="total-revenue mb-2">
                                          <span>Thành viên đăng ký</span>
                                       </div>
                                       <h3 class="f-w-600"><?=money($user_new);?></h3>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-md-6 box-col-6 total-revenue-total-order">
                                 <div class="card">
                                    <a href="/affiliate/history" class="btn btn-info-gradien">Lịch sử hoa hồng</a>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-md-6 box-col-6 total-revenue-total-order">
                                 <div class="card">
                                    <a href="/affiliate/ruttien" class="btn btn-success-gradien">Rút tiền</a>
                                 </div>
                              </div>
                              <span class="f-w-600">Link giới thiệu</span>
                              <div class="col-xl-10 col-md-10 box-col-10 total-revenue-total-order">
                                 <div class="card">
                                    <input type="text" id="copy-input" class="form-control" value="<?=base_url("ref/".$user['id']); ?>" readonly>
                                 </div>
                              </div>
                              <div class="col-xl-2 col-md-2 box-col-2 total-revenue-total-order">
                                 <div class="card">
                                    <button class="btn btn-primary-gradien" id="copy-btn" data-clipboard-target="#copy-input" type="button">Copy</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php require $_SERVER['DOCUMENT_ROOT'].'/App/footer.php'; ?>
      </div>
      <script src="https://larathemes.pixelstrap.com/riho/assets/js/chart/apex-chart/apex-chart.js"></script>
      <script>
         const clipboard = new ClipboardJS('#copy-btn');
         clipboard.on('success', (e) => {
            Swal.fire({
               title: "Thành công",
               icon: "success",
               text: 'Đã copy: ' + e.text,
               customClass: {
                  confirmButton: "btn btn-primary"
               }
            });
            e.clearSelection();
         });
      </script>
      <script>
         var options = {
            chart: {
                  height: 350,
                  type: 'area',
                  zoom: {
                     enabled: false
                  }
            },
            dataLabels: {
                  enabled: false
            },
            stroke: {
                  curve: 'smooth'
            },
            series: [
                  {
                     name: 'Nhấp liên kết',
                     data: <?= $tongClickJson; ?>
                  },
                  {
                     name: 'Doanh Thu',
                     data: <?=$tongMoneyJson;?>
                  }
            ],
            xaxis: {
                  categories: <?= $daysJson; ?>,
            },
            fill: {
                  opacity: 0.3
            },
            legend: {
                  position: 'bottom',
                  horizontalAlign: 'center',
                  floating: true,
            },
         };
         var chart = new ApexCharts(document.querySelector("#area-spaline"), options);
         chart.render();
      </script>
   </div>
   <?php
      require $_SERVER['DOCUMENT_ROOT'].'/App/script.php';
      ?>

</body>
