<h1 class="page-header">Automoviles</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Coche&a=Crud">Nuevo coche</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:120px;">Marca</th>
            <th style="width:120px;">Modelo</th>
            <th style="width:120px;">Año</th>
            <th style="width:120px;">Kilometraje</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($coches as $coc){ ?>
        <tr>
            <td><?php echo $coc->make; ?></td>
            <td><?php echo $coc->model; ?></td>
            <td><?php echo $coc->year; ?></td>
            <td><?php echo $coc->mileage; ?></td>
            <td>
                <a href="?c=Coche&a=Crud&auto_id=<?php echo $coc->auto_id; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Coche&a=Eliminar&auto_id=<?php echo $coc->auto_id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
