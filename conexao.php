<?php
//Define o endereço do servidor onde está o banco de dados
//Localhost - significa que o banco está na mesma máquina que o código
$host = 'localhost';

//Define o nome do BD
$db = 'bloco_recados';

//Define o nome do usúario do BD
$user = 'root';

//Define a senha do banco de dados
$pass = '';

//Defome o padrão de caracteres usados na comunicação
$charset = 'utf8mb4';

//Monsta a string de conexão informando ao PHP os dados do BD
// DSN - Dara Source Name
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

//Cria um array de opções para configurar a conexão
$options = [
    //Define o modo de erro para Exceções
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    //Define o modo padrão de retorno de dados
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

//Usa um bloco Try-catch para validar a conexao BD
try{
    $pdo= new PDO($dsn, $user, $pass, $options);
} catch(\PDOException $e){
    //Caso ocorra um erro
    die('Erro na Conexão: '. $e ->getMessage());
}

?>