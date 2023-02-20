<?php
$PAGINA = $_GET['pag'];


$OFFSET = ($PAGINA - 1) * 5;
$libros = array(
    "0" => "Vacio"
);
$MYSQLI = new mysqli('localhost', 'root', '1234', 'labbases1');

if ($MYSQLI->connect_errno) {
    $libros = array(
        "0" => "Error al conectarse a la base de datos"
    );
    echo json_encode($libros);
    exit;
}
$SQL = "SELECT ID, NOMBRE , AUTOR, EDITORIAL FROM LIBRO LIMIT 5 OFFSET " . $OFFSET;
$RESULTADO = $MYSQLI->query($SQL);

if (!$RESULTADO) {
    $libros = array(
        "0" => "NO HAY PAGINA ANTERIOR"

    );
    echo json_encode($libros);
    exit;
}
$libros = array();
for ($i = 0; $i < 5; $i++) {
    $libro = $RESULTADO->fetch_assoc();
    if ($libro) {
        $libros[$i] = $libro["NOMBRE"] . " - " . $libro["AUTOR"];
    }
}


if (count($libros) == 0) {
    $libros = array(
        "0" => "NO HAY PAGINA SIGUIENTE"
    );
    echo json_encode($libros);
    exit;
}
$RESULTADO->free();
$MYSQLI->close();
function utf8ize($d)
{
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string($d)) {
        return utf8_encode($d);
    }
    return $d;
}
echo json_encode(utf8ize($libros));
exit;
