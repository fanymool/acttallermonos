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

<<<<<<< HEAD
$palabras_aleatorias = array();
for ($i = 0; $i < 220; $i++) {
    $palabra_aleatoria = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, rand(4, 15));
    $palabras_aleatorias[] = $palabra_aleatoria;
=======

$palabras_aleatorias = array();
for ($i = 0; $i < 220; $i++) {
    $palabra_aleatoria = substr(str_shuffle("abcdefghijklmnoprstquvwxyz0123456789ABCEFGHIJKLMNOPQRSTUVWXYZ"), 0, rand(4, 15));
    $palabras_aleatorias[]= $palabra_aleatoria." ";
>>>>>>> origin/fanymorales-cambios
}
$busqueda_palabras = explode(' ',$busqueda);


$busqueda_array = explode(' ', $busqueda);
$a=0;
switch ($modo) {
<<<<<<< HEAD
    case 'normal':
        $num = rand(0, 219);
        for ($a = 0; $a < $num; $a++) {
            echo $palabras_aleatorias[$a] . " ";
        }
        echo "<span class='rojo'>$busqueda</span> ";
        for ($a = $num; $a < 219; $a++) {
            echo $palabras_aleatorias[$a] . " ";
=======
    case 'normal': 
        $a=0;
        $num = rand(0, 219);
        for($a = 0; $a < $num; $a++){
            echo $palabras_aleatorias[$a];
        }
        echo "<span class='rojo'>$busqueda</span>";
        for($a = $num; $a < 219; $a++){
            echo $palabras_aleatorias[$a];
>>>>>>> origin/fanymorales-cambios
        }
        break;

    case 'palabras':
        shuffle($busqueda_array);
        $num = rand(0, 219);
        for ($a = 0; $a < $num; $a++) {
            echo $palabras_aleatorias[$a] . " ";
        }
        echo "<span class='rojo'>$busqueda</span> ";
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

<<<<<<< HEAD
shuffle($palabras_aleatorias);

foreach ($palabras_aleatorias as $palabra_aleatoria) {
    if (strpos($busqueda, $palabra_aleatoria) !== false) {
        echo "<span class='rojo'>$palabra_aleatoria</span> ";
    } else {
        echo "{$palabra_aleatoria} ";
    }
}
=======
// $busqueda = explode(' ', $busqueda);
// $palabras_aleatorias = explode(' ', $palabras_aleatorias);

// foreach ($palabras_aleatorias as $palabra_aleatoria) {
//     if (in_array($palabra_aleatoria, $busqueda)) {
//         echo "<span class='rojo'>{$palabra_aleatoria}</span> ";
//     } else {
//         echo "{$palabra_aleatoria} ";
//     }
// }
>>>>>>> origin/fanymorales-cambios

echo "</td></tr></tbody></table>";

echo "<p>La fecha de consulta de este libro fue $fecha_actual en la zona horaria $zona_horaria</p>";
echo "<p>Fecha de creación del libro: $fecha_libro</p>";
?>
