
<?php include_once '../inc/display_movie.php' ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>Movie search results</title>
</head>
<body>
<div class="container">
    <h1>PHP MY CINEMA</h1>
    <h3><strong>User Card</strong></h3>
    <table>
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
    <form class="this_movie_to_schedule" action="../index.php" method="post">
        <div class="date_picker">
            <label for="date_picker"></label>
            <input type="date" name="date_picker" id="date_picker">
        </div>
        <button class="add_to_schedule" type="submit">Add to schedule</button>
    </form>
</div>
</body>
</html>


