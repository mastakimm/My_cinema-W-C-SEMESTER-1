<?php
session_start();
include_once ('inc/select_function.php');
include_once ('inc/display_schedule.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SEAGULL CINEMA - Lobby</title>
    <link rel="stylesheet" href="css/index.css">
    <script>
        document.addEventListener("DOMContentLoaded", function (e) {
            const showHistory = document.getElementsByClassName("show_movie_form")[0];
            const form_history = document.getElementsByClassName("movie_form")[0];

            showHistory.addEventListener("click", function (e) {
                if (form_history.style.display === "none"){
                    form_history.style.display = "block";
                    if (add_to_history.style.display === "block" || schedule.style.display === "block") {
                        add_to_history.style.display = "none";
                        schedule.style.display = "none";
                    }
                } else {
                    form_history.style.display = "none";
                }
            });

            const show_add_to_history = document.getElementsByClassName("show_user_form")[0];
            const add_to_history = document.getElementsByClassName("form_user")[0];

            show_add_to_history.addEventListener("click", function (e) {
                if (add_to_history.style.display === "none"){
                    add_to_history.style.display = "block";
                    if (form_history.style.display === "block" || schedule.style.display === "block") {
                        form_history.style.display = "none";
                        schedule.style.display = "none";
                    }
                } else {
                    add_to_history.style.display = "none";
                }
            });

            const showSchedule = document.getElementsByClassName("show_schedule")[0];
            const schedule = document.getElementsByClassName("schedule")[0];

            showSchedule.addEventListener("click", function (e) {
                if (schedule.style.display === "none"){
                    schedule.style.display = "block";
                    if (form_history.style.display === "block" || add_to_history.style.display === "block") {
                        form_history.style.display = "none";
                        add_to_history.style.display = "none";
                    }
                } else {
                    schedule.style.display = "none";
                }
            });
        });
    </script>
</head>
<body class="bg-image">
    <div class="buttons">
        <button type="button" class="show_movie_form" id="movie_search_button"></button>
        <button type="button" class="show_user_form" id="user_search_button"></button>
        <button type="button" class="show_schedule" id="display_schedule"></button>
    </div>
    <div class="container">
        <h1 class="text-center">SEAGULL - CINEMA</h1>
        <div class="movie_form" id="form-movie">
            <form method="post" action="interfaces/movies_interface.php">
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
                            <input type="text" name="input_distributor" id="input_distributor" placeholder="Name of the distributor.">
                        </div>
                </div>
                <button class="submit" type="submit">Find</button>
            </form>
        </div>
        <div class="form_user" id="form_user">
            <form method="post" action="interfaces/users_interface.php">
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
        <div class="schedule" style="background-color: white">
            <table>
                <?php display_schedule(); ?>
            </table>
        </div>
    </div>
</body>
</html>
<?php session_destroy() ?>
