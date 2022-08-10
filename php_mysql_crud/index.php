<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <?php if (isset($_SESSION['mensaje'])) { ?>
                        <div class="alert alert-<?= $_SESSION['tipo_mensaje'];?> alert-dismissible fade show" role="alert" >
                            <?= $_SESSION['mensaje'] ?> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div> 
            <?php session_unset(); } ?>
                       
            <div class="card card-body">
                <form action="guardar_tarea.php" method="POST">
                    <div class="mb-4">
                        <input type="text" name= "titulo" class="form-control" placeholder="Nombre de la tarea" autofocus>
                    </div>

                    <div class="mb-4">
                        <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripción de la tarea"></textarea>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" name="guardar_tarea" class="btn btn-success">Guardar tarea</button>
                    </div>
                </form>
            </div>
        </div>  

        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha de creación</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php 
                        $consultaBD = "SELECT * FROM tareas";
                        $resultadoConsultaBD = mysqli_query($conexion_bd, $consultaBD);

                        while ($row = mysqli_fetch_array($resultadoConsultaBD)) { ?>
                             <tr>
                                <td scope="col"><?php echo $row['ID_TAREA'] ?></td>
                                <td scope="col"><?php echo $row['TITULO_TAREA'] ?></td>
                                <td scope="col"><?php echo $row['DESCRIPCION_TAREA'] ?></td>
                                <td scope="col"><?php echo $row['FECHA_TAREA'] ?></td>
                                <td>
                                    <a href="editar_tarea.php?id=<?php echo $row['ID_TAREA'] ?>" class="btn btn-secondary">
                                        <i class="fas fa-marker"></i>
                                    </a>
                                    
                                    <a href="borrar_tarea.php?id=<?php echo $row['ID_TAREA'] ?>" class = "btn btn-danger">
                                        <i class="far fa-trash-alt" ></i>
                                    </a>
                                    
                                </td>
                            </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>