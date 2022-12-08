<?php
if (!isset($component_prefix_path)) {
    $component_prefix_path = '';
    global $component_prefix_path;
} ?>

<header class="p-3 bg-white border border-b-1 border-slate-100 drop-shadow-sm relative z-10">
    <div class="flex w-full justify-between max-w-7xl mx-auto items-center gap-8  md:gap-16 px-2">
        <a href="<?= $component_prefix_path ?>./">
            <picture>
                <source srcset="<?= $component_prefix_path ?>./static/assets/eStante.svg" media="(min-width: 768px)">

                <img src="<?= $component_prefix_path ?>./static/assets/icon.svg" alt="eStante" class="w-9 md:w-fit">
            </picture>
        </a>


        <form class="flex flex-col gap-2 flex-grow max-w-2xl search-form" method="GET" action="<?= $component_prefix_path . './search.php' ?>">
            <div class="flex gap-2 border rounded-lg border-1 border-slate-300 py-1 px-2 input-container-effect relative ">
                <label for="search" class="block"><img src="<?= $component_prefix_path ?>./static/assets/icons/search.svg" alt="Usuário" class="h-6 my-auto "></label>
                <input type="text" name="search" id="search" class="outline-0 bg-transparent text-slate-500 w-full border-x-2 border-slate-200 mr-1 pr-1 px-1 text-sm md:text-base" placeholder="Pesquisar...">
                <select name="search-for" class="text-sm outline-0 bg-transparent text-slate-500 text-sm md:text-base">
                    <option value="title" selected>Título</option>
                    <option value="author">Autor</option>
                    <option value="tag">Tags</option>
                    <?php
                    if ($_SESSION['permission'] == "Administrador") {
                        echo ("<option value=\"person\">Usuários</option>");
                    }
                    ?>
                </select>
            </div>
        </form>

        <div class="flex items-center gap-2 relative profile z-10">
            <div class="hidden md:flex flex-col justify-center items-end w-fit">
                <span class="text-slate-700 text-sm md:text-base block leading-none"><?= $_SESSION['name'] ?></span>
                <span class="block text-xs font-light text-slate-500 leading-none"><?= $_SESSION['permission'] ?></span>
            </div>
            <img src="<?= str_starts_with($_SESSION['avatar'], 'https://') ? $_SESSION['avatar'] : $component_prefix_path . $_SESSION['avatar'] ?>" alt="Foto de perfil" class="w-12 h-auto rounded-full border border-2 border-emerald-500 object-cover">

            <ul class="absolute flex w-max right-0 bg-white border-b-1 border-slate-100 drop-shadow-sm rounded-lg top-full text-sm py-1">
                <?php
                if (in_array($_SESSION['permission'], ['Administrador', 'Moderador'])) {
                    echo ("<li ><a href=\"\" class=\"flex items-center gap-2 text-slate-500\"><img src=\"$component_prefix_path./static/assets/icons/slate-comment.svg\" alt=\"Comentários Pendentes\" class=\"w-4\"> Comentários Pendentes</a></li>");
                }

                if ($_SESSION['permission'] == 'Administrador') {
                    echo ("<li ><a href=\"$component_prefix_path./admin.php\" class=\"flex items-center gap-2 text-slate-500\"><img src=\"$component_prefix_path./static/assets/icons/admin.svg\" alt=\"Painel de Controle\" class=\"w-4\"> Painel de Controle</a></li>");
                }

                if ($_SESSION['permission'] == 'Administrador') {
                    echo ("<li ><a href=\"$component_prefix_path./item/create.php\" class=\"flex items-center gap-2 text-slate-500\"><img src=\"$component_prefix_path./static/assets/icons/add-slate.svg\" alt=\"Adicionar Obra\" class=\"w-4\"> Adicionar Obra</a></li>");
                }

                ?>
                <li><a href="<?= $component_prefix_path ?>./user/create.php?person=<?=$_SESSION['id']?>" class="flex items-center gap-2 text-slate-500"><img src="<?= $component_prefix_path ?>./static/assets/icons/edit-profile.svg" alt="Editar Perfil" class="w-4"> Editar perfil</a></li>
                <li><a href="<?= $component_prefix_path ?>./auth/logout.php" class="flex items-center gap-2 text-slate-500"><img src="<?= $component_prefix_path ?>./static/assets/icons/log-out.svg" alt="Sair" class="w-4"> Sair</a></li>


            </ul>
        </div>
    </div>

    <script src="<?=$component_prefix_path?>./static/scripts/changeFormToPerson.js"></script>
</header>