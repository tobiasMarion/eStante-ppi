<?php
$component_prefix_path = '../';
include('../auth/protect.php');
include('../components/head.php');
include('../db/connection.php');

$search = $mysqli->real_escape_string($_GET['search']);


$sql_code = "SELECT * FROM person WHERE name LIKE \"%$search%\" OR email LIKE \"%$search%\"";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);

?>

<body>
    <div class="bg-slate-50 flex flex-col min-h-screen">
        <?php
        include('../components/header.php');
        ?>

        <main class="w-full max-w-7xl mx-auto flex-grow my-8 md:my-16 px-2 flex flex-col gap-2">
            <h1 class="font-semibold text-slate-900 text-2xl md:text-4xl mb-2">Usuário <?= $search ?></h1>
            <p class="text-slate-500 text-sm md:text-base mb-4">Vamos ver o que encontramos na eStante sobre "Usuário
                <?= $search ?>”.</p>


            <table class="table-auto w-full">
                <thead class="h-8">
                    <tr class="text-center border-b">
                        <th class="text-left mr-2 text-slate-500 font-medium text-xs md:text-sm">Avatar</th>
                        <th class="text-left text-slate-500 font-medium text-xs md:text-sm">Nome</th>
                        <th class="text-left text-slate-500 font-medium text-xs md:text-sm">Email</th>
                        <th class="text-slate-500 font-medium text-xs md:text-sm hidden md:table-cell">Matrícula/SIAPE</th>
                        <th class="text-slate-500 font-medium text-xs md:text-sm hidden md:table-cell">Permissão</th>
                        <th class="text-slate-500 font-medium text-xs md:text-sm hidden md:table-cell">Promover</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($person = $sql_query->fetch_assoc()) {
                        $id = $person["personID"];
                        $avatar = str_starts_with($_SESSION['avatar'], 'https://') ? $_SESSION['avatar'] : $component_prefix_path . $_SESSION['avatar'];
                        $name = $person["name"];
                        $email = $person["email"];
                        $registration = $person["registration"];
                        $permission_level = $person["permissionLevel"];

                        $option = "";

                        switch ($permission_level) {
                            case 'admin':
                                $option = "Leitor";
                                $permission_level = "Admnistrador";
                                break;

                            case 'employee':
                                $option = "Admnistrador";
                                $permission_level = "Funcionário";
                                break;

                            case 'moderator':
                                $option = "Funcionário";
                                $permission_level = "Moderador";
                                break;

                            default:
                                $option = "Moderador";
                                $permission_level = "Leitor";
                                break;
                        }

                        $row = "
                            <tr class=\"text-center py-2 border-b h-16 result-$id\">
                                <td class=\"text-left mr-2\"><img src=\"$avatar\" alt=\"Capa\" class=\"w-12 object-cover rounded\"></td>
                                <td class=\"text-left font-semibold text-slate-600 text-xs md:text-sm table-cell\">$name</td>
                                <td class=\"text-left text-slate-500 text-xs md:text-sm\">$email</td>
                                <td class=\"text-slate-500 text-xs md:text-sm\">$registration</td>
                                <td class=\"text-slate-500 text-xs md:text-sm hidden md:table-cell\">$permission_level</td>
                                <td class=\"text-slate-500 text-xs md:text-sm hidden md:table-cell\">
                                    <button class=\"border p-2 rounded-md drop-shadow-sm flex items-center justify-center gap-4 mx-auto\" data-permissionLevel=\"$permission_level\"->
                                        <img src=\"../static/assets/icons/promote.svg\" alt=\"Copiar\">
                                        Tornar $option
                                    </button>
                                </td>
                            </tr>
                        ";

                        echo ($row);
                    }

                    ?>



                </tbody>
            </table>
        </main>

        <?php
        include('../components/footer.php');
        ?>
    </div>


    <script src="<?= $component_prefix_path . "./static/scripts/inputEffect.js" ?>"></script>

</body>

</html>