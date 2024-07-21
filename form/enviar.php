<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];
$assunto = 'E-mail do site';
$remetente = 'alexsandergalvez123@gmail.com';


$conteudo = 'nome: ' .$nome. "\r\n" .' Email: ' .$email . "\r\n" . "\r\n" . "\r\n" . 'Mensagem'. $mensagem. "\r\n";

$cabecalho = "From: " .$email;

/**esta função mail ele só serve para servidores hospedados, não serve para servidor local tipo wampp e xampp:s.
 * se eu colocar o @ no começo do mail, eu consigo ignorar a mensagem warning, isso não significa que o alerta 
 * foi solucionado,  significa que ele não vai exibir em tela aquele alerta.*/
@mail($remetente, $assunto, $conteudo, $cabecalho);

?>

<!--esse código mostra que quer um redirecionamento, após quanto tempo? com o content da para definir o tempo, tipo zeros
segundos, e sou obrigado a passar outro parâmetro, que é a url, ou seja para onde ele vai redirecionada, após zeros
segundos o rediecionamento para index.php será feito--> 
<script> alert('Enviado com sucesso');</script>
<meta http-equiv="refres" content="0; url=index.php">