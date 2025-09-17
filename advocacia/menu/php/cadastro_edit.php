<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alteração de Cadastro | Escritório</title>
    <link href="../styles/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

    <?php
      include "conexao.php";

      $id = $_GET['id'] ?? ''; 
      $sql = "SELECT * from tb_clientes WHERE id_cliente = $id";

      $dados = mysqli_query($conn, $sql);

      $linha = mysqli_fetch_assoc($dados);
    ?>



    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Alteração de Cadastro</h1>
          <form action="edit_script.php" method="post">
            <div class="mb-3">
              <label for="nome" class="form-label">Nome completo</label>
              <input type="text" class="form-control" name="nome" required value="<?php echo $linha['nome']?>">
            </div>
            <div class="mb-3">
              <label for="cpf" class="form-label">CPF</label>
              <input type="text" class="form-control" name="cpf" required value="<?php echo $linha['cpf']?>">
            </div>
            <div class="mb-3">
              <label for="telefone" class="form-label">Telefone</label>
              <input type="text" class="form-control" name="telefone" required value="<?php echo $linha['telefone']?>">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">E-mail</label>
              <input type="email" class="form-control" name="email" required value="<?php echo $linha['email']?>">
            </div>
            <div class="mb-3">
              <label for="endereco" class="form-label">Endereço</label>
              <input type="text" class="form-control" name="endereco" required value="<?php echo $linha['endereco']?>">
            </div>
            <div class="mb-3">
              <label for="num_processo" class="form-label">Nº do processo</label>
              <input type="text" class="form-control" name="num_processo" required value="<?php echo $linha['num_processo']?>">
            </div>
            <div class="mb-3">
              <label for="estado_processo" class="form-label">Aberto(1) ou Resolvido(0)</label>
              <input type="text" class="form-control" name="estado_processo" required value="<?php echo $linha['estado_processo']?>">
            </div>
            <div class="mb-3">
              <input type="submit" class="btn btn-success" value="Salvar alteração">
              <input type="hidden" name="id" value="<?php echo $linha['id_cliente']?>">
            </div>
          </form>
          <a href="menu.php" class="btn btn-primary">Voltar ao início</a>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>