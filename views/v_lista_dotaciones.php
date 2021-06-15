<!--<a href="<?= site_url() ?>">INICIO</a>
<br>-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Newsreader:wght@300;400&family=Pattaya&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Newsreader:wght@300;400&family=Pacifico&family=Pattaya&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Newsreader:wght@300;400&family=Pattaya&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Newsreader:wght@300;400&family=Pacifico&family=Pattaya&display=swap" rel="stylesheet">

<div class="container">
    <div class="container-header" style="margin-top: 30px">
        <div class="row">
            <div class="col-10">
                <h1 class=" text-black animate__animated animate__bounceInLeft" style="font-family: 'Newsreader', serif ">Tablas De Dotaciones</h1> 
            </div>
            <div class="col-2 animate__animated animate__bounceInLeft" style="margin-top: 30px">
                <a style="color: black; font-family: 'Pacifico' , cursive; font-weight: 100" href="<?= site_url() ?>" id="btn_home"><i class="fas fa-laptop-house fa-3x "></i>Inicio</a>
            </div>
        </div>
    </div>
    <br>
 

    <input type="hidden" id="tipoEstablecimiento">
    <div style="margin-left: 90px; margin-top: 20px">
        <ul class="nav nav-pills">
            <li style="font-family: 'Newsreader', serif; font-size: 18px" class="col-md-2 col-xs-12 active" id="li_unifamiliar" ><a data-toggle="pill"  href="#Unifamiliar">Unifamiliar</a></li>
            <li style="font-family: 'Newsreader', serif;font-size: 18px" class="col-md-2 col-xs-12" id="li_multifamiliar" ><a data-toggle="pill" href="#Multifamiliar">Multifamiliar</a></li>
            <li style="font-family: 'Newsreader', serif;font-size: 18px" class="col-md-2 col-xs-12" id="li_oficinas" ><a data-toggle="pill" href="#Oficinas">Oficinas</a></li>
            <li style="font-family: 'Newsreader', serif;font-size: 18px" class="col-md-2 col-xs-12" id="li_hoteles" ><a data-toggle="pill" href="#Hoteles">Hoteles</a></li>
            <li style="font-family: 'Newsreader', serif;font-size: 18px" class="col-md-2 col-xs-12" id="li_colegios" ><a data-toggle="pill" href="#Colegios">Colegios</a></li>
        </ul>
    </div>
    <br>
    <div class="tab-content" style="margin-top: 40px">
        <div id="Unifamiliar" class="tab-pane fade in active">
            <h3>Unifamiliar <a class="fas fa-male" style="color: black"> </a></h3>     
            <form id="form_uni">
                <table class="table  table-bordered ">
                    <thead>
                        <tr  class="bg-info text-white" >
                            <th>Nombre</th>
                            <th>Area m²</th>
                            <th>Dotación (L/d)</th>
                            <th>Ver Calculos</th>
                            <!--<th>PDF</th>-->
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($dota_unifamiliar as $uni) {
                            ?>
                            <tr>
                                <td><?= $uni->nombre ?></td>
                                <td><?= $uni->area ?></td>
                                <td><?= $uni->dotacion ?></td>
                                <td> <div class="text-center">
                                        <a style="color: darkblue" id="btn_ver" type="button" class="btn"  onclick="abrirModalCalculos(<?= $uni->id_unifamiliar ?>, 'unifamiliar')">
                                            <i class="fas fa-eye fa-2x "></i>
                                        </a>
                                    </div>
                                </td>
                                <!--<td> <div class="text-center"><button style="color: red" id="btn_pdf"  ><i class="far fa-file-pdf fa-2x "></i></button></div> </td>-->
                                <td> <div class="text-center"><a class="btn" type="button" style="color: black" id="btn_elimi" onclick="eliminar(<?= $uni->id_unifamiliar ?>, 'unifamiliar', 'id_unifamiliar')"><i class="fas fa-trash-alt fa-2x "></i></a> </div> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
        <div id="Multifamiliar" class="tab-pane fade">
            <h3> Multifamiliar <a class="fas fa-users" style="color: black"> </a> </h3>
            <form id="form_multi">
                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-info text-white" >
                            <th>Nombre</th>
                            <th>N° Dormitorios</th>
                            <th>N° departamentos por piso</th>
                            <th>N° de pisos</th>
                            <th>Dotacion (L/d)</th>
                            <th>Total</th>
                            <th>Ver Calculos</th>
                            <!--<th>PDF</th>-->
                            <th>Eliminar</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($dota_multifamiliar as $multi) {
                            ?>
                            <tr>
                                <td><?= $multi->nombre ?></td>
                                <td><?= $multi->n_dormitorios ?></td>
                                <td><?= $multi->n_departxpiso ?></td>  
                                <td><?= $multi->n_pisos ?></td>
                                <td><?= $multi->dotacion ?></td>
                                <td><?= $multi->total ?></td>
                                <td><div class="text-center">
                                        <a style="color: darkblue" id="btn_ver" type="button" class="btn" onclick="abrirModalCalculos(<?= $multi->id_multifamiliar ?>, 'multifamiliar')">
                                            <i class="fas fa-eye fa-2x "></i>
                                        </a>
                                    </div> 
                                </td>
                                <!--<td><div class="text-center"><a class="btn" type="button"  style="color: red" id="btn_pdf" onclick="exportarPDF(<?= $multi->id_multifamiliar ?>, 'multifamiliar')"><i class="far fa-file-pdf fa-2x "></i></a></div> </td>-->
                                <td><div class="text-center"><a style="color: black" id="btn_elimi" class="btn" type="button" onclick="eliminar(<?= $multi->id_multifamiliar ?>, 'multifamiliar', 'id_multifamiliar')"><i class="fas fa-trash-alt fa-2x "></i></a> </div> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
        <div id="Oficinas" class="tab-pane fade">
            <h3>Oficinas <a class="fas fa-briefcase" style="color: black"> </a> </h3>
            <form id="form_ofi"> 
                <table class="table  table-bordered ">
                    <thead>
                        <tr class="bg-info text-white" >
                            <th>Nombre</th>
                            <th>Area m²</th>
                            <th>N° de pisos</th>
                            <th>Dotacion (L/d)</th>
                            <th>Total</th>
                            <th>Ver Calculos</th>
                            <!--<th>PDF</th>-->
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($dota_oficinas as $ofi) {
                            ?>
                            <tr>
                                <td><?= $ofi->nombre ?></td>
                                <td><?= $ofi->area ?></td>
                                <td><?= $ofi->n_pisos ?></td>
                                <td><?= $ofi->dotacion ?></td>
                                <td><?= $ofi->total ?></td>
                                <td> <div class="text-center">
                                        <a style="color: darkblue" id="btn_ver" type="button" class="btn" onclick="abrirModalCalculos(<?= $ofi->id_oficina ?>, 'oficinas')">
                                            <i class="fas fa-eye fa-2x "></i>
                                        </a>
                                    </div>
                                </td>
                                <!--<td><div class="text-center"><a class="btn" type="button" style="color: red" id="btn_pdf" onclick="exportarPDF(<?= $ofi->id_oficina ?>, 'oficinas')"><i class="far fa-file-pdf fa-2x "></i></a></div> </td>-->
                                <td> <div class="text-center"><a class="btn" type="button" style="color: black" id="btn_elimi" onclick="eliminar(<?= $ofi->id_oficina ?>, 'oficinas', 'id_oficina')"><i class="fas fa-trash-alt fa-2x "></i></a> </div> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
        <div id="Hoteles" class="tab-pane fade">
            <h3>Hoteles <a class="fas fa-hotel" style="color: black"> </a></h3>
            <form id="form_hotel">
                <table class="table  table-bordered ">
                    <thead>
                        <tr class="bg-info text-white" >
                            <th>Nombre</th>                
                            <th>N°de dormitorios</th>
                            <th>Dotacion (L/d/dormitorio)</th>
                            <th>Total</th>
                            <th>Ver Calculos</th>
                            <!--<th>PDF</th>-->
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($dota_hoteles as $hotel) {
                            ?>
                            <tr>
                                <td><?= $hotel->nombre ?></td>
                                <td><?= $hotel->n_dormitorio ?></td>
                                <td><?= $hotel->dotacion ?></td>
                                <td><?= $hotel->total ?></td>
                                <td> <div class="text-center">
                                        <a style="color: darkblue" id="btn_ver" type="button" class="btn" onclick="abrirModalCalculos(<?= $hotel->id_hotel ?>, 'hoteles')">
                                            <i class="fas fa-eye fa-2x "></i>
                                        </a>
                                    </div>
                                </td>
                                <!--<td><div class="text-center"><a class="btn" type="button"  style="color: red" id="btn_pdf" onclick="exportarPDF(<?= $hotel->id_hotel ?>, 'hoteles')"><i class="far fa-file-pdf fa-2x "></i></a></div> </td>-->
                                <td> <div class="text-center"><a class="btn" type="button" style="color: black" id="btn_elimi" onclick="eliminar(<?= $hotel->id_hotel ?>, 'hoteles', 'id_hotel')"><i class="fas fa-trash-alt fa-2x "></i></a> </div> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
        <div id="Colegios" class="tab-pane fade">
            <h3>Colegios <a class="fas fa-school" style="color: black"> </a> </h3>   
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
                            <th>Ver Calculos</th>
                            <!--<th>PDF</th>-->
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($dota_colegios as $cole) {
                            ?>
                            <tr>
                                <td><?= $cole->nom_cole ?></td>
                                <td> <input type="text" name="persoResi" id="persoResi"  required="" style="width: 30%" class="establecimiento" value="<?= $cole->persoResi ?>"> * 200 = <input name="persoResiTotal" id="persoResiTotal" style="width: 30%" readonly="" class="establecimiento" value="<?= $cole->persoResiTotal ?>"> </td>
                                <td> <input type="text" name="alumResi" id="alumResi"  required="" style="width: 30%" class="establecimiento" value="<?= $cole->alumResi ?>"> * 200 = <input name="alumResiTotal" id="alumResiTotal" style="width: 30%" readonly="" class="establecimiento" value="<?= $cole->alumResiTotal ?>">  </td>
                                <td> <input type="text" name="persoNoresi" id="persoNoresi"  required="" style="width: 30%" class="establecimiento" value="<?= $cole->persoNoresi ?>"> * 50 = <input name="persoNoresiTotal" id="persoNoresiTotal" style="width: 30%" readonly="" class="establecimiento" value="<?= $cole->persoNoresiTotal ?>"></td>
                                <td> <input type="text" name="alumNoresi" id="alumNoresi"  required="" style="width: 30%" class="establecimiento" value="<?= $cole->alumNoresi ?>"> * 50 = <input name="alumNoresiTotal" id="alumNoresiTotal" style="width: 30%" readonly="" class="establecimiento" value="<?= $cole->alumNoresiTotal ?>"> </td>
                                <td><?= $cole->dotacionTotalcole ?></td>
                                <td><div class="text-center">
                                        <a style="color: darkblue" id="btn_ver" type="button" class="btn" onclick="abrirModalCalculos(<?= $cole->id_colegios ?>, 'colegios')">
                                            <i class="fas fa-eye fa-2x "></i>
                                        </a>
                                    </div>
                                </td>
                                <!--<td><div class="text-center"><a class="btn" type="button"  style="color: red" id="btn_pdf" onclick="exportarPDF(<?= $cole->id_colegios ?>, 'colegios')"><i class="far fa-file-pdf fa-2x "></i></a></div> </td>-->
                                <td> <div class="text-center"><a class="btn" type="button" style="color: black" id="btn_elimi" onclick="eliminar(<?= $cole->id_colegios ?>, 'colegios', 'id_colegios')"><i class="fas fa-trash-alt fa-2x "></i></a> </div> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('modal_dotaciones_calculos'); ?>







