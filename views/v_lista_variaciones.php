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
                <h1 class=" text-black animate__animated animate__bounceInLeft" style="font-family: 'Newsreader', serif ">Tablas De Variaciones</h1> 
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
            <li class="col-md-6 col-xs-12 active" id="li" ><a data-toggle="pill"  href="#Futuro">Consumo Futuro</a></li>
            <li class="col-md-5 col-xs-12" id="li" ><a data-toggle="pill" href="#Consumo">Variaciones De Consumo</a></li>

        </ul>
    </div>
    <br>
    <div class="tab-content" style="margin-top: 40px">
        <div id="Futuro" class="tab-pane fade in active">
            <h3>Consumo Futuro <a class="fas fa-users" style="color: black"> </a></h3>     
            <form id="form_uni">
                <table class="table  table-bordered ">
                    <thead>
                        <tr  class="bg-info text-white" >
                            <th>Poblacion</th>
                            <th>Ver Calculos</th>

                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($consumo_futuro as $consumo) {
                            ?>
                            <tr>
                                <td><?= $consumo->pobla ?></td>
                                <td>
                                    <div class="text-center">
                                        <a style="color: darkblue" id="btn_ver" type="button" class="btn" onclick="abrirModalConsumoFuturo(<?= $consumo->id_consu ?>, 'consu_futuro')">
                                            <i class="fas fa-eye fa-2x "></i>
                                        </a>
                                    </div>
                                </td>
<!--                                <td><div class="text-center"><a class="btn" type="button"  style="color: red" id="btn_pdf" onclick="exportarPDF(<?= $consumo->id_consu ?>, 'consu_futuro')"><i class="far fa-file-pdf fa-2x "></i></a></div> </td>-->
                                <td> <div class="text-center"><a class="btn" type="button" style="color: black" id="btn_elimi" onclick="eliminar(<?= $consumo->id_consu ?>, 'consu_futuro','id_consu')"><i class="fas fa-trash-alt fa-2x "></i></a> </div> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>

        <div id="Consumo" class="tab-pane fade">
            <h3> Variaciones De Consumo <a class="fas fa-users" style="color: black"> </a> </h3>
            <form id="form_multi">
                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-info text-white" >
                            <th>Año</th>
                            <th>Población</th>
                            <th>Dotación</th>
                            <th>K1</th>
                            <th>K2</th>
                            <th>Ver Calculos</th>
<!--                            <th>PDF</th>-->
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($variaciones_consumo as $variacion) {
                            ?>
                            <tr>
                                <td><?= $variacion->año ?></td>
                                <td><?= $variacion->varia_pobla ?></td>     
                                <td><?= $variacion->varia_dota ?></td>
                                <td><?= $variacion->k1 ?></td>     
                                <td><?= $variacion->k2 ?></td>
                                <td> <div class="text-center">
                                        <a style="color: darkblue" id="btn_ver" type="button" class="btn" onclick="abrirModalVariacionesConsumo(<?= $variacion->id_varia ?>, 'consu_variaciones')">
                                            <i class="fas fa-eye fa-2x "></i>
                                        </a>
                                    </div>
                                </td>
<!--                                <td><div class="text-center"><a class="btn" type="button"  style="color: red" id="btn_pdf" onclick="exportarPDF(<?= $variacion->id_varia ?>, 'consu_variaciones')"><i class="far fa-file-pdf fa-2x "></i></a></div> </td>-->
                                <td> <div class="text-center"><a class="btn" type="button"  style="color: black" id="btn_elimi" onclick="eliminar(<?= $variacion->id_varia ?>, 'consu_variaciones','id_varia')"><i class="fas fa-trash-alt fa-2x "></i></a> </div> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>



<?php $this->load->view('modal_consumo_futuro'); ?>
<?php $this->load->view('modal_variaciones_consumo'); ?>


