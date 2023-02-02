const clientKey = document.getElementById("clientKey").innerHTML;
const type = document.getElementById("type").innerHTML;
var obj_amount = { amount: { currency: pay_currency, value: pay_amount * 100 }, "shipment_id": shipment_id, "reference_no1": reference_no1 };
async function initCheckout() {
    try {
        const paymentMethodsResponse = await callServer("/api/getPaymentMethods");
        const configuration = {
            paymentMethodsResponse: filterUnimplemented(paymentMethodsResponse),
            clientKey,
            locale: "en-GB",
            environment: "live",
            showPayButton: true,
            paymentMethodsConfiguration: {
                ideal: {
                    showImage: true,
                },
                card: {
                    hasHolderName: true,
                    holderNameRequired: true,
                    name: "Credit or debit card",
                    amount: {
                        value: pay_amount * 100,
                        currency: pay_currency,
                    },
                },
            },
            onSubmit: (state, component) => {
                var shipment_id = '';

                Object.assign(state['data'], obj_amount);
                console.log(state);
                if (state.isValid) {
                    $('#Modal').modal('show');
                    handleSubmission(state, component, "/api/initiatePayment");

                }
            },
            onAdditionalDetails: (state, component) => {
                handleSubmission(state, component, "/api/submitAdditionalDetails");
            },
        };

        const checkout = new AdyenCheckout(configuration);
        checkout.create(type).mount(document.getElementById(type));
    } catch (error) {
        console.error(error);
        alert("Error occurred. Look at console for details");
    }
}

function filterUnimplemented(pm) {
    pm.paymentMethods = pm.paymentMethods.filter((it) => [

        //"ideal",
        //"dotpay",
        //"giropay",
        //"sepadirectdebit",
        //"directEbanking",
        //"ach",
        //"alipay",
        "scheme",
    ].includes(it.type));
    return pm;
}

// Event handlers called when the shopper selects the pay button,
// or when additional information is required to complete the payment
async function handleSubmission(state, component, url) {
    try {
        const res = await callServer(url, state.data);
        handleServerResponse(res, component);
    } catch (error) {
        console.error(error);
        alert("Error occurred. Look at console for details");
    }
}

// Calls your server endpoints
async function callServer(url, data) {
    const res = await fetch(url, {
        method: "POST",
        body: data ? JSON.stringify(data) : "",
        headers: {
            "Content-Type": "application/json",
        },
    });

    return await res.json();
}


// Handles responses sent from your server to the client
function handleServerResponse(res, component) {
    //console.log(res);
    if (res.action) {
        component.handleAction(res.action);
    } else {
        switch (res.resultCode) {
            case "Authorised":


                if (res.awbNo) {
                    //alert(res.awbNo);
                    //already has AWB, then update paymeny transaction only

                    paymentProcessed(res.pspReference)
                } else {

                    //to Create AWB, then create vendor ECR, create SF AWB-IUOPAPI, update paymeny transaction

                    paymentProcessed(res.pspReference)
                    createFCR();
                    $.ajax({
                        url: '../shipments/' + shipment_id + '/createIuopOrder',
                        type: 'get',
                        //dataType: 'json',
                        //data: $('#shipper_address :input').serialize()+ "&j_country=" + $('#j_country').val(),
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                        },
                        success: function(response) {
                            $('#resultAWB').html('<h2>' + response + '</h2>');
                            $('#ModalLabel').html('AWB generated successfully.');

                            $('#modalMsg').html('Page refreshing in: ');

                            var count = 5;
                            var timer = setInterval(function() {

                                //var count = $('span.countdown').html();
                                if (count > 1) {
                                    $('span.countdown').html(count + ' Seconds');
                                    count = count - 1;
                                } else {
                                    ///myModal.modal('hide');
                                    clearInterval(timer);
                                }
                            }, 1000);

                        },
                        error: function(xhr, textStatus, errorThrown) {
                            $('#resultAWB').html('<h2>' + response + '</h2>');
                            $('#ModalLabel').html('Error');
                            setTimeout(
                                function() {
                                    myModal.modal('hide');
                                }, 5000);
                        },
                    });
                }


                $('#resultAWB').html('<h2>Payment Authorised</h2>');
                $('#ModalLabel').html('Payment has been processed sucessfully.');

                $('#modalMsg').html('Page refreshing in: ');

                var count = 3;
                var timer = setInterval(function() {
                    if (count >= 0) {
                        $('span.countdown').html(count + ' Seconds');
                        count = count - 1;
                    } else {
                        $('#Modal').modal('hide');
                        clearInterval(timer);
                    }
                }, 1000);
                //window.location.href = "/result/success";
                break;

            case "Pending":
            case "Received":
                window.location.href = "/result/pending";
                break;
            case "Refused":
                window.location.href = "/result/failed";
                break;
            default:
                window.location.href = "/result/error";
                break;
        }
    }
}

function paymentProcessed(pspReference) {
    $.ajax({
        url: '../shipments/' + shipment_id + '/paymentProcessed',
        type: 'post',
        dataType: 'json',
        data: { "pspReference": pspReference },
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
        },
        success: function(response) {


        },
        error: function(xhr, textStatus, errorThrown) {


        },
    });
}


function createFCR() {
    $.ajax({
        url: '../shipments/' + shipment_id + '/generateFCR',
        type: 'get',
        //dataType: 'json',
        //data: $('#shipper_address :input').serialize()+ "&j_country=" + $('#j_country').val(),
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
        },
        success: function(response) {


        },
        error: function(xhr, textStatus, errorThrown) {


        },
    });
}

initCheckout();