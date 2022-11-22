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
                    <legend class="text-2xl text-slate-600 font-semibold mb-4">Dados da obra</legend>
                    <div class="flex flex-col gap-1 mb-4">
                        <label for="title" class="text-base text-slate-500 font-medium cursor-pointer">Título</label>
                        <div class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">
                            <input type="text" name="title" id="title" class="outline-0 bg-transparent text-base text-slate-500 w-full pl-1" placeholder="Lemony Snicket" required>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 mb-4">
                        <label for="subtitle" class="text-base text-slate-500 font-medium cursor-pointer">Subtítulo <small>(Opcional)</small></label>
                        <div class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">
                            <input type="text" name="subtitle" id="subtitle" class="outline-0 bg-transparent text-base text-slate-500 w-full pl-1" placeholder="Autobiografia não autorizada">
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 mb-4">
                        <label for="collection" class="text-base text-slate-500 font-medium cursor-pointer">Tipo de Acervo</label>
                        <div class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">
                            <select class="w-full text-slate-500" name="collection" id="collection" required>
                                <option value="">Livro</option>
                                <option value="">Revista</option>
                                <option value="">Artigo</option>
                                <option value="+">Cadastrar novo</option>
                            </select>
                            <button type="button"><img src="../static/assets/icons/add.svg" alt="Adicionar"></button>
                        </div>
                        <div class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">
                            <input type="text" name="newCollection" id="newCollection" class="outline-0 bg-transparent text-base text-slate-500 w-full pl-1" placeholder="Novo tipo de acervo">
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 mb-4">
                        <label for="isbn" class="text-base text-slate-500 font-medium cursor-pointer">ISBN</label>
                        <div class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">
                            <input type="text" name="isbn" id="isbn" class="outline-0 bg-transparent text-base text-slate-500 w-full pl-1" placeholder="978-3-16-148410-0" required>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 mb-4">
                        <label for="publisher" class="text-base text-slate-500 font-medium cursor-pointer">Editora</label>
                        <div class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">
                            <input type="text" name="publisher" id="publisher" class="outline-0 bg-transparent text-base text-slate-500 w-full pl-1" placeholder="Intrínseca" required>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 mb-4">
                        <label for="year" class="text-base text-slate-500 font-medium cursor-pointer">Ano</label>
                        <div class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">
                            <input type="number" name="year" id="year" min="0" class="outline-0 bg-transparent text-base text-slate-500 w-full pl-1" placeholder="2000" required>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 mb-4">
                        <label for="place" class="text-base text-slate-500 font-medium cursor-pointer">Local</label>
                        <div class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">
                            <input type="text" name="place" id="place" class="outline-0 bg-transparent text-base text-slate-500 w-full pl-1" placeholder="São Paulo, Brasil" required>
                        </div>
                    </div>

                    <div class="flex flex-col gap-1 mb-4">
                        <label for="synthesis" class="text-base text-slate-500 font-medium cursor-pointer">Síntese</label>
                        <div class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">
                            <textarea name="synthesis" id="synthesis" class="w-full h-8 p-1 text-slate-600 outline-0 h-16" placeholder="O que você achou dessa obra?"></textarea>
                        </div>
                    </div>

                    <div class="flex flex-col gap-1 mb-4">
                        <label for="tags" class="text-base text-slate-500 font-medium cursor-pointer">Tags <small>Separadas por vírgula</small></label>
                        <div class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">
                            <input type="text" name="tags" id="tags" class="outline-0 bg-transparent text-base text-slate-500 w-full pl-1" placeholder="Literatura Brasileira, Aventura" required>
                        </div>
                    </div>

                    <div class="flex flex-col gap-1 mb-4">
                        <label for="cover" class="text-base text-slate-500 font-medium cursor-pointer">Capa do livro</label>
                        <input type="file" name="cover" id="cover" class="hidden" required placeholder="Insira uma capa do livro" accept="image/*">
                        <label for="cover" class="w-fit py-1 px-2 bg-emerald-100 text-emerald-700 rounded">Escolher arquivo</label>
                    </div>
                </fieldset>
                <fieldset>
                    <legend class="text-2xl text-slate-600 font-semibold mb-4">Dados da obra na biblioteca</legend>
                    <div class="flex flex-col gap-1 mb-4">
                        <label for="library" class="text-base text-slate-500 font-medium cursor-pointer">Biblioteca</label>
                        <div class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">

                            <select class="w-full text-slate-500" name="library" id="library" required>
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
                    <div class="flex flex-col gap-1 mb-4">
                        <label for="section" class="text-base text-slate-500 font-medium cursor-pointer">Seção</label>
                        <div class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">
                            <input type="text" name="section" id="section" min="0" class="outline-0 bg-transparent text-base text-slate-500 w-full pl-1" placeholder="a4" required>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 mb-4 flex-1">
                        <label for="student" class="text-base text-slate-500 font-medium cursor-pointer">Categoria</label>
                        <div class="flex gap-1">
                            <input type="radio" name="type" id="digital" value="true" checked>
                            <label for="digital" class="mr-4 text-slate-500">Obra digital</label>
                            <input type="radio" name="type" id="physical" value="false">
                            <label for="physical" class="mr-4 text-slate-500">Obra Física</label>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 mb-4">
                        <label for="url" class="text-base text-slate-500 font-medium cursor-pointer">URL</label>
                        <div class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">
                            <input type="url" name="url" id="url" min="0" class="outline-0 bg-transparent text-base text-slate-500 w-full pl-1" placeholder="https://" required>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 mb-4">
                        <label for="inventory" class="text-base text-slate-500 font-medium cursor-pointer">Estoque</label>
                        <div class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">
                            <input type="number" name="inventory" id="inventory" min="0" class="outline-0 bg-transparent text-base text-slate-500 w-full pl-1" placeholder="2" required>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 mb-4">
                        <label for="number" class="text-base text-slate-500 font-medium cursor-pointer">Número do Livro</label>
                        <div class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">
                            <input type="text" name="number" id="number" min="0" class="outline-0 bg-transparent text-base text-slate-500 w-full pl-1" placeholder="091916" required>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 mb-4">
                        <label for="classification" class="text-base text-slate-500 font-medium cursor-pointer">Classificação</label>
                        <div class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">
                            <input type="text" name="classification" id="classification" min="0" class="outline-0 bg-transparent text-base text-slate-500 w-full pl-1" placeholder="004.421 S183a" required>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 mb-4">
                        <label for="physicalDescription" class="text-base text-slate-500 font-medium cursor-pointer">Descrição Física</label>
                        <div class="flex gap-2 border rounded-lg border-1 border-slate-300 p-1 input-container-effect relative">
                            <input type="text" name="physicalDescription" id="physicalDescription" min="0" class="outline-0 bg-transparent text-base text-slate-500 w-full pl-1" placeholder="004.421 S183a" required>
                        </div>
                    </div>
                </fieldset>


                <button class="w-full py-2 mt-4 text-lg text-slate-50 bg-emerald-500 hover:bg-emerald-600 rounded-lg" name="submit">Cadastrar</button>
            </form>
        </main>

        <?php
        include('../components/footer.php');
        ?>
    </div>

    <script src="../static/scripts/inputEffect.js"></script>
</body>

</html>