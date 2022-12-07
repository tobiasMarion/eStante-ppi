<?php
include('./db/connection.php');
include('./auth/protect.php');
include('./components/head.php');

$search = $mysqli->real_escape_string($_GET['search']);
$search_for = $mysqli->real_escape_string($_GET['search-for']);

$sql_code = "";
$type = "";

switch ($search_for) {
    case 'tag':
        $sql_code = "SELECT * FROM tag INNER JOIN itemtag ON tag.tagID=itemtag.tagID INNER JOIN item ON itemtag.itemID=item.itemID WHERE tag.name LIKE \"%$search%\"";
        $type = "Tag";
        break;

    case 'author':
        $sql_code = "SELECT * FROM author INNER JOIN itemauthor ON author.authorID=itemauthor.authorID INNER JOIN item ON itemauthor.itemID=item.itemID WHERE author.name LIKE \"%$search%\"";
        $type = "Autor";

        break;

    default:
        $sql_code = "SELECT * FROM item WHERE item.title LIKE \"%$search%\"";
        $type = "Título";
        break;
}

$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
$display_text = "$type $search";

global $sql_query;
global $display_text;
?>

<body>
    <div class="bg-slate-50 flex flex-col min-h-screen">
        <?php
        include('./components/header.php');
        ?>

        <main class="w-full max-w-7xl mx-auto flex-grow my-8 md:my-16 px-2 flex flex-col gap-2">
            <h1 class="font-semibold text-slate-900 text-2xl md:text-4xl mb-2"><?= $display_text ?></h1>
            <p class="text-slate-500 text-sm md:text-base mb-4">Vamos ver o que encontramos na eStante sobre "<?= $display_text ?>".</p>


            <table class="table-auto w-full">
                <thead class="h-8">
                    <tr class="text-center border-b">
                        <th class="text-left mr-2 text-slate-500 font-medium text-xs md:text-sm">Capa</th>
                        <th class="text-left text-slate-500 font-medium text-xs md:text-sm">Título</th>
                        <th class="text-left text-slate-500 font-medium text-xs md:text-sm">Autores</th>
                        <th class="text-slate-500 font-medium text-xs md:text-sm hidden md:table-cell">Avaliação</th>
                        <th class="text-slate-500 font-medium text-xs md:text-sm hidden md:table-cell">Edição</th>
                        <th class="text-slate-500 font-medium text-xs md:text-sm hidden md:table-cell">Tipo de Obra</th>
                        <th class="text-slate-500 font-medium text-xs md:text-sm hidden md:table-cell">Exemplares</th>
                        <th class="text-slate-500 font-medium text-xs md:text-sm">Referência</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($item = $sql_query->fetch_assoc()) {
                        $id = $item["itemID"];
                        $title = $item["title"];

                        $sql_code = "SELECT * FROM author INNER JOIN itemAuthor ON itemAuthor.authorID=author.authorID WHERE itemAuthor.itemID=$id";
                        $sql_query_author = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
                        $authors = [];
                        while ($author = $sql_query_author->fetch_assoc()) {
                            $name = $author["name"];
                            $link = "<a href=\"\">$name</a>";
                            array_push($authors, $link);
                        }

                        $authors = implode(", ", $authors);
                        $edition = $item["edition"];
                        $type = $item["isDigital"] ? "Digital" : "Física";
                        $inventory = $item["inventory"] ? $item["inventory"] : "Online";
                        $cover = $component_prefix_path . $item["cover"];

                        $sql_code = "SELECT COUNT(value), AVG(value) FROM evaluation WHERE itemID=$id";
                        $sql_query_evaluation = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
                        $item["evaluation"] = $sql_query_evaluation->fetch_assoc();

                        $tr = "
                            <tr class=\"text-center py-2 border-b h-16\">
                                <td class=\"text-left mr-2\"><img src=\"$cover\" alt=\"Capa\" class=\"w-12 h-12 object-cover rounded\"></td>
                                <td class=\"text-left font-semibold text-slate-600 text-xs md:text-sm px-4 table-cell\"><a href=\"./item/?item=$id\">$title</a></td>
                                <td class=\"text-left text-slate-500 text-xs md:text-sm\">$authors</td>
                                <td class=\"hidden md:table-cell\">";

                        for ($star = 1; $star < 6; $star++) {
                            $src = $star <= $item["evaluation"]["AVG(value)"] ? "filled" : "unfilled";
                            $tr .= "<button><img src=\"./static/assets/icons/$src-star.svg\" alt=\"Estrela\" data-value=\"$star\"></button>";
                        }

                        $personID = $_SESSION['id'];


                        $tr .= "
                                </td>
                                <td class=\"text-slate-500 text-xs md:text-sm hidden md:table-cell\">$edition ª</td>
                                <td class=\"text-slate-500 text-xs md:text-sm hidden md:table-cell\">$type</td>
                                <td class=\"text-slate-500 text-xs md:text-sm hidden md:table-cell\">$inventory</td>
                                <td><button class=\"border p-2 rounded-md drop-shadow-sm\"><img src=\"./static/assets/icons/copy.svg\" alt=\"Copiar\"></button></td>
                            </tr>";

                        echo ($tr);
                    }
                    ?>



                </tbody>
            </table>
        </main>

        <?php
        include('./components/footer.php');
        ?>
    </div>

    <script src="./static/scripts/inputEffect.js"></script>

</body>

</html>