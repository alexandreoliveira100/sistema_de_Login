<?php

require_once ("../../conexao.php"); 
@session_start();
//VERIFICAR SE O USUÁRIO LOGADO É UM ADMINISTRADOR
if (@$_SESSION['nivel_usuario'] != 'Administrador') { //o @ antes do $_SESSION é para ignorar a mensagem warnig que aparece
    echo "<script language='javascript'>window.location='../index.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Administrador</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Usuário</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Empresas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Financas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../logout.php">Sair</a>
        </li>   
      </ul>
      <form method="GET" class="d-flex">
        <input class="form-control me-2" name="txtBuscar" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav> 

<header>
<h1 style="text-align: center"> PAINEL DO ADMINISTRADOR</h1>  
</header>

<div class="container"> <!--mt-4: é para da uma margem na parte de cima, para fazer o botão descer um pouco --> 
<!--mt é margin top, ml margin left, mr margin right, mb margin botton: isso se aprende com bootstrap--> 
<!-- //#modalCadastrar está como id="modalCadastrar"  no formulário da janela moda no final do código--> 
<a href="index.php?funcao=novo" class="btn btn-secondary mt-4"  type="button">Novo usuário</a>
<!-- No código acima, a variável novo serve para que a url mude quando quando clicarem no botão novo 
 usuário e no icone editar --> 
    <?php    
    $txtBuscar = '%'.@$_GET['txtBuscar'].'%'; 
    $query = $pdo->prepare("SELECT  * FROM usuarios WHERE nome LIKE :nome or email LIKE :email");
    $query->bindValue(":email", $txtBuscar);
    $query->bindValue(":nome", $txtBuscar);
    $query->execute();
    
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $total_reg = @count($res); 

    if ($total_reg > 0) {
    ?><!-- Fim do bloco PHP-->    
 
<table class="table table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">E-mail</th>
      <th scope="col">Senha</th>
      <th scope="col">Nível</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
<tbody> <!-- Fim do bloco HTML--> 
    
<!-- Início do bloco PHP--> 
    <?php 
      for ($i=0; $i < $total_reg; $i++) { 
        foreach ($res[$i] as $key => $value) {

        }
        //criação das linhas da tabela: 
        $nome = $res[$i]['nome']; //esse 'nome' tem que se igual a coluna nome da tabela
        $email = $res[$i]['email']; //esse 'email' tem que se igual a coluna email da tabela
        $senha = $res[$i]['senha']; //esse 'senha' tem que se igual a senha email da tabela
        $nivel = $res[$i]['nivel']; //esse 'nivel' tem que se igual a nivel email da tabela
        $id = $res[$i]['id'];  
        ?>
            <tr>
              <td> <?php echo $nome ?></td>
              <td> <?php echo $email ?></td>
              <td> <?php echo $senha ?></td>
              <td> <?php echo $nivel ?></td>
              <td> 
          <a href="index.php?funcao=editar&id=<?php echo $id ?>" title="Editar registro" class="mr-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square text-primary" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
          </svg>
          </a>

          <a href="index.php?funcao=deletar&id=<?php echo $id ?>" title="Deletar registro" class="mr-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-trash text-danger" viewBox="0 0 16 16">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
              <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
          </svg>
          </a>
              </td>
            </tr>
      <?php 
      
    }
    }
    else {//caso não for maior que zero, trará uma mensagem dizendo que não encontrou nenhum registro
      echo '<p class="mt-4"> Não existem dados para serem exibidos </p>';
    }
    ?>
      
   </tbody>
</table>
</div> <!-- Fim da div container--> 

</body>
</html>

<div class="modal fade" id="modalCadastrar" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <?php 
        if (@$_GET['funcao'] == 'editar') {
            $titulo_modal = "Editar registros ";
            $botao_modal = "btn-editar";
            $query = $pdo->query("SELECT  * FROM usuarios WHERE id='$_GET[id]'");              
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            $nome_ed = $res[0]['nome'];
            $email_ed = $res[0]['email'];
            $senha_ed = $res[0]['senha'];
            $nivel_ed = $res[0]['nivel'];

        }
        else{
          $titulo_modal = "inserir registros ";
          $botao_modal = "btn-cadastrar";
        }
        ?>
        <h5 class="modal-title"><?php echo $titulo_modal; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST"><!--Início do Form --> 
      <div class="modal-body">
      <div class="form-group mb-2">
          <label for="exampleInputEmail1">Nome</label>
          <input type="text" name="nomeCad" class="form-control mt-1" id="exampleInputEmail1"
           aria-describedby="emailHelp" required value=" <?php echo @$nome_ed;?>">  
        </div>

        <div class="form-group mb-2">
          <label for="exampleInputEmail1">E-mail</label>
          <input type="text" name="emailCad" class="form-control mt-1" id="exampleInputEmail1" 
          aria-describedby="emailHelp" required value="<?php echo @$email_ed;?>">
        </div> 

        <div class="form-group mb-1">
          <label for="exampleInputPassword1">Senha</label>
          <input type="text" name="senhaCad" class="form-control mt-1" id="exampleInputPassword1" required value="<?php echo @$senha_ed;?>">
        </div>
          <div class="form-group mb-2">
          <label for="exampleInputPassword1">Nível</label>
        <select name="nivelCad" class="form-select mt-2" aria-label="Default select example">     
          
          <option <?php if(@$nivel_ed == 'Administrador'){ ?> selected <?php } ?> value="Administrador">Administrador</option> <!-- Vai ser salvo no banco de dados o que está dentro do value.--> 
          <option <?php if(@$nivel_ed == 'Cliente'){ ?> selected <?php } ?> value="Cliente">Cliente</option>
          <option <?php if(@$nivel_ed == 'Tesoureiro'){ ?> selected <?php } ?> value="Tesoureiro">Tesoureiro</option>
          <option <?php if(@$nivel_ed == 'Vendedor'){ ?> selected <?php } ?> value="Vendedor">Vendedor</option>
        </select>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" name=" <?php echo $botao_modal ?>" class="btn btn-primary">Salvar</button>
        <input type="hidden" name="antigo" value="<?php echo @$email_ed;?>">
      </div>
        </div>
      </div><!-- Fim da class modal-body-->
      </div><!-- Fim da class modal-content-->      
      </div><!-- Fim da class modal-dialog-->     
  </form> <!-- Fim do Form --> 
    </div>
  </div>
</div>

<!-- Delete -->
<div class="modal" tabindex="-1" id="modalDeletar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Excluir Registros</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Deseja realmente excluir esse registro?.</p>
      </div>
      <div class="modal-footer">
        <form action="" method="POST">        
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="btn-deletar" class="btn btn-danger">Excluir</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php

if (isset($_POST['btn-cadastrar'])) {
  $query_v = $pdo->prepare("SELECT  * FROM usuarios WHERE email = :email");
  $query_v->bindValue(":email", $_POST['emailCad']);  
  $query_v->execute();
  $res_v = $query_v->fetchAll(PDO::FETCH_ASSOC);
  $total_reg_v = @count($res_v);

  if ($total_reg_v > 0) {  
    echo "<script language='javascript'>window.alert('Usuário já está cadastrado')</script>";  
  }

  $query = $pdo->prepare(" INSERT INTO usuarios (nome, email, senha, nivel) VALUES (:nome, :email, :senha, :nivel)");
  $query->bindValue(":nome", $_POST['nomeCad']);
  $query->bindValue(":email", $_POST['emailCad']);
  $query->bindValue(":senha", $_POST['senhaCad']);
  $query->bindValue(":nivel", $_POST['nivelCad']);
  $query->execute();

  echo "<script language='javascript'>window.alert('Usuário cadastrado com sucesso')</script>";  
  echo "<script language='javascript'>window.location='index.php'</script>";  

}
?>

<!--Nova função abaixo -->
<?php

  if(isset($_POST['btn-editar'])){

  if ($_POST['antigo']!=$_POST['emailCad']) {

  $query_v = $pdo->prepare("SELECT  * FROM usuarios WHERE email = :email");
  $query_v->bindValue(":email", $_POST['emailCad']);  
  $query_v->execute();
  $res_v = $query_v->fetchAll(PDO::FETCH_ASSOC);
  $total_reg_v = @count($res_v);

  if ($total_reg_v > 0) {  
    echo "<script language='javascript'>window.alert('Usuário já está cadastrado')</script>";  
    exit();
  }
  }

  $query = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, nivel = :nivel WHERE id = :id");
  $query->bindValue(":nome", $_POST['nomeCad']);
  $query->bindValue(":email", $_POST['emailCad']);
  $query->bindValue(":senha", $_POST['senhaCad']);
  $query->bindValue(":nivel", $_POST['nivelCad']);
  $query->bindValue(":id", $_GET['id']);
  $query->execute();

  echo "<script language='javascript'>window.alert('Usuário editado com sucesso')</script>";  
  echo "<script language='javascript'>window.location='index.php'</script>";  

}

?>

<?php

  if(isset($_POST['btn-deletar'])){  

  $query = $pdo->query("DELETE from usuarios WHERE id = '$_GET[id]'"); 
  
  echo "<script language='javascript'>window.location='index.php'</script>";  

}

?>

<?php
//Se existir um get chamado editar, ele entra na condição do if, 
if (@$_GET['funcao'] == 'novo') {?>
<script>
  var myModal = new bootstrap.Modal(document.getElementById('modalCadastrar'), { keyboard: false })
  myModal.show();
</script>
<?php } ?>

<?php
//Se existir um get chamado editar, ele entra na condição do if, 
if (@$_GET['funcao'] == 'editar') {?>
<script>
  var myModal = new bootstrap.Modal(document.getElementById('modalCadastrar'), { keyboard: false })
  myModal.show();
</script>
<?php } ?>


<?php

if (@$_GET['funcao'] == 'deletar') {?>
<script>
  var myModal = new bootstrap.Modal(document.getElementById('modalDeletar'), { keyboard: false })
  myModal.show();
</script>
<?php } ?>
  
  
