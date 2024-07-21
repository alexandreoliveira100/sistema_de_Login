<?php require_once("../conexao.php"); ?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<head>
  <link href="login.css" rel="stylesheet">
</head>

<body>
  <div id="login">
    <div class="container">
      <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">
          <div id="login-box" class="col-md-12">
            <form id="login-form" class="form" action="autenticar.php" method="post">
              <h3 class="text-center text-info">Login</h3>
              <div class="form-group">
                <label for="username" class="text-info">Usuário:</label><br>
                <input type="text" name="email" id="username" class="form-control" placeholder="Insira seu E-mail" required>
              </div>
              <div class="form-group">
                <label for="password" class="text-info">Senha:</label><br>
                <input type="password" name="senha" id="password" class="form-control" placeholder="Insira sua senha" required>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" class="btn btn-info btn-md" value="Logar">
              </div>
              <div id="register-link" class="text-right mt-1">
                <a href="" data-toggle="modal" data-target="#modal-cadastrar" class="text-info">Cadastre-se</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<div class="modal" id="modal-cadastrar" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastre-se</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="" method="POST">
      <div class="modal-body">        
        <div class="form-group">
          <label for="exampleInputEmail1">Nome</label>
          <input type="text" name="nomeCad" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">E-mail</label>
          <input type="text" name="emailCad" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Senha</label>
          <input type="text" name="senhaCad" class="form-control" id="exampleInputPassword1" required>
        </div>
      </div>
      

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" name="btn-cadastrar" class="btn btn-primary">Salvar</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php
//verificaão: se existir um post do botão btn-cadastra ele entra no 1º bloco do if e mostra a mensagem, tem post
if (isset($_POST['btn-cadastrar'])) {
  //sempre que os dados tiverem vindo de um formulário devo usar prepare para poder passar com parâmetros pela questão de segurança
  $query = $pdo->prepare(" INSERT INTO usuarios (nome, email, senha, nivel) VALUES (:nome, :email, :senha, :nivel)");
  $query->bindValue(":nome", $_POST['nomeCad']);
  $query->bindValue(":email", $_POST['emailCad']);
  $query->bindValue(":senha", $_POST['senhaCad']);
  $query->bindValue(":nivel", 'Cliente');
  $query->execute();

  echo "<script language='javascript'>window.alert('Usuário cadastrado com sucesso')</script>";  

}

?>