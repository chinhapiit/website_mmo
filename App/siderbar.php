<div class="sidebar-wrapper" data-layout="stroke-svg">
   <div class="logo-wrapper">
      <a href="/">
         <img class="img-fluid lazyload" src="https://hackernoon.com/images/0*4Gzjgh9Y7Gu8KEtZ.gif" data-src="<?=$apiit['logo_website'];?>" height="170px"  width="170px"alt="logo">
      </a>
      <div class="back-btn">
         <i class="fa fa-angle-left"></i>
      </div>
      <div class="toggle-sidebar">
         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid status_toggle middle sidebar-toggle">
            <rect x="3" y="3" width="7" height="7"></rect>
            <rect x="14" y="3" width="7" height="7"></rect>
            <rect x="14" y="14" width="7" height="7"></rect>
            <rect x="3" y="14" width="7" height="7"></rect>
         </svg>
      </div>
   </div>

   <div class="logo-icon-wrapper">
      <a href="/">
           <img class="img-fluid lazyload" src="https://hackernoon.com/images/0*4Gzjgh9Y7Gu8KEtZ.gif" data-src="<?=$apiit['logo_website'];?>" height="170px"  width="170px"alt="logo">
      </a>
   </div>

   <nav class="sidebar-main">
      <div id="sidebar-menu">
         <ul class="sidebar-links" id="simple-bar">
            <!-- Back Button -->
            <li class="back-btn">
               <a href="/">
                  <img class="img-fluid lazyload" src="https://hackernoon.com/images/0*4Gzjgh9Y7Gu8KEtZ.gif" data-src="<?=$apiit['logo_website'];?>" height="170px"  width="170px"alt="logo">
               </a>
               
            </li>

            <!-- Dashboards Section -->
            <li class="sidebar-main-title">
               <h6>Trang chủ</h6>
            </li>
            <li class="sidebar-list">
               <a class="sidebar-link sidebar-title link-nav" href="javascript:void(0)">
                  <i class="fa-solid fa-house" style="color: #0d640c;"></i>
                  <span>Dashboards</span>
               </a>
               <ul class="sidebar-submenu" style="display: none;">
                  <li><a href="/">Trang chủ</a></li>
                  <li><a href="#">Đăng xuất</a></li>
               </ul>
            </li>

            <!-- Sản phẩm Section -->
            <li class="sidebar-main-title">
               <h6>Sản phẩm</h6>
            </li>
            <li class="sidebar-list">
                <a class="sidebar-link sidebar-title link-nav" href="javascript:void(0)">
                  <i class="fa-solid fa-list" style="color: #74C0FC;"></i>
                  <span>Danh Mục Sản Phẩm</span>
               </a>
               <ul class="sidebar-submenu" style="display: none;">
               <li>
                  <?php foreach ($ketnoi->get_list("SELECT * FROM `danh_muc_sp` ORDER BY `id` DESC") as $ls_sp): ?>
                        <a  href="/view-sp/<?=$ls_sp['toslug'];?>">
                           <?=$ls_sp['title'];?>
                        </a>
                     <?php endforeach; ?>
                  </li>
               </ul>
            </li>
            <li class="sidebar-main-title">
               <h6>Tiếp thị liên kết</h6>
            </li>
            <li class="sidebar-list">
                <a class="sidebar-link sidebar-title link-nav" href="javascript:void(0)">
                <i class="fa-brands fa-affiliatetheme" style="color: #FFD43B;"></i>
                  <span>Tiếp thị</span>
               </a>
               <ul class="sidebar-submenu" style="display: none;">
               <li>
                  <a  href="/affiliate/thongke">
                     Thống kê
                  </a>
                  <a  href="/affiliate/history">
                     Lịch sử tiếp thị
                  </a>
                  <a  href="/affiliate/ruttien">
                     Rút tiền
                  </a>
               </li>
               </ul>
            </li>
            <!-- Nạp tiền Section -->
            <li class="sidebar-main-title">
               <h6>Nạp tiền</h6>
            </li>
            <li class="sidebar-list">
               <a class="sidebar-link sidebar-title link-nav" href="/nap-atm">
                  <i class="fa-solid fa-building-columns" style="color: #63E6BE;"></i>
                  <span>Nạp ATM</span>
               </a>
            </li>
            <li class="sidebar-list">
               <a class="sidebar-link sidebar-title link-nav" href="/ls-nap-atm">
                  <i class="fa-solid fa-money-check-dollar" style="color: #FFD43B;"></i>
                  <span>Lịch sử nạp tiền</span>
               </a>
            </li>

            <!-- Quản lý đơn hàng Section -->
            <li class="sidebar-main-title">
               <h6>Quản lý đơn hàng</h6>
            </li>
            <li class="sidebar-list">
               <a class="sidebar-link sidebar-title link-nav" href="/lich-su-mua-hang">
                  <i class="fa-solid fa-folder" style="color: #e91620;"></i>
                  <span>Lịch sử mua hàng</span>
               </a>
            </li>
            <!-- Hỗ trợ Section -->
            <li class="sidebar-main-title">
               <h6>Hỗ trợ</h6>
            </li>
            <li class="sidebar-list">
               <a class="sidebar-link sidebar-title link-nav" href="javascript:void(0)">
                  <i class="fa-solid fa-phone" style="color: #e2c018;"></i>
                  <span>Liên hệ</span>
               </a>
               <ul class="sidebar-submenu" style="display: none;">
                  <li><a href="<?=$apiit['fb_admin'];?>">Facebook</a></li>
                  <li><a href="<?=$apiit['sdt_admin'];?>">Zalo</a></li>
                  <li><a href="<?=$apiit['tele_admin'];?>">Telegram</a></li>
               </ul>
            </li>
            <?php if (isset($_SESSION['admin'])): ?>
            <li class="sidebar-main-title">
               <h6>Quản trị viên</h6>
            </li>
            <li class="sidebar-list">
               <a class="sidebar-link sidebar-title link-nav" href="/admin-nc">
                  <i class="fa-solid fa-user-tie fa-xl" style="color:rgb(41, 170, 190);"></i>
                  <span>Truy cập</span>
               </a>
            </li>
            <?php endif; ?>
         </ul>
      </div>
   </nav>
</div>
