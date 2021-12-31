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
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap"
        rel="stylesheet" />
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
                                <input id="serch-user-text" type="text" class="form-control" placeholder="Tìm kiếm"
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
                                                <th class="d-none check">Chọn</th>
                                                <th>Họ Lót</th>
                                                <th>Tên</th>
                                                <th>Vai trò</th>
                                                <th>Số điện thoại</th>
                                                <th>CMND</th>
                                                <th>Tác Vụ</th>
                                            </tr>
                                        </thead>
                                        <tbody id="content">
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
                                                <input type="text" class="form-control" id="lastname" name="lastname"
                                                    placeholder="Họ lót">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="firstname" class="col-sm-4 col-form-label">Tên:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="firstname" name="firstname"
                                                    placeholder="Tên">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group row col-6">
                                            <label for="cmnd" class="col-sm-4 col-form-label">CMND:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="cmnd" name="cmnd"
                                                    placeholder="CMND">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="firstname" class="col-sm-4 col-form-label">Ngày sinh:</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control" id="birthday" name="birthday"
                                                    placeholder="Tên">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="sex" class="col-sm-4 col-form-label">Giới tính:</label>
                                            <div class="col-sm-8 row">
                                                <div class="col-6">
                                                    <input type="radio" name="sex" id="male" value="Nam"
                                                        checked=checked>
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
                                                <input type="text" class="form-control" id="phone_number"
                                                    name="phone_number" placeholder="Số điện thoại">
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
                                                <input type="text" class="form-control" id="village" name="village"
                                                    placeholder="Thôn/ấp">
                                            </div>
                                            <div class="col-6">
                                                <input type="text" class="form-control" id="home" name="home"
                                                    placeholder="Số nhà">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">

                                    </div>
                                    <div class="row">
                                        <div class="form-group row col-6">
                                            <label for="email" class="col-4 col-form-label"> Email:</label>
                                            <div class="col-8">
                                                <input type="text" class="form-control" id="email" name="email"
                                                    placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="role" class="col-4 col-form-label"> Vai trò:</label>
                                            <div class="col-8">
                                                <select class="form-control" name="role" id="role">
                                                    <option value='-1'>Chọn vai trò</option>
                                                </select>
                                            </div>
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
                <!-- The Modal Add -->
                <div class="modal" id="modal-confirm-add">
                    <div class="modal-dialog modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header bg-info">
                                <h4 class="modal-title">Xác nhận</h4>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                Xác nhận thêm tài khoản?
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-info" id="btn-add-user"
                                    data-bs-dismiss="modal">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- The Modal Delete -->
                <div class="modal" id="modal-confirm-delete">
                    <div class="modal-dialog modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header bg-danger">
                                <h4 class="modal-title text-light">Xác nhận</h4>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body" id="modal-content-delete">
                                Xác nhận xóa tài khoản?
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" id="btn-delete-user-confirm"
                                    data-bs-dismiss="modal">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- The Modal Detail -->
                <div class="modal" id="modal-detail">
                    <div class="modal-dialog modal-dialog  modal-dialog-centered modal-dialog-scrollable">
                        <div class='modal-content'>
                            <!-- Modal Header -->
                            <div class="modal-header bg-info">
                                <h4 class="modal-title text-light">Thông tin chi tiết</h4>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body" id="modal-content">

                                <div class="row">
                                    <div class="form-group row col-6">
                                        <label for="lastname" class="col-sm-4 col-form-label">Họ lót:</label>
                                        <div class="col-sm-8 col-form-label text-danger" id="detail-lastname"
                                            style="font-weight:bold">
                                            Phan Thanh
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="firstname" class="col-sm-4 col-form-label">Tên:</label>
                                        <div class="col-sm-8 col-form-label text-danger" id="detail-firstname"
                                            style="font-weight:bold">
                                            Thắng
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group row col-6">
                                        <label for="cmnd" class="col-sm-4 col-form-label">CMND:</label>
                                        <div class="col-sm-8 col-form-label text-danger" id="detail-cmnd"
                                            style="font-weight:bold">
                                            123456789
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="firstname" class="col-sm-4 col-form-label">Ngày sinh:</label>
                                        <div class="col-sm-8 col-form-label text-danger" id="detail-date"
                                            style="font-weight:bold">
                                            20/05/2001
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="sex" class="col-sm-4 col-form-label">Giới tính:</label>

                                        <div class="col-sm-8 col-form-label text-danger" id="detail-sex"
                                            style="font-weight:bold">
                                            Nam
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="phone_number" class="col-sm-4 col-form-label">SĐT:</label>
                                        <div class="col-sm-8 col-form-label text-danger" id="detail-number"
                                            style="font-weight:bold">
                                            20/05/2001
                                        </div>
                                    </div>
                                </div>
                                <div class=" from-group row" style="padding-right: 1.5em; padding-left:0em" ;>
                                    <label for="address" class="col-2 col-form-label ">Địa chỉ:</label>
                                    <div class="col-sm-8 col-form-label text-danger" id="detail-address"
                                        style="font-weight:bold">
                                        20/05/2001
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="email" class="col-2 col-form-label"> Email</label>
                                    <div class="col-sm-8 col-form-label text-danger" id="detail-email"
                                        style="font-weight:bold">
                                        20/05/2001
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="email" class="col-2 col-form-label"> Vai trò</label>
                                    <div class="col-sm-8 col-form-label text-danger" id="detail-role"
                                        style="font-weight:bold">
                                        20/05/2001
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Đóng</span>
                                </button>
                                <button class="btn btn-primary ml-1" id="btn-update-user">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Sửa</span>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- MODAL UPDATE -->
            <div class="modal fade text-left" id="modal-update-user" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h4 class="modal-title">Sửa thông tin</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form name="update-form" method="post">
                                <div class="row">
                                    <div class="form-group row col-6">
                                        <label for="lastname" class="col-sm-4 col-form-label">Họ lót:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="update_lastname"
                                                name="update_lastname" placeholder="Họ lót">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="firstname" class="col-sm-4 col-form-label">Tên:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="update_firstname"
                                                name="update_firstname" placeholder="Tên">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group row col-6">
                                        <label for="cmnd" class="col-sm-4 col-form-label">CMND:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="update_cmnd" name="update_cmnd"
                                                placeholder="CMND">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="firstname" class="col-sm-4 col-form-label">Ngày sinh:</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" id="update_date" name="update_date"
                                                placeholder="Tên">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="sex" class="col-sm-4 col-form-label">Giới tính:</label>
                                        <div class="col-sm-8 row">
                                            <div class="col-6">
                                                <input type="radio" name="update_sex" id="male" value="Nam"
                                                    checked=checked>
                                                <label class="form-check-label col-form-label" for="male"> Nam
                                                </label>
                                            </div>
                                            <div class="col-6">
                                                <input class="" type="radio" name="update_sex" valune="Nữ" id="female">
                                                <label class="form-check-label col-form-label" for="female"> Nữ
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="phone_number" class="col-sm-4 col-form-label">SĐT:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="update_phone_number"
                                                name="update_phone_number" placeholder="Số điện thoại">
                                        </div>
                                    </div>
                                </div>
                                <div class=" from-group row" style="padding-right: 1.5em; padding-left:0em" ;>
                                    <label for="address" class="col-2 col-form-label ">Địa chỉ:</label>
                                    <div class="col-10 row form-group">
                                        <div class="col-4">
                                            <select class="form-control" name="update_province" id="update_tinh">
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <select class="form-control" name="update_district" id="update_huyen">
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <select class="form-control" name="update_ward" id="update_xa">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group" ;>
                                    <label for="" class="col-2 col-form-label"> </label>
                                    <div class="col-10 row">
                                        <div class="col-6 row">
                                            <input type="text" class="form-control" id="update_village"
                                                name="update_village" placeholder="Thôn/ấp">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" id="update_home" name="update_home"
                                                placeholder="Số nhà">
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                </div>
                                <div class="row">
                                    <div class="form-group row col-6">
                                        <label for="email" class="col-4 col-form-label"> Email:</label>
                                        <div class="col-8">
                                            <input type="text" class="form-control" id="update_email"
                                                name="update_email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="role" class="col-4 col-form-label"> Vai trò:</label>
                                        <div class="col-8">
                                            <select class="form-control" name="update_role" id="update_role">
                                                <option value='-1'>Chọn vai trò</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Đóng</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1" id="btn-update">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Sửa</span>
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
        getList(1);
        $('#open-add-user-btn').click(function() {
            $('#add-user-modal').modal('show');
        })

        /**Xóa tài khoản
         * 
         */
        $('#btn-delete-user').click(function() {
            $('.check').toggleClass('d-none');
            var str = "";
            $('input.del-check:checked').each(function(index, element) {
                str += $(this).val() + '-';
            })
            str = str.slice(0, str.length - 1);
            if (str != "") {
                $('#modal-confirm-delete').modal('show');
                $('#btn-delete-user-confirm').click(function() {
                    $.ajax({
                        url: 'http://localhost/ooad-emss/emss/nguoidung/delete',
                        data: {
                            list_user: str
                        },
                        type: 'POST',
                    }).done(function(data) {
                        if (data) {
                            Toastify({
                                text: "Xóa thành công",
                                duration: 1000,
                                close: true,
                                gravity: "top",
                                position: "center",
                                backgroundColor: "#00CC33",
                            }).showToast();
                            getList(1);
                        } else {
                            Toastify({
                                text: "Xóa thành công",
                                duration: 1000,
                                close: true,
                                gravity: "top",
                                position: "center",
                                backgroundColor: "#00CC33",
                            }).showToast();
                            getList(1);
                        }
                    })
                })
            }
        });
        //Biến ajax quyền
        var role_ = $.ajax({
            url: 'http://localhost/ooad-emss/emss/phanquyen/getListRole',
            type: 'POST'
        });
        //Xem chi tiết

        //Thêm người dùng
        role_.done(function(data_rel) {
            $('#role').empty();
            $('#role').append(' <option value=-1> Chọn  </option>');
            data_rel.forEach(function(element, index) {
                var code = ' <option value=' + element['ma_vai_tro'] + ' class="role">' +
                    element['ten_vai_tro'] + '</option>';
                $('#role').append(code);
                $('#update-role').append(code);
            })
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
                    $('#modal-confirm-add').modal('show');
                    $('#add-user-modal').modal('hide');
                    $('#btn-add-user').click(function() {
                        var ajax =
                            $.post(
                                'http://localhost/ooad-emss/emss/nguoidung/add', {
                                    lastname: $('#lastname').val(),
                                    firstname: $('#firstname').val(),
                                    cmnd: $('#cmnd').val(),
                                    birthday: date,
                                    sex: $('input[name="sex"]').val(),
                                    phone_number: $('#phone_number').val(),
                                    province: $('.tinh:selected').text(),
                                    district: $('.huyen:selected').text(),
                                    ward: $('.xa:selected').text(),
                                    village: $('#village').val(),
                                    home: $('#home').val(),
                                    email: $('#email').val(),
                                    password: $('#password').val(),
                                    role: $('.role:selected').val(),
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
                                    window.location.href =
                                        'http://localhost/ooad-emss/emss/nguoidung/index'
                                    getList(1);
                                } else {
                                    Toastify({
                                        text: data['error'],
                                        duration: 1000,
                                        close: true,
                                        gravity: "top",
                                        position: "center",
                                        backgroundColor: "#FF6600",
                                    }).showToast();
                                    $('#add-user-modal').modal('show');
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
                    })
                    getList(1);
                });
            }
        })
        /**Lấy danh sách tỉnh huyện xã */
        var address = $.xResponse();
        address.forEach(function(element, index) {
            $('#tinh').append('<option class="tinh" value="' + index + '">' + element['name'] +
                '</option>');
        })
        $('#tinh').change(function() {
            $('#huyen').empty();
            $('#huyen').append('<option value="-1"> Chọn Quận/Huyện</option>')
            $('#xa').empty();
            $('#xa').append('<option value="-1"> Chọn Phường/Xã </option>')
            var districs = address[$('#tinh').val()]['districts'];
            districs.forEach(function(element, index) {
                $('#huyen').append('<option class="huyen" value="' + index + '">' + element[
                    'name'] + '</option>')
            })
            $('#huyen').change(function() {
                $('#xa').empty();
                $('#xa').append('<option value="-1"> Chọn Phường/Xã </option>')
                var wards = districs[$('#huyen').val()]['wards'];
                wards.forEach(function(element, index) {
                    $('#xa').append('<option  class="xa" value="' + index + '">' +
                        element['name'] + '</option>')
                })
            })
        });
    })
    /** Các hàm */
    /** Lấy danh sách người dùng */
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
                var code = '<tr class="table-info">\
                                        <td class="d-none check"><input type="checkbox" value="' + element[
                        'ma_nguoi_dung'] + '" class="form-check-input del-check shadow-none ' + element[
                        'ma_nguoi_dung'] + '"></td>\
                                        <td>' + element['ho_lot'] + '</td>\
                                        <td>' + element['ten'] + '</td>\
                                        <td>' + data_rel[0][element['ma_vai_tro'] - 1]['ten_vai_tro'] + '</td>\
                                        <td>' + element['so_dien_thoai'] + '</td>\
                                        <td>' + element['cmnd'] + '</td>\
                                        <td><button class="btn btn-info btn-sm btn-view" id=' + element[
                        'ma_nguoi_dung'] +
                    '><i class="bi bi-file-earmark-person view"></i></button><button class="btn btn-danger btn-sm btn-del" id=' +
                    element['ma_nguoi_dung'] + '><i class="bi bi-trash-fill"></i></button></td>\
                                    </tr>';
                if (row % 2) code = '<tr class="table-light">\
                                        <td class="d-none check"><input type="checkbox" value="' + element[
                        'ma_nguoi_dung'] + '" class="form-check-input del-check shadow-none ' + element[
                        'ma_nguoi_dung'] + '"></td>\
                                        <td>' + element['ho_lot'] + '</td>\
                                        <td>' + element['ten'] + '</td>\
                                        <td>' + data_rel[0][element['ma_vai_tro'] - 1]['ten_vai_tro'] + '</td>\
                                        <td>' + element['so_dien_thoai'] + '</td>\
                                        <td>' + element['cmnd'] + '</td>\
                                        <td><button class="btn btn-info btn-sm btn-view" id=' + element[
                        'ma_nguoi_dung'] +
                    '><i class="bi bi-file-earmark-person view"></i></button><button class="btn btn-danger btn-sm btn-del" id=' +
                    element['ma_nguoi_dung'] + '><i class="bi bi-trash-fill"></i></button></td>\
                                    </tr>';
                $('#content').append(code);
                row = row + 1;
            })
            let i = 1;
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
            $('.btn-del').click(function() {
                $('.check').removeClass('d-none');
                var id = $(this).attr('id');
                $('input[type="checkbox"]').filter('.' + id).prop('checked', true);
            })
            //Xem chi tiết
            $('.btn-view').click(function() {
                $('#modal-detail').modal('show');
                $.ajax({
                    url: 'http://localhost/ooad-emss/emss/nguoidung/getOneByID',
                    data: {
                        ma_nguoi_dung: $(this).attr('id'),
                    },
                    type: 'POST',
                }).done(function(data_) {
                    console.log(data_);
                    var addr = data_['dia_chi'];
                    var arr = addr.split('-');
                    var str = "";
                    for (var i = 0; i < arr.length - 2; i++) {
                        if (arr[i] != "") str += arr[i] + " - ";
                    }
                    str = str.slice(0, str.length - 2);
                    $('#detail-lastname').text(data_['ho_lot']);
                    $('#detail-firstname').text(data_['ten']);
                    $('#detail-cmnd').text(data_['cmnd']);
                    $('#detail-date').text(data_['ngay_sinh']);
                    $('#detail-sex').text(data_['phai']);
                    $('#detail-address').text(str);
                    $('#detail-email').text(data_['email']);
                    $('#detail-role').text(data_rel[0][data_['ma_vai_tro'] - 1]['ten_vai_tro']);
                    $('#detail-number').text(data_['so_dien_thoai']);

                    /* //Sửa chi tiết
                     $('#btn-update-user').click(function() {
                         $('#modal-update-user').modal('show');
                         $('#modal-detail').modal('hide')
                         $('#update_lastname').val($('#detail-lastname').text());
                         $('#update_firstname').val($('#detail-firstname').text());
                         $('#update_cmnd').val($('#detail-cmnd').text());
                         $('#update_sex').val($('#detail-sex').val());
                         $('#update_phone_number').val($('#detail-number').text());
                         $('#update_date').val($('#detail-date').text());    
                         var addr_ = $('#detail-address').text();
                         var arr_ = addr_.split('-');
                         alert(arr_[1]);
                         $('#update_tinh').append('<option value="0"  class="update_tinh">' + arr_[1] + '</option>')
                         $('#update_huyen').append('<option value="0" class="update_huyen">' + arr_[2] + '</option>')
                         $('#update_xa').append('<option value="0" class="update_xa">' + arr_[3] + '</option>')
                         $('#update_email').val($('#detail-email').text());
                         var address = $.xResponse();
                         $('#update_tinh').click(function() {
                             $('#update_tinh').empty();
                             address.forEach(function(element, index) {
                                 $('#update_tinh').append('<option class="update_tinh" value="' + index + '">' + element['name'] + '</option>');
                             })
                             $('#update_tinh').change(function() {
                                 $('#update_huyen').empty();
                                 $('#update_huyen').append('<option class="update_huyen" value="-1"> Chọn Quận/Huyện</option>')
                                 $('#update_xa').empty();
                                 $('#update_xa').append('<option value="-1" class="update_xa"> Chọn Phường/Xã </option>')
                                 var districs = address[$('#update_tinh').val()]['districts'];
                                 districs.forEach(function(element, index) {
                                     $('#update_huyen').append('<option class="update_huyen" value="' + index + '">' + element['name'] + '</option>')
                                 })
                                 $('#update_huyen').change(function() {
                                     $('#update_xa').empty();
                                     $('#update_xa').append('<option class="update_xa" value="-1"> Chọn Phường/Xã </option>')
                                     var wards = districs[$('#update_huyen').val()]['wards'];
                                     wards.forEach(function(element, index) {
                                         $('#update_xa').append('<option  class="update_xa" value="' + index + '">' + element['name'] + '</option>')
                                     })
                                 })
                             });
                         })

                         $("form[name='update-form']").validate({
                             // Định nghĩa rule validate
                             rules: {
                                 update_lastname: {
                                     required: true,
                                 },
                                 update_firstname: {
                                     required: true,
                                 },
                                 update_cmnd: {
                                     required: true,
                                     minlength: 9,
                                 },
                                 update_birthday: {
                                     required: true,
                                 },
                                 update_phone_number: {
                                     required: true,
                                     number: true,
                                 },
                                 update_province: {
                                     min: 0
                                 },
                                 update_district: {
                                     min: 0
                                 },
                                 update_ward: {
                                     min: 0
                                 },
                                 update_email: {
                                     email: true,
                                     required: true
                                 },
                             },
                             //Tạo massages:
                             messages: {
                                 update_lastname: "Vui lòng nhập họ lót",
                                 update_firstname: "Vui lòng nhập tên",
                                 update_cmnd: {
                                     required: "Vui lòng nhập số chứng minh nhân dân",
                                     minlength: "Định dạng CMND không hợp lệ",
                                 },
                                 update_birthday: "Vui lòng chọn ngày sinh",
                                 update_phone_number: {
                                     required: "Vui lòng nhập số điện thoại",
                                     number: "Vui lòng nhập đúng định dạng"
                                 },
                                 update_province: "Vui lòng chọn tỉnh/thành phố",
                                 update_district: "Vui lòng chọn huyện/quận",
                                 update_ward: "Vui lòng chọn xã/phường",
                                 update_email: {
                                     email: "Vui lòng nhập đúng định dạng",
                                     required: "Vui lòng nhập email"
                                 },
                             },
                             submitHandler: function(form) {
                                 doUpdate();
                             }
                         });

                         function doUpdate() {
                             $("form[name='update-form']").submit(function(event) {
                                 $('#modal-update-user').modal('hide');
                                 event.preventDefault();
                                 $('#btn-update-user').click(function() {
                                     var ajax =
                                         $.post(
                                             'http://localhost/ooad-emss/emss/nguoidung/update', {
                                                 lastname: $('#update_lastname').val(),
                                                 firstname: $('#update_firstname').val(),
                                                 cmnd: $('#update_cmnd').val(),
                                                 birthday: $('#update_date').val(),
                                                 sex: $('input[name="update_sex"]').val(),
                                                 phone_number: $('#update_phone_number').val(),
                                                 province: $('.update_tinh:selected').text(),
                                                 district: $('.update_huyen:selected').text(),
                                                 ward: $('.update_xa:selected').text(),
                                                 village: $('#update_village').val(),
                                                 home: $('#update_home').val(),
                                                 email: $('#update_email').val(),
                                                 role: $('.update_role:selected').val(),
                                             }).done(function(data) {
                                                 alert(data);
                                             if (data['thanhcong']) {
                                                 Toastify({
                                                     text: "Sửa thành công",
                                                     duration: 1000,
                                                     close: true,
                                                     gravity: "top",
                                                     position: "center",
                                                     backgroundColor: "#00CC33",
                                                 }).showToast();
                                                 window.location.href = 'http://localhost/ooad-emss/emss/nguoidung/index'
                                                 getList(1);
                                             } else {
                                                 Toastify({
                                                     text: data['error'],
                                                     duration: 1000,
                                                     close: true,
                                                     gravity: "top",
                                                     position: "center",
                                                     backgroundColor: "#FF6600",
                                                 }).showToast();
                                                 $('#update-user-modal').modal('show');
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
                                 })
                                 getList(1);
                             });
                         }
                     })*/
                })
            })


        })
    }
    </script>
</body>

</html>