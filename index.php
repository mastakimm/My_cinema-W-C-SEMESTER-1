<?php
session_start();
include_once 'inc/select_function.php';
include_once 'inc/display_schedule.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SEAGULL CINEMA - Lobby</title>
    <link rel="stylesheet" href="css/index.css">
    <script src="js/index.js"></script>
</head>
<body class="bg-image">
    <div class="container">
        <a href="index.php" class="home-button">Home</a>
        <h1 class="text-center">SEAGULL - CINEMA</h1>
        <div class="buttons">
            <button type="button" class="show_movie_form" id="movie_search_button"></button>
            <button type="button" class="show_user_form" id="user_search_button"></button>
            <button type="button" class="show_schedule" id="display_schedule"></button>
        </div>
        <div class="movie_form" id="form-movie" style="display: none">
            <form method="post" action="interfaces/movie_search_results.php">
                <div class="form-group">
                    <label for="input-movie">Movie Title</label>
                    <input type="text" name="input-movie" id="input-movie" placeholder="Title of the movie.">
                </div>
                <div class="form-group">
                    <div class="genreanddistributor">
                        <label for="select_genre">Genre</label>
                        <select class="form-control" name="select_genre" id="select_genre">
                            <option value="#">Pick a genre</option>
                            <?php select_genre() ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="input_distributor">Distributor name</label>
                        <input type="text" name="input_distributor" id="input_distributor"
                               placeholder="Name of the distributor.">
                    </div>
                </div>
                <button class="submit" type="submit">Find</button>
            </form>
        </div>
        <div class="form_user" id="form_user" style="display: none">
            <form method="post" action="interfaces/user_search_results.php">
                <div class="form-group">
                    <label for="input_user_lastname">Last name</label>
                    <input type="text" name="input_user_lastname" id="input_user_lastname" placeholder="Lafripouille">
                </div>
                <div class="form-group">
                    <label for="input_user_firstname">First name</label>
                    <input type="text" name="input_user_firstname" id="input_user_firstname" placeholder="Francis">
                </div>
                <button class="submit" type="submit">Find</button>
            </form>
        </div>
        <div class="schedule" style="display: block">
            <nav style="display: flex; justify-content: center">
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
            <table style="display: flex">
                <div class="form_date">
                    <div style="grid-column: 3">
                        <form class="schedule_picker" action="#" method="post">
                            <label for="schedule_date_picker"></label>
                            <input type="date" name="schedule_date_picker" id="schedule_date_picker">
                            <button id="submit_date" type="submit">✅</button>
                        </form>
                    </div>
                </div>
                <div class="grid">
                    <span>
                        <strong><b>Title</b></strong>
                    </span>
                    <span>
                        <strong><b>Room</b></strong>
                    </span>
                    <span>
                        <strong>Date projection</strong>
                    </span>
                    <?php
                    //add href to each movie //
                    foreach ($schedule as $movie) {
                        echo "<span>" . $movie['title'] . "</span><span>" . $movie['number'] . "</span><span>" .
                            $movie['date_begin'] . "</span>";
                    }
                    ?>
                </div>
            </table>
        </div>
    </div>
</body>
</html>
