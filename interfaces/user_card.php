
<?php include_once '../inc/display_user.php' ?>
<?php include_once '../inc/display_history.php' ?>
<?php include_once '../inc/select_function.php' ?>
<?php include_once  '../inc/edit_membership.php' ?>
<?php include_once  '../inc/display_schedule.php' ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/cards.css">
    <script src="../js/user_card.js"></script>
    <title>User search results</title>
</head>
<body>
    <div class="container">
        <a href="../index.php" class="home-button">Home</a>
        <div class="card">
            <h1>PHP MY CINEMA</h1>
            <h3><strong>User Card</strong></h3>
            <table class="user_card">
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
                    <td><?php echo $membership['name']; ?>
                        <form class="select_membership" method="post" action="">
                            <label for="select_subscription"></label>
                            <select class="select_subscription" name="select_subscription" id="select_subscription">
                                <option value="null">DELETE</option>
                                <?php select_membership(); ?>
                            </select>
                            <button style="" type="submit" class="submit_subscription">✅</button style="">
                        </form>
                    </td>
                </tr>

                <tr>
                    <th>Date Begin</th>
                    <td><?php echo $date_begin?></td>
                </tr>
            </table>
        </div>
        <button class="showhistory" type="button">Show History</button>
        <div class="form_history" style="display: none">
            <table>
                <div class="grid">
                    <span>
                        <strong><b>Movie Title</b></strong>
                    </span>
                    <span>
                        <strong><b>Viewing Dates</b></strong>
                    </span>
                    <?php show_history(); ?>
                </div>
            </table>
            <button class="add_to_history" type="button">Add a movie to the history</button>
            <div class="form_add_to_history" style="display: none">
                <form class="add_movie" method="post" action="#" style="display: flex; flex-direction: column">
                    <div class="form-group">
                        <label for="date">Date projection of the movie : </label>
                        <input type="date" name="date" id="date">
                    </div>
                    <div class="form-group">
                        <label for="movie_title">Movie Title</label>
                        <input type="text" name="movie_title" id="movie_title">
                    </div>
                    <button class="add_to_history_submit" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
