$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#city").blur(function () {
        var city = $("#city").val();
        var name = $("#name").val();

        $.ajax({
            url: "/companies/getCompanyInfo",
            type: "POST",
            data: {
                name: name,
                city: city
            },
            success: function (response) {
                if (response) {
                    $("#address").val(response['response']['venue']['location']['address']);
                    $("#geolat").val(parseFloat(response['response']['venue']['location']['lat']).toFixed(6));
                    $("#geolng").val(parseFloat(response['response']['venue']['location']['lng']).toFixed(6));
                    $("#phone").val(response['response']['venue']['contact']['phone']);
                    $("#website").val(response['response']['venue']['url']);
                }
            },
        });
    });

});