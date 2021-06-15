<div class="modal fade" id="modal_dotaciones_calculos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Calculos de las operaciones</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <strong>Tanque Elevado = 1/3 (<input name="dotacion_vte" id="dotacion_vte" style="width: 15%" readonly="">) = <input type="text" name="resultado_vte" id="resultado_vte" style="width: 15%" readonly="">/1000 </strong> 
                <br><br>
                <strong>Tanque Elevado = <input name="resTotal_vte" id="resTotal_vte" style="width: 15%" readonly="">m³</strong>
            </div>
            <br>
            <div class="modal-body">
                <strong>Cisterna = 3/4 (<input name="dotacion_cis" id="dotacion_cis" style="width: 15%" readonly="">) = <input name="resultado_cis" id="resultado_cis" style="width: 15%" readonly="">/1000 </strong>
                <br><br>
                <strong>Cisterna = <input name="resTotal_cis" id="resTotal_cis" style="width: 15%" readonly="">m³</strong>
            </div>
            <br>
            <div class="modal-body">
                <strong>Caudal Bombeo = <input name="caudal_vte" id="caudal_vte" style="width: 15%" readonly="" >/</strong>  <input name="caudal_tiempo" id="caudal_tiempo" style="width: 15%" readonly=""> <strong>= <input name="resultado_caudal" id="resultado_caudal" style="width: 15%" readonly="">/1000</strong> 
                <br><br>
                <strong>Caudal Bombeo = <input name="resTotal_caudal" id="resTotal_caudal" style="width: 15%" readonly="">m³/s</strong>
            </div>
            <br>
            <div class="modal-body">
                <strong>Impulsión = 1.3(2/24)^(1/4)√<input name="rTotal_caudal" id="rTotal_caudal"  readonly="" style="width: 15%"> = <input name="resTotal_impulsion" id="resTotal_impulsion" style="width: 15%" readonly="">= <input name="resTotalPul_impulsion" id="resTotalPul_impulsion" style="width: 15%" readonly="">''</strong>
                <br>
                <br>
                <strong>Succión = <input name="resTotal_succion" id="resTotal_succion" style="width: 15%" readonly="">''</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>
