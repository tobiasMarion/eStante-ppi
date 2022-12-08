<?php
include('./components/head.php');
include('./auth/protect.php');
include('./db/connection.php');

if (in_array($_SESSION['permission'], ['Administrador', 'Funcionário', 'Moderador'])) {
    $sql_code = "SELECT * FROM comment INNER JOIN person ON comment.personID = person.personID WHERE approved=0";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);

    global $sql_query;
} else {
    header("Location: ./");
}

?>

<body>
    <div class="bg-slate-50 flex flex-col min-h-screen">
        <header class="w-full bg-emerald-500 px-2">
            <div class="w-full max-w-3xl mx-auto pt-8 pb-24">
                <a href="./"><img src="./static/assets/eStante-white.svg" alt="eStante" class="mx-auto mb-8"></a>
                <h1 class="text-4xl font-semibold text-slate-50 mb-4">Comentários Pendentes</h1>
                <p class="text-sm md:text-base text-slate-200">Aprove ou exclua os comentários que serão exibidos nos items do acervo. </p>
            </div>
        </header>

        <main class="w-full flex-grow mb-8 md:mb-16 px-2 flex-1">
            <div class="max-w-3xl negative-margin border drop-shadow-sm rounded-lg bg-white w-full mx-auto p-8">
                <h2 class="text-2xl text-slate-600 font-semibold mb-4">Para avalição</h2>
                <?php
                while ($comment = $sql_query->fetch_assoc()) {
                    $commentID = $comment["commentID"];
                    $content = $comment["content"];
                    $name = $comment["name"];
                    $type = $comment["type"] == "student" ? "Aluno" : "Servidor";


                    if (!is_null($comment["replyTo"])) {
                        $sql_code = "SELECT * FROM comment INNER JOIN person ON comment.personID = person.personID WHERE replyTo IS NOT NULL";
                        $sql_query_reply = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
                        if ($sql_query_reply->num_rows > 0) {
                            $reply_to = $sql_query_reply->fetch_assoc();
                            $reply_to = $reply_to["name"];
                            $name .= " em resposta a $reply_to";
                        }
                    }

                    $article = "
                    <article class=\"p-4 bg-white border rounded-lg mb-4 drop-shadow-sm comment comment-$commentID\">
                        <header class=\"flex gap-2 mb-2\">
                            <img src=\" ./static/assets/profileFiller.png\" alt=\"Fulano\">
                            <div class=\"hidden md:flex flex-col justify-center items-start w-fit\">
                                <span class=\"text-slate-700 text-sm md:text-base block leading-none\">$name</span>
                                <span class=\"block text-xs font-light text-slate-500 leading-none\">$type</span>
                            </div>
                        </header>
                        <p class=\"w-full h-8 p-1 h-min text-slate-600\">$content</p>
                        <div class=\"flex justify-end gap-4 text-sm mt-4\">
                            <button class=\"py-2 px-4 bg-red-100 rounded text-red-700 text-center\" data-comment-id=\"$commentID\">Excluir</button>
                            <button class=\"py-2 px-4 bg-emerald-100 rounded text-emerald-700 text-center\" data-comment-id=\"$commentID\">Aprovar</button>
                        </div>
                    </article>
                    ";

                    echo $article;
                }

                ?>

            </div>
        </main>

        <?php
        include('./components/footer.php');
        ?>
    </div>

    <script src="./static/scripts/inputEffect.js"></script>
    <script src="./static/scripts/moderateComments.js"></script>
</body>

</html>