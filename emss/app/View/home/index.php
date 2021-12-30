<?php

use App\Core\View;

View::$activeItem = 'dashboard';

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
            <div class="row">
                <div class="col-md-7 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                            <img class="card-img-top img-fluid" src="assets/images/samples/origami.jpg" alt="Card image cap" style="height: 20rem" />
                            <div class="card-body">
                                <h4 class="card-title">Tra cứu địa điểm cách ly</h4>
                                <div class=" from-group row" style="padding-right: 1.5em; padding-left:0em" ;>
                                    <div class="col-12 row form-group">
                                        <div class="col-4">
                                            <select class="form-control" name="province" id="tinh">
                                                <option value='-1'>TP/Tỉnh</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <select class="form-control" name="district" id="huyen">
                                                <option value='-1'>Quận/Huyện</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <select class="form-control" name="ward" id="xa">
                                                <option value='-1'>Phường/Xã</option>
                                            </select>
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
                                                        <th class="w-25">Tên địa điểm</th>
                                                        <th>Địa chỉ</th>
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
                </div>

                <div class="col-md-5 col-sm-12">
                    <div class="card">
                        <div class="card-content">

                            <img class="card-img-top img-fluid" src="assets/images/samples/tiem-chung.png">
                            <div class="card-body">
                                <a href="https://tiemchungcovid19.gov.vn/portal/search" target="blank"> Tra cứu >></a>

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
    <script src="<?= View::assets('js/xml2json.js') ?>"></script>
    <script src="<?= View::assets('js/address.js') ?>"></script>
    <script>
        $(document).ready(function() {
            // let fullname = "Trần Thị Thu Thanh";
            // let birthday = new Date('1999/01/04') // yyyy/mm/dd
            // birthday.setHours(7)
            // let birthdayTime = birthday.getTime();
            // let genderId = 2; // nam laf 1
            // let personalPhoneNumber = '0703360196'
            // let identification = ''
            // let otp = ''

            // const apiGetOtp = `https://thingproxy.freeboard.io/fetch/https://tiemchungcovid19.gov.vn/api/vaccination/public/otp-search?fullname=${fullname}&birthday=${birthdayTime}&genderId=${genderId}&personalPhoneNumber=${personalPhoneNumber}&identification=${identification}&healthInsuranceNumber=`
            // const apiGetInfo = `https://tiemchungcovid19.gov.vn/api/vaccination/public/patient-vaccinated?fullname=${fullname}&birthday=${birthdayTime}&genderId=${genderId}&personalPhoneNumber=${personalPhoneNumber}&identification=${identification}&healthInsuranceNumber=&otp=${otp}`

            // $.get(apiGetOtp, function(response, textStatus) {
            //     console.log(textStatus)
            //     console.log(response)

            //     //  $.get(apiGetInfo,  function(response) {


            //     // });
            // });
            var address = $.xResponse();
            address.forEach(function(element, index) {
                $('#tinh').append('<option class="tinh" value="' + index + '">' + element['name'] + '</option>');
            })
            $('#tinh').change(function() {
                $('#huyen').empty();
                $('#huyen').append('<option value="-1">Quận/Huyện</option>')
                $('#xa').empty();
                $('#xa').append('<option value="-1">Phường/Xã </option>')
                var districs = address[$('#tinh').val()]['districts'];
                districs.forEach(function(element, index) {
                    $('#huyen').append('<option class="huyen" value="' + index + '">' + element['name'] + '</option>')
                })
                $('#huyen').change(function() {
                    $('#xa').empty();
                    $('#xa').append('<option value="-1">Phường/Xã </option>')
                    var wards = districs[$('#huyen').val()]['wards'];
                    wards.forEach(function(element, index) {
                        $('#xa').append('<option  class="xa" value="' + index + '">' + element['name'] + '</option>')
                    })
                })
            });

            function getAddressAjax() {
                $.get(`http://localhost/ooad-emss/emss/diadiem/getAddressHome?rowsPerPage=10&page=${currentPage}&search=${$("#search-address-text").val()}&search2=${search}`,
                    function(response) {
                        const table1 = $('#table1 > tbody');
                        table1.empty();
                        checkedRows = [];
                        $row = 0;
                        response.data.forEach(data => {
                            if ($row % 2 == 0) {
                                table1.append(`
                        <tr class="table-light">
                        <td>${data.ten_dia_diem}</td>
                            <td> ${data.so_nha} - ${data.ap_thon} - ${data.phuong_xa} - ${data.quan_huyen} - ${data.tp_tinh}</td>
                        </tr>`);
                            } else {
                                table1.append(`
                        <tr class="table-info">
                            <td>${data.ten_dia_diem}</td>
                            <td> ${data.so_nha} - ${data.ap_thon} - ${data.phuong_xa} - ${data.quan_huyen} - ${data.tp_tinh}</td>
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

            function changePage(newPage) {
                currentPage = newPage;
                getAddressAjax();
            }
        });
    </script>
</body>

</html>