<?php
$jsonFile = "data.json";

if (isset($_GET['status'])) {
    $status = $_GET['status'];
    if ($status == 'read') {
        $jsonContent = file_get_contents($jsonFile);
        $data = json_decode($jsonContent, true);
    } else {
        if ($status == 1) {
            $data = array(
                "status" => 1,
                "lastResponse" => "Aberto"
            );
        } elseif ($status == 0) {
            $data = array(
                "status" => 0,
                "lastResponse" => "Fechado"
            );
        } else {
            $data = array(
                "status" => "Erro",
                "lastResponse" => "Parâmetro 'status' inválido"
            );
        }
        file_put_contents($jsonFile, json_encode($data));
    }
    echo json_encode($data);
}

?>
