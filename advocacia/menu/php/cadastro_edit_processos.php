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
      $sql = "SELECT * from tb_processos WHERE num_processo = $id";

      $dados = mysqli_query($conn, $sql);

      $linha = mysqli_fetch_assoc($dados);
    ?>



    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Alteração de Cadastro</h1>
          <form action="edit_script_processos.php" method="post">
            <div class="mb-3">
              <label for="num_processo" class="form-label">Nº do processo</label>
              <input type="text" class="form-control" name="num_processo" required value="<?php echo $linha['num_processo']?>">
            </div>
            <div class="mb-3">
              <label for="descricao" class="form-label">Descrição</label>
              <input type="text" class="form-control" name="descricao" required value="<?php echo $linha['descricao']?>">
            </div>
            <div class="mb-3">
              <label for="comarca" class="form-label">Comarca</label>
              <input type="text" class="form-control" name="comarca" required value="<?php echo $linha['comarca']?>">
            </div>
            <div class="mb-3">
              <label for="vara" class="form-label">Vara</label>
              <input type="text" class="form-control" name="vara" required value="<?php echo $linha['vara']?>">
            </div>
            <div class="mb-3">
              <label for="data_inicio" class="form-label">Data de início</label>
              <input type="date" class="form-control" name="data_inicio" required value="<?php echo $linha['data_inicio']?>">
            </div>
            <div class="mb-3">
              <label for="data_fim" class="form-label">Data do fim</label>
              <input type="date" class="form-control" name="data_fim" required value="<?php echo $linha['data_fim']?>">
            </div>
            <div class="mb-3">
              <label for="cliente_vinculado" class="form-label">Cliente vinculado</label>
              <input type="text" class="form-control" name="cliente_vinculado" required value="<?php echo $linha['cliente_vinculado']?>">
            </div>
            <div class="mb-3">
              <input type="submit" class="btn btn-success">
            </div>
          </form>
          <a href="menu.php" class="btn btn-primary">Voltar ao início</a>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>