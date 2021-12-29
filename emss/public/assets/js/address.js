$.extend({
    xResponse: function() {
        var theResponse = null;
        $.ajax({
            url: 'https://provinces.open-api.vn/api/?depth=3',
            async: false,
            success: function(respText) {
                theResponse = respText;
            }
        });
        return theResponse;
    }
});