<?php
    $component_prefix_path = '../';
    global $component_prefix_path;
    
    include('../auth/protect.php');
    include('../components/head.php');
?>

<body>
    <div class="bg-slate-50 flex flex-col min-h-screen">
        <?php
            include '../components/header.php';
        ?>

        <main class="w-full max-w-7xl mx-auto flex-grow my-8 md:my-16 px-2 flex flex-col gap-2">
            <section class="md:flex gap-12 mb-12">
                <img src="../static/assets/bookCoverFiller.png" alt="Capa do Livro" class="w-full rounded-lg mx-auto mb-4 md:w-6/12 max-h-screen">
                <div class="md:flex-1 my-auto">
                    <ul class="flex gap-2 text-xs text-emerald-700 mb-4">
                        <li class="py-1 px-2 bg-emerald-100 rounded"><a href="">Literatura Brasileira</a></li>
                        <li class="py-1 px-2 bg-emerald-100 rounded"><a href="">Romance</a></li>
                        <li class="py-1 px-2 bg-emerald-100 rounded"><a href="">Ficção</a></li>
                    </ul>
                    <h1 class="text-3xl font-bold text-slate-800 mb-1">Memórias Póstumas de Brás Cubas</h1>
                    <strong class="font-semibold text-xl text-slate-600"><a href="">Machado de Assis</a></strong>
                    <ul class="grid grid-cols-2 gap-1 justify-between my-4 text-slate-500">
                        <li>455 Avaliações:
                            <span>
                                <button><img src="../static/assets/icons/filled-star.svg" alt="Estrla"></button>
                                <button><img src="../static/assets/icons/filled-star.svg" alt="Estrla"></button>
                                <button><img src="../static/assets/icons/filled-star.svg" alt="Estrla"></button>
                                <button><img src="../static/assets/icons/filled-star.svg" alt="Estrla"></button>
                                <button><img src="../static/assets/icons/filled-star.svg" alt="Estrla"></button>
                            </span>
                        </li>
                        <li class="justify-self-end">50 Comentários</li>
                        <li>8º Edição</li>
                        <li class="justify-self-end">Editora Intrinseca</li>
                        <li>6 Exemplares</li>
                    </ul>
                    <div class="flex gap-4 my-8">
                        <button class="flex-1 py-2 rounded bg-emerald-500 hover:bg-emerald-500 text-slate-50 font-medium">Adicionar
                            a Sua Lista</button>
                        <a class="flex-1 py-2 rounded border-2 border-emerald-500 text-center font-medium text-emerald-600 hover:border-emerald-600 hover:text-emerald-700" href="">Deixe o seu Comentário</a>
                    </div>
                    <div>
                        <h2 class="text-lg font-medium text-slate-600">Síntese</h2>
                        <p class="text-slate-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, enim,
                            sequi accusamus beatae
                            incidunt reprehenderit ab vero, minima deleniti sunt accusantium similique inventore? Aut,
                            nihil facilis pariatur, sed quos totam dolor libero ad error quidem voluptas commodi quaerat
                            dolorum amet ducimus beatae atque nobis! Alias culpa aspernatur sequi ratione beatae.</p>
                    </div>
                </div>
            </section>

            <section>
                <h2 class="font-semibold text-xl text-slate-600">Deixe o seu Comentário</h2>

                <form class="flex flex-col my-8 items-end gap-2">
                    <article class="p-4 bg-white border rounded-lg w-full">
                        <header class="flex gap-2 mb-2">
                            <img src=" ../static/assets/profileFiller.png" alt="Fulano">
                            <div class="hidden md:flex flex-col justify-center items-start w-fit">
                                <span class="text-slate-600 text-sm md:text-base font-medium block">Fulano de
                                    tal</span>
                                <span class="block text-xs md:text-sm text-slate-500">Aluno</span>
                            </div>
                        </header>
                        <textarea name="comment" class="w-full h-8 p-1 text-slate-600" placeholder="O que você achou dessa obra?"></textarea>
                        <input type="number" class="hidden" name="replay-to">
                    </article>

                    <button class="w-min px-4 py-2 bg-emerald-500 rounded-lg font-medium text-slate-50">Comentar</button> <!-- Responder Fulano-->
                </form>

                <div>
                    <article class="p-4 bg-white border rounded-lg">
                        <header class="flex gap-2 mb-2">
                            <img src=" ../static/assets/profileFiller.png" alt="Fulano">
                            <div class="hidden md:flex flex-col justify-center items-start w-fit">
                                <span class="text-slate-700 text-sm md:text-base block leading-none">Fulano de
                                    tal</span>
                                <span class="block text-xs font-light text-slate-500 leading-none">Aluno</span>
                            </div>
                        </header>
                        <p class="w-full h-8 p-1 h-min text-slate-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde exercitationem dicta perferendis? Omnis, facere enim doloremque quibusdam velit natus repellendus sit, aperiam consequuntur sunt tenetur libero impedit? Error, in non.</p>
                    </article>
                </div>
            </section>
        </main>

        <?php
            include('../components/footer.php');
        ?>
    </div>

    <script src="./static/scripts/inputEffect.js"></script>
</body>

</html>