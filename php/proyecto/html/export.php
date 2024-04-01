<?php
require_once 'credentials.php';

/* Basado en: https://stackoverflow.com/questions/21923934/exporting-table-to-csv-via-php-button
 * */
function make_file(string $file_name, string $file_str): void
{
    // abrir el archivo donde se guarda el reporte
    $file = fopen($file_name, 'w');
    fwrite($file, $file_str);
    fclose($file);
    header("Content-Type: application/csv; charset=UTF-8");
    header('Content-Disposition: attachment; filename=' . $file_name);
    readfile($file_name);
    die; // sin esta linea, se imprime un error en el csv
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
            /*
            * se concatena cada columna separada por una coma y se asegura no
            * imprimir una coma en la ultima columna. al parecer también se
            * puede usar implode()
            * https://www.php.net/manual/es/function.implode.php
            * */
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

// Reporte de tutorias
if (isset($_POST['tutoring_report'])) {
    $sql = "SELECT * FROM tutoring_report";
    $res = $conn->query($sql);
    $file_str = row_to_csv($res);
    make_file('reporte_tutorias.csv', $file_str);
}

// Reporte de asesorías
if (isset($_POST['consulting_report'])) {
    $sql = "SELECT * FROM consulting_report";
    $res = $conn->query($sql);
    $file_str = row_to_csv($res);
    make_file('reporte_asesorias.csv', $file_str);
}

header('Location: index.php');
