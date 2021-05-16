<div class="modal fade" id="modalFormCategory" tabindex="-1" role="dialog" aria-labelledby="modalLabelFormCategory" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelFormCategory">Nueva categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formCategory" name="formCategory">
                    <input id="categoryId" name="categoryId" hidden>
                    <div class="row">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="category_name">Nombre</label>
                                    <input type="text" class="form-control" id="category_name" name="name" placeholder="Nombre" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="category_priceHour">Precio hora</label>
                                    <input type="number" class="form-control" id="category_priceHour" name="price_hour" placeholder="Precio hora" autocomplete="off">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>a
        </div>
    </div>
</div>

