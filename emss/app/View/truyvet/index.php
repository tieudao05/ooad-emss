<?php

use App\Core\View;

View::$activeItem = 'trace';

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
                                    <h3>Lịch sử truy vết</h3>
                                </label>
                            </div>
                            <div class="col-12 col-md-5 order-md-2 order-first">
                                <div class=" loat-start float-lg-end mb-3">
                                    <button id='open-add-user-btn' class="btn btn-primary">
                                        <i class="bi bi-plus"></i> Tiến hành truy vết
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
                                                <th>Mã truy vết</th>
                                                <th>Mã bệnh nhân</th>
                                                <th>Mã nhân viên</th>
                                                <th>Thời gian truy vết</th>
                                                <th>Thời gian bắt đầu</th>
                                                <th>Thời gian kết thúc</th>
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
        $(document).ready(function() {
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
                                        <td class="d-none check"><input type="checkbox" value="' + element['ma_nguoi_dung'] + '" class="form-check-input del-check shadow-none ' + element['ma_nguoi_dung'] + '"></td>\
                                        <td>' + element['ho_lot'] + '</td>\
                                        <td>' + element['ten'] + '</td>\
                                        <td>' + data_rel[0][element['ma_vai_tro'] - 1]['ten_vai_tro'] + '</td>\
                                        <td>' + element['so_dien_thoai'] + '</td>\
                                        <td>' + element['cmnd'] + '</td>\
                                        <td><button class="btn btn-info btn-sm btn-view" id=' + element['ma_nguoi_dung'] +
                            '><i class="bi bi-file-earmark-person view"></i></button><button class="btn btn-danger btn-sm btn-del" id=' + element['ma_nguoi_dung'] + '><i class="bi bi-trash-fill"></i></button></td>\
                                    </tr>';
                        if (row % 2) code = '<tr class="table-secondary">\
                                        <td class="d-none check"><input type="checkbox" value="' + element['ma_nguoi_dung'] + '" class="form-check-input del-check shadow-none ' + element['ma_nguoi_dung'] + '"></td>\
                                        <td>' + element['ho_lot'] + '</td>\
                                        <td>' + element['ten'] + '</td>\
                                        <td>' + data_rel[0][element['ma_vai_tro'] - 1]['ten_vai_tro'] + '</td>\
                                        <td>' + element['so_dien_thoai'] + '</td>\
                                        <td>' + element['cmnd'] + '</td>\
                                        <td><button class="btn btn-info btn-sm btn-view" id=' + element['ma_nguoi_dung'] +
                            '><i class="bi bi-file-earmark-person view"></i></button><button class="btn btn-danger btn-sm btn-del" id=' + element['ma_nguoi_dung'] + '><i class="bi bi-trash-fill"></i></button></td>\
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
                })
            }
        })
    </script>

</body>

</html>