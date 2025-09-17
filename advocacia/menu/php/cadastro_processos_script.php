<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro | Escritório</title>
    <link href="../styles/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-12 mt-4">
          <h1>Processo cadastrado</h1>
          <p>Você acabou de cadastrar um novo processo no sistema. Todas as informações estão salvas e seguras conosco. Consulte na hora que quiser na área de "Listagem Processos".</p>          
          <?php
            include 'conexao.php';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $num_processo = mysqli_real_escape_string($conn, $_POST['num_processo']);
                $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
                $comarca = mysqli_real_escape_string($conn, $_POST['comarca']);
                $vara = mysqli_real_escape_string($conn, $_POST['vara']);
                $data_inicio = mysqli_real_escape_string($conn, $_POST['data_inicio']);
                $data_fim = mysqli_real_escape_string($conn, $_POST['data_fim']);
                $cliente_vinculado = mysqli_real_escape_string($conn, $_POST['cliente_vinculado']);

                $stmt = $conn->prepare("INSERT INTO tb_processos (num_processo, descricao, comarca, vara, data_inicio, data_fim, cliente_vinculado) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssss", $num_processo, $descricao, $comarca, $vara, $data_inicio, $data_fim, $cliente_vinculado);

                if ($stmt->execute()) {
                    echo "<div class='alert alert-success' role='alert'>Processo cadastrado com sucesso! Abaixo, você pode ver um resumo dos dados cadastrados.</div>";
                    echo "<ul class='list-group mb-4'>";
                    echo "<li class='list-group-item'><strong>Número do Processo:</strong> $num_processo</li>";
                    echo "<li class='list-group-item'><strong>Descrição:</strong> $descricao</li>";
                    echo "<li class='list-group-item'><strong>Comarca:</strong> $comarca</li>";
                    echo "<li class='list-group-item'><strong>Vara:</strong> $vara</li>";
                    echo "<li class='list-group-item'><strong>Data de Início:</strong> $data_inicio</li>";
                    echo "<li class='list-group-item'><strong>Data de Fim:</strong> $data_fim</li>";
                    echo "<li class='list-group-item'><strong>Cliente Vinculado:</strong> $cliente_vinculado</li>";
                    echo "</ul>";
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Processo não foi cadastrado. Por favor, tente novamente mais tarde.</div>";
                }

                $stmt->close();
            }

            $conn->close();
          ?>
          <div class="d-flex justify-content-between mt-4">
            <a href="menu.php" class="btn btn-primary">Voltar ao início</a>
            <a href="processes.php" class="btn btn-secondary">Cadastrar Novo Processo</a>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
