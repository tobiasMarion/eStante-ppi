<?php
include('./auth/protect.php');
include('./components/head.php');
?>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
</head>

<body>
    <div class="bg-slate-50 flex flex-col min-h-screen">
        <?php
        include './components/header.php';
        ?>

        <main class="w-full max-w-7xl mx-auto flex-grow my-8 md:my-16 px-2">
            <section class="flex flex-col p-8 rounded-lg bg-emerald-500 drop-shadow-sm">
                <strong class="block font-semibold text-3xl	md:text-4xl max-w-2xl text-slate-50 mb-6">Qual obra você vai
                    retirar da eStante hoje?</strong>
                <p class="block text-sm md:text-base text text-slate-200 max-w-2xl mb-2">Se os escritores escrevesse tão
                    descuidadamente como algumas pessoas falam, então adhasdh asdglaseuyt
                    [bn [pasdlgkhasdfasdf.</p>
                <span class="block text-slate-200 text-sm md:text-base font-semibold mb-6">Lemony Snicket</span>
                <a href="#collection" class="flex gap-2 items-center py-2 px-4 text-sm md:text-base bg-slate-50 text-emerald-500 w-fit font-semibold rounded-md hover:gap-3">Explorar
                    o acervo <img src="./static/assets/icons/arrow-right.svg" alt="Seta"></a>
            </section>

            <section id="collection" class="my-16">
                <h2 class="font-semibold text-slate-700 text-2xl mb-4">Recém-chegados na eStante</h2>
                <div class="swiper mySwiper px-12 h-min">
                    <div class="swiper-wrapper pb-16">
                        <?php
                        include('./db/connection.php');

                        $sql_code = "SELECT * FROM item ORDER BY itemID DESC LIMIT 18";
                        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);

                        while ($item = $sql_query->fetch_assoc()) {
                            $id = $item["itemID"];
                            $cover = $item["cover"];
                            $title = $item["title"];
                            $authors = [];

                            $sql_code = "SELECT author.name FROM itemauthor INNER JOIN author ON itemauthor.authorID=author.authorID WHERE itemauthor.itemID=$id;";
                            $sql_query_authors = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);

                            while ($author = $sql_query_authors->fetch_assoc()) {
                                array_push($authors, $author["name"]);
                            }

                            $authors = implode(", ", $authors);

                            $itemArticle = "
                                    <article class=\"swiper-slide rounded-lg overflow-hidden border drop-shadow\">
                                        <img src=\"$cover\" alt=\"Capa: Livro tal\" class=\"object-cover w-full h-48\">
                                        <h3 class=\"text-base text-slate-700 mx-2 mt-4 font-medium\">$title</h3>
                                        <p class=\"text-sm text-slate-600 mx-2 mb-4\">$authors</p>
                                        <a href=\"./item/?item=$id\" class=\"flex items-center justify-center gap-2 hover:gap-3 hover:bg-emerald-100 font-medium py-2 bg-emerald-50 text-emerald-600 border-t\">
                                            Visitar obra 
                                            <img src=\"./static/assets/icons/arrow-right.svg\" alt=\"Visitar\">
                                        </a>
                                    </article>
                                ";

                            echo ($itemArticle);
                        }
                        ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>

            <?php
            $personID = $_SESSION["id"];
            $sql_code = "SELECT * FROM itemperson INNER JOIN item ON item.itemID=itemperson.itemID WHERE personID=$personID";
            $sql_query_select = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
            $rows = $sql_query_select->num_rows;

            if ($rows > 0) {
                echo ("
                    <section class=\"my-16\">
                        <h2 class=\"font-semibold text-slate-700 text-2xl mb-4\">Sua Lista de Leitura</h2>
                        <div class=\"swiper mySwiper px-12 h-min\">
                            <div class=\"swiper-wrapper pb-16\">
                ");

                while ($item = $sql_query_select->fetch_assoc()) {
                    $id = $item["itemID"];
                    $cover = $item["cover"];
                    $title = $item["title"];
                    $authors = [];

                    $sql_code = "SELECT author.name FROM itemauthor INNER JOIN author ON itemauthor.authorID=author.authorID WHERE itemauthor.itemID=$id;";
                    $sql_query_authors = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);

                    while ($author = $sql_query_authors->fetch_assoc()) {
                        array_push($authors, $author["name"]);
                    }

                    $authors = implode(", ", $authors);

                    $itemArticle = "
                            <article class=\"swiper-slide rounded-lg overflow-hidden border drop-shadow\">
                                <img src=\"$cover\" alt=\"Capa: Livro tal\" class=\"object-cover w-full h-48\">
                                <h3 class=\"text-base text-slate-700 mx-2 mt-4 font-medium\">$title</h3>
                                <p class=\"text-sm text-slate-600 mx-2 mb-4\">$authors</p>
                                <a href=\"./item/?item=$id\" class=\"flex items-center justify-center gap-2 hover:gap-3 hover:bg-emerald-100 font-medium py-2 bg-emerald-50 text-emerald-600 border-t\">
                                    Visitar obra 
                                    <img src=\"./static/assets/icons/arrow-right.svg\" alt=\"Visitar\">
                                </a>
                            </article>
                        ";

                    echo ($itemArticle);
                }


                echo ("
                            </div>
                            <div class=\"swiper-button-next\"></div>
                            <div class=\"swiper-button-prev\"></div>
                            <div class=\"swiper-pagination\"></div>
                        </div>
                    </section>
                ");
            }
            ?>
        </main>

        <?php
        include('./components/footer.php');
        ?>
    </div>

    <script src="./static/scripts/inputEffect.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="./static/scripts/swiperSetup.js"></script>
</body>

</html>