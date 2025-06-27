<aside class="app-sidebar sticky" id="sidebar">
   <!-- Start::main-sidebar-header -->
   <div class="main-sidebar-header">
      <a href="/admin-nc" class="header-logo">
      <img src="<?=$apiit['logo_website'];?>" alt="logo" class="desktop-logo">
      <img src="<?=$apiit['logo_website'];?>" alt="logo" class="toggle-logo">
      <img src="<?=$apiit['logo_website'];?>" alt="logo" class="desktop-dark">
      <img src="<?=$apiit['logo_website'];?>" alt="logo" class="toggle-dark">
      <img src="<?=$apiit['logo_website'];?>" alt="logo" class="desktop-white">
      <img src="<?=$apiit['logo_website'];?>" alt="logo" class="toggle-white">
      </a>
   </div>
   <!-- End::main-sidebar-header -->
   <!-- Start::main-sidebar -->
   <div class="main-sidebar" id="sidebar-scroll" data-simplebar="init">
      <div class="simplebar-wrapper" style="margin: -8px 0px -80px;">
         <div class="simplebar-height-auto-observer-wrapper">
            <div class="simplebar-height-auto-observer"></div>
         </div>
         <div class="simplebar-mask">
            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
               <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden;">
                  <div class="simplebar-content" style="padding: 8px 0px 80px;">
                     <!-- Start::nav -->
                     <nav class="main-menu-container nav nav-pills flex-column sub-open">
                        <div class="slide-left d-none" id="slide-left">
                           <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                              <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                           </svg>
                        </div>
                        <ul class="main-menu" style="margin-left: 0px; margin-right: 0px;">
                           <li class="slide__category"><span class="category-name">Main</span></li>
                           <li class="slide">
                              <a href="/admin-nc" class="side-menu__item active">
                              <i class="bx bxs-dashboard side-menu__icon"></i>
                              <span class="side-menu__label">Dashboard</span>
                              </a>
                           </li>
                          
                           <li class="slide__category"><span class="category-name">Bảo mật</span></li>
                           <li class="slide">
                              <a href="/?module=admin&amp;action=block-ip" class="side-menu__item ">
                              <i class="bx bx-block side-menu__icon"></i>
                              <span class="side-menu__label">Block IP</span>
                              </a>
                           </li>
                           <li class="slide__category"><span class="category-name">Dịch vụ</span></li>
                           <li class="slide has-sub ">
                              <a href="javascript:void(0);" class="side-menu__item ">
                              <i class="bx bx-cart side-menu__icon"></i>
                              <span class="side-menu__label">Sản phẩm</span>
                              <i class="fe fe-chevron-right side-menu__angle"></i>
                              </a>
                              <ul class="slide-menu child1" data-popper-placement="bottom" style="position: relative; left: 0px; top: 0px; margin: 0px; transform: translate(239px, 411px);" data-popper-reference-hidden="" data-popper-escaped="">
                                 <li class="slide">
                                    <a href="/admin-nc/danh-muc" class="side-menu__item ">Danh Mục</a>
                                 </li>
                                
                                 <li class="slide">
                                    <a href="/admin-nc/ls-mua-hang" class="side-menu__item ">Lịch Sử Mua Hàng</a>
                                 </li>
                              </ul>
                           </li>
                           <li class="slide__category"><span class="category-name">Quản lý</span></li>
                           <li class="slide">
                              <a href="/admin-nc/users" class="side-menu__item ">
                              <i class="bx bxs-user side-menu__icon"></i>
                              <span class="side-menu__label">Thành viên</span>
                              </a>
                           </li>
                           <li class="slide has-sub ">
                              <a href="javascript:void(0);" class="side-menu__item ">
                              <i class="bx bxs-wallet-alt side-menu__icon"></i>
                              <span class="side-menu__label">Nạp tiền</span>
                              <i class="fe fe-chevron-right side-menu__angle"></i>
                              </a>
                              <ul class="slide-menu child1" data-popper-placement="bottom" style="position: relative; left: 0px; top: 0px; margin: 0px; transform: translate(239px, 542px);" data-popper-reference-hidden="" data-popper-escaped="">
                                 <li class="slide">
                                    <a href="/admin-nc/tk-nap" class="side-menu__item ">Ngân
                                    hàng</a>
                                 </li>
                              </ul>
                           </li>
                           <li class="slide has-sub ">
                              <a href="javascript:void(0);" class="side-menu__item ">
                              <i class="bx bx-group side-menu__icon"></i>
                              <span class="side-menu__label">Đại Lý Bán Hàng</span>
                              <i class="fe fe-chevron-right side-menu__angle"></i>
                              </a>
                              <ul class="slide-menu child1" data-popper-placement="bottom" style="position: relative; left: 0px; top: 0px; margin: 0px; transform: translate(239px, 542px);" data-popper-reference-hidden="" data-popper-escaped="">
                                 <li class="slide">
                                    <a href="/admin-nc/seller" class="side-menu__item ">Hồ sơ đại lý</a>
                                 </li>
                                 
                              </ul>
                              
                           </li>
                           <li class="slide has-sub ">
                              <a href="javascript:void(0);" class="side-menu__item ">
                              <i class="bx bx-group side-menu__icon"></i>
                              <span class="side-menu__label">Tiếp thị liên kết</span>
                              <i class="fe fe-chevron-right side-menu__angle"></i>
                              </a>
                              <ul class="slide-menu child1" data-popper-placement="bottom" style="position: relative; left: 0px; top: 0px; margin: 0px; transform: translate(239px, 542px);" data-popper-reference-hidden="" data-popper-escaped="">
                                 <li class="slide">
                                    <a href="/admin-nc/don-rut-tien" class="side-menu__item ">Đơn rút</a>
                                 </li>
                                 <li class="slide">
                                    <a href="/admin-nc/tk-nap" class="side-menu__item ">Cấu hình</a>
                                 </li>
                              </ul>
                              
                           </li>
                           <li class="slide__category"><span class="category-name">Cài đặt hệ thống</span></li>
                          
                           <li class="slide mb-5">
                              <a href="/admin-nc/setting" class="side-menu__item ">
                              <i class="bx bx-cog side-menu__icon"></i>
                              <span class="side-menu__label">Cài đặt</span>
                              </a>
                           </li>
                        </ul>
                        <div class="slide-right d-none" id="slide-right">
                           <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                              <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                           </svg>
                        </div>
                     </nav>
                     <!-- End::nav -->
                  </div>
               </div>
            </div>
         </div>
         <div class="simplebar-placeholder" style="width: auto; height: 877px;"></div>
      </div>
      <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
         <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
      </div>
      <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
         <div class="simplebar-scrollbar" style="height: 0px; display: none; transform: translate3d(0px, 0px, 0px);"></div>
      </div>
   </div>

</aside>    