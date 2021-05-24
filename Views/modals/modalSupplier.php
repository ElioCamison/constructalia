<div class="modal fade" id="modalFormSupplier" tabindex="-1" role="dialog" aria-labelledby="modalLabelFormSupplier" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelFormSupplier">Nuevo proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formSupplier" name="formSupplier">
                    <input id="supplierId" name="supplierId" hidden>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="supplier_code">Código</label>
                            <input type="text" class="form-control" id="supplier_code" name="code" placeholder="Código" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="supplier_name">Nombre</label>
                            <input type="text" class="form-control" id="supplier_name" name="name" placeholder="Nombre" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="supplier_email">Email</label>
                            <input type="email" class="form-control" id="supplier_email" name="email" placeholder="email" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="supplier_phone">Teléfono</label>
                            <input type="tel" class="form-control" id="supplier_phone" name="phone" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="supplier_address">Dirección</label>
                            <input type="text" class="form-control" id="supplier_address" name="address" placeholder="Direccion" autocomplete="off">
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

