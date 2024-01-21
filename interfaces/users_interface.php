<?php include_once '../inc/user_search.php'; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>Search Results</title>
</head>
<body>
    <div class="container">
        <table>
            <tr>
                <th>Results</th>
                <td><?php echo $result_count?></td>
            </tr>

            <?php
            foreach ($users as $user) {
                echo "<tr><td><a href='user_card.php?id={$user['id']}'>" . $user['lastname'] . " " . $user['firstname'] . "</a></td></tr>";            }

            ?>
        </table>
    </div>
</body>
</html>