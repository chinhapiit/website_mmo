<?php require_once('header.php'); ?>
<?php require_once('run.php'); ?>

<?php
    // Lấy số lượng người dùng
    $users = $ketnoi->num_rows("SELECT * FROM `users`");
    // Lấy số lượng đơn hosting
    $hosting = $ketnoi->num_rows("SELECT * FROM `lich_su_mua_hang`");
    // Lấy tổng doanh thu
    $doanhthu = $ketnoi->get_row("SELECT SUM(`gia`) AS total FROM `lich_su_mua_hang`")['total'];
?>

<div id="loader">
    <img src="/public/theme/assets/images/media/loader.svg" alt="Loading...">
</div>

<div class="page">
    <?php require_once('nav.php'); ?>
    <?php require_once('sidebar.php'); ?>

    <div class="main-content app-content">
        <div class="container-fluid">
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-name fw-semibold fs-18 mb-0">
                    <i class="fa-solid fa-layer-group"></i> Chuyên mục sản phẩm
                </h1>
            </div>

            <div class="row">
                <!-- FORM THÊM CHUYÊN MỤC CHA -->
                <form id="addParentCategoryForm" action="" method="POST" enctype="multipart/form-data" class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header justify-content-between">
                            <div class="card-title">
                                TẠO CHUYÊN MỤC CHA
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Tên chuyên mục cha -->
                            <div class="row mb-3 align-items-center">
                                <label class="col-md-3 col-form-label" for="addParent_title">
                                    Tên chuyên mục cha: <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-9">
                                    <input 
                                        type="text"
                                        class="form-control"
                                        name="title"
                                        id="addParent_title"
                                        placeholder="Nhập tên chuyên mục"
                                        required
                                    >
                                </div>
                            </div>

                            <!-- Icon -->
                            <div class="row mb-3 align-items-center">
                                <label class="col-md-3 col-form-label" for="addParent_img">
                                    Icon: <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-9">
                                    <input 
                                        type="file"
                                        class="form-control"
                                        name="img"
                                        id="addParent_img"
                                        accept="image/*"
                                        required
                                    >
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="row mb-3 align-items-center">
                                <label class="col-md-3 col-form-label" for="addParent_status">
                                    Status: <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-9">
                                    <select class="form-select" name="status" id="addParent_status" required>
                                        <option value="hoatdong">ON</option>
                                        <option value="tamdung">OFF</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Nút Submit -->
                            <div class="d-flex justify-content-end">
                                <button type="submit" name="submit" id="submitAddParent" class="btn btn-primary">
                                    <i class="fa fa-fw fa-plus me-1"></i> Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- DANH SÁCH CHUYÊN MỤC SẢN PHẨM -->
                <div class="col-xl-12">
                    <div class="card custom-card mb-4">
                        <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                            <h4 class="card-title mb-2 mb-md-0">DANH SÁCH CHUYÊN MỤC SẢN PHẨM</h4>
                            <div class="d-flex flex-wrap">
                                <button 
                                    type="button"
                                    id="createChildCategoryBtn"
                                    class="btn btn-sm btn-primary mb-2 mb-md-0 me-md-2" >
                                    <i class="fa fa-plus me-1"></i> Tạo chuyên mục con
                                </button>
                                <button 
                                    type="button"
                                    id="editParentCategoryBtn"
                                    class="btn btn-sm btn-info mb-2 mb-md-0 me-md-2">
                                    <i class="fa fa-pencil-alt me-1"></i> Chỉnh sửa chuyên mục cha
                                </button>
                                <button 
                                    type="button"
                                    id="removeParentCategoryBtn"
                                    class="btn btn-sm btn-danger mb-2 mb-md-0"
                                    disabled>
                                    <i class="fas fa-trash me-1"></i> Xóa chuyên mục cha
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="custom-card mb-4">
                        <div class="card-body">
                            <style> 
                                .active-card {
                                    background-color: #cce5ff;
                                    border: 1px solid #007bff;
                                }
                            </style>

                            <!-- NAV hiển thị danh sách danh mục cha (Bootstrap 5) -->
                            <nav class="nav" role="tablist">
                                <div class="row w-100">
                                    <?php
                                    // Truy vấn lấy danh sách danh mục cha
                                    $query = "SELECT * FROM `danh_muc_sp` ORDER BY `id` ASC";
                                    $danhsach_dm_sp = $ketnoi->get_list($query);

                                    if ($danhsach_dm_sp && count($danhsach_dm_sp) > 0):
                                        foreach($danhsach_dm_sp as $list_dm_sp):
                                            $id     = htmlspecialchars($list_dm_sp['id']);
                                            $title  = htmlspecialchars($list_dm_sp['title']);
                                            $img    = htmlspecialchars($list_dm_sp['img']);
                                            $status = htmlspecialchars($list_dm_sp['status']);
                                    ?>
                                    <div class="col-6 col-md-3 mb-4">
                                        <div class="card shadow-sm text-center h-100">
                                            <!-- Link chuyển tab và gắn dữ liệu để xử lý -->
                                            <a
                                                href="javascript:void(0);"
                                                class="text-decoration-none text-dark d-flex flex-column align-items-center justify-content-center h-100 p-3 category-link"
                                                role="tab"
                                                aria-selected="false"
                                                onclick="showCategoryInfo('<?php echo $id; ?>')"

                                                data-id="<?php echo $id; ?>"
                                                data-title="<?php echo $title; ?>"
                                                data-img="<?php echo $img; ?>"
                                                data-status="<?php echo $status; ?>"
                                            >
                                                <img
                                                    src="<?php echo $img; ?>"
                                                    class="mb-3"
                                                    width="60"
                                                    height="60"
                                                    alt="<?php echo $title; ?>"
                                                >
                                                <h5 class="card-title">
                                                    <?php echo $title; ?>
                                                </h5>
                                            </a>
                                        </div>
                                    </div>
                                    <?php 
                                        endforeach; 
                                    else: ?>
                                    <div class="col-12">
                                        <p class="text-center">Không có danh mục sản phẩm nào để hiển thị.</p>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </nav>                            
                        </div>
                    </div>

                    <!-- KHU VỰC FORM EDIT VÀ REMOVE -->
                    <div class="row">
                        <div class="tab-content w-100">

                            <div class="row w-100">
                                <!-- Form Thêm Chuyên Mục Con -->
                                <form 
                                    id="addChildCategoryForm"
                                    action=""
                                    method="POST"
                                    enctype="multipart/form-data"
                                    class="col-xl-12 mb-4 mt-3 d-none">
                                    <div class="card custom-card">
                                        <div class="card-header justify-content-between">
                                            <div class="card-title">
                                                TẠO CHUYÊN MỤC CON
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <!-- Chuyên mục cha -->
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-md-3 col-form-label" for="addChild_id_dm">
                                                    Chuyên mục cha: <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <select class="form-select" name="id_dm" id="addChild_id_dm" required>
                                                        <option value="">-- Chọn chuyên mục cha --</option>
                                                        <?php
                                                        if ($danhsach_dm_sp && count($danhsach_dm_sp) > 0):
                                                            foreach($danhsach_dm_sp as $list_dm_sp):
                                                                $id = htmlspecialchars($list_dm_sp['id']);
                                                                $title = htmlspecialchars($list_dm_sp['title']);
                                                        ?>
                                                            <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                                        <?php
                                                            endforeach;
                                                        else:
                                                        ?>
                                                            <option value="">Không có danh mục cha để chọn</option>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Tên chuyên mục con -->
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-md-3 col-form-label" for="addChild_title">
                                                    Tên chuyên mục con: <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input 
                                                        type="text"
                                                        class="form-control"
                                                        name="title" 
                                                        id="addChild_title"
                                                        placeholder="Nhập tên chuyên mục con"
                                                        required
                                                    >
                                                </div>
                                            </div>

                                            <!-- Giá -->
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-md-3 col-form-label" for="addChild_price">
                                                    Giá: <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input 
                                                        type="number"
                                                        class="form-control"
                                                        name="price" 
                                                        id="addChild_price"
                                                        placeholder="Nhập giá sản phẩm"
                                                        required
                                                        min="0"
                                                        step="0.5"
                                                    >
                                                </div>
                                            </div>

                                            <!-- Description SEO -->
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-sm-3 col-form-label" for="addChild_tt_sp">
                                                    UID | PASS OR URL:<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea 
                                                        class="form-control" 
                                                        rows="3" 
                                                        name="tt_sp"
                                                        id="addChild_tt_sp" 
                                                        placeholder="Nhập mô tả UID | PASS OR URL"
                                                        required
                                                    ></textarea>
                                                </div>
                                            </div>

                                            <!-- Thông tin sản phẩm -->
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-md-3 col-form-label" for="addChild_list_gt">
                                                    Nhập thông tin sản phẩm: <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                   <textarea 
                                                        type="text"
                                                        class="form-control"
                                                        name="list_gt"
                                                        id="addChild_list_gt"
                                                        placeholder="Thông tin sản phẩm"
                                                        required
                                                    ></textarea>
                                                </div>
                                            </div>

                                            <!-- Người bán -->
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-md-3 col-form-label" for="addChild_ng_ban">
                                                    Người bán: <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input 
                                                        type="text"
                                                        class="form-control"
                                                        name="ng_ban" 
                                                        id="addChild_ng_ban"
                                                        placeholder="Nhập thông tin người bán"
                                                        required
                                                    >
                                                </div>
                                            </div>

                                            <!-- Quốc gia -->
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-md-3 col-form-label" for="addChild_quoc_gia">
                                                    Nhập quốc gia: <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input 
                                                        type="text"
                                                        class="form-control"
                                                        name="quoc_gia" 
                                                        id="addChild_quoc_gia"
                                                        placeholder="Nhập tên quốc gia bán"
                                                        required
                                                    >
                                                </div>
                                            </div>

                                            <!-- Status -->
                                           <div class="row mb-3 align-items-center">
                                                <label class="col-md-3 col-form-label" for="addChild_status">
                                                    Loại sản phẩm: <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <select class="form-select" name="status" id="addChild_status" required>
                                                        <option value="">--Vui Lòng Chọn Loại--</option>
                                                        <option value="tool">Tool , CODE</option>
                                                        <option value="via">Clone , via ....</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3 align-items-center d-none" id="toolInputs">
                                                <label class="col-md-3 col-form-label">URL Ảnh:</label>
                                                <div class="col-md-9 mb-2">
                                                    <input type="text" class="form-control" name="img_url" placeholder="Nhập URL ảnh">
                                                </div>
                                                <label class="col-md-3 col-form-label">Danh sách ảnh:</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" name="img_list" rows="3" placeholder="Nhập danh sách URL ảnh (mỗi dòng 1 ảnh)"></textarea>
                                                </div>
                                            </div>

                                            <div class="row mb-3 align-items-center">
                                                <label class="col-md-3 col-form-label" for="addChild_status">
                                                    Status: <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <select class="form-select" name="status" id="addChild_status" required>
                                                        <option value="hoatdong">ON</option>
                                                        <option value="tamdung">OFF</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Nút Save & Cancel -->
                                            <div class="d-flex justify-content-end">
                                                <button 
                                                    type="submit"
                                                    name="submit"
                                                    id="submitAddChild"
                                                    class="btn btn-primary me-2"
                                                >
                                                    <i class="fa fa-fw fa-save me-1"></i> Save
                                                </button>
                                                <button 
                                                    type="button"
                                                    id="cancelAddChild"
                                                    class="btn btn-secondary"
                                                >
                                                    <i class="fa-solid fa-ban me-1"></i> Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <!-- Form Sửa Chuyên Mục Cha -->
                                <form 
                                    id="editParentCategoryForm"
                                    action=""
                                    method="POST"
                                    enctype="multipart/form-data"
                                    class="col-xl-12 mb-4 mt-3 d-none">
                                    <div class="card custom-card">
                                        <div class="card-header justify-content-between">
                                            <div class="card-title">
                                                SỬA CHUYÊN MỤC CHA
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <!-- Trường ẩn để lưu ID -->
                                            <input type="hidden" name="id" id="editParent_id">

                                            <!-- Tên chuyên mục cha -->
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-md-3 col-form-label" for="editParent_title">
                                                    Tên chuyên mục cha: <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input 
                                                        type="text"
                                                        class="form-control"
                                                        name="title"
                                                        id="editParent_title"
                                                        placeholder="Nhập tên chuyên mục"
                                                        required
                                                    >
                                                </div>
                                            </div>

                                            <!-- Icon (file) -->
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-md-3 col-form-label" for="editParent_img">
                                                    Icon: <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input 
                                                        type="file"
                                                        class="form-control"
                                                        name="img"
                                                        id="editParent_img"
                                                        accept="image/*"
                                                    >
                                                    <input type="hidden" name="current_img" id="editParent_current_img">
                                                </div>
                                            </div>

                                            <!-- Status -->
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-md-3 col-form-label" for="editParent_status">
                                                    Status: <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <select class="form-select" name="status" id="editParent_status" required>
                                                        <option value="hoatdong">ON</option>
                                                        <option value="tamdung">OFF</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Nút Save & Cancel -->
                                            <div class="d-flex justify-content-end">
                                                <button 
                                                    type="submit"
                                                    name="submit"
                                                    id="submitEditParent"
                                                    class="btn btn-success me-2"
                                                >
                                                    <i class="fa-solid fa-pen-to-square me-1"></i> Update
                                                </button>
                                                <button 
                                                    type="button"
                                                    id="cancelEditParent"
                                                    class="btn btn-secondary"
                                                >
                                                    <i class="fa-solid fa-ban me-1"></i> Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <!-- Bảng Danh Mục Con -->
                                <div class="table-responsive mb-3" style="display: none;">
                                    <?php
                                        // Truy vấn lấy danh sách danh mục con
                                        $query = "SELECT * FROM `list_san_pham` ORDER BY `id` ASC";
                                        $danhsach_list_sp = $ketnoi->get_list($query);

                                        if ($danhsach_list_sp && count($danhsach_list_sp) > 0):
                                    ?>
                                    <table class="table table-striped table-hover table-bordered text-center">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Tên chuyên mục con</th>
                                                <th>Thống kê</th>
                                                <th>Ảnh</th>
                                                <th>Trạng thái</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach($danhsach_list_sp as $list_list_sp):
                                                $id         = htmlspecialchars($list_list_sp['id']);
                                                $title      = htmlspecialchars($list_list_sp['title']);
                                                $price      = htmlspecialchars($list_list_sp['price']);
                                                $tt_sp      = htmlspecialchars($list_list_sp['tt_sp']);
                                                $list_gt    = htmlspecialchars($list_list_sp['list_gt']);
                                                $ng_ban     = htmlspecialchars($list_list_sp['ng_ban']);
                                                $quoc_gia   = htmlspecialchars($list_list_sp['quoc_gia']);
                                                $status     = htmlspecialchars($list_list_sp['status']);
                                            
                                                // Lấy ID cha
    $id_dm      = $list_list_sp['id_dm'];
    $list_dm    = $ketnoi->get_row("SELECT * FROM `danh_muc_sp` WHERE `id` = '$id_dm'");
    
    // Kiểm tra nếu $list_dm là mảng hợp lệ
    if ($list_dm && is_array($list_dm)) {
        $ten_danh_muc = htmlspecialchars($list_dm['title'], ENT_QUOTES);
        $img_danh_muc = htmlspecialchars($list_dm['img'], ENT_QUOTES);
    } else {
        // Gán giá trị mặc định hoặc thông báo lỗi
        $ten_danh_muc = 'Không xác định';
        $img_danh_muc = '/path/to/default/image.png'; // Đường dẫn đến ảnh mặc định
    }
                                            ?>
                                            <!-- Gắn data-id-dm để lọc -->
                                            <tr data-id-dm="<?php echo $id_dm; ?>">
                                                <td><?php echo $title; ?></td>
                                                <td>
                                                    <?php 
                                                        // Đếm số sản phẩm dựa trên chuỗi tách
                                                        $items = preg_split('/\s+/', trim($tt_sp));
                                                        $count = count($items); 
                                                    ?>
                                                    <span class="badge bg-outline-primary">
                                                        Sản phẩm: <?php echo $count; ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <!-- Ảnh của danh mục cha -->
                                                    <img src="<?php echo htmlspecialchars($list_dm['img']); ?>" width="40px" alt="<?php echo htmlspecialchars($list_dm['title']); ?>">
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch form-check-lg d-flex justify-content-center align-items-center">
                                                        <input 
                                                            class="form-check-input" 
                                                            type="checkbox" 
                                                            id="status<?php echo $id; ?>" 
                                                            value="1" 
                                                            <?php echo ($status === 'hoatdong') ? 'checked' : ''; ?>
                                                        >
                                                    </div>
                                                </td>
                                                <td>
                                                    <button 
                                                        type="button"
                                                        class="btn btn-sm btn-info me-md-2 editChildCategoryBtn"
                                                        data-bs-target="#editCategoryModal"
                                                        data-id="<?php echo $id; ?>"
                                                        data-title="<?php echo htmlspecialchars($title, ENT_QUOTES); ?>"
                                                        data-tt_sp="<?php echo htmlspecialchars($tt_sp, ENT_QUOTES); ?>"
                                                        data-status="<?php echo htmlspecialchars($status, ENT_QUOTES); ?>"
                                                        data-id_dm="<?php echo htmlspecialchars($id_dm, ENT_QUOTES); ?>" 
                                                        data-price="<?php echo htmlspecialchars($price, ENT_QUOTES); ?>" 
                                                        data-list_gt="<?php echo htmlspecialchars($list_gt, ENT_QUOTES); ?>" 
                                                        data-ng_ban="<?php echo htmlspecialchars($ng_ban, ENT_QUOTES); ?>" 
                                                        data-quoc_gia="<?php echo htmlspecialchars($quoc_gia, ENT_QUOTES); ?>" 
                                                        data-ten-dm="<?php echo $ten_danh_muc; ?>" >
                                                        <i class="fa fa-pencil-alt me-1"></i> Edit sản phẩm
                                                    </button>

                                                    <button 
                                                        type="button"
                                                        class="btn btn-sm btn-danger removeChildCategoryBtn"
                                                        data-id="<?php echo $id; ?>">
                                                        <i class="fas fa-trash me-1"></i> Xóa sản phẩm
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <?php else: ?>
                                        <div class="col-12">
                                            <p class="text-center">Không có danh mục sản phẩm nào để hiển thị.</p>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Form Sửa Chuyên Mục Con -->
                                <form 
                                    id="editChildCategoryForm"
                                    method="POST"
                                    enctype="multipart/form-data"
                                    class="col-xl-12 mb-4 mt-3 d-none">
                                    <div class="card custom-card">
                                        <div class="card-header justify-content-between">
                                            <div class="card-title">
                                                SỬA CHUYÊN MỤC CON
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <!-- Trường ẩn để lưu ID sản phẩm -->
                                            <input type="hidden" name="id" id="editChild_id">

                                            <!-- Chuyên mục cha -->
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-md-3 col-form-label" for="editChild_id_dm">
                                                    Chuyên mục cha: <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <select class="form-select" name="id_dm" id="editChild_id_dm" required>
                                                        <option value="">-- Chọn chuyên mục cha --</option>
                                                        <?php
                                                        if ($danhsach_dm_sp && count($danhsach_dm_sp) > 0):
                                                            foreach($danhsach_dm_sp as $list_dm_sp):
                                                                $dm_id = htmlspecialchars($list_dm_sp['id']);
                                                                $dm_title = htmlspecialchars($list_dm_sp['title']);
                                                        ?>
                                                            <option value="<?php echo $dm_id; ?>"><?php echo $dm_title; ?></option>
                                                        <?php
                                                            endforeach;
                                                        else:
                                                        ?>
                                                            <option value="">Không có danh mục cha để chọn</option>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Tên chuyên mục con -->
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-md-3 col-form-label" for="editChild_title">
                                                    Tên chuyên mục con: <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input 
                                                        type="text"
                                                        class="form-control"
                                                        name="title" 
                                                        id="editChild_title"
                                                        placeholder="Nhập tên chuyên mục con"
                                                        required
                                                    >
                                                </div>
                                            </div>

                                            <!-- Giá -->
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-md-3 col-form-label" for="editChild_price">
                                                    Giá: <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input 
                                                        type="number"
                                                        class="form-control"
                                                        name="price" 
                                                        id="editChild_price"
                                                        placeholder="Nhập giá sản phẩm"
                                                        required
                                                        min="0"
                                                        step="0.5"
                                                    >
                                                </div>
                                            </div>

                                            <!-- Description SEO -->
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-sm-3 col-form-label" for="editChild_tt_sp">
                                                    Description SEO:<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea 
                                                        class="form-control" 
                                                        rows="3" 
                                                        name="tt_sp"
                                                        id="editChild_tt_sp" 
                                                        placeholder="Nhập mô tả SEO"
                                                        required
                                                    ></textarea>
                                                </div>
                                            </div>

                                            <!-- Thông tin sản phẩm -->
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-md-3 col-form-label" for="editChild_list_gt">
                                                    Nhập thông tin sản phẩm: <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input 
                                                        type="text"
                                                        class="form-control"
                                                        name="list_gt"
                                                        id="editChild_list_gt"
                                                        placeholder="Thông tin sản phẩm"
                                                        required
                                                    >
                                                </div>
                                            </div>

                                            <!-- Người bán -->
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-md-3 col-form-label" for="editChild_ng_ban">
                                                    Người bán: <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input 
                                                        type="text"
                                                        class="form-control"
                                                        name="ng_ban" 
                                                        id="editChild_ng_ban"
                                                        placeholder="Nhập thông tin người bán"
                                                        required
                                                    >
                                                </div>
                                            </div>

                                            <!-- Quốc gia -->
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-md-3 col-form-label" for="editChild_quoc_gia">
                                                    Nhập quốc gia: <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input 
                                                        type="text"
                                                        class="form-control"
                                                        name="quoc_gia" 
                                                        id="editChild_quoc_gia"
                                                        placeholder="Nhập tên quốc gia bán"
                                                        required
                                                    >
                                                </div>
                                            </div>

                                            <!-- Status -->
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-md-3 col-form-label" for="editChild_status">
                                                    Status: <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <select class="form-select" name="status" id="editChild_status" required>
                                                        <option value="hoatdong">ON</option>
                                                        <option value="tamdung">OFF</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Nút Save & Cancel -->
                                            <div class="d-flex justify-content-end">
                                                <button 
                                                    type="submit"
                                                    name="submit"
                                                    id="submitEditChild"
                                                    class="btn btn-primary me-2"
                                                >
                                                    <i class="fa fa-fw fa-save me-1"></i> Save
                                                </button>
                                                <button 
                                                    type="button"
                                                    id="cancelEditChild"
                                                    class="btn btn-secondary"
                                                >
                                                    <i class="fa-solid fa-ban me-1"></i> Cancel
                                                </button>
                                            </div>
                                        </div>
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

<script>
    // Hàm để hiển thị thông tin và lọc danh mục con dựa trên id cha
    function showCategoryInfo(parentId) {
        // Đánh dấu danh mục cha đã chọn
        document.querySelectorAll('.category-link').forEach(function(link) {
            if (link.dataset.id === parentId) {
                link.classList.add('active-card');
                link.setAttribute('aria-selected', 'true');
            } else {
                link.classList.remove('active-card');
                link.setAttribute('aria-selected', 'false');
            }
        });

        // Hiển thị bảng danh mục con
        const tableContainer = document.querySelector('.table-responsive.mb-3');
        if (tableContainer) {
            tableContainer.style.display = 'block';
        }

        // Lọc các danh mục con dựa trên id_dm
        const tableRows = document.querySelectorAll('.table-responsive tbody tr');
        tableRows.forEach(function(row) {
            if (row.dataset.idDm === parentId) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });

        // Hiển thị ID cha đã chọn (tuỳ chọn)
        const displayDiv = document.getElementById('selected-parent-id');
        if (displayDiv) {
            displayDiv.textContent = `ID Cha: ${parentId}`;
        }
    }

    // Hàm để hiển thị tất cả các danh mục con
    function showAllCategories() {
        // Bỏ đánh dấu tất cả danh mục cha
        document.querySelectorAll('.category-link').forEach(function(link) {
            link.classList.remove('active-card');
            link.setAttribute('aria-selected', 'false');
        });

        // Hiển thị bảng danh mục con
        const tableContainer = document.querySelector('.table-responsive.mb-3');
        if (tableContainer) {
            tableContainer.style.display = 'block';
        }

        // Hiển thị tất cả các dòng trong bảng danh mục con
        const tableRows = document.querySelectorAll('.table-responsive tbody tr');
        tableRows.forEach(function(row) {
            row.style.display = '';
        });

        // Cập nhật hiển thị ID cha đã chọn
        const displayDiv = document.getElementById('selected-parent-id');
        if (displayDiv) {
            displayDiv.textContent = 'Tất cả danh mục cha';
        }
    }

    // Hàm để ẩn bảng danh mục con
    function hideAllCategories() {
        const tableContainer = document.querySelector('.table-responsive.mb-3');
        if (tableContainer) {
            tableContainer.style.display = 'none';
        }

        // Cập nhật hiển thị ID cha đã chọn
        const displayDiv = document.getElementById('selected-parent-id');
        if (displayDiv) {
            displayDiv.textContent = 'Không có danh mục cha nào được chọn';
        }
    }

    // Tự động ẩn bảng danh mục con khi trang được tải
    document.addEventListener('DOMContentLoaded', function() {
        hideAllCategories();

        // Lấy các phần tử cần thiết
        const editButtons = document.querySelectorAll('.editChildCategoryBtn');
        const editForm = document.getElementById('editChildCategoryForm');
        const cancelEditChildBtn = document.getElementById('cancelEditChild');

        // Xử lý sự kiện click trên các nút Edit sản phẩm
        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Lấy dữ liệu từ các thuộc tính data-*
                const id = this.getAttribute('data-id');
                const title = this.getAttribute('data-title');
                const tt_sp = this.getAttribute('data-tt_sp');
                const status = this.getAttribute('data-status');
                const id_dm = this.getAttribute('data-id_dm');
                const price = this.getAttribute('data-price');
                const list_gt = this.getAttribute('data-list_gt');
                const ng_ban = this.getAttribute('data-ng_ban');
                const quoc_gia = this.getAttribute('data-quoc_gia');
                const ten_dm = this.getAttribute('data-ten-dm');

                // Đổ dữ liệu vào form
                document.getElementById('editChild_id').value = id;
                document.getElementById('editChild_id_dm').value = id_dm;
                document.getElementById('editChild_title').value = title;
                document.getElementById('editChild_price').value = price;
                document.getElementById('editChild_tt_sp').value = tt_sp;
                document.getElementById('editChild_list_gt').value = list_gt;
                document.getElementById('editChild_ng_ban').value = ng_ban;
                document.getElementById('editChild_quoc_gia').value = quoc_gia;
                document.getElementById('editChild_status').value = status;

                // Hiển thị form bằng cách loại bỏ lớp d-none
                editForm.classList.remove('d-none');

                // Cuộn tới form một cách mượt mà
                editForm.scrollIntoView({ behavior: 'smooth' });
            });
        });

        // Xử lý nút Cancel để ẩn form
        if (cancelEditChildBtn) {
            cancelEditChildBtn.addEventListener('click', function() {
                // Ẩn form bằng cách thêm lớp d-none
                editForm.classList.add('d-none');

                // Đặt lại form
                editForm.reset();
            });
        }

        // Xử lý form submission cho Sửa Chuyên Mục Con
        const editChildrenForm = document.getElementById('editChildCategoryForm');

        editChildrenForm.addEventListener('submit', function(e) {
            e.preventDefault(); // Ngăn chặn hành vi submit mặc định

            const formData = new FormData(editChildrenForm);
            formData.append('action', 'update_cmCon');

            const submitButton = document.getElementById('submitEditChild'); // Sửa ID đúng

            // Đổi nội dung nút submit -> trạng thái loading
            submitButton.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Đang xử lý...';
            submitButton.disabled = true;

            fetch('/admin/ajax/Category/category_children.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(result => {
                if (result.status === '2') {
                    // Thành công
                    Swal.fire({
                        title: "Thành Công",
                        icon: "success",
                        text: result.msg,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(() => {
                        editChildrenForm.reset();
                        editForm.classList.add('d-none'); // Ẩn form sau khi thành công
                        window.location.reload();
                    });
                } else {
                    // Lỗi từ server
                    Swal.fire({
                        title: "Lỗi",
                        icon: "error",
                        text: result.msg,
                        confirmButtonText: "Đóng",
                        customClass: {
                            confirmButton: "btn btn-danger"
                        }
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    title: "Lỗi",
                    icon: "error",
                    text: 'Đã xảy ra lỗi khi gửi dữ liệu.',
                    confirmButtonText: "Đóng",
                    customClass: {
                        confirmButton: "btn btn-danger"
                    }
                });
            })
            .finally(() => {
                submitButton.innerHTML = '<i class="fa-solid fa-pen-to-square me-1"></i> Update';
                submitButton.disabled = false;
            });
        });

        // Xử lý nút Xóa chuyên mục con
        document.querySelectorAll('.removeChildCategoryBtn').forEach(function(button) {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                // Thực hiện hành động xóa với id này
                Swal.fire({
                    title: 'Bạn có chắc chắn muốn xóa?',
                    text: "Dữ liệu sẽ bị xóa vĩnh viễn.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Xóa',
                    cancelButtonText: 'Hủy',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Gửi yêu cầu AJAX POST để xóa sản phẩm
                        fetch("/admin/ajax/Category/category_children.php", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: new URLSearchParams({
                                id: id,
                                action: 'remove_cmCon' // Đảm bảo action này xử lý xóa sản phẩm
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === '2') {
                                Swal.fire({
                                    title: "Thành công",
                                    icon: "success",
                                    text: data.msg,
                                    confirmButtonText: "OK"
                                }).then(() => {
                                    // Tải lại trang
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: "Thất bại",
                                    icon: "error",
                                    text: data.msg,
                                    confirmButtonText: "Thử lại"
                                });
                            }
                        })
                        .catch(() => {
                            Swal.fire({
                                title: "Lỗi",
                                icon: "error",
                                text: "Đã xảy ra lỗi khi xử lý yêu cầu.",
                                confirmButtonText: "OK"
                            });
                        });
                    }
                });
            });
        });

        // Thêm xử lý thay đổi trạng thái ON/OFF
        const statusCheckboxes = document.querySelectorAll('input.form-check-input[type="checkbox"][id^="status"]');

        statusCheckboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                const checkboxId = this.id; 
                const id = checkboxId.replace('status', ''); 
                const newStatus = this.checked ? 'hoatdong' : 'tamdung';

                // Xác nhận thay đổi trạng thái
                Swal.fire({
                    title: 'Xác nhận',
                    text: `Bạn có chắc chắn muốn chuyển trạng thái sản phẩm này thành ${newStatus === '1' ? 'ON' : 'OFF'}?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Đồng ý',
                    cancelButtonText: 'Hủy',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Gửi yêu cầu AJAX để cập nhật trạng thái
                        fetch('/admin/ajax/Category/category_children.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: new URLSearchParams({
                                id: id,
                                status: newStatus,
                                action: 'update_status'
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === '2') {
                                Swal.fire({
                                    title: "Thành Công",
                                    icon: "success",
                                    text: data.msg || 'Cập nhật trạng thái thành công.',
                                    confirmButtonText: "OK",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                }).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: "Lỗi",
                                    icon: "error",
                                    text: data.msg || 'Cập nhật trạng thái thất bại.',
                                    confirmButtonText: "Đóng",
                                    customClass: {
                                        confirmButton: "btn btn-danger"
                                    }
                                });
                                // Revert checkbox state
                                this.checked = !this.checked;
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire({
                                title: "Lỗi",
                                icon: "error",
                                text: 'Đã xảy ra lỗi khi cập nhật trạng thái.',
                                confirmButtonText: "Đóng",
                                customClass: {
                                    confirmButton: "btn btn-danger"
                                }
                            });
                            // Revert checkbox state
                            this.checked = !this.checked;
                        });
                    } else {
                        // Nếu người dùng hủy, revert trạng thái checkbox
                        this.checked = !this.checked;
                    }
                });
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Lấy các phần tử cần thiết
        const createBtn = document.getElementById('createChildCategoryBtn');
        const addChildForm = document.getElementById('addChildCategoryForm');
        const cancelAddChildBtn = document.getElementById('cancelAddChild');

        // Kiểm tra nếu nút "Tạo chuyên mục con" tồn tại
        if (createBtn) {
            createBtn.addEventListener('click', function() {
                // Toggle hiển thị form
                addChildForm.classList.toggle('d-none');

                // Nếu form hiện ra, cuộn tới form một cách mượt mà
                if (!addChildForm.classList.contains('d-none')) {
                    addChildForm.scrollIntoView({ behavior: 'smooth' });
                }

                // Thay đổi nội dung nút dựa trên trạng thái của form
                if (addChildForm.classList.contains('d-none')) {
                    createBtn.innerHTML = '<i class="fa fa-plus me-1"></i> Tạo chuyên mục con';
                } else {
                    createBtn.innerHTML = '<i class="fa fa-minus me-1"></i> Ẩn form tạo chuyên mục con';
                }
            });
        }

        // Kiểm tra nếu nút "Cancel" tồn tại
        if (cancelAddChildBtn) {
            cancelAddChildBtn.addEventListener('click', function() {
                // Ẩn form bằng cách thêm lại lớp d-none
                addChildForm.classList.add('d-none');

                // Đặt lại form
                addChildForm.reset();

                // Đặt lại nội dung nút tạo
                createBtn.innerHTML = '<i class="fa fa-plus me-1"></i> Tạo chuyên mục con';
            });
        }

        // Xử lý form submission cho Thêm Chuyên Mục Con
        addChildForm.addEventListener('submit', function(e) {
            e.preventDefault(); // Ngăn chặn hành vi submit mặc định

            const formData = new FormData(addChildForm);
            formData.append('action', 'add_cmCon');

            // Lấy nút submit
            const submitButton = document.getElementById('submitAddChild');
            submitButton.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Đang xử lý...';
            submitButton.disabled = true;

            fetch('/admin/ajax/Category/category_children.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(result => {
                if (result.status === '2') {
                    Swal.fire({
                        title: "Thành Công",
                        icon: "success",
                        text: result.msg,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(() => {
                        addChildForm.reset();
                        addChildForm.classList.add('d-none'); // Ẩn form sau khi thành công
                        createBtn.innerHTML = '<i class="fa fa-plus me-1"></i> Tạo chuyên mục con';
                        window.location.reload();
                    });
                } else {
                    Swal.fire({
                        title: "Lỗi",
                        icon: "error",
                        text: result.msg,
                        confirmButtonText: "Đóng",
                        customClass: {
                            confirmButton: "btn btn-danger"
                        }
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    title: "Lỗi",
                    icon: "error",
                    text: 'Đã xảy ra lỗi khi gửi dữ liệu.',
                    confirmButtonText: "Đóng",
                    customClass: {
                        confirmButton: "btn btn-danger"
                    }
                });
            })
            .finally(() => {
                submitButton.innerHTML = '<i class="fa fa-fw fa-save me-1"></i> Save'; // Sửa lại nội dung button
                submitButton.disabled = false;
            });
        });
    });

    /*******************************************************
     * (1) Submit FORM THÊM CHUYÊN MỤC CHA (addParentCategoryForm)
     *     - Gửi data qua AJAX bằng Fetch
     *     - Xử lý hiển thị trạng thái (loading, success, error)
     *******************************************************/
    document.getElementById('addParentCategoryForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Ngăn chặn hành vi submit mặc định

        const form = this;
        const formData = new FormData(form);
        formData.append('action', 'add_cmCha');

        const submitButton = document.getElementById('submitAddParent');
        submitButton.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Đang xử lý...';
        submitButton.disabled = true;

        fetch('/admin/ajax/Category/category_father.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(result => {
            if (result.status === '2') {
                Swal.fire({
                    title: "Thành Công",
                    icon: "success",
                    text: result.msg,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                }).then(() => {
                    form.reset();
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    title: "Lỗi",
                    icon: "error",
                    text: result.msg,
                    confirmButtonText: "Đóng",
                    customClass: {
                        confirmButton: "btn btn-danger"
                    }
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                title: "Lỗi",
                icon: "error",
                text: 'Đã xảy ra lỗi khi gửi dữ liệu.',
                confirmButtonText: "Đóng",
                customClass: {
                    confirmButton: "btn btn-danger"
                }
            });
        })
        .finally(() => {
            submitButton.innerHTML = '<i class="fa fa-fw fa-plus me-1"></i> Submit';
            submitButton.disabled = false;
        });
    });

    /*******************************************************
     * (2) FORM CHỈNH SỬA CHUYÊN MỤC CHA (editParentCategoryForm)
     *     - Hiển thị ẩn/hiện form
     *     - Đổ dữ liệu vào form khi click vào danh mục
     *     - Xử lý submit để cập nhật
     *******************************************************/
    document.addEventListener('DOMContentLoaded', function() {
        const editParentForm = document.getElementById('editParentCategoryForm');
        const editParentBtn  = document.getElementById('editParentCategoryBtn');
        const cancelEditParentBtn = document.getElementById('cancelEditParent');
        const previewImg       = document.getElementById('previewImg');

        // 2.1) Xử lý ẩn/hiện form bằng nút "Chỉnh sửa chuyên mục cha"
        // Thay vì dùng style.display
        editParentBtn.addEventListener('click', function() {
            if (editParentForm.classList.contains('d-none')) {
                editParentForm.classList.remove('d-none');
            } else {
                editParentForm.classList.add('d-none');
            }
        });


        // 2.2) Xử lý khi click "Cancel"
        cancelEditParentBtn.addEventListener('click', function() {
            editParentForm.style.display = 'none';
        });

        // 2.3) Xử lý click vào các danh mục (card) => đổ data vào form
        const categoryLinks = document.querySelectorAll('.nav .card a');
        categoryLinks.forEach((link) => {
            link.addEventListener('click', function(e) {
                // Xóa class 'active-card' ở tất cả các card
                categoryLinks.forEach(el => el.closest('.card').classList.remove('active-card'));
                // Thêm class 'active-card' cho card được click
                this.closest('.card').classList.add('active-card');

                // Lấy data-* attribute
                const id     = this.dataset.id;
                const title  = this.dataset.title;
                const img    = this.dataset.img;
                const status = this.dataset.status;

                // Đổ dữ liệu vào form
                document.getElementById('editParent_id').value     = id;
                document.getElementById('editParent_title').value  = title;
                document.getElementById('editParent_status').value = status;
                document.getElementById('editParent_current_img').value = img;

                // Hiển thị ảnh hiện tại (nếu có phần preview)
                // Nếu bạn có 1 <img id="previewImg"> để preview
                // thì bật cái này lên:
                if (previewImg) {
                    if (img) {
                        previewImg.src    = img;
                        previewImg.hidden = false;
                    } else {
                        previewImg.hidden = true;
                    }
                }
            });
        });

        // 2.4) Xử lý submit form "editParentCategoryForm" => Update
        editParentForm.addEventListener('submit', function(e) {
            e.preventDefault(); // Ngăn chặn hành vi submit mặc định

            const formData = new FormData(editParentForm);
            formData.append('action', 'update_cmCha');

            // Kiểm tra nếu người dùng không chọn ảnh mới
            const fileInput = document.getElementById('editParent_img');
            if (fileInput && fileInput.files.length === 0) {
                // Người dùng KHÔNG chọn file mới => xóa 'img' để không update
                formData.delete('img');
            }

            const submitButton = document.getElementById('submitEditParent');
            // Đổi nội dung nút submit -> trạng thái loading
            submitButton.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Đang xử lý...';
            submitButton.disabled = true;

            fetch('/admin/ajax/Category/category_father.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(result => {
                if (result.status === '2') {
                    // Thành công
                    Swal.fire({
                        title: "Thành Công",
                        icon: "success",
                        text: result.msg,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(() => {
                        editParentForm.reset();
                        editParentForm.style.display = 'none';
                        if (previewImg) {
                            previewImg.hidden = true;
                        }
                        window.location.reload();
                    });
                } else {
                    // Lỗi từ server
                    Swal.fire({
                        title: "Lỗi",
                        icon: "error",
                        text: result.msg,
                        confirmButtonText: "Đóng",
                        customClass: {
                            confirmButton: "btn btn-danger"
                        }
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    title: "Lỗi",
                    icon: "error",
                    text: 'Đã xảy ra lỗi khi gửi dữ liệu.',
                    confirmButtonText: "Đóng",
                    customClass: {
                        confirmButton: "btn btn-danger"
                    }
                });
            })
            .finally(() => {
                submitButton.innerHTML = '<i class="fa-solid fa-pen-to-square me-1"></i> Update';
                submitButton.disabled = false;
            });
        });
    });

    /*******************************************************
     * (3) KÍCH HOẠT NÚT "Chỉnh sửa chuyên mục cha"
     *     - Khi người dùng chọn 1 danh mục => nút Edit bật
     *******************************************************/
    document.addEventListener('DOMContentLoaded', function() {
        const editButton = document.getElementById('editParentCategoryBtn');
        const categoryLinks = document.querySelectorAll('nav.nav a.category-link');

        categoryLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                editButton.disabled = false;
            });
        });
    });

    /*******************************************************
     * (4) XÓA CHUYÊN MỤC CHA
     *     - Khi bấm nút Xóa => SweetAlert confirm => gửi AJAX
     *******************************************************/
    document.addEventListener('DOMContentLoaded', function() {
        // Chọn tất cả các liên kết danh mục
        const categoryLinks = document.querySelectorAll('.category-link');
        // Chọn nút Xóa
        const removeBtn = document.getElementById('removeParentCategoryBtn');

        // Biến lưu trữ ID của danh mục đã chọn
        let selectedCategoryId = null;

        // Khi click vào từng link danh mục => cập nhật ID vào nút removeBtn
        categoryLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Ngăn hành vi mặc định (chuyển tab)

                const parentId = this.getAttribute('data-id');
                if (!parentId) {
                    console.warn('Không tìm thấy data-id trên liên kết này.');
                    return;
                }
                selectedCategoryId = parentId;

                removeBtn.disabled = false;
                removeBtn.setAttribute('data-id', parentId);
            });
        });

        // Xử lý sự kiện click nút Xóa
        removeBtn.addEventListener('click', function(event) {
            event.preventDefault();

            const id = this.getAttribute('data-id');
            if (!id) {
                Swal.fire({
                    title: "Không có danh mục được chọn",
                    icon: "warning",
                    text: "Vui lòng chọn một danh mục trước khi xóa.",
                    confirmButtonText: "OK"
                });
                return;
            }

            // Hộp thoại xác nhận
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa?',
                text: "Dữ liệu sẽ bị xóa vĩnh viễn.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Xóa',
                cancelButtonText: 'Hủy',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Gửi yêu cầu AJAX POST để xóa
                    fetch("/admin/ajax/Category/category_father.php", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: new URLSearchParams({
                            id: id,
                            action: 'remove_cmCha'
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === '2') {
                            Swal.fire({
                                title: "Thành công",
                                icon: "success",
                                text: data.msg,
                                confirmButtonText: "OK"
                            }).then(() => {
                                // Tải lại trang
                                window.location.reload(); 
                            });
                        } else {
                            Swal.fire({
                                title: "Thất bại",
                                icon: "error",
                                text: data.msg,
                                confirmButtonText: "Thử lại"
                            });
                        }
                    })
                    .catch(() => {
                        Swal.fire({
                            title: "Lỗi",
                            icon: "error",
                            text: "Đã xảy ra lỗi khi xử lý yêu cầu.",
                            confirmButtonText: "OK"
                        });
                    });
                }
            });
        });
    });
</script>
<script>
    document.getElementById('addChild_status').addEventListener('change', function () {
        const toolInputs = document.getElementById('toolInputs');
        if (this.value === 'tool') {
            toolInputs.classList.remove('d-none');
        } else {
            toolInputs.classList.add('d-none');
        }
    });
</script>
<?php require_once('footer.php'); ?>
