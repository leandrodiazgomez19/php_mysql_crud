<?php
    include("db.php");

    if (isset($_POST['guardar_tarea'])) {
        $titulo_tarea = $_POST['titulo'];
        $descripcion_tarea = $_POST['descripcion'];

        $consultaBD = "INSERT INTO tareas(TITULO_TAREA, DESCRIPCION_TAREA) VALUES ('$titulo_tarea', '$descripcion_tarea')";
        
        $resultado_consulta = mysqli_query($conexion_bd, $consultaBD);

        if (!$resultado_consulta) {
            die("Consulta fallida");
        }

        $_SESSION['mensaje'] = 'Tarea guardada';
        $_SESSION['tipo_mensaje'] = 'success';

        header("Location: index.php");
    }

?>