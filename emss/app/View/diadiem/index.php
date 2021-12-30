<?php

use App\Core\View;

View::$activeItem = 'location';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EMSS</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap"
        rel="stylesheet" />
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
                        <div id="search-address-form" name="search-address-form">
                            <div class="form-group position-relative has-icon-right">
                                <input id="search-address-text" type="text" class="form-control" placeholder="Tìm kiếm"
                                    value="">
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
                                    <h3>Danh sách địa điểm</h3>
                                </label>
                                <label>
                                    <h5 style="margin-left: 50px; margin-right: 10px;"> Lọc Theo:</h5>
                                </label>
                                <select class="btn btn btn-primary" name="search-cbb" id="cars-search">
                                    <option value="">Tất Cả</option>
                                    <option value="ma">Mã địa điểm</option>
                                    <option value="ten">Tên địa điểm</option>
                                    <option value="tinh">Tỉnh/TP</option>
                                    <option value="huyen">Quận/Huyện</option>
                                    <option value="xa">Phường/Xã</option>
                                    <option value="thon">Ấp/Thôn</option>
                                    <option value="sonha">Số nhà</option>
                                    <option value="loai">Phân loại</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-5 order-md-2 order-first">
                                <div class=" loat-start float-lg-end mb-3">
                                    <button id='btn-delete-address' class="btn btn-danger">
                                        <i class="bi bi-trash-fill"></i> Xóa địa điểm
                                    </button>
                                    <button id='open-add-address-btn' class="btn btn-primary">
                                        <i class="bi bi-plus"></i> Thêm địa điểm
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
                                                <th>Mã địa điểm</th>
                                                <th>Tên địa điểm</th>
                                                <th>Tỉnh/TP</th>
                                                <th>Quận/Huyện</th>
                                                <th>Phường/Xã</th>
                                                <th>Ấp/Thôn</th>
                                                <th>Số nhà</th>
                                                <th>Phân loại</th>
                                                <th>Tác Vụ</th>
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
                </div>
            </div>
            <!-- MODAL ADD -->
            <div class="modal fade text-left" id="add-address-modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm địa điểm</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form name="add-address-form" action="/" method="POST">
                                <div class="modal-body">
                                    <label for="sohieu">Tên địa điểm:</label>
                                    <div class="form-group">
                                        <input type="text" id="addten" name="addten" placeholder="Tên địa điểm"
                                            class="form-control">
                                    </div>
                                    <label for="cars-hang">Tỉnh/TP: </label><br>
                                    <fieldset class="form-group">
                                        <select class="form-select" name="addtinh" id="addtinh"
                                            style="margin-right: 15px;">
                                            <option value="-1">Chọn Tỉnh/TP</option>
                                        </select>
                                    </fieldset>
                                    <label for="cars-hang">Quận/Huyện: </label><br>
                                    <fieldset class="form-group">
                                        <select class="form-select" name="addhuyen" id="addhuyen"
                                            style="margin-right: 15px;">
                                            <option value="-1">Chọn Quận/Huyện</option>
                                        </select>
                                    </fieldset>
                                    <label for="cars-hang">Phường/Xã: </label><br>
                                    <fieldset class="form-group">
                                        <select class="form-select" name="addxa" id="addxa" style="margin-right: 15px;">
                                            <option value="-1">Chọn Phường/Xã</option>
                                        </select>
                                    </fieldset>
                                    <label for="ghethuong">Ấp/Thôn:</label>
                                    <div class="form-group">
                                        <input type="text" id="addthon" name="addthon" placeholder="Ấp/Thôn"
                                            class="form-control">
                                    </div>
                                    <label for="ghethuong">Số nhà:</label>
                                    <div class="form-group">
                                        <input type="text" id="addsonha" name="addsonha" placeholder="Số nhà"
                                            class="form-control">
                                    </div>
                                    <label for="thuonggia">Phân loại:</label>
                                    <fieldset class="form-group">
                                        <select class="form-select" name="addloai" id="addloai"
                                            style="margin-right: 15px;">
                                            <option value="kiemdich" selected>Điểm kiểm dịch</option>
                                            <option value="cachly">Điểm cách ly</option>
                                        </select>
                                    </fieldset>
                                    <div id='addcachly'></div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Đóng</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Thêm</span>
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- FOOTER -->
            <?php View::partial('footer')  ?>
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
    <script src="<?= View::assets('js/address.js') ?>"></script>
    <script>
    let currentPage = 1;
    let checkedRows = [];
    $(function() {
        getAddressAjax();
        var address = $.xResponse();
        address.forEach(function(element, index) {
            $('#addtinh').append('<option value="' + index + '">' + element['name'] +
                '</option>');
        })
        $('#addtinh').change(function() {
            $('#addhuyen').empty();
            $('#addhuyen').append('<option value="-1"> Chọn Quận/Huyện</option>')
            $('#addxa').empty();
            $('#addxa').append('<option value="-1"> Chọn Phường/Xã </option>')
            var districs = address[$('#addtinh').val()]['districts'];
            districs.forEach(function(element, index) {
                $('#addhuyen').append('<option value="' + index + '">' + element[
                    'name'] + '</option>')
            })
            $('#addhuyen').change(function() {
                $('#addxa').empty();
                $('#addxa').append('<option value="-1"> Chọn Phường/Xã </option>')
                var wards = districs[$('#addhuyen').val()]['wards'];
                wards.forEach(function(element, index) {
                    $('#addxa').append('<option value="' + index + '">' +
                        element['name'] + '</option>')
                })
            })
        });

        $("form[name='add-address-form']").validate({
            rules: {
                addten: {
                    required: true,
                },
                addsucchua: {
                    required: true,
                },
                addtrong: {
                    required: true,
                },
            },
            messages: {
                addten: {
                    required: "Vui lòng nhập tên địa điểm",
                },
                addsucchua: {
                    required: "Vui lòng nhập sức chứa của khu cách ly",
                },
                addtrong: {
                    required: "Vui lòng nhập chỗ còn trống của khu cách ly",
                },
            },
            submitHandler: function(form, event) {
                event.preventDefault();
                var suc, trong;
                if ($('#addloai option').filter(':selected').val() == "cachly") {
                    suc = Number($("#addsucchua").val());
                    trong = Number($("#addtrong").val());
                } else {
                    suc = 0;
                    trong = 0;
                }
                var ajax = $.post(`http://localhost/ooad-emss/emss/diadiem/add`, {
                    addten: $('#addten').val(),
                    addtinh: $('#addtinh option').filter(':selected').text(),
                    addhuyen: $('#addhuyen option').filter(':selected').text(),
                    addxa: $('#addxa option').filter(':selected').text(),
                    addthon: $("#addthon").val(),
                    addsonha: $("#addsonha").val(),
                    addloai: $('#addloai option').filter(':selected').text(),
                    addsucchua: suc,
                    addtrong: trong
                });

                ajax.done(function(response) {
                    $("#add-address-modal").modal('toggle')
                    if (response.thanhcong) {
                        currentPage = 1;
                        getAddressAjax();
                        Toastify({
                            text: "Thêm Thành Công",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#4fbe87",
                        }).showToast();
                    } else {
                        Toastify({
                            text: "Thêm Thất Bại",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#FF6A6A",
                        }).showToast();
                    }
                });
                $('#addten').val("");
                $('#addtinh').val("-1");
                $('#addhuyen').val("-1");
                $('#addxa').val("-1");
                $('#addthon').val("");
                $('#addsonha').val("");
                $('#addsucchua').val("");
                $('#addtrong').val("");
                $('#addloai').val("kiemdich");
            }
        })
    });

    $("#open-add-address-btn").click(function() {
        $("#add-address-modal").modal('toggle')
    });

    $('#addloai').change(function() {
        let loai = $('#addloai option').filter(':selected').val();
        if (loai == "cachly") {
            $("#addcachly").append(`<label for="thuonggia">Sức chứa:</label>
                                    <div class="form-group">
                                        <input type="text" id="addsucchua" name="addsucchua" placeholder="Sức chứa"
                                            class="form-control">
                                    </div>
                                    <label for="thuonggia">Số lượng còn trống:</label>
                                    <div class="form-group">
                                        <input type="text" id="addtrong" name="addtrong"
                                            placeholder="Số lượng còn trống" class="form-control">
                                    </div>`);
        } else $("#addcachly").empty();
    });

    function changePage(newPage) {
        currentPage = newPage;
        getAddressAjax();
    }

    $('#cars-search').change(function() {
        currentPage = 1;
        getAddressAjax();
    });

    $("#search-address-form").keyup(debounce(function() {
        currentPage = 1;
        getAddressAjax();
    }, 200));

    function getAddressAjax() {
        let search = $('#cars-search option').filter(':selected').val();
        console.log('/' + search + "/");
        $.get(`http://localhost/ooad-emss/emss/diadiem/getAddress?rowsPerPage=10&page=${currentPage}&search=${$("#search-address-text").val()}&search2=${search}`,
            function(response) {
                const table1 = $('#table1 > tbody');
                table1.empty();
                checkedRows = [];
                $row = 0;
                response.data.forEach(data => {
                    if ($row % 2 == 0) {
                        table1.append(`
                        <tr class="table-light">
                            <td><div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_dia_diem}">
                                </div>
                            </td>
                            <td>${data.ma_dia_diem}</td>
                            <td>${data.ten_dia_diem}</td>
                            <td>${data.tp_tinh}</td>
                            <td>${data.quan_huyen}</td>
                            <td>${data.phuong_xa}</td>
                            <td>${data.ap_thon}</td>
                            <td>${data.so_nha}</td>
                            <td>${data.phan_loai}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_dia_diem}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_dia_diem}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_dia_diem}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    } else {
                        table1.append(`
                        <tr class="table-info">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_dia_diem}">
                                </div>
                            </td>
                            <td>${data.ma_dia_diem}</td>
                            <td>${data.ten_dia_diem}</td>
                            <td>${data.tp_tinh}</td>
                            <td>${data.quan_huyen}</td>
                            <td>${data.phuong_xa}</td>
                            <td>${data.ap_thon}</td>
                            <td>${data.so_nha}</td>
                            <td>${data.phan_loai}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_dia_diem}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_dia_diem}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_dia_diem}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    }
                    checkedRows.push(data.ma_dia_diem);
                    $row += 1;
                });

                const pagination = $('#pagination');
                // Xóa phân trang cũ
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