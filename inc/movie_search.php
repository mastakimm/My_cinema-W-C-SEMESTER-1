    <?php
    include_once 'db_connection.php';
    session_start();

    $dbh = db_connect("test", "Haribo39.");

    //          Input of the user           //
    $input_movie = isset($_POST['input-movie']) ? $_POST['input-movie'] :
        (isset($_SESSION['input-movie']) ? $_SESSION['input-movie'] : "");
    $_SESSION['input-movie'] = $input_movie;

    $select_genre = isset($_POST['select_genre']) ? $_POST['select_genre'] :
        (isset($_SESSION['select_genre']) ? $_SESSION['select_genre'] : "%");
    $_SESSION['select_genre'] = $select_genre;

    $input_distributor = isset($_POST['input_distributor']) ? $_POST['input_distributor'] :
        (isset($_SESSION['input_distributor']) ? $_SESSION['input_distributor'] : "");
    $_SESSION['input_distributor'] = $input_distributor;

    $filter = "";

    //          Update the filter depending on the inputs            //

    if (!empty($input_movie)) {
        $filter .= "WHERE movie.title LIKE '%$input_movie%'";
    }

    if ($select_genre !== '#') {
        if (!empty($filter)) {
            $filter .= " AND ";
        } else {
            $filter .= "WHERE ";
        }
        $filter .= "genre.id LIKE '$select_genre'";
    }

    if (!empty($input_distributor)) {
        if (!empty($filter)) {
            $filter .= " AND ";
        } else {
            $filter .= "WHERE ";
        }
        $filter .= "distributor.name LIKE '%$input_distributor%'";
    }


    if (isset($_GET['page'])) {
        $currentPage = strip_tags($_GET['page']);
    } else {
        $currentPage = 1;
    }

    //          Count total results         //

    $sql = "SELECT COUNT(*) as 'total_results' FROM movie
            JOIN movie_genre ON movie.id = movie_genre.id_movie
            JOIN genre ON genre.id = movie_genre.id_genre
            JOIN distributor ON distributor.id = movie.id_distributor
            $filter;";

    $stmt = $dbh->query($sql);
    $stmt->execute();
    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    $total_results = $results['total_results'];
    $result_per_page = 15;
    $first_results = ($currentPage * $result_per_page) - $result_per_page;

    $pages = ceil($total_results / $result_per_page);

    $dbh = null;

    //          Search for movies depending on the filters          //

    $dbh = db_connect("test", "Haribo39.");

    $sql = "SELECT movie.id, movie.title FROM movie
        JOIN movie_genre ON movie.id = movie_genre.id_movie
        JOIN genre ON genre.id = movie_genre.id_genre
        JOIN distributor ON distributor.id = movie.id_distributor
        $filter
        ORDER BY movie.title
        LIMIT :first_results, :result_per_page;";

    $request = $dbh->prepare($sql);
    $request->bindValue(':first_results', $first_results, PDO::PARAM_INT);
    $request->bindValue(':result_per_page', $result_per_page, PDO::PARAM_INT);
    $request->execute();

    $movies = $request->fetchALL(PDO::FETCH_ASSOC);

    $dbh = null;
