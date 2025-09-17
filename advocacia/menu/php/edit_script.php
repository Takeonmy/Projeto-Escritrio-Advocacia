<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alteração de Cadastro | Escritório</title>
    <link href="../styles/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-12 mt-4">
          <h1>Dados atualizados</h1>
          <p>Você acabou de alterar os dados de um processo no sistema. Todas as informações estão salvas e seguras conosco. Consulte na hora que quiser na área de "Listagem Clientes".</p>          
          <?php
            include 'conexao.php';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id = mysqli_real_escape_string($conn, $_POST['id']);
                $nome = mysqli_real_escape_string($conn, $_POST['nome']);
                $endereco = mysqli_real_escape_string($conn, $_POST['endereco']);
                $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
                $num_processo = mysqli_real_escape_string($conn, $_POST['num_processo']);
                $estado_processo = mysqli_real_escape_string($conn, $_POST['estado_processo']);

                $stmt = $conn->prepare("UPDATE tb_clientes SET nome=?, endereco=?, telefone=?, email=?, cpf=?, num_processo=?, estado_processo=? WHERE id_cliente=?");
                $stmt->bind_param("sssssssi", $nome, $endereco, $telefone, $email, $cpf, $num_processo, $estado_processo, $id);

                if ($stmt->execute()) {
                    echo "<div class='alert alert-success' role='alert'>Os dados de <strong>$nome</strong> foram alterados com sucesso! Abaixo, você pode ver um resumo dos dados atualizados.</div>";
                    echo "<ul class='list-group mb-4'>";
                    echo "<li class='list-group-item'><strong>Nome:</strong> $nome</li>";
                    echo "<li class='list-group-item'><strong>Endereço:</strong> $endereco</li>";
                    echo "<li class='list-group-item'><strong>Telefone:</strong> $telefone</li>";
                    echo "<li class='list-group-item'><strong>Email:</strong> $email</li>";
                    echo "<li class='list-group-item'><strong>CPF:</strong> $cpf</li>";
                    echo "<li class='list-group-item'><strong>Número do Processo:</strong> $num_processo</li>";
                    echo "<li class='list-group-item'><strong>Estado do Processo:</strong> $estado_processo</li>";
                    echo "</ul>";
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Não foi possível alterar os dados de <strong>$nome</strong>. Por favor, tente novamente mais tarde.</div>";
                }

                $stmt->close();
            }

            $conn->close();
          ?>
          <div class="d-flex justify-content-between mt-4">
            <a href="lista_clientes.php" class="btn btn-primary">Voltar para a Lista de Clientes</a>
            <a href="menu.php" class="btn btn-secondary">Voltar ao início</a>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
