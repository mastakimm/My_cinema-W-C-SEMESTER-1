<?php include_once '../inc/edit_schedule.php' ?>
<?php include_once '../inc/display_movie.php' ?>
<?php include_once '../inc/select_function.php' ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/cards.css">
    <title>Movie search results</title>
    <script src="../js/movie_card.js"></script>
</head>
<body>
<div class="container">
    <a href="../index.php" class="home-button">Home</a>
    <div class="card">
        <h1>PHP MY CINEMA</h1>
        <h3><strong>Movie Card</strong></h3>
        <table class="table_movie" style="margin-top: 100px">
            <tr>
                <th>Movie ID</th>
                <td><?php echo $id_movie?></td>
            </tr>

            <tr>
                <th>Movie Title</th>
                <td><?php echo $title_movie?></td>
            </tr>

            <tr>
                <th>Movie Distributor</th>
                <td><?php echo $name_distributor?></td>
            </tr>

            <tr>
                <th>Movie Director</th>
                <td><?php echo $movie_director?></td>
            </tr>

            <tr>
                <th>Movie Duration</th>
                <td><?php echo $movie_duration . " min"?></td>
            </tr>

            <tr>
                <th>Release Date</th>
                <td><?php echo $movie_release_date?></td>
            </tr>
        </table>
    </div>
    <button type="button" class="show_add_to_schedule" id="show_add_to_schedule">Add to schedule</button>
    <form class="this_movie_to_schedule" action="#" method="post" style="display: none">
        <div class="date_picker">
            <label for="date_picker">Select a date and an hour : </label>
            <input type="datetime-local" name="date_picker" id="date_picker">
        </div>
        <div class="select_id_room">
            <label for="select_room_number">Select room number</label>
            <select class="select_room_number" name="select_room_number" id="select_room_number">
                <option value="default">default</option>
                <?php select_id_room(); ?>
            </select>
        </div>
        <button class="add_to_schedule" type="submit">Add to schedule</button>
    </form>
</div>
</body>
</html>


