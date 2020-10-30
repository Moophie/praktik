$(document).ready(function () {
    $.ajaxSetup({
        // Set the CSRF token for the ajax POST
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // When the "city" input field loses focus
    $("#city").blur(function () {
        // Get the values from the city and name input fields
        var city = $("#city").val();
        var name = $("#name").val();

        // Make an AJAX call to getCompanyInfo with the city and name data
        $.ajax({
            url: "/companies/getCompanyInfo",
            type: "POST",
            data: {
                name: name,
                city: city
            },
            success: function (response) {
                // If there's a response, fill in the rest of the input fields with the data from the Foursquare API
                // TODO: Check if there's other options like logo's and descriptions
                if (response) {
                    $("#address").val(response['response']['venue']['location']['address']);
                    // For the geolocation: toFixed(6) => get up to 6 numbers after the comma so it matches with the database settings
                    $("#geolat").val(parseFloat(response['response']['venue']['location']['lat']).toFixed(6));
                    $("#geolng").val(parseFloat(response['response']['venue']['location']['lng']).toFixed(6));
                    $("#phone").val(response['response']['venue']['contact']['phone']);
                    $("#website").val(response['response']['venue']['url']);
                }
            },
        });
    });

});