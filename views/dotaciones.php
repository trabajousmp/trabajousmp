<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br>
<div class="container">
    <div class="container-header">
        <div class="row" style="margin-top: 0px ">
            <div class="col-10">
                <h1 class=" text-black animate__animated animate__bounceInLeft" style="font-family: 'Newsreader', serif">Seleccionar Tipo De Edificaciones</h1> 

            </div>
            <div style="margin-top: 20px  "class="col-2 animate__animated animate__bounceInLeft">
                <a style="color: black; font-family: 'Pacifico' , cursive" href="<?= site_url() ?>" id="btn_home"><i class="fas fa-laptop-house fa-3x "></i>Inicio</a>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <input type="hidden" id="tipoEstablecimiento">
    <div style="margin-left: 90px">
        <ul class="nav nav-pills">
            <li class="col-md-2 col-xs-12 active" id="li" onclick="obtenerValorA('unifamiliar')"><a data-toggle="pill"  href="#Unifamiliar">Unifamiliar</a></li>
            <li class="col-md-2 col-xs-12" id="li" onclick="obtenerValorA('multifamiliar')"><a data-toggle="pill" href="#Multifamiliar">Multifamiliar</a></li>
            <li class="col-md-2 col-xs-12" id="li" onclick="obtenerValorA('oficinas')"><a data-toggle="pill" href="#Oficinas">Oficinas</a></li>
            <li class="col-md-2 col-xs-12" id="li" onclick="obtenerValorA('hoteles')"><a data-toggle="pill" href="#Hoteles">Hoteles</a></li>
            <li class="col-md-2 col-xs-12" id="li" onclick="obtenerValorA('colegios')"><a data-toggle="pill" href="#Colegios">Colegios</a></li>
        </ul>
    </div>
    <br>
    <br>
    <div id="pdf">
        <div class="tab-content" style="margin-top: 10px" >
            <div id="Unifamiliar" class="tab-pane fade in active">
                <h3>Unifamiliar <a class="fas fa-male"> </a></h3>     
                <form id="form_uni">
                    <table class="table  table-bordered ">
                        <thead>
                            <tr  class="bg-info text-white" >
                                <th>Edificio Unifamiliares</th>
                                <th>Area m²</th>
                                <th>Dotación (L/d)</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_uni">

                            <tr id="tr_uni">
                                <td class="col-xs-6"><input type="text" name="nombre_uni" id="nombre_uni" class="establecimiento" required=""></td>  
                                <td class="col-xs-3"><input type="text" name="area_uni" id="area_uni" class="establecimiento" required=""></td>
                                <td class="col-xs-3"><input type="text" name="dotacion_uni" id="dotacion_uni" class="establecimiento" readonly="">  </td>
                            </tr>
    <!--                        <tr colspan="2">
                                <td > <button class="btn btn-danger" id="btn_uni"><i class="far fa-save"> </i></button> </td>
                                <td > <button type="reset" class="btn btn-success"  id="limpiar_uni"><i class="fas fa-brush"></i></button> </td>
                            </tr>-->
                        </tbody>
                    </table>
                </form>
            </div>
            <div id="Multifamiliar" class="tab-pane fade">
                <h3> Multifamiliar <a class="fas fa-users"> </a> </h3>
                <form id="form_multi">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-info text-white" >
                                <th>Edificio Multifamiliares</th>
                                <th>N° Dormitorios</th>
                                <th>N° departamentos por piso</th>
                                <th>N° de pisos</th>
                                <th>Dotacion (L/d)</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_multi">
                            <tr id="tr_multi">
                                <td> <input type="text" name="nombre_multi" id="nombre_multi" class="establecimiento" required=""></td>
                                <td> 
                                    <select class="establecimiento" name="select"  id="dormitorios_multi" onchange="calcularTotalMulti()">
                                        <option value="" selected="" disabled="">Seleccionar</option>
                                        <?php foreach ($dota_multi as $multi) { ?>
                                            <option value="<?= $multi->dotacion ?>"><?= $multi->num_dormi ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td><input type="text" name="departamentos_multi" id="departamentos_multi" onkeyup="calcularTotalMulti()" class="establecimiento" required=""></td>
                                <td><input type="text" name="pisos_multi" id="pisos_multi" onkeyup="calcularTotalMulti()" class="establecimiento" required=""></td>
                                <td><input type="text" name="dotacion_multi" id="dotacion_multi" class="establecimiento" readonly="">  </td>
                                <td><input type="text" name="total_multi" id="total_multi" class="establecimiento" readonly="">  </td>
                            </tr> 
    <!--                        <tr>
                                <td><button class="btn btn-danger"  id="btn_multi"><i class="far fa-save"> </i> </button> </td>                      
                                <td>  <button  type="reset" class="btn btn-success"  id="limpiar_multi"><i class="fas fa-brush"> </i> </button> </td>
    
                            </tr>-->
                        </tbody>
                    </table>
                </form>
            </div>
            <div id="Oficinas" class="tab-pane fade">
                <h3>Oficinas <a class="fas fa-briefcase"> </a> </h3>
                <form id="form_ofi"> 

                    <table class="table  table-bordered ">
                        <thead>
                            <tr class="bg-info text-white" >
                                <th>Oficinas</th>
                                <th>Area m²</th>
                                <th>N° de pisos</th>
                                <th>Dotacion (L/d)</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_ofi">
                            <tr id="tr_ofi">
                                <td> <input type="text" name="nombre_ofi" id="nombre_ofi" class="establecimiento" required=""></td>
                                <td> <input type="text" name="area_ofi" id="area_ofi" class="establecimiento" onkeyup="calcularTotalOficina()" required=""></td>
                                <td> <input type="text" name="piso_ofi" id="piso_ofi" class="establecimiento" onkeyup="calcularTotalOficina()" required=""></td>
                                <td><input value="6" name="dotacion_ofi" id="dotacion_ofi" class="establecimiento" readonly="">  </td>
                                <td><input name="total_ofi" id="total_ofi" class="establecimiento" readonly="">  </td>
                            </tr>  
    <!--                        <tr>
                                <td> <button class="btn btn-danger"  id="btn_ofi"><i class="far fa-save"> </i></button> </td>                   
                                <td> <button type="reset" class="btn btn-success"  id="limpiar_ofi"><i class="fas fa-brush"> </i></button> </td>
    
                            </tr>-->
                        </tbody>
                    </table>
                </form>


            </div>
            <div id="Hoteles" class="tab-pane fade">
                <h3>Hoteles <a class="fas fa-hotel"> </a></h3>
                <form id="form_hotel">
                    <table class="table  table-bordered ">
                        <thead>
                            <tr class="bg-info text-white" >
                                <th>Hotel</th>                
                                <th>N°de dormitorios</th>
                                <th>Dotacion (L/d/dormitorio)</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_hotel">
                            <tr id="tr_hotel">
                                <td><input type="text" name="nombre_hotel" id="nombre_hotel" class="establecimiento" required=""></td>
                                <td><input type="text" name="dormi_hotel" onkeyup="calcularTotalHotel(this.value)" id="dormi_hotel" class="establecimiento" required=""></td>
                                <td><input value="500" name="dotacion_hotel" id="dotacion_hotel" class="establecimiento" readonly="">  </td>
                                <td><input name="total_hotel" id="total_hotel" class="establecimiento" readonly="">  </td>
                            </tr>    
    <!--                        <tr>
                                <td>  <button class="btn btn-danger"  id="btn_hotel"><i class="far fa-save"> </i> </button> </td>
                                <td> <button type="reset" class="btn btn-success"  id="limpiar_hotel"><i class="fas fa-brush"> </i> </button> </td>
    
                            </tr>-->

                        </tbody>
                    </table>
                </form>


            </div>

            <div id="Colegios" class="tab-pane fade">
                <h3>Colegios <a class="fas fa-school"> </a> </h3>   
                <form id="form_cole">
                    <table class="table  table-bordered ">
                        <thead>
                            <tr class="bg-info text-white" >
                                <th>Colegio</th>
                                <th>Personal Resi.</th>
                                <th>Alumno Resi.</th>
                                <th>Personal No Resi.</th>
                                <th>Alumno No Resi.</th>
                                <th>Dotación (L/d) total</th>

                            </tr>
                        </thead>
                        <tbody id="tbody_cole">
                            <tr id="tr_cole">
                                <td> <input type="text" name="nombre_cole" id="nombre_cole" class="establecimiento" required=""> </td>
                                <td> <input type="text" name="persoResi" id="persoResi"  required="" style="width: 30%"> * 200 = <input name="persoResiTotal" id="persoResiTotal" style="width: 30%" readonly="" class="establecimiento"> </td>
                                <td> <input type="text" name="alumResi" id="alumResi"  required="" style="width: 30%"> * 200 = <input name="alumResiTotal" id="alumResiTotal" style="width: 30%" readonly="" class="establecimiento">  </td>
                                <td> <input type="text" name="persoNoresi" id="persoNoresi"  required="" style="width: 30%"> * 50 = <input name="persoNoresiTotal" id="persoNoresiTotal" style="width: 30%" readonly="" class="establecimiento"></td>
                                <td> <input type="text" name="alumNoresi" id="alumNoresi"  required="" style="width: 30%"> * 50 = <input name="alumNoresiTotal" id="alumNoresiTotal" style="width: 30%" readonly="" class="establecimiento"> </td>
                                <td><input type="text" name="dotacionTotalcole" id="dotacionTotalcole" class="establecimiento" readonly=""> </td>

                            </tr> 
    <!--                        <tr>
                                <td> <button class="btn btn-danger"  id="btn_cole"><i class="far fa-save"> </i> </button> </td>
                                <td> <button type="reset" class="btn btn-success"  id="limpiar_cole"><i class="fas fa-brush"> </i> </button></td>
                            </tr>-->
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

        <div class="row no-gutters" id="">
            <div class="col-md-6" style="margin-top: 10px">
                <div class="">
                    <div class="row">
                        <div class=" offset-2 col-10">
                            <h2 style="font-family: 'Newsreader', serif ">Calculo De Las Dotaciones</h2> 
                            <p><strong>Nota:</strong> En los siguientes recuadros calcularemos tanque elevando y cisterna</p>
                            <br>
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Volumen De Tanque Elevado</a>
                                        </h4>
                                    </div>
                                    <div id="collapse1" class="panel-collapse ">
                                        <div class="panel-body">
                                            <strong>T.E : 1/3 (<input name="dotacion_vte" id="dotacion_vte" style="width: 15%" readonly="">) = <input type="text" name="resultado_vte" id="resultado_vte" style="width: 15%" readonly="">/1000 </strong> 
                                            <br><br>
                                            <strong>T.E. = <input name="resTotal_vte" id="resTotal_vte" style="width: 15%" readonly="">m³</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Cisterna</a>
                                        </h4>
                                    </div>
                                    <div id="collapse2" class="panel-collapse ">
                                        <div class="panel-body">
                                            <strong>Cisterna : 3/4 (<input name="dotacion_cis" id="dotacion_cis" style="width: 15%" readonly="">) = <input name="resultado_cis" id="resultado_cis" style="width: 15%" readonly="">/1000 </strong>
                                            <br><br>
                                            <strong>Cisterna = <input name="resTotal_cis" id="resTotal_cis" style="width: 15%" readonly="">m³</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="margin-top: 10px">
                <div class="">
                    <div class="row">
                        <div class="offset-1 col-10">
                            <h2 style="font-family: 'Newsreader', serif ">Diametro De La Tuberia</h2> 
                            <p><strong>Nota:</strong> En los siguientes recuedros calcularemos los diametros de tuberia</p>
                            <br>
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Caudal De Bombeo</a>
                                        </h4>
                                    </div>
                                    <div id="collapse3" class="panel-collapse ">
                                        <div class="panel-body">
                                            <strong>Caudal Bombeo : <input name="caudal_vte" id="caudal_vte" style="width: 15%" readonly="" >/</strong>  <input name="caudal_tiempo" id="caudal_tiempo" style="width: 15%" placeholder="Tiempo"> <strong>= <input name="resultado_caudal" id="resultado_caudal" style="width: 15%" readonly="">/1000</strong> 
                                            <br><br>
                                            <strong>Caudal Bombeo = <input name="resTotal_caudal" id="resTotal_caudal" style="width: 15%" readonly="">m³/s</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Diametro de Impulsión y Succión</a>
                                        </h4>
                                    </div>
                                    <div id="collapse4" class="panel-collapse ">
                                        <div class="panel-body">
                                            <strong>Impulsión = 1.3(2/24)^(1/4)√<input name="rTotal_caudal" id="rTotal_caudal"  readonly="" style="width: 15%"> = <input name="resTotal_impulsion" id="resTotal_impulsion" style="width: 15%" readonly="">= <input name="resTotalPul_impulsion" id="resTotalPul_impulsion" style="width: 15%" readonly="">''</strong>
                                            <br>
                                            <br>
                                            <strong>Succión = <input name="resTotal_succion" id="resTotal_succion" style="width: 15%" readonly="">''</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>  

    <div class="row" style="margin-left: 71%">
        <div class="col-md-4"> 
            <button class="btn btn-success"  id="btnGuardarDotaciones" onclick="guardarDotaciones()"><i class="fas fa-save fa-2x" style="font-size: 15px"> Guardar</i></button> 
        </div>
        <div class="col-md-4">
            <button type="reset" class="btn btn-warning"  id="limpiar" onclick="limpiar()"><i class="fas fa-brush fa-2x" style="font-size: 15px"> Limpiar</i></button>
        </div>
        <div class="col-md-4">
            <button class="btn btn-danger"  id="btn_pdfdotaciones"><i class="fas fa-file-pdf fa-2x" style="font-size: 15px"> PDF</i></button>
        </div>
    </div>
    <br>
</div>
<br>