$("document").ready(function() {
    $.post(
        `http://localhost/webhoctapmvc/quyen/getChiTietQuyen`,
        function(response) {
            if (response.thanhcong) {
                let quyens = response.data;
                quyens.forEach((data) => {
                    let id = "#" + data.MaChucNang;
                    $(id).removeClass("d-none");
                });
            }
        }
    );
});