<?php
    headerAdmin($data);
    getModal('modalOrdering',$data);
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="fa fa-users" aria-hidden="true"></i> <?= $data['page_title']?>
                <button type="button" class="btn btn-warning" title="Crear un pedido" onclick="openModal();">
                    <i class="fa fa-plus" aria-hidden="true"></i> Crear pedido
                </button>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>user"><?= $data['page_title']?></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="table-ordering"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php footerAdmin($data); ?>