<?php
include_once '../inc/movie_search.php';
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
    <table>
        <tr>
            <th>Results</th>
            <td><?php echo $movies_count?></td>
        </tr>

        <?php

        foreach ($movies as $movie) {
            echo "<tr><td><a href='movie_card.php?id={$movie['id']}'>" . $movie['title'] . "</a></td></tr>";
        }

        ?>
    </table>
</div>
</body>
</html>