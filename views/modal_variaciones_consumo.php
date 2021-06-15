<div class="modal fade" id="modal_variaciones_consumo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Calculos de las operaciones</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <strong>Caudal promedio diario= <input name="variacon_dota" id="variacon_dota" style="width: 15%" readonly=""> * <input name="variacon_pobla" id="variacon_pobla" style="width: 15%" type="text" readonly="">/ 86400 </strong> 
                <br><br>
                <strong>Caudal promedio diario = <input name="res_qm" id="res_qm" type="text" style="width: 15%" readonly="">(L/s)</strong>
            </div>
            <br>
            <div class="modal-body">

                <strong>Caudal máximo diario = <input name="variacon_k1" id="variacon_k1" style="width: 15%" readonly=""> * <input name="variacon_qm" id="variacon_qm" style="width: 15%" readonly=""> </strong>
                <br><br>
                <strong>Caudal máximo diario = <input name="res_qmd" id="res_qmd" style="width: 15%" readonly=""> </strong>
            </div>
            <br>
            <div class="modal-body">

                <strong>Caudal máximo horario = <input name="variacon_k2" id="variacon_k2" style="width: 15%" readonly="" > * <input name="variacon_qm1" id="variacon_qm1" style="width: 15%" readonly="" > </strong> 
                <br><br>
                <strong>Caudal máximo horario = <input name="res_qmh" id="res_qmh" style="width: 15%" readonly=""></strong>
            </div>
            <br>
            <div class="modal-body">

                <strong>Caudal máximo maximórum = <input name="variacon_k11" id="variacon_k11" readonly="" style="width: 15%"> * <input name="variacon_k22" id="variacon_k22" style="width: 15%" readonly=""> * <input name="variacon_qm11" id="variacon_qm11" readonly="" style="width: 15%"></strong>
                <br>
                <br>
                <strong>Caudal máximo maximórum = <input name="res_qmm" id="res_qmm" style="width: 15%" readonly=""></strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>
