<?php
$busqueda = $_POST['busqueda'];
$modo = $_POST['modo'];
$zonaHoraria = $_POST['zonaHoraria'];
date_default_timezone_set($zonaHoraria);
$fechaActual = date('m/d/Y h:i:s a', time());
$fechaLibro = date('m/d/Y', strtotime('-' . rand(1, 100) . ' years'));

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

$palabras = explode(' ', $busqueda);

$palabrasAleatorias = "";
for ($i = 0; $i < 250; $i++) {
    $palabrasAleatoria = substr(str_shuffle("loremipsumdolorsitametconsectetur"), 0, rand(4, 15));
    $palabrasAleatorias .= $palabrasAleatoria . ' ';
}

switch ($modo) {
    case 'normal':
        $palabrasAleatorias .= $busqueda;
        break;
    case 'palabras':
        shuffle($palabras);
        foreach ($palabras as $palabra) {
            $palabrasAleatorias .= $palabra . ' ';
        }
        break;
    case 'desorden':
        $palabras_desordenadas = str_shuffle($busqueda);
        $palabrasAleatorias .= $palabras_desordenadas;
        break;
}
$palabrasAleatorias = explode(' ', $palabrasAleatorias);
foreach ($palabrasAleatorias as $palabrasAleatoria) {
    if (in_array($palabrasAleatoria, $palabras)) {
        echo "<span class='rojo'>{$palabrasAleatoria}</span> ";
    } else {
        echo "{$palabrasAleatoria} ";
    }
}
echo "</td></tr></tbody></table>";
echo "<p>La fecha de consulta de este libro fue $fechaActual en $zonaHoraria</p>";
echo "<p>Fecha de creación del libro: $fechaLibro</p>";
?>
