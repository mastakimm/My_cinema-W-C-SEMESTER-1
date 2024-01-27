<?php
include_once '../inc/movie_search.php';
session_start();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>Movie Card</title>
</head>
<body>
    <div class="container">
        <a href="../index.php" class="home-button">Home</a>
        <table>
            <tr>
                <th>Results : <?php echo $total_results?></th>
            </tr>
            <nav>
                <ul class="pagination" style="display: flex; flex-direction: row">
                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                        <a href="<?= ($currentPage > 1) ? '?page=' .
                            ($currentPage - 1) : '#' ?>" class="page-link">Previous</a>
                    </li>
                    <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                        <a href="?page=1" class="page-link">1</a>
                    </li>
                    <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                        <a href="?page=<?= $currentPage ?>" class="page-link"><?= "(" . $currentPage . ")" ?></a>
                    </li>
                    <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                        <a href="?page=<?= $pages ?>" class="page-link"><?= $pages ?></a>
                    </li>
                    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                        <a href="<?= ($currentPage < $pages) ? '?page=' .
                            ($currentPage + 1) : '#' ?>" class="page-link">Next</a>
                    </li>
                </ul>
            </nav>
            <div class="grid-movie">
                <span>
                    <strong><b>Movie title</b></strong>
                </span>
                <?php
                foreach ($movies as $movie) {
                    echo "<span><a href='movie_card.php?id={$movie['id']}'>" . $movie['title'] . "</a></span>";
                }
                ?>
            </div>
        </table>
    </div>
</body>
</html>