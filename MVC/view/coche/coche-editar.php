<h1 class="page-header">
    <?php echo $coc->auto_id != null ? $coc->make ." - ". $coc->model : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Coche">Automoviles</a></li>
  <li class="active"><?php echo $coc->auto_id != null ? $coc->make ." - ". $coc->model : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-coche" action="?c=Coche&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="auto_id" value="<?php echo $coc->auto_id; ?>" />

    <div class="form-group">
        <label>Marca</label>
        <input type="text" name="make" value="<?php echo $coc->make; ?>" class="form-control" placeholder="Ingrese marca" data-validacion-tipo="requerido" />
    </div>

    <div class="form-group">
        <label>Modelo</label>
        <input type="text" name="model" value="<?php echo $coc->model; ?>" class="form-control" placeholder="Ingrese modelo" data-validacion-tipo="requerido" />
    </div>

    <div class="form-group">
        <label>Año</label>
        <input type="number" name="year" value="<?php echo $coc->year; ?>" class="form-control" placeholder="Ingrese año" data-validacion-tipo="requerido" />
    </div>

    <div class="form-group">
        <label>Kilometraje</label>
        <input type="number" name="mileage" value="<?php echo $coc->mileage; ?>" class="form-control" placeholder="Ingrese kilometraje" data-validacion-tipo="requerido" />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-coche").submit(function(){
            return $(this).validate();
        });
    })
</script>
