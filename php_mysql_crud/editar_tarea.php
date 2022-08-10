<?php 
    include("db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM tareas WHERE ID_TAREA = $id";
        $result = mysqli_query($conexion_bd, $query);

        if ($result) {
            $row = mysqli_fetch_array($result);
            $titulo_tarea = $row['TITULO_TAREA'];
            $descripcion_tarea = $row['DESCRIPCION_TAREA'];
        }
    }

    if (isset($_POST['editar'])) {
        $id = $_GET['id'];
        $titulo_tarea_nuevo = $_POST['titulo'];
        $descripcion_tarea_nuevo = $_POST['descripcion'];

        $query = "UPDATE tareas set TITULO_TAREA = '$titulo_tarea_nuevo', DESCRIPCION_TAREA = '$descripcion_tarea_nuevo' WHERE ID_TAREA = $id";

        $result = mysqli_query($conexion_bd, $query);

        $_SESSION['mensaje'] = 'Tarea actualizada';
        $_SESSION['tipo_mensaje'] = 'success';

        header("Location: index.php");

    }
?>

<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar_tarea.php?id=<?php echo $_GET['id'] ?>" method="POST">
                        <div class="mb-4">
                            <input type="text" name= "titulo" class="form-control" placeholder="Nombre de la tarea" value="<?php echo $titulo_tarea; ?>" autofocus>
                        </div>

                        <div class="mb-4">
                            <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripción de la tarea" ><?php echo $descripcion_tarea; ?></textarea>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" name="editar" class="btn btn-danger">Editar tarea</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php")?>