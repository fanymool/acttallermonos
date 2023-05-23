<?php $busqueda = $_POST['busqueda'];
echo "
<head>
    <meta charset='UTF-8'>
    <title>Resultados de la búsqueda: ".$busqueda."</title>
    <link rel='stylesheet' type='text/css' href='../statics/style.css'>
</head>";

$modo = $_POST['modo'];
$zona_horaria = $_POST['zonaHoraria'];
date_default_timezone_set($zona_horaria);

$fecha_actual = date('m/d/Y h:i:s a', time());
$dia = rand(1, 31);
$mes = rand(1, 12);
$anio = rand(1900, 2023);
$fecha_libro = sprintf('%02d/%02d/%04d', $mes, $dia, $anio);

$id_libro = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
echo "<table>
<thead>
    <tr>
        <th>ID del libro: $id_libro</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td>";

$palabras_aleatorias = array();
for ($i = 0; $i < 250; $i++) {
    $palabra_aleatoria = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, rand(4, 15));
    $palabras_aleatorias[] = $palabra_aleatoria;
}

$busqueda_array = explode(' ', $busqueda);
$a=0;
switch ($modo) {
    case 'normal':
        $a=0;
        $num = rand(0, 249);
        for ($a = 0; $a < $num; $a++) {
            echo $palabras_aleatorias[$a] . " ";
        }
        echo "<span class='rojo'>$busqueda</span> ";
        for ($a = $num; $a < 249; $a++) {
            echo $palabras_aleatorias[$a] . " ";
        }
        break;
    case 'palabras':
        $a=0;
        shuffle($busqueda_array);
        $num = rand(0, 249);
        for ($a = 0; $a < $num; $a++) {
            echo $palabras_aleatorias[$a] . " ";
        }
        echo "<span class='rojo'>" . implode(" ", $busqueda_array) . "</span> ";
        for ($a = $num; $a < 249; $a++) {
            echo $palabras_aleatorias[$a] . " ";
        }
        break;
    case 'desorden':
        $a=0;
        shuffle($busqueda_array);
        foreach ($busqueda_array as $palabra) {
            $palabras_aleatorias[] = $palabra;
        }
        break;
    case 'inverso':
        $a=0;
        $busqueda_array = explode(' ', $busqueda);
        $busqueda_array = array_reverse($busqueda_array);
        foreach ($busqueda_array as $index => $palabra) {
            $busqueda_array[$index] = strrev($palabra);
        }
        $busqueda_invertida = implode(' ', $busqueda_array);
        $num = rand(0, 249);
        for ($a = 0; $a < $num; $a++) {
            echo $palabras_aleatorias[$a] . " ";
        }
        echo "<span class='rojo'>$busqueda_invertida</span> ";
        for ($a = $num; $a < 249; $a++) {
            echo $palabras_aleatorias[$a] . " ";
        }
        break;
}
shuffle($palabras_aleatorias);
foreach ($palabras_aleatorias as $palabra_aleatoria) {
    if (strpos($busqueda, $palabra_aleatoria) !== false) {
        echo "<span class='rojo'>$palabra_aleatoria</span> ";
    } else {
        echo "{$palabra_aleatoria} ";
    }
}
echo "</td></tr></tbody></table>";

echo "<p>La fecha de consulta de este libro fue $fecha_actual en la zona horaria $zona_horaria</p>";
echo "<p>Fecha de creación del libro: $fecha_libro</p>";

