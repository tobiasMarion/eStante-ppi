<?php
include('../db/connection.php');

$component_prefix_path = '../';

if (isset($_POST['submit'])) {
}
?>

<?php include('../components/head.php'); ?>

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
            <form action="" method="POST" enctype="multipart/form-data" class="max-w-3xl negative-margin border drop-shadow drop-shadow-sm rounded-lg bg-white w-full mx-auto p-8">
                <fieldset class="mb-8">
                    <legend class="text-2xl text-slate-600 font-semibold mb-4">Título</legend>
                    <div class="flex flex-col gap-1 mb-4">
                        <label for="title" class="text-base text-slate-500 font-medium cursor-pointer">Título</label>
                        <div class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">
                            <input type="text" name="title" id="title" class="outline-0 bg-transparent text-base text-slate-500 w-full pl-1" placeholder="Memórias Póstumas de Brás Cubas" required>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 mb-4">
                        <label for="subtitle" class="text-base text-slate-500 font-medium cursor-pointer">Subtítulo</label>
                        <div class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">
                            <input type="text" name="title" id="title" class="outline-0 bg-transparent text-base text-slate-500 w-full pl-1" placeholder="Memórias Póstumas de Brás Cubas" required>
                        </div>
                    </div>
                </fieldset>
                <button class="w-full py-2 text-lg text-slate-50 bg-emerald-500 hover:bg-emerald-600 rounded-lg" name="submit">Cadastrar</button>
            </form>
        </main>

        <?php
        include('../components/footer.php');
        ?>
    </div>

    <script src="../static/scripts/inputEffect.js"></script>
</body>

</html>