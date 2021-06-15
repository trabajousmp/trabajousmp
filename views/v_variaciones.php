<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

<script src="script.js"></script>
<br>
<div class="container">
    <div class="container-header">
        <div class="row" style="margin-top: 0px ">
            <div class="col-10">
                <h1 class=" text-black animate__animated animate__bounceInLeft" style="font-family: 'Newsreader', serif">Seleccionar Variaciones de Consumo</h1> 

            </div>
            <div style="margin-top: 20px  "class="col-2 animate__animated animate__bounceInLeft">
                <a style="color: black; font-family: 'Pacifico' , cursive" href="<?= site_url() ?>" id="btn_home"><i class="fas fa-laptop-house fa-3x "></i>Inicio</a>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <input type="hidden" id="variaciones">
    <div style="margin-left: 90px">
        <ul class="nav nav-pills">
            <li class="col-md-6 col-xs-12 active" id="li" onclick="obtenerValorA('consu_futuro')"><a data-toggle="pill"  href="#Futuro">Consumo Futuro</a></li>
            <li class="col-md-5 col-xs-12" id="li" onclick="obtenerValorA('consu_variaciones')"><a data-toggle="pill" href="#Consumo">Variaciones De Consumo</a></li>
        </ul>
    </div>
    <br>
    <br>
    
    <div class="tab-content" style="margin-top: 10px" id="pdf">
        <div id="Futuro" class="tab-pane fade in active">
            <h3 style="text-align: center">Consumo Futuro <a class="fas fa-users"> </a></h3>
            <br>

            <div class="d-flex justify-content-center">
                <div class="card-body card col-md-5  shadow p-3 mb-5 bg-light">

                    <form>
                        <div class="form-row" style="margin-left: 100px">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Ingresar Población</label>
                                <input name="futu_pobla" id="futu_pobla" type="number" class="form-control" id="formGroupExampleInput" placeholder="Cantidad de población">
                            </div>
                        </div>
                        <br>

                        <div class="form-row" style="margin-left: 100px">
                            <div class=" form-group">
                                <strong>Consumo = (Log<input name="log_pobla" id="log_pobla"readonly="" style="width: 15%"> - 1.8)/ 0.014 </strong>
                                <br>
                                <br>
                                <strong>Consumo = <input name="res_futu" id="res_futu"style="width: 15%" readonly=""> (L/hab.d)</strong>                                      
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div id="Consumo" class="tab-pane fade">
            <h3 style="text-align: center" > Variaciones De Consumo <a class="fas fa-users"> </a> </h3>
            <br>
            <div class="d-flex justify-content-center">
                <div class="card-body card col-md-10  shadow p-3 mb-5 bg-light">
                    <form>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Ingrese Año</label>
                                <input name="varia_año" id="varia_año"type="number" class="form-control"  placeholder="Cantidad de año">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Ingrese Población</label>
                                <input name="varia_pobla" id="varia_pobla" type="number" class="form-control" placeholder="Cantidad de población">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Ingrese Dotación</label>
                                <input name="varia_dota" id="varia_dota" type="number" class="form-control" placeholder="Cantidad de dotación">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputState">K1:</label>
                                <select name="varia_k1" id="varia_k1"  class="form-control">
                                    <option value="0" disabled="">Seleccione un rango</option>
                                    <option value="1">Población [1.2 a 1.5]--------1.3</option>
                                    <option value="2">Población mayores----------1.2</option>
                                    <option value="3">Población menores----------1.3</option>
                                    <option value="4">Clima uniforme---------------1.2</option>
                                    <option value="5">Clima variable----------------1.3</option>
                                    <option value="6">Población pequeñas--------2.0</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">K2:</label>
                                <select name="varia_k2" id="varia_k2" class="form-control">
                                    <option value="0" disabled="">Seleccione un rango</option>
                                    <option value="1">P [2 000 a 10 000] hab----2.5</option>
                                    <option value="2">P > 10 000 hab-------------1.8</option>
                                    <option value="3">Urbano------------------------1.8 - 2.5</option>
                                    <option value="4">Rural---------------------------1.5</option>
                                    <option value="5">P < 5 000---------------------1.8</option>
                                    <option value="6">5 000 < P < 20 000--------1.65</option>
                                    <option value="7">20 000 < P-------------------1.50</option>
                                    <option value="8">Aldeas-------------------------3.6</option>
                                    <option value="9">Pueblos-----------------------2.50</option>
                                    <option value="10">Ciudades---------------------1.50</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4 ">
                                <label for="inputState">Rango urbano</label>
                                <select disabled="" name="rangoUrbano" id="rangoUrbano" class="form-control">
                                    <option value="0" disabled="">Seleccione un rango</option>
                                    <option value="1">1.8</option>
                                    <option value="2">1.9</option>
                                    <option value="3">2.0</option>
                                    <option value="4">2.1</option>
                                    <option value="5">2.2</option>
                                    <option value="6">2.3</option>
                                    <option value="7">2.4</option>
                                    <option value="8">2.5</option>                                  
                                </select>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <h2 style="font-family: 'Newsreader', serif ;text-align: center ">Calculos</h2> 

            <div class="row no-gutters ">
                <div class="col-md-6" style="margin-top: 10px">
                    <div class="">
                        <div class="row">
                            <div class=" offset-2 col-10">

                                <br>
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Caudal Promedio Diario</a>
                                            </h4>
                                        </div>
                                        <div id="collapse5" class="panel-collapse ">
                                            <div class="panel-body">
                                                <strong>Qm = <input name="variacon_dota" id="variacon_dota" style="width: 15%" readonly=""> * <input name="variacon_pobla" id="variacon_pobla" style="width: 15%" type="text" readonly="">/ 86400 </strong> 
                                                <br><br>
                                                <strong>Qm = <input name="res_qm" id="res_qm" type="text" style="width: 15%" readonly="">(L/s)</strong>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Caudal Maximo Diario</a>
                                            </h4>
                                        </div>
                                        <div id="collapse6" class="panel-collapse ">
                                            <div class="panel-body">
                                                <strong>Qmd = <input name="variacon_k1" id="variacon_k1" style="width: 15%" readonly=""> * <input name="variacon_qm" id="variacon_qm" style="width: 15%" readonly=""> </strong>
                                                <br><br>
                                                <strong>Qmd = <input name="res_qmd" id="res_qmd" style="width: 15%" readonly=""> </strong>
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

                                <br>
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">Caudal Máximo Horario</a>
                                            </h4>
                                        </div>
                                        <div id="collapse7" class="panel-collapse ">
                                            <div class="panel-body">
                                                <strong>Qmh = <input name="variacon_k2" id="variacon_k2" style="width: 15%" readonly="" > * <input name="variacon_qm1" id="variacon_qm1" style="width: 15%" readonly="" > </strong> 
                                                <br><br>
                                                <strong>Qmh = <input name="res_qmh" id="res_qmh" style="width: 15%" readonly=""></strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">Caudal Máximo Maximórum</a>
                                            </h4>
                                        </div>
                                        <div id="collapse8" class="panel-collapse ">
                                            <div class="panel-body">
                                                <strong>Qmm = <input name="variacon_k11" id="variacon_k11" readonly="" style="width: 15%"> * <input name="variacon_k22" id="variacon_k22" style="width: 15%" readonly=""> * <input name="variacon_qm11" id="variacon_qm11" readonly="" style="width: 15%"></strong>
                                                <br>
                                                <br>
                                                <strong>Qmm = <input name="res_qmm" id="res_qmm" style="width: 15%" readonly=""></strong>                             
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
    </div>
    <br>
    <div class="row" style="margin-left: 71%">
        <div class="col-md-4"> 
            <button class="btn btn-success"  id="btnGuardar" onclick="guardarVariaciones()"><i class="fas fa-save fa-2x" style="font-size:15px "> Guardar</i> </button> 
        </div>
        <div class="col-md-4">
            <button type="reset" class="btn btn-warning"  id="limpiar" onclick="limpiar()"><i class="fas fa-brush fa-2x" style="font-size:15px "> Limpiar </i> </button>
        </div>
        <div class="col-md-4">
            <button type="reset" class="btn btn-danger"  id="btn_pdfvariaciones"><i class="fas fa-file-pdf fa-2x" style="font-size: 15px"> PDF</i> </button>
        </div>
    </div>
    <br>
</div>

<br>
