<?php
require_once 'credentials.php';

/* Basado en: https://stackoverflow.com/questions/21923934/exporting-table-to-csv-via-php-button
 * */
function make_file(string $file_name, string $file_str): void
{
    $file = fopen($file_name, 'w'); // abrir el archivo donde se guarda el reporte
    fwrite($file, $file_str); // Escribir el contenido del reporte
    fclose($file); // cerrar el archivo
    header("Content-Type: application/csv; charset=UTF-8");
    header('Content-Disposition: attachment; filename=' . $file_name);
    readfile($file_name);
    die; // sin esta linea de codigo se imprime un mensaje de error dentro del archivo
}

/* Esta función convierte un resultado de una consulta a un string en
 * formato CSV
 * */
function row_to_csv($res): string
{
    $str = "";
    // Iterar en cada fila de la consulta
    while ($row = $res->fetch_assoc()) {
        $k = 0;
        foreach ($row as $col) {
            // Esto asegura no imprimir una coma si $row es la ultima columna
            $str .= $k == count($row) - 1 ? $col : $col . ',';
            $k++;
        }
        $str .= "\n"; // concatena un salto de linea
    }
    return $str;
}

// Reporte de estudiantes
if (isset($_POST['student_report'])) {
    $sql = "SELECT * FROM students_report";
    $res = $conn->query($sql);
    $file_str = row_to_csv($res); // convertir la consulta a un string
    make_file('reporte_estudiantes.csv', $file_str); // crear el archivo y guardarlo
}

// Reporte de tutores
if (isset($_POST['tutor_report'])) {
    $sql = "SELECT * FROM tutors_report";
    $res = $conn->query($sql);
    $file_str = row_to_csv($res);
    make_file('reporte_tutores.csv', $file_str);
}

if (isset($_POST['tutoring_report'])) {
    $sql = "SELECT * FROM tutoring_report";
    $res = $conn->query($sql);
    $file_str = row_to_csv($res);
    make_file('reporte_tutorias.csv', $file_str);
}

if (isset($_POST['consulting_report'])) {
    $sql = "SELECT * FROM consulting_report";
    $res = $conn->query($sql);
    $file_str = row_to_csv($res);
    make_file('reporte_asesorias.csv', $file_str);
}

// No se necesita ponerlo en cada if ya que todos redirigen a la misma página
header('Location: index.php');
