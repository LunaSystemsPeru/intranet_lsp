function validarDocumento() {

    var parametros = {
        "ruc": $("#input_ruc").val()
    };

    $.ajax({
        data: parametros,
        url: '../controller/verificar_documento_empresa.php',
        type: 'get',
        beforeSend: function () {
            $.niftyNoty({
                type: 'info',
                icon: 'pli-exclamation icon-2x',
                message: 'Estamos buscando los datos de este cliente',
                container: 'floating',
                timer: 5000
            });
        },
        success: function (response) {
            var json = JSON.parse(response);
            var success = json.success;

            if (success === true) {
                alertarEncontradoDocumento();
                $("#input_razon_social").val(json.result.RazonSocial);
                $("#input_comercial").val(json.result.NombreComercial);
                $("#input_direccion").val(json.result.Direccion);
            } else {
                alertarErrorDocumento(json.msg);
            }
        },
        error: function () {
            alert("error al procesar");
        }
    });
}

function alertarClienteExiste() {
    $.toast({
        heading: 'Validacion de Documento',
        text: 'Este cliente ya existe!!.',
        position: 'top-right',
        loaderBg: '#fff',
        icon: 'error',
        hideAfter: 3000,
        stack: 1
    });
}

function alertarEncontradoDocumento() {
    $.niftyNoty({
        type: 'success',
        icon: 'pli-exclamation icon-2x',
        message: 'Datos Encontrados',
        container: 'floating',
        timer: 5000
    });
}

function alertarErrorDocumento(msg) {
    $.niftyNoty({
        type: 'danger',
        icon: 'pli-exclamation icon-2x',
        message: 'Error al ingresar el Documento! ' + msg,
        container: 'floating',
        timer: 5000
    });
}