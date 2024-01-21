
<?php include_once '../inc/display_user.php' ?>
<?php include_once '../inc/display_history.php' ?>
<?php include_once '../inc/select_function.php' ?>
<?php include_once  '../inc/edit_function.php' ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <script>
        document.addEventListener("DOMContentLoaded", function (e) {
            const showHistory = document.getElementsByClassName("showhistory")[0];
            const form_history = document.getElementsByClassName("form_history")[0];

            showHistory.addEventListener("click", function (e) {
                if (form_history.style.display === "none"){
                    form_history.style.display = "block";
                } else {
                    form_history.style.display = "none";
                }
            });

            const show_add_to_history = document.getElementsByClassName("add_to_history")[0];
            const add_to_history = document.getElementsByClassName("form_add_to_history")[0];

            show_add_to_history.addEventListener("click", function (e) {
               if (add_to_history.style.display === "none"){
                   add_to_history.style.display = "block";
               } else {
                   add_to_history.style.display = "none";
               }
            });
        });
    </script>
    <title>User search results</title>
</head>
<body>
    <div class="container">
        <h1>PHP MY CINEMA</h1>
        <h3><strong>User Card</strong></h3>
        <table>
            <tr>
                <th>Personnal ID</th>
                <td><?php echo $id?></td>
            </tr>

            <tr>
                <th>Lastname</th>
                <td><?php echo $lastname?></td>
            </tr>

            <tr>
                <th>Firstname</th>
                <td><?php echo $firstname?></td>
            </tr>

            <tr>
                <th>Birthdate</th>
                <td><?php echo $birthdate?></td>
            </tr>

            <tr>
                <th>Email</th>
                <td><?php echo $email?></td>
            </tr>

            <tr>
                <th>City</th>
                <td><?php echo "$zipcode, $city"?></td>
            </tr>

            <tr>
                <th>Membership Status</th>
                <td><?php echo $membership['name']; ?></td>
                <td>
                    <form class="select_membership" method="post" action="">
                        <label for="select_subscription"></label>
                        <select class="select_subscription" name="select_subscription" id="select_subscription">
                            <option value="null">N/A</option>
                            <?php select_membership(); ?>
                        </select>
                        <button type="submit" class="submit_subscription">✅</button>
                    </form>
            </tr>

            <tr>
                <th>Date Begin</th>
                <td><?php echo $date_begin?></td>
            </tr>
        </table>
        <button class="showhistory" type="button">Show History</button>
        <div class="form_history" style="display: none">
            <table>
                <?php
                foreach ($history as $movie) {
                    //set href on title so it's link to the movie card.
                    echo "<tr><td>" . $movie['movie_title'] . " " . $movie['date'] . "</a></td></tr>";
                }
                ?>
            </table>
            <button class="add_to_history" type="button">+</button>
            <div class="form_add_to_history" style="display: none">
                <form class="add_movie" method="post" action="#">
                    <div class="form-group">
                        <label for="movie_title">movie_title</label>
                        <input type="text" name="movie_title" id="movie_title">
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date" id="date">
                    </div>
                    <button class="add_to_history_submit" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
