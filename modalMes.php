<!-- Modal -->
<div class="modal fade" id="modal_mes" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-body">
        <div>
            <h5>Seleccione un Año:</h5>
            <select id="anio">
               <option value="2019">2019</option>
            </select>
        </div>
        <div>
            <h5>Seleccione un mes:</h5>
            <select id="mes">
              <option value="01">Enero</option>
              <option value="02">Febrero</option>
              <option value="03">Marzo</option>
              <option value="04">Abril</option>
              <option value="05">Mayo</option>
              <option value="06">Junio</option>
              <option value="07">Julio</option>
              <option value="08">Agosto</option>
              <option value="09">Septiembre</option>
              <option value="10">Octubre</option>
              <option value="11">Noviembre</option>
              <option value="12">Diciembre</option>
            </select>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="pasarMes()">Buscar</button>
      </div>

    </div>
    
  </div>
</div>