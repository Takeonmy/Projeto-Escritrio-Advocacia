<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro | Processos</title>
    <link href="../styles/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/style_menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.15/fullcalendar.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/locales/pt-br.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body>

    <nav class="menu-lateral">
        <div class="btn-expandir">
            <i class="bi bi-list" id="btn-exp"></i>
        </div>
        <br>
        <ul>
            <li class="item-menu">
                <a href="menu.php">
                    <span class="icon"><i class="bi bi-house-fill"></i></span>
                    <span class="txt-link">Inicio</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="clients.php">
                    <span class="icon"><i class="bi bi-person-fill-add"></i></span>
                    <span class="txt-link">Cadastro Clientes</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="processes.php">
                    <span class="icon"><i class="bi bi-file-earmark-plus-fill"></i></span>
                    <span class="txt-link">Cadastro Processos</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="calendar.php">
                    <span class="icon"><i class="bi bi-calendar-week-fill"></i></span>
                    <span class="txt-link">Agenda</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="lista_clientes.php">
                    <span class="icon"><i class="bi bi-person-fill"></i></span>
                    <span class="txt-link">Listagem Clientes</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="lista_processos.php">
                    <span class="icon"><i class="bi bi-folder-fill"></i></span>
                    <span class="txt-link">Listagem Processos</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Cadastro dos meus processos</h1>
          <form action="cadastro_processos_script.php" method="post">
            <div class="mb-3">
              <label for="num_processo" class="form-label">Nº do processo</label>
              <input type="text" class="form-control" name="num_processo" required>
            </div>
            <div class="mb-3">
              <label for="descricao" class="form-label">Descrição</label>
              <input type="text" class="form-control" name="descricao" required>
            </div>
            <div class="mb-3">
              <label for="comarca" class="form-label">Comarca</label>
              <input type="text" class="form-control" name="comarca" required>
            </div>
            <div class="mb-3">
              <label for="vara" class="form-label">Vara</label>
              <input type="text" class="form-control" name="vara" required>
            </div>
            <div class="mb-3">
              <label for="data_inicio" class="form-label">Data de início</label>
              <input type="date" class="form-control" name="data_inicio" required>
            </div>
            <div class="mb-3">
              <label for="data_fim" class="form-label">Data do fim</label>
              <input type="date" class="form-control" name="data_fim" required>
            </div>
            <div class="mb-3">
              <label for="cliente_vinculado" class="form-label">Cliente vinculado</label>
              <input type="text" class="form-control" name="cliente_vinculado" required>
            </div>
            <div class="mb-3">
              <input type="submit" class="btn btn-success">
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../js/script_menu.js"></script>
  </body>
</html>