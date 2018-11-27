<?php
require_once(RUTA_APP."/vistas/inc/header.php");
?>
<div class="card card-body bg-light mt-5">
    <h2>Borrar usuario</h2>
    <form action="<?php echo RUTA_URL ?>/paginas/borrar/<?php echo $datos['id'] ?>" method="POST">
        <div class="form-group">
          Confirma el borrado del usuario <?php echo $datos['nombre'] ?>
        </div>
        <input type="submit" class="btn btn-danger" value="Borrar usuario">
        <a href="<?php echo RUTA_URL ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?php
require_once(RUTA_APP."/vistas/inc/footer.php");
?>
