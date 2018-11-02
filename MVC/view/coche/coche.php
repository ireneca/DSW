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
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->make; ?></td>
            <td><?php echo $r->model; ?></td>
            <td><?php echo $r->year; ?></td>
            <td><?php echo $r->mileage; ?></td>
            <td>
                <a href="?c=Coche&a=Crud&id=<?php echo $r->auto_id; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Coche&a=Eliminar&id=<?php echo $r->auto_id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
