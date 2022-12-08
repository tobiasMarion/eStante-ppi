<?php
$component_prefix_path = '../';
global $component_prefix_path;

include('../auth/protect.php');
include('../components/head.php');
include('../db/connection.php');

$id = $mysqli->real_escape_string($_GET['item']);

$sql_code = "SELECT * FROM item WHERE itemID=$id";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
$item = $sql_query->fetch_assoc();

$sql_code = "SELECT * FROM tag INNER JOIN itemtag ON itemTag.tagID=tag.tagID WHERE itemtag.itemID=$id;";
$sql_query_tag = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
$item["tags"] = $sql_query_tag;

$sql_code = "SELECT * FROM author INNER JOIN itemAuthor ON itemAuthor.authorID=author.authorID WHERE itemAuthor.itemID=$id";
$sql_query_author = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
$item["authors"] = $sql_query_author;

$sql_code = "SELECT * FROM comment WHERE itemID=$id";
$sql_query_comment = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
$item["comments"] = $sql_query_comment;

$sql_code = "SELECT COUNT(value), AVG(value) FROM evaluation WHERE itemID=$id";
$sql_query_evaluation = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
$item["evaluation"] = $sql_query_evaluation->fetch_assoc();

$personID = $_SESSION["id"];
$sql_code = "SELECT * FROM itemperson WHERE itemID=$id AND personID=$personID;";
$sql_query_favorites = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
$item["isFavorite"] = $sql_query_favorites->num_rows == 1 ? true : false;

global $id;
global $item;
?>

<body>
    <div class="bg-slate-50 flex flex-col min-h-screen">
        <?php
        include '../components/header.php';
        ?>

        <main class="w-full max-w-7xl mx-auto flex-grow my-8 md:my-16 px-2 flex flex-col gap-2">
            <section class="md:flex gap-12 mb-12">
                <img src="<?= $component_prefix_path . $item["cover"] ?>" alt="Capa do Livro" class="w-full rounded-lg mx-auto mb-4 md:w-6/12 max-h-screen">
                <div class="md:flex-1 my-auto">
                    <ul class="flex gap-2 text-xs text-emerald-700 mb-4">
                        <?php
                        while ($tag = $item["tags"]->fetch_assoc()) {
                            $name = $tag["name"];
                            $link = "<li class=\"py-1 px-2 bg-emerald-100 rounded\"><a href=\"../search.php?search=$name&search-for=tag\">$name</a></li>";
                            echo ($link);
                        }
                        ?>
                    </ul>
                    <h1 class="text-3xl font-bold text-slate-800 mb-1"><?= $item["title"] ?></h1>
                    <?php
                    $subtitle = $item["subtitle"];
                    if ($subtitle) {
                        echo ("<strong class=\"block font-medium text-md text-slate-500 mb-4\">$subtitle</strong>");
                    }

                    $authors = [];
                    while ($author = $item["authors"]->fetch_assoc()) {
                        $name = $author["name"];
                        $link = "<a href=\"../search.php?search=$name&search-for=author\">$name</a>";
                        array_push($authors, $link);
                    }

                    $authors = implode(", ", $authors);

                    echo ("<strong class=\"block font-semibold text-xl text-slate-600\">$authors</strong>");
                    ?>

                    <ul class="grid grid-cols-2 gap-1 justify-between my-4 text-slate-500">
                        <li class="flex items-center gap-2"><?= $item["evaluation"]["COUNT(value)"] ?> Avaliações:
                            <form action="#" id="evaluation">
                                <?php
                                for ($star = 1; $star < 6; $star++) {
                                    $src = $star <= $item["evaluation"]["AVG(value)"] ? "filled" : "unfilled";
                                    echo ("<button><img src=\"../static/assets/icons/$src-star.svg\" alt=\"Estrela\" data-value=\"$star\"></button>");
                                }
                                ?>

                                <input type="hidden" name="person" value="<?= $_SESSION['id'] ?>">
                                <input type="hidden" name="item" value="<?= $id ?>">
                            </form>
                        </li>
                        <li class="justify-self-end"><?= $item["comments"]->num_rows ?> Comentários</li>
                        <li><?= $item["edition"] ?>ª Edição</li>
                        <li class="justify-self-end">Editora <?= $item["publisher"] ?></li>
                        <?php
                        if (!$item["isDigital"]) {
                            $inventory = $item["inventory"];
                            echo ("<li>$inventory Unidades Disponíveis</li>");
                        }
                        ?>
                    </ul>

                    <?php
                    $buttons = "";

                    $text = $item["isFavorite"] ? "Remover dos Favoritos" : "Adicionar aos Favoritos";

                    if ($item['isDigital']) {
                        $url = $item["url"];
                        $buttons = "<div class=\"flex gap-4 my-8\">
                            <a 
                                class=\"flex-1 py-2 rounded bg-emerald-500 hover:bg-emerald-500 text-slate-50 font-medium text-center\" target=\"_blank\" href=\"$url\">
                                Leia agora
                            </a>
                            <button class=\"add-to-favorites flex-1 py-2 rounded border-2 border-emerald-500 text-center font-medium text-emerald-600 hover:border-emerald-600 hover:text-emerald-700\">$text</button>
                        </div>";
                    } else {
                        $buttons = "
                        <div class=\"flex gap-4 my-8\">
                        <button class=\"flex-1 py-2 rounded bg-emerald-500 hover:bg-emerald-500 text-slate-50 font-medium add-to-favorites\">
                            $text
                        </button>
                            <a class=\"flex-1 py-2 rounded border-2 border-emerald-500 text-center font-medium text-emerald-600 hover:border-emerald-600 hover:text-emerald-700\" href=\"#comments\">
                            Deixe o seu Comentário
                        </a>
                    </div>";
                    }

                    echo ($buttons);

                    if ($_SESSION['permission'] == 'Administrador') {
                        $buttons = "
                            <div class=\"flex gap-4 my-8 text-sm\">
                                <a class=\"py-2 px-4 bg-emerald-100 rounded text-emerald-700 flex-1 text-center\" href=\"./create.php?item=$id\">Editar Obra</a>
                                <a class=\"py-2 px-4 bg-red-100 rounded text-red-700 flex-1 text-center\" href=\"./delete.php?item=$id\">Excluir Obra</a>
                            </div>";

                        echo ($buttons);
                    }
                    ?>
                    <div>
                        <h2 class="text-lg font-medium text-slate-600">Síntese</h2>
                        <p class="text-slate-500"><?= $item["synthesis"] ?></p>
                    </div>
                </div>
            </section>
            <section id="comments">
                <h2 class="font-semibold text-xl text-slate-600 mb-2">Deixe o seu Comentário</h2>
                <p class="text-slate-500 mb-4 text-sm flex items-center gap-2">
                    <img src=" ../static/assets/icons/warning.svg" alt="Atenção" class="w-4">
                    Antes de serem exibidos, todos os comentários passam por uma revisão dos moderadores da <i>eStante</i>.
                </p>



                <form class="flex flex-col my-8 items-end gap-2 send-comment" method="POST" action="./send_messages.php">
                    <article class="p-4 bg-white border rounded-lg w-full">
                        <header class="flex gap-2 mb-2">
                            <img src="<?= str_starts_with($_SESSION['avatar'], 'https://') ? $_SESSION['avatar'] : $component_prefix_path . $_SESSION['avatar'] ?>" alt="Avatar" class="w-12 h-auto rounded-full border border-2 border-emerald-500 object-cover">
                            <div class="hidden md:flex flex-col justify-center items-start w-fit">
                                <span class="text-slate-600 text-sm md:text-base font-medium block name-label"><?= $_SESSION["name"] ?></span>
                                <span class="block text-xs md:text-sm text-slate-500">Aluno</span>
                            </div>
                        </header>
                        <textarea name="comment" class="w-full h-8 p-1 text-slate-600" placeholder="O que você achou dessa obra?"></textarea>
                    </article>

                    <input type="hidden" name="item-id" value="<?= $item["itemID"] ?>">
                    <input type="hidden" name="reply-to" value="">
                    <input type="hidden" name="person" value="<?= $_SESSION["id"] ?>">
                    <button class="w-min px-4 py-2 bg-emerald-500 rounded-lg font-medium text-slate-50">Comentar</button>
                </form>

                <div>
                    <?php
                    $sql_code = "SELECT * FROM comment INNER JOIN person ON comment.personID = person.personID WHERE approved=1 AND replyTo IS NULL AND itemID=$id";
                    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);


                    while ($comment = $sql_query->fetch_assoc()) {
                        $avatar = str_starts_with($comment['avatar'], 'https://') ? $_SESSION['avatar'] : $component_prefix_path . $comment['avatar'];
                        $commentID = $comment['commentID'];
                        $name = $comment['name'];
                        $type = $comment["type"] == "student" ? "Aluno" : "Servidor";
                        $content = $comment['content'];

                        $article = "<article class=\"p-4 bg-white border mb-4 rounded\">
                            <header class=\"flex gap-2 mb-2\">
                                <img src=\"$avatar\" alt=\"Fulano\" class=\"w-12 object-cover rounded-full\">
                                <div class=\"hidden md:flex flex-col justify-center items-start w-fit\">
                                    <span class=\"text-slate-700 text-sm md:text-base block leading-none\">$name</span>
                                    <span class=\"block text-xs font-light text-slate-500 leading-none\">$type</span>
                                </div>
                            </header>
                            <p class=\"w-full h-8 p-1 h-min text-slate-600\">$content</p>
                            <a href=\"#comments\" data-comment-id=\"$commentID\" class=\"block w-min reply-button py-1 px-2 bg-emerald-100 rounded text-emerald-700 flex-1 text-center text-xs ml-auto mt-2\">Responder</a>
                        </article>";

                        echo ($article);

                        $sql_code = "SELECT * FROM comment INNER JOIN person ON comment.personID = person.personID WHERE approved=1 AND replyTo=$commentID AND itemID=$id";
                        $sql_query_sub_comment = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);

                        if ($sql_query_sub_comment->num_rows > 0) {
                            echo ("<div class=\"ml-4\">");
                            while ($subcomment = $sql_query_sub_comment->fetch_assoc()) {
                                $avatar = str_starts_with($subcomment['avatar'], 'https://') ? $_SESSION['avatar'] : $component_prefix_path . $subcomment['avatar'];
                                $subcommentID = $subcomment['commentID'];
                                $subname = $subcomment['name'];
                                $type = $subcomment["type"] == "student" ? "Aluno" : "Servidor";
                                $content = $subcomment['content'];

                                $article = "<article class=\"p-4 bg-white border mb-4 rounded\">
                                    <header class=\"flex gap-2 mb-2\">
                                        <img src=\"$avatar\" alt=\"Fulano\" class=\"w-12 object-cover rounded-full\">
                                        <div class=\"hidden md:flex flex-col justify-center items-start w-fit\">
                                            <span class=\"text-slate-700 text-sm md:text-base block leading-none\">$subname <small>respondendo $name</small></span>
                                            <span class=\"block text-xs font-light text-slate-500 leading-none\">$type</span>
                                        </div>
                                    </header>
                                    <p class=\"w-full h-8 p-1 h-min text-slate-600\">$content</p>
                                </article>";

                                echo ($article);
                            }
                            echo ("</div>");
                        }
                    }

                    ?>


                </div>
            </section>
        </main>

        <?php
        include('../components/footer.php');
        ?>
    </div>

    <script src="<?= $component_prefix_path ?>./static/scripts/inputEffect.js"></script>
    <script src="<?= $component_prefix_path ?>./static/scripts/evaluationHandler.js"></script>
    <script src="<?= $component_prefix_path ?>./static/scripts/addToFavorites.js"></script>
    <script src="<?= $component_prefix_path ?>./static/scripts/comment.js"></script>
</body>

</html>