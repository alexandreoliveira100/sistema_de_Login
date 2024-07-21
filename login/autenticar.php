<?php 
/**
 * como o arquivo conexao.php não está dentro do mesmo diretório, está fora, para chegar até a conexão eu tenho que voltar
 * um diretório, uma pasta ai eu chego nela, para voltar um diretório eu uso ../
 */
require_once ("../conexao.php");
@session_start(); //O servidor pode dar um alert dizendo que já tem uma sessão aberta, por isso dependendo da versão do 
//php ou de quantas vezes a sessão foi chamada colocamos um @ no começo para evitar a mensagem de alerta para o usuário

$email = $_POST['email'];
$senha = $_POST['senha'];

$query = $pdo->prepare("SELECT  * FROM usuarios WHERE email = :email and senha = :senha");
$query->bindValue(":email", $email);
$query->bindValue(":senha", $senha);
$query->execute();

//essa variável $res carrega o total de linhas que foram buscadas dessa consulta do usuário
$res = $query->fetchAll(PDO::FETCH_ASSOC);

//$total_reg essa variável retorna o total de linhas que o $res trouxe
//o total de registro possui a quantidade de linhas que foram encontradas 
$total_reg = @count($res); //no count também colocamos o @ para evitar a mensagem de alerta

//esse código abaixo mostra o nível do usuário, se é cliete ou administrador
//aqui vai haver uma condição comparando pelo nível, porque se ele for administrador,
//ele entra no if e se não for entrará no else, e será o cliente
//pego o total de registro e verifico se esse total é maior do que 0 (zero), se for maior do que zero, ótimmo  ele está 
//autenticado, 
if ($total_reg > 0) {
    //CRIANDO AS VARIÁVEIS DE SESSÃO
    $_SESSION['nome_usuario']=$res[0]['nome']; 
    $_SESSION['nivel_usuario']=$res[0]['nivel']; 

    //eu so recupero informações se tive mais de um registro, porque se não achar vai dar erro como variável indefinida
    //como eu vou recuperar um nível de usuário que não existe? ou de um recurso que ele não encontrei
    $nivel = $res[0]['nivel']; // esses dois comando irão sair pois é só para mostrar o nível do usuário
    if ($nivel == 'Administrador') {
    //se ele estiver autenticado, ele vai redirecionar para a pasta página index.php dentro da pasta painel-adm 
    echo "<script language='javascript'>window.location='painel-adm'</script>";
    } 
    else if($nivel == 'Cliente'){
        echo "<script language='javascript'>window.location='painel-cliente'</script>";
    } 
    
    else if($nivel == 'Vendedor'){
        echo "<script language='javascript'>window.location='painel-vendedor'</script>";
    } 
    
    else if($nivel == 'Tesoureiro'){
        echo "<script language='javascript'>window.location='painel-tesoureiro'</script>";
    }     
    
    else{
        echo "<script language='javascript'>window.alert('Usuário sem permissão acesso')</script>";    
    } 
}
else//Se o total de registro não é maior do que 0 (zero) então é menor, entra no else
{
    //se não tem a autenticação vai entrar no else e mostrar a mensagem abaixo e retornar para o login
    echo "<script language='javascript'>window.alert('Dados incorretos')</script>";
    echo "<script language='javascript'>window.location='index.php'</script>";
}

echo $total_reg;

?>