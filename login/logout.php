<?php
//para quebrar a sessão eu uso um session_destroy(), aqui estou destruindo aquela sessão de usuário que foi aberta
@session_start();
@session_destroy();
echo "<script language='javascript'>window.location='index.php'</script>";
?>