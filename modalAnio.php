<!-- Modal -->
<div class="modal fade" id="modal_anio" role="dialog">
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
            <h5>Visualizar por:</h5>
            <select id="opcion">
              <option value="1">Meses</option>
              <option value="2">Días</option>
            </select>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="pasarAnio()">Buscar</button>
      </div>

    </div>
    
  </div>
</div>