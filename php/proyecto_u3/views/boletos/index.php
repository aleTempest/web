<?php
require_once '././models/boletos.php'; 
$boletoModel = new Boleto(); 
$boletos = $boletoModel->getBoletos(); 
?>
<style>
    .btn-purple {
        color: #fff;
        background-color: #800080;
        border-color: #800080;
    }

    .btn-purple:hover {
        color: #fff;
        background-color: #9400D3;
        border-color: #9400D3;
    }

    .horarios-container {
        text-align: center;
        border: 1px solid #7d95cc;
        background-color: #dde7ee; 
        padding: 10px;
        margin-top: 10px;
        border-radius: 5px;
    }

    .horario {
        font-size: 16px;
        margin: 5px 0;
    }
</style>
<h2 class="m-0 font-weight-bold text-primary">Cartelera por rango de fecha</h2>

<a class="btn btn-success float-xl-right" href="index.php?controller=BoletosController&action=list"><i class="fa-solid fa-list"></i></a>
<form action="./index.php?controller=BoletosController&action=mostrarCarteleraFiltrada" method="POST">
    <div class="form-group">
        <label for="fecha_inicio">Fecha de inicio:</label>
        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
    </div>
    <div class="form-group">
        <label for="fecha_fin">Fecha de fin:</label>
        <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
    </div>
    <button type="submit" class="btn btn-primary">Filtrar</button>
</form>

<div class="card-columns">
    <?php
    // TODO Implementar imagenes
    foreach ($peliculas as $boleto) {
        if ($boleto['estado'] == 1) {

        echo '<div class="card" style="width: 18rem;">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $boleto['Titulo'] . '</h5>';
        echo '<img src="./views/ImgPeliculas/' . $boleto['imagen'] . '" class="card-img-top" alt="' . $boleto['imagen'] . '">';
        echo '<p class="card-text" style="text-align: center;">' . $boleto['Sinopsis'] . '</p>';
        echo '<p class="card-text">' . $boleto['Idioma'] . '</p>';
        //función getNombreGenero para obtener el nombre del género
        $nombreGenero = $boletoModel->getNombreGenero($boleto['GeneroID']);
        echo '<p class="card-text">' . $nombreGenero . '</p>';
        echo '<p class="card-text">'."Duración: " . $boleto['Duracion'] . '</p>';
        //Obtener el total de horarios para la película actual
        $peliculaID = $boleto['PeliculaID'];
        $totalHorarios = $boletoModel->countHorariosByPeliculas($peliculaID);
        //Mostrar los horarios si hay al menos uno
        if ($totalHorarios > 0) {
            echo '<div class="horarios-container">'; // Contenedor de horarios
            echo '<p class="card-text">Horarios disponibles:</p>';
            $horarios = $boletoModel->getHorariosByPeliculaID($peliculaID);
           // echo  date('Y-m-d H:i:s');
            foreach ($horarios as $horario) {
                echo '<p class="card-text horario">' . $horario['Hora'] . ' - ' . $horario['Fecha'] . '</p>'; 
            }
            echo '</div>'; 
            echo '<br>';
            echo '<div style="text-align: center;">';
            echo '<a href="./index.php?controller=BoletosController&action=add&pelicula_id=' . $boleto['PeliculaID'] . '" class="btn btn-purple">Comprar</a>';
            echo '</div>';
        } else {
            echo '<div style="text-align: center;">';
            echo '<span style="font-size: 23px; color: purple;">POR ESTRENAR</span>';
            echo '</div>';
        }
        echo '</div>'; 
        echo '</div>'; 
    }
}
    ?>
</div>
