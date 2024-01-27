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
    <style>

    </style>
</head>
<body>
    <div class="container">
        <a href="../index.php" class="home-button">Home</a>
        <table>
            <tr>
                <th>Total Results : <?php echo $total_results?></th>
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
            <div class="grid">
                <span>
                    <strong><b>Lastname</b></strong>
                </span>
                <span>
                    <strong><b>Firstname</b></strong>
                </span>
            <?php
            foreach ($users as $user) {
                echo "<span><a href='user_card.php?id={$user['id']}'>" . $user['lastname'] .
                    "</a></span><span><a href='user_card.php?id={$user['id']}'>" . $user['firstname'] . "</a></span>";
            }
            ?>
            </div>
        </table>
    </div>
</body>
</html>