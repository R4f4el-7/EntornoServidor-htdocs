<?php
$dept = new DOMDocument();
$dept->load('empleados.xml');

if ($dept->schemaValidate('departamentos.xsd')) {
    echo "El fichero es válido";
} else {
    echo "Fichero no válido";
}
?>