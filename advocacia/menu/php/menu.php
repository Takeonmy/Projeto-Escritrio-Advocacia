<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/style_menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.15/fullcalendar.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/locales/pt-br.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <?php
    include_once 'conexao.php'; 
    $sqlClientes = "SELECT COUNT(*) as total_clientes FROM tb_clientes";
    $sqlProcessosResolvidos = "SELECT COUNT(*) as total_resolvidos FROM tb_clientes WHERE estado_processo = 0";
    $sqlProcessosAbertos = "SELECT COUNT(*) as total_abertos FROM tb_clientes WHERE estado_processo = 1";
    
    $resultClientes = $conn->query($sqlClientes);
    $resultResolvidos = $conn->query($sqlProcessosResolvidos);
    $resultAbertos = $conn->query($sqlProcessosAbertos);
    
    if ($resultClientes->num_rows > 0) {
        $rowClientes = $resultClientes->fetch_assoc();
        $totalClientes = $rowClientes['total_clientes'];
    } else {
        $totalClientes = 0;
    }
    
    if ($resultResolvidos->num_rows > 0) {
        $rowResolvidos = $resultResolvidos->fetch_assoc();
        $totalResolvidos = $rowResolvidos['total_resolvidos'];
    } else {
        $totalResolvidos = 0;
    }
    
    if ($resultAbertos->num_rows > 0) {
        $rowAbertos = $resultAbertos->fetch_assoc();
        $totalAbertos = $rowAbertos['total_abertos'];
    } else {
        $totalAbertos = 0;
    }
    ?>

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

    <div class="content">
        <div id="home" class="section active">
            <br>
            <h1>Página Inicial</h1>
            <div class="user">
                <div class="user-title">
                    <p id="titulo">
                        <i id="icon1" class="fa-solid fa-circle-user"></i> Painel do Usuário
                    </p>
                </div>
                <div id="dados_usuario" class="usario_dados">
                    <p><strong>Nome:</strong> Advogado X<span id="nome"></span></p>
                    <p><strong>OAB:</strong> OAB/PB nº 123.456<span id="oab"></span></p>
                    <p><strong>Data de Registro:</strong> 22/08/2024<span id="data de registro"></span></p>
                </div>
            </div>
            <div class="board">
                <div id="dashboard" class="dashboard">
                    <p id="titulo">
                        <i id="icon2" class="fa-solid fa-chart-pie"></i> Dashboard
                    </p>
                </div>
                <div id="dados_board" class="dashboard_dados">
                    <p><strong>Clientes cadastrados:</strong> <span id="clientes_cadastrados"><?php echo $totalClientes; ?></span></p>
                    <p><strong>Processos resolvidos:</strong> <span id="processos_resolvidos"><?php echo $totalResolvidos; ?></span></p>
                    <p><strong>Processos em aberto:</strong> <span id="processos_abertos"><?php echo $totalAbertos; ?></span></p>
                </div>
            </div>

            <?php
                $sqlHistorico = "SELECT 
                    tb_clientes.nome AS cliente_nome, 
                    tb_processos.num_processo, 
                    tb_processos.data_inicio, 
                    tb_processos.data_fim
                FROM 
                    tb_processos
                JOIN 
                    tb_clientes ON tb_processos.num_processo = tb_clientes.num_processo
                ORDER BY 
                    tb_processos.data_inicio DESC"; 

                $resultHistorico = $conn->query($sqlHistorico);
            ?>

            <div class="historico_registro">
                <div id="historico" class="historico">
                    <p id="titulo">
                        <i id="icon3" class="fa-solid fa-scale-balanced"></i> Histórico de processos
                    </p>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Nº do processo</th>
                            <th>Data de Início</th>
                            <th>Data de Conclusão</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($resultHistorico->num_rows > 0) {
                            while ($row = $resultHistorico->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['cliente_nome']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['num_processo']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['data_inicio']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['data_fim']) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Nenhum processo encontrado.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../js/script_menu.js"></script>
</body>

</html>
