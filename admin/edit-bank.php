<?php require_once('header.php');?>
<?php
$id = $_GET['id'];
$check_bank = $ketnoi->get_row("SELECT * FROM `nap_bank` WHERE  `id` = '$id'  ");
?>
<body>
   <!-- Start Switcher -->
   <?php require_once('run.php');?>
   <div class="page">
   <?php require_once('nav.php');?>
   <?php require_once('sidebar.php');?>
   <div class="main-content app-content">
   <div class="container-fluid" bis_skin_checked="1">
      <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb" bis_skin_checked="1">
         <h1 class="page-title fw-semibold fs-18 mb-0">Chỉnh sửa ngân hàng <?=$check_bank['ngang_hang'];?></h1>
         <div class="ms-md-1 ms-0" bis_skin_checked="1">
            <nav>
               <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="#">Nạp tiền</a></li>
                  <li class="breadcrumb-item"><a href="https://zshopclone7.cmsnt.net/?module=admin&amp;action=recharge-bank-config">Ngân hàng</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa ngân hàng
                     <?=$check_bank['ngang_hang'];?>
                  </li>
               </ol>
            </nav>
         </div>
      </div>
      <div class="row" bis_skin_checked="1">
         <div class="col-xl-12" bis_skin_checked="1">
            <div class="card custom-card" bis_skin_checked="1">
               <div class="card-header justify-content-between" bis_skin_checked="1">
                  <div class="card-title" bis_skin_checked="1">
                     CHỈNH SỬA NGÂN HÀNG
                  </div>
                  <div class="d-flex" bis_skin_checked="1">
                     <button data-bs-toggle="modal" data-bs-target="#exampleModalScrollable2" class="btn btn-sm btn-primary btn-wave waves-light waves-effect waves-light"><i class="ri-add-line fw-semibold align-middle"></i> Thêm ngân hàng</button>
                  </div>
               </div>
               <div class="card-body" bis_skin_checked="1">
                  <form >
                     <div class="mb-4" bis_skin_checked="1">
                                <label for="exampleInputEmail1">Ngân hàng <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="<?=$check_bank['ngang_hang'];?>" list="options" id="ngang_hang" placeholder="Nhập tên ngân hàng" required="">
                                <datalist id="options">
                                    <option value="THESIEURE">Ví THESIEURE.COM</option>
                                    <option value="MOMO">Ví điện tử MOMO</option>
                                    <option value="Zalo Pay">Ví điện tử Zalo Pay</option>
                                    <option value="VCB">Ngân hàng TMCP Ngoại Thương Việt Nam</option>
                                    <option value="BIDV">Ngân hàng TMCP Đầu tư và Phát triển Việt Nam</option>
                                    <option value="VBA">Ngân hàng Nông nghiệp và Phát triển Nông thôn Việt Nam</option>
                                    <option value="OCB">Ngân hàng TMCP Phương Đông</option>
                                    <option value="MB">Ngân hàng TMCP Quân đội</option>
                                    <option value="TCB">Ngân hàng TMCP Kỹ thương Việt Nam</option>
                                    <option value="ACB">Ngân hàng TMCP Á Châu</option>
                                    <option value="VPB">Ngân hàng TMCP Việt Nam Thịnh Vượng</option>
                                    <option value="TPB">Ngân hàng TMCP Tiên Phong</option>
                                    <option value="STB">Ngân hàng TMCP Sài Gòn Thương Tín</option>
                                    <option value="HDB">Ngân hàng TMCP Phát triển Thành phố Hồ Chí Minh</option>
                                    <option value="VCCB">Ngân hàng TMCP Bản Việt</option>
                                    <option value="SCB">Ngân hàng TMCP Sài Gòn</option>
                                    <option value="VIB">Ngân hàng TMCP Quốc tế Việt Nam</option>
                                    <option value="SHB">Ngân hàng TMCP Sài Gòn - Hà Nội</option>
                                    <option value="EIB">Ngân hàng TMCP Xuất Nhập khẩu Việt Nam</option>
                                    <option value="MSB">Ngân hàng TMCP Hàng Hải</option>
                                    <option value="CAKE">TMCP Việt Nam Thịnh Vượng - Ngân hàng số CAKE by VPBank</option>
                                    <option value="Ubank">TMCP Việt Nam Thịnh Vượng - Ngân hàng số Ubank by VPBank</option>
                                    <option value="TIMO">Ngân hàng số Timo by Ban Viet Bank (Timo by Ban Viet Bank)</option>
                                    <option value="VTLMONEY">Tổng Công ty Dịch vụ số Viettel - Chi nhánh tập đoàn công nghiệp viễn thông Quân Đội</option>
                                    <option value="VNPTMONEY">VNPT Money</option>
                                    <option value="SGICB">Ngân hàng TMCP Sài Gòn Công Thương</option>
                                    <option value="BAB">Ngân hàng TMCP Bắc Á</option>
                                    <option value="PVCB">Ngân hàng TMCP Đại Chúng Việt Nam</option>
                                    <option value="Oceanbank">Ngân hàng Thương mại TNHH MTV Đại Dương</option>
                                    <option value="NCB">Ngân hàng TMCP Quốc Dân</option>
                                    <option value="SHBVN">Ngân hàng TNHH MTV Shinhan Việt Nam</option>
                                    <option value="ABB">Ngân hàng TMCP An Bình</option>
                                    <option value="VAB">Ngân hàng TMCP Việt Á</option>
                                    <option value="NAB">Ngân hàng TMCP Nam Á</option>
                                    <option value="PGB">Ngân hàng TMCP Xăng dầu Petrolimex</option>
                                    <option value="VIETBANK">Ngân hàng TMCP Việt Nam Thương Tín</option>
                                    <option value="BVB">Ngân hàng TMCP Bảo Việt</option>
                                    <option value="SEAB">Ngân hàng TMCP Đông Nam Á</option>
                                    <option value="COOPBANK">Ngân hàng Hợp tác xã Việt Nam</option>
                                    <option value="LPB">Ngân hàng TMCP Lộc Phát Việt Nam</option>
                                    <option value="KLB">Ngân hàng TMCP Kiên Long</option>
                                    <option value="KBank">Ngân hàng Đại chúng TNHH Kasikornbank</option>
                                    <option value="KBHN">Ngân hàng Kookmin - Chi nhánh Hà Nội</option>
                                    <option value="KEBHANAHCM">Ngân hàng KEB Hana – Chi nhánh Thành phố Hồ Chí Minh</option>
                                    <option value="KEBHANAHN">Ngân hàng KEB Hana – Chi nhánh Hà Nội</option>
                                    <option value="MAFC">Công ty Tài chính TNHH MTV Mirae Asset (Việt Nam) </option>
                                    <option value="CITIBANK">Ngân hàng Citibank, N.A. - Chi nhánh Hà Nội</option>
                                    <option value="KBHCM">Ngân hàng Kookmin - Chi nhánh Thành phố Hồ Chí Minh</option>
                                    <option value="VBSP">Ngân hàng Chính sách Xã hội</option>
                                    <option value="WVN">Ngân hàng TNHH MTV Woori Việt Nam</option>
                                    <option value="VRB">Ngân hàng Liên doanh Việt - Nga</option>
                                    <option value="UOB">Ngân hàng United Overseas - Chi nhánh TP. Hồ Chí Minh</option>
                                    <option value="SCVN">Ngân hàng TNHH MTV Standard Chartered Bank Việt Nam</option>
                                    <option value="PBVN">Ngân hàng TNHH MTV Public Việt Nam</option>
                                    <option value="NHB HN">Ngân hàng Nonghyup - Chi nhánh Hà Nội</option>
                                    <option value="IVB">Ngân hàng TNHH Indovina</option>
                                    <option value="IBK - HCM">Ngân hàng Công nghiệp Hàn Quốc - Chi nhánh TP. Hồ Chí Minh</option>
                                    <option value="IBK - HN">Ngân hàng Công nghiệp Hàn Quốc - Chi nhánh Hà Nội</option>
                                    <option value="HSBC">Ngân hàng TNHH MTV HSBC (Việt Nam)</option>
                                    <option value="HLBVN">Ngân hàng TNHH MTV Hong Leong Việt Nam</option>
                                    <option value="GPB">Ngân hàng Thương mại TNHH MTV Dầu Khí Toàn Cầu</option>
                                    <option value="DOB">Ngân hàng TMCP Đông Á</option>
                                    <option value="DBS">DBS Bank Ltd - Chi nhánh Thành phố Hồ Chí Minh</option>
                                    <option value="CIMB">Ngân hàng TNHH MTV CIMB Việt Nam</option>
                                    <option value="CBB">Ngân hàng Thương mại TNHH MTV Xây dựng Việt Nam</option>
                                </datalist>
                            </div>
                    
                     <div class="mb-4" bis_skin_checked="1">
                        <label for="exampleInputEmail1">Chủ tài khoản</label>
                        <input type="text" class="form-control" id="ctk" value="<?=$check_bank['ctk'];?>" placeholder="Nhập chủ tài khoản" required="">
                     </div>
                     <div class="mb-4" bis_skin_checked="1">
                        <label for="exampleInputEmail1">Số tài khoản</label>
                        <input type="text" class="form-control" id="stk" value="<?=$check_bank['stk'];?>" placeholder="Nhập số tài khoản" required="">
                     </div>
                     <div class="mb-4" bis_skin_checked="1">
                        <label for="exampleInputEmail1">Trạng thái</label>
                        <select class="form-control" id="status">
                            <option value="hoatdong" <?= $check_bank['status'] == 'hoatdong' ? 'selected' : '' ?>>ON</option>
                            <option value="tamdung" <?= $check_bank['status'] == 'tamdung' ? 'selected' : '' ?>>OFF</option>
                        </select>
                    </div>
                     <div class="mb-4" bis_skin_checked="1">
                        <label for="exampleInputEmail1">Nạp tối thiểu</label>
                        <input type="text" class="form-control" id="min_nap" value="<?=$check_bank['min_nap'];?>" >
                     </div>
                     <div class="mb-4" bis_skin_checked="1">
                        <label for="exampleInputEmail1">Token</label>
                        <input type="text" class="form-control" id="token" value="" placeholder="Áp dụng khi cấu hình nạp tiền tự động.">
                     </div>
                     <a type="button" class="btn btn-hero btn-danger" href=""><i class="fa fa-fw fa-undo me-1"></i>
                     Quay lại</a>
                     <button id="btnSavebank" class="btn btn-hero btn-success"><i class="fa fa-fw fa-save me-1"></i> Cập Nhật</button>
                  </form>
                    <script>
                              $("#btnSavebank").on("click", function() {
                                    $('#btnSavebank').html(
                                        '<i class="fa fa-spinner fa-spin"></i> Đang xử lý...'
                                    ).prop('disabled',
                                        true);
                                   
                                    var myData = {
                                        action: 'UPDATE_BANK',
                                        id : <?=$id;?>,
                                        ngang_hang: $("#ngang_hang").val(),
                                        ctk: $("#ctk").val(),
                                        stk: $("#stk").val(),
                                        status: $("#status").val(),
                                        min_nap: $("#min_nap").val()
                                       
                                    };
                                    $.post("/admin/ajax/bank/xulybank.php", myData,
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
                                            $('#btnSavebank').html('Cập Nhật').prop(
                                                'disabled', false);
                                    }, "json");
                                });
                          </script>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php require_once('footer.php');?>
</body>
</html>