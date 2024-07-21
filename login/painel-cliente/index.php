<?php

require_once ("../../conexao.php"); 
@session_start();
//VERIFICAR SE O USUÁRIO LOGADO É UM ADMINISTRADOR
if (@$_SESSION['nivel_usuario'] != 'Cliente') { //o @ antes do $_SESSION é para ignorar a mensagem warnig que aparece
    echo "<script language='javascript'>window.location='../index.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Clientes</a>
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
<h1 style="text-align: center"> PAINEL DO CLIENTE</h1>  
</header>
</body>
  
  
