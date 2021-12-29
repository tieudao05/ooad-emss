<?php

use App\Core\View;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= View::assets('css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= View::assets('vendors/bootstrap-icons/bootstrap-icons.css') ?>">
    <link rel="stylesheet" href="<?= View::assets('css/app.css') ?>">
    <link rel="stylesheet" href="<?= View::assets('css/pages/auth.css') ?>">
    <link rel="shortcut icon" href="<?= View::assets('images/logo/logo_.png') ?>" type="image/x-icon')" />
    <style>
        .content {
            width: 90% !important;
            border-radius: 2em;
            border-width: 0px;
            box-sizing: border-box;
            border-style: solid;
            box-shadow: 0 0 10px 4px #CCFFCC;
            padding: 1em;
        }

        .page {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        html,
        body {
            height: 100%;
        }

        .form-label {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .row {
            padding-left: 1;
            padding-right: 1;
        }
    </style>
</head>

<body class="body">
    <div class="page" id="page">
        <div class="row content " id="card">
            <div class="col-8">
                <h3 class="auth-title">ĐĂNG KÝ </h3>
                <p class="auth-subtitle mb-5">Nhập thông tin của bạn để đăng ký</p>
                <form name="resgiter-form" method="post">
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
                            <label for="firstname" class="col-sm-4 col-form-label">Giới tính:</label>
                            <div class="col-sm-8 row">
                                <div class="col-6">
                                    <input type="radio" name="sex" id="male">
                                    <label class="form-check-label col-form-label" for="male"> Nam </label>
                                </div>
                                <div class="col-6">
                                    <input class="" type="radio" name="sex" id="female">
                                    <label class="form-check-label col-form-label" for="female"> Nữ </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label for="firstname" class="col-sm-4 col-form-label">SĐT:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Số điện thoại">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" style="padding-right: 1.5em; padding-left:0em";>
                        <label for="firstname" class="col-2 col-form-label">Địa chỉ:</label>
                        <div class="col-10 row form-group">
                            <div class="col-4">
                                <select class="form-control" id="tinh">
                                    <option>Chọn TP/Tỉnh</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <select class="form-control" id="huyen">
                                    <option>Chọn Quận/Huyện</option>
                                    <option>Chọn MM/Huyện</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <select class="form-control" id="xa">
                                    <option>Chọn Phường/Xã</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-login btn-primary btn-block btn-lg shadow-lg mt-5">Đăng nhập</button>
                </form>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
    <script src="<?= View::assets('vendors/jquery/jquery.min.js') ?>"></script>
    <script src="<?= View::assets('vendors/jquery/jquery.validate.js') ?>"></script>
    <script>
    </script>
</body>

</html>