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
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                            <img class="card-img-top img-fluid" src="assets/images/samples/origami.jpg" alt="Card image cap" style="height: 20rem" />
                            <div class="card-body">
                                <h4 class="card-title">Top Image Cap</h4>
                                <p class="card-text">
                                    Jelly-o sesame snaps cheesecake topping. Cupcake fruitcake macaroon donut
                                    pastry gummies tiramisu chocolate bar muffin. Dessert bonbon caramels
                                    brownie chocolate
                                    bar
                                    chocolate tart dragée.
                                </p>
                                <p class="card-text">
                                    Cupcake fruitcake macaroon donut pastry gummies tiramisu chocolate bar
                                    muffin.
                                </p>
                                <button class="btn btn-primary block">Update now</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
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
    <script>
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
    </script>
</body>

</html>