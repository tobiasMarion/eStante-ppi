<?php
    include('./auth/protect.php');
    include('./components/head.php');
?>

<body>
    <div class="bg-slate-50 flex flex-col min-h-screen">
        <?php 
            include './components/header.php';
        ?>

        <main class="w-full max-w-7xl mx-auto flex-grow my-8 md:my-16 px-2 flex flex-col gap-2">
            <h1 class="font-semibold text-slate-900 text-2xl md:text-4xl mb-2">
                Painel de Controle
            </h1>
            <p class="text-slate-500 text-sm md:text-base mb-8">
                Gerencie a equipe e o acervo da sua biblioteca com poucos cliques,
                tudo centralizado e acessível e um único lugar.
            </p>

            <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4 control-panel">
                <a href="/" class="border rounded-lg drop-shadow-sm p-6 bg-white flex flex-col">
                    <header class="flex justify-between items-center mb-4">
                        <img src="./static/assets/icons/book.svg" alt="Obras" class="w-6" />
                        <span class="opacity-0 flex gap-1 items-center leading-none text-xs text-emerald-600">Adicionar
                            <img src="./static/assets/icons/add.svg" alt="Adicionar" class="w-4" /></span>
                    </header>
                    <strong class="text-2xl text-slate-900">15.000</strong>
                    <p class="text-slate-600">Obras</p>
                </a>
                <a href="/" class="border rounded-lg drop-shadow-sm p-6 bg-white flex flex-col">
                    <header class="flex justify-between items-start mb-4">
                        <img src="./static/assets/icons/users.svg" alt="Leitores" class="w-6" />
                        <span class="opacity-0 flex gap-1 items-center leading-none text-xs text-emerald-600">Adicionar
                            <img src="./static/assets/icons/add.svg" alt="Adicionar" class="w-4" /></span>
                    </header>
                    <strong class="text-2xl text-slate-900">500</strong>
                    <p class="text-slate-600">Leitores</p>
                </a>
                <a href="/" class="border rounded-lg drop-shadow-sm p-6 bg-white flex flex-col">
                    <header class="flex justify-between items-start mb-4">
                        <img src="./static/assets/icons/quotes.svg" alt="Citações" class="w-6" />
                        <span class="opacity-0 flex gap-1 items-center leading-none text-xs text-emerald-600">Adicionar
                            <img src="./static/assets/icons/add.svg" alt="Adicionar" class="w-4" /></span>
                    </header>
                    <strong class="text-2xl text-slate-900">10</strong>
                    <p class="text-slate-600">Citações</p>
                </a>
                <div class="border rounded-lg drop-shadow-sm p-6 bg-white flex flex-col">
                    <img src="./static/assets/icons/gray-star.svg" alt="Avaliações" class="w-6 mb-4" />
                    <strong class="text-2xl text-slate-900">7.000</strong>
                    <p class="text-slate-600">Avaliações</p>
                </div>
                <div class="border rounded-lg drop-shadow-sm p-6 bg-white flex flex-col">
                    <img src="./static/assets/icons/approved-comments.svg" alt="Comentários Aprovados" class="w-6 mb-4" />
                    <strong class="text-2xl text-slate-900">2.000</strong>
                    <p class="text-slate-600">Comentários Aprovados</p>
                </div>
                <a href="/" class="border rounded-lg drop-shadow-sm p-6 bg-white flex flex-col">
                    <header class="flex justify-between items-start mb-4">
                        <img src="./static/assets/icons/pending-comments.svg" alt="Comentários Pendentes" class="w-6" />
                        <span class="opacity-0 flex gap-1 items-center leading-none text-xs text-emerald-600">Adicionar
                            <img src="./static/assets/icons/add.svg" alt="Adicionar" class="w-4" /></span>
                    </header>
                    <strong class="text-2xl text-slate-900">30</strong>
                    <p class="text-slate-600">Comentários Pendentes</p>
                </a>
                <a href="/" class="border rounded-lg drop-shadow-sm p-6 bg-white flex flex-col">
                    <header class="flex justify-between items-start mb-4">
                        <img src="./static/assets/icons/moderators.svg" alt="Moderadores" class="w-6" />
                        <span class="opacity-0 flex gap-1 items-center leading-none text-xs text-emerald-600">Adicionar
                            <img src="./static/assets/icons/add.svg" alt="Adicionar" class="w-4" /></span>
                    </header>
                    <strong class="text-2xl text-slate-900">30</strong>
                    <p class="text-slate-600">Moderadores</p>
                </a>
                <a href="/" class="border rounded-lg drop-shadow-sm p-6 bg-white flex flex-col">
                    <header class="flex justify-between items-start mb-4">
                        <img src="./static/assets/icons/employees.svg" alt="Funcionários" class="w-6" />
                        <span class="opacity-0 flex gap-1 items-center leading-none text-xs text-emerald-600">Adicionar
                            <img src="./static/assets/icons/add.svg" alt="Adicionar" class="w-4" /></span>
                    </header>
                    <strong class="text-2xl text-slate-900">2</strong>
                    <p class="text-slate-600">Funcionários</p>
                </a>
                <a href="/" class="border rounded-lg drop-shadow-sm p-6 bg-white flex flex-col">
                    <header class="flex justify-between items-start mb-4">
                        <img src="./static/assets/icons/employees.svg" alt="Biblitecários" class="w-6" />
                        <span class="opacity-0 flex gap-1 items-center leading-none text-xs text-emerald-600">Adicionar
                            <img src="./static/assets/icons/add.svg" alt="Adicionar" class="w-4" /></span>
                    </header>
                    <strong class="text-2xl text-slate-900">1</strong>
                    <p class="text-slate-600">Biblitecários</p>
                </a>
            </div>
        </main>

        <?php
            include('./components/footer.php');
        ?>
    </div>

    <script src="./static/scripts/inputEffect.js"></script>
</body>

</html>