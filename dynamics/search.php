<?php
$busqueda = $_POST['busqueda'];
$modo = $_POST['modo'];
$zona_horaria = $_POST['zona_horaria'];
date_default_timezone_set($zona_horaria);
$fecha_actual = date('m/d/Y h:i:s a', time());
$fecha_libro = date('m/d/Y', strtotime('-' . rand(1, 100) . ' years'));

echo "<style>
table {
  width: 100%;
  border-collapse: collapse;
}
table, th, td {
  border: 1px solid black;
}
.rojo {
    color: red;
}
</style>";

echo "<table>
<thead>
    <tr>
        <th>ID del libro</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td>";
//loremipsumdolorsitametconsectetur
$palabras_aleatorias = "";
for ($i = 0; $i < 220; $i++) {
    $palabra_aleatoria = substr(str_shuffle("abcdefghijklmnoprstquvwxyz123456789+-#$%&="), 0, rand(4, 15));
    $palabras_aleatorias .= $palabra_aleatoria . ' ';
}

switch ($modo) {
    case 'normal': 
        $palabras_aleatorias .= $busqueda. $palabras_aleatorias;




        break;
    case 'palabras':
        $palabras = explode(' ', $busqueda);
        shuffle($palabras);
        $busqueda = implode(' ', $palabras);
        $palabras_aleatorias .= $busqueda;
        break;
    case 'desorden':
        $palabras = explode(' ', $busqueda);
        shuffle($palabras);
        $busqueda = implode(' ', $palabras);
        $palabras_aleatorias .= $busqueda;
        break;
}

$busqueda = explode(' ', $busqueda);
$palabras_aleatorias = explode(' ', $palabras_aleatorias);

foreach ($palabras_aleatorias as $palabra_aleatoria) {
    if (in_array($palabra_aleatoria, $busqueda)) {
        echo "<span class='rojo'>{$palabra_aleatoria}</span> ";
    } else {
        echo "{$palabra_aleatoria} ";
    }
}

echo "</td></tr></tbody></table>";

echo "<p>La fecha de consulta de este libro fue {$fecha_actual} en la zona horaria {$zona_horaria}</p>";
echo "<p>Fecha de creación del libro: {$fecha_libro}</p>";
?>
