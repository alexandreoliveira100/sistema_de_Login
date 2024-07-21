<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatos</title>
</head>

<body>
    
    <div class="container">
    <form action="enviar.php" method="POST">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" id="exampleFormControlInput1" placeholder="Insira seu nome">
    </div>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
        <textarea name="mensagem" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>

    <input type="submit" class="btn btn-primary" id="exampleFormControlInput1" value="Enviar">
    </form>
</div><!--Fim da div container--> 
</body>
</html>