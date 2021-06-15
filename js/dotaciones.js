$(document).ready(function () {
    $('#tipoEstablecimiento').val('unifamiliar');
});
function obtenerValorA(establecimiento) {
    $('#tipoEstablecimiento').val(establecimiento);
    resetarUnifamiliar();
    resetarMultifamiliar();
    resetarOficinas();
    resetarHoteles();
    resetarColegios();
    resetearTablaCalculos();
}

function limpiar() {
    resetarUnifamiliar();
    resetarMultifamiliar();
    resetarOficinas();
    resetarHoteles();
    resetarColegios();
    resetearTablaCalculos();
}

function resetearTablaCalculos() {
    $('#dotacion_vte').val('');
    $('#resultado_vte').val('');
    $('#resTotal_vte').val('');
    $('#dotacion_cis').val('');
    $('#resultado_cis').val('');
    $('#resTotal_cis').val('');
    $('#caudal_vte').val('');
    $('#caudal_tiempo').val('');
    $('#resultado_caudal').val('');
    $('#resTotal_caudal').val('');
    $('#rTotal_caudal').val('');
    $('#resTotal_impulsion').val('');
    $('#resTotalPul_impulsion').val('');
    $('#resTotal_succion').val('');
}

function resetarUnifamiliar() {
    $('#nombre_uni').val('');
    $('#area_uni').val('');
    $('#dotacion_uni').val('');
}

function resetarMultifamiliar() {
    $('#nombre_multi').val('');
    $('#departamentos_multi').val('');
    $('#pisos_multi').val('');
    $('#dotacion_multi').val('');
    $('#total_multi').val('');
}

function resetarOficinas() {
    $('#nombre_ofi').val('');
    $('#area_ofi').val('');
    $('#piso_ofi').val('');
    $('#total_ofi').val('');
}

function resetarHoteles() {
    $('#nombre_hotel').val('');
    $('#dormi_hotel').val('');
    $('#total_hotel').val('');
}

function resetarColegios() {
    $('#nombre_cole').val('');
    $('#nombre_cole').val('');
    $('#persoResi').val('');
    $('#alumResi').val('');
    $('#persoNoresi').val('');
    $('#alumNoresi').val('');
    $('#persoResiTotal').val('');
    $('#alumResiTotal').val('');
    $('#persoNoresiTotal').val('');
    $('#alumNoresiTotal').val('');
    $('#dotacionTotalcole').val('');
}

$("#area_uni").keyup(function () {
    var valor = $(this).val();
    var valorArea = parseInt(valor);
    var data = 'valorArea=' + valorArea;
    var ruta = URLs + 'inicio/calcularDotacion';
    $.ajax({
        type: "GET",
        url: ruta,
        data: data,
        success: function (rpta) {
            var dotacion = '';
            if (valorArea >= 0 && valorArea <= 200) {
                dotacion = 1500;
            } else if (valorArea <= 300) {
                dotacion = 1700;
            } else if (valorArea <= 400) {
                dotacion = 1900;
            } else if (valorArea <= 500) {
                dotacion = 2100;
            } else if (valorArea <= 600) {
                dotacion = 2200;
            } else if (valorArea <= 700) {
                dotacion = 2300;
            } else if (valorArea <= 800) {
                dotacion = 2400;
            } else if (valorArea <= 900) {
                dotacion = 2500;
            } else if (valorArea <= 1000) {
                dotacion = 2600;
            } else if (valorArea <= 1200) {
                dotacion = 2800;
            } else if (valorArea <= 1400) {
                dotacion = 3000;
            } else if (valorArea <= 1700) {
                dotacion = 3400;
            } else if (valorArea <= 2000) {
                dotacion = 3800;
            } else if (valorArea <= 2500) {
                dotacion = 4500;
            } else if (valorArea <= 3000) {
                dotacion = 5000;
            } else if (valorArea >= 3001) {
                var resta = valorArea - 3001;
                if (resta >= 100) {
                    var numVeces = Math.floor(resta / 100);
                    dotacion = 5000 + (100 * numVeces);
                } else {
                    dotacion = 5000;
                }
            } else {
                dotacion = '';
            }
            $('#dotacion_uni').val(dotacion);
            $('#dotacion_vte').val(dotacion);
            $('#dotacion_cis').val(dotacion);
            calcularvVTE(dotacion);
            calcularCIS(dotacion);
        }
    });
});


$('#residente_cole').on('change', function () {
    var valor = $(this).val();
    if (valor == 'value1') {
        var dotacion = 200;
    } else {
        var dotacion = 50;
    }
    $('#dotacion_cole').val(dotacion);
    $('#dotacion_vte').val(dotacion);
    $('#dotacion_cis').val(dotacion);
    calcularvVTE(dotacion);
    calcularCIS(dotacion);
})

function calcularvVTE(dotacion) {
    var te = 1 / 3 * dotacion;
    te = te.toFixed(2);
    $('#resultado_vte').val(te);
    $('#caudal_vte').val(te);
    var total_te = te / 1000;
    total_te = total_te.toFixed(2);
    $('#resTotal_vte').val(total_te);
}

function calcularCIS(dotacion) {
    var cis = 3 / 4 * dotacion;
    cis = cis.toFixed(2);
    $('#resultado_cis').val(cis);
    var total_cis = cis / 1000;
    total_cis = total_cis.toFixed(2);
    $('#resTotal_cis').val(total_cis);
}

$('#caudal_tiempo').keyup(function () {
    var caudal_vte = $('#caudal_vte').val();
    var caudal_tiempo = $('#caudal_tiempo').val();
    calcular_caudal_imp_suc(caudal_vte, caudal_tiempo);
});

function calcular_caudal_imp_suc(caudal_vte, caudal_tiempo) {
    var caudal = caudal_vte / caudal_tiempo;
    caudal = caudal.toFixed(2);
    $('#resultado_caudal').val(caudal);
    var total_caudal = caudal / 1000;
//    total_caudal = total_caudal.toFixed(2);
    $('#resTotal_caudal').val(total_caudal);
    $('#rTotal_caudal').val(total_caudal);
    var ope = 1.3 * Math.pow(0.08, 0.25) * Math.sqrt(total_caudal);
//    ope = ope.toFixed(6);
    $('#resTotal_impulsion').val(ope);
    var ope_conv = length(ope, 'm').to('in');
    var ope_pulgadas = ope_conv.getValue();
    var impulsion;
    var succion;

    if (ope_pulgadas <= 0.75) {
        impulsion = 0.75;
        succion = 1;
    } else if (ope_pulgadas <= 1) {
        impulsion = 1;
        succion = 1.25;
    } else if (ope_pulgadas <= 1.25) {
        impulsion = 1.25;
        succion = 1.50;
    } else if (ope_pulgadas <= 1.50) {
        impulsion = 1.50;
        succion = 2;
    } else if (ope_pulgadas <= 2) {
        impulsion = 2;
        succion = 2.50;
    } else if (ope_pulgadas <= 2.50) {
        impulsion = 2.50;
        succion = 3;
    } else if (ope_pulgadas <= 3) {
        impulsion = 3;
        succion = 4;
    } else {
        impulsion = 4;
        succion = 5;
    }
//    var ope_pulgadas_2 = ope_pulgadas.toFixed(2);
    var res_impulsion = decimalToFraction(impulsion);
    var res_succion = decimalToFraction(succion);

    $('#resTotalPul_impulsion').val(res_impulsion);
    $('#resTotal_succion').val(res_succion);
}

function guardar(data) {
    var ruta = URLs + 'inicio/guardarDotaciones';
    Swal.fire({
        title: '¿Quieres guardar los cambios?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: `Sí`,
        denyButtonText: `No`,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: ruta,
                data: data,
                success: function (rpta) {
                    console.log(rpta);
                }
            });
            Swal.fire('Se guardaron los cambios!', '', 'success')
        } else if (result.isDenied) {
            Swal.fire('No se guardaron los cambios.', '', 'info')
        }
    })
}

$('#dormitorios_multi').change(function () {
    var value = $('select[id=dormitorios_multi]').val();
    $('#dotacion_multi').val(value);
});

function calcularTotalMulti() {
    var dormitorios_multi = $('#dormitorios_multi option:selected').text();
    var departamentos_multi = $('#departamentos_multi').val();
    var pisos_multi = $('#pisos_multi').val();
    var dotacion_multi = $('#dotacion_multi').val();
    var multi = parseInt(dormitorios_multi) * parseInt(departamentos_multi) * parseInt(pisos_multi) * parseInt(dotacion_multi);
    var total_multi = $('#total_multi').val(multi);
    calculos(multi);
}

function calcularTotalOficina() {
    var dotacion_ofi = 6;
    var area_ofi = $('#area_ofi').val();
    var piso_ofi = $('#piso_ofi').val();
    var multi = parseInt(area_ofi) * parseInt(piso_ofi) * dotacion_ofi;
    var total_ofi = $('#total_ofi').val(multi);
    calculos(multi);
}

function calcularTotalHotel(numDormi) {
    var dotacion_hotel = 500;
    var multi = parseInt(numDormi) * dotacion_hotel;
    var total_hotel = $('#total_hotel').val(multi);
    calculos(multi);
}

$('#persoResi').keyup(function () {
    calcularTotalColegio('resi', this.value, 'persoResiTotal');
});

$('#alumResi').keyup(function () {
    calcularTotalColegio('resi', this.value, 'alumResiTotal');
});

$('#persoNoresi').keyup(function () {
    calcularTotalColegio('no_resi', this.value, 'persoNoresiTotal');
});

$('#alumNoresi').keyup(function () {
    calcularTotalColegio('no_resi', this.value, 'alumNoresiTotal');
});

function calcularTotalColegio(tipo, valor, id_total) {
    if (tipo == 'resi') {
        var ope = valor * 200;
        var id = $('#' + id_total).val(ope);
    } else {
        var ope = valor * 50;
        var id = $('#' + id_total).val(ope);
    }

    var persoResiTotal = $('#persoResiTotal').val();
    var alumResiTotal = $('#alumResiTotal').val();
    var persoNoresiTotal = $('#persoNoresiTotal').val();
    var alumNoresiTotal = $('#alumNoresiTotal').val();

    var suma = parseInt(persoResiTotal) + parseInt(alumResiTotal) + parseInt(persoNoresiTotal) + parseInt(alumNoresiTotal);
    var dotacionTotalcole = $('#dotacionTotalcole').val(suma);

    calculos(suma);
}

function calculos(establecimiento) {
    if (establecimiento.toString() !== 'NaN') {
        $('#dotacion_vte').val(establecimiento);
        $('#dotacion_cis').val(establecimiento);
        calcularvVTE(establecimiento);
        calcularCIS(establecimiento);
    }
}

function guardarUni() {
    var nombre_uni = $('#nombre_uni').val();
    var area_uni = $('#area_uni').val();
    var dotacion_uni = $('#dotacion_uni').val();

    var tan_elevado = $('#resTotal_vte').val();
    var cisterna = $('#resTotal_cis').val();
    var tiempo = $('#caudal_tiempo').val();
    var cau_bombeo = $('#resTotal_caudal').val();
    var impulsion = $('#resTotalPul_impulsion').val();
    var succion = $('#resTotal_succion').val();

    var data = 'nombre_uni=' + nombre_uni + '&area_uni=' + area_uni + '&dotacion_uni=' + dotacion_uni + '&establecimiento=unifamiliar' + '&tan_elevado=' + tan_elevado + '&cisterna=' + cisterna + '&cau_bombeo=' + cau_bombeo + '&impulsion=' + impulsion + '&succion=' + succion + '&tiempo=' + tiempo;
    if (nombre_uni !== '' && area_uni !== '' && dotacion_uni !== '' && tan_elevado !== '' && cisterna !== '' && cau_bombeo !== '' && impulsion !== '' && succion !== '' && tiempo !== '') {
        guardar(data);
    }

}

function guardarMulti() {
    var nombre_multi = $('#nombre_multi').val();
    var dormitorios_multi = $('#dormitorios_multi option:selected').text();
    var departamentos_multi = $('#departamentos_multi').val();
    var pisos_multi = $('#pisos_multi').val();
    var dotacion_multi = $('#dotacion_multi').val();
    var total_multi = $('#total_multi').val();

    var tan_elevado = $('#resTotal_vte').val();
    var cisterna = $('#resTotal_cis').val();
    var tiempo = $('#caudal_tiempo').val();
    var cau_bombeo = $('#resTotal_caudal').val();
    var impulsion = $('#resTotalPul_impulsion').val();
    var succion = $('#resTotal_succion').val();

    var data = 'nombre_multi=' + nombre_multi + '&dormitorios_multi=' + dormitorios_multi + '&departamentos_multi=' + departamentos_multi + '&pisos_multi=' + pisos_multi + '&dotacion_multi=' + dotacion_multi + '&total_multi=' + total_multi + '&establecimiento=multifamiliar' + '&tan_elevado=' + tan_elevado + '&cisterna=' + cisterna + '&cau_bombeo=' + cau_bombeo + '&impulsion=' + impulsion + '&succion=' + succion + '&tiempo=' + tiempo;
    if (dormitorios_multi !== '' && departamentos_multi !== '' && pisos_multi !== '' && dotacion_multi !== '' && total_multi !== '' && tan_elevado !== '' && cisterna !== '' && cau_bombeo !== '' && impulsion !== '' && succion !== '' && tiempo !== '') {
        guardar(data);
    }
}

function guardarOfi() {
    var nombre_ofi = $('#nombre_ofi').val();
    var area_ofi = $('#area_ofi').val();
    var piso_ofi = $('#piso_ofi').val();
    var dotacion_ofi = $('#dotacion_ofi').val();
    var total_ofi = $('#total_ofi').val();

    var tan_elevado = $('#resTotal_vte').val();
    var cisterna = $('#resTotal_cis').val();
    var tiempo = $('#caudal_tiempo').val();
    var cau_bombeo = $('#resTotal_caudal').val();
    var impulsion = $('#resTotalPul_impulsion').val();
    var succion = $('#resTotal_succion').val();

    var data = 'nombre_ofi=' + nombre_ofi + '&area_ofi=' + area_ofi + '&piso_ofi=' + piso_ofi + '&dotacion_ofi=' + dotacion_ofi + '&total_ofi=' + total_ofi + '&establecimiento=oficinas' + '&tan_elevado=' + tan_elevado + '&cisterna=' + cisterna + '&cau_bombeo=' + cau_bombeo + '&impulsion=' + impulsion + '&succion=' + succion + '&tiempo=' + tiempo;
    if (nombre_ofi !== '' && area_ofi !== '' && piso_ofi !== '' && dotacion_ofi !== '' && total_ofi !== '' && tan_elevado !== '' && cisterna !== '' && cau_bombeo !== '' && impulsion !== '' && succion !== '' && tiempo !== '') {
        guardar(data);
    }

}

function guardarHotel() {
    var nombre_hotel = $('#nombre_hotel').val();
    var dormi_hotel = $('#dormi_hotel').val();
    var dotacion_hotel = $('#dotacion_hotel').val();
    var total_hotel = $('#total_hotel').val();

    var tan_elevado = $('#resTotal_vte').val();
    var cisterna = $('#resTotal_cis').val();
    var tiempo = $('#caudal_tiempo').val();
    var cau_bombeo = $('#resTotal_caudal').val();
    var impulsion = $('#resTotalPul_impulsion').val();
    var succion = $('#resTotal_succion').val();

    var data = 'nombre_hotel=' + nombre_hotel + '&dormi_hotel=' + dormi_hotel + '&dotacion_hotel=' + dotacion_hotel + '&total_hotel=' + total_hotel + '&establecimiento=hoteles' + '&tan_elevado=' + tan_elevado + '&cisterna=' + cisterna + '&cau_bombeo=' + cau_bombeo + '&impulsion=' + impulsion + '&succion=' + succion + '&tiempo=' + tiempo;
    if (nombre_hotel !== '' && dormi_hotel !== '' && dotacion_hotel !== '' && total_hotel !== '' && tan_elevado !== '' && cisterna !== '' && cau_bombeo !== '' && impulsion !== '' && succion !== '' && tiempo !== '') {
        guardar(data);
    }
}

function guardarCole() {
    var nombre_cole = $('#nombre_cole').val();
    var persoResi = $('#persoResi').val();
    var alumResi = $('#alumResi').val();
    var persoNoresi = $('#persoNoresi').val();
    var alumNoresi = $('#alumNoresi').val();

    var persoResiTotal = $('#persoResiTotal').val();
    var alumResiTotal = $('#alumResiTotal').val();
    var persoNoresiTotal = $('#persoNoresiTotal').val();
    var alumNoresiTotal = $('#alumNoresiTotal').val();

    var dotacionTotalcole = $('#dotacionTotalcole').val();

    var tan_elevado = $('#resTotal_vte').val();
    var cisterna = $('#resTotal_cis').val();
    var tiempo = $('#caudal_tiempo').val();
    var cau_bombeo = $('#resTotal_caudal').val();
    var impulsion = $('#resTotalPul_impulsion').val();
    var succion = $('#resTotal_succion').val();

    var data = 'nombre_cole=' + nombre_cole + '&persoResi=' + persoResi + '&alumResi=' + alumResi + '&persoNoresi=' + persoNoresi + '&alumNoresi=' + alumNoresi + '&persoResiTotal=' + persoResiTotal + '&alumResiTotal=' + alumResiTotal + '&persoNoresiTotal=' + persoNoresiTotal + '&alumNoresiTotal=' + alumNoresiTotal + '&dotacionTotalcole=' + dotacionTotalcole + '&establecimiento=colegios' + '&tan_elevado=' + tan_elevado + '&cisterna=' + cisterna + '&cau_bombeo=' + cau_bombeo + '&impulsion=' + impulsion + '&succion=' + succion + '&tiempo=' + tiempo;
    if (nombre_cole !== '' && nombre_cole !== '' && persoResi !== '' && alumResi !== '' && persoNoresi !== '' && alumNoresi !== '' && persoResiTotal !== '' && alumResiTotal !== '' && persoNoresiTotal !== '' && alumNoresiTotal !== '' && alumNoresiTotal !== '' && dotacionTotalcole !== '' && tan_elevado !== '' && cisterna !== '' && cau_bombeo !== '' && impulsion !== '' && succion !== '' && tiempo !== '') {
        guardar(data);
    }
}

function guardarDotaciones() {
    var establecimiento = $('#tipoEstablecimiento').val();
    if (establecimiento == 'unifamiliar') {
        guardarUni();
    } else if (establecimiento == 'multifamiliar') {
        guardarMulti();
    } else if (establecimiento == 'oficinas') {
        guardarOfi();
    } else if (establecimiento == 'hoteles') {
        guardarHotel();
    } else {
        guardarCole();
    }
}


function abrirModalCalculos(id, establecimiento) {
    $("#modal_dotaciones_calculos").modal("show");
    var data = 'id=' + id + '&establecimiento=' + establecimiento;
    var ruta = URLs + 'inicio/mostrarCalculosDotaciones';
    $.ajax({
        type: "GET",
        url: ruta,
        data: data,
        success: function (rpta) {
            var objeto = JSON.parse(rpta);
            if (establecimiento == 'unifamiliar') {
                var total = objeto.dotacion;
            } else if (establecimiento == 'colegios') {
                var total = objeto.dotacionTotalcole;
            } else {
                var total = objeto.total;
            }
            var tiempo = objeto.tiempo;

            $('#dotacion_vte').val(total);
            $('#dotacion_cis').val(total);
            calcularvVTE(total);
            calcularCIS(total);
            var caudal_vte = $('#caudal_vte').val();
            calcular_caudal_imp_suc(caudal_vte, tiempo);
            $('#caudal_tiempo').val(tiempo);
        }
    }
    );
}


document.addEventListener("DOMContentLoaded", () => {
    const $boton = document.querySelector("#btn_pdfdotaciones");
    $boton.addEventListener("click", () => {
        const $elementoParaConvertir = document.getElementById('pdf') // <-- Aquí puedes elegir cualquier elemento del DOM
        html2pdf()
                .set({
                    hmargin: -5,
                    vmargin: 20,
                    filename: 'dotaciones.pdf',
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