$(document).ready(function () {
    $('#variaciones').val('consu_futuro');
    $('#varia_año').val(0);
    $('#varia_pobla').val(0);
    $('#varia_dota').val(0);
    $("#varia_k1 option[value='0']").prop("selected", true);
    $("#varia_k2 option[value='0']").prop("selected", true);
    $("#rangoUrbano option[value='0']").prop("selected", true);
    s
});

function obtenerValorA(variacion) {
    $('#variaciones').val(variacion);
//    limpiar();
}

function resetarConsumoFuturo() {
    $('#futu_pobla').val('');
    $('#log_pobla').val('');
    $('#res_futu').val('');
}

function resetarVariacionesConsumo() {
    $('#variacon_pobla').val('');
    $('#variacon_dota').val('');
    $("#varia_k1 option[value='0']").prop("selected", true);
    $("#varia_k2 option[value='0']").prop("selected", true);
    $("#rangoUrbano option[value='0']").prop("selected", true);


    $('#variacon_pobla').val('');
    $('#variacon_dota').val('');
    $('#res_qm').val(' ');
    $('#variacon_qm').val('');
    $('#variacon_qm1').val('');
    $('#variacon_qm11').val('');

    $('#variacon_k1').val('');
    $('#res_qmd').val('');
    $('#variacon_k11').val('');

    $('#variacon_k2').val('');
    $('#res_qmh').val('');
    $('#variacon_k22').val('');

    $('#res_qmm').val('');
}

function limpiar() {
    console.log('limpiar');
    $('#varia_año').val(0);
    $('#varia_pobla').val(0);
    $('#varia_dota').val(0);
    resetarConsumoFuturo();
    resetarVariacionesConsumo();
}

$('#futu_pobla').keyup(function () {
    var futu_pobla = $('#futu_pobla').val();
    calcularConsumoFuturo(futu_pobla);
});

function calcularConsumoFuturo(futu_pobla) {
    var log_pobla = $('#log_pobla').val(futu_pobla);
    var ope = (Math.log(futu_pobla) - 1.8) / 0.014;
    ope = ope.toFixed(2);
    var res_futu = $('#res_futu').val(ope);
}

$('#varia_pobla').keyup(function () {
    var varia_pobla = $('#varia_pobla').val();
    var variacon_pobla = $('#variacon_pobla').val(varia_pobla);
    calcularQm();
    calcularK1();
    calcularK2();
    calcularQmm();
});

$('#varia_dota').keyup(function () {
    var varia_dota = $('#varia_dota').val();
    var variacon_dota = $('#variacon_dota').val(varia_dota);
    calcularQm();
    calcularK1();
    calcularK2();
    calcularQmm();
});

$('#varia_k1').change(function () {
    calcularQm();
    calcularK1();
    calcularK2();
    calcularQmm();
});

$('#varia_k2').change(function () {
    calcularQm();
    calcularK1();
    calcularK2();
    calcularQmm();
});

$('#rangoUrbano').change(function () {
    calcularQm();
    calcularK1();
    calcularK2();
    calcularQmm();
});

function calcularQm() {
    var variacon_pobla = $('#variacon_pobla').val();
    var variacon_dota = $('#variacon_dota').val();
    if (variacon_pobla !== '' && variacon_dota !== '') {
        var ope = (variacon_dota * variacon_pobla) / 86400;
        ope = ope.toFixed(2);
        var res_qm = $('#res_qm').val(ope);
        var variacon_qm = $('#variacon_qm').val(ope);
        var variacon_qm1 = $('#variacon_qm1').val(ope);
        var variacon_qm11 = $('#variacon_qm11').val(ope);
    }
}

function calcularK1() {
    var varia_k1 = $('#varia_k1').val();
    var variacon_qm = $('#variacon_qm').val();
    var k1;
    if (varia_k1 == 1) {
        k1 = 1.3;
    } else if (varia_k1 == 2) {
        k1 = 1.2;
    } else if (varia_k1 == 3) {
        k1 = 1.3;
    } else if (varia_k1 == 4) {
        k1 = 1.2;
    } else if (varia_k1 == 5) {
        k1 = 1.3;
    } else if (varia_k1 == 6) {
        k1 = 2.0;
    } else {
        k1 = '';
    }
    var variacon_k1 = $('#variacon_k1').val(k1);
    var ope = k1 * variacon_qm;
    ope = ope.toFixed(2);
    var res_qmd = $('#res_qmd').val(ope);
    var variacon_k11 = $('#variacon_k11').val(k1);
}

function calcularK2() {
    var varia_k2 = $('#varia_k2').val();
    var k2;
    if (varia_k2 == 1) {
        $('#rangoUrbano').attr('disabled', true);
        $("#rangoUrbano option[value='0']").prop("selected", true);
        k2 = 2.5;
        calculosK2(k2);
    } else if (varia_k2 == 2) {
        $('#rangoUrbano').attr('disabled', true);
        $("#rangoUrbano option[value='0']").prop("selected", true);
        k2 = 1.8;
        calculosK2(k2);
    } else if (varia_k2 == 3) {
        $('#rangoUrbano').attr('disabled', false);
    } else if (varia_k2 == 4) {
        $('#rangoUrbano').attr('disabled', true);
        $("#rangoUrbano option[value='0']").prop("selected", true);
        k2 = 1.5;
        calculosK2(k2);
    } else if (varia_k2 == 5) {
        $('#rangoUrbano').attr('disabled', true);
        $("#rangoUrbano option[value='0']").prop("selected", true);
        k2 = 1.8;
        calculosK2(k2);
    } else if (varia_k2 == 6) {
        $('#rangoUrbano').attr('disabled', true);
        $("#rangoUrbano option[value='0']").prop("selected", true);
        k2 = 1.65;
        calculosK2(k2);
    } else if (varia_k2 == 7) {
        $('#rangoUrbano').attr('disabled', true);
        $("#rangoUrbano option[value='0']").prop("selected", true);
        k2 = 1.50;
    } else if (varia_k2 == 8) {
        $('#rangoUrbano').attr('disabled', true);
        $("#rangoUrbano option[value='0']").prop("selected", true);
        k2 = 3.6;
        calculosK2(k2);
    } else if (varia_k2 == 9) {
        $('#rangoUrbano').attr('disabled', true);
        $("#rangoUrbano option[value='0']").prop("selected", true);
        k2 = 2.50;
        calculosK2(k2);
    } else if (varia_k2 == 10) {
        $('#rangoUrbano').attr('disabled', true);
        $("#rangoUrbano option[value='0']").prop("selected", true);
        k2 = 1.50;
        calculosK2(k2);
    } else {
        $('#rangoUrbano').attr('disabled', true);
        $("#rangoUrbano option[value='0']").prop("selected", true);
        k2 = '';
        calculosK2(k2);
    }
}

function calculosK2(k2) {
    var variacon_qm = $('#variacon_qm').val();
    var variacon_k2 = $('#variacon_k2').val(k2);
    var ope = k2 * variacon_qm;
    ope = ope.toFixed(2);
    var res_qmh = $('#res_qmh').val(ope);
    var variacon_k22 = $('#variacon_k22').val(k2);
}

$('#rangoUrbano').change(function () {
    var k2 = $('#rangoUrbano option:selected').text();
    calculosK2(k2);
})

function calcularQmm() {
    var variacon_k11 = $('#variacon_k11').val();
    var variacon_k22 = $('#variacon_k22').val();
    var variacon_qm11 = $('#variacon_qm11').val();
    var ope = variacon_k11 * variacon_k22 * variacon_qm11;
//    ope = ope.toFixed(4);
    var res_qmm = $('#res_qmm').val(ope);
}

function guardar(data) {
    var ruta = URLs + 'inicio/guardarVariaciones';
    $.ajax({
        type: "GET",
        url: ruta,
        data: data,
        success: function (rpta) {
            console.log(rpta);
//            limpiar();
        }
    });
}

function guardarVariaciones() {
    var variacion = $('#variaciones').val();
    if (variacion == 'consu_futuro') {
        guardarConsumoFuturo();
    } else {
        guardarVariacionesConsumo();
    }
}

function guardarConsumoFuturo() {
    var futu_pobla = $('#futu_pobla').val();
    var res_futu = $('#res_futu').val();
    var data = 'futu_pobla=' + futu_pobla + '&res_futu=' + res_futu + '&variaciones=consu_futuro';
    if (futu_pobla !== '' && res_futu !== '') {
        guardar(data);
    }
}

function guardarVariacionesConsumo() {
    var varia_año = $('#varia_año').val();
    var varia_pobla = $('#varia_pobla').val();
    var varia_dota = $('#varia_dota').val();
    var varia_k1 = $('#variacon_k11').val();
    var varia_k2 = $('#variacon_k22').val();

    var cal1 = $('#res_qm').val();
    var cal2 = $('#res_qmd').val();
    var cal3 = $('#res_qmh').val();
    var cal4 = $('#res_qmm').val();

    var data = 'varia_año=' + varia_año + '&varia_pobla=' + varia_pobla + '&varia_dota=' + varia_dota + '&varia_k1=' + varia_k1 + '&varia_k2=' + varia_k2 + '&cal1=' + cal1 + '&cal2=' + cal2 + '&cal3=' + cal3 + '&cal4=' + cal4 + '&variaciones=consu_variaciones';
    if (varia_año !== '' && varia_pobla !== '' && varia_dota !== '' && varia_k1 !== '' && varia_k2 !== '' && cal1 !== '' && cal2 !== '' && cal3 !== '' && cal4 !== '') {
        guardar(data);
    }
}


function abrirModalConsumoFuturo(id, variaciones) {
    $("#modal_consumo_futuro").modal("show");
    var data = 'id=' + id + '&variaciones=' + variaciones;
    var ruta = URLs + 'inicio/mostrarCalculosVariaciones';
    $.ajax({
        type: "GET",
        url: ruta,
        data: data,
        success: function (rpta) {
            var objeto = JSON.parse(rpta);
            var pobla = objeto.pobla;
            calcularConsumoFuturo(pobla);
        }
    }
    );
}

function abrirModalVariacionesConsumo(id, variaciones) {
    $("#modal_variaciones_consumo").modal("show");
    var data = 'id=' + id + '&variaciones=' + variaciones;
    var ruta = URLs + 'inicio/mostrarCalculosVariaciones';
    $.ajax({
        type: "GET",
        url: ruta,
        data: data,
        success: function (rpta) {
            var objeto = JSON.parse(rpta);
            var varia_pobla = objeto.varia_pobla;
            var varia_dota = objeto.varia_dota;
            var k1 = objeto.k1;
            var k2 = objeto.k2;
            var cal1 = objeto.cal1;
            var cal2 = objeto.cal2;
            var cal3 = objeto.cal3;
            var cal4 = objeto.cal4;

            var variacon_pobla = $('#variacon_pobla').val(varia_pobla);
            var variacon_dota = $('#variacon_dota').val(varia_dota);
            var res_qm = $('#res_qm').val(cal1);

            var variacon_k1 = $('#variacon_k1').val(k1);
            var variacon_qm = $('#variacon_qm').val(cal1);
            var res_qmd = $('#res_qmd').val(cal2);

            var variacon_k2 = $('#variacon_k2').val(k2);
            var variacon_qm1 = $('#variacon_qm1').val(cal1);
            var res_qmh = $('#res_qmh').val(cal3);

            var variacon_k11 = $('#variacon_k11').val(k1);
            var variacon_k22 = $('#variacon_k22').val(k2);
            var variacon_qm11 = $('#variacon_qm11').val(cal1);
            var res_qmm = $('#res_qmm').val(cal4);

        }
    }
    );
}

document.addEventListener("DOMContentLoaded", () => {
    // Escuchamos el click del botón
    const $boton = document.querySelector("#btn_pdfvariaciones");
    $boton.addEventListener("click", () => {
        const $elementoParaConvertir = document.getElementById('pdf') // <-- Aquí puedes elegir cualquier elemento del DOM
        html2pdf()
                .set({
                    hmargin: -5,
                    vmargin: 20,
                    filename: 'variaciones.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 3, // A mayor escala, mejores gráficos, pero más peso
                        letterRendering: true,
                    },
                    jsPDF: {
                        unit: "in",
                        format: "a4",
                        orientation: 'landscape' // landscape o portrait
                    }
                })
                .from($elementoParaConvertir)
                .save()
                .catch(err => console.log(err));
    });
});

function eliminar(id, tabla, nombre_id) {
    var data = 'id=' + id + '&tabla=' + tabla + '&nombre_id=' + nombre_id;
    var ruta = URLs + 'inicio/eliminar';
    Swal.fire({
        title: '¿Está seguro que desea eliminar el registro seleccionado?',
        text: "",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#F2A71E',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "GET",
                url: ruta,
                data: data,
                success: function (rpta) {
                    Swal.fire(
                            'Anulado!',
                            'El registro se elimino con éxito.',
                            'success'
                            )
                    location.reload();
                }
            }
            );
        }
    })

}