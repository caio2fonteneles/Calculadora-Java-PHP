
<?php

// Define que a resposta será em formato JSON
header("Content-Type: application/json; charset=UTF-8");

// Recebendo os dados enviados pelo JavaScript
$numero1 = $_POST["numero1"] ?? null;
$numero2 = $_POST["numero2"] ?? null;
$operacao = $_POST["operacao"] ?? null;

// Verificando se os dados foram enviados corretamente
if (!is_numeric($numero1) || !is_numeric($numero2)) {

    echo json_encode([
        "sucesso" => false,
        "erro" => "Informe dois números válidos."
    ]);

    exit;
}

// Convertendo os valores para números
$numero1 = (float) $numero1;
$numero2 = (float) $numero2;

// Verificando qual operação deve ser realizada
switch ($operacao) {

    case "soma":
        $resultado = $numero1 + $numero2;
        break;

    case "subtracao":
        $resultado = $numero1 - $numero2;
        break;

    case "multiplicacao":
        $resultado = $numero1 * $numero2;
        break;

    case "divisao":

        if ($numero2 == 0) {

            echo json_encode([
                "sucesso" => false,
                "erro" => "Não é possível dividir por zero."
            ]);

            exit;
        }

        $resultado = $numero1 / $numero2;
        break;

    default:

        echo json_encode([
            "sucesso" => false,
            "erro" => "Operação inválida."
        ]);

        exit;
}

// Devolvendo o resultado em formato JSON
echo json_encode([
    "sucesso" => true,
    "resultado" => $resultado
]);

?>
