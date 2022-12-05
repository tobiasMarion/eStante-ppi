<?php
include('../db/connection.php');

if (isset($_POST['submit'])) {
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $remember_me = false;

    if (array_key_exists('remember-me', $_POST)) {
        $remember_me = $mysqli->real_escape_string($_POST['remember-me']);
    }

    $sql_code = "SELECT * FROM person WHERE email='$email'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
    $rows = $sql_query->num_rows;
    global $rows;

    if ($rows == 1) {
        $user = $sql_query->fetch_assoc();
        $password_match = password_verify($password, $user['password']);
        global $password_match;

        if ($password_match) {
            if (!isset($_SESSION)) {
                session_start();
            }

            if ($remember_me) {
                $params = session_get_cookie_params();
                setcookie(session_name(), $_COOKIE[session_name()], time() + 60 * 60 * 24 * 30, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
            }

            $_SESSION['id'] = $user['personID'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['avatar'] = $user['avatar'];

            switch ($user['permissionLevel']) {
                case 'admin':
                    $_SESSION['permission'] = 'Administrador';
                    break;
                case 'employee':
                    $_SESSION['permission'] = 'Funcionário';
                    break;
                case 'moderator':
                    $_SESSION['permission'] = 'Moderador';
                    break;
                default:
                    $_SESSION['permission'] = 'Leitor';
            }


            header("Location: ../");
        }
    }
}
?>


<?php
include('../components/head.php');
?>

<head>
    <link rel="stylesheet" href="../static/style/main.css">
    <link rel="shortcut icon" href="../static/assets/icon.svg" type="image/x-icon">
</head>

<body>
    <div class="bg-slate-50 w-full min-h-screen flex">
        <aside class="hidden md:flex h-screen w-1/2 pt-32 bg-emerald-500 rounded-r-2xl drop-shadow-lg justify-start">
            <div class="max-w-xl mx-auto px-4 flex flex-col gap-2">
                <strong class="text-slate-100 text text-5xl	font-semibold mb-4">Qual obra você vai retirar da <span class="italic font-bold">eStante</span> hoje?</strong>
                <p class="text-base text-slate-100">“Ao verme que primeiro roeu as frias carnes do meu cadáver dedico como saudosa lembrança estas memórias póstumas.”</p>
                <span class="text-base text-slate-100 font-medium">Machado de Assis</span>
            </div>
        </aside>
        <main class="flex flex-col w-11/12 max-w-lg m-auto justify-start items-center gap-4 h-screen pt-32 md:w-1/2 px-4">
            <img src="../static/assets/eStante.svg" alt="eStante" class="h-4">
            <h2 class="text-3xl text-slate-600 font-semibold">Bem vindo de volta!</h2>
            <p class="text-base text-slate-400 font-regular text-center w-10/12">Faça login para explorar o acervo da biblioteca do IFFar-FW</p>

            <form action="" method="POST" class="w-10/12 flex flex-col justify-center">
                <div class="flex flex-col gap-2 mb-4">
                    <label for="email" class="text-base text-slate-500 font-medium cursor-pointer">Email</label>
                    <div class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">
                        <img src="../static/assets/icons/user.svg" alt="Usuário" class="mr-1 pr-1 border-r-2 border-slate-200">
                        <input type="text" name="email" id="email" class="outline-0 bg-transparent text-base text-slate-500 w-full" placeholder="joao@email.com" required>
                    </div>
                </div>

                <div class="flex flex-col gap-2 mb-4">
                    <label for="email" class="text-base text-slate-500 font-medium cursor-pointer">Senha</label>
                    <div class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">
                        <img src="../static/assets/icons/password.svg" alt="Senha" class="mr-1 pr-1 border-r-2 border-slate-200">
                        <input type="password" name="password" id="password" class="outline-0 bg-transparent text-base text-slate-500 w-full" placeholder="********" required>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div class="flex items-center gap-1">
                        <input type="checkbox" name="remember-me" id="remember-me" value="1">
                        <label for="remember-me" class="text-sm text-slate-500">Lembrar de mim</label>
                    </div>
                    <a href="#" class="text-emerald-500 text-sm font-medium">Esqueci minha senha</a>
                </div>

                <?php
                if (isset($_POST['submit']) && ($rows < 1 || !$password_match)) {
                    echo ('<p class="text-sm text-red-400 font-light text-center mt-4">Email ou senha incorrentos</p>');
                }
                ?>

                <button type="submit" name="submit" class="py-2 bg-emerald-400 rounded-lg my-4 text-slate-50 hover:bg-emerald-500">Login</button>

                <p class="text-center text-sm text-slate-500">Não possui uma conta? <a href="../user/create.php" class="text-emerald-500 font-medium">Crie uma agora</a></p>
            </form>
        </main>
    </div>

    <script src="../static/scripts/inputEffect.js"></script>
</body>

</html>