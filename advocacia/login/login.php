<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap">
    <script>
        function handleSubmit(event) {
            event.preventDefault(); 
            var username = document.querySelector('input[name="nome"]').value;
            var password = document.querySelector('input[name="senha"]').value;
            if (username === 'advogado' && password === '0000') {
                window.location.href = "../menu/php/menu.php";
            } else {
                alert('Usuário ou senha incorretos!');
            }
        }
    </script>
</head>
<body>
    <div class="page-container">
        <div class="text-top-right">Escritório de Advocacia</div>
        <div class="login-container">
            <br>
            <h2>Escritório</h2>
            <form onsubmit="handleSubmit(event)">
                <br>
                <input type="text" name="nome" placeholder="Username" required>
                <br>
                <br>
                <input type="password" name="senha" placeholder="Password" required>
                <br>
                <br>
                <div class="form-options">
                    <label>
                        <input type="checkbox" name="remember">
                        Lembrar de Mim
                    </label>
                    <a href="#" class="forgot-password">Esqueceu a Senha?</a>
                </div>
                <br>
                <br>
                <button type="submit">Entrar</button>
            </form>
        </div>
    </div>
</body>
</html>
