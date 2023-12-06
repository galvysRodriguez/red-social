const paypalButtons = document.querySelectorAll('.premium');

paypalButtons.forEach(function(button) {
    token = $('meta[name="csrf-token"]').attr('content')
    $.ajax({
        type: "POST",
        url: 'premium',
        beforeSend:function(xhr){
            xhr.setRequestHeader('X-CSRF-TOKEN', token)
        },
        success: function(response) {
            // Manejar la respuesta exitosa aquí
            console.log(response);

            paypal.Buttons({
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: 1
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    actions.order.capture().then(function(details) {
                        // Manejar aprobación aquí si es necesario
                    });
                },
                onCancel: function(data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ha ocurrido un error en el pago',
                      })
                    console.log(data);
                }
            }).render(button);
        },
        error: function(error) {
            // Manejar errores aquí
            console.error(error);
        }
    });
});
