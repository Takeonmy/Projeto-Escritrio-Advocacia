<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesquisa | Escritório</title>
    <link href="../styles/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
<!-- Verifica se a busca existe !-->
    <?php
      
      $pesquisa = $_POST['busca'] ?? '';
      

      include 'conexao.php';

      $sql = "SELECT * FROM tb_clientes WHERE nome LIKE '%$pesquisa%'";

      $dados = mysqli_query($conn, $sql);

      ?>
    

    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Pesquisar</h1>
          <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
              <form class="d-flex" role="search" action="lista_clientes.php" method="post">
                <input class="form-control me-2" type="search" placeholder="Nome" aria-label="Search" name="busca" autofocus>
                <button class="btn btn-outline-success" type="submit">Procurar</butto>
              </form>
            </div>
          </nav>

          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">Telefone</th>
                <th scope="col">Endereço</th>
                <th scope="col">Nº do processo</th>
                <th scope="col">Situação</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  while($linha = mysqli_fetch_assoc($dados)){
                    $id_cliente	 = $linha['id_cliente'];
                    $nome = $linha['nome'];
                    $cpf = $linha['cpf'];
                    $telefone = $linha['telefone'];
                    $estado_processo = $linha['estado_processo'];
                    $endereco = $linha['endereco'];
                    $num_processo = $linha['num_processo'];
                    echo "<tr>
                            <th scope='row'>$nome</th>
                            <td>$cpf</td>
                            <td>$telefone</td>
                            <td>$endereco</td>
                            <td>$num_processo</td>
                            <td>$estado_processo</td>
                            <td width=150px>
                              <a href='cadastro_edit.php?id=$id_cliente' class='btn btn-success btn-sm'>Editar</a>
                              <a href='#' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#modal_confirma' onclick=" .'"' ."pegar_dados($id_cliente, '$nome')" .'"' .">Excluir</a>
                            </td>
                          </tr>";
                    }
                ?>
              
            </tbody>
          </table>

          <a href="menu.php" class="btn btn-primary">Voltar ao início</a>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal_confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="excluir_script.php" method="post">
            <p>Deseja realmente excluir <b id="nome_pessoa">Nome da pessoa</b>?</p>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
              <input type="hidden" name="nome" id="nome_pessoa_1" value="">
              <input type="hidden" name="id" id="id_pessoa" value="">
              <input type="submit" class="btn btn-danger" value="Sim">
            </form>
          </div>
        </div>
      </div>
    </div>


    <script>
      function pegar_dados(id, nome){
        document.getElementById('nome_pessoa').innerHTML = nome;
        document.getElementById('nome_pessoa_1').value = nome;
        document.getElementById('id_pessoa').value = id;
      }
    </script>
    <script src="../js/script_menu.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>                
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>