<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exclusão de Cadastro | Escritório</title>
    <link href="../styles/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-12 mt-4">
          <h1>Processo excluído</h1>
          <p>Você acabou de excluir um processo do sistema. Todas as informações foram apagadas deste sistema e também do banco de dados.</p>            
          <?php
            include 'conexao.php';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $num = mysqli_real_escape_string($conn, $_POST['num']);

                // Prepared statement para exclusão do processo
                $stmt = $conn->prepare("DELETE FROM tb_processos WHERE num_processo = ?");
                $stmt->bind_param("i", $num);

                if ($stmt->execute()) {
                    echo "<div class='alert alert-success' role='alert'>Os dados do processo de Nº <strong>$num</strong> foram excluídos com sucesso.</div>";
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Não foi possível excluir os dados do processo de Nº <strong>$num</strong>. Por favor, tente novamente mais tarde.</div>";
                }

                $stmt->close();
            }

            $conn->close();
          ?>
          <div class="d-flex justify-content-between mt-4">
            <a href="lista_processos.php" class="btn btn-primary">Voltar para a Lista de Processos</a>
            <a href="menu.php" class="btn btn-secondary">Voltar ao início</a>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
