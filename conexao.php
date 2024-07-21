<?php
require_once ("config.php");

//para que seja definida uma área onde estarei trabalhando com o banco de dados
//se quiser mais possibilidades coloca o nome da função no google que mostrará outras
//se eu fiz um usuário e o usuário logou no sistema, se eu quiser pegar exatamente a hora que ele logou, é esse 
//fuzio horário que tem que pegar como base.
//para quem está com o fuso horário de brasilía pode usar o 'America/Sao_Paulo'
//esse comando dinifi a data e hora com base no local selecionado
date_default_timezone_set('America/Sao_Paulo'); 
//abaixo pedi o nome do banco, nome do servidor, nome do usuário e a senha, mas ela não existe
try {
    $pdo =  new PDO("mysql:dbname=$bd;host=$servidor", "$usuario", "$senha");  
    //echo "Conectado com sucesso";
} catch (Exception $e) {
    //A variavel $e explica o tipo de erro gerado
    echo "Erro ao tentar conectar com o banco de dados" .$e;
}

?>