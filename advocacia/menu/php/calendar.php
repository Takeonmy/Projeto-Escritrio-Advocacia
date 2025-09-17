<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="../css/style_menu.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.15/fullcalendar.min.css">
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/locales/pt-br.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- arquivos style -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/darkMode.css" rel="stylesheet">

  <title>Calendario</title>
</head>
  <!-- dark mode -->
  
  <div class="toggle">
    <input id="switch" type="checkbox" name="theme">
    <label for="switch">Toggle</label>
  </div>

<!-- -------- -->

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


  <div id="container">
      <div id="header">
        <div id="monthDisplay"></div>

        <div>
          <button id="backButton">Voltar</button>
          <button id="nextButton">Próximo</button>
        </div>
          
      </div>

      <div id="weekdays">
        <div>Domingo</div>
        <div>Segunda-feira</div>
        <div>Terça-feira</div>
        <div>Quarta-feira</div>
        <div>Quinta-feira</div>
        <div>Sexta-feira</div>
        <div>Sábado</div>
      </div>


      <!-- div dinamic -->
      <div id="calendar" ></div>

   
  </div>

  <div id="newEventModal">
    <h2>New Evente</h2>

    <input id="eventTitleInput" placeholder="Event Title"/>

    <button id="saveButton"> Salvar</button>
    <button id="cancelButton">Cancelar</button>
  </div>

  <div id="deleteEventModal">
    <h2>Evento</h2>

    <div id="eventText"></div><br>


    <button id="deleteButton">Deletar</button>
    <button id="closeButton">Fechar</button>
  </div>

  <div id="modalBackDrop"></div>


  <script src="../js/darkMode.js"></script>
  <script src="../js/main.js"></script>
  <script src="../js/script_menu.js"></script>
  
</body>
</html>