<?php
require_once 'credentials.php';

function make_file(string $file_name, string $file_str): void
{
    $file = fopen($file_name, 'a') or die("Can't create file");
    file_put_contents($file, $file_str);
}

function row_to_csv($res) : string
{
    $str = "";
    while ($row = $res->fetch_assoc()) {
        $k = 0;
        foreach ($row as $col) {
            $str .= $k == count($row) - 1 ? $col : $col . ',';
            $k++;
        }
        $str .= "\n";
    }
    return $str;
}

if (isset($_POST['student_report'])) {
    $sql = "SELECT * FROM students_tutors_view";
    $res = $conn->query($sql);
    $file_str = row_to_csv($res);
    make_file('test.csv', $file_str);
}
