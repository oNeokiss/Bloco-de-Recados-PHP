<?php
//inclui o arquivo de conexão
require 'conexao.php';

//verifica se o metodo de requisiçao é post
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nome = htmlspecialchars($_POST['nome']);
    $mensagem = htmlspecialchars($_POST['mensagem']);
    $telefone = htmlspecialchars($_POST['telefone']);

// Cria a instrução SQL para inserir um novo recado
$sql = "INSERT INTO recados (nome, mensagem, telefone) VALUES (:nome, :mensagem, :telefone)";

$stmt = $pdo ->prepare($sql);
$stmt -> execute([':nome' => $nome, ':mensagem' => $mensagem, ':telefone' => $telefone]);

}

//Realizar uma consulta no banco de dados para trazer os recados
//FetchAll() retorna todos os resultados em um array
$recados=$pdo->query("Select*from recados order by data_envio DESC")
->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloco de Recados</title>
</head>
<body>
        <h1>Deixe seu Recado!</h1>
        <!--formulario html para enviar novos recados -->
        <form method = "post" action="">
        <!--campo de texto para o usuario -->
        <input type="text" name="nome" placeholder="Seu Nome" require>
        <input type="text" name="telefone" placeholder="Seu tel" require>
        <textarea name="mensagem" placeholder="Sua Mensgame" require>
        </textarea>
        <button type="submit">Enviar</button>
        </form>

        <br>
        <h2> Recados Anteriores</h2>
        <?php if(count($recados) > 0): ?>
            <?php foreach($recados as $r): ?>
                <p><strong><?= $r['nome']?></strong><?= $r['mensagem']?></p>
        <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhum Recado ainda...</p>
            <?php endif; ?>
</body>
</html>