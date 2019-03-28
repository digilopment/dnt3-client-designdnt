var basePath = "";

$(document).ready(function () {

   
});

function sendRequest(url, method = 'GET', data, success = null, error = null, callback, element = null) {
    var req_url = url;
    var req_method = method;
    var req_data = data;

    const getCircularReplacer = () => {
        const seen = new WeakSet;
        return (key, value) => {
            if (typeof value === "object" && value !== null) {
                if (seen.has(value)) {
                    return;
                }
                seen.add(value);
            }
            return value;
        };
    };

    $.ajax({
        url: req_url,
        type: req_method,
        data: {dataRequest: JSON.stringify(req_data, getCircularReplacer())},
        success: function (response) {
            var dataResponse = JSON.parse(response);
            if (dataResponse.response) {
                if (success == null && error == null) {
                    if (typeof callback == "function" && element != null) {
                        callback(dataResponse.data, element);
                    } else if (typeof callback == "function") {
                        callback(dataResponse.data);
                    }
                } else {
                    if (typeof callback == "function" && element != null) {
                        callback(dataResponse.data, element);
                    } else if (typeof callback == "function") {
                        callback(dataResponse.data);
                    }
                    swal(success.title, success.desc, "success");
                }
            } else {
                if (success == null && error == null) {
                    if (typeof callback == "function" && element != null) {
                        callback(dataResponse.data, element);
                    } else if (typeof callback == "function") {
                        callback(dataResponse.data);
                    }
                } else {
                    if (typeof callback == "function" && element != null) {
                        callback(dataResponse.data, element);
                    } else if (typeof callback == "function") {
                        callback(dataResponse.data);
                    }
                    swal(error.title, (dataResponse.data) ? dataResponse.data : error.desc, "error");
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

function sendRequestEmail(url, method, data, success, error, callback) {
    var req_url = url;
    var req_method = method;
    var req_data = data;

    const getCircularReplacer = () => {
        const seen = new WeakSet;
        return (key, value) => {
            if (typeof value === "object" && value !== null) {
                if (seen.has(value)) {
                    return;
                }
                seen.add(value);
            }
            return value;
        };
    };

    $.ajax({
        url: req_url,
        type: req_method,
        data: { dataRequest: JSON.stringify(req_data, getCircularReplacer()) },
        success: function (response) {
            if (response != null) {
                swal(success.title, success.desc, "success",{
                    buttons: false,
                    timer: 2000,
                });
                if (typeof callback == "function") {
                    callback();
                }
            } else {
                swal(error.title, error.desc, "error",{
                    buttons: false,
                    timer: 3000,
                });
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}