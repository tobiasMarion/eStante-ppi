<?php
if (!isset($component_prefix_path)) {
    $component_prefix_path = '';
    global $component_prefix_path;
}
?>

<footer class="bg-emerald-500">
    <div class="w-full max-w-7xl mx-auto py-8 px-2 flex items-center justify-between">
        <div>
            <img src="<?= $component_prefix_path ?>./static/assets/eStante-white.svg" alt="eStante" class="mb-4 md:mb-6">
            <p class="text-xs text-slate-200 max-w-lg font-light">O eStante foi um projeto desenvolvido para a
                Prática Profissional Integrada (PPI) da turma do 3º
                ano do Curso Técnico em Informática Integrado ao Ensino Médio, no ano de 2022.</p>
        </div>
        <a href="#" class="hidden md:block p-2 bg-slate-50 rounded-md"><img src="<?= $component_prefix_path ?>./static/assets/icons/arrow-up.svg" alt="De volta ao topo"></a>
    </div>
    <div class="flex justify-center items-center bg-slate-50 py-1">
        <p class="text-xs text-slate-600">Made with <img src="<?= $component_prefix_path ?>./static/assets/icons/heart.svg" alt="Love" class="inline w-3"> by Amanda, Josué, Tobias and Wagner - 34/22
        </p>
    </div>
</footer>