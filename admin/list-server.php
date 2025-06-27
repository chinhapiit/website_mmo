<?php require_once('header.php');?>
<body>
   <!-- Start Switcher -->
   <?php require_once('run.php');?>
   <!-- End Switcher -->
   <!-- Loader -->
   <div id="loader">
      <img src="/public/theme/assets/images/media/loader.svg" alt="">
   </div>
   <!-- Loader -->
   <div class="page">
   <!-- app-header -->
   <?php require_once('nav.php');?>
   <?php require_once('sidebar.php');?>
   <!-- End::app-sidebar -->
   <div class="main-content app-content">
      <div class="container-fluid">
         <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Theme</h1>
            <div class="ms-md-1 ms-0">
               <nav>
                  <ol class="breadcrumb mb-0">
                     <li class="breadcrumb-item active" aria-current="page">Theme</li>
                  </ol>
               </nav>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-12" id="card-hide" style="display: block;">
               <div class="card custom-card">
                  <div class="card-body">
                     <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row mb-4">
                           <label class="col-sm-4 col-form-label" for="stt">Ưu tiên:</label>
                           <div class="col-sm-8">
                              <input type="text" class="form-control" value="0" name="stt" required="">
                              <small>Lưu ý: Ưu tiên càng cao, chuyên mục càng hiển thị trên cùng</small>
                           </div>
                        </div>
                        <div class="row mb-4">
                           <label class="col-sm-4 col-form-label" for="example-hf-email">Tên máy chủ:<span class="text-danger">*</span></label>
                           <div class="col-sm-8">
                              <input type="text" class="form-control" name="name" placeholder="Nhập tên chuyên mục" required="">
                           </div>
                        </div>
                        <div class="row mb-4" style="display: none;">
                           <label class="col-sm-4 col-form-label" for="example-hf-email">Chuyên mục cha:                                    <span class="text-danger">*</span></label>
                           <div class="col-sm-8">
                              <select class="form-control mb-2" name="parent_id" required="">
                                 <option value="0">-- Chuyên mục cha --</option>
                              </select>
                           </div>
                        </div>
                        <div class="row mb-4">
                           <label class="col-sm-4 col-form-label" for="example-hf-email">Icon: <span class="text-danger">*</span></label>
                           <div class="col-sm-8">
                              <input type="file" class="custom-file-input" name="icon" required="">
                           </div>
                        </div>
                        <div class="row mb-4">
                           <label class="col-sm-4 col-form-label" for="example-hf-email">Description SEO:</label>
                           <div class="col-sm-12">
                              <textarea class="form-control" rows="3" name="description"></textarea>
                           </div>
                        </div>
                        <div class="row mb-4">
                           <label class="col-sm-4 col-form-label" for="example-hf-email">Status: <span class="text-danger">*</span></label>
                           <div class="col-sm-8">
                              <select class="form-control" name="status" required="">
                                 <option value="1">ON</option>
                                 <option value="0">OFF</option>
                              </select>
                           </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus me-1"></i>
                        Submit</button>
                     </form>
                  </div>
               </div>
            </div>
            <div class="col-xl-12">
               <div class="card custom-card">
                  <div class="card-header justify-content-between">
                     <h4 class="card-title">LIST SERVER HOSTING</h4>
                  </div>
                  <div class="card-body">
                     <nav class="nav nav-pills mb-3 nav-justified d-sm-flex d-block" role="tablist">
                        <div class="row">
                           <div class="col-6 col-md-3 mb-2">
                              <a class="nav-link active text-center shadow-sm" data-bs-toggle="tab" role="tab" href="#tab-category-13" aria-selected="true">
                              <img src="https://i.imgur.com/HqFrdZF.png" class="me-2" width="25px">
                              Việt Nam</a>
                           </div>
                           <div class="col-6 col-md-3 mb-2">
                              <a class="nav-link  text-center shadow-sm" data-bs-toggle="tab" role="tab" href="#tab-category-12" aria-selected="false" tabindex="-1">
                              <img src="https://i.imgur.com/CPwtI0h.png" class="me-2" width="25px">
                              Hoa Kỳ</a>
                           </div>
                          
                           <div class="col-6 col-md-3 mb-2">
                              <a class="nav-link text-center shadow-sm border border-dark fs-6" id="open-card-hide" type="button" aria-selected="false" tabindex="-1" role="tab">
                              <i class="fa-solid fa-plus"></i> Tạo chuyên mục cha
                              </a>
                           </div>
                        </div>
                     </nav>
                     <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-category-13" role="tabpanel">
                           <div class="mb-3 text-right">
                              <a href="https://zshopclone7.cmsnt.net/?module=admin&amp;action=category-add&amp;id=13" class="btn btn-sm btn-primary me-2">
                              <i class="fa fa-plus"></i> Tạo gói hosting
                              </a>
                              <a href="https://zshopclone7.cmsnt.net/?module=admin&amp;action=category-add&amp;id=13" class="btn btn-sm btn-success me-2">
                              <i class="fa fa-plus"></i> Thêm dữ liệu vào server
                              </a>
                              <a href="https://zshopclone7.cmsnt.net/?module=admin&amp;action=category-edit&amp;id=13" class="btn btn-sm btn-info me-2">
                              <i class="fa fa-pencil-alt"></i> Chỉnh sửa server hosting
                              </a>
                              <a onclick="RemoveRow('13')" class="btn btn-sm btn-danger">
                              <i class="fas fa-trash"></i> Xóa hosting
                              </a>
                           </div>
                           <div class="table-responsive mb-3">
                              <table class="table table-striped table-hover table-bordered text-center">
                                 <thead class="thead-light">
                                    <tr>
                                       <th width="8%">Id</th>
                                       <th>Gói host</th>
                                       <th>Dung lượng</th>
                                       <th>Số lượng bán</th>
                                       <th>Trạng thái</th>
                                       <th>Thao tác</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr onchange="updateForm(`15`)">
                                       <td>
                                          <input id="stt15" class="form-control" type="number" value="1">
                                       </td>
                                       <td>VN_01</td>
                                      
                                       <td>
                                          <span class="badge bg-outline-primary">
                                          1000 Mb                                           </span>
                                       </td>
                                       <td>
                                          <span class="badge bg-outline-danger">
                                          25 lượt mua                                          </span>
                                       </td>
                                       <td>
                                          <div class="form-check form-switch form-check-lg">
                                             <input class="form-check-input" type="checkbox" id="status15" value="1" checked="">
                                          </div>
                                       </td>
                                       <td>
                                          <a href="https://zshopclone7.cmsnt.net/?module=admin&amp;action=category-edit&amp;id=15" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                          <i class="fa fa-pencil-alt"></i> Edit
                                          </a>
                                          <a onclick="RemoveRow('15')" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                          <i class="fas fa-trash"></i> Delete
                                          </a>
                                       </td>
                                    </tr>
                                    <tr onchange="updateForm(`16`)">
                                       <td>
                                          <input id="stt16" class="form-control" type="number" value="0">
                                       </td>
                                       <td>Via Facebook</td>
                                      
                                       <td>
                                          <span class="badge bg-outline-primary">
                                          Sản phẩm:
                                          7                                                    </span>
                                       </td>
                                       <td><img src="https://zshopclone7.cmsnt.net/assets/storage/images/iconBK3O.png" width="40px"></td>
                                       <td>
                                          <div class="form-check form-switch form-check-lg">
                                             <input class="form-check-input" type="checkbox" id="status16" value="1" checked="">
                                          </div>
                                       </td>
                                       <td>
                                          <a href="https://zshopclone7.cmsnt.net/?module=admin&amp;action=category-edit&amp;id=16" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                          <i class="fa fa-pencil-alt"></i> Edit
                                          </a>
                                          <a onclick="RemoveRow('16')" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                          <i class="fas fa-trash"></i> Delete
                                          </a>
                                       </td>
                                    </tr>
                                    <tr onchange="updateForm(`17`)">
                                       <td>
                                          <input id="stt17" class="form-control" type="number" value="0">
                                       </td>
                                       <td>BM</td>
                                    
                                       <td>
                                          <span class="badge bg-outline-primary">
                                          Sản phẩm:
                                          0                                                    </span>
                                       </td>
                                       <td><img src="https://zshopclone7.cmsnt.net/assets/storage/images/icon0O8Y.png" width="40px"></td>
                                       <td>
                                          <div class="form-check form-switch form-check-lg">
                                             <input class="form-check-input" type="checkbox" id="status17" value="1" checked="">
                                          </div>
                                       </td>
                                       <td>
                                          <a href="https://zshopclone7.cmsnt.net/?module=admin&amp;action=category-edit&amp;id=17" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                          <i class="fa fa-pencil-alt"></i> Edit
                                          </a>
                                          <a onclick="RemoveRow('17')" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                          <i class="fas fa-trash"></i> Delete
                                          </a>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        <div class="tab-pane fade " id="tab-category-12" role="tabpanel">
                           <div class="mb-3 text-right">
                              <a href="https://zshopclone7.cmsnt.net/?module=admin&amp;action=category-add&amp;id=12" class="btn btn-sm btn-primary me-2">
                              <i class="fa fa-plus"></i> Tạo chuyên mục con
                              </a>
                              <a href="https://zshopclone7.cmsnt.net/?module=admin&amp;action=category-edit&amp;id=12" class="btn btn-sm btn-info me-2">
                              <i class="fa fa-pencil-alt"></i> Chỉnh sửa chuyên mục cha
                              </a>
                              <a onclick="RemoveRow('12')" class="btn btn-sm btn-danger">
                              <i class="fas fa-trash"></i> Xóa chuyên mục cha
                              </a>
                           </div>
                           <div class="table-responsive mb-3">
                              <table class="table table-striped table-hover table-bordered text-center">
                                 <thead class="thead-light">
                                    <tr>
                                       <th width="8%">Ưu tiên</th>
                                       <th>Tên chuyên mục con</th>
                                       <th>Liên kết tĩnh</th>
                                       <th>Thống kê</th>
                                       <th>Ảnh</th>
                                       <th>Trạng thái</th>
                                       <th>Thao tác</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr onchange="updateForm(`14`)">
                                       <td>
                                          <input id="stt14" class="form-control" type="number" value="0">
                                       </td>
                                       <td>Hotmail VN</td>
                                       <td>hotmail-vn</td>
                                       <td>
                                          <span class="badge bg-outline-primary">
                                          Sản phẩm:
                                          4                                                    </span>
                                       </td>
                                       <td><img src="https://zshopclone7.cmsnt.net/assets/storage/images/categoryB8DE.png" width="40px"></td>
                                       <td>
                                          <div class="form-check form-switch form-check-lg">
                                             <input class="form-check-input" type="checkbox" id="status14" value="1" checked="">
                                          </div>
                                       </td>
                                       <td>
                                          <a href="https://zshopclone7.cmsnt.net/?module=admin&amp;action=category-edit&amp;id=14" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                          <i class="fa fa-pencil-alt"></i> Edit
                                          </a>
                                          <a onclick="RemoveRow('14')" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                          <i class="fas fa-trash"></i> Delete
                                          </a>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        
                     </div>
                     <p class="text-muted">Lưu ý: Ưu tiên càng cao, chuyên mục càng hiển thị trên cùng</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php require_once('footer.php');?>
</body>
</html>