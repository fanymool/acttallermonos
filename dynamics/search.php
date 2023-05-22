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
$fecha_libro = date('m/d/Y', strtotime('-' . rand(1, 100) . ' years'));
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
for ($i = 0; $i < 220; $i++) {
    $palabra_aleatoria = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, rand(4, 15));
    $palabras_aleatorias[] = $palabra_aleatoria;
}

$busqueda_array = explode(' ', $busqueda);
$a=0;
switch ($modo) {
    case 'normal':
        $num = rand(0, 219);
        for ($a = 0; $a < $num; $a++) {
            echo $palabras_aleatorias[$a] . " ";
        }
        echo "<span class='rojo'>$busqueda</span> ";
        for ($a = $num; $a < 219; $a++) {
            echo $palabras_aleatorias[$a] . " ";
        }
        break;


    case 'palabras':
        shuffle($busqueda_array);
        $num = rand(0, 219);
        for ($a = 0; $a < $num; $a++) {
            echo $palabras_aleatorias[$a] . " ";
        }
        echo "<span class='rojo'>" . implode(" ", $busqueda_array) . "</span> ";
        for ($a = $num; $a < 219; $a++) {
            echo $palabras_aleatorias[$a] . " ";
        }
        break;


    case 'desorden':
        shuffle($busqueda_array);
        foreach ($busqueda_array as $palabra) {
            $palabras_aleatorias[] = $palabra;
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
?>
