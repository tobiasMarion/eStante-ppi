<?php
if (!isset($component_prefix_path)) {
    $component_prefix_path = '';
    global $component_prefix_path;
}
?>

<header class="p-3 bg-white border border-b-1 border-slate-100 drop-shadow-sm">
    <div class="flex w-full justify-between max-w-7xl mx-auto items-center gap-8  md:gap-16 px-2">
        <a href="<?= $component_prefix_path ?>./">
            <picture>
                <source srcset="<?= $component_prefix_path ?>./static/assets/eStante.svg" media="(min-width: 768px)">

                <img src="<?= $component_prefix_path ?>./static/assets/icon.svg" alt="eStante" class="w-9 md:w-fit">
            </picture>
        </a>


        <div class="flex flex-col gap-2 flex-grow max-w-2xl">
            <div class="flex gap-2 border rounded-lg border-1 border-slate-300 py-1 px-2 input-container-effect relative ">
                <label for="search" class="block"><img src="<?= $component_prefix_path ?>./static/assets/icons/search.svg" alt="Usuário" class="h-6 my-auto "></label>
                <input type="text" name="search" id="search" class="outline-0 bg-transparent text-slate-500 w-full border-x-2 border-slate-200 mr-1 pr-1 px-1 text-sm md:text-base" placeholder="Pesquisar...">
                <select name="select" class="text-sm outline-0 bg-transparent text-slate-500 text-sm md:text-base">
                    <option value="title" selected>Título</option>
                    <option value="author">Autor</option>
                    <option value="tags">Tags</option>
                </select>
            </div>
        </div>

        <div class="flex items-center gap-2 relative">
            <div class="hidden md:flex flex-col justify-center items-end w-fit">
                <span class="text-slate-700 text-sm md:text-base block leading-none"><?= $_SESSION['name'] ?></span>
                <span class="block text-xs font-light text-slate-500 leading-none"><?= $_SESSION['permission'] ?></span>
            </div>
            <img src="<?= str_starts_with($_SESSION['avatar'], 'https://') ? $_SESSION['avatar'] : $component_prefix_path . $_SESSION['avatar'] ?>" alt="Fulano de Tal" class="w-12 h-auto rounded-full border border-2 border-emerald-500 object-cover">

            <!-- <ul>
                <?php
                if (in_array($_SESSION['permission'], ['Administrador', 'Moderador'])) {
                    echo ("<li ><a href=\"\" class=\"flex items-center gap-2 text-slate-500\"><img src=\"$component_prefix_path./static/assets/icons/slate-comment.svg\" alt=\"Comentários Pendentes\" class=\"w-4\"> Comentários Pendentes</a></li>");
                }
                
                if ($_SESSION['permission'] == 'Administrador') {
                    echo ("<li ><a href=\"$component_prefix_path./auth/admin.php\" class=\"flex items-center gap-2 text-slate-500\"><img src=\"$component_prefix_path./static/assets/icons/admin.svg\" alt=\"Painel de Controle\" class=\"w-4\"> Painel de Controle</a></li>");
                }

                ?>
                <li><a href="<?= $component_prefix_path ?>./auth/logout.php" class="flex items-center gap-2 text-slate-500"><img src="<?= $component_prefix_path ?>./static/assets/icons/log-out.svg" alt="Sair" class="w-4"> Sair</a></li>


            </ul> -->
        </div>
    </div>
</header>