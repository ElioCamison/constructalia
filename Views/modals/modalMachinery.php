<div class="modal fade" id="modalFormMachinery" tabindex="-1" role="dialog" aria-labelledby="modalLabelFormMachinery" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelFormMachinery">Nueva maquinaria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formMachinery" name="formMachinery">
                    <input id="machineryId" name="machineryId" hidden>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="machinery_code">Código</label>
                            <input type="text" class="form-control" id="machinery_code" name="code" placeholder="Código" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="machinery_name">Nombre</label>
                            <input type="text" class="form-control" id="machinery_name" name="name" placeholder="Nombre" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="machinery_price_day">Precio día</label>
                            <input type="number" class="form-control" id="machinery_price_day" name="price_day" placeholder="Precio día" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="machinery_ubication">Ubicación</label>
                            <select id="machinery_ubication" name="ubication" class="form-control"></select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="machinery_family">Familia maquinaria</label>
                            <select id="machinery_family" name="family" class="form-control"></select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="machinery_total_amount">Cantidad total</label>
                            <input type="number" class="form-control" id="machinery_total_amount" name="total_amount" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="machinery_last_revision">Última revisión</label>
                            <input type="date" class="form-control" id="machinery_last_revision" name="last_revision" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <div class="toggle-flip">
                                <label>Disponibilidad
                                    <input type="checkbox" id="machinery_available" name="available">
                                    <span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                                </label>
                            </div>
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

