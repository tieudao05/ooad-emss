<?php

use App\Core\View;

View::$activeItem = 'patient';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EMSS</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= View::assets('css/bootstrap.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('vendors/toastify/toastify.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('vendors/perfect-scrollbar/perfect-scrollbar.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('vendors/bootstrap-icons/bootstrap-icons.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('css/app.css') ?>" />
    <link rel="shortcut icon" href="<?= View::assets('images/logo/logo_.png') ?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?= View::assets('css/quan.css') ?>" />
</head>

<body>
    <div id="app">
        <!-- SIDEBAR -->
        <?php View::partial('sidebar')  ?>
        <div id="main" class="layout-navbar">
            <!-- HEADER -->
            <?php View::partial('header')  ?>
            <?php View::partial('changepass')  ?>
            <div id="main-content">
                <div class="page-heading">
                    <div class="col-sm-6">
                        <h6>Tìm Kiếm</h6>
                        <div id="search-benhnhan-form" name="search-benhnhan-form">
                            <div class="form-group position-relative has-icon-right">
                                <input id="search-benhnhan-text" type="text" class="form-control" placeholder="Tìm kiếm" value="">
                                <div class="form-control-icon">
                                    <i class="bi bi-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-7 order-md-1 order-last">
                                <label>
                                    <h3>Danh sách bệnh nhân</h3>
                                </label>
                                <label>
                                    <h5 style="margin-left: 50px; margin-right: 10px;"> Lọc Theo:</h5>
                                </label>
                                <select class="btn btn btn-primary" name="search-cbb" id="cars-search">
                                    <option value="">Tất Cả</option>
                                    <option value="ho">Họ Lót</option>
                                    <option value="ten">Tên</option>
                                    <option value="phai">Phái</option>
                                    <option value="cmnd">CMND</option>
                                    <option value="sdt">Số điện thoại</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-5 order-md-2 order-first">
                                <div class=" loat-start float-lg-end mb-3">
                                    <button id='btn-delete-benhnhan' class="btn btn-danger">
                                        <i class="bi bi-trash-fill"></i> Xóa bệnh nhân
                                    </button>
                                    <button id='open-add-benhnhan-btn' class="btn btn-primary">
                                        <i class="bi bi-plus"></i> Thêm bệnh nhân
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-danger" id="table1">
                                        <thead>
                                            <tr>
                                                <th>Chọn</th>
                                                <th>Họ Lót</th>
                                                <th>Tên</th>
                                                <th>Phái</th>
                                                <th>CMND</th>
                                                <th>Số điện thoại</th>
                                                <th>Tác Vụ</th>
                                            </tr>
                                            <tr class="table-light">
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_nguoi_dung}" />
                                                    </div>
                                                </td>
                                                <td>Trần Thị Thu</td>
                                                <td>Thanh</td>
                                                <td>Nữ</td>
                                                <td>241748442</td>
                                                <td>0703360196</td>
                                                <td>
                                                    <button onclick="viewRow()" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                                        <i class="bi bi-eye"></i>
                                                    </button>
                                                    <button onclick="repairRow()" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                                        <i class="bi bi-tools"></i>
                                                    </button>
                                                    <button onclick="deleteRow()" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <nav class="mt-5">
                                        <ul id="pagination" class="pagination justify-content-center">
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                    </section>
                    <div class="modal fade" id="view-mon-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <ul class="list-group">
                                        <li class="list-group-item active">Thông Tin Chi Tiết</li>
                                        <li class="list-group-item">
                                            <div class="form-group">
                                                <label>Tên Bênh nhân: </label>
                                                <input type="text" class="form-control" id="view-maquyen" disabled value="Trần Thị Thu Thanh">
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="form-group">
                                                <label>Bệnh án</label>
                                                <p>
                                                    Ngày sinh: 04/01/1999 – 70 tuổi
                                                </p>
                                                <p>Giới tính: Nữ</p>
                                                <p> Dân tộc: Kinh</p>
                                                <p> Nghề nghiệp: sinh viên
                                                </p>
                                                <p>Địa chỉ: TDP 12, thị trấn Eak nốp, huyện Eakar, Tỉnh Đắk lắk
                                                </p>
                                                <p>Địa chỉ khi cần báo tin: (mẹ) ABCcùng địa chỉ SĐT: 0357106862</p>
                                                <p>Ngày giờ vào viện: 9 giờ 52 phút ngày 01/08/2021</p>
                                                <p> Ngày giờ làm bệnh án: 18h giờ 00 phút, ngày 01/08/2021.</p>
                                                <label>Bệnh sử</label>
                                                <p>Test nhanh dương tính lúc 13:32 ngày 24/07/2021 - Test bằng phương pháp PCR dương tính 21:00 ngày 24/07/2021</p>
                                                <label>Thăm khám</label>
                                                <p>Test bằng phương pháp PCR dương tính 21:00 ngày 03/08/2021 - Chỉ số CT = 34</p>
                                                <p>Test bằng phương pháp PCR dương tính 21:00 ngày 06/08/2021 - Chỉ số CT = 32</p>
                                                <p>Test bằng phương pháp PCR âm tính 21:00 ngày 09/08/2021</p>
                                                <p>Xuất viện ngày 09/08/2021</p>
                                            </div>
                                        </li>
                                    </ul>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Đóng</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- FOOTER -->
            <?php View::partial('footer')  ?>
        </div>
    </div>
    </div>
    <script src="<?= View::assets('vendors/toastify/toastify.js') ?>"></script>
    <script src="<?= View::assets('vendors/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
    <script src="<?= View::assets('js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= View::assets('vendors/jquery/jquery.min.js') ?>"></script>
    <script src="<?= View::assets('vendors/jquery/jquery.validate.js') ?>"></script>
    <script src="<?= View::assets('js/main.js') ?>"></script>
    <script src="<?= View::assets('js/changepass.js') ?>"></script>
    <script src="<?= View::assets('js/menu.js') ?>"></script>
    <script src="<?= View::assets('js/api.js') ?>"></script>
    <script>
        let currentPage = 1;
        $(function() {
            getBenhNhanAjax();

        });

        function changePage(newPage) {
            currentPage = newPage;
            getBenhNhanAjax();
        }

        function viewRow() {
            $("#view-mon-modal").modal('toggle');
        }

        function getBenhNhanAjax() {
            $.get(`http://localhost/ooad-emss/emss/nguoidung/getList?row_per_page=10&current_page=${currentPage}`,
                function(response) {
                    const table1 = $('#table1 > tbody');
                    table1.empty();
                    checkedRows = [];
                    $row = 0;
                    response.data.forEach(data => {
                        if (data.ma_vai_tro == 4) {
                            if ($row % 2 == 0) {
                                table1.append(`
                        <tr class="table-light">
                            <td><div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_nguoi_dung}"/>
                                </div>
                            </td>
                            <td>${data.ho_lot}</td>
                            <td>${data.ten}</td>
                            <td>${data.phai}</td>
                            <td>${data.cmnd}</td>
                            <td>${data.so_dien_thoai}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_nguoi_dung}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_nguoi_dung}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_nguoi_dung}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                            } else {
                                table1.append(`
                        <tr class="table-info">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_nguoi_dung}"/>
                                </div>
                            </td>
                            <td>${data.ho_lot}</td>
                            <td>${data.ten}</td>
                            <td>${data.phai}</td>
                            <td>${data.cmnd}</td>
                            <td>${data.so_dien_thoai}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_nguoi_dung}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_nguoi_dung}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_nguoi_dung}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                            }
                            $row += 1;
                        }
                    });

                    const pagination = $('#pagination');
                    pagination.empty();
                    if (response.totalPage > 1) {
                        for (let i = 1; i <= response.totalPage; i++) {
                            if (i == currentPage) {
                                pagination.append(`
                        <li class="page-item active">
                            <button class="page-link" onClick='changePage(${i})'>${i}</button>
                        </li>`)
                            } else {
                                pagination.append(`
                        <li class="page-item">
                            <button class="page-link" onClick='changePage(${i})'>${i}</button>
                        </li>`)
                            }

                        }
                    }

                });
        }
    </script>
</body>

</html>