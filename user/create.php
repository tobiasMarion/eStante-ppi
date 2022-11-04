<?php
    include('../db/connection.php');

    if (isset($_POST['submit'])) {
        $name = $mysqli->real_escape_string($_POST['name']);
        $registration = $mysqli->real_escape_string($_POST['registration']);
        $cpf = $mysqli->real_escape_string($_POST['cpf']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $password = $mysqli->real_escape_string($_POST['password']);
        $course = $mysqli->real_escape_string($_POST['course']);
        $type = $mysqli->real_escape_string($_POST['type']);
        $campus = $mysqli->real_escape_string($_POST['campus']);
        $course = $mysqli->real_escape_string($_POST['course']);
        $regular = $mysqli->real_escape_string($_POST['regular']);

        $sql_code = "SELECT * FROM person WHERE email='$email'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
        $rows = $sql_query->num_rows;

        global $rows;

        if ($rows == 0) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql_code = "INSERT INTO `person` (`name`, `registration`, `cpf`, `email`, `password`, `type`, `course`, `campus`, `regular`) VALUES ('$name', '$registration', '$cpf', '$email', '$password', '$type', '$course', '$campus', '$regular')";
    
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
            header("Location: ../auth/");
        }
        
    }   
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eStante | Qual obra você vai retirar da eStante hoje?</title>

    <link rel="shortcut icon" href="../static/assets/icon.svg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../static/style/main.css">

</head>

<body>
    <div class="bg-slate-50 flex flex-col min-h-screen">
        <header class="w-full bg-emerald-500 px-2">
            <div class="w-full max-w-3xl mx-auto pt-8 pb-24">
                <a href="../"><img src="../static/assets/eStante-white.svg" alt="eStante" class="mx-auto mb-8"></a>
                <h1 class="text-4xl font-semibold text-slate-50 mb-4">Cadastro de Usuário</h1>
                <p class="text-sm md:text-base text-slate-200">Preencha o formulário para poder explorar o acervo da
                    biblioteca.</p>
            </div>
        </header>

        <main class="w-full flex-grow mb-8 md:mb-16 px-2 flex-1">
            <form action="" method="POST"
                class="max-w-3xl negative-margin border drop-shadow drop-shadow-sm rounded-lg bg-white w-full mx-auto p-8">
                <fieldset class="mb-8">
                    <legend class="text-2xl text-slate-600 font-semibold mb-4">Dados Pessoais</legend>
                    <div class="flex flex-col gap-1 mb-4">
                        <label for="name" class="text-base text-slate-500 font-medium cursor-pointer">Nome</label>
                        <div
                            class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">
                            <input type="text" name="name" id="name"
                                class="outline-0 bg-transparent text-base text-slate-500 w-full pl-1"
                                placeholder="João da Silva" required>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 mb-4">
                        <label for="cpf" class="text-base text-slate-500 font-medium cursor-pointer">CPF</label>
                        <div
                            class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">
                            <input type="text" name="cpf" id="cpf"
                                class="outline-0 bg-transparent text-base text-slate-500 w-full pl-1"
                                placeholder="000.000.000-00" required
                                pattern="([0-9]{2}[\.]?[0-9]{3}[\.]?[0-9]{3}[\/]?[0-9]{4}[-]?[0-9]{2})|([0-9]{3}[\.]?[0-9]{3}[\.]?[0-9]{3}[-]?[0-9]{2})">
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 mb-4">
                        <label for="cpf" class="text-base text-slate-500 font-medium cursor-pointer">Senha</label>
                        <div
                            class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">
                            <input type="password" name="password" id="password"
                                class="outline-0 bg-transparent text-base text-slate-500 w-full pl-1"
                                placeholder="********" required
                                pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$">
                        </div>
                        <ul class="text-slate-400 text-xs ml-4">
                            <li>Mínimo de 8 caracteres</li>
                            <li>Mínimo de 1 letra maiúscula</li>
                            <li>Mínimo de 1 número</li>
                            <li>Mínimo de 1 símbolo (!#$)</li>
                        </ul>
                    </div>
                </fieldset>
                <fieldset class="mb-8">
                    <legend class="text-2xl text-slate-600 font-semibold mb-4">Dados Acadêmicos/Profissionais</legend>
                    <div class="flex flex-col gap-1 mb-4">
                        <label for="registration"
                            class="text-base text-slate-500 font-medium cursor-pointer">Matrícula/CIAP</label>
                        <div
                            class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">
                            <input type="text" name="registration" id="registration"
                                class="outline-0 bg-transparent text-base text-slate-500 w-full pl-1"
                                placeholder="2020300000" required>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 mb-4">
                        <label for="email" class="text-base text-slate-500 font-medium cursor-pointer">Email
                            Institucional <small>(@iffar)</small></label>
                        <div
                            class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">
                            <input type="email" name="email" id="email"
                                class="outline-0 bg-transparent text-base text-slate-500 w-full pl-1"
                                placeholder="joao@aluno.iffar.edu.br" required
                                pattern=".*@(?:iffar|aluno\.iffar|iffarroupilha)\.edu\.br">
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 mb-4">
                        <label for="campus" class="text-base text-slate-500 font-medium cursor-pointer">Campus</label>
                        <div
                            class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">

                            <select class="w-full text-slate-500" name="campus" id="campus" required>
                                <option value="Frederico Westphalen">Frederico Westphalen</option>
                                <option value="Alegrete">Alegrete</option>
                                <option value="Jaguari">Jaguari</option>
                                <option value="Júlio de Castilhos">Júlio de Castilhos</option>
                                <option value="Panambi">Panambi</option>
                                <option value="Santa Rosa">Santa Rosa</option>
                                <option value="Santo Augusto">Santo Augusto</option>
                                <option value="Santo Augusto">Santo Augusto</option>
                                <option value="Santo Ângelo">Santo Ângelo</option>
                                <option value="São Borja">São Borja</option>
                                <option value="São Vicente do Sul">São Vicente do Sul</option>
                                <option value="Uruguaiana">Uruguaiana</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 mb-8">
                        <label for="course" class="text-base text-slate-500 font-medium cursor-pointer">Curso</label>
                        <div
                            class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">

                            <select class="w-full text-slate-500" name="course" id="course" required>
                                <optgroup class="font-semibold" label="Cursos Integrados">
                                    <option value="Técnico em Agropecuária Integrado">Técnico em Agropecuária Integrado
                                    </option>
                                    <option value="Técnico em Admnistração Integrado">Técnico em Admnistração Integrado
                                    </option>
                                    <option value="Técnico em Informática Integrado">Técnico em Informática Integrado
                                    </option>
                                </optgroup>
                                <optgroup class="font-semibold" label="Cursos Superiores">
                                    <option value="Bacharelado em Ciência da Computação">Bacharelado em Ciência da
                                        Computação</option>
                                    <option value="Bacharelado em Medicina Veterinária">Bacharelado em Medicina
                                        Veterinária</option>
                                    <option value="Licenciatura em Matemática">Licenciatura em Matemática</option>
                                </optgroup>
                                <optgroup class="font-semibold" label="Cursos Subsequentes">
                                    <option value="Técnico em Agropecuária Integrado">Técnico em Agropecuária
                                        Subsequente</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="md:flex">
                        <div class="flex flex-col gap-1 mb-4 flex-1">
                            <label for="student"
                                class="text-base text-slate-500 font-medium cursor-pointer">Categoria</label>
                            <div class="flex gap-1">
                                <input type="radio" name="type" id="student" value="student" checked>
                                <label for="student" class="mr-4 text-slate-500">Aluno</label>
                                <input type="radio" name="type" id="employee" value="employee">
                                <label for="employee" class="mr-4 text-slate-500">Servidor</label>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1 mb-4 flex-1">
                            <label for="student"
                                class="text-base text-slate-500 font-medium cursor-pointer">Situação</label>
                            <div class="flex gap-1">
                                <input type="radio" name="regular" id="regular" value="1" checked>
                                <label for="regular" class="mr-4 text-slate-500">Regular</label>
                                <input type="radio" name="regular" id="away" value="0">
                                <label for="away" class="mr-4 text-slate-500">Afastado</label>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <?php 
                    if (isset($_POST['submit'])) {
                        echo('<p class="text-sm text-red-400 font-light text-center my-4">Já existe um usuário cadastrado com esse email.</p>');
                    }
                ?>

                <button class="w-full py-2 text-lg text-slate-50 bg-emerald-500 hover:bg-emerald-600 rounded-lg" name="submit">Cadastrar</button>
            </form>
        </main>

        <footer class="bg-emerald-500">
            <div class="w-full max-w-7xl mx-auto py-8 px-2 flex items-center justify-between">
                <div>
                    <img src="../static/assets/eStante-white.svg" alt="eStante" class="mb-4 md:mb-6">
                    <p class="text-xs text-slate-200 max-w-lg font-light">O eStante foi um projeto desenvolvido para a
                        Prática Profissional Integrada (PPI) da turma do 3º
                        ano do Curso Técnico em Informática Integrado ao Ensino Médio, no ano de 2022.</p>
                </div>
                <a href="#" class="hidden md:block p-2 bg-slate-50 rounded-md"><img
                        src="../static/assets/icons/arrow-up.svg" alt="De volta ao topo"></a>
            </div>
            <div class="flex justify-center items-center bg-slate-50 py-1">
                <p class="text-xs text-slate-600">Made with <img src="../static/assets/icons/heart.svg" alt="Love"
                        class="inline w-3"> by Amanda, Josué, Tobias and Wagner - 34/22
                </p>
            </div>
        </footer>
    </div>

    <script src="../static/scripts/inputEffect.js"></script>
</body>

</html>