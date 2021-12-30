<?php

use App\Core\View;

View::$activeItem = 'user';

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
    <style>
        .btn i {
            width: 50px;
            height: 50px;
        }

        .btn-sm {
            padding: 0.2em;
            margin: 0.2em;
        }

        .modal-content {
            width: 1200em;
        }
    </style>
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
                        <div id="search-user-form" name="search-user-form">
                            <div class="form-group position-relative has-icon-right">
                                <input id="serch-user-text" type="text" class="form-control" placeholder="Tìm kiếm" value="">
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
                                    <h3>Danh sách người dùng</h3>
                                </label>
                            </div>
                            <div class="col-12 col-md-5 order-md-2 order-first">
                                <div class=" loat-start float-lg-end mb-3">
                                    <button id='btn-delete-user' class="btn btn-danger">
                                        <i class="bi bi-trash-fill"></i> Xóa người dùng
                                    </button>
                                    <button id='open-add-user-btn' class="btn btn-primary">
                                        <i class="bi bi-plus"></i> Thêm người dùng
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
                                                <th>Vai trò</th>
                                                <th>Số điện thoại</th>
                                                <th>CMND</th>
                                                <th>Tác Vụ</th>
                                            </tr>
                                        </thead>
                                        <tbody id="content">
                                            <tr class="table-light">
                                                <td><input type="checkbox" class="form-check-input shadow-none"></td>
                                                <td>Phan Thanh Thắng</td>
                                                <td>Phan Thanh Thắng</td>
                                                <td>Người dân</td>
                                                <td>Số điện thoại</td>
                                                <td>CMND</td>
                                                <td><button class="btn btn-info btn-sm"><i class="bi bi-file-earmark-person"></i></button><button class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button></td>
                                            </tr>
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

                <!-- MODAL ADD -->
                <div class="modal fade text-left" id="add-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Thêm Tài Khoản</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="add-form" method="post">
                                    <div class="row">
                                        <div class="form-group row col-6">
                                            <label for="lastname" class="col-sm-4 col-form-label">Họ lót:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Họ lót">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="firstname" class="col-sm-4 col-form-label">Tên:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Tên">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group row col-6">
                                            <label for="cmnd" class="col-sm-4 col-form-label">CMND:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="cmnd" name="cmnd" placeholder="CMND">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="firstname" class="col-sm-4 col-form-label">Ngày sinh:</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Tên">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="sex" class="col-sm-4 col-form-label">Giới tính:</label>
                                            <div class="col-sm-8 row">
                                                <div class="col-6">
                                                    <input type="radio" name="sex" id="male" value="Nam" checked=checked>
                                                    <label class="form-check-label col-form-label" for="male"> Nam
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <input class="" type="radio" name="sex" valune="Nữ" id="female">
                                                    <label class="form-check-label col-form-label" for="female"> Nữ
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="phone_number" class="col-sm-4 col-form-label">SĐT:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Số điện thoại">
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" from-group row" style="padding-right: 1.5em; padding-left:0em" ;>
                                        <label for="address" class="col-2 col-form-label ">Địa chỉ:</label>
                                        <div class="col-10 row form-group">
                                            <div class="col-4">
                                                <select class="form-control" name="province" id="tinh">
                                                    <option value='-1'>Chọn TP/Tỉnh</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <select class="form-control" name="district" id="huyen">
                                                    <option value='-1'>Chọn Quận/Huyện</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <select class="form-control" name="ward" id="xa">
                                                    <option value='-1'>Chọn Phường/Xã</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group" ;>
                                        <label for="" class="col-2 col-form-label"> </label>
                                        <div class="col-10 row">
                                            <div class="col-6 row">
                                                <input type="text" class="form-control" id="village" name="village" placeholder="Thôn/ấp">
                                            </div>
                                            <div class="col-6">
                                                <input type="text" class="form-control" id="home" name="home" placeholder="Số nhà">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row form-group">
                                        <label for="email" class="col-2 col-form-label"> Email</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                        </div>
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
        $(document).ready(function() {
            let current_page_ = 1;
            getList(1);
            $('#add-user-modal').modal('show');
            $("form[name='add-form']").validate({
                // Định nghĩa rule validate
                rules: {
                    lastname: {
                        required: true,
                    },
                    firstname: {
                        required: true,
                    },
                    cmnd: {
                        required: true,
                        minlength: 9,
                    },
                    birthday: {
                        required: true,
                    },
                    phone_number: {
                        required: true,
                        number: true,
                    },
                    province: {
                        min: 0
                    },
                    district: {
                        min: 0
                    },
                    ward: {
                        min: 0
                    },
                    email: {
                        email: true,
                        required: true
                    },
                },
                //Tạo massages:
                messages: {
                    lastname: "Vui lòng nhập họ lót",
                    firstname: "Vui lòng nhập tên",
                    cmnd: {
                        required: "Vui lòng nhập số chứng minh nhân dân",
                        minlength: "Định dạng CMND không hợp lệ",
                    },
                    birthday: "Vui lòng chọn ngày sinh",
                    phone_number: {
                        required: "Vui lòng nhập số điện thoại",
                        number: "Vui lòng nhập đúng định dạng"
                    },
                    province: "Vui lòng chọn tỉnh/thành phố",
                    district: "Vui lòng chọn huyện/quận",
                    ward: "Vui lòng chọn xã/phường",
                    email: {
                        email: "Vui lòng nhập đúng định dạng",
                        required: "Vui lòng nhập email"
                    },
                },
                submitHandler: function(form) {
                    doAdd();
                }
            });

            function doAdd() {

                $("form[name='add-form']").submit(function(event) {
                    var date = $('#birthday').val();
                    var arr = date.split('-');
                    var birthday_ = arr[2] + arr[1] + arr[0];
                    var ajax =
                        $.post(
                            'http://localhost/ooad-emss/emss/nguoidung/add', {
                                lastname: $('#lastname').val(),
                                firstname: $('#firstname').val(),
                                cmnd: $('#cmnd').val(),
                                birthday: birthday_,
                                sex: $('input[name="sex"]').val(),
                                phone_number: $('#phone_number').val(),
                                province: $('.tinh:selected').text(),
                                district: $('.huyen:selected').text(),
                                ward: $('.xa:selected').text(),
                                village: $('#village').val(),
                                home: $('#home').val(),
                                email: $('#email').val(),
                                password: $('#password').val()
                            }).done(function(data) {
                            if (data['thanhcong']) {
                                Toastify({
                                    text: "Thêm thành công",
                                    duration: 1000,
                                    close: true,
                                    gravity: "top",
                                    position: "center",
                                    backgroundColor: "#00CC33",
                                }).showToast();
                            } else {
                                Toastify({
                                    text: data['error'],
                                    duration: 1000,
                                    close: true,
                                    gravity: "top",
                                    position: "center",
                                    backgroundColor: "#FF6600",
                                }).showToast();
                            }
                        })
                    ajax.fail(function(data) {
                        Toastify({
                            text: "Thêm thất bại",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#FF6600",
                        }).showToast();
                    })
                }); 
                event.preventDefault();
            }
            /**Lấy danh sách tỉnh huyện xã */
            var address = $.xResponse();
            address.forEach(function(element, index) {
                $('#tinh').append('<option class="tinh" value="' + index + '">' + element['name'] + '</option>');
            })
            $('#tinh').change(function() {
                $('#huyen').empty();
                $('#huyen').append('<option value="-1"> Chọn Quận/Huyện</option>')
                $('#xa').empty();
                $('#xa').append('<option value="-1"> Chọn Phường/Xã </option>')
                var districs = address[$('#tinh').val()]['districts'];
                districs.forEach(function(element, index) {
                    $('#huyen').append('<option class="huyen" value="' + index + '">' + element['name'] + '</option>')
                })
                $('#huyen').change(function() {
                    $('#xa').empty();
                    $('#xa').append('<option value="-1"> Chọn Phường/Xã </option>')
                    var wards = districs[$('#huyen').val()]['wards'];
                    wards.forEach(function(element, index) {
                        $('#xa').append('<option  class="xa" value="' + index + '">' + element['name'] + '</option>')
                    })
                })
            });

        })
        /** Các hàm */
        /** Lấy danh sách */
        function getList(current_page) {
            $('#content').empty();
            var role = $.ajax({
                url: 'http://localhost/ooad-emss/emss/phanquyen/getListRole',
                type: 'POST'
            });

            var list = $.ajax({
                url: 'http://localhost/ooad-emss/emss/nguoidung/getList?current_page=' + current_page +
                    '&row_per_page=5',
                type: 'get',
            });
            $.when(role, list).done(function(data_rel, data) {
                var row = 1;
                data[0]['data'].forEach(function(element, index) {
                    var code = '<tr class="table-light">\
                                        <td><input type="checkbox" value="' + element['ma_nguoi_dung'] + '" class="form-check-input shadow-none"></td>\
                                        <td>' + element['ho_lot'] + '</td>\
                                        <td>' + element['ten'] + '</td>\
                                        <td>' + data_rel[0][element['ma_vai_tro'] - 1]['ten_vai_tro'] + '</td>\
                                        <td>' + element['so_dien_thoai'] + '</td>\
                                        <td>' + element['cmnd'] + '</td>\
                                        <td><button class="btn btn-info btn-sm del" id=' + element['ma_nguoi_dung'] +
                        '><i class="bi bi-file-earmark-person view" id=' + element['ma_nguoi_dung'] + '></i></button><button class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button></td>\
                                    </tr>';
                    if (row % 2) code = '<tr class="table-light">\
                                        <td><input type="checkbox" value="' + element['ma_nguoi_dung'] + '" class="form-check-input shadow-none"></td>\
                                        <td>' + element['ho_lot'] + '</td>\
                                        <td>' + element['ten'] + '</td>\
                                        <td>' + data_rel[0][element['ma_vai_tro'] - 1]['ten_vai_tro'] + '</td>\
                                        <td>' + element['so_dien_thoai'] + '</td>\
                                        <td>' + element['cmnd'] + '</td>\
                                        <td><button class="btn btn-info btn-sm del" id=' + element['ma_nguoi_dung'] +
                        '><i class="bi bi-file-earmark-person view" id=' + element['ma_nguoi_dung'] + '></i></button><button class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button></td>\
                                    </tr>';
                    $('#content').append(code);
                })
                var i = 1;
                $('#pagination').empty();
                for (i = 1; i <= data[0]['totalPage']; i++)
                    if (i == current_page) {
                        $('#pagination').append('<li class="page-item active">\<button class="page-link" id="' + i +
                            '">' + i + '</button>\</li>');
                    } else $('#pagination').append('<li class="page-item">\<button class="page-link" id="' + i +
                        '">' + i + '</button>\</li>');
                $('.page-link').click(function() {
                    let current_page_ = ($(this).attr('id'));
                    getList($(this).attr('id'));
                });
            })
        }
    </script>
</body>

</html>