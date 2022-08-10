<?php 
    include("db.php");
        echo '<script>alert("Welcome to Geeks for Geeks")</script>';

    if (isset($_GET['id'])) {
        $ID_TAREA = $_GET['id'];
        $query = "DELETE FROM tareas WHERE ID_TAREA = $ID_TAREA";

        $resultado = mysqli_query($conexion_bd, $query);

        echo "$resultado";

        if (!$resultado) {
            die("Consulta fallida");
        }

        $_SESSION['mensaje'] = 'Tarea borrada';
        $_SESSION['tipo_mensaje'] = 'danger';

        header("Location: index.php");
    }
?>