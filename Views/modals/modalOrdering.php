<div class="modal fade" id="modalFormOrdering" tabindex="-1" role="dialog" aria-labelledby="modalLabelFormOrdering" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelFormOrdering">Nuevo pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formOrdering" name="formOrdering">
                    <input id="orderingId" name="orderingId" hidden>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ordering_building_site">Obra</label>
                            <select id="ordering_building_site" name="building_site" class="form-control"></select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ordering_carried_out">Entregar el</label>
                            <input type="date" class="form-control" id="ordering_carried_out" name="carried_out" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ordering_truck">Camión</label>
                            <select id="ordering_truck" name="truck" class="form-control"></select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ordering_material">Material</label>
                            <select id="ordering_material" name="material" class="form-control"></select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ordering_machinery">Maquinaria</label>
                            <select id="ordering_machinery" name="machinery" class="form-control"></select>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="toggle-flip">
                                <label>Urgente
                                    <input type="checkbox"><span class="flip-indecator" data-toggle-on="ON"
                                                                 data-toggle-off="OFF"
                                                                 id="ordering_is_urgent" name="is_urgent">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="ordering_note">Notas</label>
                            <textarea class="form-control" id="ordering_note" name="note" maxlength="50"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

