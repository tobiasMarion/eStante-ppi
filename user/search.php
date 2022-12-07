<?php
    $component_prefix_path = '../'; 
    include('../auth/protect.php');
    include('../components/head.php');

?>

<body>
    <div class="bg-slate-50 flex flex-col min-h-screen">
        <?php
            include('../components/header.php');
        ?>

        <main class="w-full max-w-7xl mx-auto flex-grow my-8 md:my-16 px-2 flex flex-col gap-2">
            <h1 class="font-semibold text-slate-900 text-2xl md:text-4xl mb-2">Autor Machado de Assis</h1>
            <p class="text-slate-500 text-sm md:text-base mb-4">Vamos ver o que encontramos na eStante sobre “Autor
                Machado de Assis”.</p>


            <table class="table-auto w-full">
                <thead class="h-8">
                    <tr class="text-center border-b">
                        <th class="text-left mr-2 text-slate-500 font-medium text-xs md:text-sm">Avatar</th>
                        <th class="text-left text-slate-500 font-medium text-xs md:text-sm">Nome</th>
                        <th class="text-left text-slate-500 font-medium text-xs md:text-sm">Email</th>
                        <th class="text-slate-500 font-medium text-xs md:text-sm hidden md:table-cell">CPF/SIAPE</th>
                        <th class="text-slate-500 font-medium text-xs md:text-sm hidden md:table-cell">Permissão</th>
                        <th class="text-slate-500 font-medium text-xs md:text-sm hidden md:table-cell">Promover</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center py-2 border-b h-16">
                        <td class="text-left mr-2"><img src="./static/assets/bookCoverFiller.png" alt="Capa" class="w-12 object-cover rounded"></td>
                        <td class="text-left font-semibold text-slate-600 text-xs md:text-sm px-4 table-cell"><a href="">Memórias
                                Póstumas de Brás Cubas</a></td>
                        <td class="text-left text-slate-500 text-xs md:text-sm">Machado de Assis</td>
                        <td class="hidden md:table-cell">
                            <button><img src="../static/assets/icons/filled-star.svg" alt="Estrla"></button>
                            <button><img src="../static/assets/icons/filled-star.svg" alt="Estrla"></button>
                            <button><img src="../static/assets/icons/filled-star.svg" alt="Estrla"></button>
                            <button><img src="../static/assets/icons/filled-star.svg" alt="Estrla"></button>
                            <button><img src="../static/assets/icons/filled-star.svg" alt="Estrla"></button> 
                        </td>
                        <td class="text-slate-500 text-xs md:text-sm hidden md:table-cell">8º</td>
                        <td><button class="border p-2 rounded-md drop-shadow-sm"><img src="../static/assets/icons/copy.svg" alt="Copiar"></button></td>
                    </tr>

                </tbody>
            </table>
        </main>

        <?php
            include('../components/footer.php');
        ?>        
    </div>


    <script src="<?= $component_prefix_path . "./static/scripts/inputEffect.js"?>"></script>
    
</body>

</html>