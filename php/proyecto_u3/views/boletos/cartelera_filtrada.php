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
<a class="btn btn-success"
        href="./index.php?controller=BoletosController&action=index">
        <i class="fa-solid fa-plus"></i></a>
        <?php if (!empty($carteleras)): ?>
    <div class="container-fluid mt-4">
        <div class="card-columns">
            <?php foreach ($carteleras as $cartelera): ?>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $cartelera['Titulo'] ?></h5>
                        <img src="./views/ImgPeliculas/<?= $cartelera['imagen'] ?>" class="card-img-top" alt="<?= $cartelera['imagen'] ?>">
                        <p class="card-text" style="text-align: center;"><?= $cartelera['Sinopsis'] ?></p>
                        <p class="card-text"><?= $cartelera['Idioma'] ?></p>
                        <p class="card-text"><?= $boletoModel->getNombreGenero($cartelera['GeneroID']) ?></p>
                        <p class="card-text">Duración: <?= $cartelera['Duracion'] ?></p>
                      <?php  //Obtener el total de horarios para la película actual
                        $peliculaID = $cartelera['PeliculaID'];
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
                            echo '<a href="./index.php?controller=BoletosController&action=add&pelicula_id=' . $cartelera['PeliculaID'] . '" class="btn btn-purple">Comprar</a>';
                            echo '</div>';
                        } else {
                            echo '<div style="text-align: center;">';
                            echo '<span style="font-size: 23px; color: purple;">POR ESTRENAR</span>';
                            echo '</div>';
                        }
                    
                ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php else: ?>
    <p>No se encontraron películas en el rango de fechas especificado.</p>
<?php endif; ?>
