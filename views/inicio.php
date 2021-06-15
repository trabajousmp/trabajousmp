<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->

<div class="container">
    <div class="row">
        <div class="col-md-10 offset-1 text-center"  >
            <img class=" col-xs-1 col-md-2 mx-auto d-block animate__animated animate__zoomInUp" id="fia" src="img/usmp.png" width="160" height="160" alt="" style="float: left"> 
            <h1 style="margin-top: 60px ;  font-family: 'Newsreader', serif" class="col-xs-10 col-md-10 mx-auto d-block animate__animated animate__zoomInUp">Programa para calcular Dotaciones y Variaciones</h1>
        </div> 
    </div>
    <div class="d-flex justify-content-center">
        <div class="card-body card col-md-10  shadow p-3 mb-5 bg-light">
            <div class="">
                <div class="col-xs-12 col-md-4">
                    <img style="margin-left: 10px"class="d-flex mr-3" width="300" height="250" src="img/cañito.jpg" alt="Generic placeholder image">
                </div>
                <div class="col-xs-12 col-md-8">
                    <br> 
                    <h3 style="text-align: left"class="mt-0">Dotaciones</h3>
                    <p style="text-align: justify">Se define como la cantidad de agua que requiere una población para satisfacer sus necesidades básicas. Es el promedio de los registros para un promedio anual entre el número de días que tiene el año. </p>
                    <p style="text-align: justify" class="mb-0">La dotación promedio diaria anual por habitante, se fijara en base a un estudio de consumos técnicamente justificados, sustentado en informaciones estadísticas comprobadas. </p><br>
                    <div> 
                        <a href="<?= site_url('inicio/dotaciones') ?>" class="btn btn-primary">Calcular</a>     
                        <a href="<?= site_url('inicio/listaDotaciones') ?>" class="btn btn-success">Lista</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="d-flex justify-content-center">
        <div class="card-body card col-md-10 col-sm-12 shadow p-3 mb-5 bg-light">
            <div class="">
                <div class="col-xs-12 col-md-4">
                <img style="margin-left: 10px"class="d-flex mr-3" width="300" height="250" src="img/variacion.jpg" alt="Generic placeholder image">
                </div>
                <div class=" col-xs-12 col-md-8">
                    <br> 
                    <h3 style="text-align: left"class="mt-0">Variaciones</h3>
                    <p style="text-align: justify">Los coeficientes de las variaciones de consumo del promedio anual de la demanda se deben fijar en base al análisis de información estadística comprobada. </p>
                    <p style="text-align: justify" class="mb-0">El consumo no es constante durante todo el año, inclusive se presentan variaciones durante el día, esto hace necesario que se calculen gastos máximos diarios y máximos horarios, para el cálculo de estos es necesario utilizar coeficientes de variación diaria y horaria respectivamente. </p><br>
                    <div> 
                        <a href="<?= site_url('inicio/variaciones') ?>" class="btn btn-primary">Calcular</a>     
                        <a href="<?= site_url('inicio/listaVariaciones') ?>" class="btn btn-success">Lista</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--    <div class="row">
            <div class="list-group">
                            <div class="card col-md-6 col-sm-12 shadow p-3 mb-5 bg-light rounded">
                                <img class="" src="img/cañito.jpg"  width="330" height="300" alt="" >
                                <div class="card-body ">
                                    <h4 class="card-title">Dotaciones</h4>
                                    <a href="<?= site_url('inicio/dotaciones') ?>" class="btn btn-primary">Calcular</a>     
                                    <a href="<?= site_url('inicio/listaDotaciones') ?>" class="btn btn-success">Lista</a>
                                </div>
                                <br>
                            </div>
    
                            <div class="card col-md-6 col-sm-12 shadow p-3 mb-5 bg-light rounded">
                                <img class="" src="img/variacion.jpg" width="330" height="300" alt="">
                                <div class="card-body">
                                    <h4 class="card-title">Variaciones de consumo</h4>
                                    <p class="card-text">Diseñar estructuras de agua, es necesario calcular el caudal apropiado, el cual debe combinar las necesidades de la poblacíon.</p>
                                    <a href="#!" class="btn btn-primary">Calcular</a>
                                </div>
                            </div>
            </div>
        </div>-->
</div>
